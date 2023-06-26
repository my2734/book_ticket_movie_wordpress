<?php
/**
 * Template part for displaying film category section
 *
 * @package Movie Studio
 * @subpackage movie_studio
 */
?>

<section id="film-category" class="py-5 text-center">
  <div class="container">
    <?php if( get_theme_mod( 'movie_studio_film_category_heading' ) != '') { ?>
      <h2 class="mb-4"><?php echo esc_html(get_theme_mod('movie_studio_film_category_heading')); ?></h2>
    <?php }?>
    <div class="row">
      <?php $movie_studio_category = get_theme_mod('movie_studio_category_increament');
      for ($i=1; $i <= $movie_studio_category; $i++) { ?>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="category-inner-box mb-4">
            <?php if( get_theme_mod('movie_studio_category_box_icon'.$i) != '' ){ ?>
              <i class="<?php echo esc_html(get_theme_mod('movie_studio_category_box_icon'.$i)); ?>"></i>
            <?php }?>
            <?php if( get_theme_mod('movie_studio_category_box_title'.$i) != '' ){ ?>
              <h4><?php echo esc_html(get_theme_mod('movie_studio_category_box_title'.$i)); ?></h4>
            <?php }?>
            <?php if( get_theme_mod('movie_studio_category_box_text'.$i) != '' ){ ?>
              <p><?php echo esc_html(get_theme_mod('movie_studio_category_box_text'.$i)); ?></p>
            <?php }?>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
