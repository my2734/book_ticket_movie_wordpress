<section class="footer credit">
    <div class="box-container">
        <div class="box" data-aos="fade-up" data-aos-delay="150">
            <a href="#" class="logo"> <i class="fas fa-paper-plane"></i>travel </a>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, ad?</p>
            <div class="share">
                <a href="https://www.facebook.com/FreeWebsiteCode/" class="fab fa-facebook-f"></a>
                <a href="https://twitter.com/freewebsitecode" class="fab fa-twitter"></a>
                <a href="https://www.linkedin.com/in/freewebsitecode/" class="fab fa-linkedin"></a>
                <a href="https://www.youtube.com/FreeWebsiteCode/videos" class="fab fa-youtube"></a>
            </div>
        </div>
        <div class="box" data-aos="fade-up" data-aos-delay="300">
            <h3>quick links</h3>
            <p> <i class="fas fa-envelope"></i> yourname@gmail.com </p>
            <p> <i class="fas fa-map"></i> City, Country - 400104 </p>
            <p> <i class="fas fa-clock"></i> 7:00am - 10:00pm </p>
        </div>
        <div class="box" data-aos="fade-up" data-aos-delay="450">
            <h3>contact info</h3>
            <p> <i class="fas fa-phone"></i> +123-456-7890 </p>
            <p> <i class="fas fa-phone"></i> +111-222-3333 </p>
        </div>
    </div>
    <p>created by <span><a href="https://freewebsitecode.com/">Free Website Code</a></span> | all rights reserved!</p>
</section>
<?php wp_footer() ?>
<!-- footer section ends -->
<?php wp_footer() ?>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script> -->
<script>
    // AOS.init({
    //     duration: 800,
    //     offset:150,
    // });
    
</script>
<script>
    $(document).ready(function(){
        $('.showtime_item').click(function(){
            const showtime_id = $(this).attr('id')
            $.ajax({
                    type : "post", //Phương thức truyền post hoặc get
                    dataType : "json", //Dạng dữ liệu trả về xml, json, script, or html
                    url : '<?php echo admin_url('admin-ajax.php');?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
                    data : {
                        action: "ajax_showtime_frontend", 
                        showtime_id: showtime_id
                    },
                    context: this,
                    beforeSend: function(){
                        //Làm gì đó trước khi gửi dữ liệu vào xử lý
                    },
                    success: function(response) {
                        // Làm gì đó khi dữ liệu đã được xử lý
                        if(response.success) {
                            const resultReponse = response.data
                            const quantity_chair_vip = resultReponse['quantity_chair_vip']
                            const quantity_chair_normal = resultReponse['quantity_chair_normal']
                            const array_chair = resultReponse['array_chair']
                            console.log(array_chair)
                        }
                        else {
                            alert('Đã có lỗi xảy ra');
                        }
                    },
                    error: function( jqXHR, textStatus, errorThrown ){
                        console.log( 'The following error occured: ' + textStatus, errorThrown );
                    }})
        })
    })
</script>
</body>
</html>