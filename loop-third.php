				<!-- Three -->
				<section class="spotlight style1 orient-left content-align-left image-position-center onscroll-image-fade-in">
					<div class="content">
						<h2><?php the_title(); ?></h2>
						<p><?php the_excerpt(); ?></p>
						<ul class="actions vertical">
							<li><a href="<?php the_permalink(); ?>" class="button"><?php _e('Learn More', 'goodolstory'); ?></a></li>
						</ul>
					</div>
					<div class="image">
						<?php the_post_thumbnail('spotlight'); ?>
					</div>
				</section>