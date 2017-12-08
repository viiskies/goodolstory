<?php

add_theme_support('post-thumbnails');
add_theme_support('title-tag');

// style.css - theme headeryje
add_action( 'wp_enqueue_scripts', 'arunas_scripts' );

function arunas_scripts() {
	wp_register_style( 'theme-style', get_template_directory_uri(). '/assets/css/main.css' );
	wp_enqueue_style( 'theme-style' );

	wp_register_script( 'jq-scrx', get_template_directory_uri(). '/assets/js/jquery.scrollex.min.js', array( 'jquery' ), null, true );
	wp_register_script( 'jq-scry', get_template_directory_uri(). '/assets/js/jquery.scrolly.min.js', array( 'jquery' ), null, true );
	wp_register_script( 'skel', get_template_directory_uri(). '/assets/js/skel.min.js', array( 'jquery' ), null, true );
	wp_register_script( 'util', get_template_directory_uri(). '/assets/js/util.js', array( 'jquery' ), null, true );
	
	wp_register_script( 'main', get_template_directory_uri(). '/assets/js/main.js', 
		array( 'jquery', 'jq-scrx', 'jq-scry', 'skel', 'util'), null, true );

	wp_enqueue_script('main');
}

add_image_size( 'pic', 434, 434, true );
add_image_size( 'spotlight', 1440, 900, true );
