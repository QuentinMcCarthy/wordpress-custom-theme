<?php get_header( 'front' ); ?>
	<div class="container mt-2">
		<div class="row">
			<div class="card-deck">
				<div class="card col-6 text-dark">
					<h3>Post Title</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<button type="button" name="button">Go To Post</button>
				</div>
				<div class="card col-6 text-dark">
					<h3>Post Title</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<button type="button" name="button">Go To Post</button>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<h1>Home Page</h1>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<?php if ( have_posts() ): ?>
					<?php get_template_part( 'carousel', 'Carousel' ); ?>

					<?php while ( have_posts() ): the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>

			<?php if ( is_active_sidebar('sidebar-main') ): ?>
				<div class="col-4">
					<div id="sidebar-main" class="card text-light bg-secondary p-2">
						<?php dynamic_sidebar( 'sidebar-main' ); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php get_footer(); ?>
