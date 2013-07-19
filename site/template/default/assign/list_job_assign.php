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
$tpl->assign('list_job_nav',get_list_nav('list_job_nav'));//招聘列表页导航
$tpl->assign('list_job_link',get_block('list_job_link'));//招聘列表页联系我们
$tpl->assign('list_job_article',get_article('list_job_article'));//热门内容
$tpl->assign('list_job_product',get_article('list_job_product'));//推荐产品
$tpl->assign('list',list_article());//内容列表
$tpl->assign('list_page',list_page());//列表分页
$tpl->assign('market',get_market());//客服

?>
