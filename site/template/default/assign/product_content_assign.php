<?php
/**
 * $Author: BEESCMS $
 * ============================================================================
 * 网站地址: http://www.beescms.com
 * 您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
*/
$tpl->assign('langs',lang());//语言种类
$tpl->assign('lang',$lang);
$tpl->assign('language',weblangs());//语言包变量
$tpl->assign('webinfo',webinfo());//网站配置信息，用于优化
$tpl->assign('cateinfo',cateinfo());//栏目优化
$tpl->assign('nav_middle',nav_middle());//中间导航
$tpl->assign('nav_bottom',nav_bottom());//底部导航
$tpl->assign('hot_key',get_hot_words());//搜索热门词
$tpl->assign('content_pr_nav',get_list_nav('content_pr_nav'));//产品内容页导航
$tpl->assign('content_pr_link',get_block('content_pr_link'));//产品内容页联系我们
$tpl->assign('content_pr_article',get_article('content_pr_article'));//产品内容页热门内容
$tpl->assign('content_pr_product',get_article('content_pr_product'));//产品内容页推荐产品
$tpl->assign('content',$content);//内容页各内容
$tpl->assign('body_pages',body_pages());//内容页分页
$tpl->assign('album',album('pics'));//相册
$tpl->assign('form',form('pr_form'));//表单
$tpl->assign('market',get_market());//客服
?>
