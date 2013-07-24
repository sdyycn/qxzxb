<?php
// all root, path, directory: not include /

// Project Name.
define('PROJECT_NAME', '');
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

//define ('SITE_FOLDER', $config['webpath']);
// Admin Directorys.
define('ADMIN_FOLDER', 'jobadmin');
$config['adminroot'] = $config['docroot'].'/'.ADMIN_FOLDER;		// http://localhost/jobadmin


define ('__DEBUG__', 'true');

function trace($msg){
	if (__DEBUG__){
		print_r($msg);
		print_r("<br />");
	}
}

function __autoload($class_name) {
    require_once 'include/'.$class_name . 'class.php';
}



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