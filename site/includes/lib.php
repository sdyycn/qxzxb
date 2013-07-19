<?php
/**
 * $Author: BEESCMS $
 * ============================================================================
 * 网站地址: http://www.beescms.com
 * 您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
*/



function pagelist($id,$page,$size){
	$num=$page*$size;
	$rel='';
	//echo "select*from ".DB_PRE."maintb where category=".intval($id)." limit ".$num.",".intval($size);
	$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."maintb where category=".intval($id)." limit ".$num.",".intval($size));
	return $rel;
}
function pages($row,$id){
	global $row;
	$row=empty($row)?5:$row;
	$rel_num=$GLOBALS['mysql']->fetch_rows('select*from '.DB_PRE.'maintb where category='.intval($id));
	$pages=intval($rel_num/$row);
	$pages=empty($pages)?1:$pages;
	return $pages;
}


//列表页文章数
function list_article(){
	global $page,$cat_id,$list_cate,$r_count,$page_size,$child,$lang;
	$_confing=get_confing($GLOBALS['lang']);
//获取频道表，只能获取父级栏目频道表
	if(file_exists(DATA_PATH.'cache_cate/cache_category_all.php')){include(DATA_PATH.'cache_cate/cache_category_all.php');}
	if(file_exists(DATA_PATH.'cache_channel/cache_channel_all.php')){include(DATA_PATH.'cache_channel/cache_channel_all.php');}
	$cate_info=get_cate_info($cat_id,$category);
	$channel_info=get_cate_info($cate_info['cate_channel'],$channel);
	$table=$channel_info['channel_table'];
	
	$rel=array();
	$page_size=isset($page_size)?$page_size:0;
	$row=empty($page_size)?20:$page_size;
	$page=empty($page)?1:$page;
	$offset=($page-1)*$row;
	$rel=$GLOBALS['mysql']->fetch_asc("select m.*,f.* from ".DB_PRE."maintb as m left join ".DB_PRE.$table." as f on m.id=f.id where category in (".$list_cate.") order by m.id desc limit ".$offset.",".$page_size);
	$path=CMS_SELF;
	if(!empty($rel)){
	$i=1;
	$num=count($rel);
	foreach($rel as $k=>$v){
		//标题样式
			if($rel[$k]['title_color']||$rel[$k]['title_style']||$rel[$k]['is_open']){
			$font_style='<font style="';
			$font_style.=empty($rel[$k]['title_color'])?'':'color:'.$rel[$k]['title_color'].';';
			if($rel[$k]['title_style']==1){
			$font_style.='font-weight:bold;';
			}elseif($rel[$k]['title_style']==2){
				$font_style.='font-style:italic;';
			}elseif($rel[$k]['title_style']==3){
				$font_style.='text-decoration:underline;';
			}
			$font_style.='">';
			$font_style.=$rel[$k]['title'];
			$font_style.="</font>";
			$rel[$k]['style_title']=$font_style;//样式标题
			}else{
			$rel[$k]['style_title']=$rel[$k]['title'];
			}
		$rel[$k]['target']=$v['is_open']?'target="_blank"':'';//新窗口	
		$rel[$k]['url']=(!$v['is_html']&&!($_confing['web_html'][0])||$v['purview'])?$path.'show_content.php?id='.$v['id']:$path.$v['url'];
		$rel[$k]['url']=($v['is_url'])?$v['url_add']:$rel[$k]['url'];
		$v['tbpic']=empty($v['tbpic'])?'no_pc.gif':$v['tbpic'];
		$rel[$k]['tbpic']=CMS_SELF.'upload/'.$v['tbpic'];
		$rel[$k]['autoindex']=$i;
		$rel[$k]['first']=($i==1)?1:0;
		$rel[$k]['last']=($num==$i)?1:0;
		$i=$i+1;
	}
	}
	return $rel;
}


//获取内容
function get_content($cate_id,$table,$cat_id){
	global $language,$lang;
	if(file_exists(DATA_PATH.$lang.'_info.php')){include(DATA_PATH.$lang.'_info.php');}
if(!empty($_confing)){
 foreach($_confing as $k=>$v){
 	$_confing[$k]=stripslashes($v);
 }
}
	$sql="select m.*,c.* from ".DB_PRE."maintb as m left join ".DB_PRE.$table." as c on m.id=c.id where m.id=".$cate_id;
	$path=CMS_SELF;
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	//处理标题
	if($rel[0]['title_color']||$rel[0]['title_style']||$rel[0]['is_open']){
			$font_style='<font style="';
			$font_style.=empty($rel[0]['title_color'])?'':'color:'.$rel[0]['title_color'].';';
			if($rel[0]['title_style']==1){
			$font_style.='font-weight:bold;';
			}elseif($rel[0]['title_style']==2){
				$font_style.='font-style:italic;';
			}elseif($rel[0]['title_style']==3){
				$font_style.='text-decoration:underline;';
			}
			$font_style.='">';
			$font_style.=$rel[0]['title'];
			$font_style.="</font>";
			$rel[0]['style_title']=$font_style;//样式标题
			}else{
			$rel[0]['style_title']=$rel[0]['title'];
	}
	$rel[0]['tbpic']=empty($rel[0]['tbpic'])?'no_pc.gif':$rel[0]['tbpic'];
	$rel[0]['tbpic']='upload/'.$rel[0]['tbpic'];
	$rel[0]['updatetime']=date('Y-m-d H:m:s',$rel[0]['updatetime']);
	$prev_id=$cate_id-1;
	$sql="select id from ".DB_PRE."maintb where category={$cat_id} and id>{$cate_id} order by id asc limit 0,1";
	$rel[0]['prev']='';
	if($GLOBALS['mysql']->fetch_rows($sql)){
		$prev_rel=$GLOBALS['mysql']->fetch_asc("select id,title,title_color,title_style,url,is_html,is_url,url_add from ".DB_PRE."maintb where category={$cat_id} and id>{$cate_id} order by id asc limit 0,1");
		//处理标题
		if($prev_rel[0]['title_color']||$prev_rel[0]['title_style']){
			$font_style='<font style="';
			$font_style.=empty($prev_rel[0]['title_color'])?'':'color:'.$prev_rel[0]['title_color'].';';
			if($prev_rel[0]['title_style']==1){
			$font_style.='font-weight:bold;';
			}elseif($prev_rel[0]['title_style']==2){
				$font_style.='font-style:italic;';
			}elseif($prev_rel[0]['title_style']==3){
				$font_style.='text-decoration:underline;';
			}
			$font_style.='">';
			$font_style.=$prev_rel[0]['title'];
			$font_style.="</font>";
			$prev_rel[0]['style_title']=$font_style;//样式标题
			}else{
			$prev_rel[0]['style_title']=$prev_rel[0]['title'];
			}
		$url=(!empty($next_rel[0]['is_html'])||!($_confing['web_html'][0]))?$path.'show_content.php?id='.$prev_rel[0]['id']:$path.$prev_rel[0]['url'];
		$next_is=isset($next_rel[0]['is_url'])?$next_rel[0]['is_url']:'';
		$url=($next_is)?$next_rel[0]['url_add']:$url;
		$rel[0]['prev']="{$language['previous']}:<a href=\"{$url}\" title=\"{$prev_rel[0]['title']}\">{$prev_rel[0]['style_title']}</a>";
		unset($prev_rel);
	}else{
		$rel[0]['prev']="{$language['previous']}:{$language['nonestr']}";
	}
	$next_id=$cate_id+1;
	$sql="select id from ".DB_PRE."maintb where category={$cat_id} and id<{$cate_id} order by id desc limit 0,1";
	$rel[0]['next']='';
	if($GLOBALS['mysql']->fetch_rows($sql)){
		$next_rel=$GLOBALS['mysql']->fetch_asc("select id,title,title_color,title_style,url,is_html,is_url,url_add from ".DB_PRE."maintb where category={$cat_id} and id<{$cate_id} order by id desc limit 0,1");
		//处理标题
		if($next_rel[0]['title_color']||$next_rel[0]['title_style']){
			$font_style='<font style="';
			$font_style.=empty($next_rel[0]['title_color'])?'':'color:'.$next_rel[0]['title_color'].';';
			if($next_rel[0]['title_style']==1){
			$font_style.='font-weight:bold;';
			}elseif($next_rel[0]['title_style']==2){
				$font_style.='font-style:italic;';
			}elseif($next_rel[0]['title_style']==3){
				$font_style.='text-decoration:underline;';
			}
			$font_style.='">';
			$font_style.=$next_rel[0]['title'];
			$font_style.="</font>";
			$next_rel[0]['style_title']=$font_style;//样式标题
			}else{
			$next_rel[0]['style_title']=$next_rel[0]['title'];
			}
		$url=(!empty($next_rel[0]['is_html'])||!($_confing['web_html'][0]))?$path.'show_content.php?id='.$next_rel[0]['id']:$path.$next_rel[0]['url'];
		$next_is=isset($next_rel[0]['is_url'])?$next_rel[0]['is_url']:'';
		$url=($next_is)?$next_rel[0]['url_add']:$url;
		$rel[0]['next']="{$language['next']}:<a href=\"{$url}\" title=\"{$next_rel[0]['title']}\">{$next_rel[0]['style_title']}</a>";
		unset($next_rel);
	}else{
		$rel[0]['next']="{$language['next']}:{$language['nonestr']}";
	}
	return $rel;
	
}

//内容分页
function body_pages(){
	global $id,$content_arr_num,$content_focus,$ishtml;
	$str='';
	if(!$ishtml){
	if(!empty($content_arr_num)){
		for($i=0;$i<$content_arr_num;$i++){
			$class=($content_focus==$i)?"class=\"focus\"":"";
			$p=$i+1;
			$str.=($i==0)?"<li {$class}><a href=\"{$id}.html\">{$p}</a></li>":"<li {$class}><a href=\"{$id}_{$p}.html\">{$p}</a></li>";
		}
	}
	}else{
	if(!empty($content_arr_num)){
		for($i=0;$i<$content_arr_num;$i++){
			$class=($content_focus==$i)?"class=\"focus\"":"";
			$p=$i+1;
			$str.=($i==0)?"<li {$class}><a href=\"?id={$id}\">{$p}</a></li>":"<li {$class}><a href=\"?id={$id}&page={$p}\">{$p}</a></li>";
		}
	}
	}
	return $str;	
}


//路径
function cmspath($path=''){
	global $lang;
	//网站配置文件
	$_confing=get_confing($GLOBALS['lang']);
	$path=($path=='template')?'template/'.$_confing['web_template']:$path;
	$index_url=$_confing['web_html'][0]?'index_'.$lang.'.html':'index.php?lang='.$lang;
	$path=($path=='index')?$index_url:$path;
	$path=($path=='search')?'search.php?lang='.$lang:$path;
	$path=($path=='cms')?'':$path;
	echo CMS_SELF.$path;
}
//动态页路径
function get_dy_position($url){
	$_confing=get_confing($GLOBALS['lang']);
	$index_url=$_confing['web_html'][0]?'index_'.$GLOBALS['lang'].'.html':'index.php?lang='.$GLOBALS['lang'];
	$url_str='<a href="'.$index_url.'">'.$GLOBALS['language']['index'].'</a>>'.$url;
	return $url_str;
}
//网站信息,用于优化
function webinfo(){
	$_confing=get_confing($GLOBALS['lang']);
	$arr=array();
	$arr['webname']=$_confing['web_name'];
	$arr['powerby']=$_confing['web_powerby'];
	$arr['keywords']=$_confing['web_keywords'];
	$arr['description']=$_confing['web_description'];
	$arr['beian']=$_confing['web_beian'];
	$arr['yinxiao']=$_confing['yinxiao'];
	return $arr;
}

//栏目信息，用于优化
function cateinfo(){
	$sql="select cate_name,cate_title_seo,cate_key_seo,cate_info_seo from ".DB_PRE."category where id=".$GLOBALS['cateid'];
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	$arr=array();
	if(!empty($rel)){
		$arr['catename']=$rel[0]['cate_name'];
		$arr['title']=$rel[0]['cate_title_seo'];
		$arr['keywords']=$rel[0]['cate_key_seo'];
		$arr['description']=$rel[0]['cate_info_seo'];
	}
	return $arr;
}

//当前位置
function position(){
	//global $ct,$lang,$cateid,$language;
	$_confing=get_confing($GLOBALS['lang']);
	$cat_id=$GLOBALS['cateid'];
	if(!empty($cat_id)){
		if(file_exists(DATA_PATH.'cache_cate/cate_list_'.$GLOBALS['lang'].'.php')){
			include(DATA_PATH.'cache_cate/cate_list_'.$GLOBALS['lang'].'.php');
		}
		//取得父栏目
		if(!empty($cate_list)){
			foreach($cate_list as $k=>$v){
				if($v['id']==$cat_id){
					$parent=$v['cate_parent'];
					$url=($v['cate_html']&&$_confing['web_html'][0])?CMS_SELF.'htm/'.$v['cate_fold_name']:CMS_SELF."show_list.php?id={$v['id']}";
					$ps="<a href=\"{$url}\">{$v['cate_name']}</a>";
					break;
				}
			}
			$path=CMS_SELF;
			echo "<a href=\"".CMS_SELF."index.php?lang=".$GLOBALS['lang']."\">".$GLOBALS['language']['index']."</a> > ";
			get_position($parent,$cate_list,$path);
			echo $ps;
		}
		
	}
}


//表单
function form($tpl_id=''){
	global $lang;
	$_confing=get_confing($lang);
	//配置信息不为空则输出配置内容
	if(empty($tpl_id)){return;}
	//获取后台配置信息
	$sql="select id from ".DB_PRE."tpl where lang='".$GLOBALS['lang']."' and tpl_id='".$tpl_id."'";
	$t_id=$GLOBALS['mysql']->fetch_asc($sql);
	$tpl_arr=get_tpl_tag_value($t_id[0]['id']);
	if(empty($tpl_arr[0])){return;}
	return form_fields($tpl_arr[0],CMS_SELF);
}
//多图输出，$name创建的多图字段名
function album($name=''){
	global $id,$channel_table;
	$arr=array();
	if(empty($name)||empty($id)){return;}
	$sql="select {$name} from ".DB_PRE.$channel_table." where id={$id}";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	$rel=explode(',',$rel[0][$name]);
	if(!empty($rel)){
	$num=count($rel);
	$i=1;
	 foreach($rel as $k=>$v){
	 	if(empty($v)){$arr[$k]['url']=CMS_SELF.'upload/no_pc.gif';continue;}
		$arr[$k]['url']=CMS_SELF.'upload/'.$v;
		$arr[$k]['first']=($i==1)?1:0;
		$i=$i+1;
	 }	
	}
	return $arr;
}


function get_market(){
	$sql="select*from ".DB_PRE."market where lang='".$GLOBALS['lang']."' order by market_order desc";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	$rel_arr=array();
	if(!empty($rel)){
		foreach($rel as $k=>$row){
			if(!$row['market_is']){continue;}
			$rel_arr[$k]['market_name']=$row['market_name'];
			$rel_arr[$k]['market_num']=$row['market_num'];
			$rel_arr[$k]['market_type']=$row['market_type'];
		}
	}
	return $rel_arr;
}


//语言包输出
function weblangs(){
	if(file_exists(LANG_PATH.'lang_'.$GLOBALS['lang'].'.php')){include(LANG_PATH.'lang_'.$GLOBALS['lang'].'.php');}
	return $language;
}

//flash幻灯
function flash_ad(){
global $lang;
$rel_info=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."flash_info where lang='{$lang}'");
$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."flash_ad where lang='".$lang."' order by pic_order asc");
$style=isset($rel_info[0]['flash_style'])?$rel_info[0]['flash_style']:1;
include(CMS_PATH.'data/flash_ad/ad_'.$style.'/flash_ad.php');
}


//列表页栏目输出
function get_list_nav($tpl_id){
	if(empty($tpl_id)){$cate=$GLOBALS['cate_id'];}
	//获取后台配置信息
	$sql="select id from ".DB_PRE."tpl where lang='".$GLOBALS['lang']."' and tpl_id='".$tpl_id."'";
	$t_id=$GLOBALS['mysql']->fetch_asc($sql);
	$tpl_arr=get_tpl_tag_value($t_id[0]['id']);
	$cate=empty($tpl_arr[0])?$cate:$tpl_arr[0];
	if(file_exists(DATA_PATH.'cache_cate/cate_list_'.$GLOBALS['lang'].'.php')){
		 	include(DATA_PATH.'cache_cate/cate_list_'.$GLOBALS['lang'].'.php');
	}
	$nav_arr=array();
	if(!empty($cate_list)){
			foreach($cate_list as $k=>$v){
				if($v['cate_parent']==$cate&&!$v['cate_hide']){
				$path=CMS_SELF;
				$nav_arr[$k]['target']=intval($v['cate_is_open'])?'target="_blank"':'';//新窗口
				if($v['cate_tpl']==2){
					$nav_arr[$k]['url']=$v['cate_url'];
				}else{
					$nav_arr[$k]['url']=(($v['cate_html'])&&($_confing['web_html'][0]))?$path.'htm/'.$v['cate_fold_name']:$path.'show_list.php?id='.$v['id'];
				if($v['cate_tpl']==3){
						$nav_arr[$k]['url']=($v['cate_html']&&$_confing['web_html'][0])?$path.'htm/'.$v['cate_fold_name'].'/index_'.$lang.'.html':$path.'show_list.php?id='.$v['id'];
					}
				}	
				if($v['id']==$cateid){
					$nav_arr[$k]['class']="focus";
				}
				$nav_arr[$k]['cate_name']=$v['cate_name'];
				}
			}
		}
		if(!empty($nav_arr)){
		$i=1;
		$num=count($nav_arr);
		foreach($nav_arr as $k=>$v){
			$nav_arr[$k]['autoindex']=$i;
			$nav_arr[$k]['first']=($i==1)?1:0;
			$nav_arr[$k]['last']=($num==$i)?1:0;
			$i=$i+1;
		}
		}
		return $nav_arr;
}

//友情链接
function get_link(){
	global $lang;
	$sql="select * from ".DB_PRE."link where lang='{$lang}' order by link_order desc";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	$rel_arr=array();
	if(!empty($rel)){
		foreach($rel as $k=>$v){
			$rel_arr[$k]['link_name']=$v['link_name'];
			$rel_arr[$k]['link_url'] =$v['link_url'];
		}
	}
	return $rel_arr;
}


//列表分页
function list_page(){
	global $page,$cat_id,$r_count,$page_size,$page_count,$ishtml;
	return page('show_list.php',$page,'&id='.$cat_id,$r_count,$page_count,$cat_id,$ishtml);
}

//输出内容列表
function get_article($tpl_id=''){
	global $lang;
	$_confing=get_confing($lang);
	//配置信息不为空则输出配置内容
	if(empty($tpl_id)){return;}
	//获取后台配置信息
	$sql="select id from ".DB_PRE."tpl where lang='".$GLOBALS['lang']."' and tpl_id='".$tpl_id."'";
	$t_id=$GLOBALS['mysql']->fetch_asc($sql);
	$tpl_arr=get_tpl_tag_value($t_id[0]['id']);
	$a_category=isset($tpl_arr[0])?$tpl_arr[0]:0;
	if(empty($a_category)){return;}
	//获取频道表，只能获取父级栏目频道表
	if(file_exists(DATA_PATH.'cache_cate/cache_category_all.php')){include(DATA_PATH.'cache_cate/cache_category_all.php');}
	if(file_exists(DATA_PATH.'cache_channel/cache_channel_all.php')){include(DATA_PATH.'cache_channel/cache_channel_all.php');}
	$cate_info=get_cate_info($a_category,$category);
	$channel_info=get_cate_info($cate_info['cate_channel'],$channel);
	$table=$channel_info['channel_table'];
	//取得子栏目
	$child=get_child_id($a_category);
	$a_category=empty($child)?$a_category:$a_category.$child;

	$sql="select m.*,f.* from ".DB_PRE."maintb as m left join ".DB_PRE.$table." as f on m.id=f.id where ";
	$sql_all=empty($a_channel)?"m.category in (".$a_category.")":"m.channel=".$a_channel;
	$sql_all.=" and m.lang='{$lang}' ";
	//图片
	$sql_all.=$tpl_arr[1]?"and tbpic<>'' ":"";
	//标志
	switch($tpl_arr[2]){
		case 'a':
		$sql_all.="and m.filter like '{$tpl_arr[2]}%' ";
		break;
		case 'b':
		$sql_all.="and m.filter like '{$tpl_arr[2]}%' ";
		break;
		case 'c':
		$sql_all.="and m.filter like '{$tpl_arr[2]}%' ";
		break;
		default:
		$sql_all.='';
		break;
	}
	//排序
	switch($tpl_arr[3]){
		case '4':
		$sql_all.='order by m.hits';
		break;
		case '2':
		$sql_all.='order by m.id';
		break;
		case '1':
		$sql_all.='order by m.addtime';
		break;
		case '3':
		$sql_all.='order by m.updatetime';
		default:
		$sql_all.='';
		break;
	}
	//升降
	$sql_all.=$tpl_arr[4]?' desc':' asc';
	//数量
	if(isset($tpl_arr[5])){$num_arr=explode(',',$tpl_arr[5]);}
	$from_num=isset($num_arr[0])?$num_arr[0]:0;
	$end_num=isset($num_arr[1])?$num_arr[1]:0;
	$sql_all.=" limit {$from_num},{$end_num}";
	$sql.=$sql_all;
    $rel=$GLOBALS['mysql']->fetch_asc($sql);
	if(!empty($rel)){
		$i=1;
		$num=count($rel);
		$path=CMS_SELF;
		foreach($rel as $k=>$v){
			if($titlelen){
				$rel[$k]['title']=cn_substr($v['title'],$titlelen);
			}
			//标题样式
			if($rel[$k]['title_color']||$rel[$k]['title_style']){
			$font_style='<font style="';
			$font_style.=empty($rel[$k]['title_color'])?'':'color:'.$rel[$k]['title_color'].';';
			if($rel[$k]['title_style']==1){
			$font_style.='font-weight:bold;';
			}elseif($rel[$k]['title_style']==2){
				$font_style.='font-style:italic;';
			}elseif($rel[$k]['title_style']==3){
				$font_style.='text-decoration:underline;';
			}
			$font_style.='">';
			//配置标题长度只处理样式标题长度
			$font_style.=empty($tpl_arr[6])?$rel[$k]['title']:cn_substr($rel[$k]['title'],$tpl_arr[6]);
			$font_style.="</font>";
			$rel[$k]['style_title']=$font_style;//样式标题
			}else{
			$rel[$k]['style_title']=empty($tpl_arr[6])?$rel[$k]['title']:cn_substr($rel[$k]['title'],$tpl_arr[6]);
			}
			
			$rel[$k]['target']=$v['is_open']?'target="_blank"':'';//新窗口
			$rel[$k]['url']=((!$v['is_html'])&&($_confing['web_html'][0])&&(!$v['purview']))?$path.$v['url']:$path.'show_content.php?id='.$v['id'];
			$rel[$k]['url']=($v['is_url'])?$v['url_add']:$rel[$k]['url'];
			$v['tbpic']=empty($v['tbpic'])?'no_pc.gif':$v['tbpic'];
			$rel[$k]['tbpic']=$path.'upload/'.$v['tbpic'];
			$rel[$k]['autoindex']=$i;
			$rel[$k]['first']=($i==1)?1:0;
			$rel[$k]['num']=$i;
			$rel[$k]['last']=($num==$i)?1:0;
			$i=$i+1;
		}
	}
	return $rel;
}

//标示内容
function get_block($tpl_id){
	if(empty($tpl_id)){return;}
	//获取后台配置信息
	$sql="select id from ".DB_PRE."tpl where lang='".$GLOBALS['lang']."' and tpl_id='".$tpl_id."'";
	$t_id=$GLOBALS['mysql']->fetch_asc($sql);
	$tpl_arr=get_tpl_tag_value($t_id[0]['id']);
	if(empty($tpl_arr[0])){return;}
	$block=$GLOBALS['mysql']->fetch_asc("select content from ".DB_PRE."block where id=".$tpl_arr[0]);
	return $block[0]['content'];
}

//输出语言种类
//$row输出数量
function lang($row=''){
	if(file_exists(DATA_PATH.'cache/lang_cache.php')){include(DATA_PATH.'cache/lang_cache.php');}
	global $lang;
	$_confing=get_confing($lang);//获取当前语言网站的配置信息
	$path=CMS_SELF;//安装根目录
	$arr=array();
	if(!empty($lang_cache)){
	$num=count($lang_cache);
	$i=0;
		foreach($lang_cache as $k=>$v){
			if(!$v['lang_is_use']){
				unset($lang_cache[$k]);
				continue;
			}
			if($v['lang_is_url']){
			$arr[$k]['url']=$v['lang_url'];
			}else{
			if(file_exists(DATA_PATH.$v['lang_tag'].'_info.php')){include(DATA_PATH.$v['lang_tag'].'_info.php');}
			$is_html=isset($_confing['web_html'][0])?$_confing['web_html'][0]:'';
			$arr[$k]['url']=($is_html)?$path.'index_'.$v['lang_tag'].'.html':$path.'index.php?lang='.$v['lang_tag'];
			unset($_confing);
			}
			$arr[$k]['target']=$v['lang_is_open']?'target="_blank"':'';//新窗口
			$arr[$k]['class']=($v['lang_tag']==$lang)?"class=\"focus\"":"";
			$arr[$k]['lang_name']=$v['lang_name'];
			$arr[$k]['first']=($i==0)?1:0;
			$i=$i+1;
			$arr[$k]['last']=($num==$i)?1:0;
			
		}
	}
	return $arr;
}

//中间导航
function nav_middle(){
	global $lang,$cat_id,$cateid;
	$_confing=get_confing($lang);//获取当前语言网站的配置信息
	$rel=array();
	$cat_id=empty($cat_id)?$cateid:$cat_id;//判断当前栏目ID，输出高亮
	if(file_exists(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php')){
		include(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php');
	}
	if(!empty($cate_list)){
		foreach($cate_list as $k=>$v){
		$cate_nav=empty($v['cate_nav'])?array(''):explode(',',$v['cate_nav']);
		if(in_array('2',$cate_nav)){
			if($v['cate_hide']){
				unset($cate_list[$k]);
				continue;
			}
			$path=CMS_SELF;
			$rel[$k]=$cate_list[$k];
			if($v['cate_tpl']==2){
				$url=$v['cate_url'];
			}else{
				$url=($v['cate_html']&&$_confing['web_html'][0])?$path.'htm/'.$v['cate_fold_name']:$path.'show_list.php?id='.$v['id'];
			if($v['cate_tpl']==3){
				$url=($v['cate_html']&&$_confing['web_html'][0])?$path.'htm/'.$v['cate_fold_name'].'/index_'.$lang.'.html':$path.'show_list.php?id='.$v['id'];
			}
			}
			
			$rel[$k]['class']='';
			if($cat_id==$v['id']){$rel[$k]['class']="focus";}
			$rel[$k]['url']=$url;
			$rel[$k]['cate_name']=$v['cate_name'];
			$rel[$k]['target']=intval($v['cate_is_open'])?'target="_blank"':'';
			$rel[$k]['child']=get_child_cate($v['id'],$lang);
		}else{
			unset($cate_list[$k]);
		}
		}
	}
	//存在留言本放在后面
	$sql="select book_pos from ".DB_PRE."book_info where id=1";
	$pos=$GLOBALS['mysql']->get_row($sql);
	$pos_arr=empty($pos)?array():explode(',',$pos);
	$is_book=(is_array($pos_arr))?in_array('1',$pos_arr):'';
	if($is_book){
		$book['cate_name']=$GLOBALS['language']['book'];
		$book['url']=CMS_SELF.'book.php?lang='.$lang;
		$rel[]=$book;
	}
	
	if(!empty($rel)){
		$i=1;
		$num=count($rel);
		foreach($rel as $k=>$v){
			$rel[$k]['autoindex']=$i;
			$rel[$k]['first']=($i==1)?1:0;
			$rel[$k]['last']=($num==$i)?1:0;
			$i=$i+1;
		}
	}
	return $rel;
}

//底部导航
function nav_bottom(){
	global $lang,$cat_id,$language;
	if(file_exists(DATA_PATH.$lang.'_info.php')){include(DATA_PATH.$lang.'_info.php');}
	$_confing=get_confing($lang);
	if(file_exists(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php')){
		include(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php');
	}
	$rel=array();
	$path=CMS_SELF;
	if(!empty($cate_list)){
		foreach($cate_list as $k=>$v){
		$cate_nav=empty($v['cate_nav'])?array(''):explode(',',$v['cate_nav']);
		if(in_array('3',$cate_nav)){
			if($v['cate_hide']){
				unset($cate_list[$k]);
				continue;
			}
			
			$rel[$k]=$cate_list[$k];
			$rel[$k]['target']=intval($v['cate_is_open'])?'target="_blank"':'';//新窗口
			if($v['cate_tpl']==2){
			$url=$v['cate_url'];
			}else{
			$url=($v['cate_html']&&$_confing['web_html'][0])?$path.'htm/'.$v['cate_fold_name']:$path.'show_list.php?id='.$v['id'];
			if($v['cate_tpl']==3){
			$url=($v['cate_html']&&$_confing['web_html'][0])?$path.'htm/'.$v['cate_fold_name'].'/index_'.$lang.'.html':$path.'show_list.php?id='.$v['id'];
			}
			}
			$rel[$k]['url']=$url;
		}else{
			unset($cate_list[$k]);
		}
		}
	}
	
	$map_arr['url']=$_confing['web_html'][0]?$path.'htm/'.$lang.'_sitemap.html':$path.'sitemap.php?lang='.$lang;
	$map_arr['cate_name']=$language['sitemap'];
	$rel[]=$map_arr;
	//存在留言本放在后面
	$sql="select book_pos from ".DB_PRE."book_info where id=1";
	$pos=$GLOBALS['mysql']->get_row($sql);
	$pos_arr=empty($pos)?array():explode(',',$pos);
	$is_book=(is_array($pos_arr))?in_array('2',$pos_arr):'';
	if($is_book){
		$book['cate_name']=$GLOBALS['language']['book'];
		$book['url']=CMS_SELF.'book.php?lang='.$lang;
		$rel[]=$book;
	}
	if(!empty($rel)){
		$i=1;
		$num=count($rel);
		foreach($rel as $k=>$v){
			$rel[$k]['autoindex']=$i;
			$rel[$k]['first']=($i==1)?1:0;
			$rel[$k]['last']=($num==$i)?1:0;
			$i=$i+1;
		}
	}
	return $rel;
}

//热门搜索关键字
function get_hot_words(){
	if(file_exists(DATA_PATH.$GLOBALS['lang'].'_info.php')){include(DATA_PATH.$GLOBALS['lang'].'_info.php');}
	if(empty($_confing['hot_key'])){return;}
	$rel=explode('|',$_confing['hot_key']);
	$arr=array();
	foreach($rel as $k=>$v){
		$arr[$k]['url']=CMS_SELF.'search.php?lang='.$GLOBALS['lang'].'&key='.$v;
		$arr[$k]['name']=$v;
	}
	return $arr;
}

//搜索
function get_search(){
if(!empty($GLOBALS['key'])){
$rel_search=$GLOBALS['mysql']->fetch_asc('select*from '.DB_PRE."maintb where lang='".$GLOBALS['lang']."' and (title like '%".$GLOBALS['key']."%' or info like '%".$GLOBALS['key']."%') order by id desc limit ".$GLOBALS['pagenum'].",".$GLOBALS['pagesize']);
$rel=array();
if(!empty($rel_search)){
foreach($rel_search as $k=>$v){
	if($v['channel']==1){continue;}
	$rel[$k]['title']=str_replace($GLOBALS['key'],'<span style="color:red">'.$GLOBALS['key'].'</span>',$v['title']);
	$rel[$k]['info']=str_replace($GLOBALS['key'],'<span style="color:red">'.$GLOBALS['key'].'</span>',$v['info']);
	$rel[$k]['url']=((!$v['is_html'])&&($GLOBALS['_confing']['web_html'][0])&&(!$v['purview']))?CMS_SELF.$v['url']:CMS_SELF.'show_content.php?id='.$v['id'];
	$rel[$k]['url']=($v['is_url'])?$v['url_add']:$rel[$k]['url'];
}
}
}
return $rel;
}


//搜索列表分页
function get_search_page(){
	global $page,$query,$total_num,$total_page;
	return page('search.php',$page,$query,$total_num,$total_page);
}

//网站地图
function get_sitemap(){
	$_confing=get_confing($GLOBALS['lang']);
	$parent=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."category where cate_parent=0 and lang='".$GLOBALS['lang']."' order by cate_order desc");
	$path=CMS_SELF;
	$rel=array();
	if(!empty($parent)){
		foreach($parent as $row){
			$url=($row['cate_html']&&$_confing['web_html'][0])?$path.'htm/'.$row['cate_fold_name']:$path.'show_list.php?id='.$row['id'];
			if($row['cate_tpl']==3){
			$url=($row['cate_html']&&$_confing['web_html'][0])?$path.'htm/'.$row['cate_fold_name'].'/index_'.$lang.'.html':$path.'show_list.php?id='.$row['id'];
			}
			$rel[$row['id']]['url']=$url;
			$rel[$row['id']]['name']=$row['cate_name'];
			$rel[$row['id']]['child']=get_sitemap_child($row['id']);
			
		}
	}
	return $rel;
}

?>