<?php

/*
Plugin Name: JS inserter
Plugin URI: http://itfactory.hu
Description: Plugin help you for insert js files.
Version: 0.0.1
Author: Cserkó József
Author URI: http://itfactory.hu
License: MIT
Text Domain: jsinsert
*/

// JS fájlok beszúrása a frontend oldalra.
function add_my_scripts() {

	// Az ajax handler script beszúrása az oldal láblécébe.
	wp_enqueue_script (
		'ajax-handler',
		plugins_url( 'js-insert/js/ajax-handler.js' ),
		array('jquery'),
		date('YmdHis'),
		true
	);

	wp_enqueue_script (
		'b-handler',
		plugins_url( 'js-insert/js/bootstrap.min.js' ),
		array('jquery'),
		date('YmdHis'),
		true
	);

	// PHP változók hozzáadása a script-hez.
	wp_localize_script(
		'ajax-handler',
		'ajaxOptions',
		array(
			'ajaxurl' => admin_url('admin-ajax.php'),
			'actionName' => 'it_ajax'
		)
	);

	// Egyéni stíluslap.
	wp_enqueue_style (
		'page-style',
		plugins_url( 'js-insert/css/page-css.css' ),
		array(),
		date('YmdHis')
	);
	wp_enqueue_style (
		'b-style',
		plugins_url( 'js-insert/css/bootstrap.min.css' ),
		array(),
		date('YmdHis')
	);

}
add_action( 'wp_enqueue_scripts', 'add_my_scripts' );


function add_subscribe( $atts, $content, $name ) {
	ob_start();
	?>
		<div class="urgent <?php echo $atts['cssclass']; ?>">
			<div class="row">
				<div class="col-xs-6 col-xs-offset-3">
					<h3><?php echo $content; ?></h3>
				</div>
			</div>
			<div class="row">
				<form class="col-xs-6 col-xs-offset-3">
					<div class="form-group">
						<label for="exampleInputName2">Name</label>
						<input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail2">Email</label>
						<input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
					</div>
					<button type="submit" class="btn btn-default">Send invitation</button>
				</form>				
			</div>
			<div class="clearfix"></div>
		</div>
	<?php
	$content = ob_get_contents();
	ob_clean();
	return $content;
}
add_shortcode( 'subscribe', 'add_subscribe' );

function title_filter( $title ) {
	return 'Ez a cím';
}
add_filter( 'the_title', 'title_filter' );
