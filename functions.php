<?php
function beekeeperstudio_resources() {
	// jquery is not required, it is Built in with WordPress
	// bootstrap.js
	wp_enqueue_script(
		'bootstrap',
		'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
		array('jquery'),
		'3.3.7',
		true  // show in footer
		);
	// bootstrap.css
	wp_enqueue_style (
		'bootstrap',
		'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
		array(),
		'3.3.7',
		'all'
		);
	// Custom.css
	wp_enqueue_style (
		'temple-custom',
		get_stylesheet_directory_uri() . '/lib/styles/main.min.css',
		array(),
		'1.0.0',
		'all'
		);
	// fontawesome
	wp_enqueue_style (
		'fontawesome',
		'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
		array(),
		'4.7.0',
		'all'
		);
	}
add_action( 'wp_enqueue_scripts', 'beekeeperstudio_resources' );

/* =================================================
    ACTIVATE: Sidebar
==================================================== */
function beekeeperstudio_sidebar() {
    // first sidebar
    register_sidebar( array(
        'name'            => __( 'Category', 'Templesite Sandbox' ),
        'id'		  => 'sidebar-top',
        'description'	  => 'Enter some description here.',
        ));
    }
add_action( 'widgets_init', 'beekeeperstudio_sidebar' );

// Custom Metabox
require get_template_directory() . '/metabox/address_metabox.php';
require get_template_directory() . '/metabox/contact_metabox.php';
require get_template_directory() . '/metabox/map.php';
require get_template_directory() . '/metabox/content_url.php';
require get_template_directory() . '/metabox/summary.php';
