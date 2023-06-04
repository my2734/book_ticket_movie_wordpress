<?php

class CreateInfoTicketMetaBox extends CreateTicket
{
    public function __construct()
    {

        // Add meta box project information 
        add_action('add_meta_boxes', [$this, 'custom_ticket_infomation_metabox']);
        add_action('add_meta_boxes', [$this, 'custom_buyer_infomation_metabox']);
        add_action('save_post', [$this, 'save_custom_ticket_infomation_metabox'], 20);
        // add_action('save_post', [$this, 'save_custom_buyer_infomation_metabox'], 20);
        // die("hello ca nha yeu");
    }

    /**************************************************
     * Start Customize meta box project information
     **************************************************/

    

    function custom_ticket_infomation_metabox()
    {
        add_meta_box(
            // ID của metabox, phải là duy nhất
            'custom_ticket_infomation_metabox1212',
            // Tiêu đề của metabox
            'Infomation Ticket',
            // Callback function để hiển thị nội dung metabox
            [$this, 'custom_ticket_infomation_metabox_callback'],
            // Tên của custom post type mà bạn muốn thêm metabox vào
            $this->post_type,
            // Vị trí của metabox: normal (bên cạnh editor), side (ở bên phải) hoặc advanced (ở dưới editor)
            'normal',
            // Ưu tiên hiển thị của metabox (high, core hoặc default)
            'high'
        );
    }

    function custom_buyer_infomation_metabox()
    {
       
        add_meta_box(
            // ID của metabox, phải là duy nhất
            'custom_buyer_infomation_metabox',
            // Tiêu đề của metabox
            'Infomation Buyer',
            // Callback function để hiển thị nội dung metabox
            [$this, 'custom_buyer_infomation_metabox_callback'],
            // Tên của custom post type mà bạn muốn thêm metabox vào
            $this->post_type,
            // Vị trí của metabox: normal (bên cạnh editor), side (ở bên phải) hoặc advanced (ở dưới editor)
            'normal',
            // Ưu tiên hiển thị của metabox (high, core hoặc default)
            'high'
        );
    }

   

    function custom_ticket_infomation_metabox_callback($post)
    {
        require_once PROJECT_MANAGEMENT_PATH . 'ticket/inc_ticket/metabox-ticket-infomation-ui.php';
    }

    function custom_buyer_infomation_metabox_callback($post)
    {
        require_once PROJECT_MANAGEMENT_PATH . 'ticket/inc_ticket/metabox-buyer-infomation-ui.php';
    }

    // Lưu giá trị của các trường trong metabox khi lưu post
    function save_custom_ticket_infomation_metabox($post_id)
    {

        
        // Kiểm tra nonce để bảo vệ form
        // if (!isset($_POST['custom_post_metabox_nonce']) || !wp_verify_nonce($_POST['custom_post_metabox_nonce'], 'custom_movie_metabox')) {
        //     return;
        // } 

        // Kiểm tra quyền hạn của user
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        //Lưu ID của post type showtime_id
        if (isset($_POST['showtime_id'])) {
            // die($_POST['showtime_id']);
            update_post_meta($post_id, '_showtime_id', sanitize_text_field($_POST['showtime_id']));
        }

        // Lưu giá trị của trường chair_id
        if (isset($_POST['chair_id'])) {
            // echo json_encode($_POST['chair_id']);
            // $arr = [];
            // forEach($_POST['chair_id'] as $chairItem){
            //     $arr[] = $chairItem;
            // }
            // echo "<pre>";
            // print_r($_POST['chair']);
            // echo "</pre>";
            // die();
            // $arr = [];
            // print_r($_POST['chair_id']);
            // die();
            update_post_meta($post_id, '_chair_id', $_POST['chair_id'] );
        
        }

        // Lưu giá trị của trường price
        if (isset($_POST['price'])) {
            // die($_POST['price']);
            update_post_meta($post_id, '_price', sanitize_text_field($_POST['price']));
        }

        // Lưu giá trị của trường price_promotion
        if (isset($_POST['price_promotion'])) {
            // die($_POST['price_promotion']);
            update_post_meta($post_id, '_price_promotion', sanitize_text_field($_POST['price_promotion']));
        }

        // Lưu giá trị của trường name_buyer
        if (isset($_POST['name_buyer'])) {
            // die($_POST['showtime']);
            update_post_meta($post_id, '_name_buyer', sanitize_text_field($_POST['name_buyer']));
        }

        // Lưu giá trị của trường phone
        if (isset($_POST['phone'])) {
            // die($_POST['showtime']);
            update_post_meta($post_id, '_phone', sanitize_text_field($_POST['phone']));
        }

        // Lưu giá trị của trường email
        if (isset($_POST['email'])) {
            // die($_POST['showtime']);
            update_post_meta($post_id, '_email', sanitize_text_field($_POST['email']));
        }
    } 

    // function save_custom_buyer_infomation_metabox($post_id)
    // {

        
    //     // Kiểm tra nonce để bảo vệ form
    //     // if (!isset($_POST['custom_post_metabox_nonce']) || !wp_verify_nonce($_POST['custom_post_metabox_nonce'], 'custom_movie_metabox')) {
    //     //     return;
    //     // } 

    //     // Kiểm tra quyền hạn của user
    //     if (!current_user_can('edit_post', $post_id)) {
    //         return;
    //     }

        
    //     // Lưu giá trị của trường name_buyer
    //     if (isset($_POST['name_buyer'])) {
    //         // die($_POST['showtime']);
    //         update_post_meta($post_id, '_name_buyer', sanitize_text_field($_POST['name_buyer']));
    //     }

    //     // Lưu giá trị của trường phone
    //     if (isset($_POST['phone'])) {
    //         // die($_POST['showtime']);
    //         update_post_meta($post_id, '_phone', sanitize_text_field($_POST['phone']));
    //     }

    //     // Lưu giá trị của trường email
    //     if (isset($_POST['email'])) {
    //         // die($_POST['showtime']);
    //         update_post_meta($post_id, '_email', sanitize_text_field($_POST['email']));
    //     }

    //     //luu giá trị của trường chair_id
    //     if (isset($_POST['chair_id'])) {
    //         // die($_POST['chair_id']);
    //         $chair_id = $_POST['chair_id'];
    //         // print_r( $chair_id);
    //         // die();
    //         update_post_meta($post_id, 'chair_id', $chair_id);
    //     }
    // } 

        
/**************************************************
 * End Customize meta box project information
 **************************************************/
}

new CreateInfoTicketMetaBox();