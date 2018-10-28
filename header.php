<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">

		<title></title>

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php
			if(has_nav_menu('defaultnav')){
				wp_nav_menu(array(
					'theme_location'=>'defaultnav',
					'menu_class'=>'nav nav-pills justify-content-center',
					'menu_id'=>'defaultnav'
				));
			}
		?>
