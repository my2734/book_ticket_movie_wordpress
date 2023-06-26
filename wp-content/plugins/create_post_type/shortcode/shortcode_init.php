<?php

use Nextend\Framework\Form\Element\Message;

class CreartShortcode{
    function __construct()
    {

        //init session
        add_action("init",[$this,'session_init']);
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

        add_action( 'enqueue_block_editor_assets', [$this, 'myguten_enqueue'] );
        // add_action('wp_enqueue_scripts', [$this, 'tutsplus_enqueue_custom_js'] );


        //contact page
        add_shortcode('googlemap_contact', [$this, 'googlemap_contact_shortcode']);
        add_shortcode('contact_form_contact', [$this, 'contact_form_contact_shortcode']);

        //movie
        add_shortcode('notifycation_showtimes_shortcode', [$this, 'notifycation_showtimes_shortcode']);
        add_shortcode('end_shortcode_movie', [$this, 'end_shortcode_movie_shortcode']);
        
        //register
        add_shortcode('register_form', [$this, 'register_form_shortcode']);
        add_shortcode('login_form', [$this, 'login_form_shortcode']);

        add_action('wp_ajax_handler_register',  [$this, 'handler_register_init']);
        add_action('wp_ajax_nopriv_handler_register',  [$this, 'handler_register_init']);


        add_shortcode('demo_session_login', [$this, 'demo_session_login_shortcode']);
        //header
        add_shortcode('handler_header_authentication', [$this, 'handler_header_authentication_shortcode']);
        
        // login
        add_action('wp_ajax_handler_login',  [$this, 'handler_login_init']);
        add_action('wp_ajax_nopriv_handler_login',  [$this, 'handler_login_init']);
        

        //history booking ticket 
        add_shortcode('table_display_history_booking', [$this, 'table_display_history_booking_shortcode']);

    }

    function session_init(){
        if(!session_id()) {
            session_start();
            // $_SESSION['login'] = true;
        }
    }

    function notifycation_showtimes_shortcode(){
       $movie_id = get_the_title();
        return "<span class='badge bg-warning text-dark my-0'>".$movie_id."</span>";
    }
    
    function ajax_book_ticket_init(){
        $showtime_id = isset($_POST['showtime_id'])?$_POST['showtime_id']:"";
        $arrIndexChair = isset($_POST['arrIndexChair'])?$_POST['arrIndexChair']:[];
        $total = isset($_POST['total'])?$_POST['total']:0;
        $fullName = isset($_POST['fullName'])?$_POST['fullName']:"";
        $phone = isset($_POST['phone'])?$_POST['phone']:"";
        $email = isset($_POST['email'])?$_POST['email']:"";

        //handler title ticket
        $movie_id = get_post_meta($showtime_id,'_movie_id',true);
        $room_id = get_post_meta($showtime_id,'_room_id',true);
        $movie_name = get_the_title($movie_id);
        $room_name = get_the_title($room_id);
        $date_show = get_post_meta($showtime_id,'_date_show',true);
        $time_show = get_post_meta($showtime_id, '_time_show',true);
        $title_ticket = $movie_name.' '.$room_name." ".$date_show." ".$time_show;
        $ticket_id = wp_insert_post(
            array(
                'post_type'=>'ticket',
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
        
        update_post_meta($ticket_id,'_chair_id',$arrIndexChair);
        update_post_meta($ticket_id,'_showtime_id',$showtime_id);
        update_post_meta($ticket_id,'_price',$total);
        update_post_meta($ticket_id, '_price_promotion', $total);
        update_post_meta($ticket_id,'_name_buyer',$fullName);
        update_post_meta($ticket_id,'_phone',$phone);
        update_post_meta($ticket_id,'_email',$email);
        $time_now  = date('Y-m-d H:i:s');
        update_post_meta($ticket_id,'_time_booking',$time_now);

        //update array_chair
        $array_chair = get_post_meta($showtime_id, '_array_chair', false)[0]; //array seat_position old

        //user_id 
        $user_id = isset($_SESSION['login'])?$_SESSION['user_info']['user_id']:"";
        update_post_meta($ticket_id,'_user_id',$user_id);
        foreach($arrIndexChair as $seat_position_new_item){
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

    function func_query_taxonomy_genre_loop(){
        $taxonomies = get_taxonomies(['object_type' => ['movie']]);
        $taxonomyTerms = [];
        foreach ($taxonomies as $taxonomy)
        {
            $terms    = get_terms(['taxonomy' => $taxonomy, 'hide_empty' => false]);
            $hasTerms = is_array($terms) && $terms;
            if($hasTerms)
            {
                $taxonomyTerms[$taxonomy] = $terms;        
            }
        }
        $argGenre = $taxonomyTerms['genreMovie'];
        $displayList = "<div class='custom-div-genre'>";
        foreach($argGenre as $genre){
            $displayList .= "<a style='margin-right: 20px !important;' href='".get_term_link($genre->term_id)."' class='custom_btn_geren_list'>".$genre->name."</a>";
        }
        $displayList .= "/<div>";
        return $displayList;
    }

    function demo_shortcode(){
        $id = '<iframe width="560" height="315" src="https://www.youtube.com/embed/2EnP2tVC00Q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
        return $id;
    }

    function get_director_of_movie_shortcode(){
        $director = get_post_meta(get_the_ID(),'_director',true);
        return "<p class='custom-text-info'>".$director."</p>";
    }

    function get_time_of_movie_shortcode(){
        $time = get_post_meta(get_the_ID(),'_time',true);
        return "<p class='custom-text-info'>".$time." phút </p>";
    }

    function get_actors_of_movie_shortcode(){
        $actors = get_post_meta(get_the_ID(),'_actors',true);
        return "<p class='custom-text-info'>".$actors."</p>";
    }

    function get_description_of_movie_shortcode(){
        $description = get_post_meta(get_the_ID(),'_description',true);
        return "<p class='custom-text-info'>".$description."</p>";
    }

    function get_trailer_of_movie_shortcode(){
        $link_ytb = get_post_meta(get_the_ID(),'_link_ytb',true);
        return  '<iframe class="mt-5" width="100%" height="400" src="https://www.youtube.com/embed/'.$link_ytb.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
    }

    function demo_showtimes_of_movie_shortcode(){
        $datetime =  new DateTime();
        $datetime = $datetime->format('Y-m-d');
        $movie_id = get_the_ID();
        $arg_showtimes = array(
        'post_type' => 'showtimes',
        'meta_query'=> array(
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
        ));
        $list_showtimes = get_posts($arg_showtimes);

        $time_now =  date('H');
        $html = '';
        foreach($list_showtimes as $key => $showtime){
            
            $time_show = explode('h',get_post_meta($showtime->ID,'_time_show',true))[0];
            
            if($time_show>=$time_now){
                array_splice($arr,$key,1);
            }
        }
        if(count($list_showtimes)>0){
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
            foreach($list_showtimes as $key=> $showtime){
                $statusLogin = isset($_SESSION['login'])?$_SESSION['login']:false;
                $html = $html. ' <tr>
                <td class="">'.($key+1).'</td>
                <td class="">'.get_post_meta($showtime->ID,'_date_show',true).'</td>
                <td class="">'.get_post_meta($showtime->ID,'_time_show',true).'</td>
                <td class="">'.get_the_title(get_post_meta($showtime->ID,'_room_id',true)).'</td>
                <td class="">';
                if($statusLogin){
                    $html .= '<a href='.get_permalink($showtime->ID).' class="custom-btn-showtime">Book now</a>';
                }else{
                    $html .= '<a href="http://book_tickets_movie2.local/login/" class="custom-btn-showtime">Book now</a>';
                }
                $html .= '</td>
              </tr>';
            }
    
            $html = $html.'</tbody></table>';
        }else{
            $html = "<h1 style='margin-top: 50px;'>Movie chưa có suất chiếu. Hẹn bạn ở dịp khác</h1>";
        }
        return $html;

    }

    function showtime_name_movie_shortcode(){
        $showtime_id = get_the_ID();
        $movie_id = get_post_meta($showtime_id, '_movie_id',true);
        $movie_name = get_the_title($movie_id);
        return "<h3>".$movie_name."</h3>";
    }

    function showtime_image_movie_shortcode(){
        $showtime_id = get_the_ID();
        $movie_id = get_post_meta($showtime_id, '_movie_id',true);
        $image = get_the_post_thumbnail($movie_id);
        return $image;
    }

    function showtime_info_detail_movie_shortcode(){
        $showtime_id = get_the_ID();
        $movie_id = get_post_meta($showtime_id, '_movie_id',true);
        $director = get_post_meta($movie_id,'_director',true);
        $time = get_post_meta($movie_id, '_time',true);
        $actors = get_post_meta($movie_id,'_actors',true);
        $descripton = get_post_meta($movie_id, '_description', true);
        $html = "<div style='color: white; font-size: 18px;'>";
        $html .= "<p>Director: ".$director."</p>";
        $html .= "<p>Time: ".$time." phút</p>";
        $html .= "<p>Actors: ".$actors."</p>";
        $html .= "<p>Description: ".$descripton."</p>";
        $html .= "</div>";
        return $html;
    }

    function showtime_chair_movie_shortcode(){
        $showtime_id = get_the_ID();
        // $movie_id = get_post_meta($showtime_id, '_movie_id',true);
        $room_id = get_post_meta($showtime_id,'_room_id',true);
        $quantity_chair_vip = get_post_meta($room_id, '_quantity_chair_vip',true);
        $quantity_chair_normal = get_post_meta($room_id, '_quantity_chair_normal',true);
        $arr_chair_id = get_post_meta($showtime_id, '_array_chair',false)[0];

        $html = "";
        for($i=1;$i<=$quantity_chair_vip;$i++){
            $class_book = in_array($i,$arr_chair_id)?'custom-chair-showtime-book':'custom-chair-showtime-vip choose_chair';
            $html .= "<span value='".$i."' status='vip' class=' custom-chair-showtime ".$class_book."'>A".$i."</span>";
        }
        for($i=$quantity_chair_vip+1;$i<=$quantity_chair_normal+$quantity_chair_vip;$i++){
            $class_book = in_array($i,$arr_chair_id)?'custom-chair-showtime-book':'custom-chair-showtime-normal choose_chair';
            $html .= "<span value='".$i."' status='normal' class=' custom-chair-showtime ".$class_book."'>B".$i."</span>";
        }

        return $html;
    }

    function myguten_enqueue(){
        wp_enqueue_script(
            'jquey',
            'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js'
        );
        wp_enqueue_script(
            'myguten-script',
            plugins_url( 'myguten.js', __FILE__ ), array( 'jquery' ), '1.0.0', true 
        );
    }

    function showtime_note_chair_shortcode(){
        $html = "<div style='color: white'>";
        $html .= "<span class='custom-chair-showtime custom-chair-showtime-vip'>1A</span> Ghế vip";
        $html .= "<span style='margin-left: 40px;' class='custom-chair-showtime custom-chair-showtime-normal'>1A</span> Ghế thường";
        $html .= "<span style='margin-left: 40px;' class='custom-chair-showtime custom-chair-showtime-book'>1A</span> Ghế đã được chọn";
        $html .= "<span style='margin-left: 40px;' class='custom-chair-showtime custom-chair-showtime-booking'>1A</span> Ghế đang chọn";
        // $html .= "<button class='btn btn-primary'>demo<button>";
        // $html .= "<div><button class='custom-btn-showtime btn-submit-book' style='font-size: 20px;'>Book now</button></div></div>";
        return $html;
    } 

    function showtime_input_book_ticket_shortcode(){
        $email = isset($_SESSION['login'])?$_SESSION['user_info']['email']:"";

        $html = "<div class='row'>";
        $html .= "<div class='col-sm-6 mt-3'>
                    <input id='fullNameBook' type='text' class='form-control custom-input-book-ticket'  placeholder='Full name'>
                </div>";
        $html .= "<div class='col-sm-6 mt-3'><input id='phoneBook' type='text' class='form-control custom-input-book-ticket' placeholder='Phone'></div>";
        $html .= "<div class='col-sm-6 mt-3'><input id='emailBook' type='text'  value=".$email."  class='form-control custom-input-book-ticket' placeholder='Email'></div>";
        $html .= "<div class='col-sm-12 text-center mt-3'><button class='btn custom-btn-showtime btn-submit-book-ticket'>Book now</button></div>";
        $html .= "</div>";
        $html .= "<input class='d-none' type='text' id='showtime_id' name='showtime_id' value=".get_the_ID().">";
        $html .= "<input class='d-none' type='text' id='total_ticket' >";
        return $html;
    }

    function showtime_note_price_shortcode(){
        $html = "<h3>Giá vé:</h3>";
        $html .= "<p>Vé vip: 90.000vnđ/vé</p>";
        $html .= "<p>Vé thường: 70.000vnđ/vé</p>";
        return $html;
    }

    function showtime_detail_booking_shortcode(){
        $showtime_id = get_the_ID();
        $movie_id = get_post_meta($showtime_id, '_movie_id',true);
        $room_id = get_post_meta($showtime_id,'_room_id',true);
        $movie_name = get_the_title($movie_id);
        $room_name = get_the_title($room_id);
        $date_show = get_post_meta($showtime_id, '_date_show',true);
        $time_show = get_post_meta($showtime_id,'_time_show',true); 
        $html = "<h3>Chi tiết vé</h3>";
        $html .= "<p>Tên phim: ".$movie_name."</p>";
        $html .= "<p>Phòng chiếu: ".$room_name."</p>";
        $html .= "<p>Ngày chiếu: ".$date_show."</p>";
        $html .= "<p>Thời gian chiếu: ".$time_show."</p>";
        $html .= "<p class='price-ticket'></p>";
        $html .= "<p class='fullName-ticket'></p>";
        $html .= "<p class='phone-ticket'></p>";
        $html .= "<p class='email-ticket'></p>";
        $html .= '<div class="alert alert-danger d-none alert-danger-chair" role="alert">
            <strong>Vui lòng chọn ghế</strong>
      </div>';
        return $html;
    }

    // function tutsplus_enqueue_custom_js(){
    //     wp_enqueue_script('custom', get_stylesheet_directory_uri().'/scripts/custom.js');
    // }

    function googlemap_contact_shortcode(){
        $html = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.8414543770905!2d105.76804037437331!3d10.029938972520222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0895a51d60719%3A0x9d76b0035f6d53d0!2zxJDhuqFpIGjhu41jIEPhuqduIFRoxqE!5e0!3m2!1svi!2s!4v1687494374371!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
      return $html;
    }

    function contact_form_contact_shortcode(){
        $html  ='<div class="row mb-5 mt-5">
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
    function register_form_shortcode(){
        // return "<h1>Hello ca nha yeu</h1>";
        $html ='
            <h3 class="p-0 m-0 text-center">Register Form</h3>
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

    function login_form_shortcode(){
        $html ='
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

    function demo_session_login_shortcode(){
       
        // session_unset();
        // $status = isset($_SESSION['login'])?$_SESSION['login']:"Chua login";
        // return "<h1>".json_encode($_SESSION)."</h1>";
    }

    function handler_header_authentication_shortcode(){
        $status_login = isset($_SESSION['login'])?true:false;
        if($status_login){
            $html = "<a href='http://book_tickets_movie2.local/historyorder/' class='custom-text-login' style='margin-right: 40px;'>History Book Ticket</a>";
            $html .= "<a class='custom-text-login btn_logout'>Logout</a>";
        }else{
            $html = "<a href='http://book_tickets_movie2.local/login' class='custom-text-login'>Login</a>";
        }
        return $html;
        // return json_encode($_SESSION);
    }

    function sesstion_logout_init(){
        session_unset();
        $argResult['status_logout'] = 'logout success';
        wp_send_json_success($argResult);
        die();
    }

    function handler_register_init(){
        $username = isset($_POST['username'])?$_POST['username']:"";
        $email = isset($_POST['email'])?$_POST['email']:"";
        $password = isset($_POST['password'])?$_POST['password']:"";
        $password = md5($password);
        $user_id = wp_insert_post(
            array(
                'post_type'=>'user',
                'post_title' => $username,                
                'post_status' => 'publish',
            )
        );
        update_post_meta($user_id,'_email',$email);
        update_post_meta($user_id,'_password',$password);
        $argResult['user_id'] = $user_id;
        wp_send_json_success($argResult);
        die();
    }

    function handler_login_init(){
        $email = isset($_POST['email'])?$_POST['email']:"";
        $password = isset($_POST['password'])?$_POST['password']:"";
        $arg_user = array(
            'post_type' => 'user',
            'limit'     => 1,
            'meta_query'=> array(
                array(
                    'key' => '_email',
                    'compare' => '=',
                    'value' => $email,
                )
            ));
        $list_user = get_posts($arg_user);
        $user_db = $list_user[0];
        //handler password
        $message = "";
        if(count($list_user)>0){
            if(md5($password) == get_post_meta($user_db->ID,'_password',true)){
                $message = "true";
                $_SESSION['login'] = true;
                $_SESSION['user_info']['user_id'] = $user_db->ID;
                $_SESSION['user_info']['email'] = get_post_meta($user_db->ID,'_email',true);

            }else{
                $message = "Password Wrong";
            }
        }else{
            $message = "Incorrect Account";
        }
        
        // $argResult['status'] = $status;
        wp_send_json_success($message);
        die();
    }

    function table_display_history_booking_shortcode(){
        $user_id = isset($_SESSION['login'])?$_SESSION['user_info']['user_id']:"";
        $arg_ticket = array(
            'post_type' => 'ticket',
            'numberposts' => -1,
            'meta_query'=> array(
                array(
                    'key' => '_user_id',
                    'compare' => '=',
                    'value' => $user_id,
                )
            ));

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
                        <th scope="col">Time Booking</th>
                    </tr>
                    </thead>
                    <tbody>';
                        // <tr>
                        //     <th scope="row">1</th>
                        //     <td>Lời hứa với cha</td>
                        //     <td width="100">
                        //         <img style="height: 100px;" class="img-fluid" src="https://caodang.fpt.edu.vn/wp-content/uploads/N%E1%BB%95i-nh%E1%BB%9B-ho%C3%A1-b%C4%83ng.jpg">
                        //     </td>
                        //     <td>R-1</td>
                        //     <td>2023-06-25</td>
                        //     <td>0h</td>
                        //     <td>A12,A13</td>
                        //     <td>140.000 vnđ</td>
                        // </tr>
                        $i=0;
                        foreach($list_ticket as $key => $ticket){
                            $i = ++$i;
                            $ticket_id = $ticket->ID;
                            $showtime_id = get_post_meta($ticket_id,'_showtime_id',true);
                            // return "<h1>".json_encode($ticket_id)."</h1>";
                            $movie_id = get_post_meta($showtime_id,'_movie_id',true);
                            $room_id = get_post_meta($showtime_id,'_room_id',true);
                            $quantity_chair_vip = get_post_meta($room_id,'_quantity_chair_vip',true);
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

                            $html .= '<tr>
                            <th scope="row">'.$i.'</th>
                            <td><a class="custom-text-login custom-text-history-booking" href='.get_the_permalink($movie_id).'>'.get_the_title($movie_id).'</a></td>
                            <td width="100">
                                <img style="height: 100px;" class="img-fluid" src="'.get_the_post_thumbnail_url($movie_id).'">
                            </td>
                            <td>'.get_the_title($room_id).'</td>
                            <td>'.get_post_meta($showtime_id,'_date_show',true).'</td>
                            <td>'.get_post_meta($showtime_id,'_time_show',true).'</td>
                            <td>'.$string_chair.'</td>
                            <td>'.number_format(get_post_meta($ticket_id,'_price',true)).' vnđ</td>
                            <td>'.get_post_meta($ticket_id,'_time_booking',true).'</td>
                        </tr>';
                        }

                $html .= '</tbody>
                </table>
            </div>
        </div>';
        return $html;
    }
}


