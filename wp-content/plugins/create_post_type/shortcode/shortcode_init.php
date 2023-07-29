<?php

use Nextend\Framework\Data\Data;
use Nextend\Framework\Form\Element\Message;

class CreartShortcode
{
    function __construct()
    {
        require_once(ABSPATH . 'wp-includes/class-phpass.php');
        include_once($_SERVER['DOCUMENT_ROOT'] . "/wp-config.php");
        include_once($_SERVER['DOCUMENT_ROOT'] . "/wp-includes/registration.php");
        include_once($_SERVER['DOCUMENT_ROOT'] . "/wp-includes/user.php");
        //init session
        add_action("init", [$this, 'session_init']);
        add_shortcode('query_taxonomy_genre_loop', [$this, 'func_query_taxonomy_genre_loop']);
        add_shortcode('demo_shortcode', [$this, 'demo_shortcode']);
        add_shortcode('get_director_of_movie', [$this, 'get_director_of_movie_shortcode']);
        add_shortcode('get_time_of_movie', [$this, 'get_time_of_movie_shortcode']);
        add_shortcode('get_actors_of_movie', [$this, 'get_actors_of_movie_shortcode']);
        add_shortcode('get_description_of_movie', [$this, 'get_description_of_movie_shortcode']);
        add_shortcode('get_trailer_of_movie', [$this, 'get_trailer_of_movie_shortcode']);
        add_shortcode('demo_showtimes_of_movie', [$this, 'demo_showtimes_of_movie_shortcode']);
        add_shortcode('showtime_name_movie', [$this, 'showtime_name_movie_shortcode']);
        add_shortcode('showtime_image_movie', [$this, 'showtime_image_movie_shortcode']);
        add_shortcode('showtime_info_detail_movie', [$this, 'showtime_info_detail_movie_shortcode']);
        add_shortcode('showtime_chair_movie', [$this, 'showtime_chair_movie_shortcode']);
        add_shortcode('showtime_note_chair', [$this, 'showtime_note_chair_shortcode']);
        add_shortcode('showtime_input_book_ticket', [$this, 'showtime_input_book_ticket_shortcode']);
        add_shortcode('showtime_note_price', [$this, 'showtime_note_price_shortcode']);
        add_shortcode('showtime_detail_booking', [$this, 'showtime_detail_booking_shortcode']);

        // AJAX
        add_action('wp_ajax_ajax_book_ticket',  [$this, 'ajax_book_ticket_init']);
        add_action('wp_ajax_nopriv_ajax_book_ticket',  [$this, 'ajax_book_ticket_init']);
        add_action('wp_ajax_sesstion_logout',  [$this, 'sesstion_logout_init']);
        add_action('wp_ajax_nopriv_sesstion_logout',  [$this, 'sesstion_logout_init']);

        add_action('enqueue_block_editor_assets', [$this, 'myguten_enqueue']);
        // add_action('wp_enqueue_scripts', [$this, 'tutsplus_enqueue_custom_js'] );


        //contact page
        add_shortcode('googlemap_contact', [$this, 'googlemap_contact_shortcode']);
        add_shortcode('contact_form_contact', [$this, 'contact_form_contact_shortcode']);

        //movie
        add_shortcode('notifycation_showtimes_shortcode', [$this, 'notifycation_showtimes_shortcode']);
        add_shortcode('end_shortcode_movie', [$this, 'end_shortcode_movie_shortcode']);
        add_shortcode('list_event', [$this, 'list_event_shortcode']);
        add_shortcode('genre_movie', [$this, 'genre_movie_shortcode']);
        add_shortcode('movie_popular', [$this, 'movie_popular_shortcode']);
        add_shortcode('movie_new', [$this, 'movie_new_shortcode']);
        add_shortcode('display_list_movie', [$this, 'display_list_movie_shortcode']);
        add_shortcode('display_list_movie_pagination', [$this, 'display_list_movie_pagination_shortcode']);
        add_shortcode('movie_now_showing', [$this, 'movie_now_showing_shortcode']);

        //demo page
        add_shortcode('display_list_movie_pagination_demo_page', [$this, 'display_list_movie_pagination_demo_page_shortcode']);

        //register
        add_shortcode('register_form', [$this, 'register_form_shortcode']);
        add_shortcode('login_form', [$this, 'login_form_shortcode']);

        add_action('wp_ajax_handler_register',  [$this, 'handler_register_init']);
        add_action('wp_ajax_nopriv_handler_register',  [$this, 'handler_register_init']);


        add_shortcode('demo_session_login', [$this, 'demo_session_login_shortcode']);
        //header
        add_shortcode('handler_header_authentication', [$this, 'handler_header_authentication_shortcode']);
        add_shortcode('scroll_top', [$this, 'scroll_top_shortcode']);

        // login
        add_action('wp_ajax_handler_login',  [$this, 'handler_login_init']);
        add_action('wp_ajax_nopriv_handler_login',  [$this, 'handler_login_init']);


        //history booking ticket 
        add_shortcode('table_display_history_booking', [$this, 'table_display_history_booking_shortcode']);
        //test session login
        add_action('wp_ajax_test_session_login',  [$this, 'test_session_login_init']);
        add_action('wp_ajax_nopriv_test_session_login',  [$this, 'test_session_login_init']);

        //event
        add_shortcode('get_start_date_of_event', [$this, 'get_start_date_of_event_shortcode']);

        add_action('wp_ajax_add_apply_discount',  [$this, 'add_apply_discount_init']);
        add_action('wp_ajax_nopriv_add_apply_discount',  [$this, 'add_apply_discount_init']);

        //showtimes
        add_shortcode('list_event_showtime', [$this, 'list_event_showtime_shortcode']);
        add_action('wp_ajax_choose_unchose_event',  [$this, 'choose_unchose_event_init']);
        add_action('wp_ajax_nopriv_choose_unchose_event',  [$this, 'choose_unchose_event_init']);

        //Dashboard
        add_action('wp_ajax_filter_datetable_show',  [$this, 'filter_datetable_show_init']);
        add_action('wp_ajax_nopriv_filter_datetable_show',  [$this, 'filter_datetable_show_init']);

        add_action('wp_ajax_filter_datetable_show_start_end_start',  [$this, 'filter_datetable_show_start_end_start_init']);
        add_action('wp_ajax_nopriv_filter_datetable_show_start_end_start',  [$this, 'filter_datetable_show_start_end_start_init']);

        add_action('wp_ajax_filter_chart_movie_time',  [$this, 'filter_chart_movie_time_init']);
        add_action('wp_ajax_nopriv_filter_chart_movie_time',  [$this, 'filter_chart_movie_time_init']);

        add_action('wp_ajax_filter_chart_movie_start_end_date',  [$this, 'filter_chart_movie_start_end_date_init']);
        add_action('wp_ajax_nopriv_filter_chart_movie_start_end_date',  [$this, 'filter_chart_movie_start_end_date_init']);
    }

    function session_init()
    {
        if (!session_id()) {
            session_start();
            // $_SESSION['login'] = true;
        }
    }

    function notifycation_showtimes_shortcode()
    {
        $movie_id = get_the_title();
        return "<span class='badge bg-warning text-dark my-0'>" . $movie_id . "</span>";
    }

    function ajax_book_ticket_init()
    {
        $showtime_id = isset($_POST['showtime_id']) ? $_POST['showtime_id'] : "";
        $arrIndexChair = isset($_POST['arrIndexChair']) ? $_POST['arrIndexChair'] : [];
        $total = isset($_POST['total']) ? $_POST['total'] : 0;
        $fullName = isset($_POST['fullName']) ? $_POST['fullName'] : "";
        $phone = isset($_POST['phone']) ? $_POST['phone'] : "";
        $email = isset($_POST['email']) ? $_POST['email'] : "";

        //handler title ticket
        $movie_id = get_post_meta($showtime_id, '_movie_id', true);
        $room_id = get_post_meta($showtime_id, '_room_id', true);
        $movie_name = get_the_title($movie_id);
        $room_name = get_the_title($room_id);
        $date_show = get_post_meta($showtime_id, '_date_show', true);
        $time_show = get_post_meta($showtime_id, '_time_show', true);
        $title_ticket = $movie_name . ' ' . $room_name . " " . $date_show . " " . $time_show;
        $ticket_id = wp_insert_post(
            array(
                'post_type' => 'ticket',
                'post_title' => $title_ticket,
                'post_status' => 'publish',
                'meta_input'    => array(
                    array(
                        'key'   => '_chair_id',
                        'value' => []
                    )
                )
            )
        );

        update_post_meta($ticket_id, '_chair_id', $arrIndexChair);
        update_post_meta($ticket_id, '_showtime_id', $showtime_id);
        update_post_meta($ticket_id, '_price', $total);
        update_post_meta($ticket_id, '_name_buyer', $fullName);
        update_post_meta($ticket_id, '_phone', $phone);
        update_post_meta($ticket_id, '_email', $email);
        $time_now  = date('Y-m-d H:i:s');
        update_post_meta($ticket_id, '_time_booking', $time_now);
        //handler event discount code
        $promotion_price = $total;
        if (isset($_SESSION['user_info']['event_id']) && $_SESSION['user_info']['event_id'] != "") {
            $event_id = $_SESSION['user_info']['event_id'];
            $percent_discount = get_post_meta($event_id, '_percent_discount', true);
            $promotion_price = $total - $total * ($percent_discount / 100);
            update_post_meta($ticket_id, '_event_id', $event_id);
        }
        update_post_meta($ticket_id, '_price_promotion', $promotion_price);


        //update array_chair
        $array_chair = get_post_meta($showtime_id, '_array_chair', false)[0]; //array seat_position old

        //user_id 
        $user_id = get_current_user_id();
        if ($user_id != "") {
            update_post_meta($ticket_id, '_user_id', $user_id);
        }
        foreach ($arrIndexChair as $seat_position_new_item) {
            $seat_position_new_item = json_decode($seat_position_new_item);
            if (!in_array($seat_position_new_item, $array_chair)) {
                array_push($array_chair, $seat_position_new_item);
            }
        }

        update_post_meta($showtime_id, '_array_chair', $array_chair);

        $argResult['_array_chair'] = $showtime_id;
        $argResult['ticket_id'] = json_encode(get_post_meta($ticket_id));
        $argResult['arrIndexChair'] = $arrIndexChair;
        $argResult['user_id'] = $user_id;
        $argResult['title_ticket'] = $title_ticket;
        wp_send_json_success($argResult);
        die();
    }

    function func_query_taxonomy_genre_loop()
    {
        $taxonomies = get_taxonomies(['object_type' => ['movie']]);
        $taxonomyTerms = [];
        foreach ($taxonomies as $taxonomy) {
            $terms    = get_terms(['taxonomy' => $taxonomy, 'hide_empty' => false]);
            $hasTerms = is_array($terms) && $terms;
            if ($hasTerms) {
                $taxonomyTerms[$taxonomy] = $terms;
            }
        }
        $argGenre = $taxonomyTerms['genreMovie'];
        $displayList = "<div class='custom-div-genre'>";
        foreach ($argGenre as $genre) {
            $displayList .= "<a style='margin-right: 20px !important;' href='" . get_term_link($genre->term_id) . "' class='custom_btn_geren_list'>" . $genre->name . "</a>";
        }
        $displayList .= "/<div>";
        // $displayList .= '<div class="fakeLoader"></div>';
        return $displayList;
    }

    function demo_shortcode()
    {
        $id = '<iframe width="560" height="315" src="https://www.youtube.com/embed/2EnP2tVC00Q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
        return $id;
    }

    function get_director_of_movie_shortcode()
    {
        $director = get_post_meta(get_the_ID(), '_director', true);
        return "<p class='custom-text-info'>" . $director . "</p>";
    }

    function get_time_of_movie_shortcode()
    {
        $time = get_post_meta(get_the_ID(), '_time', true);
        return "<p class='custom-text-info'>" . $time . " minute </p>";
    }

    function get_actors_of_movie_shortcode()
    {
        $actors = get_post_meta(get_the_ID(), '_actors', true);
        return "<p class='custom-text-info'>" . $actors . "</p>";
    }

    function get_description_of_movie_shortcode()
    {
        $description = get_post_meta(get_the_ID(), '_description', true);
        return "<p class='custom-text-info'>" . $description . "</p>";
    }

    function get_trailer_of_movie_shortcode()
    {
        $link_ytb = get_post_meta(get_the_ID(), '_link_ytb', true);
        return  '<iframe class="mt-5" width="100%" height="400" src="https://www.youtube.com/embed/' . $link_ytb . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
    }

    function demo_showtimes_of_movie_shortcode()
    {
        $datetime =  new DateTime();
        $datetime = $datetime->format('Y-m-d');
        $movie_id = get_the_ID();
        $arg_showtimes = array(
            'post_type' => 'showtimes',
            'meta_query' => array(
                array(
                    'key' => '_movie_id',
                    'compare' => '=',
                    'value' => $movie_id,
                ),
                array(
                    'key' => '_date_show',
                    'compare' => '>=',
                    'value' => $datetime,
                )
            )
        );
        $list_showtimes = get_posts($arg_showtimes);
        // return json_encode($list_showtimes);
        $time_now =  date('H');
        // return $time_now;
        $html = '';
        foreach ($list_showtimes as $key => $showtime) {

            $time_show = explode('h', get_post_meta($showtime->ID, '_time_show', true))[0];
            // return $time_show;
            if ($time_show <= $time_now && get_post_meta($showtime->ID, '_date_show', true) == $datetime) {
                // array_splice($list_showtimes,$key,1);
                unset($list_showtimes[$key]);
            }
        }
        // array_splice($list_showtimes,0,1);
        // array_splice($list_showtimes,0,1);
        // return json_encode($list_showtimes);
        // return count($list_showtimes);
        if (count($list_showtimes) > 0) {
            $html = "<h3 class='mt-3'>Suất chiếu:</h3>";
            $html .= "<table class=' table mt-2 table-dark table-striped' style='background-color: white;'>
            <thead>
              <tr>
                <th >ID</th>
                <th >Ngày khởi chiếu</th>
                <th >Thời gian chiếu</th>
                <th >Phòng chiếu</th>
                <th >Đặt vé</th>
              </tr>
          </thead>
          <tbody>
              ";
            foreach ($list_showtimes as $key => $showtime) {
                $user_id = get_current_user_id();
                $html = $html . ' <tr>
                <td class="">' . ($key + 1) . '</td>
                <td class="">' . get_post_meta($showtime->ID, '_date_show', true) . '</td>
                <td class="">' . get_post_meta($showtime->ID, '_time_show', true) . '</td>
                <td class="">' . get_the_title(get_post_meta($showtime->ID, '_room_id', true)) . '</td>
                <td class="">';
                if ($user_id != "") {
                    $html .= '<a href=' . get_permalink($showtime->ID) . ' class="custom-btn-showtime">Book now</a>';
                } else {
                    $html .= '<a href="http://book_tickets_movie2.local/login/" class="custom-btn-showtime">Book now</a>';
                }
                $html .= '</td>
              </tr>';
            }

            $html = $html . '</tbody></table>';
        } else {
            $html = "<h1 style='margin-top: 50px;'>
            The movie has no screenings yet. See you on another occasion</h1>";
        }
        return $html;
    }

    function showtime_name_movie_shortcode()
    {
        $showtime_id = get_the_ID();
        $movie_id = get_post_meta($showtime_id, '_movie_id', true);
        $movie_name = get_the_title($movie_id);
        return "<h3>" . $movie_name . "</h3>";
    }

    function showtime_image_movie_shortcode()
    {
        $showtime_id = get_the_ID();
        $movie_id = get_post_meta($showtime_id, '_movie_id', true);
        $image = get_the_post_thumbnail($movie_id);
        return $image;
    }

    function showtime_info_detail_movie_shortcode()
    {
        $showtime_id = get_the_ID();
        $movie_id = get_post_meta($showtime_id, '_movie_id', true);
        $director = get_post_meta($movie_id, '_director', true);
        $time = get_post_meta($movie_id, '_time', true);
        $actors = get_post_meta($movie_id, '_actors', true);
        $descripton = get_post_meta($movie_id, '_description', true);
        $html = "<div style='color: white; font-size: 18px;'>";
        $html .= "<p>Director: " . $director . "</p>";
        $html .= "<p>Time: " . $time . " minute</p>";
        $html .= "<p>Actors: " . $actors . "</p>";
        $html .= "<p>Description: " . $descripton . "</p>";
        $html .= "</div>";
        return $html;
    }

    function showtime_chair_movie_shortcode()
    {
        $showtime_id = get_the_ID();
        // $movie_id = get_post_meta($showtime_id, '_movie_id',true);
        $room_id = get_post_meta($showtime_id, '_room_id', true);
        $quantity_chair_vip = get_post_meta($room_id, '_quantity_chair_vip', true);
        $quantity_chair_normal = get_post_meta($room_id, '_quantity_chair_normal', true);
        $arr_chair_id = get_post_meta($showtime_id, '_array_chair', false)[0];

        $html = "";
        for ($i = 1; $i <= $quantity_chair_vip; $i++) {
            $class_book = in_array($i, $arr_chair_id) ? 'custom-chair-showtime-book' : 'custom-chair-showtime-vip choose_chair';
            $html .= "<span value='" . $i . "' status='vip' class=' custom-chair-showtime " . $class_book . "'>A" . $i . "</span>";
        }
        for ($i = $quantity_chair_vip + 1; $i <= $quantity_chair_normal + $quantity_chair_vip; $i++) {
            $class_book = in_array($i, $arr_chair_id) ? 'custom-chair-showtime-book' : 'custom-chair-showtime-normal choose_chair';
            $html .= "<span value='" . $i . "' status='normal' class=' custom-chair-showtime " . $class_book . "'>B" . $i . "</span>";
        }

        return $html;
    }

    function myguten_enqueue()
    {
        wp_enqueue_script(
            'jquey',
            'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js'
        );
        wp_enqueue_script(
            'myguten-script',
            plugins_url('myguten.js', __FILE__),
            array('jquery'),
            '1.0.0',
            true
        );
    }

    function showtime_note_chair_shortcode()
    {
        $html = "<div style='color: white'>";
        $html .= "<span class='custom-chair-showtime custom-chair-showtime-vip'>1A</span> Chair vip";
        $html .= "<span style='margin-left: 40px;' class='custom-chair-showtime custom-chair-showtime-normal'>1A</span> Chair thường";
        $html .= "<span style='margin-left: 40px;' class='custom-chair-showtime custom-chair-showtime-book'>1A</span> Chair has been choose";
        $html .= "<span style='margin-left: 40px;' class='custom-chair-showtime custom-chair-showtime-booking'>1A</span> Chair choose";
        // $html .= "<button class='btn btn-primary'>demo<button>";
        // $html .= "<div><button class='custom-btn-showtime btn-submit-book' style='font-size: 20px;'>Book now</button></div></div>";
        return $html;
    }

    function showtime_input_book_ticket_shortcode()
    {
        $user_id = get_current_user_id();
        $user = ($user_id != "") ? get_userdata($user_id) : "";
        $email = ($user != "") ? $user->user_email : "";
        $full_name = ($user != "") ? $user->user_login : "";
        $html = "<div class='row'>";
        $html .= "<div class='col-sm-6 mt-3'>
                    <input id='fullNameBook' type='text' class='form-control value=" . $full_name . " custom-input-book-ticket'  placeholder='Full name'>
                </div>";
        $html .= "<div class='col-sm-6 mt-3'><input id='phoneBook' type='text' class='form-control custom-input-book-ticket' placeholder='Phone'></div>";
        $html .= "<div class='col-sm-6 mt-3'><input id='emailBook' type='text'  value=" . $email . "  class='form-control custom-input-book-ticket' placeholder='Email'></div>";
        $html .= "<div class='col-sm-12 text-center mt-3'><button class='btn custom-btn-showtime btn-submit-book-ticket'>Book now</button></div>";
        $html .= "</div>";
        $html .= "<input class='d-none' type='text' id='showtime_id' name='showtime_id' value=" . get_the_ID() . ">";
        $html .= "<input class='d-none' type='text' id='total_ticket' >";
        return $html;
    }

    function showtime_note_price_shortcode()
    {
        $html = "<h3>Price ticket:</h3>";
        $html .= "<p>Ticket vip: 90.000vnd/vé</p>";
        $html .= "<p>Ticket normal: 70.000vnd/vé</p>";
        return $html;
    }

    function showtime_detail_booking_shortcode()
    {
        $showtime_id = get_the_ID();
        $movie_id = get_post_meta($showtime_id, '_movie_id', true);
        $room_id = get_post_meta($showtime_id, '_room_id', true);
        $movie_name = get_the_title($movie_id);
        $room_name = get_the_title($room_id);
        $date_show = get_post_meta($showtime_id, '_date_show', true);
        $time_show = get_post_meta($showtime_id, '_time_show', true);
        $html = "<h3>Ticket detail: </h3>";
        $html .= "<p>Movie name: " . $movie_name . "</p>";
        $html .= "<p>Room show: " . $room_name . "</p>";
        $html .= "<p>Date show: " . $date_show . "</p>";
        $html .= "<p>Time show: " . $time_show . "</p>";
        $html .= "<p class='price-ticket'></p>";
        $html .= "<p class='fullName-ticket'></p>";
        $html .= "<p class='phone-ticket'></p>";
        $html .= "<p class='email-ticket'></p>";
        $html .= '<div class="alert alert-danger d-none alert-danger-chair" role="alert">
            <strong>Please choose a chair</strong>
      </div>';
        return $html;
    }

    // function tutsplus_enqueue_custom_js(){
    //     wp_enqueue_script('custom', get_stylesheet_directory_uri().'/scripts/custom.js');
    // }

    function googlemap_contact_shortcode()
    {
        $html = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.8414543770905!2d105.76804037437331!3d10.029938972520222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0895a51d60719%3A0x9d76b0035f6d53d0!2zxJDhuqFpIGjhu41jIEPhuqduIFRoxqE!5e0!3m2!1svi!2s!4v1687494374371!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
        return $html;
    }

    function contact_form_contact_shortcode()
    {
        $html  = '<div class="row mb-5 mt-5">
        <div class="col-12">
            <div class="alert alert-success alert-contact-success d-none" role="alert">
                Message send success!!!
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <!-- <span class="custom-label-contact">Name</span> -->
            <input id="name_contact" class="form-control custom-input-contact text-white" name="name" placeholder="Name *" type="text">
            <span class="text-danger message_error_name"></span>
        </div>
        <div class="col-md-6 mb-2">
            <!-- <span class="custom-label-contact">Email</span> -->
            <input id="email_contact" class="form-control custom-input-contact text-white input_email" name="email" placeholder="Email *" type="email">
            <span class="text-danger message_error_email"></span>
        </div>
        <div class="col-md-6 mb-2">
            <!-- <span class="custom-label-contact">Subject</span> -->
            <input id="subject_contact" class="form-control custom-input-contact text-white" name="subject" placeholder="Subject *" type="text">
            <span class="text-danger message_error_subject"></span>
        </div>
        <div class="col-md-6 mb-2">
            <!-- <span class="custom-label-contact">Phone</span> -->
            <input id="phone_contact" class="form-control custom-input-contact text-white" name="phone" placeholder="Phone *" type="text">
            <span class="text-danger message_error_phone"></span>
        </div>
        <div class="col-12 mb-2">
            <!-- <span class="custom-label-contact">Message</span> -->
            <input id="message_contact" class="form-control custom-input-contact text-white" name="message" placeholder="Message *" type="text">
            <span class="text-danger message_error_message"></span>
        </div>
        <div class="col-12 mb-2 text-center mt-4">
            <button class="btn custom-btn-showtime btn-contact-form">Submit</button>
        </div>
    </div>';
        return $html;
    }

    // register
    function register_form_shortcode()
    {
        // return "<h1>Hello ca nha yeu</h1>";
        $html = '
            <h3 class="p-0 m-0 text-center">Register Form</h3>
            <div class="alert alert-danger d-none alert_register_error" role="alert">
            </div>
            <div class="m-0 p-0 mt-4">
                <span class="my-1">Username</span>
                <input id="userNameRegister" type="text" class="form-control custom-input-register">
                <span id="userNameRegister_error" class="text-danger"></span>
            </div>
            <div class="m-0 p-0 mt-4">
                <span class="my-1">Email</span>
                <input id="emailRegister" type="text" class="form-control custom-input-register">
                <span id="emailRegister_error" class="text-danger"></span>
            </div>
            <div class="m-0 p-0 mt-4">
                <span class="my-1">Password</span>
                <input id="passwordRegister" type="password" class="form-control custom-input-register">
                <span id="passwordRegister_error" class="text-danger"></span>
            </div>
            <div class="m-0 p-0 mt-4">
                <span class="my-1">Confirm Password</span>
                <input id="password2Register" type="password" class="form-control custom-input-register">
                <span id="password2Register_error" class="text-danger"></span>
            </div>
            <div class="m-0 p-0 mt-4 text-center">
                <button class="custom-btn-showtime btn-submit-register">Register</button>
            </div>
        ';
        return $html;
    }

    function login_form_shortcode()
    {
        $html = '
            <div class="alert alert-danger alert_login d-none" role="alert">             
            </div>
            <h3 class="p-0 m-0 text-center">Login Form</h3>
            <div class="m-0 p-0 mt-4">
                <span class="my-1">Email</span>
                <input id="emailLogin" type="text" class="form-control custom-input-register">
                <span id="emailLogin_error" class="text-danger"></span>
            </div>
            <div class="m-0 p-0 mt-4">
                <span class="my-1">Password</span>
                <input id="passwordLogin" type="password" class="form-control custom-input-register">
                <span id="passwordLogin_error" class="text-danger"></span>

            </div>
            <div class="m-0 p-0 mt-4 text-center">
                <button class="custom-btn-showtime btn-submit-login">Login</button>
            </div>
        ';
        return $html;
    }

    function demo_session_login_shortcode()
    {

        // session_unset();
        // $status = isset($_SESSION['login'])?$_SESSION['login']:"Chua login";
        // return "<h1>".json_encode($_SESSION)."</h1>";
    }

    function handler_header_authentication_shortcode()
    {
        $user_id = get_current_user_id();
        if ($user_id) {
            $html = "<a href='http://book_tickets_movie2.local/historyorder/' class='custom-text-login' style='margin-right: 40px;'>History Book Ticket</a>";
            $html .= "<a class='custom-text-login btn_logout'>Logout</a>";
        } else {
            $html = "<a href='http://book_tickets_movie2.local/login' class='custom-text-login'>Login</a>";
        }
        return $html;
    }

    function sesstion_logout_init()
    {
        session_unset();
        wp_logout();
        $message = "true";
        wp_send_json_success($message);
        die();
    }

    function handler_register_init()
    {
        $username = isset($_POST['username']) ? $_POST['username'] : "";
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $password = isset($_POST['password']) ? $_POST['password'] : "";

        $user_query = new WP_User_Query(
            array(
                'search' => $email,
                'search_columns' => array('user_email')
            )
        );
        $user = $user_query->get_results();
        if (count($user) == 0) {
            $user_data = array(
                'user_login' => $username,
                'user_email' => $email,
                'display_name' => $username,
                'user_pass' => $password,
            );
            $user_id = wp_insert_user($user_data);
            $message = 'true';
        } else {
            $message = "Account already exists";
        }
        wp_send_json_success($message);
        die();
    }

    function handler_login_init()
    {
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $password = isset($_POST['password']) ? $_POST['password'] : "";
        global $wpdb;
        $user_query = new WP_User_Query(
            array(
                'search' => $email,
                'search_columns' => array('user_email')
            ),
        );
        $users = $user_query->get_results();
        if (count($users) > 0) {
            $user = $users[0];
            $user_id = $user->ID;
            $password_hashed = get_userdata($user_id)->user_pass;
            $wp_hasher = new PasswordHash(8, TRUE);
            if ($wp_hasher->CheckPassword($password, $password_hashed)) {
                //hander set current user
                $curr_user =  new WP_User($user_id, $user->user_login);
                // print_r($curr_user); // This trace is showed below.
                wp_set_auth_cookie($user_id);
                do_action('wp_login', $user->user_login);

                $message =  "true";
                // $user_id = get_current_user_id();
                // $message = $user_id;
            } else {
                $message =  "No, Wrong Password";
            }
        } else {
            $message = "Account does not exist";
        }

        wp_send_json_success($message);
        die();
        // wp_send_json_success(count($users));
        // die();

    }

    function table_display_history_booking_shortcode()
    {
        $user_id = get_current_user_id();
        $arg_ticket = array(
            'post_type' => 'ticket',
            'numberposts' => -1,
            'meta_query' => array(
                array(
                    'key' => '_user_id',
                    'compare' => '=',
                    'value' => $user_id,
                )
            )
        );

        $list_ticket = get_posts($arg_ticket);
        $html = '<div class="row">
            <div class="col-12">
                    <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Movie</th>
                        <th scope="col">Poster</th>
                        <th scope="col">Room</th>
                        <th scope="col">Date show</th>
                        <th scope="col">Time show</th>
                        <th scope="col">Position chair</th>
                        <th scope="col">Price</th>
                        <th scope="col">Promotion Price</th>
                        <th scope="col">Time Booking</th>
                    </tr>
                    </thead>
                    <tbody>';
        $i = 0;
        foreach ($list_ticket as $key => $ticket) {
            $i = ++$i;
            $ticket_id = $ticket->ID;
            $showtime_id = get_post_meta($ticket_id, '_showtime_id', true);
            // return "<h1>".json_encode($ticket_id)."</h1>";
            $movie_id = get_post_meta($showtime_id, '_movie_id', true);
            $room_id = get_post_meta($showtime_id, '_room_id', true);
            $quantity_chair_vip = get_post_meta($room_id, '_quantity_chair_vip', true);
            $string_chair = "";
            foreach (get_post_meta($ticket_id, '_chair_id', false)[0] as $key => $chair_item) {
                if ($chair_item <= $quantity_chair_vip) { //A
                    $string_chair .= 'A' . $chair_item;
                } else { //B
                    $string_chair .= 'B' . $chair_item;
                }
                if (($key + 1) < count(get_post_meta($ticket_id, '_chair_id', false)[0])) {
                    $string_chair .= ',';
                }
                $string_chair .= ' ';
            }

            // return json_encode(get_post_meta($ticket->ID));


            $html .= '<tr>
                            <th scope="row">' . $i . '</th>
                            <td><a class="custom-text-login custom-text-history-booking" href=' . get_the_permalink($movie_id) . '>' . get_the_title($movie_id) . '</a></td>
                            <td width="100">
                                <img style="height: 100px;" class="img-fluid" src="' . get_the_post_thumbnail_url($movie_id) . '">
                            </td>
                            <td>' . get_the_title($room_id) . '</td>
                            <td>' . get_post_meta($showtime_id, '_date_show', true) . '</td>
                            <td>' . get_post_meta($showtime_id, '_time_show', true) . '</td>
                            <td>' . $string_chair . '</td>
                            <td>' . number_format(get_post_meta($ticket_id, '_price', true)) . ' vnd</td>
                            <td>' . number_format(get_post_meta($ticket_id, '_price_promotion', true)) . ' vnd</td>
                            <td>' . get_post_meta($ticket_id, '_time_booking', true) . '</td>
                        </tr>';
        }

        $html .= '</tbody>
                </table>
            </div>
        </div>';
        return $html;
    }

    function test_session_login_init()
    {
        // $message = isset($_SESSION['login']) ? "true" : "false";
        $user_id = get_current_user_id();
        if ($user_id != "") {
            $message = "true";
        } else {
            $message = "false";
        }
        wp_send_json_success($message);
        die();
    }

    function list_event_shortcode()
    {
        $datetime =  new DateTime();
        $datetime = $datetime->format('Y-m-d');
        $argEvent = array(
            'post_type' => 'event',
            'meta_query' => array(
                array(
                    'key' => '_start_date',
                    'compare' => '<=',
                    'value' => $datetime,
                ),
                array(
                    'key' => '_end_date',
                    'compare' => '>=',
                    'value' => $datetime,
                ),
            )
        );
        $list_event = get_posts($argEvent);

        // return "<h1>Hello ca nha yeu</h1>";
        $html = '<div class="row align-items-center"> ';
        // <div class="col-md-3 bg-danger">
        //     <img style="width: 100%;" src="https://www.cgv.vn/media/wysiwyg/2022/122022/2023_Happy_Wed-01.png">
        // </div>
        foreach ($list_event as $event) {
            $html .= '<div class="col-md-3 position-relative">
                            <a href=' . get_the_permalink($event->ID) . '>
                                <img class="custom-event-image" src=' . get_the_post_thumbnail_url($event->ID) . '>
                            </a>
                        </div>';
        }

        $html .= '</div>';
        return $html;
    }

    function list_event_showtime_shortcode()
    {
        $datetime =  new DateTime();
        $datetime = $datetime->format('Y-m-d');
        $argEvent = array(
            'post_type' => 'event',
            'meta_query' => array(
                array(
                    'key' => '_start_date',
                    'compare' => '<=',
                    'value' => $datetime,
                ),
                array(
                    'key' => '_end_date',
                    'compare' => '>=',
                    'value' => $datetime,
                ),
            )
        );
        $user_id = get_current_user_id();
        $event_id_choose = ($user_id != "" && isset($_SESSION['user_info']['event_id'])) ? $_SESSION['user_info']['event_id'] : "";

        $list_event = get_posts($argEvent);
        $html = "<h3>Event</h3>";
        $html .= '<div class="row align-items-center"> ';
        foreach ($list_event as $event) {
            $class_image = "";
            if ((int)$event->ID == (int)$event_id_choose) {
                $span = '<span id=' . $event->ID . ' style="cursor:pointer;" class="choose_event choose_event'.$event->ID.' choose_event_unchoose">Unchoose</span>';
                $class_image = 'custom_image_color';
            } else {
                $span = '<span id=' . $event->ID . ' style="cursor:pointer;" class="choose_event choose_event'.$event->ID.' choose_event_choose">Choose</span>';
            }

            $html .= '<div class="col-md-3 position-relative event_item">
                        <img class="custom-event-image custom-event-image'.$event->ID.'  ' . $class_image . '" src=' . get_the_post_thumbnail_url($event->ID) . '>
                        ' . $span . '
                </div>';
        }

        $html .= '</div>';
        return $html;
    }

    function get_start_date_of_event_shortcode()
    {
        $ticket_id = get_the_ID();
        $html = "<p>Application date:  " . get_post_meta($ticket_id, '_start_date', true) . "</p>";
        $html .= "<p>Until the end of the day:  " . get_post_meta($ticket_id, '_end_date', true) . "</p>";
        $html .= "<p>Discount " . get_post_meta($ticket_id, '_percent_discount', true) . "% cho tổng giá vé</p>";
        $html .= "<p>" . get_post_meta($ticket_id, '_description', true) . "</p>";
        $user_id = get_current_user_id();
        if ($user_id != 0) {
            $html .= "<button id=" . $ticket_id . " class='btn custom-btn-showtime btn_apply_event'>Apply now</button>";
            $html .= '
            <div class="modal fade mt-5 d-none modal_apply_event" id="exampleModal" tabindex="-1" style="color: black;" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="text-center" style="color: black !important;">Congratulate success</h5>
                    <button type="button" style="cursor:pointer;" class="btn-close modal_apply_event_close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p class="text-center">Apply code discount success!!!</p>
                    </div>
              </div>    
            </div>';
        } else {
            $html .= "<a href='http://book_tickets_movie2.local/login/' class='btn custom-btn-showtime'>Apply now</a>";
        }
        return $html;
    }

    function add_apply_discount_init()
    {
        $event_id = isset($_POST['event_id']) ? $_POST['event_id'] : "";
        $user_id = get_current_user_id();
        if ($user_id != "") {
            $_SESSION['user_info']['event_id'] = $event_id;
        }
        wp_send_json_success(json_encode($_SESSION));
        die();
    }

    function choose_unchose_event_init()
    {
        $event_id = isset($_POST['event_id']) ? $_POST['event_id'] : "";
        //remove
        $status = true;
        $user_id = get_current_user_id();
        if ($user_id != "") {
            if (isset($_SESSION['user_info']['event_id']) && $_SESSION['user_info']['event_id'] == $event_id) {
                unset($_SESSION['user_info']['event_id']);
                $status = false;
            } else {
                $_SESSION['user_info']['event_id'] = $event_id;
                $status = true;
            }
        }
        //add
        wp_send_json_success($status);
        die();
    }

    // ADMIN
    function filter_datetable_show_init()
    {
        $id_filter_time_showtime = isset($_POST['id_filter_time_showtime']) ? $_POST['id_filter_time_showtime'] : "";
        $date_end =  new DateTime();
        $date_end = $date_end->format('Y-m-d');
        $date_end_calculation = date_create($date_end);
        if ($id_filter_time_showtime == 1) {
            $date_start = date_sub($date_end_calculation, date_interval_create_from_date_string("7 days"));
        } else if ($id_filter_time_showtime == 2) {
            $date_start = date_sub($date_end_calculation, date_interval_create_from_date_string("30 days"));
        } else if ($id_filter_time_showtime == 3) {
            $date_start = date_sub($date_end_calculation, date_interval_create_from_date_string("90 days"));
        }
        $date_start = $date_start->format('Y-m-d');


        //handler data
        $args = array(
            'post_type'   => 'showtimes',
            'numberposts'       => -1,
            'meta_query' => array(
                array(
                    'key'       => '_date_show',
                    'value'     => $date_start,
                    'compare'   => '>='
                ),
                array(
                    'key'       => '_date_show',
                    'value'     => $date_end,
                    'compare'   => '<='
                ),
            )
        );
        $showtimes = get_posts($args);
        $data_table_showtime = [];
        foreach ($showtimes as $key => $showtime) {
            //handler caculation total profit
            $args_ticket = array(
                'post_type'   => 'ticket',
                'numberposts'       => -1,
                'meta_query' => array(
                    array(
                        'key'       => '_showtime_id',
                        'value'     => $showtime->ID,
                        'compare'   => '='
                    )
                )
            );
            $list_ticket = get_posts($args_ticket);
            $total = 0;
            foreach ($list_ticket as $ticket_item) {
                $total = $total + get_post_meta($ticket_item->ID, '_price_promotion', true);
            }

            $movie_id = get_post_meta($showtime->ID, '_movie_id', true);
            $room_id = get_post_meta($showtime->ID, '_room_id', true);
            $quantity_ticket_sale = count(get_post_meta($showtime->ID, '_array_chair', false)[0]);
            $quantity_ticket_slot = get_post_meta($room_id, '_quantity_chair_vip', true) + get_post_meta($room_id, '_quantity_chair_normal', true) - $quantity_ticket_sale;

            $data_table_showtime[] = array(
                'id'                        => json_encode($key + 1),
                'showtime_name'             => get_the_title($showtime->ID),
                'date_show'                 => get_post_meta($showtime->ID, '_date_show', true),
                'movie_name'                => get_the_title($movie_id),
                'room_show'                 => get_the_title($room_id),
                'time_show'                 => get_post_meta($showtime->ID, '_time_show', true),
                'quantity_ticket_sale'      => $quantity_ticket_sale,
                'quantity_ticket_slot'      => $quantity_ticket_slot,
                'total_profit'              => $total . " vnd",
            );
        }
        $data_table_showtime =  json_encode($data_table_showtime);


        wp_send_json_success($data_table_showtime);
        die();
    }

    function filter_datetable_show_start_end_start_init()
    {
        $date_start = isset($_POST['start_date']) ? $_POST['start_date'] : "";
        $date_end = isset($_POST['end_date']) ? $_POST['end_date'] : "";
        //handler data
        $args = array(
            'post_type'   => 'showtimes',
            'numberposts'       => -1,
            'meta_query' => array(
                array(
                    'key'       => '_date_show',
                    'value'     => $date_start,
                    'compare'   => '>='
                ),
                array(
                    'key'       => '_date_show',
                    'value'     => $date_end,
                    'compare'   => '<='
                ),
            )
        );
        $showtimes = get_posts($args);
        $data_table_showtime = [];
        foreach ($showtimes as $key => $showtime) {
            //handler caculation total profit
            $args_ticket = array(
                'post_type'   => 'ticket',
                'numberposts'       => -1,
                'meta_query' => array(
                    array(
                        'key'       => '_showtime_id',
                        'value'     => $showtime->ID,
                        'compare'   => '='
                    )
                )
            );
            $list_ticket = get_posts($args_ticket);
            $total = 0;
            foreach ($list_ticket as $ticket_item) {
                $total = $total + get_post_meta($ticket_item->ID, '_price_promotion', true);
            }

            $movie_id = get_post_meta($showtime->ID, '_movie_id', true);
            $room_id = get_post_meta($showtime->ID, '_room_id', true);
            $quantity_ticket_sale = count(get_post_meta($showtime->ID, '_array_chair', false)[0]);
            $quantity_ticket_slot = get_post_meta($room_id, '_quantity_chair_vip', true) + get_post_meta($room_id, '_quantity_chair_normal', true) - $quantity_ticket_sale;

            $data_table_showtime[] = array(
                'id'                        => json_encode($key + 1),
                'showtime_name'             => get_the_title($showtime->ID),
                'date_show'                 => get_post_meta($showtime->ID, '_date_show', true),
                'movie_name'                => get_the_title($movie_id),
                'room_show'                 => get_the_title($room_id),
                'time_show'                 => get_post_meta($showtime->ID, '_time_show', true),
                'quantity_ticket_sale'      => $quantity_ticket_sale,
                'quantity_ticket_slot'      => $quantity_ticket_slot,
                'total_profit'              => $total . " vnd",
            );
        }
        $data_table_showtime =  json_encode($data_table_showtime);


        wp_send_json_success($data_table_showtime);
        die();
    }

    function filter_chart_movie_time_init()
    {
        $id_filter_time_movie = isset($_POST['id_filter_time_movie']) ? $_POST['id_filter_time_movie'] : "";
        $date_end =  new DateTime();
        $date_end = $date_end->format('Y-m-d');
        $date_end_calculation = date_create($date_end);
        if ($id_filter_time_movie == 1) {
            $date_start = date_sub($date_end_calculation, date_interval_create_from_date_string("7 days"));
        } else if ($id_filter_time_movie == 2) {
            $date_start = date_sub($date_end_calculation, date_interval_create_from_date_string("30 days"));
        } else if ($id_filter_time_movie == 3) {
            $date_start = date_sub($date_end_calculation, date_interval_create_from_date_string("90 days"));
        }
        $date_start = $date_start->format('Y-m-d');
        // handler find milestone_total 
        $args = array(
            'post_type'   => 'movie',
            'numberposts'       => -1,
        );
        $list_movie = get_posts($args);
        $total_showtime_movie = [];
        foreach ($list_movie as $movie) {
            $args = array(
                'post_type'   => 'showtimes',
                'numberposts'       => -1,
                'meta_query' => array(
                    array(
                        'key'       => '_movie_id',
                        'value'     => $movie->ID,
                        'compare'   => '='
                    )
                )
            );
            $list_showtime_of_movie = get_posts($args);

            $total = 0;
            foreach ($list_showtime_of_movie as $showtime) {
                $args = array(
                    'post_type'   => 'ticket',
                    'numberposts'       => -1,
                    'meta_query' => array(
                        array(
                            'key'       => '_showtime_id',
                            'value'     => $showtime->ID,
                            'compare'   => '='
                        )
                    )
                );
                $list_ticket_showtime = get_posts($args);
                foreach ($list_ticket_showtime as $ticket) {
                    $total = $total + get_post_meta($ticket->ID, '_price_promotion', true);
                }
            }

            $total_showtime_movie[] = $total;
        }

        for ($i = 0; $i < count($total_showtime_movie) - 1; $i++) {
            for ($j = $i + 1; $j < count($total_showtime_movie); $j++) {
                if ($total_showtime_movie[$i] < $total_showtime_movie[$j]) {
                    $temp = $total_showtime_movie[$i];
                    $total_showtime_movie[$i] = $total_showtime_movie[$j];
                    $total_showtime_movie[$j] = $temp;
                }
            }
        }

        $milestone_total = 0;
        if ($total_showtime_movie[4] != 0) {
            $milestone_total = $total_showtime_movie[4];
        }



        $args = array(
            'post_type'   => 'movie',
            'numberposts'       => -1,
        );
        $list_movie = get_posts($args);
        $arr_movie_name = [];
        $arr_quantity_showtime = [];
        $arr_profit_movie = [];
        foreach ($list_movie as $movie) {
            $args = array(
                'post_type'   => 'showtimes',
                'numberposts'       => -1,
                'meta_query' => array(
                    array(
                        'key'       => '_movie_id',
                        'value'     => $movie->ID,
                        'compare'   => '='
                    ),
                    array(
                        'key'       => '_date_show',
                        'value'     => $date_start,
                        'compare'   => '>='
                    ),
                    array(
                        'key'       => '_date_show',
                        'value'     => $date_end,
                        'compare'   => '<='
                    ),
                )
            );
            $list_showtime_of_movie = get_posts($args);

            $total = 0;
            foreach ($list_showtime_of_movie as $showtime) {
                $args = array(
                    'post_type'   => 'ticket',
                    'numberposts'       => -1,
                    'meta_query' => array(
                        array(
                            'key'       => '_showtime_id',
                            'value'     => $showtime->ID,
                            'compare'   => '='
                        ),

                    )
                );
                $list_ticket_showtime = get_posts($args);
                foreach ($list_ticket_showtime as $ticket) {
                    $total = $total + get_post_meta($ticket->ID, '_price_promotion', true);
                }
            }
            if ($total > $milestone_total) {
                $arr_profit_movie[] = $total;
                $arr_quantity_showtime[] = count($list_showtime_of_movie);
                $arr_movie_name[] = get_the_title($movie->ID) . " (" . count($list_showtime_of_movie) . ")";
            }
        }
        $data['arr_movie_name'] = $arr_movie_name;
        $data['arr_profit_movie'] = $arr_profit_movie;
        wp_send_json_success($data);
        die();
    }

    function filter_chart_movie_start_end_date_init()
    {
        $date_start = $_POST['start_date'];
        $date_end = $_POST['end_date'];

        // handler find milestone_total 
        $args = array(
            'post_type'   => 'movie',
            'numberposts'       => -1,
        );
        $list_movie = get_posts($args);
        $total_showtime_movie = [];
        foreach ($list_movie as $movie) {
            $args = array(
                'post_type'   => 'showtimes',
                'numberposts'       => -1,
                'meta_query' => array(
                    array(
                        'key'       => '_movie_id',
                        'value'     => $movie->ID,
                        'compare'   => '='
                    )
                )
            );
            $list_showtime_of_movie = get_posts($args);

            $total = 0;
            foreach ($list_showtime_of_movie as $showtime) {
                $args = array(
                    'post_type'   => 'ticket',
                    'numberposts'       => -1,
                    'meta_query' => array(
                        array(
                            'key'       => '_showtime_id',
                            'value'     => $showtime->ID,
                            'compare'   => '='
                        )
                    )
                );
                $list_ticket_showtime = get_posts($args);
                foreach ($list_ticket_showtime as $ticket) {
                    $total = $total + get_post_meta($ticket->ID, '_price_promotion', true);
                }
            }

            $total_showtime_movie[] = $total;
        }

        for ($i = 0; $i < count($total_showtime_movie) - 1; $i++) {
            for ($j = $i + 1; $j < count($total_showtime_movie); $j++) {
                if ($total_showtime_movie[$i] < $total_showtime_movie[$j]) {
                    $temp = $total_showtime_movie[$i];
                    $total_showtime_movie[$i] = $total_showtime_movie[$j];
                    $total_showtime_movie[$j] = $temp;
                }
            }
        }

        $milestone_total = 0;
        if ($total_showtime_movie[4] != 0) {
            $milestone_total = $total_showtime_movie[4];
        }



        $args = array(
            'post_type'   => 'movie',
            'numberposts'       => -1,
        );
        $list_movie = get_posts($args);
        $arr_movie_name = [];
        $arr_quantity_showtime = [];
        $arr_profit_movie = [];
        foreach ($list_movie as $movie) {
            $args = array(
                'post_type'   => 'showtimes',
                'numberposts'       => -1,
                'meta_query' => array(
                    array(
                        'key'       => '_movie_id',
                        'value'     => $movie->ID,
                        'compare'   => '='
                    ),
                    array(
                        'key'       => '_date_show',
                        'value'     => $date_start,
                        'compare'   => '>='
                    ),
                    array(
                        'key'       => '_date_show',
                        'value'     => $date_end,
                        'compare'   => '<='
                    ),
                )
            );
            $list_showtime_of_movie = get_posts($args);

            $total = 0;
            foreach ($list_showtime_of_movie as $showtime) {
                $args = array(
                    'post_type'   => 'ticket',
                    'numberposts'       => -1,
                    'meta_query' => array(
                        array(
                            'key'       => '_showtime_id',
                            'value'     => $showtime->ID,
                            'compare'   => '='
                        ),

                    )
                );
                $list_ticket_showtime = get_posts($args);
                foreach ($list_ticket_showtime as $ticket) {
                    $total = $total + get_post_meta($ticket->ID, '_price_promotion', true);
                }
            }
            if ($total > $milestone_total) {
                $arr_profit_movie[] = $total;
                $arr_quantity_showtime[] = count($list_showtime_of_movie);
                $arr_movie_name[] = get_the_title($movie->ID) . " (" . count($list_showtime_of_movie) . ")";
            }
        }
        $data['arr_movie_name'] = $arr_movie_name;
        $data['arr_profit_movie'] = $arr_profit_movie;
        wp_send_json_success($data);
        die();
    }

    function genre_movie_shortcode()
    {
        $taxonomies = get_taxonomies(['object_type' => ['movie']]);
        $taxonomyTerms = [];
        // loop over your taxonomies
        foreach ($taxonomies as $taxonomy) {
            // retrieve all available terms, including those not yet used
            $terms    = get_terms(['taxonomy' => $taxonomy, 'hide_empty' => false]);

            // make sure $terms is an array, as it can be an int (count) or a WP_Error
            $hasTerms = is_array($terms) && $terms;

            if ($hasTerms) {
                $taxonomyTerms[$taxonomy] = $terms;
            }
        }

        $argGenre = $taxonomyTerms['genreMovie'];
        // $html = "<a href='http://book_tickets_movie2.local/genre/' class='text-white'>Kinh di (5)</a>";
        $html = '';
        foreach ($argGenre as $genre) {
            $argMovie = array(
                'post_type' => 'movie',
                'numberposts' => -1,
                'meta_query' => array(
                    array(
                        'key'       => '_genre',
                        'value'     => $genre->name,
                        'compare'   => '='
                    ),

                )
            );
            $list_movie = get_posts($argMovie);
            $html .= "<div class='mt-2'><a href='http://book_tickets_movie2.local/genre/?query-genre=" . $genre->name . "' class='text-white' style='cursor:pointer; user-select:none'>" . $genre->name . " (" . count($list_movie) . ")</a></div>";
        }

        // $html .= '<div class="fakeLoader"></div>';
        return $html;
    }

    function movie_popular_shortcode()
    {

        $argMovie = array(
            'post_type'     => 'movie',
            'numberposts'   => -1,
        );
        $list_movie = get_posts($argMovie);
        // $argTicket = array(
        //     'post_type'     => 'ticket',
        //     'numberposts'   => -1,
        // );
        // $list_ticket = get_posts($argTicket);
        $arr_movie_id = [];
        $arr_total_ticket = [];
        foreach ($list_movie as $movie) {
            $movie_id = $movie->ID;
            $argShowtimes = array(
                'post_type'     => 'showtimes',
                'numberposts'   => -1,
                'meta_query'    => array(
                    array(
                        'key'       => '_movie_id',
                        'value'     =>  $movie_id,
                        'compare'   => '='
                    ),
                )
            );
            $listShowtime = get_posts($argShowtimes);
            $total = 0;
            foreach ($listShowtime as $showtime) {
                $argTicket = array(
                    'post_type'     => 'ticket',
                    'numberposts'   => -1,
                    'meta_query'    => array(
                        array(
                            'key'       => '_showtime_id',
                            'value'     =>  $showtime->ID,
                            'compare'   => '='
                        ),
                    )
                );
                $list_ticket = get_posts($argTicket);
                $total = $total + count($list_ticket);
            }

            $arr_movie_id[] = $movie_id;
            $arr_total_ticket[] = $total;
        }


        $arr_first_sort_total_ticket = $arr_total_ticket;
        for ($i = 0; $i < (count($arr_first_sort_total_ticket) - 1); $i++) {
            for ($j = $i + 1; $j < count($arr_first_sort_total_ticket); $j++) {
                if ($arr_first_sort_total_ticket[$i] < $arr_first_sort_total_ticket[$j]) {
                    $temp = $arr_first_sort_total_ticket[$i];
                    $arr_first_sort_total_ticket[$i] = $arr_first_sort_total_ticket[$j];
                    $arr_first_sort_total_ticket[$j] = $temp;
                }
            }
        }
        $milestones_total_ticket = $arr_first_sort_total_ticket[4];
        $result_movie_id        = [];
        $result_total_ticket    = [];
        if ($milestones_total_ticket > 0) {
            foreach ($arr_total_ticket as $key => $total_ticket_item) {
                if ($total_ticket_item >= $milestones_total_ticket) {
                    $result_total_ticket[] = $total_ticket_item;
                    $result_movie_id[] = $arr_movie_id[$key];
                }
            }
        } else {
            foreach ($arr_total_ticket as $key => $total_ticket_item) {
                if ($total_ticket_item > $milestones_total_ticket) {
                    $result_total_ticket[] = $total_ticket_item;
                    $result_movie_id[] = $arr_movie_id[$key];
                }
            }
        }

        $html = "";
        foreach ($result_movie_id as $movie_id) {
            $html .= "<div class='d-flex mt-3'>
                <a href=" . get_the_permalink($movie_id) . " class='cover-img'>
                    <img class='img-filter-movie' src=" . get_the_post_thumbnail_url($movie_id) . ">
                </a>
                <div style='margin-left: 20px;'>
                    <p class='text-white mb-0'><a href=" . get_the_permalink($movie_id) . " style='text-decoration: none; color: #cf2e2e; cursor: pointer;'>" . get_the_title($movie_id) . "</a></p>
                    <p class='text-white mb-0' style='font-size: 12px;'>" . get_post_meta($movie_id, '_time', true) . " minute</p>
                    <p class='text-white mb-0' style='font-size: 12px;'>" . get_post_meta($movie_id, '_genre', true) . "</p>
                </div>
            </div>";
        }

        return $html;
    }

    function movie_new_shortcode()
    {
        $argMovie = array(
            'post_type'     => 'movie',
            'numberposts'   => -1,
        );
        $list_movie = get_posts($argMovie);
        $html = "";
        foreach ($list_movie as $key => $movie) {
            $movie_id = $movie->ID;
            $html .= "<div class='d-flex mt-3'>
            <a href=" . get_the_permalink($movie_id) . " class='cover-img'>
                <img class='img-filter-movie' src=" . get_the_post_thumbnail_url($movie_id) . ">
            </a>
            <div style='margin-left: 20px;'>
                <p class='text-white mb-0'><a href=" . get_the_permalink($movie_id) . " style='text-decoration: none; color: #cf2e2e; cursor: pointer;'>" . get_the_title($movie_id) . "</a></p>
                <p class='text-white mb-0' style='font-size: 12px;'>" . get_post_meta($movie_id, '_time', true) . " minute</p>
                <p class='text-white mb-0' style='font-size: 12px;'>" . get_post_meta($movie_id, '_genre', true) . "</p>
            </div>
        </div>";
            if ($key == 2) break;
        }
        return $html;
    }

    function display_list_movie_shortcode()
    {
        $genre = isset($_GET['query-genre']) ? $_GET['query-genre'] : "";

        if ($genre != "") {
            $arrMovie = array(
                'post_type'     => 'movie',
                'numberposts'   => -1,
                'meta_query' => array(
                    array(
                        'key' => '_genre',
                        'compare' => '=',
                        'value' => $genre,
                    ),
                )
            );
        } else {
            $arrMovie = array(
                'post_type'     => 'movie',
                'numberposts'   => -1,
            );
        }
        $list_movie = get_posts($arrMovie);
        $page = isset($_GET['query-page']) ? $_GET['query-page'] : 0;
        $start_position = (int)$page * 6;
        if ($start_position + 6 > count($list_movie)) {
            $end_position = count($list_movie) - 1;
        } else {
            $end_position = (int)$start_position + 6 - 1;
        }
        $html = "<h5>" . $genre . "</h5>";
        $html .= '<div class="row">';
        for ($i = $start_position; $i <= $end_position; $i++) {
            $movie_id = $list_movie[$i]->ID;
            $html .= '<div class="col-md-4 mb-4">
                        <a href=' . get_the_permalink($movie_id) .'>
                            <div class="cover-image-movie">
                                ' . get_the_post_thumbnail($movie_id, "medium") . '
                            </div>
                        </a>
                        <div class="text-center mt-2">
                            <a href=' . get_the_permalink($movie_id) . ' class="limit-text movie-title-list text-center">' . get_the_title($movie_id) . '</a>
                            <a href="http://book_tickets_movie2.local/genre/?query-genre=' . get_post_meta($movie_id, '_genre', true) . '" style="cursor:pointer;text-decoration: none" class="badge bg-warning text-dark text-center my-2">' . get_post_meta($movie_id, '_genre', true) . '</a></br>
                            <a href=' . get_the_permalink($movie_id) . ' class="btn custom-btn-showtime" style="border-radius: 20px;padding: 10px 20px;">Book now</a>
                        </div> 
                    </div>';
        }

        $html .= '</div>';
        return $html;
    }

    function display_list_movie_pagination_shortcode()
    {
        $page = isset($_GET['query-page']) ? $_GET['query-page'] : 0;
        $genre = isset($_GET['query-genre']) ? $_GET['query-genre'] : "";
        if ($genre != "") {
            $arrMovie = array(
                'post_type'     => 'movie',
                'numberposts'   => -1,
                'meta_query' => array(
                    array(
                        'key' => '_genre',
                        'compare' => '=',
                        'value' => $genre,
                    ),
                )
            );
        } else {
            $arrMovie = array(
                'post_type'     => 'movie',
                'numberposts'   => -1,
            );
        }
        $listMovie = get_posts($arrMovie);
        if (count($listMovie) > 6) {
            $total_quantity_movie = count($listMovie);
            $quantity_movie_display = 6;
            $number_button = floor($total_quantity_movie / $quantity_movie_display) + 1;
            $html = '<div class="d-flex justify-content-center">';
            for ($i = 0; $i < $number_button; $i++) {
                if ($i == $page) {
                    $html .= '<a  href="http://book_tickets_movie2.local/genre/?query-page=' . $i . '" style="margin-right: 10px; background-color:  #707B7C" class="btn custom-btn-showtime">' . ($i + 1) . '</a>';
                } else {
                    $html .= '<a href="http://book_tickets_movie2.local/genre/?query-page=' . $i . '" style="margin-right: 10px" class="btn custom-btn-showtime">' . ($i + 1) . '</a>';
                }
            }
            $html .= '</div>';

            return $html;
        }
        return "";
    }

    function display_list_movie_pagination_demo_page_shortcode(){
        $page = isset($_GET['query-page']) ? $_GET['query-page'] : 0;
        $genre = isset($_GET['query-genre']) ? $_GET['query-genre'] : "";
        if ($genre != "") {
            $arrMovie = array(
                'post_type'     => 'movie',
                'numberposts'   => -1,
                'meta_query' => array(
                    array(
                        'key' => '_genre',
                        'compare' => '=',
                        'value' => $genre,
                    ),
                )
            );
        } else {
            $arrMovie = array(
                'post_type'     => 'movie',
                'numberposts'   => -1,
            );
        }
        $listMovie = get_posts($arrMovie);
        if (count($listMovie) > 6) {
            $total_quantity_movie = count($listMovie);
            $quantity_movie_display = 6;
            $number_button = floor($total_quantity_movie / $quantity_movie_display) + 1;
            $html = '<div class="d-flex justify-content-center">';
            for ($i = 0; $i < $number_button; $i++) {
                if ($i == $page) {
                    $html .= '<a  href="http://book_tickets_movie2.local/demo-page/?query-page=' . $i . '" style="margin-right: 10px; background-color:  #707B7C" class="btn custom-btn-showtime">' . ($i + 1) . '</a>';
                } else {
                    $html .= '<a href="http://book_tickets_movie2.local/demo-page/?query-page=' . $i . '" style="margin-right: 10px" class="btn custom-btn-showtime">' . ($i + 1) . '</a>';
                }
            }
            $html .= '</div>';

            return $html;
        }
        return "";
    }

    function movie_now_showing_shortcode()
    {
        $datetime =  new DateTime();
        $datetime = $datetime->format('Y-m-d');
        $argShowtime = array(
            'post_type' => 'showtimes',
            'numberposts'   => -1,
            'meta_query' => array(
                array(
                    'key' => '_date_show',
                    'compare' => '>=',
                    'value' =>  $datetime,
                ),
            )
        );
        $list_showtime = get_posts($argShowtime);
        $arr_movie_in_all_showtime = [];
        foreach ($list_showtime as $showtime) {
            $arr_movie_in_all_showtime[] = get_post_meta($showtime->ID, '_movie_id', true);
        }

        $arr_movie_result = [];
        foreach ($arr_movie_in_all_showtime as $movie_id) {
            if (!in_array($movie_id, $arr_movie_result)) {
                $arr_movie_result[] = $movie_id;
            }
        }

        $html = "";
        foreach ($arr_movie_result as $key => $movie_id) {
            $html .= "<div class='d-flex mt-3'>
            <a href=" . get_the_permalink($movie_id) . " class='cover-img'>
                <img class='img-filter-movie' src=" . get_the_post_thumbnail_url($movie_id) . ">
            </a>
            <div style='margin-left: 20px;'>
                <p class='text-white mb-0'><a href=" . get_the_permalink($movie_id) . " style='text-decoration: none; color: #cf2e2e; cursor: pointer;'>" . get_the_title($movie_id) . "</a></p>
                <p class='text-white mb-0' style='font-size: 12px;'>" . get_post_meta($movie_id, '_time', true) . " minute</p>
                <p class='text-white mb-0' style='font-size: 12px;'>" . get_post_meta($movie_id, '_genre', true) . "</p>
            </div>
        </div>";
            if ($key == 2) break;
        }
        return $html;
    }

    function scroll_top_shortcode(){
        return '<span class="cover-arrow-up position-fixed"><i class="fa fa-arrow-up" aria-hidden="true"></i><span>';
    }
}
