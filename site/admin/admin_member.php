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
$action=empty($action)?'member':$action;
go_url($action);

function member(){
	global $page;
	if(file_exists(DATA_PATH."cache/cache_member_group.php")){
		include(DATA_PATH."cache/cache_member_group.php");
	}
	$page=empty($page)?1:$page;
	$page_size=20;
	$page_num=($page-1)*$page_size;
	$total_num=$GLOBALS['mysql']->fetch_rows("select id from ".DB_PRE."member");
	$total_page=ceil($total_num/$page_size);
	$total_page=(!$total_page)?1:$total_page;
	$query='';
	$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."member order by id desc limit ".$page_num.','.$page_size);
	include('template/admin_member.html');
}
function add(){
	if(!check_purview('user_manage')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	if(file_exists(DATA_PATH."cache/cache_member_group.php")){
		include(DATA_PATH."cache/cache_member_group.php");
	}
	include('template/admin_member_add.html');
}
function member_edit(){
	if(!check_purview('user_manage')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id;
	if(empty($id)){
		msg('<span style="color:red">参数传递错误,请重新操作</span>');
	}
	$arr=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."member where id=".$id);
	$arr=$arr[0];
	if(empty($arr)){
		msg('<span style="color:red">不存在相关内容,可能已经删除</span>');
	}
	if(file_exists(DATA_PATH."cache/cache_member_group.php")){
		include(DATA_PATH."cache/cache_member_group.php");
	}
	include('template/admin_member_edit.html');
}
function save_member_edit(){
	if(!check_purview('user_manage')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id,$member_password,$member_password_tow,$member_nich,$member_user,$member_purview,$member_name,$member_mail,$member_tel,$is_disable;
	if(empty($id)){
		msg('<span style="color:red">参数传递错误,请重新操作</span>');
	}
	if(empty($member_purview)){
		msg('<span style="color:red">请选择用户组</span>');
	}
	$table=DB_PRE."member";
	$ps_sql="";
	if(!empty($member_password)||!empty($member_password_tow)){
	if($member_password!=$member_password_tow){msg('<span style="color:red">输入的两次新密码不一样</span>');}
	$member_password=md5($member_password);
	$ps_sql="member_password='{$member_password}',";
	}
	$sql="update {$table} set ".$ps_sql."member_nich='{$member_nich}',member_purview={$member_purview},member_name='{$member_name}',member_tel='{$member_tel}',is_disable={$is_disable} where id={$id}";
	$GLOBALS['mysql']->query($sql);
	msg('用户修改成功','admin_member.php');
}
function save_member(){
	if(!check_purview('user_manage')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $member_name,$member_password,$member_nich,$member_purview,$member_user,$member_mail,$member_tel,$is_disable;
	if(strlen($member_user)<3){
		msg('<span style="color:red">用户名长度必须大于3</span>');
	}
	$is_member=$GLOBALS['mysql']->fetch_rows('select id from '.DB_PRE."member where member_user='".$member_user."'");
	if($is_member){msg('<span style="color:red">登陆用户名【'.$member_user.'】已经存在，请更换</span>');}
	if(strlen($member_password)<3){
		msg('<span style="color:red">用户密码长度必须大于3</span>');
	}
	if(!check_str($member_user,'/^[a-z0-9][a-z0-9]*$/')){
		msg('<span style="color:red">用户名必须由字母和数字组成</span>');
	}
	if(!check_str($member_password,'/^[a-z0-9!@#$%][a-z0-9!@#$%]*$/')){
		msg('<span style="color:red">用户密码包含其它不允许的字符</span>');
	}
	
	if(empty($member_nich)){
		msg('<span style="color:red">用户昵称不能为空</span>');
	}
	if(empty($member_purview)){
		msg('<span style="color:red">请选择用户组</span>');
	}
	if(!check_str($member_mail,'/^[0-9a-z]+@(([0-9a-z]+)[.])+[a-z]{2,3}$/')){
		msg('<span style="color:red">邮箱不正确</span>');
	}
	$is_mail=$GLOBALS['mysql']->fetch_rows('select id from '.DB_PRE."member where member_mail='".$member_mail."'");
	if($is_mail){msg('<span style="color:red">已经存在【'.$member_mail.'】邮箱，请更换</span>');}
	$table=DB_PRE."member";
	$member_password=md5($member_password);
	$sql="insert into {$table} (member_name,member_password,member_nich,member_purview,member_user,member_mail,member_tel,is_disable,member_addtime) values ('{$member_name}','{$member_password}','{$member_nich}',$member_purview,'{$member_user}','{$member_mail}','{$member_tel}',{$is_disable},".time().")";
	$GLOBALS['mysql']->query($sql);
	msg('会员"'.$member_name.'"添加成功','admin_member.php');
}
function member_group(){
	if(file_exists(DATA_PATH."cache/cache_member_group.php")){
		include(DATA_PATH."cache/cache_member_group.php");
	}
	include('template/admin_membergroup.html');
}
function member_group_add(){
	if(!check_purview('user_group')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	include('template/admin_membergroup_add.html');
}
function save_membergroup(){
	if(!check_purview('user_group')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $member_group_name,$member_group_info,$is_disable;
	if(empty($member_group_name)){
		msg('<span style="color:red">组名不能为空</span>');
	}
	$table=DB_PRE."member_group";
	$sql="insert into {$table} (member_group_name,member_group_info,is_disable) values ('{$member_group_name}','{$member_group_info}',{$is_disable})";
	$GLOBALS['mysql']->query($sql);
	$GLOBALS['cache']->cache_member_group();
	msg('会员组"'.$member_group_name.'"添加成功','?action=member_group');
}
function membergroup_edit(){
	if(!check_purview('user_group')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id;
	if(empty($id)){
		msg('<span style="color:red">参数提交错误,请重新操作</span>');
	}
	if(file_exists(DATA_PATH."cache/cache_member_group.php")){
		include(DATA_PATH."cache/cache_member_group.php");
	}
	include('template/admin_membergroup_edit.html');
}
function save_membergroup_edit(){
	if(!check_purview('user_group')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id,$member_group_name,$member_group_info,$is_disable;
	if(empty($id)){
		msg('<span style="color:red">参数传递错误,请重新操作</span>');
	}
	if(empty($member_group_name)){
		msg('<span style="color:red">组名不能为空</span>');
	}
	$table=DB_PRE."member_group";
	$sql="update {$table} set member_group_name='{$member_group_name}',member_group_info='{$member_group_info}',is_disable={$is_disable} where id={$id}";
	$GLOBALS['mysql']->query($sql);
	$GLOBALS['cache']->cache_member_group();
	msg('会员组"'.$member_group_name.'"修改成功','admin_member.php?action=member_group');
	
}

function membergroup_del(){
	global $id;
	$id=isset($id)?$id:'';
	if(empty($id)){msg('<span style="color:red">参数发生错误，请重新操作</span>','?action=member_group');}
	$GLOBALS['mysql']->query('delete from '.DB_PRE.'member_group where id='.$id);
	$GLOBALS['cache']->cache_member_group();
	msg('会员组删除成功');
}
function member_del(){
	if(!check_purview('user_manage')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id;
	if(empty($id)){
		msg('<span style="color:red">参数传递错误,请重新操作</span>');
	}
	if($id==1){msg('<span style="color:red">该会员组不能删除</span>');}
	$GLOBALS['mysql']->query("delete from ".DB_PRE."member where id=".$id);
	msg("会员已经删除",'admin_member.php');
}
function cache_member_group(){
	$GLOBALS['cache']->cache_member_group();
	msg('缓存更新完成');
}

function show(){
	if(!check_purview('user_manage')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id;
	if(empty($id)){msg("<span style=\"color:red\">参数发生错误</span>");}
	if(file_exists(DATA_PATH."cache/cache_member_group.php")){
		include(DATA_PATH."cache/cache_member_group.php");
	}
	$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."member where id={$id}");
	include('template/admin_member_show.html');
    unset($rel);
}
?>
