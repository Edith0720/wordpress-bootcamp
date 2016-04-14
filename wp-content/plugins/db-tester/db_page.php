<?php
	if ( !function_exists('init_db_tester_page') ) {
		exit( 'No access...' );
	}
?>

<div>&nbsp;</div>

<?php

// Ha a Post-ban megtalálható a get_request elem.
if ( isset($_POST['get_request']) ) {
	global $wpdb;
	$table = $wpdb->prefix.'options';
	$site_url = $wpdb->get_results(
		"SELECT option_value FROM $table WHERE option_name LIKE '%site%'"
	);
	
	echo '<pre>';
	print_r($site_url);
	echo '</pre>';
}

// Wpdb insert.
if ( isset($_POST['insert_request']) ) {

	global $wpdb;

	// Tábla a beszúráshoz.
	$table = $wpdb->prefix.'products';

	// Adatok a beszúráshoz.
	$data = [
		'name' => 'borotva',
		'price' => 2999
	];

	// Formátumok meghatározása.
	$formats = [ '%s', '%d' ];

	// Adatok beszúrása.
	$wpdb->insert( $table, $data, $formats );

	// Nyugtázás.
	echo "A record $wpdb->insert_id id-vel beszúrásra került az adatbázisba.";
}

// Wpdb update.
if ( isset($_POST['update_request']) ) {

	global $wpdb;

	// Tábla a beszúráshoz.
	$table = $wpdb->prefix.'products';

	// Adatok a beszúráshoz.
	$data = [
		'name' => 'tükör',
		'price' => 9999
	];

	// Feltétel.
	$where = ['id' => 1];

	// Formátumok meghatározása.
	$formats = [ '%s', '%d' ];

	// Adatok beszúrása.
	$row_num = $wpdb->update( $table, $data, $where );

	// Nyugtázás.
	if ( $row_num === false ) {
		echo $wpdb->last_error;
		echo '<br>last query: '.$wpdb->last_query;
	} else {
		echo "$row_num sor frissült.";		
	}
}

?>
<div>
	<form method="post">
		<input type="submit" name="get_request" value="get kérés">
	</form>
</div>
<div>
	<form method="post">
		<input type="submit" name="insert_request" value="insert">
	</form>
</div>
<div>
	<form method="post">
		<input type="submit" name="update_request" value="update">
	</form>
</div>
