<?php

class CreateRoomsMetaBox extends CreateRoom
{
    public function __construct()
    {
        // Add meta box project information 
        add_action('add_meta_boxes', [$this, 'custom_room_metabox']);
        add_action('save_post', [$this, 'save_custom_room_metabox'], 20);
    }

    /**************************************************
     * Start Customize meta box project information
     **************************************************/
    function custom_room_metabox()
    {
        // die("hello c anha yeu");
        add_meta_box(
            // ID của metabox, phải là duy nhất
            'custom_room_metabox',
            // Tiêu đề của metabox
            'Infomation Another',
            // Callback function để hiển thị nội dung metabox
            [$this, 'custom_room_metabox_callback'],
            // Tên của custom post type mà bạn muốn thêm metabox vào
            $this->post_type,
            // Vị trí của metabox: normal (bên cạnh editor), side (ở bên phải) hoặc advanced (ở dưới editor)
            'normal',
            // Ưu tiên hiển thị của metabox (high, core hoặc default)
            'high'
        );
    }

    function custom_room_metabox_callback($post)
    {
        require_once PROJECT_MANAGEMENT_PATH . 'room/inc_room/metabox-room-infomation-ui.php';
    }

    // Lưu giá trị của các trường trong metabox khi lưu post
    function save_custom_room_metabox($post_id)
    {
        // Kiểm tra nonce để bảo vệ form
        // if (!isset($_POST['custom_post_metabox_nonce']) || !wp_verify_nonce($_POST['custom_post_metabox_nonce'], 'custom_movie_metabox')) {
        //     return;
        // } 

        // Kiểm tra quyền hạn của user
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        // Lưu giá trị của trường quantity_chair_normal
        if (isset($_POST['quantity_chair_normal'])) {
            // die($_POST['quantity_chair_normal']);
            update_post_meta($post_id, '_quantity_chair_normal', sanitize_text_field($_POST['quantity_chair_normal']));
        }

        // Lưu giá trị của trường quantity_chair_normal
         if (isset($_POST['quantity_chair_vip'])) {
            // die($_POST['quantity_chair_vip']);
            update_post_meta($post_id, '_quantity_chair_vip', sanitize_text_field($_POST['quantity_chair_vip']));
        }

    }
/**************************************************
 * End Customize meta box project information
 **************************************************/
}

new CreateRoomsMetaBox();