<?php
/*
 * @author: maweiguo
 * @date: 2013/7/8
 * @file: index.php
 * 
 */

// change the file name to index.php later.

chdir(dirname(__FILE__));
require_once 'configs/path.inc.php';
require_once $config['webpath'].'/include/JobsPage.class.php';
require_once $config['webpath'].'/include/Logs.class.php';

class JobsIndexPage extends JobsPage{
	function __construct(){
		parent::__construct('index.html');
	}
	
	function display(){
		// fix the page data here
		
		parent::display();
	}
	
	function doAction(){
		if ($action == 'login') {
			$res['status'] = true;
			$res['msg'] = '首页登录成功!';
			echo json_encode($res);
		}
		
//		parent::doAction($result);
	}
};

$index = new JobsIndexPage;
$index->run();
