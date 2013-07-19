<?php
/*
 * @author: maweiguo
 * @date
 * file: newspage.php
 * class NewsPage
 * 
 */

chdir(dirname(__FILE__));
require_once '../../configs/path.inc.php';
require_once 'configs/admin.smarty.inc.php';
require_once 'include/JobsPDO.class.php';
require_once 'configs/page.class.php';
require_once ADMIN_FOLDER.'/check.php';
require_once ADMIN_FOLDER.'/news/JobsNewsType.class.php';
require_once ADMIN_FOLDER.'/news/JobsNews.class.php';
require_once ADMIN_FOLDER.'/news/NewsTypePage.class.php';
require_once ADMIN_FOLDER.'/news/NewsListPage.class.php';
require_once ADMIN_FOLDER.'/news/NewsAddPage.class.php';
require_once ADMIN_FOLDER.'/news/NewsEditPage.class.php';
require_once ADMIN_FOLDER.'/news/NewsViewPage.class.php';

class NewsPage extends AdminPage{
	function __construct(){
		parent::__construct();
	}
	
	function display(){
		$page = null;
		switch ($this->page)
		{
			case 'type':
				$page = new NewsTypePage;
				break;
			case 'add':
				$page = new NewsAddPage;
				break;
			case 'edit':
				$page = new NewsEditPage;
				break;
			case 'view':
				$page = new NewsViewPage;
				break;
			case 'list':
			default:
				$page = new NewsListPage;
				break;
		}
		$page->display();
	}

	function doAction() {
		
		switch ($this->action)
		{
			case 'type_add':
			case 'type_edit':
			case 'type_delete':
				$this->doNewsType($this->action);
				break;

			case 'news_add':
			case 'news_edit':
			case 'news_delete':
				$this->doNews($this->action);
				break;
				
			default:
				break;
		}
	}

	private function doNewsType($action){
		switch ($action)
		{
			case 'type_add':
				{
					if (!isset($_REQUEST['typename'])){
						$res['status'] = false;
						$res['msg'] = "类别名不能为空！";
						echo json_encode($res);

						alert("类别名不能为空！", "news_type.php");
					} else {
						$newstype = new JobsNewsType();
						$newstype->setName($_REQUEST['typename']);
						$newstype->doAction('add');
						echo $newstype->getResult();
					}
				}
				break;
			case 'type_edit':
				{
					if (!isset($_REQUEST['id'])){
						$res['status'] = false;
						$res['msg'] = "编辑失败, ID不能为空 ！";
						echo json_encode($res);

						alert("编辑失败, ID不能为空 ", "news_type.php");
					} elseif (!isset($_REQUEST['typename'])) {
						$res['status'] = false;
						$res['msg'] = "编辑失败, 类别名称不能为空！";
						echo json_encode($res);

						alert("编辑失败, 类别名称不能为空 ", "news_type.php");
					}
					else {
						$newstype = new JobsNewsType();
						$newstype->setId($_REQUEST['id']);
						$newstype->setName($_REQUEST['typename']);
						$newstype->doAction('edit');
						echo $newstype->getResult();
					}
				}
				break;
			case 'type_delete':
				{
					if (!isset($_POST['id'])) {
						$res['status'] = false;
						$res['msg'] = "删除失败, ID不存在！";
						echo json_encode($res);

						alert("删除失败, ID不存在！", "news_type.php");
					} else {
						$newstype = new JobsNewsType();
						$newstype->setId($_REQUEST['id']);
						$newstype->doAction('delete');
						echo $newstype->getResult();
					}
				}
				break;
				
			default:
				break;
		}
	}
	
	private function check_news_add(){
		if (!isset($_REQUEST['title'])){			
			alert("Error: title 参数未提交！", $url);
			return false;
		}
		if (!isset($_FILES['pic'])) {
			alert("Error: pic 参数未提交！", $url);
			return false;
		}
		if (!isset($_REQUEST['type'])) {
			alert("Error: type 参数未提交！", $url);
			return false;
		}
		if (!isset($_REQUEST['author'])) {
			alert("Error: author 参数未提交！", $url);
			return false;
		}
		if (!isset($_REQUEST['source'])) {
			alert("Error: source 参数未提交！", $url);
			return false;
		}
		if (!isset($_REQUEST['content'])) {
			alert("Error: content 参数未提交！", $url);
			return false;
		}
		return true;
	}
	private function handler_news_add(){
		if (!$this->check_news_add()){
			return;
		}

		$news = new JobsNews();		
		$ret = $news->add($_REQUEST['title'], $_FILES['pic'], $_REQUEST['type'], $_REQUEST['author'], $_REQUEST['source'], $_REQUEST['content']);	
		if ($ret > 0) {
			alert("添加成功!", $url);		
		} else {
			alert("添加失败!", $url);			
		}
	}
	private function doNews($action){
		$url = "newspage.php?page=list";
		switch ($action)
		{
			case 'news_add':
				$this->handler_news_add();
				break;
			case 'news_update':
				{
					if (!isset($_REQUEST['id'])){
						alert("Error: id 参数未提交！", $url);
					} else if (!isset($_REQUEST['title'])){
						alert("Error: title 参数未提交！", $url);
					} else if (!isset($_FILES['pic'])) {
						alert("Error: pic 参数未提交！", $url);
					} else if (!isset($_REQUEST['type'])) {
						alert("Error: type 参数未提交！", $url);
					} else if (!isset($_REQUEST['author'])) {
						alert("Error: author 参数未提交！", $url);
					} else if (!isset($_REQUEST['source'])) {
						alert("Error: source 参数未提交！", $url);
					} else if (!isset($_REQUEST['content'])) {
						alert("Error: content 参数未提交！", $url);
					} else {
						$news = new JobsNews();
						$news->update($_REQUEST['id'], $_REQUEST['title'], $_FILES['pic'], $_REQUEST['type'], $_REQUEST['author'], $_REQUEST['source'], $_REQUEST['content']);
					}
				}
				break;
			case 'news_delete':
				{
					if (!isset($_REQUEST['id'])){
						alert("Error: id 参数未提交！", $url);
					} else {
						$news = new JobsNews();
						echo $news->delete($_REQUEST['id']);
					}
				}
				break;
			default:
				break;
		}
		
	}
}

$page = new NewsPage;
$page->run();
