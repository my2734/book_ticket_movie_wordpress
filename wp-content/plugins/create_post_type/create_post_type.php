<?php 

/*
Plugin Name: Post Type Management
Description: Plugin project management for manage member, task,...
Version: 1.0.0
Author: Pham My
License: Giấy phép sử dụng của plugin (ví dụ: GPL2)
*/

if (!defined('PROJECT_MANAGEMENT_PATH')) {
    define('PROJECT_MANAGEMENT_PATH', plugin_dir_path(__FILE__));
}
if (!defined('PROJECT_MANAGEMENT_URL')) {
    define('PROJECT_MANAGEMENT_URL', plugin_dir_url(__FILE__));
}


require_once(PROJECT_MANAGEMENT_PATH . 'movie/features_movie/class-movie-create.php');
require_once(PROJECT_MANAGEMENT_PATH . 'room/features_room/class-room-create.php');
require_once(PROJECT_MANAGEMENT_PATH . 'showtime/features_showtime/class-showtimes-create.php');
require_once(PROJECT_MANAGEMENT_PATH . 'ticket/feature_ticket/class-ticket-create.php');
require_once(PROJECT_MANAGEMENT_PATH . 'user/features_user/class-user-create.php');
require_once(PROJECT_MANAGEMENT_PATH . 'shortcode/shortcode_init.php');
require_once(PROJECT_MANAGEMENT_PATH . 'dashboard/supporthost-admin-table/supporthost-admin-table.php');
// die("hello ca nha yeu");


// CreateProJectManagement
new CreateMovie();
new CreateRoom();
new CreateShowtimes();
new CreateTicket();
new CreartShortcode();
new CreateUser();

// new Supporthost_List_Table();
