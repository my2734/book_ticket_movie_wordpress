<?php
/**
 * Displays footer site info
 *
 * @package Movie Studio
 * @subpackage movie_studio
 */

?>
<div class="site-info">
    <div class="container">
        <p><?php movie_studio_credit(); ?> <?php echo esc_html(get_theme_mod('film_maker_lite_footer_text',__('By Themespride','movie-studio'))); ?></p>
    </div>
</div>