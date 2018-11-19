<?php
	/* Template Name: Staff Page Template */
?>

<?php get_header(); ?>
	<?php if ( have_posts() ): ?>
		<?php while ( have_posts() ): the_post(); ?>
			<div class="container">
				<div class="row">
					<div class="col">
						<h1><?php the_title(); ?></h1>
					</div>
				</div>

				<div class="row">
					<?php
						$args = array(
							'post_type'      => 'staff',
							'order'          => 'ASC',
							'orderby'        => 'title',
							'posts_per_page' => -1,
						);

						$all_staff_members = new WP_Query($args);
					?>

					<?php if ( $all_staff_members->have_posts() ):  ?>
						<?php while ( $all_staff_members->have_posts() ): $all_staff_members->the_post(); ?>
							<div class="card text-light bg-secondary">
								<div class="card-body">
									<?php if ( has_post_thumbnail() ): ?>
										<?php the_post_thumbnail( 'medium', ['class' => 'card-img-top'] ); ?>
									<?php endif; ?>
									<h5 class="card-title"><?php the_title(); ?></h5>

									<?php
										$id = get_the_id();
										$staff_role = get_post_meta( $id, 'staff_role', true );
									?>

									<?php if ( $staff_role ): ?>
										<p><?php echo $staff_role; ?></p>
									<?php endif; ?>
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>
