<?php
chdir(dirname(__FILE__));
require_once('../configs/path.inc.php');
require_once('/configs/config.db.php');
require_once('/include/Page.class.php');


function index(){
	if(file_exists(DATA_PATH.'index_info.php')){
		include(DATA_PATH.'index_info.php');
	}
	$index_info=isset($_index)?$_index:array('flash_is'=>0);
	if(file_exists(DATA_PATH.'cache/lang_cache.php')){
		include(DATA_PATH.'cache/lang_cache.php');
	}
	include('template/admin_index_info.html');
}

function save_index(){
	if(!check_purview('index_info')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	if(!isset($GLOBALS['submit'])){
		msg('<span style="color:red">请从表单提交</span>');
	}
	unset($_POST['action'],$_POST['submit']);
	$info=array();
	foreach($_POST as $k=>$v){
		$info[$k]=$v;
	}
	//是否存在
	if($GLOBALS['mysql']->fetch_rows("select id from ".DB_PRE."cmsinfo where info_tag='index_info'")){
$sql="update ".DB_PRE."cmsinfo set info_array='".addslashes(var_export($info,'true'))."' where info_tag='index_info'";
}else{
$sql="insert into ".DB_PRE."cmsinfo (info_tag,info_array,info_name) values ('index_info','".addslashes(var_export($info,true))."','首页配置')";
}
$GLOBALS['mysql']->query($sql);
$s="<?php\n\$_index=".var_export($info,true).";\n?>";
$file=DATA_PATH.'index_info.php';
creat_inc($file,$s);
	msg('网站配置成功');	
}

class AdminIndexInfoPage extends AdminPage{
	function __construct(){
		parent::__construct('admin_index_info.html');
	}
	
	function display(){
		$this->smarty->assign('radio_flash_is1', '');
		$this->smarty->assign('radio_flash_is0', '');
		if ($index_info['flash_is'][0]){
			$this->smarty->assign('radio_flash_is1', 'checked');
		} else {
			$this->smarty->assign('radio_flash_is0', 'checked');
		}

		parent::display();
	}
	
}

$page = new AdminIndexInfoPage;
$page->run();

?>