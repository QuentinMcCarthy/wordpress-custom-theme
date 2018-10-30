<?php get_header( 'front' ); ?>
	<div class="container mt-2">
		<div class="row">
			<div class="col">
				<h1>Home Page</h1>
			</div>
		</div>

		<?php if ( have_posts() ): ?>
			<?php while ( have_posts() ): the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
<?php get_footer(); ?>
