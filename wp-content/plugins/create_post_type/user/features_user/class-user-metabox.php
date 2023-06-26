<?php

class CreateUserMetaBox extends CreateUser
{
    public function __construct()
    {
        // die("hello ca nha yeu");
        // Add meta box project information 
        add_action('add_meta_boxes', [$this, 'custom_user_metabox']);
        add_action('save_post', [$this, 'save_custom_user_metabox'], 20);
    }

    /**************************************************
     * Start Customize meta box project information
     **************************************************/
    function custom_user_metabox()
    {
        add_meta_box(
            // ID của metabox, phải là duy nhất
            'custom_user_metabox',
            // Tiêu đề của metabox
            'Infomation User',
            // Callback function để hiển thị nội dung metabox
            [$this, 'custom_user_metabox_callback'],
            // Tên của custom post type mà bạn muốn thêm metabox vào
            $this->post_type,
            // Vị trí của metabox: normal (bên cạnh editor), side (ở bên phải) hoặc advanced (ở dưới editor)
            'normal',
            // Ưu tiên hiển thị của metabox (high, core hoặc default)
            'high'
        );
    }

    function custom_user_metabox_callback($post)
    {
        require_once PROJECT_MANAGEMENT_PATH . 'user/inc_user/metabox-user-infomation-ui.php';
    }

    // Lưu giá trị của các trường trong metabox khi lưu post
    function save_custom_user_metabox($post_id)
    {
        // Kiểm tra nonce để bảo vệ form
        // if (!isset($_POST['custom_post_metabox_nonce']) || !wp_verify_nonce($_POST['custom_post_metabox_nonce'], 'custom_movie_metabox')) {
        //     return;
        // } 

        // Kiểm tra quyền hạn của user
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        // Lưu giá trị của trường email
        if (isset($_POST['email'])) {
            update_post_meta($post_id, '_email', sanitize_text_field($_POST['email']));
        }

         // Lưu giá trị của trường password
         if (isset($_POST['password'])) {
            $password =md5($_POST['password']);
            update_post_meta($post_id, '_password',$password);
        }
    }
/**************************************************
 * End Customize meta box project information
 **************************************************/
}

new CreateUserMetaBox();