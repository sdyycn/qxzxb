<?php
chdir(dirname(__FILE__));
require_once('configs/config.db.php');
require_once('include/Page.class.php');

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
};

class AdminSysPage extends AdminPage{
	function __construct(){
		parent::__construct('admin_sys.html');
	}
	
	function display(){
		global $_sys;
		$this->smarty->assign('web_upload_image', $_sys['web_upload_image']);
		$this->smarty->assign('web_upload_file', $_sys['web_upload_file']);
		$this->smarty->assign('thump_width', $_sys['thump_width']);
		$this->smarty->assign('thump_height', $_sys['thump_height']);
		$this->smarty->assign('upload_size', $_sys['upload_size']);
		
		//////////////////////////////////////////////////////////////////////////
		if ($_sys['web_member'][0] == 1){
			$this->smarty->assign('radio_web_member1', 'checked');
			$this->smarty->assign('radio_web_member0', '');
		} else if ($_sys['web_member'][0] == 0){
			$this->smarty->assign('radio_web_member1', '');
			$this->smarty->assign('radio_web_member0', 'checked');
		}
		
		if ($_sys['is_member'][0] == 1){
			$this->smarty->assign('radio_is_member1', 'checked');
			$this->smarty->assign('radio_is_member0', '');
		} else if ($_sys['is_member'][0] == 0){
			$this->smarty->assign('radio_is_member1', '');
			$this->smarty->assign('radio_is_member0', 'checked');
		}
		
		if ($_sys['member_mail'][0] == 1){
			$this->smarty->assign('radio_member_mail1', 'checked');
			$this->smarty->assign('radio_member_mail0', '');
		} else if ($_sys['member_mail'][0] == 0){
			$this->smarty->assign('radio_member_mail1', '');
			$this->smarty->assign('radio_member_mail0', 'checked');
		}
		$this->smarty->assign('member_no_name', $_sys['member_no_name']);
		
		////////////////////////////////////////////////////////////////////
	
		if ($_sys['image_is'][0] == 1){
			$this->smarty->assign('radio_image_is1', 'checked');
			$this->smarty->assign('radio_image_is0', '');
		} else if ($_sys['image_is'][0] == 0){
			$this->smarty->assign('radio_image_is1', '');
			$this->smarty->assign('radio_image_is0', 'checked');
		}
	
		if ($_sys['image_url_is'][0] == 1){
			$this->smarty->assign('radio_image_url_is1', 'checked');
			$this->smarty->assign('radio_image_url_is0', '');
		} else if ($_sys['image_url_is'][0] == 0){
			$this->smarty->assign('radio_image_url_is1', '');
			$this->smarty->assign('radio_image_url_is0', 'checked');
		}
		
		if ($_sys['image_type'][0] == 1){
			$this->smarty->assign('radio_image_type1', 'checked');
			$this->smarty->assign('radio_image_type0', '');
		} else if ($_sys['image_type'][0] == 0){
			$this->smarty->assign('radio_image_type1', '');
			$this->smarty->assign('radio_image_type0', 'checked');
		}

		$text_mark_style = "";
		$pic_mark_style = "";
		if ($_sys ['image_type'][0]){ 
			$text_mark_style = "none";
		} else {
			$pic_mark_style = "none";
		}

		$this->smarty->assign('text_mark_style', $text_mark_style);
		$this->smarty->assign('image_text', $_sys['image_text']);
		$this->smarty->assign('image_text_color', $_sys['image_text_color']);
		$this->smarty->assign('image_text_size', $_sys['image_text_size']);
		
		$this->smarty->assign('pic_mark_style', $pic_mark_style);
		
		$this->smarty->assign('pic_mark_source', CMS_SELF.'upload/'.$_sys['pic']);
		$this->smarty->assign('pic_path', $_sys['pic']);
		
		$this->smarty->assign('radio_image_position1', '');
		$this->smarty->assign('radio_image_position2', '');
		$this->smarty->assign('radio_image_position3', '');
		$this->smarty->assign('radio_image_position4', '');
		$this->smarty->assign('radio_image_position5', '');
		$this->smarty->assign('radio_image_position6', '');
		$this->smarty->assign('radio_image_position7', '');
		$this->smarty->assign('radio_image_position8', '');
		$this->smarty->assign('radio_image_position9', '');
		
		if ($_sys['image_position'][0] == 1){
			$this->smarty->assign('radio_image_position1', 'checked');
		} else if ($_sys['image_position'][0] == 2){
			$this->smarty->assign('radio_image_position2', 'checked');
		} else if ($_sys['image_position'][0] == 3){
			$this->smarty->assign('radio_image_position3', 'checked');
		} else if ($_sys['image_position'][0] == 4){
			$this->smarty->assign('radio_image_position4', 'checked');
		} else if ($_sys['image_position'][0] == 5){
			$this->smarty->assign('radio_image_position5', 'checked');
		} else if ($_sys['image_position'][0] == 6){
			$this->smarty->assign('radio_image_position6', 'checked');
		} else if ($_sys['image_position'][0] == 7){
			$this->smarty->assign('radio_image_position7', 'checked');
		} else if ($_sys['image_position'][0] == 8){
			$this->smarty->assign('radio_image_position8', 'checked');
		} else if ($_sys['image_position'][0] == 9){
			$this->smarty->assign('radio_image_position9', 'checked');
		}

		$this->smarty->assign('image_text', $_sys['image_text']);

		///////////////////////////////////////////////////////////////////
		$this->smarty->assign('saf_open1', '');
		$this->smarty->assign('saf_open2', '');
		$this->smarty->assign('saf_open3', '');

		if (!empty($_sys['safe_open'])){
			foreach($_sys['safe_open'] as $k=>$v){
				if($v == '1'){
					$this->smarty->assign('saf_open1', 'checked');
				} else if ($v == '2') {
					$this->smarty->assign('saf_open2', 'checked');
				} else if ($v == '3') {
					$this->smarty->assign('saf_open3', 'checked');
				}
			}
		}
		$this->smarty->assign('safe_height', $_sys['safe_height']);
		$this->smarty->assign('safe_width', $_sys['safe_width']);
		$this->smarty->assign('safe_num', $_sys['safe_num']);
		
		////////////////////////////////////////////////////////////////
		$this->smarty->assign('web_pagesize', empty($_sys['web_pagesize'])?'20':$_sys['web_pagesize']);
		$this->smarty->assign('web_content_title', isset($_sys['web_content_title'])&&!empty($_sys['web_content_title'])?$_sys['web_content_title']:'180');
		$this->smarty->assign('web_content_info', isset($_sys['web_content_info'])&&!empty($_sys['web_content_info'])?$_sys['web_content_info']:'200');
		$this->smarty->assign('is_hits', $_sys['is_hits']);
		$this->smarty->assign('fialt_words', $_sys['fialt_words']);
		
		$this->smarty->assign('radio_arc_html1', '');
		$this->smarty->assign('radio_arc_html0', '');
		if($_sys['arc_html'][0]){
			$this->smarty->assign('radio_arc_html1', 'checked');
		} else {
			$this->smarty->assign('radio_arc_html0', 'checked');
		}

		parent::display();
	}
};

class AdminLangPage extends AdminPage{
	function __construct(){
		parent::__construct('admin_lang.html');
	}
	
	function display(){
		$this->smarty->assign('class_add', '');
		$this->smarty->assign('class_lang', '');
		$this->smarty->assign('class_cache_lang', '');
		if (empty($GLOBALS['action'])){
			
		} else if ($GLOBALS['action'] == 'add'){
			$this->smarty->assign('class_add', 'hover');
		} else if ($GLOBALS['action'] == 'lang'){
			$this->smarty->assign('class_lang', 'hover');
		} else if ($GLOBALS['action'] == 'cache_lang'){
			$this->smarty->assign('class_cache_lang', 'hover');
		}
		
		parent::display();
	}
}

class AdminHomePage extends AdminPage{
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

class AdminMarketPage extends AdminPage{
	function __construct(){
		parent::__construct('admin_market.html');
	}
	function display(){
		parent::display();
	}
}


class AdminKeywordsPage extends AdminPage{
	function __construct(){
		parent::__construct('admin_keywords.html');
	}
	function display(){
		parent::display();
	}
}

class AdminFlashPage extends AdminPage{
	function __construct(){
		parent::__construct('admin_flash_ad_info.html');
	}
	function display(){
		parent::display();
	}
}

