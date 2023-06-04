<?php 
    $quantity_chair_normal = get_post_meta($post->ID, '_quantity_chari_normal',true);
    $quantity_chair_vip = get_post_meta($post->ID,'_quantity_chair_vip',true);
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="container">
    <div class="row">
        <label>Số lượng ghế thường</label>
        <input id="quantity_chair_normal" name="quantity_chair_normal" type="text" class="form-control">
        <span id="quantity_chair_normal_error" class="text-danger"></span>
    </div>
    <div class="row mt-3">
        <label>Số lượng ghế vip</label>
        <input id="quantity_chair_vip" name="quantity_chair_vip" type="text" class="form-control">
        <span id="quantity_chair_vip_error" class="text-danger"></span>
    </div>

    <span class="btn btn-primary mt-5" id="clickme">Click me<span>
</div>

<script>

    $(document).ready(function(e){
        let statusSubmit = false

        function validate(){
            //validate quantity chair normal
            const quantity_chair_normal = $('#quantity_chair_normal').val()
            let errorNormal = ""
            let statusNormal = true
            if(quantity_chair_normal == ""){
                errorNormal = "Vui lòng nhập số lượng ghế thường";
                statusNormal = false;
            }else if(isNaN(quantity_chair_normal)){
                errorNormal = "Nhập sai định dạng";
                statusNormal = false;
            }
            $('#quantity_chair_normal_error').html(errorNormal);

            //validate quantity chair vip
            const quantity_chair_vip = $('#quantity_chair_vip').val()
            let errorVip = ""
            let statusVip = true
            if(quantity_chair_vip == ""){
                errorVip = "Vui lòng nhập số lượng ghế vip";
                statusVip = false;
            }else if(isNaN(quantity_chair_vip)){
                errorVip = "Nhập sai định dạng";
                statusVip = false;
            }
            $('#quantity_chair_vip_error').html(errorVip);

            if(statusNormal && statusVip){
                statusSubmit = true;
            }
        }

        $('#post').submit(function(e){
            validate()
            if(!statusSubmit){
                e.preventDefault()
            }
        })


        $('#clickme').click(function(){
            var wp_ajax_url = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
            jQuery.ajax({
                url: wp_ajax_url,
                type: 'POST',
                data:  {
                            action: "wpshare247_action_load_more",
                        },
                dataType: 'json',
                success: function(response){ 
                    console.log(response.data); //return false;
                },
                error: function(jqXHR){
                
                }          
            });
            
            return false;
        })
    })  
</script>
