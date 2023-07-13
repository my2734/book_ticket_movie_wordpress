<?php

// wp_nonce_field(basename(__FILE__), 'custom_post_metabox_nonce'); // Thêm nonce để bảo vệ form
$movie_id = get_post_meta($post->ID, '_movie_id', true);
$room = get_post_meta($post->ID, '_room', true);
$date_show = get_post_meta($post->ID, '_date_show', true);
$time_show = get_post_meta($post->ID, '_time_show', true);

$taxonomies = get_taxonomies(['object_type' => ['showtimes']]);
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

$argTime = $taxonomyTerms['timeShow'];

$arg = array(
    'post_type' => 'movie',
    'numberposts'       => -1,

);

$arg_movie = get_posts($arg);

$arg_room = array(
    'post_type' => 'room',
    'numberposts'       => -1,
);

$argRoom = get_posts($arg_room);
//edit
$status_edit = (isset($_GET['action']) && $_GET['action'] == "edit") ? true : false;
if ($status_edit) {

    $post_id = isset($_GET['post']) ? $_GET['post'] : "";

    $show_time_edit = get_post($post_id);
    $show_time_meta_box = get_post_meta($post_id);

    $movie_id_edit = get_post_meta($post_id, '_movie_id', true);
    $movie_name_edit = get_post($movie_id)->post_title;


    $date_show_edit = $show_time_meta_box['_date_show'][0];
    $time_show_edit = $show_time_meta_box['_time_show'][0];


    $room_id_edit = $show_time_meta_box['_room_id'][0];
    $room_edit = get_post($room_id_edit);
    $room_title_edit = $room_edit->post_title;

    //query display chair
    $quantity_chair_vip = get_post_meta($room_id_edit, '_quantity_chair_vip', true);
    $quantity_chair_normal = get_post_meta($room_id_edit, '_quantity_chair_normal', true);
    $arr_chair_vip = get_post_meta($post_id, '_array_chair', false)[0];
}

// Test test
// $argResult = [];
// forEach($argTime as $time){
//     if(!in_array($time->name, $timeResult)){
//         $argResult[] = $time->name;
//     }
// }
// echo json_encode($argResult);
// die();

$datetime =  new DateTime();
$datetime = $datetime->format('Y-m-d');
$arg_showtimes = array(
    'post_type' => 'showtimes',
    'meta_query' => array(
        array(
            'key' => '_date_show',
            'compare' => '>=',
            'value' => $datetime,
        )
    )
);
$list_showtimes = get_posts($arg_showtimes);
$time_now =  date('H');
foreach ($list_showtimes as $key => $showtime) {
    $time_show = explode('h', get_post_meta($showtime->ID, '_time_show', true))[0];
    if ($time_show <= $time_now && get_post_meta($showtime->ID, '_date_show', true) == $datetime) {
        unset($list_showtimes[$key]);
    }
}

//handler arr time show
$date_now = new DateTime();
$date_show = $date_now->add(new DateInterval("P1D"));

$date_show = $date_show->format('Y-m-d');
$room_id = $argRoom[0]->ID;

$timeResult = [];
foreach ($argTime as $key => $time) {
    foreach ($list_showtimes as $showtime) {

        $date_show_showtime = get_post_meta($showtime->ID, '_date_show', true);
        $room_id_showtime = get_post_meta($showtime->ID, '_room_id', true);
        $time_show_showtime = get_post_meta($showtime->ID, '_time_show', true);

        // if()
        // echo json_encode($time->name);
        if ($room_id == $room_id_showtime && $date_show_showtime == $date_show && $time_show_showtime == $time->name) {
            $timeResult[] = $time->name;
        }
    }
}


$argResultTime = [];
foreach ($argTime as $time) {
    if (!in_array($time->name, $timeResult)) {
        $argResultTime[] = $time->name;
    }
}


// echo json_encode($argResultTime);
// die();






?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    .custom-option {
        font-size: 16px;
        color: black;
    }

    .chair_vip {
        border: none !important;
        /* background-color: #98FB98 !important; */
        background-color: #3c6e71 !important;
    }

    .chair_normal {
        border: none !important;
        /* background-color: #FA8072 !important; */
        background-color: #d9d9d9 !important;
    }

    .disabled {
        background-color: #8c2f39 !important;
        /* background-color: #A9A9A9 !important; */
    }

    input[type='checkbox'] {
        width: 30px !important;
        height: 30px !important;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div>
                <label>Movie</label>
                <select id="movie_id" name="movie_id" class="form-control">
                    <?php
                    foreach ($arg_movie as $movie) { ?>
                        <option <?php echo ($status_edit == true && $movie_name_edit == $movie->post_title) ? 'selected' : ""; ?> value="<?php echo $movie->ID; ?>"><?php echo $movie->post_title ?></option>
                    <?php }
                    ?>
                </select>
            </div>
            <div>
                <label>Room show</label>
                <select id="room_id" name="room_id" class="form-control click_change">
                    <?php
                    foreach ($argRoom as $room) { ?>
                        <option <?php echo ($status_edit == true && $room_id_edit == $room->ID) ? 'selected' : ""; ?> value="<?php echo $room->ID ?>"><?php echo $room->post_title ?></option>
                    <?php }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div>
                <label>Date show</label>
                <!-- <input type="text" class="form-control"> -->
                <select id="date_show" name="date_show" class="form-control click_change">
                    <?php
                    $datetime =  new DateTime();
                    for ($i = 1; $i <= 5; $i++) {
                        $datetime =  $datetime->add(new DateInterval("P1D")); ?>
                        <option <?php echo ($status_edit == true && $datetime->format('Y-m-d') == $date_show_edit) ? "selected" : ""; ?> value="<?php echo $datetime->format('Y-m-d') ?>">
                            <?php
                            // echo $datetime->format('Y-m-d');
                            echo $datetime->format('Y-m-d')
                            ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div>
                <label>Time show</label>
                <select id="time_show" name="time_show" class="form-control">
                    <?php
                    foreach ($argResultTime as $time) { ?>
                        <option value="<?php echo $time ?>"><?php echo $time ?></option>
                    <?php    }
                    ?>
                </select>

                <input id="time_edit" type="hidden" name="time_edit" value="<?php echo ($status_edit == true) ? $time_show_edit : "" ?>">
            </div>
        </div>

        <?php
        if ($status_edit) { ?>
            <div class="col-12">
                <span>Ghế<span>
                        <br>
                        <?php
                        // $html_disable = "";
                        for ($i = 1; $i <= $quantity_chair_vip; $i++) {
                            $html_disable = in_array($i, $arr_chair_vip) ? "disabled" : "";
                        ?>
                            <input type="checkbox" <?php echo $html_disable ?> class=" mb-2 mr-0 chair_vip <?php echo $html_disable ?>" name="chair_id" value="<?php echo $i ?>">
                        <?php    }
                        ?>
                        <?php
                        for ($i = $quantity_chair_vip; $i <= $quantity_chair_normal + $quantity_chair_vip; $i++) {
                            $html_disable = in_array($i, $arr_chair_vip) ? "disabled" : "";
                        ?>
                            <input type="checkbox" <?php echo $html_disable ?> class=" mb-2 mr-0 chair_normal <?php echo $html_disable ?>" name="chair_id" value="<?php echo $i ?>">
                        <?php    }
                        ?>
            </div>

            <div class="col-12 mt-3">
                <span style="margin-bottom: 20px;">Note</span>
                <br>
                <input class="chair_vip seat_position1212 mb-2" type="checkbox"> : Chair vip
                <br>
                <input class="chair_normal seat_position mb-2" type="checkbox"> : Chair normal
                <br>
                <input disabled="" class="chair_vip seat_position mb-2 disabled" type="checkbox"> : Chair book
            </div>
    </div>
<?php    }

?>

</div>
<!-- <span id="clickme" class="btn btn-primary mt-5">Click me</span> -->


<script>
    $(document).ready(function() {

        // alert("helllo ca nha yeu");
        // const movie_id = $('#movie_id').val()
        // // alert(movie_id);
        // const room_id = $('#room_id').val()
        // const date_show = $('#date_show').val();
        const time_edit = $('#time_edit').val();
        // alert(time_edit)
        let status_edit = false;
        if (!time_edit == "") {
            status_edit = true;
        }




        // $.ajax({
        //     type : "post", //Phương thức truyền post hoặc get
        //     dataType : "json", //Dạng dữ liệu trả về xml, json, script, or html
        //     url : '', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
        //     data : {
        //         action: "thongbao1212", //Tên action
        //         movie_id: movie_id,
        //         room_id: room_id,
        //         date_show: date_show
        //     },
        //     context: this,
        //     beforeSend: function(){
        //         //Làm gì đó trước khi gửi dữ liệu vào xử lý
        //     },
        //     success: function(response) {
        //         // console.log(response.data);
        //         // Làm gì đó khi dữ liệu đã được xử lý
        //         if(response.success) {
        //             // console.log(JSON.stringify(response.data))
        //             // console.log(response.data)
        //             let html = ""
        //             const resultShowtimes = response.data
        //             resultShowtimes.forEach(function(showtime){
        //                 // console.log(showtime['name'])
        //                 let time = showtime
        //                 html = html + "<option value="+time+">"+time+"</option>"
        //             });
        //             if(status_edit){
        //                 html = html + "<option selected value="+time_edit+">"+time_edit+"</option>"
        //             }
        //             $('#time_show').html(html);
        //             // console.log(html)
        //         }
        //         else {
        //             alert('Đã có lỗi xảy ra');
        //         }
        //     },
        //     error: function( jqXHR, textStatus, errorThrown ){
        //         console.log( 'The following error occured: ' + textStatus, errorThrown );
        //     }
        // })

        // $('select').on('change', function() {
        //         const movie_id = $('#movie_id').val()
        //         const room = $('#room').val()
        //         const date_show = $('#date_show').val();
        //         $.ajax({
        //             type : "post", //Phương thức truyền post hoặc get
        //             dataType : "json", //Dạng dữ liệu trả về xml, json, script, or html
        //             url : '', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
        //             data : {
        //                 action: "thongbao1212", //Tên action
        //                 movie_id: movie_id,
        //                 room_id: room_id,
        //                 date_show: date_show
        //             },
        //             context: this,
        //             beforeSend: function(){
        //                 //Làm gì đó trước khi gửi dữ liệu vào xử lý
        //             },
        //             success: function(response) {
        //                 // console.log(response.data);
        //                 // Làm gì đó khi dữ liệu đã được xử lý
        //                 if(response.success) {
        //                     // console.log(JSON.stringify(response.data))
        //                     // console.log(response.data)
        //                     let html = ""
        //                     const resultShowtimes = response.data
        //                     resultShowtimes.forEach(function(showtime){
        //                         // console.log(showtime['name'])
        //                         let time = showtime
        //                         html = html + "<option value="+time+">"+time+"</option>"
        //                     });
        //                     if(status_edit){
        //                         html = html + "<option selected value="+time_edit+">"+time_edit+"</option>"
        //                     }
        //                     $('#time_show').html(html);
        //                     // console.log(html)
        //                 }
        //                 else {
        //                     alert('Đã có lỗi xảy ra');
        //                 }
        //             },
        //             error: function( jqXHR, textStatus, errorThrown ){
        //                 console.log( 'The following error occured: ' + textStatus, errorThrown );
        //             }
        // })

        //         // alert("hello ca nha yeu");
        // });
        // return false;

        $('.click_change').on('change', function() {
            // alert("hello ca nha yeu")
            // const movie_id = $('#movie_id').val()
            const room_id = $('#room_id').val()
            const date_show = $('#date_show').val();



            $.ajax({
                type: "post", //Phương thức truyền post hoặc get
                dataType: "json", //Dạng dữ liệu trả về xml, json, script, or html
                url: '<?php echo admin_url('admin-ajax.php'); ?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
                data: {
                    action: "thongbao1212", //Tên action
                    room_id: room_id,
                    date_show: date_show
                },
                context: this,
                beforeSend: function() {
                    //Làm gì đó trước khi gửi dữ liệu vào xử lý
                },
                success: function(response) {
                    // console.log(response.data);
                    // Làm gì đó khi dữ liệu đã được xử lý
                    if (response.success) {
                        // console.log(JSON.stringify(response.data))
                        // console.log(response.data)
                        let html = ""
                        const resultShowtimes = response.data
                        resultShowtimes.forEach(function(showtime) {
                            // console.log(showtime['name'])
                            let time = showtime
                            html = html + "<option value=" + time + ">" + time + "</option>"
                        });
                        if (status_edit) {
                            html = html + "<option selected value=" + time_edit + ">" + time_edit + "</option>"
                        }
                        $('#time_show').html(html);
                        // console.log(html)
                    } else {
                        alert('Đã có lỗi xảy ra');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('The following error occured: ' + textStatus, errorThrown);
                }
            })
        })

    })
</script>