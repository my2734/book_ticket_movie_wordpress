<?php get_header() ?>
<h1 style="color:white !important;margin-top: 100px !important;">
<?php echo __FILE__ ?>
<h1>
<!-- header section ends -->
<?php while ( have_posts() ) : the_post(); ?>
<!-- destination section starts  -->
<section class="about" id="about">
    <div class="row">
        <div class="col-sm-4">
            <div class="video-container aos-init aos-animate" data-aos="fade-right" data-aos-delay="300">
                <img style="width: 100%;" src="<?php echo get_the_post_thumbnail_url() ?>">
            </div>
        </div>
        <div class="col-sm-8">
            <div class="content aos-init aos-animate" data-aos="fade-left" data-aos-delay="600">
                <!-- <span>why choose us?</span> -->
                <h3><?php echo get_the_title() ?></h3>
                <div style="line-height: 16px;" class="mt-3">
                    <span class="custom-span" style="display: inline; font-size: 16px;text-transform: none;">Đạo diễn: </span>
                    <p style="display: inline" class="custom-p">Nguyen Van Minh</p>
                </div>
                <div style="line-height: 16px;" class="mt-3">
                    <span class="custom-span" style="display: inline; font-size: 16px;text-transform: none;">Diễn viên: </span>
                    <p style="display: inline" class="custom-p">Nguyen Van A, Nguyen Van B, Nguyen Van C,...</p>
                </div>
                <div style="line-height: 16px;" class="mt-3">
                    <span class="custom-span" style="display: inline; font-size: 16px;text-transform: none;">Thể loại: </span>
                    <p style="display: inline" class="custom-p"><?php echo get_post_meta($post->ID, '_genre',true) ?></p>
                </div>
                <div style="line-height: 16px;" class="mt-3">
                    <span class="custom-span" style="display: inline; font-size: 16px;text-transform: none;">Khởi chiếu: </span>
                    <p style="display: inline" class="custom-p">07/07/2023</p>
                </div>
                <div style="line-height: 16px;" class="mt-3">
                    <span class="custom-span" style="display: inline; font-size: 16px;text-transform: none;">Thời lượng: </span>
                    <p style="display: inline" class="custom-p"><?php echo get_post_meta($post->ID, "_time",true) ?> phút</p>
                </div>
                <div style="line-height: 16px;" class="mt-3">
                    <span class="custom-span" style="display: inline; font-size: 16px;text-transform: none;">Ngôn ngữ: </span>
                    <p style="display: inline" class="custom-p">Việtsub</p>
                </div>
                <div style="line-height: 16px;" class="mt-3">
                    <span class="custom-span" style="font-size: 16px;text-transform: none;">Trailer: </span>
                    <div class="mt-3">
                        <iframe width="100%" height="300px" src="https://www.youtube.com/embed/2EnP2tVC00Q" title="YouTube video player" 
                            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            allowfullscreen></iframe>
                    </div>
                </div>
                <div class="text-center">
                    <a href="#" class="btn">Book now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
       
    </div>
    <div class="row">
    </div>
</section>
<section class="services" id="services">
    <div class="heading">
        <span>our services</span>
        <h1>countless expericences</h1>
    </div>
    <div class="box-container">
        <?php 
         $args = array(  
            'post_type' => 'showtimes',
            'post_status' => 'publish',
            'meta_query'      => array(
                array(
                  'key'         => '_movie_id',
                  'value'       => $post->ID,
                ),
              )
            
        );
        $query = new WP_Query( $args );
            if( $query->have_posts() ) :
                while( $query->have_posts() ) : $query->the_post();
        ?>
        <div id="<?php echo get_the_ID() ?>" class="box aos-init showtime_item"  style="height: 160px !important;">
            <!-- <i class="fas fa-globe"></i> -->
           <div>
                <span class="custom-span" style="display: inline; font-size: 16px;text-transform: none; color: white;">Ngày chiếu: </span>
                <p style="display: inline" class="custom-p"><?php echo get_post_meta($post->ID, '_date_show',true) ?></p>
           </div>
           <div>
                <span class="custom-span" style="display: inline; font-size: 16px;text-transform: none; color: white;">Phòng chiếu: </span>
                <p style="display: inline" class="custom-p"><?php 
                    $room_id = get_post_meta($post->ID, '_room_id',true);
                    echo get_post($room_id)->post_title;
                ?></p>
           </div>
           <div>
                <span class="custom-span" style="display: inline; font-size: 16px;text-transform: none; color: white;">Thời gian: </span>
                <p style="display: inline" class="custom-p"><?php echo get_post_meta($post->ID, '_time_show', true) ?></p>
           </div>
        </div>
        
        <?php 
            endwhile;
            endif;
        ?>
    </div>
    <div class="heading">
        <span>our services</span>
        <h1>countless expericences</h1>
    </div>
    <div class="row">
  
        <div id="array_chair" class="col-12">
            <div class="custom-chair custom-chair-vip">01</div>
        </div>
    <div>
</section>
<?php endwhile ?>
<!-- destination section ends -->
<!-- footer section starts  -->
<?php get_footer() ?>