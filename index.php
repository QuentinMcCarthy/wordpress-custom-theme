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
						<?php if(has_post_thumbnail()): ?>
							<?php $colClass = 'col-md-8' ?>
							
							<div class="col-md-4">
								<?php the_post_thumbnail('medium', ['class'=>'img-fluid']); ?>
							</div>
						<?php else: ?>
							<?php $colClass = 'col' ?>
						<?php endif; ?>

						<div class="<?= $colClass ?>">
							<h3><?php the_title(); ?></h3>
							<div><?php the_content(); ?></div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>

		<?php wp_footer(); ?>
	</body>
</html>
