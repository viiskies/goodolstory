<?php

add_theme_support('post-thumbnails');
add_theme_support('title-tag');

add_action( 'wp_enqueue_scripts', 'arunas_scripts' );

function arunas_scripts() {
	wp_register_style( 'theme-style', get_template_directory_uri(). '/assets/css/main.css' );
	wp_enqueue_style( 'theme-style' );

	wp_register_script( 'jq-scrx', get_template_directory_uri(). '/assets/js/jquery.scrollex.min.js', array( 'jquery' ), null, true );
	wp_register_script( 'jq-scry', get_template_directory_uri(). '/assets/js/jquery.scrolly.min.js', array( 'jquery' ), null, true );
	wp_register_script( 'skel', get_template_directory_uri(). '/assets/js/skel.min.js', array( 'jquery' ), null, true );
	wp_register_script( 'util', get_template_directory_uri(). '/assets/js/util.js', array( 'jquery' ), null, true );
	
	wp_register_script( 'main', get_template_directory_uri(). '/assets/js/main.js', 
		array( 'jquery', 'jq-scrx', 'jq-scry', 'skel', 'util' ), null, true );

	wp_enqueue_script('main');
}

add_image_size( 'pic', 434, 434, true );
add_image_size( 'spotlight', 1440, 900, true );


// shortcode
add_shortcode( 'vardas', 'vardas_shortcode' );

function vardas_shortcode( $args, $content ) {
	return 'Petras';
}

add_shortcode( 'kitas', 'kitas_shortcode' );

function kitas_shortcode( $args, $content ) {
	$defaults = array(
		'title'       => __( 'Some Title', 'goodolstory' ),
		'description' => '',
		);
	$args = wp_parse_args( $args, $defaults );
	$result = "<strong>{$args['title']}</strong>";
	if ( $args['description'] ) {
		$result .= "- <em>{$args['description']}</em>";
	}
	if ( $content ) {
		$result .= '<br />' . do_shortcode( $content );
	}
	return $result;
}


// menu 
register_nav_menu( 'social-menu', __('Social Menu', 'goodolstory') );

add_filter('nav_menu_link_attributes', 'mano_menu', 10, 2); 
function mano_menu( $attributes, $item ) {
	$attributes['class'] = 'icon style2 ' . $item->attr_title;
	return $attributes;
};

add_filter('nav_menu_item_title', 'mano_title');
function mano_title( $title ) {
	$title = '<span class="label">' . $title . '</span>';
	return $title;
}


// widgets
$args = array(
  'name' => __( 'Main Sidebar', 'goodolstory' ),
  'id' => 'sidebar-1',
  'description' => 'Main widget area',
  'before_widget' => '<article id="%1$s" class="widget %2$s">',
  'after_widget'  => '</article>',
  'before_title'  => '<h3 class="widgettitle">',
  'after_title'   => '</h3>',
);
register_sidebar( $args );


function arunas_load_widget() {
    register_widget( 'Arunas_Widget' );
}
add_action( 'widgets_init', 'arunas_load_widget' );

include_once( 'includes/arunas-widget.php' );