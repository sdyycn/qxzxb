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
include(INC_PATH.'lib.php');
$tpl=new tpl(TP_PATH,DATA_PATH.'cache_tpl/');
$action=empty($action)?'htm':$action;
$lang=empty($lang)?get_lang_main():$lang;
//网站配置
$_confing=get_confing($lang);
if(file_exists(DATA_PATH.'sys_info.php')){include(DATA_PATH.'sys_info.php');}
//首页配置
if(file_exists(DATA_PATH.'index_info.php')){include(DATA_PATH.'index_info.php');}
//载入语言包
if(file_exists(LANG_PATH.'lang_'.$lang.'.php')){include(LANG_PATH.'lang_'.$lang.'.php');}
$tpl->template_dir=TP_PATH.$_confing['web_template'].'/';
$tpl->template_lang=$lang;
$tpl->template_is_cache=0;
//go_url($action);
if($action=='htm'){
	if(file_exists(DATA_PATH.'cache/lang_cache.php')){
		include(DATA_PATH.'cache/lang_cache.php');
	}
	include('template/admin_htm_index.html');
}elseif($action=='index'){
//生成首页
	global $lang,$_confing,$_index,$language,$tpl;
	if(!$_confing['web_html'][0]){err('<span style="color:red">请先开启【'.$lang.'】语言的html生成</span>');}
	ob_start();
	$index_fl=CMS_PATH.'index_'.$lang.'.html';
	include(TP_PATH.$_confing['web_template'].'/assign/index_assign.php');
	$tpl->display('index');
	creat_html($index_fl);
	err('首页生成完成【<a target="_blank" href="'.CMS_SELF.'index_'.$lang.'.html">浏览'.$lang.'语言首页</a>】');
}elseif($action=='cate'){
	global $lang;
	if(file_exists(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php')){
		include(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php');
	}
	include('template/admin_htm_cate.html');
	
}elseif($action=='cate_htm'){
	global $lang,$_confing,$cate_is,$_sys,$language,$tpl;
	global $cate,$cat_id,$page_size,$r_count,$page_count,$page,$cateid,$list_cate;
	if(!$_confing['web_html'][0]){err('<span style="color:red">请先开启【'.$lang.'】语言的html生成</span>');}
	//首次更新写入缓存
	if($cate_is){
	if(empty($cate)){
		msg('<span style="color:red">请先选择栏目</span>');
	}
	//写入缓存
	$cate_str="<?php \n\$cate_arr=".var_export($cate,true).";\n?>";
	cache_write(DATA_PATH.'cache_tpl/arr_tpl.php',$cate_str,'生成栏目');
	$msg_str="<?php \n\$msg=array();\n?>";
	cache_write(DATA_PATH.'cache_tpl/msg_tpl.php',$msg_str);
	}
	
	//读取缓存
	if(file_exists(DATA_PATH.'cache_tpl/arr_tpl.php')){
		include(DATA_PATH.'cache_tpl/arr_tpl.php');
	}
	//更新信息缓存
	if(file_exists(DATA_PATH.'cache_tpl/msg_tpl.php')){
		include(DATA_PATH.'cache_tpl/msg_tpl.php');
	}

	//栏目缓存
	if(file_exists(DATA_PATH.'cache_cate/cache_category_all.php')){
	include(DATA_PATH.'cache_cate/cache_category_all.php');
	}else{
		msg('<span style="color:red">请先添加栏目或更新栏目缓存</span>');
	}
	$cate=array_shift($cate_arr);
	if(!empty($cate)){
	$cateid=$cate;
	ob_start();
	$cate_info=get_cate_info($cate,$category);
	$ishtml=1;
	//判断模板存在
	if(!file_exists(TP_PATH.$_confing['web_template']."/{$cate_info['cate_tpl_list']}")){
		$tpl_err="<p style=\"color:red\">不存在【{$lang}】语言栏目为【{$cate_info['cate_name']}】列表模板(template/{$_confing['web_template']}/{$cate_info['cate_tpl_list']})生成失败</p>";
		$msg[]=$tpl_err;
		echo $tpl_err;
	}else{
	$fl_dir=CMS_PATH.'htm/'.$cate_info['cate_fold_name'].'/';
	create_folder($fl_dir);
	$cat_id=$cate_info['id'];
	$child=get_child_id($cat_id);
	$list_cate=empty($child)?$cat_id:$cat_id.$child;//当前栏目及其子栏目
	if(file_exists(DATA_PATH.'cache_channel/cache_channel_all.php')){include(DATA_PATH.'cache_channel/cache_channel_all.php');}
	$channel_info=get_cate_info($cate_info['cate_channel'],$channel);
	$table=$channel_info['channel_table'];//获得当前栏目的模型表
	$r_count=$GLOBALS['mysql']->fetch_rows("select m.id from ".DB_PRE."maintb as m left join ".DB_PRE.$table." as c on m.id=c.id where m.category in (".$list_cate.")");
	if($r_count){//判断是否有内容
	$page_size=empty($_sys['web_pagesize'])?20:$_sys['web_pagesize'];//显示数目
    $page_count=ceil($r_count/$page_size);//总页数
	for($page=1;$page<=$page_count;$page++){
	$file=$fl_dir.'list_'.$page.'.html';
	if($page==1){$file=$fl_dir.'index.html';}//html文件路径
	$tpl_rel=explode('.',$cate_info['cate_tpl_list']);
	include(TP_PATH.$_confing['web_template'].'/assign/'.$tpl_rel[0].'_assign.php');
	$tpl->display($tpl_rel[0]);//载入模板
	creat_html($file,$err);//生成文件
	}
	}else{//没有内容
		$file=$fl_dir.'index.html';
		$tpl_rel=explode('.',$cate_info['cate_tpl_list']);
		include(TP_PATH.$_confing['web_template'].'/assign/'.$tpl_rel[0].'_assign.php');
		$tpl->display($tpl_rel[0]);//载入模板
		creat_html($file,$err);//生成文件
	}
	$cate_msg="<p>栏目<span style=\"color:red; font-weight:bold;\">【{$cate_info['cate_name']}】</span>生成完成---------[<a href=\"".CMS_SELF.'htm/'.$cate_info['cate_fold_name'].'/'."\" target=\"_blank\">浏览该栏目</a>]</p>";
	}
	//更新缓存
	$cate_str="<?php \n\$cate_arr=".var_export($cate_arr,true).";\n?>";
	cache_write(DATA_PATH.'cache_tpl/arr_tpl.php',$cate_str,'生成栏目');
	//缓存信息
	$msg_str="<?php \n\$msg=".var_export($msg,true).";\n?>";
	cache_write(DATA_PATH.'cache_tpl/msg_tpl.php',$msg_str);
	show_htm($cate_msg,'?action=cate_htm&lang='.$lang);
	}else{
	echo '<p style="font-size:12px;">已经生成所选栏目</p><a href="?action=cate&lang='.$lang.'">返回</a>';
	if(!empty($msg)){
		foreach($msg as $row){
			echo '<p style="font-size:12px;">'.$row.'</p>';
		}
	}
	}
	
}elseif($action=='content'){
	global $lang;
	if(file_exists(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php')){
		include(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php');
	}
	$category=isset($cate_list)?$cate_list:'';
	include('template/admin_htm_content.html');
}elseif($action=='content_htm'){
	global $lang,$htm,$_confing,$cate_is,$step,$ct,$channel_table,$language,$tpl;
	global $cateid;
	$remain='';
	if(!$_confing['web_html'][0]){err('请先开启【'.$lang.'】语言的html生成');}
	if($htm==1){
		if(file_exists(DATA_PATH.'cache_cate/cache_category_all.php')){
		include(DATA_PATH.'cache_cate/cache_category_all.php');
		}else{
		msg('<span style="color:red">请先添加栏目或更新栏目缓存</span>');
		}
		if(file_exists(DATA_PATH.'cache_channel/cache_channel_all.php')){
		include(DATA_PATH.'cache_channel/cache_channel_all.php');
		}else{
		msg('<span style="color:red">频道不存在,请先添加频道或更新频道缓存</span>');
		}
		
		if($cate_is){
		global $cate;
		if(empty($cate)){
			msg('请选择栏目');
		}
		//获得栏目下的所有内容
		foreach($cate as $k=>$v){
			$content_list[$k][]=$v;
			$rel=$GLOBALS['mysql']->fetch_asc("select id from ".DB_PRE."maintb where category=".$v." order by id desc");
			$content_list[$k][]=$rel;
		}
		$msg_str="<?php \n\$content_list=".var_export($content_list,true).";\n?>";
		cache_write(DATA_PATH.'cache_tpl/content_tpl.php',$msg_str);
		//信息缓存
		$msg_str="<?php \n\$msg=array();\n?>";
		cache_write(DATA_PATH.'cache_tpl/msg_tpl.php',$msg_str);
		}
		
		if($step){
		if(file_exists(DATA_PATH.'cache_tpl/content_tpl.php')){include(DATA_PATH.'cache_tpl/content_tpl.php');}
		$cate_arr=array_shift($content_list);
		$cateid=$cate_arr[0];
		$ct_arr=$cate_arr[1];
		//文章缓存
		$msg_str="<?php \n\$ct_list=".var_export($cate_arr[1],true).";\n?>";
		cache_write(DATA_PATH.'cache_tpl/ct_tpl.php',$msg_str);
		
		//栏目缓存
		$msg_str="<?php \n\$content_list=".var_export($content_list,true).";\n?>";
		cache_write(DATA_PATH.'cache_tpl/content_tpl.php',$msg_str);

		
		if(!empty($content_list)){
		foreach($content_list as $k=>$v){
			$cate_info2=get_cate_info($v[0],$category);
			$remain[$v[0]]="<b>栏目【{$cate_info2['cate_name']}】有(".count($v[1])."篇文章等待生成)</b>";
		}
		}
		//html信息
		$msg_str="<?php \n\$remain=".var_export($remain,true).";\n?>";
		cache_write(DATA_PATH.'cache_tpl/remain_tpl.php',$msg_str);
		}
		
		//读取信息缓存
		if(file_exists(DATA_PATH.'cache_tpl/msg_tpl.php')){
		include(DATA_PATH.'cache_tpl/msg_tpl.php');
		}
		//读取html信息
		if(file_exists(DATA_PATH.'cache_tpl/remain_tpl.php')){
		include(DATA_PATH.'cache_tpl/remain_tpl.php');
		}
		if(!empty($cateid)){
			$cate_info=get_cate_info($cateid,$category);
			$channel_info=get_cate_info($cate_info['cate_channel'],$channel);
			if(file_exists(DATA_PATH.'cache_tpl/ct_tpl.php')){
				include(DATA_PATH.'cache_tpl/ct_tpl.php');
			}
			if(!empty($ct_list)){
			$ct=array_shift($ct_list);
			$ct=$ct['id'];
			if(!empty($ct)){
				//判断内容页模板
			if(!file_exists(TP_PATH.$_confing['web_template']."/{$cate_info['cate_tpl_content']}")){
				$msg_info="<p style=\"color:red\">$ct={$ct}$cat_id={$cat_id}不存在【{$lang}】语言栏目【{$cate_info['cate_name']}】的内容模板(template/{$_confing['web_template']}/{$cate_info['cate_tpl_content']});生成失败!</p>";
				$msg[]=$msg_info;
			}else{
			$category=$cateid;
			$channel_table=$channel_info['channel_table'];
				$content=get_content($ct,$channel_info['channel_table'],$category);
				$content=$content[0];
				//权限跳过生成
				if(!$content['purview']){
				$c_addtime=date('Y-m-d',$content['addtime']);
				$addtime_rel=explode('-',$c_addtime);
				$fl_dir=CMS_PATH.'htm/'.$cate_info['cate_fold_name'].'/'.$addtime_rel[0].'/'.$addtime_rel[1].$addtime_rel[2].'/';
				create_folder($fl_dir);
				//文章分页
				$body_content=$content['content'];
				$content_arr=preg_split('/<div style=\"page-break-after: always[;]*\"><span style=\"display: none[;]*\">&nbsp;<\/span><\/div>/i',$content['content']);
				$content_arr_num=count($content_arr);
				$content_arr_num=($content_arr_num>1)?$content_arr_num:0;
				$id=$content['id'];
				ob_start();
				if($content_arr_num){
					for($i=0;$i<$content_arr_num;$i++){
						$content_focus=$i;
						$content['content']=$content_arr[$i];
						$p=$i+1;
						$file=($i==0)?$fl_dir.$content['id'].'.html':$fl_dir.$content['id'].'_'.$p.'.html';
						$tpl_rel=explode('.',$cate_info['cate_tpl_content']);
						include(TP_PATH.$_confing['web_template'].'/assign/'.$tpl_rel[0].'_assign.php');
						$tpl->display($tpl_rel[0]);//载入模板
						creat_html($file);//生成文件
					}
				}else{
				$file=$fl_dir.$content['id'].'.html';
				$tpl_rel=explode('.',$cate_info['cate_tpl_content']);
				include(TP_PATH.$_confing['web_template'].'/assign/'.$tpl_rel[0].'_assign.php');
				$tpl->display($tpl_rel[0]);//载入模板
				creat_html($file);//生成文件
				}
				}
				
				//更新文章缓存
				$msg_str="<?php \n\$ct_list=".var_export($ct_list,true).";\n?>";
				cache_write(DATA_PATH.'cache_tpl/ct_tpl.php',$msg_str);
				$msg_info="文章【{$content['title']}】生成完成!---------[<a href=\"".CMS_SELF.'htm/'.$cate_info['cate_fold_name'].'/'.$addtime_rel[0].'/'.$addtime_rel[1].$addtime_rel[2].'/'.$content['id'].'.html'."\" target=\"_blank\">浏览该内容</a>]<br/>";
			}
				
				//更新信息缓存
				$msg_str="<?php \n\$msg=".var_export($msg,true).";\n?>";
				cache_write(DATA_PATH.'cache_tpl/msg_tpl.php',$msg_str);
				//更新html信息
				$ct_list_num=isset($ct_list)?count($ct_list):'';
				$remain[$cateid].="还剩<span style=\"color:red\">".$ct_list_num."</span>篇文章";
				show_htm($msg_info,'?action=content_htm&lang='.$lang.'&cateid='.$cateid.'&htm=1');
				}
			}else{//没有内容
			    $msg_info="<span style=\"color:green;font-weight:bold\">栏目\"{$cate_info['cate_name']}\"的内容生成完成</span><br>";
				//更新信息缓存
				$msg_str="<?php \n\$msg=".var_export($msg,true).";\n?>";
				cache_write(DATA_PATH.'cache_tpl/msg_tpl.php',$msg_str);
				//更新html信息
				$ct_list_num=isset($ct_list)?count($ct_list):'';
				$remain[$cateid].="还剩<span style=\"color:red\">".$ct_list_num."</span>篇文章";
				show_htm($msg_info,'?action=content_htm&lang='.$lang.'&cateid='.$cateid.'&htm=1&step=1');
			}
		}else{
			$msg_str='';
			if(!empty($msg)){
				foreach($msg as $row){
					$msg_str.='<p>'.$row.'</p>';
				}
			}
			show_htm('<p>完成所有内容的生成</p>'.$msg_str,'?action=content&lang='.$lang,0);
		}
		
	}
	if($htm==2){
		global $htm_min,$htm_max;
		echo $htm_min.'<br>'.$htm_max;
	}
}elseif($action=='alone'){
	if(file_exists(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php')){
		include(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php');
	}
	include('template/admin_htm_alone.html');
}elseif($action=='alone_htm'){//生成单页
	global $lang,$_confing,$cate_is,$language;
	global $cate,$cat_id;
	if(!$_confing['web_html'][0]){err('<span style="color:red">请先开启【'.$lang.'】语言的html生成</span>');}
	//首次更新写入缓存
	if($cate_is){
	if(empty($cate)){
		msg('<span style="color:red">请先选择栏目</span>');
	}
	//写入缓存
	$cate_str="<?php \n\$cate_arr=".var_export($cate,true).";\n?>";
	cache_write(DATA_PATH.'cache_tpl/arr_tpl.php',$cate_str,'生成单页内容');
	$msg_str="<?php \n\$msg=array();\n?>";
	cache_write(DATA_PATH.'cache_tpl/msg_tpl.php',$msg_str);
	}
	
	//读取缓存
	if(file_exists(DATA_PATH.'cache_tpl/arr_tpl.php')){
		include(DATA_PATH.'cache_tpl/arr_tpl.php');
	}
	//更新信息缓存
	if(file_exists(DATA_PATH.'cache_tpl/msg_tpl.php')){
		include(DATA_PATH.'cache_tpl/msg_tpl.php');
	}
	//栏目缓存
	if(file_exists(DATA_PATH.'cache_cate/cache_category_all.php')){
	include(DATA_PATH.'cache_cate/cache_category_all.php');
	}else{
		msg('<span style="color:red">请先添加栏目或更新栏目缓存</span>');
	}
	$cate=array_shift($cate_arr);
	
	if(!empty($cate)){
	ob_start();
	$cate_info=get_cate_info($cate,$category);

	//判断模板存在
	if(!file_exists(TP_PATH.$_confing['web_template']."/{$cate_info['cate_tpl_list']}")){
		$tpl_err="<p style=\"color:red\">不存在【{$lang}】语言栏目为【{$cate_info['cate_name']}】单页模型模板(template/{$_confing['web_template']}/{$cate_info['cate_tpl_list']})生成失败</p>";
		$msg[]=$tpl_err;
	}else{
	$fl_dir=CMS_PATH.'htm/'.$cate_info['cate_fold_name'].'/';
	create_folder($fl_dir);
	$cat_id=$cate_info['id'];
	global $cateid;
	$cateid=$cate;
	$content=$GLOBALS['mysql']->fetch_asc("select m.*,c.* from ".DB_PRE."maintb as m left join ".DB_PRE."alone as c on m.id=c.id where category={$cate}");
	$content=$content[0];
	$msg[]=empty($content)?"<p style=\"color:red\">未添加{$cate_info['cate_name']}栏目内容</p>":"";
	//文章分页
				$body_content=$content['content'];
				$content_arr=preg_split('/<div style=\"page-break-after: always[;]*\"><span style=\"display: none[;]*\">&nbsp;<\/span><\/div>/i',$body_content);
				$content_arr_num=count($content_arr);
				$content_arr_num=($content_arr_num>1)?$content_arr_num:0;
				$id='index_'.$lang;
				ob_start();
				if($content_arr_num){
				$ct='index_'.$lang;
					for($i=0;$i<$content_arr_num;$i++){
						$content_focus=$i;
						$content['content']=$content_arr[$i];
						$p=$i+1;
						$file=($i==0)?$fl_dir.'index_'.$lang.'.html':$fl_dir.'index_'.$lang.'_'.$p.'.html';
						$tpl_rel=explode('.',$cate_info['cate_tpl_list']);
						include(TP_PATH.$_confing['web_template'].'/assign/'.$tpl_rel[0].'_assign.php');
						$tpl->display($tpl_rel[0]);//载入模板
						creat_html($file,$err);//生成文件
					}
				}else{
				$file=$fl_dir.'index_'.$lang.'.html';
				$tpl_rel=explode('.',$cate_info['cate_tpl_list']);
				include(TP_PATH.$_confing['web_template'].'/assign/'.$tpl_rel[0].'_assign.php');
				$tpl->display($tpl_rel[0]);//载入模板
				creat_html($file,$err);//生成文件
				}
	
	
	$msg_info="<p>成功生成单页【{$cate_info['cate_name']}】</p>";
	}
	//更新缓存
	$cate_str="<?php \n\$cate_arr=".var_export($cate_arr,true).";\n?>";
	cache_write(DATA_PATH.'cache_tpl/arr_tpl.php',$cate_str);

	//缓存信息
	$msg_str="<?php \n\$msg=".var_export($msg,true).";\n?>";
	cache_write(DATA_PATH.'cache_tpl/msg_tpl.php',$msg_str);
	show_htm($msg_info,'?action=alone_htm&lang='.$lang);
	}else{
	$msg_str='';
	if(!empty($msg)){
		foreach($msg as $row){
			$msg_str.='<p>'.$row.'</p>';
		}
	}
	show_htm('<p>完成所选单页的生成</p>'.$msg_str,'?action=alone&lang='.$lang,0);
	}
}elseif($action=='map'){
	include('template/admin_htm_map.html');
}elseif($action=='save_map'){//生成网站地图
	if(file_exists(DATA_PATH.'cache_cate/cache_category_all.php')){
		include(DATA_PATH.'cache_cate/cache_category_all.php');
	}else{
		die('<span style="color:red">请先更新栏目缓存</span>');
	}
	if(file_exists(DATA_PATH.'cache_channel/cache_channel_all.php')){
		include(DATA_PATH.'cache_channel/cache_channel_all.php');
	}else{
		die('<span style="color:red">请先更新频道缓存</span>');
	}
	ob_start();
$file=CMS_PATH.'htm/'.$lang.'_sitemap.html';
include(TP_PATH.$_confing['web_template'].'/assign/sitemap_assign.php');
$tpl->display('sitemap');//载入模板	 		
creat_html($file);//生成文件
err('【'.$lang.'】语言网站地图生成完成');
}

?>
