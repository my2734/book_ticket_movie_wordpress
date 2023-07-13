<?php 

class CreateEvent{
    protected $post_type = 'event';
    public function __construct()
    {
        add_action('init', [$this, 'func_event']);
        add_filter( 'manage_event_posts_columns',  [$this, 'custom_event_column_filter']);
        add_action( 'manage_event_posts_custom_column' , [$this, 'custom_event_column_add'],10,2);
        require_once(PROJECT_MANAGEMENT_PATH . 'event/features_event/class-event-metabox.php');
    }

    function func_event(){
        $labels = array(
            'name' => __('Event List'),
            'singular_name' => __('Event'),
            'menu_name' => __('Events'),
            'add_new' => __('Add New Event'),
            'add_new_item' => __('New Event'),
            'edit' => __('Edit Event'),
            'edit_item' => __('Edit Event'),
            'search_items' => __('Search Event'),
            'not_found' => __('Not found Event'),
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'event'),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'menu_icon'    =>'dashicons-buddicons-community',
            'show_in_rest'  => true,
            'supports' => array( 'title', 'thumbnail'),
           
        );

        register_post_type($this->post_type, $args);
    }

    function custom_event_column_filter(){
        $columns['event_name'] = __('Event Name');
        $columns['image'] = __( 'Poster');
        $columns['start_date'] = __( 'Start Date');
        $columns['end_date'] = __( 'End Date');
        $columns['percent_discount'] = __( 'Percent Discount');
        $columns['event_id'] = __( 'Event ID');
        // $columns['description'] = __( 'Description');

        return $columns;
    }

    function custom_event_column_add($column,$post_id){
        switch ($column) {
            case 'event_name':
                echo get_the_title($post_id);
                break;
            case 'image':
                echo get_the_post_thumbnail($post_id,'thumbnail');
                break;
            case 'start_date':
                echo get_post_meta($post_id,'_start_date',true);
                break;
            case 'end_date':
                echo get_post_meta($post_id,'_end_date',true);
                break;
            case 'percent_discount': 
                $percent_discount = get_post_meta($post_id,'_percent_discount',true);
                $percent_discount .= "%";
                echo $percent_discount;
                break;
            case 'event_id':
                echo $post_id;
                break;
            // case 'description':
            //     echo "<h1 class='bg-danger'>".get_post_meta($post_id,'_description',true)."</h1>";
            //     break;
            default:
                # code...
                break;
        }
    }
}