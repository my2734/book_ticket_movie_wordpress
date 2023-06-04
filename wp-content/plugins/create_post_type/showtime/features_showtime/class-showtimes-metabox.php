<?php

class CreateShowtimesMetaBox extends CreateShowtimes
{
    public function __construct()
    {
        // Add meta box project information 
        add_action('add_meta_boxes', [$this, 'custom_showtimes_metabox']);
        add_action('save_post', [$this, 'save_custom_movie_metabox'], 20);
    }

    /**************************************************
     * Start Customize meta box project information
     **************************************************/
    function custom_showtimes_metabox()
    {
        add_meta_box(
            // ID của metabox, phải là duy nhất
            'custom_showtimes_metabox',
            // Tiêu đề của metabox
            'Infomation Another',
            // Callback function để hiển thị nội dung metabox
            [$this, 'custom_showtimes_metabox_callback'],
            // Tên của custom post type mà bạn muốn thêm metabox vào
            $this->post_type,
            // Vị trí của metabox: normal (bên cạnh editor), side (ở bên phải) hoặc advanced (ở dưới editor)
            'normal',
            // Ưu tiên hiển thị của metabox (high, core hoặc default)
            'high'
        );
    }

    function custom_showtimes_metabox_callback($post)
    {
        require_once PROJECT_MANAGEMENT_PATH . 'showtime/inc_showtime/metabox-shoswtimes-information-ui.php';
    }

    // Lưu giá trị của các trường trong metabox khi lưu post
    function save_custom_movie_metabox($post_id)
    {
        // Kiểm tra nonce để bảo vệ form
        // if (!isset($_POST['custom_post_metabox_nonce']) || !wp_verify_nonce($_POST['custom_post_metabox_nonce'], 'custom_movie_metabox')) {
        //     return;
        // } 

        // Kiểm tra quyền hạn của user
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        // Lưu giá trị của trường movie_name
        if (isset($_POST['movie_id'])) {
            // die($_POST['movie_id']);
            update_post_meta($post_id, '_movie_id', sanitize_text_field($_POST['movie_id']));
        }

         // Lưu giá trị của trường room
         if (isset($_POST['room_id'])) {
            // die($_POST['room_id']);
            update_post_meta($post_id, '_room_id', sanitize_text_field($_POST['room_id']));
        }

        //Lưu giá trị của trường date_show
        if (isset($_POST['date_show'])) {
            // die($_POST['date_show']);
            update_post_meta($post_id, '_date_show', sanitize_text_field($_POST['date_show']));
        }

        //Lưu giá trị của trường time_show
        if (isset($_POST['time_show'])) {
            // die($_POST['time_show']);
            update_post_meta($post_id, '_time_show', sanitize_text_field($_POST['time_show']));
        }

        // update_post_meta($post_id, '_array_chair_normal', []);
        update_post_meta($post_id, '_array_chair', []);
    }
/**************************************************
 * End Customize meta box project information
 **************************************************/
}

new CreateShowtimesMetaBox();