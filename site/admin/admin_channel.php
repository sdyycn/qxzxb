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
$action=isset($action)?$action:'channel';
$lang=isset($lang)?$lang:get_lang_main();
go_url($action);

function channel(){
	$fl_path=DATA_PATH.'cache_channel/cache_channel_all.php';
	include('template/admin_channel.html');
}

function add(){
	if(!check_purview('pannel_create')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	include('template/admin_channel_ad.html');
}

function cache(){
	if(!$GLOBALS['cache']->channel_cache($GLOBALS['lang']) || !$GLOBALS['cache']->cache_fields()){
		msg("缓存更新失败，请先添加模型");	
	}
	msg("模型缓存完成");
}

function save_channel(){
	if(!check_purview('pannel_create')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	if(!isset($GLOBALS['submit'])){
		msg('<span style="color:red">请从表单提交</span>');
	}
	if(empty($GLOBALS['channel_name'])){
		msg('<span style="color:red">模型名不能为空</span>');
	}
	if(!check_str($GLOBALS['channel_mark'],'/^[a-z0-9][a-z0-9]*$/')){
		msg('<span style="color:red">模型标识只能是字母或数字</span>');
	}
	if(!isset($GLOBALS['channel_table'])||empty($GLOBALS['channel_table'])){
		msg('<span style="color:red">数据表不能为空</span>');
	}
	if($GLOBALS['mysql']->fetch_rows("select id from ".DB_PRE."channel where channel_mark='".$GLOBALS['channel_mark']."'")){
		msg('<span style="color:red">在同一种语言中已经存在相同的'.$GLOBALS['channel_mark']."标识</span>");
	}
	$channel_order=empty($GLOBALS['channel_order'])?10:$GLOBALS['channel_order'];
	$tables=$GLOBALS['mysql']->show_tables();
	if(in_array(DB_PRE.$GLOBALS['channel_table'],$tables)){
		msg('<span style="color:red">数据表'.$GLOBALS['channel_table'].'已经存在,请更改</span>');
	}
	$sql="insert into ".DB_PRE."channel (channel_name,channel_mark,channel_table,is_disable,is_member,is_verify,channel_order,is_del) values ('".$GLOBALS['channel_name']."','".$GLOBALS['channel_mark']."','".$GLOBALS['channel_table']."',".intval($GLOBALS['is_disable']).",".intval($GLOBALS['is_member']).",".intval($GLOBALS['is_verify']).','.$channel_order.",{$GLOBALS['is_del']})";
	$GLOBALS['mysql']->query($sql);
	$table=$GLOBALS['channel_table'];
	$field="id mediumint(8) not null,primary key (id)";
	$GLOBALS['mysql']->create_tb($table,$field);
	$GLOBALS['cache']->channel_cache();
	msg('模型添加成功','admin_channel.php');
}

function channel_xg(){
	if(!check_purview('pannel_edit')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id;
	if(file_exists(DATA_PATH."cache_channel/cache_channel_all.php")){
		include(DATA_PATH."cache_channel/cache_channel_all.php");
	}
	if(!empty($channel)){
	foreach($channel as $key=>$value){
		if($value['id']==$id){
			$arr[]=$value;
		}
	}
	}
	include('template/admin_channel_xg.html');
	
}

function save_xg_channel(){
	if(!check_purview('pannel_edit')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id,$submit;
	if(!isset($submit)){
		msg('<span style="color:red">请从表单提交</span>');
	}
	if(!isset($id)||empty($id)){
		msg('<span style="color:red">参数传递错误,请重新操作</span>','admin_channel.php');
	}
	if(empty($GLOBALS['channel_name'])){
		msg('<span style="color:red">模型名不能为空</span>');
	}
	$is_del=($GLOBALS['is_del']=="")?"":",is_del=".$GLOBALS['is_del'];
	$channel_order=empty($GLOBALS['channel_order'])?10:$GLOBALS['channel_order'];
	$sql="update ".DB_PRE."channel set channel_name='".$GLOBALS['channel_name']."',is_disable=".$GLOBALS['is_disable'].",is_member=".$GLOBALS['is_member'].",channel_order=".$channel_order.",is_verify=".$GLOBALS['is_verify']."{$is_del} where id=".$id;
	$GLOBALS['mysql']->query($sql);
	$GLOBALS['cache']->channel_cache();
	msg('模型修改成功','admin_channel.php');
}

function del_channel(){
	if(!check_purview('pannel_del')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $step,$id,$tb;
	//初始化
	if($step==1){
	global $submit;
	if(!isset($id)||empty($id)){msg('<span style="color:red">参数传递错误,请重新操作</span>');}
	if(file_exists(DATA_PATH."cache_channel/cache_channel_all.php")){
		include(DATA_PATH."cache_channel/cache_channel_all.php");
	}
	if(empty($channel)){
		msg('<span style="color:red">请先更新模型缓存</span>','admin_channel.php');
	}
	foreach($channel as $key=>$value){
		if($value['id']==$id){
			$table=$value['channel_table'];
		}
	}
	//写入栏目缓存
	$rel=$GLOBALS['mysql']->fetch_asc("select id,cate_name,cate_fold_name,lang from ".DB_PRE."category where cate_channel={$id}");
	if(!empty($rel)){
		foreach($rel as $k=>$v){
			$rel[$k]['table']=$table;
		}
	}
	$str="<?php\n\$cate=".var_export($rel,true).";\n?>";
	cache_write(DATA_PATH.'cache_channel/cate_arr.php',$str);
	
	//信息缓存
	$str="<?php \n\$msg='';\n?>";
	cache_write(DATA_PATH.'cache_channel/msg.php',$str);
	$tb=$table;
	show_htm("开始删除栏目",'?action=del_channel&step=2&id='.$id.'&tb='.$tb);
	}
	//取出栏目
	if($step==2){
		if(file_exists(DATA_PATH.'cache_channel/cate_arr.php')){include(DATA_PATH.'cache_channel/cate_arr.php');}
		$cate_arr=empty($cate)?'':array_shift($cate);
		$str="<?php\n\$cate=".var_export($cate,true).";\n?>";
		cache_write(DATA_PATH.'cache_channel/cate_arr.php',$str);
		//文章缓存
		if(!empty($cate_arr)){
			$news=$GLOBALS['mysql']->fetch_asc("select id,title,addtime,lang from ".DB_PRE."maintb where category=".$cate_arr['id']);
			if(!empty($news)){
				foreach($news as $k=>$v){
					$news[$k]['cate_name']=$cate_arr['cate_name'];
					$news[$k]['table']=$cate_arr['table'];
					$news[$k]['cate_fold_name']=$cate_arr['cate_fold_name'];
				}
			}
		$str="<?php\n\$news=".var_export($news,true).";\n?>";
		cache_write(DATA_PATH.'cache_channel/news_arr.php',$str);
		show_htm("开始删除栏目【{$cate_arr['cate_name']}】的文章",'?action=del_channel&step=3&id='.$id.'&cate_id='.$cate_arr['id'].'&tb='.$tb);
		}else{
		//删除字段
		$GLOBALS['mysql']->query("delete from ".DB_PRE."auto_fields where channel_id={$id}");
		$GLOBALS['cache']->cache_fields();
			//删除模型
		$tables=$GLOBALS['mysql']->show_tables();
		if(in_array(DB_PRE.$tb,$tables)){
		$GLOBALS['mysql']->drop_table($tb);
		}
		$GLOBALS['mysql']->query("delete from ".DB_PRE."channel where id=".$id);
		$GLOBALS['cache']->channel_cache();
		msg('模型删除成功','admin_channel.php');
		}
		
	}
	
	//删除文章
	if($step==3){
		global $cate_id;
		if(file_exists(DATA_PATH.'cache_channel/news_arr.php')){include(DATA_PATH.'cache_channel/news_arr.php');}
		$news_id=empty($news)?'':array_shift($news);
		$str="<?php\n\$news=".var_export($news,true).";\n?>";
		cache_write(DATA_PATH.'cache_channel/news_arr.php',$str);
		if(!empty($news_id)){
			$addtime_rel=explode('-',$news_id['addtime']);
			$fl=CMS_PATH.'htm/'.$news_id['cate_fold_name'].'/'.$addtime_rel[0].'/'.$addtime_rel[1].$addtime_rel[2].'/'.$news_id['id'].'.html';
			if(file_exists($fl)){@unlink($fl);}
			if(!empty($news_id['id'])){
			$GLOBALS['mysql']->query("delete from ".DB_PRE."maintb where id=".$news_id['id']);
			}
			if(!empty($news_id['id'])&&!empty($news_id['table'])){
				$GLOBALS['mysql']->query("delete from ".DB_PRE.$news_id['table']." where id=".$news_id['id']);
			}
			show_htm("已经删除栏目【{$news_id['cate_name']}】下的文章【{$news_id['title']}】",'?action=del_channel&step=3&id='.$id.'&cate_id='.$cate_id.'&tb='.$tb);
		}else{
			$GLOBALS['mysql']->query("delete from ".DB_PRE."category where cate_parent=".$cate_id);
			$GLOBALS['mysql']->query("delete from ".DB_PRE."category where id=".$cate_id);
			$GLOBALS['cache']->cache_category_all();
			show_htm("已经删除栏目($cate_id)",'?action=del_channel&step=2&id='.$id.'&tb='.$tb);
		}
		
	}
	
	
}
//字段管理
function fields(){
	global $lang;
	if(!file_exists(DATA_PATH."cache_channel/cache_fields.php")){
		$GLOBALS['cache']->cache_fields();
	}
	include(DATA_PATH."cache_channel/cache_fields.php");
	include('template/admin_field.html');
}

function add_field(){
	if(!check_purview('field_create')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	include('template/admin_field_add.html');
}
function save_field(){
	if(!check_purview('field_create')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id,$field_order;
	if(!isset($id) || empty($id)){
		msg('<span style="color:red">参数传递错误,请重新操作</span>','admin_channel.php');
	}
	if(!isset($GLOBALS['submit'])){
		msg('<span style="color:red">请从表单提交</span>');
	}
	if(empty($GLOBALS['use_name'])){
		msg('<span style="color:red">字段提示文字不能为空</span>');
	}
	if(!check_str($GLOBALS['field_name'],'/^[a-z][a-z0-9]*$/')){
		msg('<span style="color:red">字段名必须是英文和数字,英文开头</span>');
	}
	$field_length=$GLOBALS['field_length'];
	if(empty($field_length)){
		$field_length=255;
	}
	$order=($field_order=="")?10:$field_order;
	if(file_exists(DATA_PATH."cache_channel/cache_channel_all.php")){
		include(DATA_PATH."cache_channel/cache_channel_all.php");
	}
	foreach($channel as $key=>$value){
		if($value['id']==$id){
			$table=$value['channel_table'];
		}
	}
	$type="varchar(".$field_length.")";
	if($GLOBALS['field_type']=="html"||$GLOBALS['field_type']=="upload_pic_more"){
		$type="text";
	}
	$sql="select*from ".DB_PRE."{$table} limit 1";
	$field_arr=$GLOBALS['mysql']->fetch_field($sql);
	if(in_array($GLOBALS['field_name'],$field_arr)){msg("已经存在{$GLOBALS['field_name']}字段,请更换字段名");}
	$GLOBALS['mysql']->add_field($table,$GLOBALS['field_name']." ".$type);
	//$table=$GLOBALS['mysql']->get_row("select channel_mark from ".DB_PRE."channel where id=".$GLOBALS['id'],"channel_mark");
	$sql="insert into ".DB_PRE."auto_fields (field_name,use_name,field_type,field_value,field_length,channel_id,field_info,is_disable,is_del,field_order) values ('".$GLOBALS['field_name']."','".$GLOBALS['use_name']."','".$GLOBALS['field_type']."','".$GLOBALS['field_value']."',".$field_length.",".$GLOBALS['id'].",'".$GLOBALS['field_info']."',".$GLOBALS['is_disable'].",".$GLOBALS['is_del'].",{$order})";
	$GLOBALS['mysql']->query($sql);
	$GLOBALS['cache']->cache_fields();
	msg('字段添加成功',"?");
}
//修改字段
function xg_field(){
	if(!check_purview('field_edit')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id;
	if(!isset($id)||empty($id)){
		msg('<span style="color:red">参数传递错误，请重新操作</span>','admin_channel.php');
	}
	if(!file_exists(DATA_PATH."cache_channel/cache_fields.php")){
		$GLOBALS['cache']->cache_fields();
	}
	include(DATA_PATH."cache_channel/cache_fields.php");
	foreach($field as $key=>$value){
		if($value['id']==$id){
			$arr[]=$value;
		}
	}
	include('template/admin_xg_field.html');
}

function save_xg_field(){
	if(!check_purview('field_edit')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id,$submit,$field_length,$field_order,$is_del;
	if(!isset($submit)){
		msg('<span style="color:red">请从表单提交</span>');
	}
	if(!isset($id)||empty($id)){
		msg('<span style="color:red">参数传递错误</span>','admin_channel.php');
	}
	if(empty($GLOBALS['use_name'])){
		msg('<span style="color:red">字段提示文字不能为空</span>');
	}
	
	if(empty($field_length)){
		$field_length=255;
	}
	
	if(file_exists(DATA_PATH."cache_channel/cache_channel_all.php")){
		include(DATA_PATH."cache_channel/cache_channel_all.php");
	}
	foreach($channel as $key=>$value){
		if($value['id']==$GLOBALS['channel_id']){
			$table=$value['channel_table'];
		}
	}
	$type="varchar(".$field_length.")";
	if($GLOBALS['field_type']=="html"||$GLOBALS['field_type']=="upload_pic_more"){
		$type="text";
	}
	$is_del=($GLOBALS['is_del']=="")?1:$GLOBALS['is_del'];
	$order=($GLOBALS['field_order']=="")?10:$GLOBALS['field_order'];
	$GLOBALS['mysql']->xg_field($table,$GLOBALS['field']." ".$GLOBALS['field']." ".$type);
	$sql="update ".DB_PRE."auto_fields set use_name='".$GLOBALS['use_name']."',field_type='".$GLOBALS['field_type']."',field_value='".$GLOBALS['field_value']."',field_length=255,field_info='".$GLOBALS['field_info']."',is_disable=".$GLOBALS['is_disable'].",field_order={$order},is_del=".$is_del." where id=".$id;
	$GLOBALS['mysql']->query($sql);
	$GLOBALS['cache']->cache_fields();
	msg('字段添修改成功','?');
	
}

function del_field(){
	if(!check_purview('field_del')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id,$channel_id;
	if(!isset($id)||empty($id) || !isset($channel_id) || empty($channel_id)){
		msg('<span style="color:red">参数传递错误,请重新操作</span>','admin_channel.php');
	}
	if(file_exists(DATA_PATH."cache_channel/cache_channel_all.php")){
		include(DATA_PATH."cache_channel/cache_channel_all.php");
	}
	if(!empty($channel)){
	foreach($channel as $key=>$value){
		if($value['id']==$channel_id){
			$table=$value['channel_table'];
		}
	}
	}
	if(file_exists(DATA_PATH."cache_channel/cache_fields.php")){
		include(DATA_PATH."cache_channel/cache_fields.php");
		if(!empty($field)){
		foreach($field as $key=>$value){
			if($value['id']==$id){
				$field=$value['field_name'];
				$is_del=$value['is_del'];
				$use_name=$value['use_name'];
			}
		}
		}
	}
	if($is_del){msg("【{$use_name}】字段不能删除");}
	if(!empty($field)&&!empty($table)){
	$GLOBALS['mysql']->drop_field($table,$field);
	$GLOBALS['mysql']->query("delete from ".DB_PRE."auto_fields where id=".$id);
	}
	$GLOBALS['cache']->cache_fields();
	msg($use_name.'字段删除成功','admin_channel.php');
	
}
?>