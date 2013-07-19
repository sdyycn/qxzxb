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
$action=empty($action)?'action':$action;
go_url($action);
function action(){
	echo '没有参数';
}

function lang_tag(){
	global $value;
	if(check_str($value,'/[^0-9a-z_]+/')||empty($value)){
		echo "<span class='err'>只能使用小写字母或数字</span>";
		exit;
	}
	$sql="select id from ".DB_PRE."lang where lang_tag='".$value."'";
	$num=$GLOBALS['mysql']->fetch_rows($sql);
	$str=(empty($num))?"<span class='ld_ok'>{$value}可以使用</span>":"<span class='err'>{$value}已经存在,请更换</span>";
	echo $str;
}
//排序
function order(){
	global $value,$table,$field,$id,$lang;
	$sql="update ".DB_PRE."{$table} set {$field}=".intval($value)." where id={$id}";
	$GLOBALS['mysql']->query($sql);
	//更新缓存
		if($table=="lang"){	
			$sql="select*from ".DB_PRE."{$table} order by {$field} desc";
			$rel=$GLOBALS['mysql']->fetch_asc($sql);
		$cache_file=DATA_PATH.'cache/lang_cache.php';
		$str="<?php\n\$lang_cache=".var_export($rel,true).";\n?>";
		}elseif($table=="channel"){
			$sql="select*from ".DB_PRE."{$table} order by {$field} desc";
			$rel=$GLOBALS['mysql']->fetch_asc($sql);
			$cache_file=DATA_PATH.'cache_channel/cache_channel_all.php';
			$str="<?php\n\$channel=".var_export($rel,true).";\n?>";
		}
		creat_inc($cache_file,$str);
	
}

//判断频道标示
function check_channel(){
	global $value;
	if(check_str($value,'/[^0-9a-z_]+/')||empty($value)){
		echo "<span class='err'>只能使用小写字母或数字</span>";
		exit;
	}
	$sql="select id from ".DB_PRE."channel where channel_mark='{$value}'";
	$num=$GLOBALS['mysql']->fetch_rows($sql);
	$str=(empty($num))?"<span class='ld_ok'>{$value}可以使用</span>":"<span class='err'>{$value}已经存在,请更换</span>";
	echo $str;
}

function check_table(){
	global $value;
	if(check_str($value,'/[^0-9a-z_]+/')||empty($value)){
		echo "<span class='err'>只能使用小写字母或数字</span>";
		exit;
	}
	$sql="show tables";
	$tables=$GLOBALS['mysql']->show_tables();
	$table=DB_PRE.$value;
	if(in_array($table,$tables)){
		$num=1;
	}
	$str=(empty($num))?"<span class='ld_ok'>{$value}可以使用</span>":"<span class='err'>{$value}已经存在,请更换</span>";
	echo $str;
}

//开启关闭
function is_show(){
	if(!check_purview('pannel_edit')||!check_purview('form_edit')){return false;}
	global $value,$id,$table,$field,$lang,$order;
	$value=empty($value)?1:0;
	$sql="update ".DB_PRE."{$table} set {$field}=".intval($value)." where id={$id}";
	$GLOBALS['mysql']->query($sql);
	//更新缓存
	if($table=="channel"){
			$sql="select*from ".DB_PRE."{$table} order by {$order} desc";
			$rel=$GLOBALS['mysql']->fetch_asc($sql);
			$cache_file=DATA_PATH.'cache_channel/cache_channel_all.php';
			$str="<?php\n\$channel=".var_export($rel,true).";\n?>";
			creat_inc($cache_file,$str);
	}elseif($table=='form'){
			$form_file=DATA_PATH.'cache_form/form.php';
			$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."form order by id desc");
			$cache_str="<?php\n\$form=".var_export($rel,true).";\n?>";
			cache_write($form_file,$cache_str);
	}
	
	if(empty($value)){
	$class="qi_yes";
	$title="开启";
	}else{
	$class="qi_no";
	$title="关闭";
	}
	$data="<span onclick=\"click_show(this,'{$value}','{$id}','channel','is_disable','{$lang}','channel_order');\" class=\"{$class}\" title=\"{$title}\">&nbsp;</span>";
	echo $data;
}

//删除图片
function del_pic(){
	global $value;
	$file=CMS_PATH.'upload/'.$value;
	@unlink($file);
	echo "图片成功删除";
}
?>
