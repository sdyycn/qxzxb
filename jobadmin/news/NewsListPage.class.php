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

class NewsListPage extends AdminPage{
	function __construct(){
		parent::__construct('news_list.html');
	}
	function display(){
		if (!isset($_REQUEST['p'])){
			$curPage = 1;
		} else {
			$curPage = $_GET['p'];
		}

		$pdo = new JobsPDO();

		$t = $GLOBALS['table']['ejob_news'];

		$next = ($curPage-1)*10;
		$sql = "SELECT newsid as id, newstitle as title, author, DATE(addtime) as addtime FROM $t  LIMIT $next, 10";
		$stmt = $pdo->query($sql);
		$news = $stmt->fetchAll();

		$nums = $pdo->rowAllCount($t);

		$subPages = new SubPages(10, $nums, $curPage, 5, $this->adminroot.'/news/newspage.php?page=list&p=', 1, false);

		$this->smarty->assign('subPages', $subPages->toString());
		$this->smarty->assign('allnews', $news);
		
		$this->smarty->assign('adminroot', $this->adminroot.'/news');
		parent::display();
	}
}