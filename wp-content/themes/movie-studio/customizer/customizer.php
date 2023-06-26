<?php

function movie_studio_remove_customize_register() {
    global $wp_customize;
    $wp_customize->remove_setting( 'film_maker_lite_slider_buttom_mob' );
    $wp_customize->remove_control( 'film_maker_lite_slider_buttom_mob' );

}
add_action( 'customize_register', 'movie_studio_remove_customize_register', 11 );

function movie_studio_customize_register( $wp_customize ) {
    // Film Category Section
    $wp_customize->add_section( 'movie_studio_category_section' , array(
        'title'      => __( 'Film Category Section Settings', 'movie-studio' ),
        'panel' => 'film_maker_lite_panel_id'
    ) );

    $wp_customize->add_setting('movie_studio_film_category_heading',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('movie_studio_film_category_heading',array(
        'label' => esc_html__('Section Title ','movie-studio'),
        'section'   => 'movie_studio_category_section',
        'type'      => 'text'
    ));

    $wp_customize->add_setting('movie_studio_category_increament',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('movie_studio_category_increament',array(
        'label' => esc_html__('Category Box Increament','movie-studio'),
        'section'   => 'movie_studio_category_section',
        'type'      => 'number',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 0,
            'max'              => 12,
        ),
    ));

    $movie_studio_category = get_theme_mod('movie_studio_category_increament');

    for ($i=1; $i <= $movie_studio_category ; $i++) {

        $wp_customize->add_setting('movie_studio_category_box_icon'.$i,array(
            'default'   => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('movie_studio_category_box_icon'.$i,array(
            'label' => esc_html__('Icon ','movie-studio').$i,
            'description' => esc_html__('Ex: fab fa-500px','movie-studio').$i,
            'section'   => 'movie_studio_category_section',
            'type'      => 'text'
        ));

        $wp_customize->add_setting('movie_studio_category_box_title'.$i,array(
            'default'   => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('movie_studio_category_box_title'.$i,array(
            'label' => esc_html__('Title ','movie-studio').$i,
            'section'   => 'movie_studio_category_section',
            'type'      => 'text'
        ));

        $wp_customize->add_setting('movie_studio_category_box_text'.$i,array(
            'default'   => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('movie_studio_category_box_text'.$i,array(
            'label' => esc_html__('Text ','movie-studio').$i,
            'section'   => 'movie_studio_category_section',
            'type'      => 'text'
        ));
    }
}
add_action( 'customize_register', 'movie_studio_customize_register' );
