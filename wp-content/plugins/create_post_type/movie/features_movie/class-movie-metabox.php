<?php

class CreateMovieMetaBox extends CreateMovie
{
    public function __construct()
    {
        // Add meta box project information 
        add_action('add_meta_boxes', [$this, 'custom_movie_metabox']);
        add_action('save_post', [$this, 'save_custom_movie_metabox'], 20);
    }

    /**************************************************
     * Start Customize meta box project information
     **************************************************/
    function custom_movie_metabox()
    {
        add_meta_box(
            // ID của metabox, phải là duy nhất
            'custom_movie_metabox',
            // Tiêu đề của metabox
            'Infomation Another',
            // Callback function để hiển thị nội dung metabox
            [$this, 'custom_movie_metabox_callback'],
            // Tên của custom post type mà bạn muốn thêm metabox vào
            $this->post_type,
            // Vị trí của metabox: normal (bên cạnh editor), side (ở bên phải) hoặc advanced (ở dưới editor)
            'normal',
            // Ưu tiên hiển thị của metabox (high, core hoặc default)
            'high'
        );
    }

    function custom_movie_metabox_callback($post)
    {
        require_once PROJECT_MANAGEMENT_PATH . 'movie/inc_movie/metabox-movie-information-ui.php';
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

        $errors = array();
        if(isset($_POST['post_title'])){
            if($_POST['post_title'] == ""){
                remove_action('save_post', [$this, 'save_custom_movie_metabox']);
                // remove_action('save_post', [$this, 'save_custom_movie_metabox'], 20);
                $errors['title'] = "The title is required";
                // die($errors['title']);
                // die("hello ca nha yeu");
            }
        }

        // Lưu giá trị của trường time
        if (isset($_POST['time'])) {
            update_post_meta($post_id, '_time', sanitize_text_field($_POST['time']));
        }

         // Lưu giá trị của trường description
         if (isset($_POST['description'])) {
            update_post_meta($post_id, '_description', sanitize_text_field($_POST['description']));
        }

        //Luu gia tri truong genre
        if (isset($_POST['genre'])) {
            update_post_meta($post_id, '_genre', sanitize_text_field($_POST['genre']));
        }

        //luu gia tri truong director
        if(isset($_POST['director'])){
            // die($_POST['director']);
            update_post_meta($post_id, '_director',sanitize_text_field($_POST['director']));
        }

        //luu gia tri truong link_ytb
        if(isset($_POST['link_ytb'])){
            // die($_POST['link_ytb']);
            update_post_meta($post_id,'_link_ytb',sanitize_text_field($_POST['link_ytb']));
        }

        //luu gia tri truong actors
        if(isset($_POST['actors'])){
            // die($_POST['actors']);
            update_post_meta($post_id,'_actors',sanitize_text_field($_POST['actors']));
        }
    }
/**************************************************
 * End Customize meta box project information
 **************************************************/
}

new CreateMovieMetaBox();