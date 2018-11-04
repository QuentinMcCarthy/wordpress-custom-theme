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
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img class="d-block w-100" src="http://placehold.it/800x400" alt="First slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="http://placehold.it/800x400" alt="Second slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="http://placehold.it/800x400" alt="Third slide">
							</div>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
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
