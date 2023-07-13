<?php 

class CreateMovie {
    protected $post_type = 'movie';
    public function __construct(){
        add_action('init', [$this, 'func_movie']);
        add_action('init', [$this, 'create_movie_taxonomy']);
        add_filter( 'manage_movie_posts_columns',  [$this, 'custom_movie_column_filter']);
        add_action( 'manage_movie_posts_custom_column' , [$this, 'custom_movie_column_add'],10,2);
        add_action('admin_menu', [$this, 'add_manager_menu']);
        add_action('admin_menu', [$this,'add_submenu_options']);
        add_filter('enter_title_here', [$this, 'custom_title_placeholder'], 10, 2);
      
        //AJAX
        add_action('wp_ajax_chart_first12',  [$this, 'chart_first_init']);
        add_action('wp_ajax_nopriv_chart_first12',  [$this, 'chart_first_init']);

        add_filter( 'block_categories_all' ,  [$this, 'func_block_categories_all']);
        // add_filter( 'admin_footer_text', 'wpse_edit_text', 11 );

        require_once(PROJECT_MANAGEMENT_PATH . 'movie/features_movie/class-movie-metabox.php');

       
    }
   

    // function subscribe_link_shortcode() {
    //     return "<h1>Hello ca nha yeu</h1>";
    // }

    function func_block_categories_all( $categories ) {
        $categories[] = array(
            'slug'  => 'genre-movie',
            'title' => 'Layout'
        );
        // die("hello ca nha yeu");
        return $categories;
    }

    function chart_firsts_init(){
        wp_send_json_success([1,2,3]);
        die();//bắt buộc phải có khi kết thúc
    }

    function custom_movie_column_filter($columns){
        // unset( $columns['_genre'] );
        $columns['image'] = __( 'Poster');
        $columns['time'] = __( 'Time');
        $columns['genre'] = __( 'Genre');
        $columns['description'] = __( 'Description');
        return $columns;
    }

    function custom_movie_column_add($column,$post_id){
        switch ($column) {
            case 'time':
                echo get_post_meta($post_id,'_time',true)." minute";
                break;
            
            case 'genre':
                echo get_post_meta($post_id,'_genre',true);
                break;
            case 'description':
                
                // echo get_post_meta($post_id,'_description',true);
                echo get_the_excerpt();
                break;
            case 'image': 
                echo get_the_post_thumbnail($post_id,'thumbnail');
            default:
                # code...
                break;
        }
    }

    function func_movie(){
        $labels = array(
            'name' => __('Movie List'),
            'singular_name' => __('Movie'),
            'menu_name' => __('Movies'),
            'add_new' => __('Add New Movie'),
            'add_new_item' => __('New Movie'),
            'edit' => __('Edit Movie'),
            'edit_item' => __('Edit Movie'),
            'search_items' => __('Search Movie'),
            'not_found' => __('Not found Movie'),
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'movie'),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'menu_icon'    =>'dashicons-video-alt',
            'show_in_rest'  => true,
            'supports' => array( 'title', 'thumbnail', 'excerpt'),
           
        );

        register_post_type($this->post_type, $args);
    }

    function create_movie_taxonomy() {
        $labels_actor = array(
            'name' => _x( 'Genre', 'taxonomy general name' ),
            'singular_name' => _x( 'Genre', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Genre' ),
            'all_items' => __( 'All Genre' ),
            'parent_item' => __( 'Parent Genre' ),
            'parent_item_colon' => __( 'Parent Genre:' ),
            'edit_item' => __( 'Edit Genre' ),
            'update_item' => __( 'Update Genre' ),
            'add_new_item' => __( 'Add New Genre' ),
            'new_item_name' => __( 'New Genre Name' ),
            'menu_name' => __( 'Genre' ),
        );

        $args12 = array(
            'hierarchical' => true,
            'labels' => $labels_actor,
            'show_ui' => true,
            'public' => true,
            'query_var' => true,
            'meta_box_cb' => false,
            // 'show_admin_column' => true, 
            'rewrite' => array('slug' => 'genre-movie'),
            'show_in_rest' => true,
        );
        register_taxonomy('genreMovie',$this->post_type,  $args12);
      }

     function add_manager_menu(){
        
        add_menu_page(
            'Manager Cinema', // Tiêu đề của trang
            'Manager Cinema', // Tên của menu
            'manage_options', // Quyền truy cập để truy cập menu
            'manager-ciname', // Slug của trang
            [$this,'page_display_dashboarh'], // Callback function để hiển thị nội dung của trang
            'dashicons-editor-video', // Icon của menu
            25 // Vị trí của menu trong danh sách
        );

        // add_submenu_page(
        //     'edit.php?post_type=movie', // Menu cha
        //     'All Movie Custom', // Tiêu đề của menu
        //     'All Movie Custom', // Tên của menu
        //     'manage_options',// Vùng truy cập, giá trị này có ý nghĩa chỉ có supper admin và admin đc dùng
        //     'all-ticket', // Slug của menu
        //     [$this, 'ui_all_movie'] // Hàm callback hiển thị nội dung của menu
        // );

        // add_submenu_page ($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function = '' );
    }

    function add_submenu_options(){
        require_once(PROJECT_MANAGEMENT_PATH . 'dashboard/supporthost-admin-table/supporthost-admin-table.php');
        add_submenu_page(
            'manager-ciname', // Menu cha
            'Showtime On Sale', // Tiêu đề của menu
            'Showtime On Sale', // Tên của menu
            'manage_options',// Vùng truy cập, giá trị này có ý nghĩa chỉ có supper admin và admin đc dùng
            'movie-show', // Slug của menu
            // [$this, 'access_menu_options'] // Hàm callback hiển thị nội dung của menu
            'supporthost_list_init'
        );
    }

    function ui_all_movie(){
        require_once(PROJECT_MANAGEMENT_PATH . 'inc_movie/all-movie.php');
    }   

    

    function access_menu_options(){
        echo "<h1>Hello ca nha yeu</h1>";
    }
      
    function page_display_dashboarh()
    {
        require_once(PROJECT_MANAGEMENT_PATH . 'dashboard/inc_dashboard_cinema/dashboard-cinema-ui.php');
    }

    function add_admin_submenu()
    {
        add_submenu_page (
            'manager-ciname', //URL của menu cha
            'Manager Movie', //Tiêu đề của trang nằm trên thẻ title
            'Manager Movie', //Tên của menu hiển thị trong danh sách menu
            'manage_options',  //Tên quyền chứa những nhóm có thể thao tác với Menu
            'edit.php?post_type=movie', //Slug của trang
            // 'show_general_setting_page' // Hàm sẽ được gọi khi bạn click vào menu, thông thường chúng ta tạo mã HTML trong hàm này
        );
    }
    
    function show_general_setting_page()
    {
        echo '<h1>Đây là trang Plugin Options - General Settings</h1>';
    }
    
    function hide_post_type_movie() {
        remove_menu_page( 'edit.php?post_type=movie' );
    }

    function custom_title_placeholder($title_placeholder, $post) {
        // Kiểm tra xem loại post có phải là "tour" hay không
        if ($post->post_type === 'movie') {
            $title_placeholder = 'Nhập tên movie';
        }else if($post->post_type === 'ticket'){
            $title_placeholder = "Nhập tên vé";
        }else if($post->post_type == "showtimes"){
            $title_placeholder = "Nhập tên suất chiếu";
        }else if($post->post_type == 'room'){
            $title_placeholder = "Nhập tên phòng chiếu";
        }else if($post->post_type == "user"){
            $title_placeholder = "Nhập tên khách hàng";
        }else if($post->post_type == 'event'){
            $title_placeholder = "Nhập tên sự kiện";
        }
        return $title_placeholder;
    }

    // function func_demo_action(){
    //     echo "<h1>hdhfhdfjhjhhjjfdjdjfdjfhjdhfhdhfjdfjdfjdhfjhfj</h1>";
    // }

    // function function_demo_filter($demo_filter){
    //     $demo_filter = "Filter Update";
    //     return $demo_filter;
    // }

    // function display_column_movie(){
    //     echo "hekki ca nha yeu";
    //     die();
    // }
    
}






