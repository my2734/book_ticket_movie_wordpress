<?php 
    class CreateShowtimes{
        protected $post_type = 'showtimes';
        public function __construct(){
            // die("hello ca nha yeu");
            add_action('init', [$this, 'func_showtimes']);
            add_action( 'init', [$this, 'add_taxonomy_showtimes']);

            add_filter( 'manage_showtimes_posts_columns',  [$this, 'custom_showtimes_column_filter']);
            add_action( 'manage_showtimes_posts_custom_column' , [$this, 'custom_showtimes_column_add'],10,2);

            // AJAX
            add_action('wp_ajax_thongbao1212',  [$this, 'thongbao1212_init']);
            add_action('wp_ajax_nopriv_thongbao1212',  [$this, 'thongbao1212_init']);
            require_once(PROJECT_MANAGEMENT_PATH . 'showtime/features_showtime/class-showtimes-metabox.php');
        }

        function custom_showtimes_column_filter($columns){
            unset($columns['date']);
            unset($columns['taxonomy-timeShow']);
            $columns['movie_name'] = __( 'Movie name');
            $columns['date_show'] = __( 'Date show');
            $columns['room_show'] = __( 'Room show');
            $columns['time_show'] = __( 'Time show');
            return $columns;
        }

        function custom_showtimes_column_add($column, $post_id){
            switch ($column) {
                case 'movie_name':
                    // echo get_post_meta($post_id,'_movie_name',true);
                    // $movie_id = get_post_meta($post_id, 'movie_id');
                    // echo get_post($movie_id)->post_title;
                    // echo json_encode(get_post_meta($post_id,"_movie_id"));
                    $movie_id = get_post_meta($post_id,'_movie_id',true);
                    $movie_name = get_post($movie_id)->post_title;
                    echo $movie_name;
                    break;
                
                case 'date_show':
                    // echo json_encode(get_post_meta($post_id));
                    echo get_post_meta($post_id,'_date_show',true);
                    break;
                case 'room_show':
                    $room_id = get_post_meta($post_id,'_room_id',true);
                    $room =  get_post($room_id);
                    echo $room->post_title;
                case 'time_show':
                   echo get_post_meta($post_id,'_time_show',true);
                    break;
                default:
                    # code...
                    break;
            }
        }


        function thongbao1212_init() {
            //do bên js để dạng json nên giá trị trả về dùng phải encode
            $movie_id = (isset($_POST['movie_id']))?esc_attr($_POST['movie_id']):"";
            $room_id = (isset($_POST['room_id']))?esc_attr($_POST['room_id']):"";
            $date_show = (isset($_POST['date_show']))?esc_attr($_POST['date_show']):"";

            // wp_send_json_success($movie_name);


            $taxonomies = get_taxonomies(['object_type' => ['showtimes']]);
            $taxonomyTerms = [];
            // loop over your taxonomies
            foreach ($taxonomies as $taxonomy)
            {
                // retrieve all available terms, including those not yet used
                $terms    = get_terms(['taxonomy' => $taxonomy, 'hide_empty' => false]);
                // make sure $terms is an array, as it can be an int (count) or a WP_Error
                $hasTerms = is_array($terms) && $terms;
                if($hasTerms)
                {
                    $taxonomyTerms[$taxonomy] = $terms;        
                }
            }
            $argTime = $taxonomyTerms['timeShow'];
            $argResult = [];
            $arg = array(
                'post_type' => 'showtimes'
            );
            $showTime_list = get_posts($arg);
            $timeResult = [];
            foreach($argTime as $key => $time){
                //each time for showtimes
                foreach($showTime_list as $showtime){
                    $metaShowTime = get_post_meta($showtime->ID); //meta ffield of each showtime
                    if($metaShowTime['_movie_id'][0]  ==  $movie_id && $metaShowTime['_room_id'][0]  ==  $room_id && $metaShowTime['_date_show'][0] == $date_show && $metaShowTime['_time_show'][0] == $time->name){
                        $timeResult[] = $time->name;
                    }
                } 
            }
        
        
            $argResult = [];
            forEach($argTime as $time){
                if(!in_array($time->name, $timeResult)){
                    $argResult[] = $time->name;
                }
            }
            wp_send_json_success($argResult);
            die();//bắt buộc phải có khi kết thúc
        }

        function func_showtimes(){
            $labels = array(
                'name' => __('Showtimes List'),
                'singular_name' => __('Showtimes'),
                'menu_name' => __('Showtimes'),
                'add_new' => __('Add New Showtimes'),
                'add_new_item' => __('New Showtimes'),
                'edit' => __('Edit Showtimes'),
                'edit_item' => __('Edit Showtimes'),
                'search_items' => __('Search Showtimes'),
                'not_found' => __('Not found Showtimes'),
            );
    
            $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'showtimes'),
                'capability_type' => 'post',
                'has_archive' => true,
                'hierarchical' => false,
                'menu_position' => null,
                'menu_icon'    =>'dashicons-calendar',
                // 'supports' => array('title', 'thumbnail', 'excerpt'),
                'show_in_rest'  => true,
                'supports' => array('title'),
               
            );

            register_post_type($this->post_type, $args);
        }

        function add_submenu_showtimes(){
            // die("hello ca nha yeu");
            add_submenu_page(
                'edit.php?post_type=showtimes', // Menu cha
                'All showtimes', // Tiêu đề của menu
                'All showtimes', // Tên của menu
                'manage_options',// Vùng truy cập, giá trị này có ý nghĩa chỉ có supper admin và admin đc dùng
                'all-showtimes', // Slug của menu
                [$this, 'display_all_showtimes'] // Hàm callback hiển thị nội dung của menu
            );
        }

        function display_all_showtimes(){
            require_once(PROJECT_MANAGEMENT_PATH . 'inc_showtimes/all-showtimes.php');
        }

        function add_taxonomy_showtimes(){
           

            $labels_chair = array(
                'name' => __('Time List'),
                'singular_name' => __('Time'),
                'menu_name' => __('Time'),
                'add_new' => __('Add New Time'),
                'add_new_item' => __('New Time'),
                'edit' => __('Edit Time'),
                'edit_item' => __('Edit Time'),
                'search_items' => __('Search Time'),
                'not_found' => __('Not found Time'),
            );
    
            $args_chair = array(
                'hierarchical' => true,
                'labels' => $labels_chair,
                'show_ui' => true,
                'public' => true,
                'query_var' => true,
                'meta_box_cb' => false,
                'show_admin_column' => true, 
                'rewrite' => array('slug' => 'timeShow'),
            );
            
            register_taxonomy('timeShow',$this->post_type,  $args_chair);
        }

    }
?>


