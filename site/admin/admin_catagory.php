<?php
/**
 * $Author: BEESCMS $
 * ============================================================================
 * 网站地址: http://www.beescms.com
 * 您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
*/

define('IN_CMS','true');
include('init.php');
$action=isset($action)?$action:'catagory';
$lang=isset($lang)?$lang:get_lang_main();
if(file_exists(DATA_PATH.$lang.'_info.php')){include(DATA_PATH.$lang.'_info.php');}
$parent=isset($parent)?$parent:0;
go_url($action);

function catagory(){
	global $lang,$parent;
	
	$file_path=DATA_PATH.'cache_cate/cate_list_'.$lang.'.php';
	if(file_exists($file_path)){
		include($file_path);
	}
	include('template/admin_catagory.html');
}

function category_add(){
	if(!check_purview('cate_create')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $lang,$_confing,$parent;
	if(file_exists(DATA_PATH."cache_channel/cache_channel_all.php")){include(DATA_PATH."cache_channel/cache_channel_all.php");}
	include('template/admin_catagory_add.html');
}

function add(){
	if(!check_purview('cate_create')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $lang,$cate_nav,$cate_is_open;
	if(!isset($GLOBALS['add_category'])){
		msg('<span style="color:red">请从表单提交</span>','admin_catagory.php');
	}
	if(empty($GLOBALS['cate_channel'])||!isset($GLOBALS['cate_channel'])){
		msg('<span style="color:red">内容模型不能为空,请选择内容模型</span>');
	}
	if(empty($GLOBALS['cate_name'])){
		msg('<span style="color:red">栏目名称不能为空</span>');
	}
	if(!check_str($GLOBALS['cate_fold_name'],'/^[a-z]*[a-z]$/')){
		msg('<span style="color:red">请使用字母作为栏目目录名</span>');
	}
	//$cate_parent=isset($GLOBALS['cate_parent'])?$GLOBALS['parent']:0;
	$cate_fold_name=$GLOBALS['cate_fold_name'];
	if($GLOBALS['parent']!=0){
		$p_fold=$GLOBALS['mysql']->fetch_array('select cate_fold_name from '.DB_PRE.'category where id='.$GLOBALS['parent']);
		if($p_fold==""){
			msg('<span style="color:red">父级栏目不存在</span>','admin_catagory.php?lang='.$lang);
		}
		$cate_fold_name=$p_fold[0]['cate_fold_name'].'/'.$cate_fold_name;
	}
	$cate_nav=empty($cate_nav)?'':implode(',',$cate_nav);
	$cate_order=isset($GLOBALS['cate_order'])?intval($GLOBALS['cate_order']):0;
	$cate_html=empty($GLOBALS['cate_html'])?1:$GLOBALS['cate_html'];
	$sql="insert into ".DB_PRE."category (cate_name,cate_mb_is,cate_hide,cate_channel,cate_fold_name,cate_order,cate_tpl,cate_tpl_list,cate_tpl_content,cate_title_seo,cate_key_seo,cate_info_seo,lang,cate_parent,cate_html,cate_nav,cate_url,cate_is_open) values ('".$GLOBALS['cate_name']."',0,".intval($GLOBALS['cate_hide']).",".intval($GLOBALS['cate_channel']).",'".$cate_fold_name."',".intval($GLOBALS['cate_order']).",".intval($GLOBALS['cate_tpl']).",'".$GLOBALS['cate_tpl_list']."','".$GLOBALS['cate_tpl_content']."','".$GLOBALS['cate_title_seo']."','".$GLOBALS['cate_key_seo']."','".$GLOBALS['cate_info_seo']."','".$GLOBALS['lang']."',".$GLOBALS['parent'].",".$cate_html.",'".$cate_nav."','".$GLOBALS['cate_url']."',".$cate_is_open.")";
	$GLOBALS['mysql']->query($sql);
	//栏目缓存
	$GLOBALS['cache']->cache_category($GLOBALS['parent'],$GLOBALS['lang']);
	cache_channel_category($GLOBALS['lang']);
	//更新栏目列表
	$sql="select c.id,c.cate_channel,c.is_content,c.cate_url,c.cate_is_open,c.cate_html,c.cate_nav,c.cate_fold_name,c.cate_order,c.cate_hide,c.cate_tpl,c.cate_name,c.lang,c.cate_parent,COUNT(s.id) as haschild from ".DB_PRE."category as c left join ".DB_PRE."category as s on c.id=s.cate_parent where c.lang='".$GLOBALS['lang']."' group by c.id order by c.cate_order,c.id desc";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	$str="<?php\n\$cate_list=".var_export($rel,true).";\n?>";
	$file=DATA_PATH.'cache_cate/cate_list_'.$GLOBALS['lang'].'.php';
	creat_inc($file,$str);
	create_nav_xml($GLOBALS['lang']);
	$GLOBALS['cache']->cache_category_all();
	msg('栏目添加成功','?action=catagory&lang='.$lang);
}

function cache_cate(){
	$GLOBALS['cache']->cache_category_all();
	$GLOBALS['cache']->cache_category($GLOBALS['parent'],$GLOBALS['lang']);
	$GLOBALS['cache']->cache_category_child(0,$GLOBALS['lang']);
	cache_channel_category($GLOBALS['lang']);
	//更新栏目列表
	$sql="select c.id,c.cate_channel,c.cate_fold_name,c.cate_nav,c.cate_is_open,c.cate_html,c.cate_url,c.cate_order,c.cate_hide,c.cate_tpl,c.cate_name,c.lang,c.cate_parent,c.is_content,COUNT(s.id) as haschild from ".DB_PRE."category as c left join ".DB_PRE."category as s on c.id=s.cate_parent where c.lang='".$GLOBALS['lang']."' group by c.id order by c.cate_order,c.id desc";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	$str="<?php\n\$cate_list=".var_export($rel,true).";\n?>";
	$file=DATA_PATH.'cache_cate/cate_list_'.$GLOBALS['lang'].'.php';
	creat_inc($file,$str);
	create_nav_xml($GLOBALS['lang']);
		msg('栏目缓存更新完成');
}

function child(){
	if(!check_purview('cate_create')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $lang,$_confing,$channel_id;
	if(empty($channel_id)){err('<span style="color:red">参数传递错误,请重新操作</span>');}
	if(file_exists(DATA_PATH.'cache_channel/cache_channel_all.php')){include(DATA_PATH."cache_channel/cache_channel_all.php");}
	if(!empty($channel)){
		foreach($channel as $k=>$v){
			if($v['id']==$channel_id){
				$mark=$v['channel_mark'];
			}
		}
	}
	include('template/admin_category_child.html');
}

function xg(){
   if(!check_purview('cate_edit')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id,$lang,$parent,$_confing;
	if(!isset($id) || $id==0){
		msg('<span style="color:red">参数传递错误</span>','admin_catagory.php');
	}
	$cate_path=DATA_PATH.'cache_cate/cache_category'.$parent.'_'.$lang.'.php';
	if(!file_exists($cate_path)){
		$GLOBALS['cache']->cache_category($parent,$lang);
	}
	include($cate_path);
	foreach($category as $key=>$value){
		if($value['id']==$id){
			$arr[]=$category[$key];
			break;
		}
	}
	if(file_exists(DATA_PATH.'cache_channel/cache_channel_all.php')){include(DATA_PATH."cache_channel/cache_channel_all.php");}
	include('template/admin_category_xg.html');
}

function save_xg(){
	if(!check_purview('cate_edit')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id,$lang,$_confing,$cate_nav,$cate_is_open;
	if(!isset($GLOBALS['xg_category'])){
		msg('<span style="color:red">请从表单提交</span>','admin_catagory.php');
	}
	if(!isset($id) || $id==0){
		msg('<span style="color:red">参数传递错误</span>','admin_catagory.php');
	}
	if(empty($GLOBALS['cate_name'])){
		msg('<span style="color:red">栏目名称不能为空</span>');
	}
	$cate_nav=empty($cate_nav)?'':implode(',',$cate_nav);
	$cate_html=empty($GLOBALS['cate_html'])?1:$GLOBALS['cate_html'];
	$sql="update ".DB_PRE."category set cate_name='".$GLOBALS['cate_name']."',cate_mb_is=0,cate_hide=".intval($GLOBALS['cate_hide']).",cate_channel=".intval($GLOBALS['cate_channel']).",cate_order=".intval($GLOBALS['cate_order']).",cate_tpl=".intval($GLOBALS['cate_tpl']).",cate_tpl_index='',cate_tpl_list='".$GLOBALS['cate_tpl_list']."',cate_tpl_content='".$GLOBALS['cate_tpl_content']."',cate_title_seo='".$GLOBALS['cate_title_seo']."',cate_key_seo='".$GLOBALS['cate_key_seo']."',cate_info_seo='".$GLOBALS['cate_info_seo']."',cate_nav='".$cate_nav."',cate_html=".$cate_html.",cate_url='".$GLOBALS['cate_url']."',cate_is_open=".$cate_is_open." where id=".$id." and lang='".$lang."'";
	$GLOBALS['mysql']->query($sql);
	$GLOBALS['cache']->cache_category($GLOBALS['parent'],$GLOBALS['lang']);
	//更新栏目列表
	$sql="select c.id,c.cate_channel,c.is_content,c.cate_url,c.cate_is_open,c.cate_html,c.cate_nav,c.cate_fold_name,c.cate_order,c.cate_hide,c.cate_tpl,c.cate_name,c.lang,c.cate_parent,COUNT(s.id) as haschild from ".DB_PRE."category as c left join ".DB_PRE."category as s on c.id=s.cate_parent where c.lang='".$GLOBALS['lang']."' group by c.id order by c.cate_order,c.id desc";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	$str="<?php\n\$cate_list=".var_export($rel,true).";\n?>";
	$file=DATA_PATH.'cache_cate/cate_list_'.$GLOBALS['lang'].'.php';
	creat_inc($file,$str);
	create_nav_xml($GLOBALS['lang']);
	$GLOBALS['cache']->cache_category_all();
	msg('栏目修改成功','?lang='.$lang);
}

function del(){
   if(!check_purview('cate_del')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id,$lang,$parent;
	//判断是否有内容
	$has_content=$GLOBALS['mysql']->fetch_rows("select id from ".DB_PRE."maintb where category=".$id);
	if($has_content){msg('<span style="color:red">请先删除该栏目下的内容</span>');}
	del_cate_child($id,$lang);
	$GLOBALS['mysql']->query('delete from '.DB_PRE.'category where cate_parent='.$id." and lang='".$lang."'");
	$GLOBALS['mysql']->query('delete from '.DB_PRE.'category where id='.$id." and lang='".$lang."'");
	if(file_exists(DATA_PATH.'cache_cate/cache_category'.$parent.'_'.$lang.'.php')){
				unlink(DATA_PATH.'cache_cate/cache_category'.$parent.'_'.$lang.'.php');
			}
	$GLOBALS['cache']->cache_category($parent,$lang);
	$GLOBALS['cache']->cache_category_child(0,$lang);
	//更新栏目列表
	$sql="select c.id,c.cate_channel,c.is_content,c.cate_url,c.cate_is_open,c.cate_nav,c.cate_html,c.cate_fold_name,c.cate_hide,c.cate_tpl,c.cate_order,c.cate_name,c.lang,c.cate_parent,COUNT(s.id) as haschild from ".DB_PRE."category as c left join ".DB_PRE."category as s on c.id=s.cate_parent where c.lang='".$GLOBALS['lang']."' group by c.id order by c.cate_order,c.id desc";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	$str="<?php\n\$cate_list=".var_export($rel,true).";\n?>";
	$file=DATA_PATH.'cache_cate/cate_list_'.$GLOBALS['lang'].'.php';
	creat_inc($file,$str);
	create_nav_xml($GLOBALS['lang']);
	$GLOBALS['cache']->cache_category_all();
	msg("成功删除栏目【id:{$id}】",'admin_catagory.php?lang='.$lang);
}

//移动栏目
function move_cate(){
	if(!check_purview('cate_move')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $parent,$cate,$lang;
	if(file_exists(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php')){
		include(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php');
	}
	if(!empty($cate_list)){
		foreach($cate_list as $k=>$v){
			if($cate==$v['id']){$cate_name=$v['cate_name'];unset($cate_list[$k]);}
			//break;
		}
	}
	include('template/admin_category_move.html');
}

function save_move(){
	if(!check_purview('cate_move')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $cate,$parent,$lang;
	if(empty($cate)){err('<span style="color:red">参数传递错误,请重新操作</span>');}
	$parent_ago=$GLOBALS['mysql']->get_row("select cate_parent from ".DB_PRE."category where id=".intval($cate));
	$sql="update ".DB_PRE."category set cate_parent={$parent} where id={$cate}";
	$GLOBALS['mysql']->query($sql);
	
	//更新栏目列表
	$sql="select c.id,c.cate_channel,c.is_content,c.cate_url,c.cate_is_open,c.cate_nav,c.cate_html,c.cate_fold_name,c.cate_hide,c.cate_tpl,c.cate_order,c.cate_name,c.lang,c.cate_parent,COUNT(s.id) as haschild from ".DB_PRE."category as c left join ".DB_PRE."category as s on c.id=s.cate_parent where c.lang='".$GLOBALS['lang']."' group by c.id order by c.cate_order,c.id desc";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	$str="<?php\n\$cate_list=".var_export($rel,true).";\n?>";
	$file=DATA_PATH.'cache_cate/cate_list_'.$GLOBALS['lang'].'.php';
	creat_inc($file,$str);
	create_nav_xml($GLOBALS['lang']);
	$GLOBALS['cache']->cache_category_all();
	$GLOBALS['cache']->cache_category($parent_ago,$lang);
	$GLOBALS['cache']->cache_category($parent,$lang);
	
	msg('栏目移动成功','?lang='.$lang);
	
}
?>
