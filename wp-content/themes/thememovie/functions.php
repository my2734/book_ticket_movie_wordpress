<?php 
    global $theme_prefix,$theme_uri;
    $theme_prefix = "thememovie";
    $theme_uri = get_template_directory_uri();

    add_action('wp_enqueue_scripts', 'thememovie_theme_register_style');

    function thememovie_theme_register_style(){
        global $theme_uri,$theme_prefix;
        wp_enqueue_style( $theme_prefix.'font-awesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" );
        wp_enqueue_style( $theme_prefix.'bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css");
        wp_enqueue_style( $theme_prefix.'custom-css', $theme_uri."/assets/css/style.css" );
        wp_enqueue_style( $theme_prefix.'aos-css', "https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" );


        wp_enqueue_script( $theme_prefix.'jquery', "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" );
        wp_enqueue_script( $theme_prefix.'js', $theme_uri."/assets/js/script.js" );
    }

    add_action( 'after_setup_theme', 'thememovie_register_nav_menu', 0 );

    function thememovie_register_nav_menu(){
        register_nav_menus( array(
	    	'primary_menu' => __( 'Primary Menu', 'text_domain' ),
		) );

        add_theme_support( 'post-thumbnails' );
    }

     // AJAX
     add_action('wp_ajax_ajax_showtime_frontend',  "ajax_showtime_frontend");
     add_action('wp_ajax_nopriv_ajax_showtime_frontend',  "ajax_showtime_frontend");

     function ajax_showtime_frontend(){
        $showtime_id = (isset($_POST['showtime_id']))?esc_attr($_POST['showtime_id']):"";
        $room_id = get_post_meta($showtime_id,'_room_id',true);
        $data = [];
        $data['quantity_chair_vip']  = get_post_meta($room_id, '_quantity_chair_vip',true);
        $data['quantity_chair_normal']  = get_post_meta($room_id, '_quantity_chair_normal',true);
        $data['array_chair']  = get_post_meta($showtime_id, '_array_chair',false);
        wp_send_json_success($data);
        die();//bắt buộc phải có khi kết thúc
     }

?>