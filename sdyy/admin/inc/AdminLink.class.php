<?php
chdir(dirname(__FILE__));
include_once('../../configs/path.inc.php');
include_once('include/Page.class.php');

class AdminLink{
	function add(){
//		$sql="INSERT INTO ".DB_PRE."link (link_url,link_name,link_logo,link_order,link_info,link_mail,lang,addtime) 
//		values ('{$link_url}','{$link_name}','{$link_logo}',{$link_order},'{$link_info}','{$link_mail}','{$lang}','".time()."')";
		
	}
}

class AdminLinkAddPage extends AdminPage{
	function __construct(){
		parent::__construct('admin_link_add.html');
	}
	
	function display(){
		$lang['id'] = '1';
		$lang['name'] = 'chinese';
 		$this->smarty->assign('lang', $lang);
		parent::display();
	}
}

class AdminLinkEditPage extends AdminPage{
	function __construct(){
		parent::__construct('admin_link_edit.html');
	}
	
	function display(){

		parent::display();
	}
}

class AdminLinkListPage extends AdminPage{
	function __construct(){
		parent::__construct('admin_link_list.html');
	}
	
	function display(){
		$lang['id'] = '1';
		$lang['name'] = 'chinese';
 		$this->smarty->assign('lang', $lang);
 		
 //		$table = $table['link'];
		$link = array();
		$link['name'] = 'name';
		$link['addtime'] = 'time';
		$link['info'] = 'info';
		$link['mail'] = 'mail';
		$link['order'] = 'order';
		$link['id'] = '1';
//		$sql="SELECT * FROM $table WHERE lang =$lang ORDER BY m.id DESC LIMIT 0, 100";
		$this->smarty->assign('links', $link);

		parent::display();
	}
}
