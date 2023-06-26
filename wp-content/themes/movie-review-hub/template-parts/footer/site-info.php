<?php
/**
 * Displays footer site info
 *
 * @package Movie Review Hub
 * @subpackage movie_review_hub
 */

?>

<div class="site-info">
    <div class="container">
        <p><?php movie_review_hub_credit();?> <?php echo esc_html(get_theme_mod('film_maker_lite_footer_text',__('By Themespride','movie-review-hub'))); ?></p>
    </div>
</div>
