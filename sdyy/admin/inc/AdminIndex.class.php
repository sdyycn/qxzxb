<?php
chdir(dirname(__FILE__));
require_once('include/Page.class.php');

class AdminTopPage extends AdminPage{
	function __construct(){
		parent::__construct('admin_top.html');
	}
	
	function display(){
//		$table = $GLOBALS['table']['admin'];
//		$user = $_SESSION['admin'];
//		$sql = "SELECT * FROM $table WHERE admin_name=$user";

		$this->smarty->assign('admin_name', 'admin');
		$this->smarty->assign('admin_time', date('Y-m-d H:i:s'));
		$this->smarty->assign('admin_ip', '127.0.0.1');
		$this->smarty->assign('this_ip', '127.0.0.1');
		parent::display();
	}
}

class AdminLeftPage extends AdminPage{
	function __construct(){
		parent::__construct('admin_left.html');
	}
}

class AdminMainPage extends AdminPage{
	function __construct(){
		parent::__construct('admin_main.html');
	}
	
	function display(){
/*/
		$table = $GLOBALS['table']['maintb'];
		$id = 0;
		$sql = "SELECT COUNT(*) AS n FROM $table WHERE channel=$id GROUP BY channel";
		$num = 0;

		$sql="SELECT SUM(hits) AS ck FROM $table WHERE channel=$id GROUP BY channel";
		$sum = 0;
		
		$table = $_GLOBALS['table']['formlist'];
		$sql = "SELECT COUNT(*) AS c FROM $table WHERE form_id=$id";
		$num = 0;
		
		$sql = "SELECT COUNT(*) AS b FROM $table WHERE form_id=$id AND is_read=0";
		$num2 = 0;
//*/
		$this->smarty->assign('id', 0);
		$this->smarty->assign('num', 0);
		$this->smarty->assign('sum', 0);
		$this->smarty->assign('num2', 0);
		$gd = gd_info();
		$gdinfo = $gd['GD Version'];
		$gdinfo .= "支持图片";
		$gdinfo .=  ($gd['GIF Read Support']&&$gd['GIF Create Support'])?'gif/':'';
		$gdinfo .=  ($gd['JPEG Support'])?'jpeg/':'';
		$gdinfo .=  ($gd['PNG Support'])?'png':'';
		unset($gd);
		$this->smarty->assign('gdinfo', $gdinfo);
		$this->smarty->assign('installdate', '');
		$this->smarty->assign('version', '');
		$this->smarty->assign('OS', PHP_OS);
		$this->smarty->assign('software', $_SERVER['SERVER_SOFTWARE']);
		$this->smarty->assign('safe_mode', ini_get('safe_mode')? '是':'否');
		$this->smarty->assign('upload_max_filesize', ini_get('upload_max_filesize'));
		
		
		$cache_language = null;
		if (file_exists(DATA_PATH."cache/lang_cache.php")){
			$cache_language .= "已生成&nbsp;&nbsp;生成时间: date('Y-m-d H:m:s', filemtime(DATA_PATH.'cache/lang_cache.php');";
			$cache_language .= "&nbsp; <a href='admin_lang.php?action=cache_lang'>建议更新缓存</a>";
		} else {
			$cache_language .= "<label style='color:red'>未生成</label>&nbsp;";
			$cache_language .= "<a href='admin_lang.php?action=cache_lang'>生成缓存</a>";
		}
		$this->smarty->assign('cache_language', $cache_language);
		
		$cache_category = null;
		if (file_exists(DATA_PATH."cache_cate/cache_category_all.php")){
			$cache_category .= "已生成&nbsp;&nbsp;生成时间: date('Y-m-d H:m:s', filemtime(DATA_PATH.'cache_cate/cache_category_all.php'))";
			$cache_category .= "&nbsp;<a href='admin_catagory.php?action=cache_cate'>建议更新缓存</a>";
		} else {
			$cache_category .= "<label style='color:red'>未生成</label>&nbsp;<a href='admin_catagory.php?action=cache_cate'>生成缓存</a>";
		}
		$this->smarty->assign('cache_category', $cache_category);

		$cache_channel = null;
		if (file_exists(DATA_PATH."cache_channel/cache_channel_all.php")){
			$cache_channel .= "已生成&nbsp;&nbsp;生成时间: date('Y-m-d H:m:s', filemtime(DATA_PATH.'cache_channel/cache_channel_all.php'))";
			$cache_channel .= "&nbsp;<a href='admin_channel.php?action=cache'>建议更新缓存</a>";
		}else{
			$cache_channel .= "<label style='color:red'>未生成</label>&nbsp;<a href='admin_channel.php?action=cache'>生成缓存</a>";
		}
		$this->smarty->assign('cache_channel', $cache_channel);
		
		parent::display();
	}
}
