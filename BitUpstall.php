<?php
/**
* $Header: /cvsroot/bitweaver/_bit_upstall/BitUpstall.php,v 1.1 2009/12/16 18:42:07 walterwoj Exp $
* $Id: BitUpstall.php,v 1.1 2009/12/16 18:42:07 walterwoj Exp $
*/

/**
* Upstall class to illustrate best practices when creating a new bitweaver package that
* builds on core bitweaver functionality, such as the Liberty CMS engine
*
* date created 12/12/2009
* @author walter <walterwoj@yahoo.com>
* @version $Revision: 1.1 $ $Date: 2009/12/16 18:42:07 $ $Author: walterwoj $
* @class BitUpstall
*/


class BitUpstall
{
	function BitUpstall()
	{
		
	}
	
	function get_php_version()
	{
		 if(!defined('PHP_VERSION_ID'))
		 {
		     $version = explode('.',PHP_VERSION);
		
		 	return ( $version[0] * 10000 + $version[1] * 100 + $version[2] );
		 }
		 return PHP_VERSION_ID;
	}
	
	function upload()
	{
	     if( isset( $_FILES['upstall_file'] ) ) // see if a file has been uploaded
	     {
	          if( isset( $_FILES['upstall_file']['error'] ) && $_FILES['upstall_file']['error'] == UPLOAD_ERR_OK && is_uploaded_file( $_FILES['upstall_file']['tmp_name'] ) ) // make sure it uploaded properly
	          {
	          		$old_mask = umask(0); // Change the mask so ftp user can change it if they need to.
	          		
	          		if( ! move_uploaded_file( $_FILES['upstall_file']['tmp_name'], BIT_ROOT_PATH . "temp/upstall_package.zip" ) ) // Move to our own temp dir under a static name to prevent expoits. I tried doing all the work in the tmp dir but php does nto suppert that type of stuff
	       				return "Unable to move file to UpStall tmp dir";
	       				
	       			$parts = explode( ".",  $_FILES['upstall_file']['name'] ); // break up the file name 
	       			$ext = $parts[count($parts)-1]; // to get the extension
	       			$parts = explode( "_", $parts[0] ); //
	       			
	       			if( $parts[0] != "bitweaver" || $parts[1] != "bit" || $parts[count($parts) - 1] != "package" )
	       				return " This is not a valid package name ";
	       						
	                if( $_FILES['upstall_file']['type'] == "application/zip" && $ext == "zip" ) // Check file type 2 ways
	                {	       
	                	$zip = new ZipArchive();
		
										if ($zip->open( BIT_ROOT_PATH . "temp/upstall_package.zip" ) === TRUE) 
										{
											if( $zip->extractTo( BIT_ROOT_PATH ) )
											{
												$zip->close();
												unlink( BIT_ROOT_PATH . "temp/upstall_package.zip" );
											}
											else
											{
												$zip->close();
												unlink( BIT_ROOT_PATH . "temp/upstall_package.zip" );
											  return " Extracting files failed! ";
											}
										} 
										else
										{
											unlink( BIT_ROOT_PATH . "temp/upstall_package.zip" );
											return " Unable to open zip file for extraction. ";
										}
							             
	                }
	                else
	                {
	                    return " File Rejected! Wrong Filetype: " . $_FILES['upstall_file']['type'] . "</div>";  
	                }
	                umask( $old_mask );
	          }
	          else if( $_FILES['upstall_file']['error'] == UPLOAD_ERR_INI_SIZE ) // == 1
	          {
	               return "The uploaded file exceeds the upload_max_filesize directive in php.ini ";               
	          }
	          else if( $_FILES['upstall_file']['error'] == UPLOAD_ERR_FORM_SIZE ) // == 2
	          {
	               return "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form. ";               
	          }
	          else if( $_FILES['upstall_file']['error'] == UPLOAD_ERR_PARTIAL ) // == 3
	          {
	               return "The uploaded file was only partially uploaded. ";               
	          }
	          else if( $_FILES['upstall_file']['error'] == UPLOAD_ERR_NO_FILE ) // == 4
	          {
	               return "No file was uploaded. ";               
	          }
	          else if( get_php_version() >= 40310 && $_FILES['upstall_file']['error'] == UPLOAD_ERR_NO_TMP_DIR ) // == 6
	          {
	               return "Missing a temporary folder.";               
	          }
	          else if( get_php_version() >= 50100 && $_FILES['upstall_file']['error'] == UPLOAD_ERR_CANT_WRITE ) // == 7
	          {
	               return "Failed to write file to disk.";               
	          }
	          else if( get_php_version() >= 50200 && $_FILES['upstall_file']['error'] == UPLOAD_ERR_EXTENSION ) // == 8
	          {
	               return "File upload stopped by extension.";               
	          }
	          else
	          	   return " There was an error and we have no idea what happened! ";     
	     }
	     else
	          return "There was no file to upload.";
		
		return null;
	}
}
?>
