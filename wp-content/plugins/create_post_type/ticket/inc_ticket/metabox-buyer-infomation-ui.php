<?php
    wp_nonce_field(basename(__FILE__), 'custom_post_metabox_nonce'); // Thêm nonce để bảo vệ form
    $name_buyer = get_post_meta($post->ID, '_name_buyer', true);
    $phone = get_post_meta($post->ID, '_phone', true);
    $email = get_post_meta($post->ID, '_email', true);

    $status_edit = (isset($_GET['action']) && $_GET['action'] =="edit")?true:false;
    if($status_edit){
        $ticket_id = $_GET['post'];
        $ticket_meta = get_post_meta($ticket_id);
        // echo json_encode($ticket_meta);
        // die();
        $name_buyer = $ticket_meta['_name_buyer'][0];
        // echo $name_buyer;
        // die();
        $phone = $ticket_meta['_phone'][0];
        $email = $ticket_meta['_email'][0];
    }
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="Container">
    <div class="row">
        <div class="col">
            <div>
                <label>Người đặt</label>
                <input value="<?php echo $status_edit?$name_buyer:""; ?>" type="text" name="name_buyer" id="name_buyer" class="form-control" >
                <span id="error_name_buyer" class="text-danger"></span>
            </div>
            <div>
                <label>Số điện thoại</label>
                <input value="<?php echo $status_edit?$phone:""; ?>" type="text" name="phone" id="phone" class="form-control" >
                <span id="error_phone" class="text-danger"></span>
            </div> 
            
        </div>
        <div class="col">
            <div>
                <label>Email</label>
                <input value="<?php echo $status_edit?$email:""; ?>" type="text" name="email" id="email" class="form-control" >
                <span id="error_email" class="text-danger"></span>
            </div>
        </div>
    </div>
    
</div>


<script>
    $(document).ready(function(){
       const status_edit =  $('#status_edit').val();
        var statusSubmit = false
        function validateForm(){
            //validate price
            const price = $('#price').val()
            let errorPrice = ""
            let statusPrice = true
            if(price == ""){
                errorPrice = "Vui lòng nhập giá vé"
                statusPrice = false;
            }else if(isNaN(price)){
                errorPrice = "Nhập sai định dạng"
                statusPrice = false
            }
            $('#errorPrice').html(errorPrice)
            //validate name_buyer
            const name_buyer = $('#name_buyer').val()
            let error_name_buyer = ""
            let status_name_buyer = true
            if(name_buyer == ""){
                error_name_buyer = "Vui lòng nhập tên người đặt vé"
                status_name_buyer = false
            }
            $('#error_name_buyer').html(error_name_buyer)
            //validate phone
            const phone = $('#phone').val()
            let error_phone = ""
            let status_phone= true
            if(phone == ""){
                error_phone = "Vui lòng nhập số điện thoại"
                status_phone = false
            }else if(isNaN(phone)){
                error_phone = "Nhập sai định dạng"
                status_phone = false
            }
            $('#error_phone').html(error_phone)
            //validate 
            const email = $('#email').val()
            let error_email = ""
            let status_email = true
            if(email == ""){
                // alert(email)
                error_email = "Vui lòng nhập địa chỉ email"
                status_email = false
            }else if(!email.includes('@')){
                error_email = "Nhập sai định dạng" 
                status_email = false
            }
            $('#error_email').html(error_email)
            if(statusPrice && status_name_buyer && status_phone && status_email){
                statusSubmit = true
            }
        }   
        $('#post').submit(function(e){
            // console.log('click submit')
            validateForm();
            
            // const seat_position = $('.seat_position');
            var seat_position = [];
            showtime_id = $('#showtime_id').val()
            $("input:checkbox[name='chair_id[]']:checked").each(function(){    
                seat_position.push($(this).val());
            });
           
            // alert(seat_position);
            // e.preventDefault();

            // if(!statusSubmit){
            //     e.preventDefault();
            // }

            if(status_edit){
                const ticket_id = $('#ticket_id').val()
                $.ajax({
                    type : "post", //Phương thức truyền post hoặc get
                    dataType : "json", //Dạng dữ liệu trả về xml, json, script, or html
                    url : '<?php echo admin_url('admin-ajax.php');?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
                    data : {
                        action: "update_array_chair_normal1212", //Tên action
                        seat_position: seat_position,
                        showtime_id:showtime_id,
                        ticket_id: ticket_id
                    },
                    context: this,
                    beforeSend: function(){
                        //Làm gì đó trước khi gửi dữ liệu vào xử lý
                    },
                    success: function(response) {
                        //Làm gì đó khi dữ liệu đã được xử lý
                        if(response.success) {
                            const resultShowtimes = response.data
                            console.log(resultShowtimes)
                        }
                        else {
                            alert('Đã có lỗi xảy ra');
                        }
                        },
                        error: function( jqXHR, textStatus, errorThrown ){
                            console.log( 'The following error occured: ' + textStatus, errorThrown );
                        }
                });
            }else{
                 //ajax khi them moi
                $.ajax({
                    type : "post", //Phương thức truyền post hoặc get
                    dataType : "json", //Dạng dữ liệu trả về xml, json, script, or html
                    url : '<?php echo admin_url('admin-ajax.php');?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
                    data : {
                        action: "add_array_chair_normal1212", //Tên action
                        seat_position: seat_position,
                        showtime_id:showtime_id,

                    },
                    context: this,
                    beforeSend: function(){
                        //Làm gì đó trước khi gửi dữ liệu vào xử lý
                    },
                    success: function(response) {
                        //Làm gì đó khi dữ liệu đã được xử lý
                        if(response.success) {
                            const resultShowtimes = response.data
                            console.log(resultShowtimes)
                        }
                        else {
                            alert('Đã có lỗi xảy ra');
                        }
                        },
                        error: function( jqXHR, textStatus, errorThrown ){
                            console.log( 'The following error occured: ' + textStatus, errorThrown );
                        }
                });
            }
           
        })
    })
</script>