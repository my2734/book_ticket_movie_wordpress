<?php

	$film_maker_lite_tp_color_option = get_theme_mod('film_maker_lite_tp_color_option');
	$film_maker_lite_tp_color_option_link = get_theme_mod('film_maker_lite_tp_color_option_link');

	$film_maker_lite_tp_theme_css = '';

	if($film_maker_lite_tp_color_option != false){
		$film_maker_lite_tp_theme_css .='button[type="submit"],.center1 .ring::before,.top-header,.book-tkt-btn a,.main-navigation .menu > ul > li.highlight,.readmore-btn a,#slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover,.more-btn a,.box:before,.box:after,#latest-release .owl-nav i:hover,a.added_to_cart.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,a.added_to_cart.wc-forward,.page-numbers,.prev.page-numbers,.next.page-numbers,span.meta-nav,#theme-sidebar .tagcloud a:hover,#theme-sidebar button[type="submit"],#footer button[type="submit"],#comments input[type="submit"],.site-info,.toggle-nav button,#slider .inner_carousel p{';
			$film_maker_lite_tp_theme_css .='background-color: '.esc_attr($film_maker_lite_tp_color_option).';';
		$film_maker_lite_tp_theme_css .='}';
	}
	if($film_maker_lite_tp_color_option != false){
		$film_maker_lite_tp_theme_css .='a,#theme-sidebar .textwidget a,#footer .textwidget a,.comment-body a,.entry-content a,.entry-summary a,.social-media i:hover,.page-template-front-page .media-links a:hover,.topbar-home i.fas.fa-phone-volume,.main-navigation a:hover,#theme-sidebar h3{';
			$film_maker_lite_tp_theme_css .='color: '.esc_attr($film_maker_lite_tp_color_option).';';
		$film_maker_lite_tp_theme_css .='}';
	}
	if($film_maker_lite_tp_color_option != false){
		$film_maker_lite_tp_theme_css .='.center1,#footer .tagcloud a:hover{';
			$film_maker_lite_tp_theme_css .='border-color: '.esc_attr($film_maker_lite_tp_color_option).';';
		$film_maker_lite_tp_theme_css .='}';
	}
	if($film_maker_lite_tp_color_option_link != false){
		$film_maker_lite_tp_theme_css .='a:hover,#theme-sidebar a:hover{';
			$film_maker_lite_tp_theme_css .='color: '.esc_attr($film_maker_lite_tp_color_option_link).';';
		$film_maker_lite_tp_theme_css .='}';
	}
