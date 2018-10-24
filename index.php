<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php if(have_posts()): ?>
			<?php while(have_posts()): the_post(); ?>
				<h1><?php the_title(); ?></h1>
				<div><?php the_content(); ?></div>
			<?php endwhile; ?>
		<?php endif; ?>

		<?php wp_footer(); ?>
	</body>
</html>
