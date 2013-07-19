<?php
$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."admin`;","");
$data[]=array("CREATE TABLE `".DB_PRE."admin` (
  		`id` mediumint(8) NOT NULL auto_increment,
 		`admin_name` varchar(60) NOT NULL,
  		`admin_password` varchar(60) NOT NULL,
  		`admin_nich` varchar(60) NOT NULL,
 		`admin_purview` mediumint(8) NOT NULL,
 		`admin_admin` varchar(60) default NULL,
 		`admin_mail` varchar(60) default NULL,
 		`admin_tel` varchar(60) default NULL,
 		`is_disable` mediumint(8) NOT NULL default '0',
  		`admin_ip` varchar(60) default NULL,
  		`admin_time` varchar(60) default NULL,
 		PRIMARY KEY  (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;",
		"admin");
$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."admin_group`;","");
$data[]=array("CREATE TABLE `".DB_PRE."admin_group` (
  `id` mediumint(8) NOT NULL auto_increment,
  `admin_group_name` varchar(60) NOT NULL,
  `admin_group_info` varchar(255) default NULL,
  `admin_group_purview` varchar(60) NOT NULL COMMENT '分组权限-字符串以,分割',
  `is_disable` mediumint(8) NOT NULL default '0' COMMENT '是否禁用',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;","admin_group");
$data[]=array("INSERT INTO `".DB_PRE."admin_group` (`id`, `admin_group_name`, `admin_group_info`, `admin_group_purview`, `is_disable`) VALUES
(1, '超级管理员', '可以管理后台所有功能，没有任何限制', 'all_purview', 0),
(2, '信息发布员 ', '发布信息内容的管理员', 'content_create,content_edit', 0);
","");
$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."alone`;","");
$data[]=array("CREATE TABLE `".DB_PRE."alone` (
  `id` mediumint(8) NOT NULL,
  `content` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;","alone");
$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."article`;","");
$data[]=array("CREATE TABLE `".DB_PRE."article` (
  `id` mediumint(8) NOT NULL,
  `content` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;","article");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."auto_fields`;","");
$data[]=array("CREATE TABLE `".DB_PRE."auto_fields` (
  `id` mediumint(8) NOT NULL auto_increment,
  `field_name` varchar(60) NOT NULL,
  `use_name` varchar(60) NOT NULL COMMENT '表单提示文字',
  `field_type` varchar(60) NOT NULL,
  `field_value` varchar(255) default NULL COMMENT '字段默认值',
  `field_length` mediumint(8) default NULL,
  `channel_id` mediumint(8) NOT NULL COMMENT '所属频道id',
  `field_info` varchar(255) default NULL COMMENT '字段提示信息',
  `is_disable` mediumint(8) NOT NULL,
  `check_value` varchar(60) default NULL,
  `field_order` mediumint(8) NOT NULL default '10',
  `is_del` mediumint(8) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;","auto_fields");
$data[]=array("INSERT INTO `".DB_PRE."auto_fields` (`id`, `field_name`, `use_name`, `field_type`, `field_value`, `field_length`, `channel_id`, `field_info`, `is_disable`, `check_value`, `field_order`, `is_del`) VALUES
(1, 'content', '内容', 'html', '', 255, 2, '', 0, NULL, 1, 1),
(2, 'model', '型号', 'text', '', 255, 3, '', 0, NULL, 1, 1),
(3, 'spec', '规格', 'text', '', 255, 3, '', 0, NULL, 2, 1),
(4, 'marketprice', '市场价格', 'text', '', 255, 3, '', 0, NULL, 3, 0),
(28, 'content', '详细内容', 'html', '', 255, 5, '', 0, NULL, 16, 1),
(6, 'down', '下载地址', 'upload_file', '', 255, 4, '', 0, NULL, 1, 1),
(27, 'content', '详细内容', 'html', '', 255, 4, '', 0, NULL, 4, 1),
(9, 'jobtype', '工作性质', 'text', '', 255, 5, '', 0, NULL, 1, 0),
(10, 'jobnum', '招聘人数', 'text', '', 255, 5, '', 0, NULL, 2, 0),
(11, 'jobexp', '工作经验', 'text', '', 255, 5, '', 0, NULL, 3, 0),
(12, 'jopaddress', '工作地点', 'text', '', 255, 5, '', 0, NULL, 5, 0),
(13, 'jobage', '年龄', 'text', '', 255, 5, '', 0, NULL, 6, 0),
(14, 'jobheight', '身高', 'text', '不限', 255, 5, '单位厘米', 0, NULL, 10, 0),
(15, 'joblanguage', '语言及水平要求', 'text', '不限', 255, 5, '', 0, NULL, 8, 0),
(16, 'joblasttime', '截止日期', 'text', '2011-1-2', 255, 5, '', 0, NULL, 9, 0),
(17, 'jobsalary', '待遇', 'text', '', 255, 5, '', 0, NULL, 10, 0),
(18, 'jobedu', '学历', 'select', '不限,初中,高中,中专,本科,硕士,博士,博士以上', 255, 5, '', 0, NULL, 11, 0),
(19, 'jobsex', '性别', 'radio', '不限,男,女', 255, 5, '', 0, NULL, 12, 0),
(20, 'jobtel', '联系电话', 'text', '', 255, 5, '', 0, NULL, 13, 0),
(21, 'jobmail', 'EMail', 'text', '', 255, 5, '', 0, NULL, 14, 0),
(22, 'jobweb', '网址', 'text', '', 255, 5, '', 0, NULL, 15, 0),
(26, 'content', '详细介绍', 'html', '', 255, 3, '', 0, NULL, 4, 1),
(24, 'content', '详细内容', 'html', '', 255, 1, '', 0, NULL, 1, 1),
(25, 'pics', '产品图片', 'upload_pic_more', '', 255, 3, '', 0, NULL, 10, 0),
(29, 'filesize', '文件大小', 'text', '', 255, 4, '单位为K', 0, NULL, 3, 1),
(30, 'filetype', '文件类型', 'select', '.exe,.rar,其他', 255, 4, '', 0, NULL, 2, 1),
(32, 'wholesale', '批发说明', 'textarea', '我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发', 255, 3, '', 0, NULL, 6, 0),
(33, 'shipping', '运费说明', 'textarea', '申通快递：江浙沪首重3公斤--5元，续重超过的，加收10元，除新疆，西藏，甘肃，宁夏，内蒙古，青海等地运费首重1公斤18元，续重加收18元，其他省份均为首重1公斤10元，续重加收10元。', 255, 3, '', 0, NULL, 7, 0),
(34, 'trading', '交易方式', 'textarea', '', 255, 3, '', 0, NULL, 8, 0),
(35, 'contact', '联系方式', 'textarea', '<br>电话：\r\n<br>移动电话：\r\n<br>传真：\r\n<br>地址：\r\n<br>邮编：\r\n<br>公司网站：http://www.beescms.com', 255, 3, '', 0, NULL, 9, 0);","");
$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."block`;","");
$data[]=array("CREATE TABLE `".DB_PRE."block` (
  `id` mediumint(9) NOT NULL auto_increment,
  `tag` varchar(60) NOT NULL,
  `content` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;","block");
$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."category`;","");
$data[]=array("CREATE TABLE `".DB_PRE."category` (
  `id` mediumint(8) NOT NULL auto_increment,
  `cate_name` varchar(60) NOT NULL,
  `cate_mb_is` mediumint(8) NOT NULL,
  `cate_hide` mediumint(8) NOT NULL,
  `cate_channel` mediumint(8) NOT NULL,
  `cate_fold_name` varchar(60) NOT NULL,
  `cate_order` mediumint(8) NOT NULL,
  `cate_rank` mediumint(8) default '0',
  `cate_tpl` mediumint(8) NOT NULL,
  `cate_tpl_index` varchar(60) default NULL,
  `cate_tpl_list` varchar(60) default NULL,
  `cate_tpl_content` varchar(60) default NULL,
  `cate_title_seo` varchar(60) default NULL,
  `cate_key_seo` varchar(60) default NULL,
  `cate_info_seo` varchar(350) default NULL,
  `lang` varchar(60) NOT NULL,
  `cate_parent` mediumint(8) NOT NULL,
  `cate_html` mediumint(8) NOT NULL default '0',
  `cate_nav` varchar(60) NOT NULL default '0',
  `is_content` mediumint(8) default '0',
  `cate_url` varchar(60) default NULL,
  `cate_is_open` mediumint(8) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;","category");
$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."channel`;","");
$data[]=array("CREATE TABLE `".DB_PRE."channel` (
  `id` mediumint(8) NOT NULL auto_increment,
  `channel_name` varchar(60) NOT NULL,
  `channel_mark` varchar(60) NOT NULL,
  `channel_table` varchar(60) NOT NULL,
  `is_disable` mediumint(8) NOT NULL,
  `is_member` mediumint(8) NOT NULL,
  `channel_mb_grade` mediumint(8) default '0',
  `is_verify` mediumint(8) NOT NULL COMMENT '发布内容是否审核',
  `is_del` mediumint(8) NOT NULL default '0',
  `channel_order` mediumint(8) NOT NULL default '10',
  `is_alone` mediumint(8) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;","channel");

$data[]=array("INSERT INTO `".DB_PRE."channel` (`id`, `channel_name`, `channel_mark`, `channel_table`, `is_disable`, `is_member`, `channel_mb_grade`, `is_verify`, `is_del`, `channel_order`, `is_alone`) VALUES
(1, '单页模型', 'alone', 'alone', 0, 0, 2, 0, 1, 5, 1),
(2, '文章模块', 'article', 'article', 0, 0, 2, 0, 0, 1, 0),
(3, '产品模块', 'product', 'product', 0, 0, 2, 0, 0, 2, 0),
(4, '下载模块', 'down', 'down', 0, 0, 2, 0, 0, 3, 0),
(5, '招聘模块', 'job', 'job', 0, 0, 2, 0, 0, 4, 0);
","");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."cmsinfo`;","");
$data[]=array("CREATE TABLE `".DB_PRE."cmsinfo` (
  `id` mediumint(8) NOT NULL auto_increment,
  `info_tag` varchar(60) default NULL COMMENT '配置信息标识',
  `info_array` text COMMENT '配置信息内容',
  `info_name` varchar(60) default NULL COMMENT '配置信息名',
  `lang_tag` varchar(60) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;","cmsinfo");

$data[]=array("INSERT INTO `".DB_PRE."cmsinfo` (`id`, `info_tag`, `info_array`, `info_name`, `lang_tag`) VALUES
(1, 'sys', 'array (\n  ''web_upload_image'' => ''jpg|gif|jpeg'',\n  ''web_upload_file'' => ''zip|gz|rar|iso|doc|xsl|ppt|wps|swf|mpg|mp3|rm|rmvb|wmv|wma|wav|mid|mov'',\n  ''thump_width'' => ''300'',\n  ''thump_height'' => ''200'',\n  ''upload_size'' => ''1024000'',\n  ''web_member'' => \n  array (\n    0 => ''1'',\n  ),\n  ''is_member'' => \n  array (\n    0 => ''1'',\n  ),\n  ''member_mail'' => \n  array (\n    0 => ''1'',\n  ),\n  ''member_name_length'' => ''10'',\n  ''member_pass_length'' => ''10'',\n  ''member_upload'' => ''323'',\n  ''member_no_name'' => ''4344'',\n  ''image_is'' => \n  array (\n    0 => ''1'',\n  ),\n  ''image_url_is'' => \n  array (\n    0 => ''1'',\n  ),\n  ''image_type'' => \n  array (\n    0 => ''1'',\n  ),\n  ''image_height'' => ''50'',\n  ''image_width'' => ''50'',\n  ''image_text'' => ''www.beescms.com'',\n  ''image_text_color'' => ''0,0,0'',\n  ''image_text_size'' => ''12'',\n  ''pic'' => ''mark_logo.gif'',\n  ''image_position'' => \n  array (\n    0 => ''9'',\n  ),\n  ''safe_open'' => \n  array (\n    0 => ''1'',\n    1 => ''2'',\n    2 => ''3'',\n  ),\n  ''safe_type'' => ''1'',\n  ''safe_height'' => ''50'',\n  ''safe_width'' => ''50'',\n  ''safe_num'' => ''5'',\n  ''web_pagesize'' => ''20'',\n  ''web_writer'' => ''admin'',\n  ''is_hits'' => ''0'',\n  ''fialt_words'' => ''她妈|它妈|他妈|你妈|去死|贱人|非典|艾滋病|阳痿'',\n)', '系统配置', NULL),
(2, 'index_info', 'array (\n  ''flash_is'' => \n  array (\n    0 => ''0'',\n  ),\n  ''lang_btn_is'' => \n  array (\n    0 => ''0'',\n  ),\n  ''flash_url'' => ''gfgfdg545'',\n  ''flash_height'' => ''46'',\n  ''flash_width'' => ''656'',\n  ''index_lang'' => ''9'',\n)', '首页配置', NULL);
","");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."down`;","");
$data[]=array("CREATE TABLE `".DB_PRE."down` (
  `id` mediumint(8) NOT NULL,
  `down` varchar(255) default NULL,
  `body` text,
  `content` text,
  `filesize` varchar(255) default NULL,
  `filetype` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;","down");
$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."form`;","");
$data[]=array("CREATE TABLE `".DB_PRE."form` (
  `id` mediumint(8) NOT NULL auto_increment,
  `form_name` varchar(60) NOT NULL,
  `form_mark` varchar(60) NOT NULL,
  `is_disable` mediumint(8) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;","form");

$data[]=array("INSERT INTO `".DB_PRE."form` (`id`, `form_name`, `form_mark`, `is_disable`) VALUES
(5, '产品反馈', 'prinfo', 0);","form");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."formfield`;","");
$data[]=array("CREATE TABLE `".DB_PRE."formfield` (
  `id` mediumint(8) NOT NULL auto_increment,
  `field_name` varchar(60) NOT NULL,
  `use_name` varchar(60) NOT NULL,
  `field_type` varchar(60) NOT NULL,
  `field_value` varchar(255) NOT NULL,
  `field_length` mediumint(8) NOT NULL,
  `form_id` mediumint(8) NOT NULL,
  `field_info` varchar(60) character set utf8 collate utf8_estonian_ci NOT NULL,
  `is_disable` mediumint(8) NOT NULL,
  `form_order` mediumint(8) NOT NULL default '0',
  `is_empty` mediumint(8) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;","formfield");

$data[]=array("INSERT INTO `".DB_PRE."formfield` (`id`, `field_name`, `use_name`, `field_type`, `field_value`, `field_length`, `form_id`, `field_info`, `is_disable`, `form_order`, `is_empty`) VALUES
(8, 'title', '主题', 'text', '', 255, 5, '', 0, 1, 0),
(9, 'user', '姓名', 'text', '', 255, 5, '', 0, 3, 0),
(10, 'sex', '性别', 'select', '保密,男士,女士', 255, 5, '', 0, 5, 1),
(11, 'infotype', '反馈类型', 'select', '建议,咨询,投诉,其它', 255, 5, '', 0, 2, 1),
(12, 'mail', '邮箱', 'text', '', 255, 5, '', 0, 6, 1),
(13, 'tel', '联系电话', 'text', '', 255, 5, '', 0, 4, 1),
(14, 'content', '咨询内容', 'textarea', '', 255, 5, '', 0, 7, 0);","formfield");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."formlist`;","");
$data[]=array("CREATE TABLE `".DB_PRE."formlist` (
  `id` mediumint(8) NOT NULL auto_increment,
  `form_id` mediumint(8) default NULL,
  `form_time` varchar(60) default NULL,
  `form_ip` varchar(60) default NULL,
  `is_read` mediumint(8) NOT NULL default '0',
  `member_id` mediumint(8) default '0',
  `arc_id` mediumint(8) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","formlist");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."job`;","");
$data[]=array("CREATE TABLE `".DB_PRE."job` (
  `id` mediumint(8) NOT NULL,
  `jobtype` varchar(255) default NULL,
  `jobnum` varchar(255) default NULL,
  `jobexp` varchar(255) default NULL,
  `jopaddress` varchar(255) default NULL,
  `jobage` varchar(255) default NULL,
  `jobheight` varchar(255) default NULL,
  `joblanguage` varchar(255) default NULL,
  `joblasttime` varchar(255) default NULL,
  `jobsalary` varchar(255) default NULL,
  `jobedu` varchar(255) default NULL,
  `jobsex` varchar(255) default NULL,
  `jobtel` varchar(255) default NULL,
  `jobmail` varchar(255) default NULL,
  `jobweb` varchar(255) default NULL,
  `content` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;","job");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."lang`;","");
$data[]=array("CREATE TABLE `".DB_PRE."lang` (
  `id` mediumint(8) NOT NULL auto_increment,
  `lang_name` varchar(60) NOT NULL,
  `lang_order` mediumint(8) NOT NULL,
  `lang_tag` varchar(60) NOT NULL,
  `lang_is_use` mediumint(8) NOT NULL default '1',
  `lang_is_open` mediumint(8) NOT NULL,
  `lang_is_url` mediumint(8) NOT NULL,
  `lang_url` varchar(60) default NULL,
  `lang_is_fix` mediumint(8) NOT NULL default '0',
  `lang_main` mediumint(8) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;","lang");

$data[]=array("INSERT INTO `".DB_PRE."lang` (`id`, `lang_name`, `lang_order`, `lang_tag`, `lang_is_use`, `lang_is_open`, `lang_is_url`, `lang_url`, `lang_is_fix`, `lang_main`) VALUES
(10, 'English', 9, 'en', 1, 0, 0, 'http://', 0, 0),
(9, '简体中文', 10, 'cn', 1, 0, 0, 'http://', 1, 1);","");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."maintb`;","");
$data[]=array("CREATE TABLE `".DB_PRE."maintb` (
  `id` mediumint(8) NOT NULL auto_increment,
  `title` varchar(200) NOT NULL,
  `filter` varchar(60) default NULL,
  `tbpic` varchar(60) default NULL,
  `keywords` varchar(60) default NULL,
  `info` text,
  `author` varchar(60) default NULL,
  `source` varchar(60) default NULL,
  `hits` mediumint(8) NOT NULL default '0',
  `category` mediumint(8) NOT NULL,
  `channel` mediumint(9) NOT NULL,
  `addtime` varchar(60) NOT NULL,
  `updatetime` varchar(60) default NULL,
  `top` mediumint(8) NOT NULL,
  `purview` mediumint(8) NOT NULL COMMENT '浏览权限',
  `is_html` mediumint(8) NOT NULL COMMENT '1为动态浏览,0为静态',
  `verify` mediumint(8) NOT NULL default '0',
  `url` varchar(60) default NULL,
  `lang` varchar(60) default NULL,
  `is_url` mediumint(8) NOT NULL default '0',
  `url_add` varchar(60) default NULL,
  `title_color` varchar(60) default NULL,
  `title_style` mediumint(8) NOT NULL default '0',
  `is_open` mediumint(8) NOT NULL default '0',
  `cache_time` varchar(60) DEFAULT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","maintb");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."member`;","");
$data[]=array("CREATE TABLE `".DB_PRE."member` (
  `id` mediumint(8) NOT NULL auto_increment,
  `member_name` varchar(60) default NULL,
  `member_password` varchar(60) NOT NULL,
  `member_nich` varchar(60) NOT NULL,
  `member_purview` mediumint(8) NOT NULL default '0',
  `member_user` varchar(60) NOT NULL,
  `member_mail` varchar(60) NOT NULL,
  `member_tel` varchar(60) default NULL,
  `is_disable` mediumint(8) NOT NULL default '0',
  `member_ip` varchar(60) default NULL,
  `member_time` varchar(60) default NULL,
  `member_count` mediumint(8) NOT NULL default '0',
  `member_qq` varchar(60) default NULL,
  `member_phone` varchar(60) default NULL,
  `member_sex` mediumint(8) default '0',
  `member_addtime` varchar(60) default NULL,
  `member_birth` varchar(60) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;","member");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."member_group`;","");
$data[]=array("CREATE TABLE `".DB_PRE."member_group` (
  `id` mediumint(8) NOT NULL auto_increment,
  `member_group_name` varchar(60) NOT NULL,
  `member_group_info` varchar(255) NOT NULL,
  `is_disable` mediumint(8) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;","member_group");

$data[]=array("INSERT INTO `".DB_PRE."member_group` (`id`, `member_group_name`, `member_group_info`, `is_disable`) VALUES
(1, '注册会员', '注册完成的所有会员都是这个级别', 0),
(2, 'VIP会员', '注册会员通过管理后台升级的级别', 0);","");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."product`;","");
$data[]=array("CREATE TABLE `".DB_PRE."product` (
  `id` mediumint(8) NOT NULL,
  `model` varchar(255) default NULL,
  `spec` varchar(255) default NULL,
  `marketprice` varchar(255) default NULL,
  `pics` varchar(255) default NULL,
  `content` text,
  `wholesale` text,
  `shipping` text,
  `trading` text,
  `contact` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;","product");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."ask`;","");
$data[]=array("CREATE TABLE `".DB_PRE."ask` (
  `id` mediumint(8) NOT NULL auto_increment,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `addtime` varchar(60) NOT NULL,
  `reply` text,
  `member` mediumint(8) NOT NULL,
  `replytime` varchar(60) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","ask");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."link`;","");
$data[]=array("CREATE TABLE `".DB_PRE."link` (
  `id` mediumint(8) NOT NULL auto_increment,
  `link_url` varchar(60) character set utf8 NOT NULL,
  `link_name` varchar(60) character set utf8 NOT NULL,
  `link_logo` varchar(60) character set utf8 default NULL,
  `link_order` mediumint(8) NOT NULL default '1',
  `link_info` varchar(255) character set utf8 default NULL,
  `link_mail` varchar(60) character set utf8 default NULL,
  `lang` varchar(60) character set utf8 NOT NULL,
  `addtime` varchar(60) character set utf8 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","link");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."collect`;","");
$data[]=array("CREATE TABLE `".DB_PRE."collect` (
  `id` mediumint(8) NOT NULL auto_increment,
  `member_id` mediumint(8) NOT NULL,
  `arc_id` mediumint(8) NOT NULL,
  `addtime` varchar(60) character set utf8 NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","collect");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."prinfo`;","");
$data[]=array("CREATE TABLE `".DB_PRE."prinfo` (
  `id` mediumint(8) NOT NULL,
  `title` varchar(255) default NULL,
  `user` varchar(255) default NULL,
  `sex` varchar(255) default NULL,
  `infotype` varchar(255) default NULL,
  `mail` varchar(255) default NULL,
  `tel` varchar(255) default NULL,
  `content` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;","prinfo");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."market`;","");
$data[]=array("CREATE TABLE `".DB_PRE."market` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `market_name` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `market_type` mediumint(8) NOT NULL DEFAULT '0',
  `market_num` varchar(60) CHARACTER SET utf8 NOT NULL,
  `market_order` varchar(60) CHARACTER SET utf8 NOT NULL DEFAULT '10',
  `market_is` mediumint(8) NOT NULL DEFAULT '1',
  `lang` varchar(60) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","market");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."lang_cate`;","");
$data[]=array("CREATE TABLE `".DB_PRE."lang_cate` (
  `id` mediumint(8) NOT NULL auto_increment,
  `lang_cate` varchar(60) character set utf8 NOT NULL,
  `lang_info` text character set utf8,
  `lang` varchar(60) character set utf8 NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;","lang_cate");

$data[]=array("INSERT INTO `".DB_PRE."lang_cate` (`id`, `lang_cate`, `lang_info`, `lang`) VALUES
(1, '模板语言', '模板中使用到的语言，如栏目名等', 'cn'),
(2, '全局语言', '程序中使用的语言，为了程序运行正常，请勿删除', 'cn'),
(3, '信息提示', '前台一些反馈信息', 'cn'),
(4, '会员中心', '会员中心使用的导航等语言', 'cn'),
(18, '会员中心', '会员中心使用的导航等语言', 'en'),
(17, '信息提示', '前台一些反馈信息', 'en'),
(16, '全局语言', '程序中使用的语言，为了程序运行正常，请勿删除', 'en'),
(15, '模板语言', '模板中使用到的语言，如栏目名等', 'en');","lang_cate");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."lang_lang`;","");
$data[]=array("CREATE TABLE `".DB_PRE."lang_lang` (
  `id` mediumint(8) NOT NULL auto_increment,
  `lang_tag` varchar(60) character set utf8 NOT NULL,
  `lang_cate` mediumint(8) NOT NULL,
  `lang_value` varchar(240) character set utf8 default NULL,
  `lang` varchar(60) character set utf8 NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=266 ;","lang_lang");

$data[]=array("INSERT INTO `".DB_PRE."lang_lang` (`id`, `lang_tag`, `lang_cate`, `lang_value`, `lang`) VALUES
(5, 'pages', 2, '共', 'cn'),
(6, 'pagesize', 2, '条记录', 'cn'),
(7, 'page', 2, '当前第', 'cn'),
(8, 'pagehome', 2, '首页', 'cn'),
(9, 'pageend', 2, '尾页', 'cn'),
(10, 'pagapre', 2, '上一页', 'cn'),
(11, 'pagenext', 2, '下一页', 'cn'),
(12, 'pagego', 2, '转到', 'cn'),
(13, 'previous', 2, '上一条', 'cn'),
(14, 'next', 2, '下一条', 'cn'),
(15, 'nonestr', 2, '没有了', 'cn'),
(16, 'index', 2, '首页', 'cn'),
(17, 'sitemap', 1, '网站地图', 'cn'),
(19, 'index_news', 1, '新闻中心', 'cn'),
(20, 'index_company', 1, '公司简介', 'cn'),
(21, 'contact', 1, '联系方式', 'cn'),
(22, 'products', 1, '产品展示', 'cn'),
(23, 'products_nav', 1, '产品导航', 'cn'),
(24, 'links', 1, '友情链接', 'cn'),
(25, 'location', 1, '当前位置', 'cn'),
(26, 'rec_content', 1, '推荐产品', 'cn'),
(27, 'hot_content', 1, '热门内容', 'cn'),
(28, 'rec_products', 1, '推荐产品', 'cn'),
(29, 'like_content', 1, '相关内容', 'cn'),
(30, 'content_hits', 1, '点击次数', 'cn'),
(31, 'content_pubdate', 1, '更新时间', 'cn'),
(32, 'close', 1, '关闭', 'cn'),
(33, 'print', 1, '打印', 'cn'),
(34, 'add_favorites', 1, '加入收藏', 'cn'),
(35, 'current_time', 4, '当前时间', 'cn'),
(36, 'member_home', 4, '中心首页', 'cn'),
(37, 'member_info', 4, '用户信息', 'cn'),
(38, 'member_ask', 4, '会员咨询', 'cn'),
(39, 'member_fav', 4, '我的收藏', 'cn'),
(40, 'member_wel', 4, '欢迎你回来!', 'cn'),
(41, 'member_grade', 4, '用户级别', 'cn'),
(42, 'member_last_login', 4, '上次登陆时间', 'cn'),
(43, 'member_last_login_ip', 4, '上次登陆IP', 'cn'),
(44, 'member_login_num', 4, '登录次数', 'cn'),
(45, 'member_home_title', 4, '用户中心统计', 'cn'),
(46, 'member_birth', 4, '出生日期', 'cn'),
(47, 'member_sex', 4, '性别', 'cn'),
(48, 'member_sex_none', 4, '保密', 'cn'),
(49, 'member_sex_man', 4, '男', 'cn'),
(50, 'member_sex_woman', 4, '女', 'cn'),
(51, 'member_mail', 4, '电子邮件', 'cn'),
(52, 'member_js', 4, '联系QQ', 'cn'),
(53, 'member_tel', 4, '固定电话', 'cn'),
(54, 'member_phone', 4, '手机', 'cn'),
(55, 'sys_dec', 2, '参数说明', 'cn'),
(56, 'sys_value', 2, '参数值', 'cn'),
(57, 'sys_name', 2, '变量名', 'cn'),
(58, 'sys_submit', 2, '确定', 'cn'),
(59, 'sys_reset', 2, '取消', 'cn'),
(60, 'member_ask_manage', 4, '咨询管理', 'cn'),
(61, 'member_ask_add', 4, '添加咨询', 'cn'),
(62, 'member_ask_title', 4, '咨询标题', 'cn'),
(63, 'member_ask_content', 4, '咨询内容', 'cn'),
(64, 'sys_title', 2, '标题', 'cn'),
(65, 'sys_time', 2, '添加时间', 'cn'),
(66, 'sys_stas', 2, '状态', 'cn'),
(67, 'sys_caozuo', 2, '操作', 'cn'),
(68, 'member_password_old', 4, '旧密码', 'cn'),
(69, 'member_password_new', 4, '新密码', 'cn'),
(70, 'member_password_newt', 4, '确认新密码', 'cn'),
(71, 'member_index', 4, '网站首页', 'cn'),
(72, 'member_out', 4, '退出登陆', 'cn'),
(73, 'member_login_user', 4, '用户名', 'cn'),
(74, 'member_login_pass', 4, '登陆密码', 'cn'),
(75, 'member_login_code', 4, '验证码', 'cn'),
(76, 'member_login', 4, '登陆', 'cn'),
(77, 'member_regist', 4, '注册会员', 'cn'),
(78, 'member_reg_nich', 4, '昵称', 'cn'),
(79, 'member_reg_pass', 4, '登陆密码', 'cn'),
(80, 'member_reg_passt', 4, '确认密码', 'cn'),
(81, 'member_reg_mail', 4, '电子邮箱', 'cn'),
(82, 'member_reg_mail_info', 4, '每个电子邮邮箱只能注册一个帐号', 'cn'),
(83, 'member_login_info', 4, '账号登陆', 'cn'),
(84, 'member_msg', 4, '请先登录', 'cn'),
(85, 'member_msg2', 4, '验证码不正确', 'cn'),
(86, 'member_smg3', 4, '用户名或密码不能为空', 'cn'),
(87, 'member_msg3', 4, '用户名名或密码不正确', 'cn'),
(88, 'member_msg4', 4, '登录失败,该账号已被锁定', 'cn'),
(89, 'member_msg5', 4, '会员注册已经暂停', 'cn'),
(90, 'member_msg6', 4, '用户名只能是字母数字，4以上长度', 'cn'),
(91, 'member_msg7', 4, '昵称只能是字母数字，4以上长度', 'cn'),
(92, 'member_msg8', 4, '密码不能为空', 'cn'),
(93, 'member_msg9', 4, '两次密码不一样', 'cn'),
(94, 'member_msg10', 4, '邮箱不正确', 'cn'),
(95, 'member_msg11', 4, '该用户名不能注册', 'cn'),
(96, 'member_msg12', 4, '已经存在相同的用户名，请更换用户名', 'cn'),
(97, 'member_msg13', 4, '该邮箱已经被使用,请更换', 'cn'),
(98, 'member_msg14', 4, '用户注册成功', 'cn'),
(99, 'msg_info', 3, '不存在flash引导页模板', 'cn'),
(100, 'msg_info2', 3, '不存在【@】语言首页模板', 'cn'),
(101, 'msg_info3', 3, '找不到【@】语言模板文件', 'cn'),
(102, 'msg_info4', 3, '请先生成【@】语言首页', 'cn'),
(103, 'msg_info5', 3, '请先更新栏目缓存', 'cn'),
(104, 'msg_info6', 3, '请先更新频道缓存', 'cn'),
(105, 'msg_info7', 3, '你当前的会员权限不能浏览', 'cn'),
(106, 'msg_info8', 3, '该内容未审核,还不能浏览', 'cn'),
(107, 'msg_info9', 3, '还没有添加内容', 'cn'),
(108, 'tpl_look', 1, '详细查看', 'cn'),
(109, 'tpl_file_type', 1, '文件类型', 'cn'),
(110, 'tpl_file_size', 1, '文件大小', 'cn'),
(111, 'tpl_content', 1, '详细内容', 'cn'),
(112, 'tpl_dwon_add', 1, '下载地址', 'cn'),
(113, 'tpl_down', 1, '点击下载', 'cn'),
(114, 'tpl_jobtype', 1, '工作性质', 'cn'),
(115, 'tpl_jobnum', 1, '招聘人数', 'cn'),
(116, 'tpl_jobexp', 1, '工作经验', 'cn'),
(117, 'tpl_jobaddress', 1, '工作地点', 'cn'),
(118, 'tpl_jobage', 1, '年龄', 'cn'),
(119, 'tpl_joblanguage', 1, '语言及水平要求', 'cn'),
(120, 'tpl_joblasttime', 1, '截止日期', 'cn'),
(121, 'tpl_jobsalary', 1, '待遇', 'cn'),
(122, 'tpl_jobheight', 1, '身高', 'cn'),
(123, 'tpl_jobedu', 1, '学历', 'cn'),
(124, 'tpl_jobsex', 1, '性别', 'cn'),
(125, 'tpl_jobtel', 1, '联系电话', 'cn'),
(126, 'tpl_jobmail', 1, 'EMail', 'cn'),
(127, 'tpl_jobweb', 1, '网址', 'cn'),
(128, 'tpl_list', 1, '列表页', 'cn'),
(129, 'tpl_spec', 1, '产品规格', 'cn'),
(130, 'tpl_marketprice', 1, '产品价格', 'cn'),
(131, 'tpl_model', 1, '产品型号', 'cn'),
(132, 'tpl_pfsm', 1, '批发说明', 'cn'),
(133, 'tpl_yfsm', 1, '运费说明', 'cn'),
(134, 'tpl_jyfs', 1, '交易方式', 'cn'),
(135, 'tpl_fkxx', 1, '反馈信息', 'cn'),
(136, 'sitemap', 15, 'Site Map', 'en'),
(137, 'index_news', 15, 'News', 'en'),
(138, 'index_company', 15, 'Company Profile', 'en'),
(139, 'contact', 15, 'Contact', 'en'),
(140, 'products', 15, 'Products', 'en'),
(141, 'products_nav', 15, 'Navigation', 'en'),
(142, 'links', 15, 'Links', 'en'),
(143, 'location', 15, 'Location', 'en'),
(144, 'rec_content', 15, 'Recommended Content', 'en'),
(145, 'hot_content', 15, 'Popular content', 'en'),
(146, 'rec_products', 15, 'Recommended Products', 'en'),
(147, 'like_content', 15, 'Related Content', 'en'),
(148, 'content_hits', 15, 'Clicks', 'en'),
(149, 'content_pubdate', 15, 'Updated', 'en'),
(150, 'close', 15, 'Close', 'en'),
(151, 'print', 15, 'Print', 'en'),
(152, 'add_favorites', 15, 'Add to Favorites', 'en'),
(153, 'tpl_look', 15, 'Detailed View', 'en'),
(154, 'tpl_file_type', 15, 'File Type', 'en'),
(155, 'tpl_file_size', 15, 'File Size', 'en'),
(156, 'tpl_content', 15, 'Details', 'en'),
(157, 'tpl_dwon_add', 15, 'Download', 'en'),
(158, 'tpl_down', 15, 'Click to download', 'en'),
(159, 'tpl_jobtype', 15, 'Nature of work', 'en'),
(160, 'tpl_jobnum', 15, 'Number', 'en'),
(161, 'tpl_jobexp', 15, 'Work experience', 'en'),
(162, 'tpl_jobaddress', 15, 'Location', 'en'),
(163, 'tpl_jobage', 15, 'Age', 'en'),
(164, 'tpl_joblanguage', 15, 'Language and level requirements', 'en'),
(165, 'tpl_joblasttime', 15, 'Deadline', 'en'),
(166, 'tpl_jobsalary', 15, 'Treatment', 'en'),
(167, 'tpl_jobheight', 15, 'Height', 'en'),
(168, 'tpl_jobedu', 15, 'Education', 'en'),
(169, 'tpl_jobsex', 15, 'sex', 'en'),
(170, 'tpl_jobtel', 15, 'Contact', 'en'),
(171, 'tpl_jobmail', 15, 'EMail', 'en'),
(172, 'tpl_jobweb', 15, 'Website', 'en'),
(173, 'tpl_list', 15, 'List', 'en'),
(174, 'tpl_spec', 15, 'Product Specifications', 'en'),
(175, 'tpl_marketprice', 15, 'Product Price', 'en'),
(176, 'tpl_model', 15, 'Product Type', 'en'),
(177, 'tpl_pfsm', 15, 'Wholesale Help', 'en'),
(178, 'tpl_yfsm', 15, 'Shipping instructions', 'en'),
(179, 'tpl_jyfs', 15, 'Trading', 'en'),
(180, 'tpl_fkxx', 15, 'Feedback', 'en'),
(181, 'pages', 16, 'total', 'en'),
(182, 'pagesize', 16, 'Records', 'en'),
(183, 'page', 16, 'Current', 'en'),
(184, 'pagehome', 16, 'Home', 'en'),
(185, 'pageend', 16, 'Last', 'en'),
(186, 'pagapre', 16, 'Previous', 'en'),
(187, 'pagenext', 16, 'Next', 'en'),
(188, 'pagego', 16, 'Go', 'en'),
(189, 'previous', 16, 'Previous', 'en'),
(190, 'next', 16, 'Next', 'en'),
(191, 'nonestr', 16, 'None', 'en'),
(192, 'index', 16, 'Home', 'en'),
(193, 'sys_dec', 16, 'Parameter Description', 'en'),
(194, 'sys_value', 16, 'Parameter values', 'en'),
(195, 'sys_name', 16, 'Variable name', 'en'),
(196, 'sys_submit', 16, 'OK', 'en'),
(197, 'sys_reset', 16, 'Reset', 'en'),
(198, 'sys_title', 16, 'Title', 'en'),
(199, 'sys_time', 16, 'Add Time', 'en'),
(200, 'sys_stas', 16, 'Status', 'en'),
(201, 'sys_caozuo', 16, 'Operation', 'en'),
(202, 'msg_info', 17, 'There is no template to guide page', 'en'),
(203, 'msg_info2', 17, 'There is no language page templates 【@】', 'en'),
(204, 'msg_info3', 17, '【@】 Language can not find the template file', 'en'),
(205, 'msg_info4', 17, 'Please generate 【@】 Language Home', 'en'),
(206, 'msg_info5', 17, 'Please update column cache', 'en'),
(207, 'msg_info6', 17, '请先更新频道缓存', 'en'),
(208, 'msg_info7', 17, 'You can not view the current membership privilege', 'en'),
(209, 'msg_info8', 17, 'The content is not reviewed, and can not browse', 'en'),
(210, 'msg_info9', 17, 'No Contents', 'en'),
(211, 'current_time', 18, 'Current time', 'en'),
(212, 'member_home', 18, 'Home', 'en'),
(213, 'member_info', 18, 'User Information', 'en'),
(214, 'member_ask', 18, 'Member Advisory', 'en'),
(215, 'member_fav', 18, 'Favorites', 'en'),
(216, 'member_wel', 18, 'Welcome back!', 'en'),
(217, 'member_grade', 18, 'User level', 'en'),
(218, 'member_last_login', 18, 'Last login time', 'en'),
(219, 'member_last_login_ip', 18, 'Last Login IP', 'en'),
(220, 'member_login_num', 18, 'Login times', 'en'),
(221, 'member_home_title', 18, 'Users statistics', 'en'),
(222, 'member_birth', 18, 'Date of birth', 'en'),
(223, 'member_sex', 18, 'sex', 'en'),
(224, 'member_sex_none', 18, 'secrecy', 'en'),
(225, 'member_sex_man', 18, 'man', 'en'),
(226, 'member_sex_woman', 18, 'woman', 'en'),
(227, 'member_mail', 18, 'E-mail', 'en'),
(228, 'member_js', 18, 'Contact MSN', 'en'),
(229, 'member_tel', 18, 'Telephone', 'en'),
(230, 'member_phone', 18, 'Mobile', 'en'),
(231, 'member_ask_manage', 18, 'Consulting', 'en'),
(232, 'member_ask_add', 18, 'Add contact', 'en'),
(233, 'member_ask_title', 18, 'Consultation Title', 'en'),
(234, 'member_ask_content', 18, 'Advisory Content', 'en'),
(235, 'member_password_old', 18, 'Old Password', 'en'),
(236, 'member_password_new', 18, 'New Password', 'en'),
(237, 'member_password_newt', 18, 'Confirm New Password', 'en'),
(238, 'member_index', 18, 'Home', 'en'),
(239, 'member_out', 18, 'Logout', 'en'),
(240, 'member_login_user', 18, 'Username', 'en'),
(241, 'member_login_pass', 18, 'Password', 'en'),
(242, 'member_login_code', 18, 'Code', 'en'),
(243, 'member_login', 18, 'Login', 'en'),
(244, 'member_regist', 18, 'Register', 'en'),
(245, 'member_reg_nich', 18, 'Nickname', 'en'),
(246, 'member_reg_pass', 18, 'Password', 'en'),
(247, 'member_reg_passt', 18, 'Confirm Password', 'en'),
(248, 'member_reg_mail', 18, 'E-mail', 'en'),
(249, 'member_reg_mail_info', 18, 'Each e-mail mailbox can only register an account', 'en'),
(250, 'member_login_info', 18, 'Account Login', 'en'),
(251, 'member_msg', 18, 'Please login', 'en'),
(252, 'member_msg2', 18, 'Incorrect verification code', 'en'),
(253, 'member_smg3', 18, 'User name or password can not be empty', 'en'),
(254, 'member_msg3', 18, 'User name or password is incorrect', 'en'),
(255, 'member_msg4', 18, 'Login fails, the account is locked', 'en'),
(256, 'member_msg5', 18, 'Member registration has been suspended', 'en'),
(257, 'member_msg6', 18, 'User name can only be alphanumeric, length of 4 or more', 'en'),
(258, 'member_msg7', 18, 'Nickname only alphanumeric, length of 4 or more', 'en'),
(259, 'member_msg8', 18, 'Password can not be empty', 'en'),
(260, 'member_msg9', 18, 'Not the same password twice', 'en'),
(261, 'member_msg10', 18, 'E-mail is not correct', 'en'),
(262, 'member_msg11', 18, 'The user name can not be registered', 'en'),
(263, 'member_msg12', 18, 'The same user name already exists, replace the user name', 'en'),
(264, 'member_msg13', 18, 'The mailbox is already in use, replace', 'en'),
(265, 'member_msg14', 18, 'User registration is successful', 'en'),
(266, 'member_msg15', 4, 'QQ号码不正确', 'cn'),
(267, 'member_msg16', 4, '手机必须为数字', 'cn'),
(268, 'member_msg17', 4, '请从表单提交', 'cn'),
(269, 'member_msg18', 4, '修改成功', 'cn'),
(270, 'member_msg15', 18, 'QQ number is not correct', 'en'),
(271, 'member_msg16', 18, 'Phone number must be', 'en'),
(272, 'member_msg17', 18, 'From the form submission', 'en'),
(273, 'member_msg18', 18, 'Successfully modified', 'en'),
(274, 'msg_info10', 3, '参数传递错误,请重新操作', 'cn'),
(275, 'msg_info10', 17, 'Parameter error, please try again', 'en'),
(276, 'member_msg19', 4, '标题或内容不能为空', 'cn'),
(277, 'member_msg20', 4, '咨询添加成功', 'cn'),
(278, 'member_msg21', 4, '不存在该咨询', 'cn'),
(279, 'member_msg22', 4, '咨询已经处理,请重新添加', 'cn'),
(280, 'member_msg23', 4, '内容不能为空', 'cn'),
(281, 'member_msg24', 4, '咨询修改成功', 'cn'),
(282, 'member_msg25', 4, '删除成功', 'cn'),
(283, 'member_msg26', 4, '原始密码不正确', 'cn'),
(284, 'member_msg27', 4, '已经退出', 'cn'),
(285, 'member_msg28', 4, '用户中心', 'cn'),
(286, 'member_msg29', 4, '用户登录', 'cn'),
(287, 'member_msg30', 4, '用户注册', 'cn'),
(288, 'member_msg31', 4, '注册会员', 'cn'),
(289, 'member_msg19', 18, 'The title or content can not be empty', 'en'),
(290, 'member_msg20', 18, 'Consulting added successfully', 'en'),
(291, 'member_msg21', 18, 'The consultation does not exist', 'en'),
(292, 'member_msg22', 18, 'Consultation has been processed, please re-add', 'en'),
(293, 'member_msg23', 18, 'Content can not be empty', 'en'),
(294, 'member_msg24', 18, 'Consulting successfully modified', 'en'),
(295, 'member_msg25', 18, 'Deleted successfully', 'en'),
(296, 'member_msg26', 18, 'The original password is incorrect', 'en'),
(297, 'member_msg27', 18, 'Has withdrawn', 'en'),
(298, 'member_msg28', 18, 'User Center', 'en'),
(299, 'member_msg29', 18, 'User Login', 'en'),
(300, 'member_msg30', 18, 'Register', 'en'),
(301, 'member_msg31', 18, 'Register', 'en'),
(302, 'member_msg32', 4, '咨询总数', 'cn'),
(303, 'member_msg33', 4, '参数说明', 'cn'),
(304, 'member_msg34', 4, '内容', 'cn'),
(305, 'member_msg35', 4, '说明', 'cn'),
(306, 'member_msg36', 4, '标题', 'cn'),
(307, 'member_msg37', 4, '添加时间', 'cn'),
(308, 'member_msg38', 4, '状态', 'cn'),
(309, 'member_msg39', 4, '操作', 'cn'),
(310, 'member_msg40', 4, '未回复', 'cn'),
(311, 'member_msg41', 4, '已回复', 'cn'),
(312, 'member_msg42', 4, '咨询时间', 'cn'),
(313, 'member_msg43', 4, '回复', 'cn'),
(314, 'member_msg44', 4, '修改', 'cn'),
(315, 'member_msg45', 4, '查看', 'cn'),
(316, 'member_msg46', 4, '删除', 'cn'),
(317, 'member_msg47', 4, '确定', 'cn'),
(318, 'member_msg48', 4, '重置', 'cn'),
(319, 'member_msg49', 4, '已经注册！立即登录', 'cn'),
(320, 'member_msg50', 4, '注册会员您可以：', 'cn'),
(321, 'member_msg51', 4, '1. 保存您的个人资料', 'cn'),
(322, 'member_msg52', 4, '2. 收藏您关注的商品', 'cn'),
(323, 'member_msg53', 4, '3. 及时跟踪反馈信息', 'cn'),
(324, 'member_msg32', 18, 'Advisory number', 'en'),
(325, 'member_msg33', 18, 'Parameter Description', 'en'),
(326, 'member_msg34', 18, 'Content', 'en'),
(327, 'member_msg35', 18, 'Help', 'en'),
(328, 'member_msg36', 18, 'Title', 'en'),
(329, 'member_msg37', 18, 'Added Time', 'en'),
(330, 'member_msg38', 18, 'Status', 'en'),
(331, 'member_msg39', 18, 'Operation', 'en'),
(332, 'member_msg40', 18, 'Did not respond', 'en'),
(333, 'member_msg41', 18, 'Has returned', 'en'),
(334, 'member_msg42', 18, 'Ask Time', 'en'),
(335, 'member_msg43', 18, 'Reply', 'en'),
(336, 'member_msg44', 18, 'Modify', 'en'),
(337, 'member_msg45', 18, 'View', 'en'),
(338, 'member_msg46', 18, 'Delete', 'en'),
(339, 'member_msg47', 18, 'OK', 'en'),
(340, 'member_msg48', 18, 'Reset', 'en'),
(341, 'member_msg49', 18, 'Has been registered! Sign in now', 'en'),
(342, 'member_msg50', 18, 'Registered member you can:', 'en'),
(343, 'member_msg51', 18, '1. to save your personal data', 'en'),
(344, 'member_msg52', 18, '2. collection for your interest in the goods', 'en'),
(345, 'member_msg53', 18, '3. timely feedback tracking', 'en'),
(346, 'member_msg54', 4, '修改密码', 'cn'),
(347, 'member_msg54', 18, 'Change Password', 'en'),
(348, 'book', 1, '留言本', 'cn'),
(349, 'book', 15, 'Guestbook', 'en'),
(350, 'book_msg1', 3, '留言本不能使用', 'cn'),
(351, 'book_msg2', 3, '留言标题不能为空', 'cn'),
(352, 'book_msg3', 3, '留言内容不能为空', 'cn'),
(353, 'book_msg4', 3, '添加成功', 'cn'),
(354, 'book_msg1', 17, 'Message this can not be used', 'en'),
(355, 'book_msg2', 17, 'Message title can not be empty', 'en'),
(356, 'book_msg3', 17, 'Content can not be empty', 'en'),
(357, 'book_msg4', 17, 'Successfully added', 'en'),
(358, 'book_msg5', 17, 'Message name', 'en'),
(359, 'book_msg6', 17, 'Message Title', 'en'),
(360, 'book_msg7', 17, 'Message', 'en'),
(361, 'book_msg5', 3, '留言名', 'cn'),
(362, 'book_msg6', 3, '留言标题', 'cn'),
(363, 'book_msg7', 3, '留言内容', 'cn');","lang_lang_data");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."keywords`;","");
$data[]=array("CREATE TABLE `".DB_PRE."keywords` (
  `id` mediumint(8) NOT NULL auto_increment,
  `keywords` varchar(60) character set utf8 NOT NULL,
  `wordsurl` varchar(60) character set utf8 NOT NULL,
  `lang` varchar(60) character set ucs2 NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","keywords");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."flash_ad`;","");
$data[]=array("CREATE TABLE `".DB_PRE."flash_ad` (
`id` MEDIUMINT( 8 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`pic` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`pic_url` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`pic_text` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`pic_order` MEDIUMINT( 8 ) NOT NULL DEFAULT '10',
`lang` VARCHAR( 60 ) NOT NULL
) ENGINE = MYISAM ;","flash_ad");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."flash_info`;","");
$data[]=array("CREATE TABLE `".DB_PRE."flash_info` (
`id` MEDIUMINT( 8 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`flash_width` VARCHAR( 60 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`flash_height` VARCHAR( 60 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`flash_style` MEDIUMINT( 8 ) NOT NULL ,
`lang` VARCHAR( 60 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE = MYISAM ;","flash_info");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."tpl`;","");
$data[]=array("CREATE TABLE `".DB_PRE."tpl` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `tpl_id` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `tpl_name` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `tpl_info` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `tpl_value` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `tpl_tag` varchar(60) DEFAULT NULL,
  `lang` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","tpl");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."book`;","");
$data[]=array("CREATE TABLE `".DB_PRE."book` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `book_title` varchar(60) CHARACTER SET utf8 NOT NULL,
  `book_content` text CHARACTER SET utf8 NOT NULL,
  `addtime` varchar(60) CHARACTER SET utf8 NOT NULL,
  `reply` text CHARACTER SET utf8,
  `verify` mediumint(8) NOT NULL DEFAULT '0',
  `lang` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","book");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."book_info`;","");
$data[]=array("CREATE TABLE `".DB_PRE."book_info` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `is_book` varchar(60) DEFAULT NULL,
  `book_pos` varchar(60) DEFAULT NULL,
  `book_verify` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","book_info");
$data[]=array("INSERT INTO `".DB_PRE."book_info` (`id`, `is_book`, `book_pos`, `book_verify`) VALUES
(1, '1', '2', '0');","book_info_data");


?>
