<?php
// all root, path, directory: not include /

// Project Name.
define('PROJECT_NAME', 'sdyy');
// c:\www
$config['webpath'] = $_SERVER['DOCUMENT_ROOT'];

// http://locahost
$config['docroot'] = "http://".$_SERVER['HTTP_HOST'];

if (PROJECT_NAME != "")
{
	$config['webpath'] = $_SERVER['DOCUMENT_ROOT'].'/'.PROJECT_NAME;
	$config['docroot'] = 'http://'.$_SERVER['HTTP_HOST'].'/'.PROJECT_NAME;
}
set_include_path(get_include_path().PATH_SEPARATOR.$config['webpath']);		// ini_set('include_path', 'folder');
//echo get_include_path();

// Admin Directorys.
define('ADMIN_FOLDER', 'admin');
$config['adminroot'] = $config['docroot'].'/'.ADMIN_FOLDER;		// http://localhost/jobadmin


define ('__DEBUG__', 'true');

function trace($msg){
	if (__DEBUG__){
		print_r($msg);
		print_r("<br />");
	}
}

define('CMS_PATH', $config['webpath']);
define('DATA_PATH', CMS_PATH.'/data');

require_once('en_info.php');
require_once('sys_info.php');


/*/
etherjobs
 * /jobadmin(php, templates,...)
 * /configs
 * /doc
 * /include
 * /log
 * /templates
 * /templates_c
 * /cache
 * /plugins
 * /upload
 * /libs

 */
//*/