<?php

class CreateTicket
{
    protected $post_type = 'ticket';
    public function __construct()
    {
        // init register post type
        add_action('init', [$this, 'func_ticket']);
        // add_action( 'init', [$this, 'add_room_taxonomy']);
        // add_action('admin_menu', [$this,'add_submenu_ticket']);

        //AJAX
        add_action('wp_ajax_showtime',  [$this, 'showtime_init']);
        add_action('wp_ajax_nopriv_showtime',  [$this, 'showtime_init']);

        add_action('wp_ajax_add_array_chair_normal1212',  [$this, 'add_array_chair_normal1212_init']);
        add_action('wp_ajax_nopriv_add_array_chair_normal1212',  [$this, 'add_array_chair_normal1212_init']);

        add_action('wp_ajax_update_array_chair_normal1212',  [$this, 'update_array_chair_normal1212_init']);
        add_action('wp_ajax_nopriv_update_array_chair_normal1212',  [$this, 'update_array_chair_normal1212_init']);

        add_filter('manage_ticket_posts_columns',  [$this, 'custom_ticket_column_filter']);
        add_action('manage_ticket_posts_custom_column', [$this, 'custom_ticket_column_add'], 10, 2);

        require_once(PROJECT_MANAGEMENT_PATH . 'ticket/feature_ticket/class-ticket-infomation-metabox.php');
    }

    function update_array_chair_normal1212_init(){
        $showtime_id = (isset($_POST['showtime_id'])) ? esc_attr($_POST['showtime_id']) : "";
        $ticket_id = (isset($_POST['ticket_id'])) ? esc_attr($_POST['ticket_id']) : "";
        $seat_position_new = $_POST['seat_position']; //array seat_position new
        $array_chair = get_post_meta($showtime_id, '_array_chair', false)[0]; //array seat_position old


        //remove chair_id old
        $chair_id_old = get_post_meta($ticket_id,'_chair_id',false)[0];
        foreach($array_chair as $key => $array_chair_item){
            if(in_array($array_chair_item, $chair_id_old)){
                unset($array_chair[$key]);
            }
        }

        // //add chair_id new
        foreach($seat_position_new as $seat_position_new_item){
            $seat_position_new_item = json_decode($seat_position_new_item);
            if (!in_array($seat_position_new_item, $array_chair)) {
                array_push($array_chair, $seat_position_new_item);
            }
        }
        
        update_post_meta($showtime_id, '_array_chair', $array_chair);
        wp_send_json_success($array_chair);
        die();
    }

    function add_array_chair_normal1212_init()
    {
        $showtime_id = (isset($_POST['showtime_id'])) ? esc_attr($_POST['showtime_id']) : "";
        $seat_position_new = $_POST['seat_position']; //array seat_position new
        $array_chair = get_post_meta($showtime_id, '_array_chair', false)[0]; //array seat_position old

        foreach($seat_position_new as $seat_position_new_item){
            $seat_position_new_item = json_decode($seat_position_new_item);
            if (!in_array($seat_position_new_item, $array_chair)) {
                array_push($array_chair, $seat_position_new_item);
            }
        }
        
        update_post_meta($showtime_id, '_array_chair', $array_chair);
        wp_send_json_success($array_chair);
        die();
    }

    function custom_ticket_column_filter($columns)
    {
        unset($columns['taxonomy-chair']);
        unset($columns['date']);
        $columns['movie_name'] = __('Movie name');
        $columns['room_show'] = __('Room show');
        $columns['time_show'] = __('Time Show');
        $columns['seat_position'] = __('Seat position');
        $columns['price'] = __('Price');
        $columns['time_booking'] = __('Time Booking');
        $columns['name_buyer'] = __('Name buyer');
        $columns['email'] = __('Email');
        $columns['phone'] = __('Phone');
        $columns['user_id'] = __('User ID');
        return $columns;
    }

    function custom_ticket_column_add($column, $post_id)
    {
        $ticket_id = $post_id;
        $showtime_id = get_post_meta($ticket_id, '_showtime_id', true);
        switch ($column) {
            case 'movie_name':
                $movie_id = get_post_meta($showtime_id,'_movie_id',true);
                // echo $movie_name;
                echo get_post($movie_id)->post_title;
                break;
            case 'room_show':
                $room_id = get_post_meta($showtime_id, '_room_id', true);
                echo get_post($room_id)->post_title;
                break;
            case 'time_show':
                echo get_post_meta($showtime_id, '_time_show', true);
                break;
            case 'price':
                echo number_format(get_post_meta($ticket_id, '_price', true)) . " vnđ";
                break;
            case 'name_buyer':
                echo get_post_meta($ticket_id, '_name_buyer', true);
                break;
            case 'email':
                echo  get_post_meta($ticket_id, '_email', true);
                break;
            case 'phone':
                echo  get_post_meta($ticket_id, '_phone', true);
                break;
            case 'time_booking':
                echo get_post_meta($ticket_id, '_time_booking', true);
                break;
            case 'seat_position':
                $showtime_id = get_post_meta($ticket_id,'_showtime_id',true);
                $room_id = get_post_meta($showtime_id,'_room_id',true);
                $quantity_chair_vip = get_post_meta($room_id,'_quantity_chair_vip',true);
                // echo json_encode(get_post_meta($showtime_id));
                $string_chair = "";
                foreach(get_post_meta($ticket_id,'_chair_id',false)[0] as $key=> $chair_item){
                    if($chair_item <= $quantity_chair_vip){ //A
                        $string_chair .= 'A'.$chair_item;
                    }else{ //B
                        $string_chair .= 'B'.$chair_item;
                    }
                    if(($key+1) < count(get_post_meta($ticket_id,'_chair_id',false)[0])){
                        $string_chair.=',';
                    }
                    $string_chair .= ' ';
                }
                // echo json_encode(get_post_meta($ticket_id,'_chair_id',true));
                echo $string_chair;
                // echo $quantity_chair_vip;
                break;
            case 'user_id':
                echo get_post_meta($ticket_id,'_user_id',true);
                break;
            default:
                # code...
                break;
        }
    }

    function showtime_init()
    {
        $showtime_id = (isset($_POST['showtime_id'])) ? esc_attr($_POST['showtime_id']) : "";
        $room_id = get_post_meta($showtime_id, '_room_id', true);
        $quantity_chair_normal = get_post_meta($room_id, '_quantity_chair_normal', true);
        $quantity_chair_vip = get_post_meta($room_id, '_quantity_chair_vip', true);
        $data = [];
        $data['quantity_chair_normal'] = $quantity_chair_normal;
        $data['quantity_chair_vip'] = $quantity_chair_vip;
        // $data['_array_chair'] = get_post_meta($showtime_id, '_array_chair', false)[0];
        $data['_array_chair'] = get_post_meta($showtime_id, '_array_chair', false);
        // foreach($data)
        wp_send_json_success( $data);
        die();
    }

    function func_ticket()
    {
        $labels = array(
            'name' => __('Ticket List'),
            'singular_name' => __('Ticket'),
            'menu_name' => __('Tickets'),
            'add_new' => __('Add New Ticket'),
            'add_new_item' => __('New Ticket'),
            'edit' => __('Edit Ticket'),
            'edit_item' => __('Edit Ticket'),
            'search_items' => __('Search Ticket'),
            'not_found' => __('Not found Ticket'),
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'service'),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'menu_icon'    => 'dashicons-tickets',
            'supports' => array('title'),
        );

        register_post_type($this->post_type, $args);
    }

    function add_review_food()
    {
        // Thêm một menu mới vào dashboard menu
        add_menu_page(
            'TICKET', // Tiêu đề của trang
            'TICKET', // Tên của menu
            'manage_options', // Quyền truy cập để truy cập menu
            'review_food', // Slug của trang
            'review_food_page_callback', // Callback function để hiển thị nội dung của trang
            '', // Icon của menu
            25 // Vị trí của menu trong danh sách
        );

        // Thêm submenu cho menu chính
        add_submenu_page(
            'ticket', // Slug của menu cha
            'Ticket', // Tiêu đề của submenu
            'Ticket', // Tên của submenu
            'manage_options', // Quyền truy cập để truy cập submenu
            'edit.php?post_type=ticket' // Slug của trang tương ứng với submenu
        );

        // // Thêm submenu cho menu chính
        // add_submenu_page(
        //     'review_food', // Slug của menu cha
        //     'Review', // Tiêu đề của submenu
        //     'Review', // Tên của submenu
        //     'manage_options', // Quyền truy cập để truy cập submenu
        //     'edit.php?post_type=ticket' // Slug của trang tương ứng với submenu
        // );
    }

    function add_room_taxonomy()
    {


        $labels_chair = array(
            'name' => __('Chair List'),
            'singular_name' => __('Chair'),
            'menu_name' => __('Chair'),
            'add_new' => __('Add New Chair'),
            'add_new_item' => __('New Chair'),
            'edit' => __('Edit Chair'),
            'edit_item' => __('Edit Chair'),
            'search_items' => __('Search Chair'),
            'not_found' => __('Not found Chair'),
        );

        $args_chair = array(
            'hierarchical' => true,
            'labels' => $labels_chair,
            'show_ui' => true,
            'public' => true,
            'query_var' => true,
            'meta_box_cb' => false,
            'show_admin_column' => true,
            'rewrite' => array('slug' => 'chair'),
        );

        register_taxonomy('chair', $this->post_type,  $args_chair);
    }

    function add_submenu_ticket()
    {
        // add_submenu_page(
        //     'edit.php?post_type=ticket', // Menu cha
        //     'Showtimes', // Tiêu đề của menu
        //     'Showtimes', // Tên của menu
        //     'manage_options',// Vùng truy cập, giá trị này có ý nghĩa chỉ có supper admin và admin đc dùng
        //     'edit.php?post_type=showtimes', // Slug của menu
        //     // [$this, 'display_all_ticket'] // Hàm callback hiển thị nội dung của menu
        // );

        add_submenu_page(
            'edit.php?post_type=ticket', // Menu cha
            'All Ticket', // Tiêu đề của menu
            'All Ticket', // Tên của menu
            'manage_options', // Vùng truy cập, giá trị này có ý nghĩa chỉ có supper admin và admin đc dùng
            'all-ticket', // Slug của menu
            [$this, 'display_all_ticket'] // Hàm callback hiển thị nội dung của menu
        );
    }

    function display_all_ticket()
    {
        require_once(PROJECT_MANAGEMENT_PATH . 'inc_ticket/all-ticket.php');
    }
}
