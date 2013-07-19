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

class NewsEditPage extends AdminPage{

	function __construct(){
		parent::__construct('news_edit.html');
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

		$t = $table['ejob_news'];
		$newsid = $_REQUEST['id'];
		$sql = "SELECT newstitle as title, pic, newssortid as typeid, author, source, newscontent as content FROM $t WHERE newsid = $newsid";
		$stmt = $pdo->query($sql);
		$news = array();
		$stmt->bindColumn(1, $news['title'], PDO::PARAM_STR, 100);
		$stmt->bindColumn(2, $news['pic'], PDO::PARAM_STR, 200);
		$stmt->bindColumn(3, $news['typeid'], PDO::PARAM_INT);
		$stmt->bindColumn(4, $news['author'], PDO::PARAM_STR, 20);
		$stmt->bindColumn(5, $news['source'], PDO::PARAM_STR, 60);
		$stmt->bindColumn(6, $news['content'], PDO::PARAM_LOB);
		$stmt->fetch(PDO::FETCH_BOUND);

		$news['id'] = $newsid;

		//trace($news);

		$this->smarty->assign('select_id', $news['typeid']);
		$this->smarty->assign('news', $news);
		
		$this->smarty->assign('adminroot', $this->adminroot.'/news');
		parent::display();
	}
}