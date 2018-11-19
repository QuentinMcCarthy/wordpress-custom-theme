<?php get_header(); ?>
	<div class="container mt-2">
		<?php if ( have_posts() ): ?>
			<?php while ( have_posts() ): the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>

				<div class="card text-light bg-secondary">
					<div class="card-header">Comments</div>
					<div class="card-body row">
						<div class="col">
							<div class="row">
								<div class="col">
									<?php
										$comment_fields_author =   '<div class="form-group">
																		<label for="author">Author (Required)</label>
																		<input class="form-control" name="author" type="text" value="'.esc_attr( $commenter['comment_author'] ).'" '.$aria_req.' />
																	</div>';

										$comment_fields_email =    '<div class="form-group">
																		<label for="email">Email (Required)</label>
																		<input class="form-control" name="email" type="email" value="'.esc_attr( $commenter['comment_author_email'] ).'" '.$aria_req.' />
																	</div>';

										$comment_fields_url =  '<div class="form-group">
																	<label for="url">Website</label>
																	<input class="form-control" name="url" type="text" value="'.esc_attr( $commenter['comment_author_url'] ).'" />
																</div>';

										$comment_fields =  array(
											'author' => $comment_fields_author,
											'email'  => $comment_fields_email,
											'url'    => $comment_fields_url,
										);

										$comment_field_html =  '<div class="form-group">
																	<label for="comment">Enter Your Comment</label>
																	<textarea name="comment" class="form-control" rows="10" aria-required="true"></textarea>
																</div>';

										$comment_must_log_in = '<div class="alert alert-warning">
																	'.sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ).'
																</div>';

										$comment_logged_in_as =    '<div class="alert alert-info">
																		'.sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ).'
																	</div>';

										$comment_notes_before =    '<div class="alert alert-info">
																		'. __( 'Your email address will not be published.' ).( $req ? $required_text: '' ).'
																	</div>';

										$comment_notes_after =     '<div class="alert alert-info">
																		'.sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ), ' <code>'.allowed_tags().'</code>' ).'
																	</div>';

										$comment_args = array(
											'fields'               => $comment_fields,
											'comment_field'        => $comment_field_html,
											'must_log_in'          => $comment_must_log_in,
											'logged_in_as'         => $comment_logged_in_as,
											'comment_notes_before' => $comment_notes_before,
											'comment_notes_after'  => $comment_notes_after,
											'class_submit'         => 'btn btn-success',
										);

										comment_form( $comment_args, get_the_ID() );
									?>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<?php
										$comments_args = array(
											'post_id' => get_the_ID(),
											'status'  => 'approve',
										);

										$comments = get_comments( $comments_args );

										wp_list_comments( '', $comments );
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
<?php get_footer(); ?>
