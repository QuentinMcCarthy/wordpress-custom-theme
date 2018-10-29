<?php
	/* Template Name: Full Page Width */
?>

<?php get_header(); ?>
	<?php if( have_posts() ): ?>
		<?php while( have_posts() ): the_post(); ?>
			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<h1><?php echo the_title(); ?></h1>
						<hr />
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div>
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>
