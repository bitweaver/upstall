<?php
// $Header: /cvsroot/bitweaver/_bit_upstall/admin/admin_upstall_inc.php,v 1.1 2009/12/16 18:43:25 walterwoj Exp $
// Copyright (c) 2005 bitweaver Upstall
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.

// is this used?
//if (isset($_REQUEST["upstallset"]) && isset($_REQUEST["homeUpstall"])) {
//	$gBitSystem->storeConfig("home_upstall", $_REQUEST["homeUpstall"]);
//	$gBitSmarty->assign('home_upstall', $_REQUEST["homeUpstall"]);
//}

require_once( UPSTALL_PKG_PATH.'BitUpstall.php' );

$res = null;

if( isset( $_REQUEST['action'] ) && isset( $_REQUEST['source'] ) )
{
	if( $_REQUEST['action'] == 'install' )
	{
		if( $_REQUEST['source'] == 'upload' )
		{
			if( isset( $_FILES['upstall_file'] ) )
			{
				$myBitUpstall = new BitUpstall();
				$res = $myBitUpstall->upload();
				
				if( ! $res )
				{
					header( "Location: " . BIT_ROOT_URL . "install/install.php?step=3" );
					$res = " File Upload complete! If you are not redirected automagicly <a href='" . BIT_ROOT_URL . "install/install.php?step=3" . "'>CLICK HERE</a>.";  
				}
			}
			// Display the template
			//$gBitSystem->display( 'bitpackage:upstall/upload_install_upstall.tpl', tra( 'Upstall' ) , array( 'error' => $res ));
		}
		elseif( $_REQUEST['source'] == 'remote' )
		{
			$gBitSystem->setHttpStatus( 404 );
			$gBitSystem->fatalError( "This feature is not yet supported" );
		}
	}
	elseif( $_REQUEST['action'] == 'update' )
	{
		if( $_REQUEST['source'] == 'upload' )
		{
			$gBitSystem->setHttpStatus( 404 );
			$gBitSystem->fatalError( "This feature is not yet supported" );
		}
		elseif( $_REQUEST['source'] == 'remote' )
		{
			$gBitSystem->setHttpStatus( 404 );
			$gBitSystem->fatalError( "This feature is not yet supported" );
		}
	}
}
	$gBitSmarty->assign( "error", $res );
?>
