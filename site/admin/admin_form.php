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
$action=empty($action)?'form':$action;
go_url($action);

function add(){
	if(!check_purview('form_create')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	include('template/admin_form_ad.html');
}
function save_form(){
	if(!check_purview('form_create')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $form_name,$form_mark,$is_disable;
	if(empty($form_name)||empty($form_mark)){
		msg('<span style="color:red">名称或标示不能为空!</span>');
	}
	if(!check_str($form_mark,'/^[a-z0-9][a-z0-9]*$/')){
		msg('<span style="color:red">频道标识只能是字母或数字</span>');
	}
	$tables=$GLOBALS['mysql']->show_tables();
	if(in_array(DB_PRE.$GLOBALS['form_mark'],$tables)){
		msg('<span style="color:red">数据表'.$GLOBALS['form_mark'].'已经存在,请更改标示</span>');
	}
	$sql="insert into ".DB_PRE."form (form_name,form_mark,is_disable) values ('{$form_name}','{$form_mark}',{$is_disable})";
	$GLOBALS['mysql']->query($sql);
	//附加表
	$table=$GLOBALS['form_mark'];
	$field="id mediumint(8) not null,primary key (id)";
	$GLOBALS['mysql']->create_tb($table,$field);
	//更新缓存
	if(!is_dir(DATA_PATH.'cache_form')){
		@mkdir(DATA_PATH.'cache_form',0777);
	}
	$form_file=DATA_PATH.'cache_form/form.php';
	$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."form order by id desc");
	$cache_str="<?php\n\$form=".var_export($rel,true).";\n?>";
	cache_write($form_file,$cache_str);
	msg("【{$form_name}】表单模型添加完成");
}

function form(){
	if(file_exists(DATA_PATH.'cache_form/form.php')){include(DATA_PATH.'cache_form/form.php');}
	include('template/admin_form.html');
}

function form_xg(){
	if(!check_purview('form_edit')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id;
	if(empty($id)){
		msg('<span style="color:red">参数传递错误,不存在该表单模型</span>');
	}
	if(file_exists(DATA_PATH.'cache_form/form.php')){
		include(DATA_PATH.'cache_form/form.php');
	}
	if(empty($form)){msg('<span style="color:red">请先更新缓存</span>');}
	foreach($form as $k=>$v){
		if($id==$v['id']){$rel=$v; break;}
	}
	include('template/admin_form_xg.html');
}

function save_xg_form(){
	if(!check_purview('form_edit')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id,$form_name,$is_disable,$submit;
	if(empty($submit)||empty($id)){msg('<span style="color:red">请从表单提交</span>');}
	if(empty($form_name)){msg("名称不能为空");}
	$sql="update ".DB_PRE."form set form_name='{$form_name}',is_disable={$is_disable} where id={$id}";
	$GLOBALS['mysql']->query($sql);
	//更新缓存
	$form_file=DATA_PATH.'cache_form/form.php';
	$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."form order by id desc");
	$cache_str="<?php\n\$form=".var_export($rel,true).";\n?>";
	cache_write($form_file,$cache_str);
	msg("【{$form_name}】表单模型修改成功",'?');
}

function del_form(){
	if(!check_purview('form_del')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id;
	if(empty($id)){msg('<span style="color:red">参数发生错误，请重新操作</span>');}
	if(file_exists(DATA_PATH.'cache_form/form.php')){include(DATA_PATH.'cache_form/form.php');}
	if(!empty($form)){
		foreach($form as $k=>$v){
			if($v['id']==$id){
				$form_table=$v['form_mark'];
				$form_name=$v['form_name'];
			}
		}
	}
	$tables=$GLOBALS['mysql']->show_tables();
	if(in_array(DB_PRE.$form_table,$tables)){
	if($GLOBALS['mysql']->fetch_rows("select id from ".DB_PRE."{$form_table}")){
		msg('<span style="color:red">请先删除【'.$form_name.'】表单模型下的信息</span>');
	}
	}
	if(file_exists(DATA_PATH.'cache_form/field.php')){include(DATA_PATH.'cache_form/field.php');}
	if(!empty($field)){
		foreach($field as $k=>$v){
			if($v['form_id']==$id){
				msg('<span style="color:red">请先删除【'.$form_name.'】表单模型下的字段</span>');
			}
		}
	}
	
	if(in_array(DB_PRE.$form_table,$tables)){
	$GLOBALS['mysql']->drop_table($form_table);
	}
	$sql="delete from ".DB_PRE."form where id={$id}";
	$GLOBALS['mysql']->query($sql);
	//更新缓存
	$form_file=DATA_PATH.'cache_form/form.php';
	$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."form order by id desc");
	$cache_str="<?php\n\$form=".var_export($rel,true).";\n?>";
	cache_write($form_file,$cache_str);
	msg('表单模型删除成功');
}

function cache(){
	if(!is_dir(DATA_PATH.'cache_form')){
		@mkdir(DATA_PATH.'cache_form',0777);
	}
	$form_file=DATA_PATH.'cache_form/form.php';
	$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."form order by id desc");
	$cache_str="<?php\n\$form=".var_export($rel,true).";\n?>";
	cache_write($form_file,$cache_str,'表单模型缓存');
	unset($rel);
	//更新字段
	$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."formfield order by form_order,id desc");
	$cache_str="<?php\n\$field=".var_export($rel,true).";\n?>";
	cache_write(DATA_PATH.'cache_form/field.php',$cache_str);
	unset($rel);
	msg('表单模型缓存成功','?');
}

function fields(){
	global $id;
	if(file_exists(DATA_PATH.'cache_form/field.php')){include(DATA_PATH.'cache_form/field.php');}
	include('template/admin_form_field.html');
}

function add_field(){
	if(!check_purview('form_field_create')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id;
	include('template/admin_form_field_add.html');
}
function save_field(){
	if(!check_purview('form_field_create')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id,$use_name,$field_name,$field_type,$field_value,$field_length,$field_info,$is_disable,$form_order,$is_empty;
	if(empty($use_name)||empty($field_name)){msg('<span style="color:red">提示文字或字段名称不能为空</span>');}
	if($GLOBALS['mysql']->fetch_rows('select id from '.DB_PRE."formfield where field_name='".$GLOBALS['field_name']."' and form_id=".$GLOBALS['id']." order by id desc")){
		msg($GLOBALS['field_name'].'<span style="color:red">字段名已经存在,请使用其它字段名</span>');
	}
	//添加表字段
	if(file_exists(DATA_PATH.'cache_form/form.php')){include(DATA_PATH.'cache_form/form.php');}
	if(!empty($form)){
		foreach($form as $k=>$v){
			if($v['id']==$id){
				$form_table=$v['form_mark'];
			}
		}
	}
	
	$field_length=255;
	$type="varchar(".$field_length.")";
	$GLOBALS['mysql']->add_field($form_table,$GLOBALS['field_name']." ".$type);
	
	$sql="insert into ".DB_PRE."formfield (field_name,use_name,field_type,field_value,field_length,form_id,field_info,is_disable,form_order,is_empty) values ('{$field_name}','{$use_name}','{$field_type}','{$field_value}',{$field_length},{$id},'{$field_info}',$is_disable,$form_order,$is_empty)";
	$GLOBALS['mysql']->query($sql);
	//更新缓存
	if(!is_dir(DATA_PATH.'cache_form')){@mkdir(DATA_PATH.'cache_form',0777);}
	$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."formfield order by form_order,id desc");
	$cache_str="<?php\n\$field=".var_export($rel,true).";\n?>";
	cache_write(DATA_PATH.'cache_form/field.php',$cache_str);
	msg("【{$use_name}】字段添加完成");
}

function xg_field(){
	if(!check_purview('form_field_edit')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id;
	if(!isset($id)||empty($id)){
		msg('<span style="color:red">参数传递错误，请重新操作</span>','admin_channel.php');
	}
	if(file_exists(DATA_PATH."cache_form/field.php")){
		include(DATA_PATH.'cache_form/field.php');
	}
	if(!empty($field)){
		foreach($field as $k=>$v){
			if($v['id']==$id){
				$arr[0]=$v;
			}
		}
	}
	include('template/admin_form_field_xg.html');
}

function save_xg_field(){
	if(!check_purview('form_field_edit')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id,$submit,$use_name,$field_type,$field_value,$field_length,$field_info,$is_disable,$form_order,$is_empty,$form_id;
	if(!isset($submit)){
		msg('<span style="color:red">请从表单提交</span>');
	}
	if(!isset($id)||empty($id)){
		msg('<span style="color:red">参数传递错误</span>','admin_channel.php');
	}
	if(empty($GLOBALS['use_name'])){
		msg('<span style="color:red">字段提示文字不能为空</span>');
	}
	$field_length=$GLOBALS['field_length'];
	
	$field_length=255;
	//修改表字段
	if(file_exists(DATA_PATH.'cache_form/form.php')){include(DATA_PATH.'cache_form/form.php');}
	if(!empty($form)){
		foreach($form as $k=>$v){
			if($v['id']==$form_id){
				$form_table=$v['form_mark'];
			}
		}
	}
	$type="varchar(".$field_length.")";
	$GLOBALS['mysql']->xg_field($form_table,$GLOBALS['field']." ".$GLOBALS['field']." ".$type);
	
	$sql="update ".DB_PRE."formfield set use_name='{$use_name}',field_type='{$field_type}',field_value='{$field_value}',field_length={$field_length},field_info='{$field_info}',is_disable={$is_disable},form_order={$form_order},is_empty={$is_empty} where id={$id}";
	$GLOBALS['mysql']->query($sql);
	//更新缓存
	if(!is_dir(DATA_PATH.'cache_form')){@mkdir(DATA_PATH.'cache_form',0777);}
	$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."formfield order by form_order,id desc");
	$cache_str="<?php\n\$field=".var_export($rel,true).";\n?>";
	cache_write(DATA_PATH.'cache_form/field.php',$cache_str);
	msg("【{$use_name}】字段修改成功");
}

function del_field(){
	if(!check_purview('form_field_del')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id,$form_id;
	if(empty($id)||empty($form_id)){msg('<span style="color:red">不存在该字段,删除失败</span>');}
	//删除表子字段
	if(file_exists(DATA_PATH.'cache_form/form.php')){include(DATA_PATH.'cache_form/form.php');}
	if(!empty($form)){
		foreach($form as $k=>$v){
			if($v['id']==$form_id){
				$form_table=$v['form_mark'];
			}
		}
	}
	if(file_exists(DATA_PATH.'cache_form/field.php')){include(DATA_PATH.'cache_form/field.php');}
	if(!empty($field)){
		foreach($field as $k=>$v){
			if($v['id']==$id){
				$field=$v['field_name'];
			}
		}
	}
	$GLOBALS['mysql']->drop_field($form_table,$field);
	
	$GLOBALS['mysql']->query("delete from ".DB_PRE."formfield where id={$id}");
	//更新缓存
	if(!is_dir(DATA_PATH.'cache_form')){@mkdir(DATA_PATH.'cache_form',0777);}
	$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."formfield order by id desc");
	$cache_str="<?php\n\$field=".var_export($rel,true).";\n?>";
	cache_write(DATA_PATH.'cache_form/field.php',$cache_str);
	msg('字段删除成功');
}	

//表单列表
function form_list(){
	if(!check_purview('form_list')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id;
	if(file_exists(DATA_PATH.'cache_form/form.php')){include(DATA_PATH.'cache_form/form.php');}
	$id=empty($id)?$form[0]['id']:$id;
	if(!empty($form)){
		foreach($form as $k=>$v){
			if($v['id']=$id){
				$form_info=$v;
			}
		}
	}
	include('template/admin_form_list.html');
}

function show_form(){
	if(!check_purview('form_list')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id,$form_id;
	if(empty($id)){msg('<span style="color:red">不存在当前表单</span>');}
	if(file_exists(DATA_PATH.'cache_form/form.php')){include(DATA_PATH.'cache_form/form.php');}
	if(!empty($form)){
		foreach($form as $k=>$v){
			if($v['id']==$form_id){
				$form_info=$v;
			}
		}
	}
	$table=$form_info['form_mark'];
	if(empty($table)){err('<span style="color:red">不存在表单模型</span>');}
	$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."{$table} where id={$id}");
	$rel2=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."formlist where id={$id}");
	$rel_arr=$rel[0];
	if(file_exists(DATA_PATH.'cache_form/field.php')){include(DATA_PATH.'cache_form/field.php');}
	include('template/admin_show_form.html');	
}

function del_list(){
	if(!check_purview('form_list')){msg('<span style="color:red">操作失败,你的权限不足!</span>');}
	global $id,$form_id;
	if(empty($id)||empty($form_id)){msg('<span style="color:red">参数发生错误,删除失败</span>');}
	if(file_exists(DATA_PATH.'cache_form/form.php')){include(DATA_PATH.'cache_form/form.php');}
	if(!empty($form)){
		foreach($form as $k=>$v){
			if($v['id']==$form_id){$table=$v['form_mark'];}
		}
	}
	$GLOBALS['mysql']->query("delete from ".DB_PRE."formlist where id={$id}");
	$GLOBALS['mysql']->query("delete from ".DB_PRE."{$table} where id={$id}");
	msg('表单信息成功删除');
}
?>
