<?php

    // wp_nonce_field(basename(__FILE__), 'custom_post_metabox_nonce'); // Thêm nonce để bảo vệ form
    $user_id = get_post_meta($post->ID, '_user_id', true);
    $email = get_post_meta($post->ID, '_email', true);
    $password = get_post_meta($post->ID, '_password', true);
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <span>Email</span>
            <input id="emailUser" type="text" class="form-control" name="email">
            <span id="emailUser_error" class="text-danger"></span>
        </div>
        <div class="col-12 mt-3">
            <span>Password</span>
            <input id="passwordUser" type="password" class="form-control" name="password">
            <span id="password_error" class="text-danger"></span>
        </div>
        <div class="col-12 my-3">
            <span>Confirm Password</span>
            <input id="confirmPasswordUser" type="password" class="form-control">
            <span id="confirmPassword_error" class="text-danger"></span>
        </div>
    </div>

<script>
    $(document).ready(function(){
        $('#post').submit(function(e){
            $statusSubmit = validate()
            if(!$statusSubmit){
                e.preventDefault();
            }
        })

        function validate(){
            $statusSubmit = true;
            //email
            if($('#emailUser').val()==""){
                $('#emailUser_error').html('Vui lòng nhập email');
                $statusSubmit = false;
            }else{
                $('#emailUser_error').html('')
            }

            //password
            if($('#passwordUser').val() == ""){
                $('#password_error').html('Vui lòng nhập mật khẩu')
                $statusSubmit = false;
            }else{
                $('#password_error').html('');
            }

            //confirm password
            if($('#confirmPasswordUser').val() == ""){
                $('#confirmPassword_error').html('Vui lòng nhập mật khẩu')
                $statusSubmit = false;
            }else{
                $('#confirmPassword_error').html('')
            }

            if($('#passwordUser').val()!="" && $('#confirmPasswordUser').val()!=""){
                if($('#passwordUser').val() != $('#confirmPasswordUser').val()){
                    $('#password_error').html('Mật khẩu không khớp!')
                    $('#confirmPassword_error').html('Mật khẩu không khớp!')
                    $statusSubmit = false;
                }else{
                    $('#password_error').html('')
                    $('#confirmPassword_error').html('')
                }
            }
            return $statusSubmit;
        }
    })
</script>