<?php

// JS fájlok beszúrása a frontend oldalra.
function add_my_scripts() {

	wp_enqueue_script (
		'b-handler',
		plugins_url( 'product-listing/js/bootstrap.min.js' ),
		array('jquery'),
		date('YmdHis'),
		true
	);

	// Az ajax handler script beszúrása az oldal láblécébe.
	wp_enqueue_script (
		'angular-handler',
		plugins_url( 'product-listing/js/angular.min.js' ),
		array('jquery'),
		date('YmdHis'),
		true
	);

	// PHP változók hozzáadása a script-hez.
	wp_localize_script(
		'angular-handler',
		'ajaxOptions',
		array(
			'ajaxurl' => admin_url('admin-ajax.php'),
			'actionName' => 'it_ajax'
		)
	);

	// Egyéni stíluslap.
	wp_enqueue_style (
		'page-style',
		plugins_url( 'product-listing/css/page-css.css' ),
		array(),
		date('YmdHis')
	);
	wp_enqueue_style (
		'b-style',
		plugins_url( 'product-listing/css/bootstrap.min.css' ),
		array(),
		date('YmdHis')
	);

}
add_action( 'wp_enqueue_scripts', 'add_my_scripts' );

?>