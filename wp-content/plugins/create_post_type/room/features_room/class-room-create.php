<?php 

    class CreateRoom{
        protected $post_type = 'room';
        public function __construct(){
            // init register post type
            add_action('init', [$this, 'func_room']);
            add_filter( 'manage_room_posts_columns',  [$this, 'custom_room_column_filter']);
            add_action( 'manage_room_posts_custom_column' , [$this, 'custom_room_column_add'],10,2);

            add_action( 'wp_ajax_wpshare247_action_load_more', [$this, 'wpshare247_action_load_more_init']);
            add_action( 'wp_ajax_nopriv_wpshare247_action_load_more', [$this, 'wpshare247_action_load_more_init']);

            require_once(PROJECT_MANAGEMENT_PATH . 'room/features_room/class-room-metabox.php');
        }

        function wpshare247_action_load_more_init(){
            $arr = [1,2,3,4,5];
            $arr_response = array(
                'data' => $arr
            );
            wp_send_json($arr_response);
            die();
        }

        function custom_room_column_filter($columns){
            $columns['quantity_chair_normal'] = __( 'Chair normal');
            $columns['quantity_chair_vip'] = __( 'Chair vip');
            return $columns;
        }

        function custom_room_column_add($column, $post_id){
            switch ($column) {
                case 'quantity_chair_normal':
                    echo get_post_meta($post_id,'_quantity_chair_normal',true);
                    break;
                
                case 'quantity_chair_vip':
                    echo get_post_meta($post_id,'_quantity_chair_vip',true);
                    break;
                default:
                    # code...
                    break;
            }
        }

        public function func_room(){
            $labels = array(
                'name' => __('Room List'),
                'singular_name' => __('Room'),
                'menu_name' => __('Rooms'),
                'add_new' => __('Add New Room'),
                'add_new_item' => __('New Room'),
                'edit' => __('Edit Room'),
                'edit_item' => __('Edit Room'),
                'search_items' => __('Search Room'),
                'not_found' => __('Not found Room'),
            );
    
            $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'room'),
                'capability_type' => 'post',
                'has_archive' => true,
                'hierarchical' => false,
                'menu_position' => null,
                'show_in_rest'  => true,
                'menu_icon'    =>'dashicons-store',
                // 'supports' => array('title', 'thumbnail', 'excerpt'),
                'supports' => array('title'),
               
            );
    
            register_post_type($this->post_type, $args);
        }
    }
?>