<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">

		<title><?php wp_title(); ?></title>

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div class="container mt-2">
			<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post(); ?>
					<div class="row">
						<div class="col">
							<h3><?php the_title(); ?></h3>
							<div><?php the_content(); ?></div>
							<?php the_post_thumbnail('thumbnail', ['class'=>'img-fluid']); ?>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>

		<?php wp_footer(); ?>
	</body>
</html>
