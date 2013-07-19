<?php
/*
 * @author: maweiguo
 * @date: 2013/7/10
 * @file: NewsListPage.class.php
 * 
 */

chdir(dirname(__FILE__));
require_once '../../configs/path.inc.php';
require_once 'include/JobsPage.class.php';
require_once 'include/Logs.class.php';
require_once 'include/JobsPDO.class.php';

class NewsAddPage extends AdminPage{
	function __construct(){
		parent::__construct('news_add.html');
	}
	function display(){
		$t = $GLOBALS['table']['ejob_newssort'];
		$sql = "SELECT newssortid, newsortname FROM $t";
		$pdo = new JobsPDO();
		$stmt = $pdo->query($sql);
		$id = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
		$stmt->execute();
		$typename = $stmt->fetchAll(PDO::FETCH_COLUMN, 1);

		$this->smarty->assign('id', $id);
		$this->smarty->assign('typename', $typename);
		$this->smarty->assign('select_id', 1);
		
		$this->smarty->assign('adminroot', $this->adminroot.'/news');
		parent::display();
	}
}