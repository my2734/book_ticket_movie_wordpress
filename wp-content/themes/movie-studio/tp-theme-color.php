<?php

	$film_maker_lite_tp_color_option = get_theme_mod('film_maker_lite_tp_color_option');
	$film_maker_lite_tp_color_option_link = get_theme_mod('film_maker_lite_tp_color_option_link');

	$film_maker_lite_tp_theme_css = '';

	if($film_maker_lite_tp_color_option != false){
		$film_maker_lite_tp_theme_css .='.readmore-btn a,.book-tkt-btn a,#theme-sidebar button[type="submit"], #footer button[type="submit"],.prev.page-numbers, .next.page-numbers,.page-numbers,.site-info,#theme-sidebar .tagcloud a:hover,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.wp-block-file .wp-block-file__button, .wp-block-button .wp-block-button__link,.box-info i,span.meta-nav,#slider .inner_carousel p,.more-btn a,.box:before, .box:after,#comments input[type="submit"],#slider .carousel-control-prev-icon, #slider .carousel-control-next-icon,.category-inner-box i,.toggle-nav button{';
			$film_maker_lite_tp_theme_css .='background-color: '.esc_attr($film_maker_lite_tp_color_option).';';
		$film_maker_lite_tp_theme_css .='}';
	}
	if($film_maker_lite_tp_color_option != false){
		$film_maker_lite_tp_theme_css .='a,#theme-sidebar .textwidget a, #footer .textwidget a, .comment-body a, .entry-content a, .entry-summary a,.main-navigation a:hover,.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a,#theme-sidebar h3,#theme-sidebar a:hover,h1, h2, h3, h4, h5, h6,h2.woocommerce-loop-product__title, .woocommerce div.product .product_title,.woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price{';
			$film_maker_lite_tp_theme_css .='color: '.esc_attr($film_maker_lite_tp_color_option).';';
		$film_maker_lite_tp_theme_css .='}';
	}
	if($film_maker_lite_tp_color_option != false){
		$film_maker_lite_tp_theme_css .='{';
			$film_maker_lite_tp_theme_css .='border-color: '.esc_attr($film_maker_lite_tp_color_option).';';
		$film_maker_lite_tp_theme_css .='}';
	}
	if($film_maker_lite_tp_color_option_link != false){
		$film_maker_lite_tp_theme_css .='a:hover,#theme-sidebar a:hover,.site-info a:hover{';
			$film_maker_lite_tp_theme_css .='color: '.esc_attr($film_maker_lite_tp_color_option_link).';';
		$film_maker_lite_tp_theme_css .='}';
	}
