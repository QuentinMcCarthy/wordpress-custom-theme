<?php if ( is_singular() ): ?>
	<div class="card text-light bg-secondary single-post-type-video">
		<?php if ( has_post_thumbnail() ): ?>
			<?php the_post_thumbnail( 'large', ['class' => 'card-img-top'] ); ?>

			<div class="card-body">
				<h5 class="card-title"><?php the_title(); ?></h5>
				<p class="card-text"><?php the_content(); ?></p>
			</div>
		<?php else: ?>
			<div class="card-header"><?php the_title(); ?></div>

			<div class="card-body">
				<p><?php the_content(); ?></p>
			</div>
		<?php endif; ?>
	</div>
<?php else: ?>
	<div class="card text-light bg-secondary mt-2 post-type-video">
		<?php if ( has_post_thumbnail() ): ?>
			<?php the_post_thumbnail( 'large', ['class' => 'card-img-top'] ); ?>

			<div class="card-body">
				<p class="card-text"><?php the_content(); ?></p>
			</div>
		<?php else: ?>
			<div class="card-body">
				<p class="card-text"><?php the_content(); ?></p>
				<a class="btn btn-info" href="<?php echo esc_url(get_permalink()); ?>">Go to post</a>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>
