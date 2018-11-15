<?php
	/* Template Name: Enquiries */
?>

<?php
	if ( $_POST ) {
		var_dump( $_POST );

		$errors = array();

		if ( !wp_verify_nonce( $_POST['_wpnonce'], 'wp_enquiry_form' ) ) {
			array_push( $errors, "Something's gone wrong" );
		}

		if ( empty( $errors ) ) {
			$meta_input = array(
				'email'           => $_POST['enquiries-email'],
				'course-interest' => $_POST['enquiries-interest'],
			);

			$args = array(
				'post_title'   => $_POST['enquiries-name'],
				'post_content' => $_POST['enquiries-message'],
				'post_type'    => 'enquiries',
				'meta_input'   => $meta_input,
			);

			wp_insert_post( $args );
			echo "Your enquiry has been sent";
		}
	}
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
					<div class="col">
						<p><?php the_content(); ?></p>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<form action="<?php get_permalink(); ?>" method="post">
							<?php wp_nonce_field( 'wp_enquiry_form' ); ?>

							<div class="form-group">
								<label for="enquiries-name">Name</label>
								<input class="form-control" type="text" name="enquiries-name" value="">
							</div>

							<div class="form-group">
								<label for="enquiries-message">Message</label>
								<?php wp_editor( $content, array( 'textarea_rows' => '10' ) ); ?>
							</div>

							<div class="form-group">
								<label for="enquiries-email">Email</label>
								<input class="form-control" type="email" name="enquiries-email" value="">
							</div>

							<div class="form-group">
								<label for="enquiries-interest">What Course are you Interested In?</label>
								<select class="form-control" name="enquiries-interest">
									<option>Choose a Course</option>
									<option value="Course1">Course1</option>
									<option value="Course2">Course2</option>
									<option value="Course3">Course3</option>
								</select>
							</div>

							<div class="form-group">
								<input type="submit" value="Send Enquiry" class="btn btn-primary btn-block">
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>
