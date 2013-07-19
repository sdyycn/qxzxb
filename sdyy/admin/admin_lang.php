<?php
chdir(dirname(__FILE__));
require_once('../configs/path.inc.php');
require_once('/configs/config.db.php');
require_once('/include/Page.class.php');



function add(){
	if(!check_purview('lang_add')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	include('template/admin_lang_add.html');
}
function add_save(){
	if(!check_purview('lang_add')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $submit,$lang_name,$lang_order,$lang_tag,$lang_is_use,$lang_is_open,$lang_is_url,$lang_url,$lang_is_fix;
	
	if(!isset($submit)){
		msg('<span style="color:red">请填写完后提交表单</span>','admin_lang.php?action=add');
	}
	if(empty($lang_name)){
		msg('<span style="color:red">语言名称不能为空</span>','javascript:history.go(-1);');
	}
	$lang_order=isset($lang_order)?intval($lang_order):0;
	if(!isset($lang_tag)){
		msg('<span style="color:red">语言标示不能为空</span>','javascript:history.go(-1);');
	}
	$lang_tag_is=$GLOBALS['mysql']->fetch_rows("select id from ".DB_PRE."lang where lang_tag='".$lang_tag."'");
	if($lang_tag_is){
		msg("语言标示【{$lang_tag}】已经存在，请更换");
	}
	if(!check_str($lang_tag,'/^[a-z][a-z_]*$/')){
		msg('<span style="color:red">语言标示只能使用字母和下划线，字母开头</span>','javascript:history.go(-1);');
	}
	$lang_is_use=intval($lang_is_use[0]);
	$lang_is_open=intval($lang_is_open[0]);
	$lang_is_url=intval($lang_is_url[0]);
	$lang_is_fix=intval($lang_is_fix[0]);
	if(isset($lang_url)){
		if(!check_str($lang_url,'/^http:\/\/.*$/')){
			msg('<span style="color:red">转向地址必须以http://开头</span>',"javascript:history.go(-1);");
		}
		//$lang_url=str_replace('http://','',$lang_url);
	}
	//添加语言包，默认使用简体中文语言包

	$lang_cate_rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."lang_cate where lang='cn'");
	if(!empty($lang_cate_rel)){
		foreach($lang_cate_rel as $cate_k=>$cate_v){
			$lang_cate=$cate_v['lang_cate'];
			$lang_info=$cate_v['lang_info'];
			$GLOBALS['mysql']->query("insert into ".DB_PRE."lang_cate (lang_cate,lang_info,lang) values ('{$lang_cate}','{$lang_info}','{$lang_tag}')");
			$lang_cate_insert=$GLOBALS['mysql']->insert_id();
			$lang_lang_rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."lang_lang where lang='cn' and lang_cate=".$cate_v['id']);
			
			if(!empty($lang_lang_rel)){
			foreach($lang_lang_rel as $lang_k=>$lang_v){
			$lang_lang_tag=$lang_v['lang_tag'];
			$lang_lang_cate=$lang_cate_insert;
			$lang_lang_value=$lang_v['lang_value'];
			$GLOBALS['mysql']->query("insert into ".DB_PRE."lang_lang (lang_tag,lang_cate,lang_value,lang) values ('{$lang_lang_tag}','{$lang_lang_cate}','{$lang_lang_value}','{$lang_tag}')");
			}
			}
		}
	}
	
	
	$sql="insert into ".DB_PRE."lang (lang_name,lang_order,lang_tag,lang_is_use,lang_is_open,lang_is_url,lang_url,lang_is_fix) values ('{$lang_name}',{$lang_order},'{$lang_tag}',{$lang_is_use},{$lang_is_open},{$lang_is_url},'{$lang_url}',{$lang_is_fix})";
	$GLOBALS['mysql']->query($sql);
	//更新语言包缓存
	$sql="select lang_tag,lang_value from ".DB_PRE."lang_lang where lang='{$lang_tag}' order by id desc";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	$language=array();
	if(!empty($rel)){
	foreach($rel as $k=>$v){
		$language[$v['lang_tag']]=$v['lang_value'];
	}
	unset($rel);
	}
	$lang_file=LANG_PATH.'lang_'.$lang_tag.'.php';
	$str="<?php\n\$language=".var_export($language,true).";\n?>";
	creat_inc($lang_file,$str);
	//更新缓存
	$sql="select*from ".DB_PRE."lang order by lang_order desc";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	
		$cache_file=DATA_PATH.'cache/lang_cache.php';
		$str="<?php\n\$lang_cache=".var_export($rel,true).";\n?>";
		creat_inc($cache_file,$str);
	
	msg($lang_name.'语言添加成功','admin_lang.php');
}

function edit(){
if(!check_purview('lang_lang')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
global $lang,$id,$page;
if(!isset($GLOBALS['lang'])){
	msg('<span style="color:red">参数为空,请重新操作</span>','javascript:history.go(-1);');
}
$nav_arr=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."lang_cate where lang='{$lang}' order by id desc");
$go_id=isset($nav_arr[0]['id'])?$nav_arr[0]['id']:'';
$id=isset($id)?$id:$go_id;
	include('template/admin_lang_manage.html');
}

function edit_save(){
if(!check_purview('lang_lang')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
if(!isset($GLOBALS['lang'])){
	msg('<span style="color:red">参数为空,请重新操作</span>','javascript:history.go(-1);');
}
	if(!isset($GLOBALS['submit'])){
		msg('<span style="color:red">请从表单提交</span>','admin_lang.php');
	}
	if(!isset($_POST)){
		msg('<span style="color:red">请填写语言后提交</span>','javascript:history.go(-1);');
	}
	foreach($_POST as $key=>$value){
		if(in_array($key,array('action','lang','submit'))){
			continue;
		}
		$lang[$key]=$value;
	}
	$str="<?php\n\$language=".var_export($lang,true).";\n?>";
	if(!file_exists(LANG_PATH.'lang_'.$GLOBALS['lang'].'.php')){
		msg('<span style="color:red">找不到'.$GLOBALS['lang'].'语言的语言包，请重新安装</span>','javascript:history.go(-1);');
	}
	if(!$fp=@fopen(LANG_PATH.'lang_'.$GLOBALS['lang'].'.php','w')){
		msg('<span style="color:red">语言文件打开失败，请检查是否有足够的文件操作权限</span>','javascript:history.go(-1);');
	}
	flock($fp,LOCK_EX);
	if(!fwrite($fp,$str)){
		flock($fp,LOCK_UN);
		msg('<span style="color:red">写入语言文件失败,请重新操作</span>');
	}
	msg('语言修改成功','admin_lang.php');
	
}

function lang_edit(){
	if(!check_purview('lang_edit')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	if(!isset($GLOBALS['lang'])){
		die('<span style="color:red">参数不正确，请重新操作!</span>');
	}
	if(file_exists(DATA_PATH.'cache/lang_cache.php')){
		include(DATA_PATH.'cache/lang_cache.php');
	}
	if(!empty($lang_cache)){
		foreach($lang_cache as $k=>$v){
			if($v['lang_tag']==$GLOBALS['lang']){
				$arr_lang=$v;
			}
		}
	}
	if(empty($arr_lang)){
		msg('<span style="color:red">不存在该语言请重新添加或更新语言缓存</span>');
	}
	include('template/admin_lang_edit.html');
}

function lang_save_edit(){
	if(!check_purview('lang_edit')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $lang,$submit,$lang_name,$lang_order,$lang_is,$lang_is_open,$lang_is_use,$lang_is_url,$lang_url;
	if(!isset($GLOBALS['lang'])){
		msg('<span style="color:red">参数错误，请重新操作！</span>');
	}
	if(!isset($GLOBALS['submit'])){
		msg('<span style="color:red">请从表单提交</span>','admin_lang.php');
	}
	if(empty($lang_name)){
		msg('<span style="color:red">语言名称不能为空</span>','javascript:history.go(-1);');
	}
	$lang_order=isset($lang_order)?intval($lang_order):0;
	$lang_is_use=intval($lang_is_use[0]);
	if(!$lang_is_use){
		$sql="select lang_main from ".DB_PRE."lang where lang_tag='".$lang."'";
		$rel=$GLOBALS['mysql']->fetch_asc($sql);
		if($rel[0]['lang_main']){msg("默认语言不能关闭使用");}
	}
	$lang_is_open=intval($lang_is_open[0]);
	$lang_is_url=intval($lang_is_url[0]);
	if(isset($lang_url)){
		if(!check_str($lang_url,'/^http:\/\/.*$/')){
			msg('<span style="color:red">转向地址必须以http://开头</span>',"javascript:history.go(-1);");
		}
	}
	$sql="update ".DB_PRE."lang set lang_name='$lang_name',lang_order=$lang_order,lang_is_use=$lang_is_use,lang_is_open=$lang_is_open,lang_is_url=$lang_is_url,lang_url='$lang_url' where lang_tag='".$GLOBALS['lang']."'";
	$GLOBALS['mysql']->query($sql);
	//更新缓存
	$sql="select*from ".DB_PRE."lang order by lang_order desc";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	
		$cache_file=DATA_PATH.'cache/lang_cache.php';
		$str="<?php\n\$lang_cache=".var_export($rel,true).";\n?>";
		creat_inc($cache_file,$str);
	
	
	msg("【{$lang_name}】语言修改成功",'admin_lang.php');
}

function lang_dl(){
if(!check_purview('lang_del')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $lang;
	if(!isset($GLOBALS['lang'])){
		msg('<span style="color:red">参数错误,请重新操作</span>');
	}
	if(file_exists(DATA_PATH."cache/lang_cache.php")){
		include(DATA_PATH."cache/lang_cache.php");
	}
	if(empty($lang_cache)){
		err('<span style="color:red">请先添加语言或更新语言缓存</span>');
	}
	foreach($lang_cache as $k=>$v){
		if($v['lang_tag']==$GLOBALS['lang']){
			$lang_fix=$v['lang_is_fix'];
		}
	}
	if($lang_fix){
		err("【".$GLOBALS['lang']."】语言为固定语言不能删除");
	}
	//判断是否有内容
	$has_cate=$GLOBALS['mysql']->fetch_rows("select id from ".DB_PRE."category where lang='{$lang}'");
	if($has_cate){msg('<span style="color:red">删除失败！该语言下有内容请先删除该语言的栏目等相关内容</span>');}
	$lang_file=LANG_PATH.'lang_'.$GLOBALS['lang'].'.php';
	if(file_exists($lang_file)){
		if(!@unlink($lang_file)){
			msg('<span style="color:red">操作失败!不能删除语言文件,请检查是否有足够的文件操作权限</span>','admin_lang.php');
		}
	}
	$GLOBALS['mysql']->query("delete from ".DB_PRE."lang_cate where lang='{$lang}'");
	$GLOBALS['mysql']->query("delete from ".DB_PRE."lang_lang where lang='{$lang}'");
	$sql="delete from ".DB_PRE."lang where lang_tag='".$GLOBALS['lang']."'";
	$GLOBALS['mysql']->query($sql);
	//删除相关缓存文件
	if(file_exists(DATA_PATH.$lang.'_info.php')){include(DATA_PATH.$lang.'_info.php');}
if(!empty($_confing)){
 foreach($_confing as $k=>$v){
 	$_confing[$k]=stripslashes($v);
 }
}
	if(file_exists(TP_PATH.$_confing['web_template'].'/tpl_info_'.$lang.'.php')){@unlink(TP_PATH.$_confing['web_template'].'/tpl_info_'.$lang.'.php');}
	if(file_exists(DATA_PATH.$lang.'_info.php')){@unlink(DATA_PATH.$lang.'_info.php');}
	
	//更新缓存
	$sql="select*from ".DB_PRE."lang order by lang_order desc";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	
		$cache_file=DATA_PATH.'cache/lang_cache.php';
		$str="<?php\n\$lang_cache=".var_export($rel,true).";\n?>";
		creat_inc($cache_file,$str);
	msg('<span style="color:red">操作成功!语言标识为'.$GLOBALS['lang'].'的语言已经删除!</span>','admin_lang.php');
	
}

//更新语言缓存
function cache_lang(){
	$sql="select*from ".DB_PRE."lang order by lang_order desc";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
		$cache_file=DATA_PATH.'cache/lang_cache.php';
		$str="<?php\n\$lang_cache=".var_export($rel,true).";\n?>";
		creat_inc($cache_file,$str);
	msg('语言缓存更新完成');
}

function lang_main(){
	global $lang_id;
	if(empty($lang_id[0])){msg('<span style="color:red">参数发生错误,请重新操作</span>');}
	if(file_exists(DATA_PATH.'cache/lang_cache.php')){include(DATA_PATH.'cache/lang_cache.php');}
	if(!empty($lang_cache)){
		foreach($lang_cache as $k=>$v){
			if($v['lang_main']==1){$id=$v['id'];}
			if($v['id']==$lang_id[0]){$lang_is_use=$v['lang_is_use'];$lang_name=$v['lang_name'];};
		}
	}
	if(!$lang_is_use){msg("请先开启【{$lang_name}】语言",'?',0);}
	if(!empty($id)){$GLOBALS['mysql']->query("update ".DB_PRE."lang set lang_main=0 where id=".$id);}
	$GLOBALS['mysql']->query("update ".DB_PRE."lang set lang_main=1 where id=".$lang_id[0]);
	//更新缓存
	$sql="select*from ".DB_PRE."lang order by lang_order desc";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	$cache_file=DATA_PATH.'cache/lang_cache.php';
	$str="<?php\n\$lang_cache=".var_export($rel,true).";\n?>";
	creat_inc($cache_file,$str);
	unset($rel);
	msg('默认语言设置完成','?');
}

function add_lang(){
	if(!check_purview('lang_lang')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $lang;
	$sql="select id,lang_cate from ".DB_PRE."lang_cate where lang='{$lang}'";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	include('template/admin_lang_lang.html');
}

function save_add_lang(){
	if(!check_purview('lang_lang')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $lang,$lang_tag,$lang_cate,$lang_value;
	if(empty($lang)){msg('<span style="color:red">参数发生错误，请重新操作</span>');}
	if(empty($lang_tag)){msg('<span style="color:red">语言变量不能为空</span>');}
	if(empty($lang_cate)){msg('<span style="color:red">请选择分类</span>');}
	if(!check_str($lang_tag,'/^[a-z_A-Z0-9]*$/')){msg('<span style="color:red">语言变量只能是字母数字和下划线组成</span>');}
	$n=$GLOBALS['mysql']->fetch_rows("select id from ".DB_PRE."lang_lang where lang_tag='".$lang_tag."' and lang='".$lang."'");
	if($n){msg('<span style="color:red">已经存在该语言变量【'.$lang_tag.'】，请更换</span>');}
	$lang_tag=cn_substr($lang_tag,60);
	$lang_value=cn_substr($lang_value,250);
	$sql="insert into ".DB_PRE."lang_lang (lang_tag,lang_value,lang_cate,lang) values ('{$lang_tag}','{$lang_value}','{$lang_cate}','{$lang}')";
	$GLOBALS['mysql']->query($sql);
	//写入缓存
	$sql="select lang_tag,lang_value from ".DB_PRE."lang_lang where lang='{$lang}' order by id desc";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	$language=array();
	if(!empty($rel)){
	foreach($rel as $k=>$v){
		$language[$v['lang_tag']]=$v['lang_value'];
	}
	}
	
	$lang_file=LANG_PATH.'lang_'.$lang.'.php';
	$str="<?php\n\$language=".var_export($language,true).";\n?>";
	creat_inc($lang_file,$str);
	msg('语言变量添加完成','?action=edit&lang='.$lang);
}

function lang_lang_edit(){
	global $lang,$id;
	if(empty($lang)||empty($id)){msg('<span style="color:red">参数传递错误，请重新操作</span>');}
	$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."lang_lang where id=".intval($id));
	$sql="select id,lang_cate from ".DB_PRE."lang_cate where lang='{$lang}'";
	$cate_rel=$GLOBALS['mysql']->fetch_asc($sql);
	include('template/admin_lang_lang_edit.html');
}

function save_lang_lang_edit(){
	global $lang,$id,$lang_cate,$lang_value;
	if(empty($lang)){msg('<span style="color:red">参数发生错误，请重新操作</span>');}
	if(empty($lang_cate)){msg('请选择分类');}
	$sql="update ".DB_PRE."lang_lang set lang_cate='{$lang_cate}',lang_value='{$lang_value}' where id=".intval($id);
	$GLOBALS['mysql']->query($sql);
	//写入缓存
	$sql="select lang_tag,lang_value from ".DB_PRE."lang_lang where lang='{$lang}' order by id desc";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	$language=array();
	if(!empty($rel)){
	foreach($rel as $k=>$v){
		$language[$v['lang_tag']]=$v['lang_value'];
	}
	}
	$lang_file=LANG_PATH.'lang_'.$lang.'.php';
	$str="<?php\n\$language=".var_export($language,true).";\n?>";
	creat_inc($lang_file,$str);
	msg('语言变量修改完成','?action=edit&lang='.$lang);
}
function del_lang_lang(){
	if(!check_purview('lang_lang')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $lang,$id;
	if(empty($lang)||empty($id)){msg('<span style="color:red">参数发生错误，请重新操作</span>');}
	$GLOBALS['mysql']->query("delete from ".DB_PRE."lang_lang where id=".intval($id));
	//写入缓存
	$sql="select lang_tag,lang_value from ".DB_PRE."lang_lang where lang='{$lang}' order by id desc";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	$language=array();
	if(!empty($rel)){
	foreach($rel as $k=>$v){
		$language[$v['lang_tag']]=$v['lang_value'];
	}
	}
	$lang_file=LANG_PATH.'lang_'.$lang.'.php';
	$str="<?php\n\$language=".var_export($language,true).";\n?>";
	creat_inc($lang_file,$str);
	msg('语言变量删除完成','?action=edit&lang='.$lang);
}

function lang_cate(){
	global $lang;
	include('template/admin_lang_cate.html');
}

function save_lang_cate(){
	global $lang,$lang_cate,$lang_cate_info;
	if(empty($lang)){msg('<span style="color:red">参数传递错误，请重新操作</span>');}
	if(empty($lang_cate)){msg('<span style="color:red">分类名称不能为空</span>');}
	$lang_cate=cn_substr($lang_cate,60);
	$lang_cate_info=cn_substr($lang_cate_info,250);
	$sql="insert into ".DB_PRE."lang_cate (lang_cate,lang_info,lang) values ('{$lang_cate}','{$lang_cate_info}','{$lang}')";
	$GLOBALS['mysql']->query($sql);
	msg('【'.$lang_cate.'】分类添加完成','?action=lang_cate_list&lang='.$lang);
}

function lang_cate_list(){
	global $lang;
	$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."lang_cate where lang='{$lang}' order by id desc");
	include('template/admin_lang_cate_list.html');
}

function lang_cate_edit(){
	global $lang,$id;
	if(empty($lang)||empty($id)){msg('<span style="color:red">参数传递错误,请重新操作</span>');}
	$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."lang_cate where id=".intval($id));
	include('template/admin_lang_cate_edit.html');
}

function save_cate_edit(){
	global $lang,$id,$lang_cate,$lang_cate_info;
	if(empty($lang)||empty($id)){msg('<span style="color:red">参数传递错误，请重新操作</span>');}
	if(empty($lang_cate)){msg('<span style="color:red">分类名称不能为空</span>');}
	$lang_cate=cn_substr($lang_cate,60);
	$lang_cate_info=cn_substr($lang_cate_info,250);
	$sql="update ".DB_PRE."lang_cate set lang_cate='{$lang_cate}',lang_info='{$lang_cate_info}' where id=".intval($id);
	$GLOBALS['mysql']->query($sql);
	msg('【'.$lang_cate.'】分类修改完成','?action=lang_cate_list&lang='.$lang);
}

function del_lang_cate(){
	global $lang,$id;
	if(empty($lang)||empty($id)){msg('<span style="color:red">参数传递错误，请重新操作</span>');}
	$num=$GLOBALS['mysql']->fetch_rows('select id from '.DB_PRE.'lang_lang where lang_cate='.intval($id));
	if($num){msg('<span style="color:red">请先删除该分类下的语言内容</span>');}
	$GLOBALS['mysql']->query("delete from ".DB_PRE."lang_cate where id=".intval($id));
	msg('分类删除完成','?action=lang_cate_list&lang='.$lang);
}

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

$page = new AdminLangPage;
$page->run();
?>
