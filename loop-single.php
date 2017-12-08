<!-- Section -->
	<section class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
		<div class="content">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>


		</div>
		<div class="image">
			<?php the_post_thumbnail('spotlight'); ?>
		</div>
	</section>