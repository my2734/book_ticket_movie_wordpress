<?php
/**
 * The front page template file
 *
 * @package Movie Studio
 * @subpackage movie_studio
 */

get_header(); ?>

<main id="tp_content" role="main">
	<?php get_template_part( 'template-parts/home/slider' ); ?>
	<?php get_template_part( 'template-parts/home/latest-release' ); ?>
	<?php get_template_part( 'template-parts/home/film-category' ); ?>
	<?php get_template_part( 'template-parts/home/home-content' ); ?>	
</main>

<?php get_footer();