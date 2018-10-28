<?php
	// Stylesheets and scripts
	function add_custom_files() {
		$css_directory = get_template_directory_uri().'/assets/css/';
		$js_directory = get_template_directory_uri().'/assets/js/';

		// Styles
		wp_enqueue_style( 'bootstrap', $css_directory.'bootstrap.min.css', array(), '4.1.3', 'all' );
		wp_enqueue_style( 'master', $css_directory.'master.css', array(), '0.0.1', 'all' );

		// Scripts
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'bootstrapjs', $js_directory.'bootstrap.min.js', array(), '4.1.3', true );
		wp_enqueue_script( 'master', $js_directory.'script.js', array('jquery'), '0.0.1', true );
	}

	// Theme menus
	function add_custom_menus() {
		// Default navigation menu
		register_nav_menu( 'defaultnav', __('Default Navigation') );
	}

	// Actions for above functions in same order
	add_action( 'wp_enqueue_scripts', 'add_custom_files' );
	add_action( 'init', 'add_custom_menus' );

	// Theme settings
	add_theme_support( 'post-thumbnails' );

	// Image sizes
	add_image_size( 'icon', 50, 50, true );
