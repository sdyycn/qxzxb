<?php
chdir(dirname(__FILE__));
include_once('../../configs/path.inc.php');
include_once('include/Page.class.php');

class Guestbook extends AdminPage{
	
}

class GuestbookSettingPage extends AdminPage{
	function __construct(){
		parent::__construct('admin_book_info.html');
	}
	
	function display(){
		$this->smarty->assign('radio_is_book1', '');
		$this->smarty->assign('radio_is_book0', '');
		if ($rel[0]['is_book']){
			$this->smarty->assign('radio_is_book1', 'checked');
		} else {
			$this->smarty->assign('radio_is_book0', 'checked');
		}

		$this->smarty->assign('radio_book_pos1', '');
		$this->smarty->assign('radio_book_pos0', '');
		if (in_array('1',$book_pos)){
			$this->smarty->assign('radio_book_pos1', 'checked');
		} else if (in_array('2',$book_pos)) {
			$this->smarty->assign('radio_book_pos0', 'checked');
		}

		$this->smarty->assign('radio_book_verify1', '');
		$this->smarty->assign('radio_book_verify0', '');
		if ($rel[0]['book_verify']){
			$this->smarty->assign('radio_book_verify1', 'checked');
		} else {
			$this->smarty->assign('radio_book_verify0', 'checked');
		}

		parent::display();
	}
}

class GuestbookListPage extends AdminPage{
	function __construct(){
		parent::__construct('admin_book_list.html');
	}
	
	function display(){
		$lang['id'] = '1';
		$lang['name'] = 'chinese';
 		$this->smarty->assign('lang', $lang);
 		
 		$table = $table['book'] = DB_PRE."book";
 		$sql = "SELECT * FROM $table WHERE lang=$lang ORDER BY addtime DESC LIMIT 0, 100";
 		$notes = array();
 		$notes['id'] = 1;
 		$notes['addtime'] = 'addtime';
 		$notes['replay'] = 'replayed'; 	//"<span style='color:green'>已回复</span>";		// <span style=\"color:red\">未回复</span>
 		$notes['content'] = 'content';
 		$notes['verify'] = 'verified';	//"<span style='color:red'>未审核</span>";		// <font style=\"color:green\">已审核</span>"
 		$this->smarty->assign('notes', $notes);
	
		parent::display();
	}
}
