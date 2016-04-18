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

// Javascript fájlok beszúrása.
include 'class/insertjs.php';

// CRUD kérések kezelése.
function crud_action_callback() {
	include 'class/ProductModel.php';
	include 'class/ProductController.php';
	$controller = new ProductController();
	wp_die();
}
add_action( 'wp_ajax_nopriv_crud_action', 'crud_action_callback' );

function add_product_list() {
	ob_start();
	
	include 'view/index.php';

	$content = ob_get_contents();
	ob_clean();
	return $content;
}
add_shortcode( 'product_list', 'add_product_list' );
