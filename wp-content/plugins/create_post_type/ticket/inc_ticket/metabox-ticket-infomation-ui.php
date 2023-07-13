<?php

wp_nonce_field(basename(__FILE__), 'custom_post_metabox_nonce'); // Thêm nonce để bảo vệ form

$showtime_id = get_post_meta($post->ID, '_showtime_id', true);
$seat_position = get_post_meta($post->ID, '_seat_position', true);
$price = get_post_meta($post->ID, '_price', true);
$price_promotion = get_post_meta($post->ID, '_price_promotion', true);



$taxonomies = get_taxonomies(['object_type' => ['ticket']]);
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


$arg = array(
    'post_type' => 'movie'
);

$arg_movie = get_posts($arg);


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
$argShowtimes = get_posts($arg_showtimes);
$time_now =  date('H');
// return $time_now;
foreach ($argShowtimes as $key => $showtime) {

    $time_show = explode('h', get_post_meta($showtime->ID, '_time_show', true))[0];
    // return $time_show;
    if ($time_show <= $time_now && get_post_meta($showtime->ID, '_date_show', true) == $datetime) {
        // array_splice($argShowtimes,$key,1);
        unset($argShowtimes[$key]);
    }
}

// echo json_encode($argShowtimes);
// die();


//edit 
$status_edit = (isset($_GET['action']) && $_GET['action'] == "edit") ? true : false;
$arr_chair_choose = [];
if ($status_edit) {
    $ticket_id = $_GET['post'];
    $ticket_meta = get_post_meta($ticket_id);

    $price_edit = $ticket_meta['_price'][0];
    $price_promotion_edit = $ticket_meta['_price_promotion'][0];
    $showtime_id = $ticket_meta['_showtime_id'][0];

    $seat_position = get_post_meta($ticket_id, '_chair_id', false);

    $arr_chair_choose = get_post_meta($ticket_id, '_chair_id', false)[0];
    // echo "hello ca nha yeu";
    // die();
}




?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

    .choose {
        background-color: #f4d35e !important;
    }

    .seat_position {
        /* bottom: 20px; */
    }

    input[type='checkbox'] {
        width: 30px !important;
        height: 30px !important;
    }
</style>

<div class="Container">
    <!-- <h1>Hello ca nha yeu</h1> -->
    <div class="row">
        <div class="col-12">
            <?php
            if ($status_edit) { ?>
                <?php
                foreach ($arr_chair_choose as $arr_chair_choose_item) { ?>
                    <input style="display: none;" type="checkbox" checked name="arr_chair_choose[]" value="<?php echo (int)$arr_chair_choose_item ?>">
                <?php }
                ?>
            <?php  }
            ?>
        </div>
        <div class="col-sm-12">
            <div>
                <label>Showtime</label>
                <select id="showtime_id" name="showtime_id" class="form-control">
                    <?php
                    foreach ($argShowtimes as $showtime) {
                        $metaShowtimes = get_post_meta($showtime->ID);
                        $date_now =  new DateTime();
                        $date_now = $date_now->format('Y-m-d');
                        $room_id = $metaShowtimes['_room_id'][0];
                        $room_name = get_post($room_id)->post_title;
                        $movie_id = $metaShowtimes['_movie_id'][0];
                        $movie_name = get_post($movie_id)->post_title;
                        if ($metaShowtimes['_date_show'][0] >= $date_now) { ?>
                            <option <?php echo ($showtime_id == $showtime->ID) ? "selected" : ""; ?> value="<?php echo $showtime->ID ?>"><?php echo ' (' . $metaShowtimes['_date_show'][0] . ') ' . ' - Room (' . $room_name . ') - Time (' . $metaShowtimes['_time_show'][0] . ')- Movie name: ' . $movie_name  ?></option>

                        <?php   }
                        ?>
                    <?php  }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-sm-6">

            <div>
                <label>Price ticket</label>
                <input value="<?php echo $status_edit ? $price_edit : ""; ?>" type="text" name="price" id="price" class="form-control">
                <span class="text-danger" id="errorPrice"></span>
            </div>

        </div>
        <div class="col-sm-6">

            <div>
                <label>Price ticke discount</label>
                <input value="<?php echo $status_edit ? $price_promotion_edit : ""; ?>" type="text" id="promotion" name="price_promotion" class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <span class="mb-3">Chair<span>
                    <br>
                    <br>
                    <div id="chair" style="width: 100%">
                        <?php
                            if(count($argShowtimes)>0){
                                $showtime_id = $argShowtimes[0]->ID;
                                $room_id = get_post_meta($showtime_id,'_room_id',true);
                                $quantity_chair_vip = get_post_meta($room_id,'_quantity_chair_vip',true);
                                $quantity_chair_normal = get_post_meta($room_id,'_quantity_chair_normal',true);
                                $quantity_chair_total = $quantity_chair_vip+$quantity_chair_normal;
                                $arr_chair = get_post_meta($showtime_id,'_array_chair',false)[0];
                                
                                for($i=1;$i<=$quantity_chair_vip;$i++){ 
                                        $class_html = in_array($i,$arr_chair)?" disabled":"";
                                        $class_html .= in_array($i, $arr_chair_choose)?" choose":"";
                                    ?>
                                    <input <?php echo in_array($i, $arr_chair_choose)?"checked":"" ?> <?php echo $class_html ?> style="margin-right: 1px;" class="seat_position chair_vip mb-2 <?php echo $class_html ?>" type="checkbox" name="chair_id[]" value="<?php echo $i ?>">
                            <?php    }
                                for($i;$i<=$quantity_chair_total;$i++){ 
                                        $class_html = in_array($i,$arr_chair)?" disabled":"";
                                        $class_html .= in_array($i, $arr_chair_choose)?" choose":"";
                                    ?>
                                    <input <?php echo in_array($i, $arr_chair_choose)?"checked":"" ?>  <?php echo $class_html ?> style="margin-right: 1px;" class="seat_position chair_normal mb-2 <?php echo $class_html ?> " type="checkbox" name="chair_id[]" value="<?php echo $i ?>">
                               <?php }
                            } 
                        ?>
                    </div>

                  
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Note</label>
                            <br>
                            <input class="chair_vip seat_position mb-2" type="checkbox"><span style="top:20px;"> : Chair vip</span>
                            <br>
                            <input class="chair_normal seat_position mb-2" type="checkbox"> : Chair normal
                            <br>
                            <input disabled="" class="chair_vip seat_position mb-2 disabled" type="checkbox"> : Chair book
                            <br>
                            <input disabled="" class="choose seat_position mb-2 disabled" type="checkbox"> : Chair it's booking
                        </div>
                        <div class="col-sm-6">
                            <label>Giá vé</label>
                            <br>
                            <p>chair vip: 90.000 vnđ</p>
                            <p>chair normal: 70.000 vnđ</p>
                        </div>
                    </div>
        </div>

    </div>
</div>


<script>
    jQuery(document).ready(function($) {

        var arr_chair_choose = []
        $("input:checkbox[name='arr_chair_choose[]']:checked").each(function() {
            arr_chair_choose.push(parseInt($(this).val()));
        });

        let showtime_id = $('#showtime_id').val();

        $('#showtime_id').on('change', function() {
            showtime_id = $('#showtime_id').val()
            $.ajax({
                type: "post", //Phương thức truyền post hoặc get
                dataType: "json", //Dạng dữ liệu trả về xml, json, script, or html
                url: '<?php echo admin_url('admin-ajax.php'); ?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
                data: {
                    action: "showtime", //Tên action
                    showtime_id: showtime_id,
                },
                context: this,
                beforeSend: function() {
                    //Làm gì đó trước khi gửi dữ liệu vào xử lý/ empty remove jQUey
                },
                success: function(response) {
                    //Làm gì đó khi dữ liệu đã được xử lý
                    if (response.success) {
                        const resulftShowtimes = response.data
                        const quantity_chair_normal = Number(resulftShowtimes.quantity_chair_normal);
                        const quantity_chair_vip = Number(resulftShowtimes.quantity_chair_vip);
                        const array_chair_vip = Object.values(resulftShowtimes._array_chair[0])
                        const quantity_chair_total = quantity_chair_vip+quantity_chair_normal;

                        let html = "";
                        let class_html = "";
                        let checkbox_html = "";
                        var i;
                        for (i = 1; i <= quantity_chair_vip; i++) {
                            class_html = array_chair_vip.includes(i) ? " disabled" : "";
                            html += '<input ' + class_html + ' class="chair_vip seat_position mb-2 ' + class_html + '" type="checkbox" ' + checkbox_html + ' name="chair_id[]" value="' + i + '">';
                            class_html = "";
                            checkbox_html = "";
                        }
                        // alert(quantity_chair_vip);
                        for (i; i <= quantity_chair_total; i++) {
                            class_html = array_chair_vip.includes(i) ? " disabled" : "";
                            html += '<input ' + class_html + ' class="chair_normal seat_position mb-2 ' + class_html + '" type="checkbox" name="chair_id[]" value="' + i + '">';
                            class_html = "";
                        }
                        $('#chair').html(html);
                        $('#price').val('');
                        $('#promotion_price').val('');
                        $('.seat_position').click(function(){
                            let total = 0;
                            $("input:checkbox[name='chair_id[]']:checked").each(function() {
                                // arr_chair_choose.push(parseInt($(this).val()));
                                if($(this).val()>quantity_chair_vip){
                                    total = total+70000;
                                }else{
                                    total = total+90000;
                                }
                            });
                            $('#price').val(total)
                            $('#promotion').val(total);
                        })
                    } else {
                        alert('Đã có lỗi xảy ra');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('The following error occured: ' + textStatus, errorThrown);
                }
            });
        })

        $('.seat_position').click(function(){
            let total = 0;
            $("input:checkbox[name='chair_id[]']:checked").each(function() {
                let quantity_chair_vip = Number(<?php echo $quantity_chair_vip ?>)
                if($(this).val()>quantity_chair_vip){
                    total = total+70000;
                }else{
                    total = total+90000;
                }
            });
            $('#price').val(total)
            $('#promotion').val(total);
        })
    })
</script>

<script>
    // jQuery(document).ready(function($) {
    //     $(".seat_position").click(function() {
    //         console.log(`click`);
    //     });
    // })
</script>