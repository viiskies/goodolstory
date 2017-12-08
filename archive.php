<?php get_header(); 

$count = 1;

if ( have_posts() ) : while ( have_posts() ) : the_post();
	if ( 0 === $count ) {
		get_template_part( 'loop', 'main' );
	} elseif ( 0 === $count % 2 ) {
		get_template_part( 'loop', 'third' );
	} else {
		get_template_part( 'loop', 'second' );
	}
	++$count;

endwhile; endif; 

get_sidebar();

get_footer();