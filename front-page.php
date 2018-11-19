<?php get_header( 'front' ); ?>
	<div class="container mt-2">
		<div class="row">
			<div class="card-deck">
				<?php for ($i=1; $i <= 2 ; $i++): ?>
					<?php $featured_post_id = get_theme_mod( 'custom_theme_featured_post_'.$i.'_setting' ); ?>

					<?php if ( $featured_post_id ): ?>
						<?php
							$args = array(
								'p' => $featured_post_id,
							);

							$featured_post = new WP_Query( $args );
						?>

						<?php if ( $featured_post->have_posts() ): ?>
							<?php while ( $featured_post->have_posts() ): $featured_post->the_post(); ?>
								<div class="card text-light bg-secondary col-6">
									<div class="card-header"><?php the_title(); ?></div>
									<div class="card-body row">
										<p><?php the_content(); ?></p>
										<a class="btn btn-primary btn-block" href="<?php echo esc_url(get_permalink()); ?>">Go To Post</a>
									</div>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					<?php endif; ?>
				<?php endfor; ?>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<h1>Home Page</h1>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<div class="row">
					<div class="col front-page-posts">
						<?php if ( have_posts() ): ?>
							<?php get_template_part( 'carousel', 'Carousel' ); ?>

							<?php while ( have_posts() ): the_post(); ?>
								<?php get_template_part( 'content', get_post_format() ); ?>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<?php
							$total = wp_count_posts()->publish;
							$can_show = get_option('posts_per_page');
						?>

						<?php if ( $total > $can_show): ?>
							<div class="col-12 mb-4">
								<hr>
								<?php
									$paginate_args = array(
										'prev_text' => __( 'Previous' ),
										'next_text' => __( 'Next' ),
										'type'      => 'array',
									);

									$all_pages = paginate_links( $paginate_args );
								?>
								<nav>
									<ul class="pagination">
										<?php foreach ( $all_pages as $page ): ?>
											<li class="page-item">
												<?php echo str_replace( 'page-numbers', 'page-link', $page ); ?>
											</li>
										<?php endforeach; ?>
									</ul>
								</nav>
								<button type="button" name="button" class="btn btn-primary btn-block show-more">Show More</button>
							</div>
						<?php endif; ?>
					</div>
				</div>
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
