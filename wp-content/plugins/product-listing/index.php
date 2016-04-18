<?php

/*
Plugin Name: Product Lister
Plugin URI: http://itfactory.hu
Description: Listing and editing products.
Version: 0.0.1
Author: Cserkó József
Author URI: http://itfactory.hu
License: MIT
Text Domain: productlister
*/

// CRUD kérések kezelése.
function crud_action_callback() {
	include 'class/ProductModel.php';
	include 'class/ProductController.php';
	$controller = new ProductController();
	wp_die();
}
add_action( 'wp_ajax_nopriv_crud_action', 'crud_action_callback' );

include 'class/insertjs.php';