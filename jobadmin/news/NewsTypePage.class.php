<?php
/*
 * @author: maweiguo
 * @date: 2013/7/10
 * @file: NewsTypePage.class.php
 * 
 */

chdir(dirname(__FILE__));
require_once '../../configs/path.inc.php';
require_once 'include/JobsPage.class.php';
require_once 'include/Logs.class.php';
require_once 'include/JobsPDO.class.php';

class NewsTypePage extends AdminPage{
	function __construct(){
		parent::__construct('news_type.html');
	}
	function display(){
		$t = $GLOBALS['table']['ejob_newssort'];
		$sql = "SELECT newssortid as id, newsortname as name FROM $t";
		$pdo = new JobsPDO();
		$stmt = $pdo->query($sql);
		$newstype = $stmt->fetchAll();

		$this->smarty->assign('newstype', $newstype);
		
		$this->smarty->assign('adminroot', $this->adminroot.'/news');
		parent::display();
	}
}