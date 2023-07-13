<?php 
    class CreateUser{
        protected $post_type = 'user';
        public function __construct(){
            // die("hello ca nha yeu");
            add_action('init', [$this, 'func_user']);
            // add_action( 'init', [$this, 'add_taxonomy_showtimes']);

            add_filter( 'manage_user_posts_columns',  [$this, 'custom_user_column_filter']);
            add_action( 'manage_user_posts_custom_column' , [$this, 'custom_user_column_add'],10,2);

            // // AJAX
            // add_action('wp_ajax_thongbao1212',  [$this, 'thongbao1212_init']);
            // add_action('wp_ajax_nopriv_thongbao1212',  [$this, 'thongbao1212_init']);
            require_once(PROJECT_MANAGEMENT_PATH . 'user/features_user/class-user-metabox.php');
        }

        function custom_user_column_filter($columns){
            $columns['email'] = __( 'Email');
            $columns['password'] = __( 'Password');
            $columns['user_id'] = __( 'User ID');
            return $columns;
        }

        function custom_user_column_add($column, $post_id){
            switch ($column) {
                case 'email':
                    echo json_encode(get_post_meta($post_id,'_email',true));
                    break;
                
                case 'password':
                    echo get_post_meta($post_id,'_password',true);
                    break;
                case 'user_id':
                    echo $post_id;
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

        function func_user(){
            $labels = array(
                'name' => __('User List'),
                'singular_name' => __('User'),
                'menu_name' => __('User'),
                'add_new' => __('Add New User'),
                'add_new_item' => __('New User'),
                'edit' => __('Edit User'),
                'edit_item' => __('Edit User'),
                'search_items' => __('Search User'),
                'not_found' => __('Not found User'),
            );
    
            $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'user'),
                'capability_type' => 'post',
                'has_archive' => true,
                'hierarchical' => false,
                'menu_position' => null,
                'menu_icon'    =>'dashicons-admin-users',
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


