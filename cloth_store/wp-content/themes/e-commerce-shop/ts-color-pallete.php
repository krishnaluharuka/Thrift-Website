<?php
/*-------------------------- Button Settings option------------------*/
	$bb_ecommerce_store_button_padding_top_bottom = get_theme_mod('bb_ecommerce_store_button_padding_top_bottom');
	$bb_ecommerce_store_button_padding_left_right = get_theme_mod('bb_ecommerce_store_button_padding_left_right');
	$bb_ecommerce_store_custom_css .='.shomain a p{';
		$bb_ecommerce_store_custom_css .='padding-top: '.esc_attr($bb_ecommerce_store_button_padding_top_bottom).'px !important; padding-bottom: '.esc_attr($bb_ecommerce_store_button_padding_top_bottom).'px !important; padding-left: '.esc_attr($bb_ecommerce_store_button_padding_left_right).'px !important; padding-right: '.esc_attr($bb_ecommerce_store_button_padding_left_right).'px !important; display:inline-block;';
	$bb_ecommerce_store_custom_css .='}';

	$bb_ecommerce_store_button_border_radius = get_theme_mod('bb_ecommerce_store_button_border_radius');
	$bb_ecommerce_store_custom_css .='.shomain a p{';
		$bb_ecommerce_store_custom_css .='border-radius: '.esc_attr($bb_ecommerce_store_button_border_radius).'px !important;';
	$bb_ecommerce_store_custom_css .='}';

	// Menu Hover Color Option
	$bb_ecommerce_store_menu_hover_color_settings = get_theme_mod('bb_ecommerce_store_menu_hover_color_settings');
	$bb_ecommerce_store_custom_css .='.primary-navigation ul li a:hover {';
		$bb_ecommerce_store_custom_css .='color: '.esc_attr($bb_ecommerce_store_menu_hover_color_settings).'!important;';
	$bb_ecommerce_store_custom_css .='} ';

	// Submenu Hover Color Option
	$bb_ecommerce_store_submenu_hover_color_settings = get_theme_mod('bb_ecommerce_store_submenu_hover_color_settings');
	$bb_ecommerce_store_custom_css .='.primary-navigation ul.sub-menu li a:hover {';
	$bb_ecommerce_store_custom_css .='color: '.esc_attr($bb_ecommerce_store_submenu_hover_color_settings).'!important;';
	$bb_ecommerce_store_custom_css .='} ';

	/*---------------------------Slider Content Layout -------------------*/
	$bb_ecommerce_store_theme_lay = get_theme_mod( 'bb_ecommerce_store_slider_content_alignment','Right');
    if($bb_ecommerce_store_theme_lay == 'Left'){
		$bb_ecommerce_store_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$bb_ecommerce_store_custom_css .='text-align:left; left:10%; right:50%;';
		$bb_ecommerce_store_custom_css .='}';
	}else if($bb_ecommerce_store_theme_lay == 'Center'){
		$bb_ecommerce_store_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$bb_ecommerce_store_custom_css .='text-align:center; left:20%; right:20%;';
		$bb_ecommerce_store_custom_css .='}';
	}else if($bb_ecommerce_store_theme_lay == 'Right'){
		$bb_ecommerce_store_custom_css .='#slider .carousel-caption, #slider .inner_carousel{';
			$bb_ecommerce_store_custom_css .='left:50% !important; right:10% !important;';
		$bb_ecommerce_store_custom_css .='}';
	}