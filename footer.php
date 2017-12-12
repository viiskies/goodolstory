				<!-- Footer -->
				<footer class="wrapper style1 align-center">
					<div class="inner">
						<?php 
						$args = array(
							'theme_location' 	=> 'social-menu',
							'container'			=> null,
							'menu_class'		=> 'icons',
							);
						wp_nav_menu( $args ); 
						?>

						<p>&copy; <?php echo get_theme_mod( 'story_copyright' ); ?> <?php _e('Untilted', 'goodolstory'); ?>. <?php _e('Design', 'goodolstory'); ?>: <a href="https://html5up.net">HTML5 UP</a>.</p> 
					</div>

				</footer>

			</div>

			<!-- Scripts -->

			<?php wp_footer(); ?>

		</body>
		</html>