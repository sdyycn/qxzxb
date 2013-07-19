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
$tpl->assign('nav_middle',nav_middle());//中间导航
$tpl->assign('nav_bottom',nav_bottom());//底部导航
$tpl->assign('article_pr',get_article('index_en_pr'));//产品展示
$tpl->assign('link_us',get_block('index_en_link'));//联系我们
$tpl->assign('about',get_block('index_en_company'));//简介
$tpl->assign('weblink',get_link());//友情链接
$tpl->assign('hot_key',get_hot_words());//搜索热门词
$tpl->assign('market',get_market());//客服
?>
