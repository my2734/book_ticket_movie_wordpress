<?php

/**
 * Enqueue child styles.
 */
function j0e_enqueue_styles()
{
    wp_enqueue_style('child-theme', get_stylesheet_directory_uri() . '/style.css', array(), 100);
}

add_action('wp_enqueue_scripts', 'j0e_enqueue_styles');
