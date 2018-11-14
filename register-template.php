<?php
	/* Template Name: Registration Form */
?>

<?php
	global $wpdb;


	if ( $_POST ) {
		$errors = array();

		$success = false;

		$email     = $wpdb->escape( $_POST['email'] );
		$username  = $wpdb->escape( $_POST['username'] );
		$password  = $wpdb->escape( $_POST['password'] );
		$password2 = $wpdb->escape( $_POST['password2'] );

		if ( !$email ) {
			array_push( $errors, "Please enter an email" );
		} else {
			if ( !is_email( $email ) ) {
				array_push( $errors, "Invalid email address" );
			}

			if ( email_exists( $email ) ) {
				array_push( $errors, "Email address already exists" );
			}
		}

		if ( !$username ) {
			array_push( $errors, "Please enter a username" );
		} else {
			if ( strpos( $username, ' ' ) ) {
				array_push( $errors, "Username must not contain spaces" );
			}

			if ( username_exists( $username ) ) {
				array_push( $errors, "Username already exists" );
			}
		}

		if ( !$password ) {
			array_push( $errors, "Please enter a password" );
		}

		if ( strcmp( $password, $password2 ) ) {
			array_push( $errors, "Passwords do not match" );
		}

		if ( empty( $errors ) ) {
			wp_create_user( $username, $password, $email );

			$success = true;
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

				<?php if ( !$success ): ?>
					<div class="row">
						<div class="col">
							<?php if($_POST && !empty($errors)): ?>
								<div class="row mb-2">
									<div class="col">
										<div class="alert alert-danger" role="alert">
											<ul class="mb-0">
												<?php foreach($errors as $error): ?>
													<li><?= $error; ?></li>
												<?php endforeach; ?>
											</ul>
										</div>
									</div>
								</div>
							<?php endif; ?>

							<form class="registration" method="post">
								<div class="form-group">
									<label for="email">Email</label>
									<input class="form-control" type="email" name="email" value="<?php if ( isset( $_POST['email'] ) ) { echo $_POST['email']; } ?>" required>
								</div>

								<div class="form-group">
									<label for="username">Username</label>
									<input class="form-control" type="text" name="username" value="<?php if ( isset( $_POST['username'] ) ) { echo $_POST['username']; } ?>" required>
								</div>

								<div class="form-group">
									<label for="password">Password</label>
									<input class="form-control" type="password" name="password" value="" required>
								</div>

								<div class="form-group">
									<label for="password2">Re-enter Password</label>
									<input class="form-control" type="password" name="password2" value="" required>
								</div>

								<button class="btn btn-primary" type="submit">Submit</button>
							</form>
						</div>
					</div>
				<?php else: ?>
					<div class="row mb-2">
						<div class="col">
							<div class="alert alert-success" role="alert">
								<h3>Successfully created user</h3>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>
