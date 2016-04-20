<?php

/**
 * Compile .less files.
 */
require_once "inc/lessc.inc.php";
$less = new lessc;

$current_dir = dirname( __FILE__ );
// exit( $current_dir );

$less->checkedCompile(
	$current_dir."/less/source.less",
	$current_dir."/css/output.css"
);

require_once 'inc/minify.php';
$CSSFiles = array(
    $current_dir."/css/output.css"
);
$min = new minify;
$CSSFile = $min->compress('css', $CSSFiles, $current_dir."/css/output.css");

?>