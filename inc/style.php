<?php 
	function ion_style_enqueue_Style(){

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_style( 'lightbox', get_template_directory_uri() . '/assets/css/nivo-lightbox.css' );
	wp_enqueue_style( 'default', get_template_directory_uri() . '/assets/css/default/default.css' );
	

	wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/assets/js/jquery.js', array('jquery'), '', true );
	wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/assets/js/smoothscroll.js', array('jquery'), '', true );
	wp_enqueue_script( 'sticky', get_template_directory_uri() . '/assets/js/sticky.js', array('jquery'), '', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'bootstrap-carousel', get_template_directory_uri() . '/assets/js/bootstrap-carousel.js', array('jquery'), '', true );
	wp_enqueue_script( 'jquery.easing', get_template_directory_uri() . '/assets/js/jquery.easing.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.js', array('jquery'), '', true );
	wp_enqueue_script( 'nivo-lightbox', get_template_directory_uri() . '/assets/js/nivo-lightbox.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'model', get_template_directory_uri() . '/assets/js/model.js', array('jquery'), '', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '', true );
	}
	add_action('wp_enqueue_scripts','ion_style_enqueue_Style');
