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



// customizing the customizer
add_action( 'customize_register', 'arunas_customize_register' );

function arunas_customize_register( $wp_customize ) {
  // registruoti customizer objektus
	$wp_customize->add_section( 
		'custom_story_css', 
		array(
			'title' => __( 'Custom Story Theme CSS' ),
			'description' => __( 'Add custom CSS here' ),
			'panel' => '', // Not typically needed.
			'priority' => 160,
			'capability' => 'edit_theme_options',
			'theme_supports' => '', // Rarely needed.
			) 
		);

	$wp_customize->add_setting( 
		'story_copyright', 
		array(
			'type' => 'theme_mod', // or 'option'
			'capability' => 'edit_theme_options',
			'theme_supports' => '', // Rarely needed.
			'default' => 'All rights reserved.',
			'transport' => 'refresh', // or postMessage
			'sanitize_callback' => '',
			'sanitize_js_callback' => '', // Basically to_json.
			)
		);

	$wp_customize->add_control(
		'story_copyright', 
		array(
			'type' => 'text',
		    'priority' => 10, // Within the section.
		    'section' => 'custom_story_css', // Required, core or custom.
		    'label' => __( 'Date' ),
		    'description' => __( 'This is a date control with a red border.' ),
		    'input_attrs' => array(
		    	'class' => 'my-custom-class-for-js',
		    	'style' => 'border: 1px solid #900',
		    	'placeholder' => __( 'mm/dd/yyyy' ),
		    	),
		    'active_callback' => 'is_front_page',
		    )
		);

	$wp_customize->selective_refresh->add_partial( 
		'setting_id', 
		array(
			'selector' => 'footer p',
			'container_inclusive' => false,
			'render_callback' => 'render_copyright',
			)
		);

	function render_copyright() {
		return get_theme_mod( 'story_copyright' );
	}
}

