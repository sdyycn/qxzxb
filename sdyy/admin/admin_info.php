<?php
chdir(dirname(__FILE__));
require_once('../configs/path.inc.php');
require_once('/configs/config.db.php');
require_once('/include/Page.class.php');

function safe(){
	
	if(file_exists(DATA_PATH.'safe_inc.php')){
		include(DATA_PATH.'safe_inc.php');
	}
	include('template/admin_safe.html');
}

function save_safe(){
	if(!check_purview('safe_info')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	if(!isset($GLOBALS['submit'])){
		msg('<span style="color:red">请从表单提交</span>');
	}
	foreach($_POST as $key=>$value){
		if(in_array($key,array('action','submit'))){
			continue;
		}
		if(in_array($key,array('safe_type'))){
			$value=$value[0];
		}
		$safe[$key]=$value;
	}
	$str="<?php \n\$safe=".var_export($safe,'true').";\n?>";
	creat_inc(DATA_PATH.'safe_inc.php',$str);
	msg('验证信息配置成功');
}

function image_info(){
	if(file_exists(DATA_PATH.'image_inc.php')){
		include(DATA_PATH.'image_inc.php');
	}
	include('template/admin_image_info.html');
}

function save_image(){
	if(!check_purview('pic_info')){
	msg('<span style="color:red">操作失败,你的权限不足!</span>');
	}
	if(!isset($GLOBALS['submit'])){
		msg('<span style="color:red">请从表单提交</span>');
	}
	$image=array();
	foreach($_POST as $key => $value){
		if(in_array($key,array('action','save_image','submit','lang'))){
			continue;
		}
		if(is_array($value)){
			$value=$value[0];
		}
		$image[$key]=$value;
	}
	if(is_uploaded_file($_FILES['pic'][tmp_name])){
	$lang=isset($GLOBALS['lang'])?$GLOBALS['lang']:'cn';
	include(DATA_PATH.$lang.'_inc.php');
	include(INC_PATH.'image.class.php');
	$img=new image($_FILES['pic']);
	$file_path=$img->init();
	$arr=array('pics'=>$file_path);
	$image=(array)$image;
	$image=array_merge($image,$arr);
	}
	$str="<?php \n\$image_info=".var_export($image,'true').";\n?>";
	creat_inc(DATA_PATH.'image_inc.php',$str);
	msg('图片水印配置成功');
}


class AdminInfoPage extends AdminPage{
	function __construct(){
		parent::__construct('admin_info.html');
	}
	
	function display(){
		$web_html=isset($GLOBALS['_config']['web_html'])?$GLOBALS['_config']['web_html']:0;
		if ($web_html == 1){
			$this->smarty->assign('radio_web_html1', 'checked');
			$this->smarty->assign('radio_web_html0',  '');
		} else if ($web_html == 0){
			$this->smarty->assign('radio_web_html1', '');
			$this->smarty->assign('radio_web_html0',  'checked');
		}
		
		if ($GLOBALS['_config']['is_cache'][0]){
			$this->smarty->assign('radio_cache1', 'checked');
			$this->smarty->assign('radio_cache0', '');
		} else {
			$this->smarty->assign('radio_cache1', '');
			$this->smarty->assign('radio_cache0', 'checked');
		}
		
		$cache_time = '30';
		if ($GLOBALS['_config']['cache_time']){
			$cache_time = $GLOBALS['_config']['cache_time'];
		}
		$this->smarty->assign('cache_time', $cache_time);
		$this->smarty->assign('web_template', isset($GLOBALS['_config']['web_template'])&&!empty($GLOBALS['_config']['web_template'])?$GLOBALS['_config']['web_template']:'default');
		$this->smarty->assign('web_powerby', isset($GLOBALS['_config']['web_powerby'])?$GLOBALS['_config']['web_powerby']:'');
		$this->smarty->assign('web_keywords', isset($GLOBALS['_config']['web_keywords'])?$GLOBALS['_config']['web_keywords']:'');
		$this->smarty->assign('web_description', isset($GLOBALS['_config']['web_description'])?$GLOBALS['_config']['web_description']:'');
		$this->smarty->assign('web_beian', isset($GLOBALS['_config']['web_beian'])?$GLOBALS['_config']['web_beian']:'');
		$this->smarty->assign('web_yinxiao', isset($GLOBALS['_config']['web_yinxiao'])?$GLOBALS['_config']['web_yinxiao']:'');
		$this->smarty->assign('hot_key', $GLOBALS['_config']['hot_key']);

		$lang= '';
		if (!empty($_POST['lang'])){
			$lang = $_POST['lang'];
		}
		
		$this->smarty->assign('lang', $lang);
		$this->smarty->assign('language', '');
		$this->smarty->assign('web_name', $GLOBALS['_config']['web_name']);
		$this->smarty->assign('web_url', $GLOBALS['_config']['web_url']);
		$this->smarty->assign('web_path', $GLOBALS['_config']['web_path']);
		
		parent::display();
	}
}

$page = new AdminInfoPage;
$page->run();

?>
