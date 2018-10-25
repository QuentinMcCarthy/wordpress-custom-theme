<?php
	// Stylesheets and scripts
	function addCustomFiles(){
		$cssdir = get_template_directory_uri().'/assets/css/';
		$jsdir = get_template_directory_uri().'/assets/js/';

		// Styles
		wp_enqueue_style('bootstrap', $cssdir.'bootstrap.min.css', array(), '4.1.3', 'all');
		wp_enqueue_style('master', $cssdir.'master.css', array(), '0.0.1', 'all');

		// Scripts
		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrapjs', $jsdir.'bootstrap.min.js', array(), '4.1.3', true);
		wp_enqueue_script('master', $jsdir.'script.js', array('jquery'), '0.0.1', true);
	}

	add_action('wp_enqueue_scripts', 'addCustomFiles');

	// Theme settings
	add_theme_support('post-thumbnails');

	// Image sizes
	add_image_size('icon', 50, 50, true);
