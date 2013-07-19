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
$action=empty($action)?'admin':$action;
go_url($action);

function admin(){
	global $page;
	if(file_exists(DATA_PATH."cache/cache_admin_group.php")){
		include(DATA_PATH."cache/cache_admin_group.php");
	}
	$page=empty($page)?1:$page;
	$page_size=3;
	$page_num=($page-1)*$page_size;
	$total_num=$GLOBALS['mysql']->fetch_rows("select id from ".DB_PRE."admin");
	$total_page=ceil($total_num/$page_size);
	$total_page=(!$total_page)?1:$total_page;
	$query='';
	$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."admin order by id desc limit ".$page_num.','.$page_size);
	include('template/admin_admin.html');
}
function add(){
	if(!check_purview('admin_manage')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	if(file_exists(DATA_PATH."cache/cache_admin_group.php")){
		include(DATA_PATH."cache/cache_admin_group.php");
	}
	include('template/admin_admin_add.html');
}
function admin_edit(){
	if(!check_purview('admin_manage')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id;
	if(empty($id)){
		msg('<span style="color:red">参数传递错误,请重新操作</span>');
	}
	$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."admin where id=".$id);
	$rel=$rel[0];
	if(file_exists(DATA_PATH."cache/cache_admin_group.php")){
		include(DATA_PATH."cache/cache_admin_group.php");
	}
	include('template/admin_admin_edit.html');
}
function save_admin_edit(){
	if(!check_purview('admin_manage')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id,$admin_password_ago,$admin_password,$admin_password_tow,$admin_nich,$admin_admin,$admin_purview,$admin_name,$admin_mail,$admin_tel,$is_disable;
	if(empty($id)){
		msg('<span style="color:red">参数传递错误,请重新操作</span>');
	}
	$rel=$GLOBALS['mysql']->fetch_asc('select admin_password,admin_purview from '.DB_PRE."admin where id=".$id);
	$password=isset($rel[0]['admin_password'])?$rel[0]['admin_password']:'';
	if(empty($password)){
		msg('<span style="color:red">参数错误,找不到原始密码</span>');
	}
	if(empty($admin_purview)){
		msg('<span style="color:red">请选择用户组</span>');
	}
	$rel_purview=isset($rel[0]['admin_purview'])?$rel[0]['admin_purview']:'';
	if($admin_purview!=1&&$rel_purview==1){
		$admin_num=$GLOBALS['mysql']->fetch_rows("select id from ".DB_PRE."admin where admin_purview=1");
		if($admin_num==1){err('<span style="color:red">请先添加一个超级管理员，才能修改该管理员</span>');}
	}
	$table=DB_PRE."admin";
	
	$ps_sql="";
	if(!empty($admin_password)||!empty($admin_password_tow)){
	if($admin_password!=$admin_password_tow){msg('<span style="color:red">输入的两次新密码不一样</span>');}
	if($password!=md5($admin_password_ago)){msg('<span style="color:red">输入的旧密码不正确</span>');}
	$admin_password=md5($admin_password);
	$ps_sql="admin_password='{$admin_password}',";
	}
	$sql="update {$table} set ".$ps_sql."admin_nich='{$admin_nich}',admin_purview={$admin_purview},admin_admin='{$admin_admin}',admin_mail='{$admin_mail}',admin_tel='{$admin_tel}',is_disable={$is_disable} where id={$id}";
	$GLOBALS['mysql']->query($sql);
	msg('修改成功','admin_admin.php');
	
}
function save_admin(){
	if(!check_purview('admin_manage')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $admin_name,$admin_password,$admin_password2,$admin_nich,$admin_purview,$admin_admin,$admin_mail,$admin_tel,$is_disable;
	if(strlen($admin_name)<3){
		msg('<span style="color:red">用户名长度必须大于3</span>');
	}
	if(strlen($admin_password)<3){
		msg('<span style="color:red">用户密码长度必须大于3</span>');
	}
	
	if(!check_str($admin_name,'/^[a-z0-9][a-z0-9]*$/')){
		msg('<span style="color:red">用户名必须由字母和数字组成</span>');
	}
	if(!check_str($admin_password,'/^[a-z0-9!@#$%][a-z0-9!@#$%]*$/')){
		msg('<span style="color:red">用户密码包含其它不允许的字符</span>');
	}
	if($admin_password!=$admin_password2){msg('<span style="color:red">两次密码不一样</span>');}
	if(empty($admin_nich)){
		msg('<span style="color:red">用户昵称不能为空</span>');
	}
	if(empty($admin_purview)){
		msg('<span style="color:red">请选择用户组</span>');
	}
	$table=DB_PRE."admin";
	$admin_password=md5($admin_password);
	$sql="insert into {$table} (admin_name,admin_password,admin_nich,admin_purview,admin_admin,admin_mail,admin_tel,is_disable) values ('{$admin_name}','{$admin_password}','{$admin_nich}',$admin_purview,'{$admin_admin}','{$admin_mail}','{$admin_tel}',{$is_disable})";
	$GLOBALS['mysql']->query($sql);
	msg('用户'.$admin_name.'添加成功');
}
function admin_del(){
	if(!check_purview('admin_manage')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id;
	if(empty($id)){msg('<span style="color:red">参数传递错误,请重新操作</span>');}
	$rel=$GLOBALS['mysql']->fetch_asc('select admin_purview,admin_name from '.DB_PRE."admin where id=".$id);
	$purview=isset($rel[0]['admin_purview'])?$rel[0]['admin_purview']:'';
	$user=isset($rel[0]['admin_name'])?$rel[0]['admin_name']:'';
	if($purview==1){
	$admin_num=$GLOBALS['mysql']->fetch_rows("select id from ".DB_PRE."admin where admin_purview=1");
	if($admin_num==1){err('<span style="color:red">请先添加一个超级管理员</span>');}
	}
	if($user==$_SESSION['admin']){msg('<span style="color:red">不能删除正在使用的管理员【'.$_SESSION['admin'].'】</span>');}
	$GLOBALS['mysql']->query("delete from ".DB_PRE."admin where id=".$id);
	msg('<span style="color:red">管理用户删除成功</span>');
}

function admin_group(){
if(file_exists(DATA_PATH."cache/cache_admin_group.php")){
		include(DATA_PATH."cache/cache_admin_group.php");
	}
	include('template/admin_admingroup.html');
}
function add_admin_group(){
	if(!check_purview('admin_group')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	include('template/admin_admingroup_ad.html');
}
function save_admingroup(){
if(!check_purview('admin_group')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $q,$admin_group_name,$admin_group_info,$c_all,$is_disable;
	if(empty($admin_group_name)||strlen($admin_group_name)<1){
		msg('<span style="color:red">管理员分组名不能为空</span>');
	}
	if(empty($q)&&empty($c_all)){
		msg('<span style="color:red">请选择组所拥有的权限</span>');
	}
	$p_str=empty($q)?'':$q;
	if(is_array($p_str)){
	$p_str=implode(',',$p_str);
	}
	if(!empty($c_all)){
		$p_str='all_purview';
	}
	$sql="insert into ".DB_PRE."admin_group (admin_group_name,admin_group_info,admin_group_purview,is_disable) values ('".$admin_group_name."','".$admin_group_info."','".$p_str."',".$is_disable.")";
	$GLOBALS['mysql']->query($sql);
	$GLOBALS['cache']->cache_admin_group();
	msg('管理分组添加成功','admin_admin.php?action=admin_group');
}

function cache_admin_group(){
	$GLOBALS['cache']->cache_admin_group();
	msg("管理员分组缓存完成");
}
function admin_group_edit(){
	if(!check_purview('admin_group')){msg('操作失败,你的权限不足!');}
	global $id;
	if(empty($id)){
		msg('<span style="color:red">参数传递错误,请重新操作</span>');
	}
	if(file_exists(DATA_PATH."cache/cache_admin_group.php")){
		include(DATA_PATH."cache/cache_admin_group.php");
	}
	if(empty($admin_group)){
		msg('<span style="color:red">还没有添加分组</span>','admin_admin.php?action=add_admin_group');
	}
	foreach($admin_group as $k=>$v){
		if($v['id']==$id){
			$arr[]=$v;
		}
	}
	$arr=$arr[0];
	$p=explode(',',$arr['admin_group_purview']);
	include('template/admin_admingroup_edit.html');
}
function save_admingroup_edit(){
	if(!check_purview('admin_group')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id,$q,$admin_group_name,$admin_group_info,$c_all,$is_disable;
	if(empty($admin_group_name)||strlen($admin_group_name)<1){
		msg('<span style="color:red">管理员分组名不能为空</span>');
	}
	if(empty($q)&&empty($c_all)){
		msg('<span style="color:red">请选择组所拥有的权限</span>');
	}
	$p_str=empty($q)?'':$q;
	if(is_array($p_str)){
	$p_str=implode(',',$p_str);
	}
	if(!empty($c_all)){
		$p_str='all_purview';
	}
	$sql="update ".DB_PRE."admin_group set admin_group_name='".$admin_group_name."',admin_group_info='".$admin_group_info."',admin_group_purview='".$p_str."',is_disable=".$is_disable." where id=".$id;
	$GLOBALS['mysql']->query($sql);
	$GLOBALS['cache']->cache_admin_group();
	msg('管理分组修改成功','admin_admin.php?action=admin_group');
}

function admin_group_del(){
	if(!check_purview('admin_group')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id;
	if(empty($id)){
		msg('<span style="color:red">参数传递错误,请重新操作</span>');
	}
	$GLOBALS['mysql']->query("delete from ".DB_PRE."admin_group where id=".$id);
	$GLOBALS['cache']->cache_admin_group();
	msg('管理分组删除成功','admin_admin.php?action=admin_group');
}

?>
