<?php get_header( 'front' ); ?>
	<div class="container mt-2">
		<div class="row">
			<div class="col">
				<h1>Home Page</h1>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<?php if ( have_posts() ): ?>
					<div id="front-page-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<?php
								// The iterator has to be initialised outside of the while loop
								$iterator = 0;
							?>
							<?php while ( have_posts() ): the_post(); ?>
								<?php
									$args = array(
										'post_type'      => 'attachment',
										'numberposts'    => -1,
										'orderby'        => 'menu_order',
										'order'          => 'ASC',
										'post_mime_type' => 'image',
										'post_status'    => null,
										'post_parent'    => $post->ID,
									);

									$attachments = get_posts( $args );

									if ( $attachments ):
										foreach ( $attachments as $attachment ):
											if ( $iterator == 0 ) {
												$class = 'active';
											} else {
												$class = '';
											}
								?>
										<li data-target="#front-page-carousel" data-slide-to="<?php echo $iterator; ?>" class="<?php echo $class; ?>"></li>
										<?php $iterator++; ?>
									<?php endforeach; ?>
								<?php endif; ?>
							<?php endwhile; ?>
						</ol>
						<div class="carousel-inner">
							<?php
								// The iterator has to be initialised outside of the while loop
								$iterator = 0;
							?>
							<?php while ( have_posts() ): the_post(); ?>
								<?php
									$args = array(
										'post_type'      => 'attachment',
										'numberposts'    => -1,
										'orderby'        => 'menu_order',
										'order'          => 'ASC',
										'post_mime_type' => 'image',
										'post_status'    => null,
										'post_parent'    => $post->ID,
									);

									$attachments = get_posts( $args );

									if ( $attachments ):
										foreach ( $attachments as $attachment ):
											if ( $iterator == 0 ) {
												$class = 'carousel-item active';
											} else {
												$class = 'carousel-item';
											}
								?>
										<div class="<?php echo $class ?>">
											<?php echo wp_get_attachment_image( $attachment->ID, 'full', "", array( 'class' => 'd-block w-100') ); ?>
										</div>
										<?php $iterator++; ?>
									<?php endforeach; ?>
								<?php endif; ?>
							<?php endwhile; ?>
						</div>
						<a class="carousel-control-prev" href="#front-page-carousel" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#front-page-carousel" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>

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
