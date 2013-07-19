<?php
chdir(dirname(__FILE__));
require_once('../configs/path.inc.php');
require_once('/configs/config.db.php');
require_once('/include/Page.class.php');

/*/
define('IN_CMS','true');
include('init.php');
$action=isset($action)?$action:'book_list';
$lang=isset($lang)?$lang:get_lang_main();
if($action=='made'){
	$sql="select*from ".DB_PRE."book_info where id=1";
	$rel=$mysql->fetch_asc($sql);
	$book_pos=(isset($rel[0]['book_pos'])&&!empty($rel[0]['book_pos']))?explode(',',$rel[0]['book_pos']):array('0');
	include('template/admin_book_info.html');
}
//处理配置
elseif($action=='save_book_info'){
	$is_book=intval($_POST['is_book']);
	$book_pos=$_POST['book_pos'];
	$book_verify=intval($_POST['book_verify']);
	$pos=is_array($book_pos)?implode(',',$book_pos):'';
	$sql="update ".DB_PRE."book_info set is_book='{$is_book}',book_pos='{$pos}',book_verify='{$book_verify}' where id=1";
	$mysql->query($sql);
	msg('配置完成','?action=made');	
}
//留言列表
elseif($action=='book_list'){
	include('template/admin_book_list.html');
}
//审核留言,全部审核
elseif($action=='verify'){
	$all=$_POST['all'];
	if(empty($all)){die("<script type=\"text/javascript\">alert('请选择需要审核的内容');history.go(-1);</script>");}
	foreach($all as $k=>$v){
		$sql="update ".DB_PRE."book set verify=1 where id=".intval($v);
		$mysql->query($sql);
	}
	die("<script type=\"text/javascript\">alert('审核完成');location.href='?action=book_list&lang=".$lang."';</script>");
}
//显示留言
elseif($action=='reply'){
	$id=$_REQUEST['id'];
	if(empty($id)){die("<script type=\"text/javascript\">alert('参数发生错误，请重新操作');history.go(-1);</script>");}
	$sql="select*from ".DB_PRE."book where id=".$id;
	$rel=$mysql->fetch_asc($sql);
	include('template/admin_book_reply.html');
}
//回复内容
elseif($action=='save_reply'){
	$id=$_POST['id'];
	if(empty($id)){die("<script type=\"text/javascript\">alert('参数发生错误，请重新操作');history.go(-1);</script>");}
	$reply=$_POST['reply'];
	if(empty($reply)){die("<script type=\"text/javascript\">alert('回复内容不能为空');history.go(-1);</script>");}
	$sql="update ".DB_PRE."book set reply='".$reply."' where id=".$id;
	$mysql->query($sql);
	die("<script type=\"text/javascript\">alert('回复完成');location.href='?action=book_list&lang=".$lang."';</script>");
}
//删除留言，单个删除
elseif($action=='del'){
	$id=$_GET['id'];
	if(empty($id)){die("<script type=\"text/javascript\">alert('参数发生错误，请重新操作');history.go(-1);</script>");}
	$sql="delete from ".DB_PRE."book where id=".$id;
	$mysql->query($sql);
	msg('删除完成','?lang='.$lang);
}
//删除多选
elseif($action=='del_all'){
	$id=$_POST['all'];
	if(empty($id)){msg('请选择需要删除的内容','?lang='.$lang);}
	foreach($id as $k=>$v){
		$sql="delete from ".DB_PRE."book where id=".$v;
		$mysql->query($sql);
	}
	msg("所选内容已经删除",'?lang='.$lang);
}
//*/
class AdminBookPage extends AdminPage{
	function __construct(){
		parent::__construct('admin_book_info.html');
	}
	
	function display(){
		parent::display();
	}
}
$page = new AdminBookPage();
$page->run();
?>
