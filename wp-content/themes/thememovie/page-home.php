<?php
/*
Template Name: Home Page
*/

?>
<?php get_header() ?>

<h1 style="color:white !important;margin-top: 100px !important;"><?php echo __FILE__ ?><h1>
<!-- header section ends -->
<!-- home section starts  -->
<section class="home" id="home">
    <div class="content">
        <span data-aos="fade-up" data-aos-delay="150">follow us</span>
        <h3 data-aos="fade-up" data-aos-delay="300">to the unknown</h3>
        <p data-aos="fade-up" data-aos-delay="450">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus quia illum quod perspiciatis harum in possimus? Totam consequuntur officia quia?</p>
        <a data-aos="fade-up" data-aos-delay="600" href="#" class="btn">book now</a>
    </div>
</section>
<!-- home section ends -->
<!-- destination section starts  -->
<section class="destination" id="destination">
    <div class="heading">
        <span>our destination</span>
        <h1>make yours destination</h1>
    </div>
    <div class="box-container">
        <?php 
            $args = array(  
                'post_type' => 'movie',
                'post_status' => 'publish',
                'posts_per_page' => 9,
            );
            
            $loop = new WP_Query( $args ); 
                
            while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <div class="box" data-aos="fade-up" >
            <div class="image">
                <!-- <img src="images/des-1.jpg" alt=""> -->
                <?php echo get_the_post_thumbnail() ?>
            </div>
            <div class="content">
                <h3><?php echo  get_the_title() ?></h3>
                <div>
                    <p class="text"><?php echo get_the_excerpt() ?></p>
                </div>
                <!-- <h1><?php echo get_the_permalink() ?></h1> -->
                <a href="<?php echo get_the_permalink() ?>">Book now <i class="fas fa-angle-right"></i></a>
            </div>
        </div>
        <?php    
            endwhile;
            wp_reset_postdata(); 
            ?>
    </div>
</section>
<!-- destination section ends -->
<!-- banner section starts  -->
<div class="banner">
    <div class="content" data-aos="zoom-in-up" data-aos-delay="300">
        <span>start your adventures</span>
        <h3>Let's Explore This World</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum voluptatum praesentium amet quibusdam quam officia suscipit odio.</p>
        <a href="#book-form" class="btn">book now</a>
    </div>
</div>
<!-- banner section ends -->
<!-- footer section starts  -->
<?php get_footer() ?>