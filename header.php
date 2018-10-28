<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">

		<title></title>

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php // if(has_nav_menu('defaultnav')): ?>
			<!-- <nav class="navbar navbar-dark bg-dark"> -->
				<?php
					// wp_nav_menu(array(
					// 	'theme_location'=>'defaultnav',
					// 	'container_class'=>'navbar-collapse',
					// 	'menu_class'=>'navbar-nav mr-auto',
					// 	'menu_id'=>'default-nav-menu'
					// ));
				?>

				<!-- <form class="form-inline">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
				</form>
			</nav> -->
		<?php // endif; ?>

		<?php
			if(has_nav_menu('defaultnav')){
				wp_nav_menu(array(
					'theme_location'=>'defaultnav',
					'menu_class'=>'nav nav-pills justify-content-center',
					'menu_id'=>'default-nav-menu'
				));
			}
		?>
