<?php
global $gBitSystem;

$registerHash = array(
	'package_name' => 'upstall',
	'package_path' => dirname( __FILE__ ).'/',
	'homeable' => TRUE, // This is not supposed to be visible to non-admins
);
$gBitSystem->registerPackage( $registerHash );
/*
if( $gBitSystem->isPackageActive( 'upstall' ) ) {
	$menuHash = array(
		'package_name'  => UPSTALL_PKG_NAME,
		'index_url'     => UPSTALL_PKG_URL.'index.php',
		'menu_template' => 'bitpackage:upstall/menu_upstall.tpl',
	);
	$gBitSystem->registerAppMenu( $menuHash );
} */
?>
