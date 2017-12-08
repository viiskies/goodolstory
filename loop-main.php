<!-- Section -->
	<section class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
		<div class="content">
			<h1><?php the_title(); ?></h1>
			<p><?php the_excerpt(); ?></p>
<!-- 							<p class="major">A (modular, highly tweakable) responsive one-page template designed by <a href="https://html5up.net">HTML5 UP</a> and released for free under the <a href="https://html5up.net/license">Creative Commons</a>.</p> -->

			<ul class="actions vertical">
				<li><a href="<?php the_permalink(); ?>" class="button big wide smooth-scroll-middle"><?php _e('Learn More', 'goodolstory'); ?></a></li>
			</ul>
		</div>
		<div class="image">
			<?php the_post_thumbnail('spotlight'); ?>
		</div>
	</section>