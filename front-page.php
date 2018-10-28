<?php get_header( 'front' ); ?>
		<div class="container mt-2">
			<div class="row">
				<div class="col">
					<h1>Home Page</h1>
				</div>
			</div>

			<?php if ( have_posts() ): ?>
				<?php while ( have_posts() ): the_post(); ?>
					<div class="card text-light bg-secondary mt-2">
						<div class="card-header"><?php the_title(); ?></div>
						<div class="card-body row">
							<?php if ( has_post_thumbnail() ): ?>
								<?php $colClass = 'col-md-8' ?>

								<div class="col-md-4">
									<?php the_post_thumbnail( 'medium', ['class' => 'img-fluid'] ); ?>
								</div>
							<?php else: ?>
								<?php $colClass = 'col' ?>
							<?php endif; ?>

							<div class="<?php echo $colClass ?>">
								<div class="card-text"><?php the_excerpt(); ?></div>
								<a class="btn btn-primary" href="<?php echo esc_url(get_permalink()); ?>">Read more...</a>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>

		<?php get_footer(); ?>
