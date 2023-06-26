<?php
   
    wp_nonce_field(basename(__FILE__), 'custom_post_metabox_nonce'); // Thêm nonce để bảo vệ form
    // $movie_name = get_post_meta($post->ID, '_movie_name', true);
    // $showtime = get_post_meta($post->ID, '_showtime', true);
    // $room = get_post_meta($post->ID, '_room', true);

    $showtime_id = get_post_meta($post->ID, '_showtime_id', true);
    $seat_position = get_post_meta($post->ID, '_seat_position', true);
    $price = get_post_meta($post->ID, '_price', true);
    $price_promotion = get_post_meta($post->ID, '_price_promotion', true);



    $taxonomies = get_taxonomies(['object_type' => ['ticket']]);
    $taxonomyTerms = [];
    // loop over your taxonomies
    foreach ($taxonomies as $taxonomy)
    {
        // retrieve all available terms, including those not yet used
        $terms    = get_terms(['taxonomy' => $taxonomy, 'hide_empty' => false]);
        // make sure $terms is an array, as it can be an int (count) or a WP_Error
        $hasTerms = is_array($terms) && $terms;
        if($hasTerms)
        {
            $taxonomyTerms[$taxonomy] = $terms;        
        }
    }

    // $argRoom = $taxonomyTerms['room'];
    // $argChair = $taxonomyTerms['chair'];
    // $argTimeShow = $taxonomyTerms['timeShow'];

    
    $arg = array(
        'post_type' => 'movie'
    );

    $arg_movie = get_posts($arg);
    
    //Đổ dữ liệu post type showtimes với meta box _date_show có date từ ngày hiện tai trở đi 
    $arg = array(
        'post_type' => 'showtimes'
    );
    $argShowtimes = get_posts($arg);
    

    //edit 
    $status_edit = (isset($_GET['action']) && $_GET['action'] =="edit")?true:false;
    if($status_edit){
        $ticket_id = $_GET['post'];
        $ticket_meta = get_post_meta($ticket_id);
        
        $price_edit = $ticket_meta['_price'][0];
        $price_promotion_edit = $ticket_meta['_price_promotion'][0];
        $showtime_id = $ticket_meta['_showtime_id'][0];

        $seat_position = get_post_meta( $ticket_id, '_chair_id', false );
        
        $arr_chair_choose = get_post_meta($ticket_id, '_chair_id',false)[0];
       
    }

    
    ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
.custom-option{
    font-size: 16px;
    color: black;
}

.chair_vip{
    border:none !important;
    background-color: #98FB98 !important;
}

.chair_normal{
    border:none !important;
    background-color: #FA8072	 !important;
}

.disabled{
    background-color: #A9A9A9 !important;
}

.choose{
    background-color: #FFD700 !important;
}

.seat_position{
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
                    if($status_edit){ ?>
                        <?php
                    foreach($arr_chair_choose as $arr_chair_choose_item){ ?>
                        <input style="display: none;" type="checkbox" checked name="arr_chair_choose[]" value="<?php echo (int)$arr_chair_choose_item ?>">
                <?php }
                ?>
                <?php  }
                ?>
            </div>
        <div class="col-sm-12">
                <div>
                    <label>Suất chiếu</label>
                    <select id="showtime_id" name="showtime_id" class="form-control">
                        <?php
                            foreach($argShowtimes as $showtime){ 
                                $metaShowtimes = get_post_meta($showtime->ID); 
                                $date_now =  new DateTime();
                                $date_now = $date_now->format('Y-m-d');
                                $room_id = $metaShowtimes['_room_id'][0];
                                $room_name = get_post($room_id)->post_title;
                                $movie_id = $metaShowtimes['_movie_id'][0];
                                $movie_name = get_post($movie_id)->post_title;
                                if($metaShowtimes['_date_show'][0] >= $date_now ){ ?>
                                        <option <?php echo ($showtime_id == $showtime->ID)?"selected":""; ?> value="<?php echo $showtime->ID ?>"><?php echo' ('.$metaShowtimes['_date_show'][0].') '.' - Room ('.$room_name.') - Time ('.$metaShowtimes['_time_show'][0].')- Movie name: '. $movie_name  ?></option>

                            <?php   }
                                ?>
                        <?php  }                        
                        ?>
                    </select>
                </div>
        </div>
        <div class="col-sm-6">
                
                <div>
                    <label>Giá vé</label>
                    <input value="<?php echo $status_edit?$price_edit:""; ?>" type="text" name="price" id="price" class="form-control" >
                    <span class="text-danger" id="errorPrice"></span>
                </div>
                
            </div>
            <div class="col-sm-6">
                
                <div>
                    <label>Giá vé giảm</label>
                    <input value="<?php echo $status_edit?$price_promotion_edit:""; ?>" type="text" name="price_promotion" class="form-control" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <span class="mb-3">Ghế<span>
                <br>
                <br>
                <div id="chair" style="width: 100%">
                    
                </div>
            
                <?php 
                    if($status_edit){ ?>
                        <input id="status_edit" placeholder="status_edit" value="<?php echo $status_edit ?>"> 
                        <input id="ticket_id" placeholder="ticket_id" value="<?php echo $ticket_id ?>"> 

                <?php } ?>                    
                <div class="row">
                    <div class="col-sm-6">
                        <label>Ghi chú</label>
                        <br>
                        <input class="chair_vip seat_position1212 mb-2" type="checkbox"><span style="top:20px;"> : Ghế vip</span>
                        <br>
                        <input class="chair_normal seat_position mb-2" type="checkbox"> : Ghế thường
                        <br>
                        <input disabled="" class="chair_vip seat_position mb-2 disabled" type="checkbox"> : Ghế đã được đặt
                        <br>
                        <input disabled="" class="choose seat_position mb-2 disabled" type="checkbox"> : Ghế đã chọn
                    </div>
                    <div class="col-sm-6"> 
                        <label>Giá vé</label>
                        <br>
                        <p>Ghế vip: 90.000 vnđ</p>
                        <p>Ghế thường: 70.000 vnđ</p>
                    </div>
                </div>
        </div>
       
    </div>
</div>


<script>
    $(document).ready(function(){

      
    
        var arr_chair_choose = []
        $("input:checkbox[name='arr_chair_choose[]']:checked").each(function(){    
            arr_chair_choose.push(parseInt($(this).val()));
        });

        // console.log(arr_chair_choose)
       
        
        let showtime_id = $('#showtime_id').val()
        $.ajax({
            type : "post", //Phương thức truyền post hoặc get
            dataType : "json", //Dạng dữ liệu trả về xml, json, script, or html
            url : '<?php echo admin_url('admin-ajax.php');?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
            data : {
                action: "showtime", //Tên action
                showtime_id: showtime_id,
            },
            context: this,
            beforeSend: function(){
                //Làm gì đó trước khi gửi dữ liệu vào xử lý
            },
            success: function(response) {
                // console.log(response.data);
                //Làm gì đó khi dữ liệu đã được xử lý
                // console.log(response.data)  
                if(response.success) {
                    const resultShowtimes = response.data
                    const quantity_chair_normal = resultShowtimes.quantity_chair_normal;
                    const quantity_chair_vip = resultShowtimes.quantity_chair_vip;
                    const array_chair_vip = Object.values(resultShowtimes._array_chair[0])
                    // console.log(array_chair_vip);
                    let html = "";
                    let class_html = "";
                    let checkbox_html = "";
                    var i;
                    
                    for(i = 1; i <= quantity_chair_vip; i++){ 
                        class_html = array_chair_vip.includes(i)?" disabled":"";
                        class_choose = arr_chair_choose.includes(i)?" choose":""
                        html+='<input  '+class_html+' class="chair_vip '+class_choose+' seat_position1212 mb-2 '+class_html+'" type="checkbox" '+checkbox_html+' name="chair_id[]" value="'+i+'">';
                        class_html = "";
                        checkbox_html = "";
                    } 
                    for(i; i<=quantity_chair_normal;i++){
                        class_html = array_chair_vip.includes(i)?" disabled":"";
                        class_choose = arr_chair_choose.includes(i)?" choose":""
                        html+='<input '+class_html+' class="chair_normal '+class_choose+' seat_position1212 mb-2 '+class_html+'" type="checkbox" name="chair_id[]" value="'+i+'">';
                        class_html = "";
                    }
                    $('#chair').html(html);
               }
                else {
                    alert('Đã có lỗi xảy ra');
                }
            },
            error: function( jqXHR, textStatus, errorThrown ){
                console.log( 'The following error occured: ' + textStatus, errorThrown );
            }
        });

        $('#showtime_id').on('change',function(){
            showtime_id = $('#showtime_id').val()
            $.ajax({
            type : "post", //Phương thức truyền post hoặc get
            dataType : "json", //Dạng dữ liệu trả về xml, json, script, or html
            url : '<?php echo admin_url('admin-ajax.php');?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
            data : {
                action: "showtime", //Tên action
                showtime_id: showtime_id,
            },
            context: this,
            beforeSend: function(){
                //Làm gì đó trước khi gửi dữ liệu vào xử lý
            },
            success: function(response) {
                //Làm gì đó khi dữ liệu đã được xử lý
                if(response.success) {
                    const resulftShowtimes = response.data
                    const quantity_chair_normal = resulftShowtimes.quantity_chair_normal;
                    const quantity_chair_vip = resulftShowtimes.quantity_chair_vip;
                    const array_chair_vip = Object.values(resulftShowtimes._array_chair[0])
                   

                    let html = "";
                    let class_html = "";
                    let checkbox_html = "";
                    var i;
                    for(i = 1; i <= quantity_chair_vip; i++){ 
                        class_html = array_chair_vip.includes(i)?" disabled":"";
                        html+='<input '+class_html+' class="chair_vip seat_position1212 mb-2 '+class_html+'" type="checkbox" '+checkbox_html+' name="chair_id[]" value="'+i+'">';
                        class_html = "";
                        checkbox_html = "";
                    } 
                    // alert(quantity_chair_vip);
                    for(i; i<=quantity_chair_normal;i++){
                        class_html = array_chair_vip.includes(i)?" disabled":"";
                        html+='<input '+class_html+' class="chair_normal seat_position1212 mb-2 '+class_html+'" type="checkbox" name="chair_id[]" value="'+i+'">';
                        class_html = "";
                    }
                    $('#chair').html(html);
                }
                else {
                    alert('Đã có lỗi xảy ra');
                }
                },
                error: function( jqXHR, textStatus, errorThrown ){
                    console.log( 'The following error occured: ' + textStatus, errorThrown );
                }
            });
        })

       

       
       

        return false;



       
    })
</script>

<script>
    $(document).ready(function(){
        $("[type=checkbox]").click(function(){
        var clicked = $(this);
        alert(clicked.text() +" === "+clicked.val());
         });
    })

</script>