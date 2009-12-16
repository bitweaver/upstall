<?php
// No tables

global $gBitInstaller;

$gBitInstaller->registerPackageInfo( UPSTALL_PKG_NAME, array(
	'description' => "Upstall package allows the admin to install new packages or update existing ones either through uploading zip files or directly from bw.o",
	'license' => '<a href="http://www.gnu.org/licenses/licenses.html#LGPL">LGPL</a>',
	'version' => '0.0.0.1',
	'state' => 'beta',
	'dependencies' => '',
) );

// ### Indexes - no indices
// ### Sequences - no sequences
// ### Default UserPermissions - only admins can work with this package
$gBitInstaller->registerUserPermissions( UPSTALL_PKG_NAME, array(
	array( 'p_upstall_admin', 'Can admin upstall', 'admin', UPSTALL_PKG_NAME )
) );

// ### Default Preferences - there are no prefferences

?>
