<?php

if ( !is_user_logged_in() ) {
	$errorArray = array( 'error' => 'user is not logged in' );
	echo json_encode( $errorArray );
	wp_die();
}

