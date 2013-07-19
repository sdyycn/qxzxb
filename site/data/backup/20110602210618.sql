DROP TABLE IF EXISTS `bees_admin`;
CREATE TABLE `bees_admin` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(60) NOT NULL,
  `admin_password` varchar(60) NOT NULL,
  `admin_nich` varchar(60) NOT NULL,
  `admin_purview` mediumint(8) NOT NULL,
  `admin_admin` varchar(60) DEFAULT NULL,
  `admin_mail` varchar(60) DEFAULT NULL,
  `admin_tel` varchar(60) DEFAULT NULL,
  `is_disable` mediumint(8) NOT NULL DEFAULT '0',
  `admin_ip` varchar(60) DEFAULT NULL,
  `admin_time` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
INSERT INTO `bees_admin` VALUES('9','qxzxb_admin','2ff62b3c11a14bf5ec0790b82c11de8d','qxzxb_admin','1','','sorryyu@163.com','','0','219.82.160.204','1306932042');
DROP TABLE IF EXISTS `bees_admin_group`;
CREATE TABLE `bees_admin_group` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `admin_group_name` varchar(60) NOT NULL,
  `admin_group_info` varchar(255) DEFAULT NULL,
  `admin_group_purview` varchar(60) NOT NULL COMMENT '分组权限-字符串以,分割',
  `is_disable` mediumint(8) NOT NULL DEFAULT '0' COMMENT '是否禁用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
INSERT INTO `bees_admin_group` VALUES('1','超级管理员','可以管理后台所有功能，没有任何限制','all_purview','0');
INSERT INTO `bees_admin_group` VALUES('2','信息发布员 ','发布信息内容的管理员','content_create,content_edit','0');
DROP TABLE IF EXISTS `bees_alone`;
CREATE TABLE `bees_alone` (
  `id` mediumint(8) NOT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `bees_alone` VALUES('2','<p>&nbsp;<img alt=\"\" align=\"right\" src=\"/upload/fck/20110529080506_fck.jpg\" />&nbsp;</p>\r\n<p><strong><font color=\"#ff0000\">绍兴申达液压机械厂</font></strong>是一家专业生产汽车转向泵,转向泵配件企业，企业现生产一百多种各种规格汽车转向泵，产品被国内各大中型汽车公司所广泛采用。企业秉承&ldquo;顾客至上，锐意进取&rdquo;的经营理念，坚持&ldquo;客户第一&rdquo;的原则为广大客户提供优质的服务。欢迎来电来函咨询洽谈!</p>\r\n<p>&nbsp;</p>\r\n<p>联系电话：86-0575-85182445&nbsp;</p>\r\n<p>联系人：&nbsp; 韩先生</p>\r\n<p>传&nbsp;&nbsp;真：&nbsp; 86-0575-85574156</p>\r\n<p>邮&nbsp;&nbsp;编：&nbsp; 312066</p>\r\n<p>地&nbsp;&nbsp;址：&nbsp; 浙江省绍兴县齐贤工业园<br />\r\n&nbsp;</p>');
INSERT INTO `bees_alone` VALUES('3','<p>联系电话：&nbsp; 86-0575-85182445&nbsp;</p>\r\n<p>联 系 人：&nbsp; 韩先生</p>\r\n<p>传&nbsp;&nbsp;&nbsp; 真：&nbsp; 86-0575-85574156</p>\r\n<p>邮&nbsp;&nbsp; &nbsp;编：&nbsp; 312066</p>\r\n<p>EMail&nbsp;&nbsp; :&nbsp;&nbsp; <a href=\"mailto:sdyycn@163.com\">sdyycn@163.com</a></p>\r\n<p>地&nbsp;&nbsp;&nbsp; 址：&nbsp; 浙江省绍兴县齐贤工业园<br />\r\n&nbsp;</p>');
DROP TABLE IF EXISTS `bees_article`;
CREATE TABLE `bees_article` (
  `id` mediumint(8) NOT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `bees_article` VALUES('4','<p>热烈祝贺企业网站正式启用!</p>');
DROP TABLE IF EXISTS `bees_ask`;
CREATE TABLE `bees_ask` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `addtime` varchar(60) NOT NULL,
  `reply` text,
  `member` mediumint(8) NOT NULL,
  `replytime` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `bees_auto_fields`;
CREATE TABLE `bees_auto_fields` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(60) NOT NULL,
  `use_name` varchar(60) NOT NULL COMMENT '表单提示文字',
  `field_type` varchar(60) NOT NULL,
  `field_value` varchar(255) DEFAULT NULL COMMENT '字段默认值',
  `field_length` mediumint(8) DEFAULT NULL,
  `channel_id` mediumint(8) NOT NULL COMMENT '所属频道id',
  `field_info` varchar(255) DEFAULT NULL COMMENT '字段提示信息',
  `is_disable` mediumint(8) NOT NULL,
  `check_value` varchar(60) DEFAULT NULL,
  `field_order` mediumint(8) NOT NULL DEFAULT '10',
  `is_del` mediumint(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
INSERT INTO `bees_auto_fields` VALUES('1','content','内容','html','','255','2','','0','','1','1');
INSERT INTO `bees_auto_fields` VALUES('2','model','型号','text','','255','3','','0','','1','1');
INSERT INTO `bees_auto_fields` VALUES('3','spec','规格','html','','255','3','','0','','2','1');
INSERT INTO `bees_auto_fields` VALUES('4','marketprice','市场价格','text','电询','255','3','','0','','3','0');
INSERT INTO `bees_auto_fields` VALUES('28','content','详细内容','html','','255','5','','0','','16','1');
INSERT INTO `bees_auto_fields` VALUES('6','down','下载地址','upload_file','','255','4','','0','','1','1');
INSERT INTO `bees_auto_fields` VALUES('27','content','详细内容','html','','255','4','','0','','4','1');
INSERT INTO `bees_auto_fields` VALUES('9','jobtype','工作性质','text','','255','5','','0','','1','0');
INSERT INTO `bees_auto_fields` VALUES('10','jobnum','招聘人数','text','','255','5','','0','','2','0');
INSERT INTO `bees_auto_fields` VALUES('11','jobexp','工作经验','text','','255','5','','0','','3','0');
INSERT INTO `bees_auto_fields` VALUES('12','jopaddress','工作地点','text','','255','5','','0','','5','0');
INSERT INTO `bees_auto_fields` VALUES('13','jobage','年龄','text','','255','5','','0','','6','0');
INSERT INTO `bees_auto_fields` VALUES('14','jobheight','身高','text','不限','255','5','单位厘米','0','','10','0');
INSERT INTO `bees_auto_fields` VALUES('15','joblanguage','语言及水平要求','text','不限','255','5','','0','','8','0');
INSERT INTO `bees_auto_fields` VALUES('16','joblasttime','截止日期','text','2011-1-2','255','5','','0','','9','0');
INSERT INTO `bees_auto_fields` VALUES('17','jobsalary','待遇','text','','255','5','','0','','10','0');
INSERT INTO `bees_auto_fields` VALUES('18','jobedu','学历','select','不限,初中,高中,中专,本科,硕士,博士,博士以上','255','5','','0','','11','0');
INSERT INTO `bees_auto_fields` VALUES('19','jobsex','性别','radio','不限,男,女','255','5','','0','','12','0');
INSERT INTO `bees_auto_fields` VALUES('20','jobtel','联系电话','text','','255','5','','0','','13','0');
INSERT INTO `bees_auto_fields` VALUES('21','jobmail','EMail','text','','255','5','','0','','14','0');
INSERT INTO `bees_auto_fields` VALUES('22','jobweb','网址','text','','255','5','','0','','15','0');
INSERT INTO `bees_auto_fields` VALUES('26','content','详细介绍','html','','255','3','','0','','4','1');
INSERT INTO `bees_auto_fields` VALUES('24','content','详细内容','html','','255','1','','0','','1','1');
INSERT INTO `bees_auto_fields` VALUES('25','pics','产品图片','upload_pic_more','','255','3','','0','','10','0');
INSERT INTO `bees_auto_fields` VALUES('29','filesize','文件大小','text','50000','255','4','单位为K','0','','3','1');
INSERT INTO `bees_auto_fields` VALUES('30','filetype','文件类型','select','.exe,.rar,其他','255','4','','0','','2','1');
INSERT INTO `bees_auto_fields` VALUES('32','wholesale','批发说明','textarea','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','255','3','','0','','6','0');
INSERT INTO `bees_auto_fields` VALUES('33','shipping','运费说明','textarea','','255','3','','0','','7','0');
INSERT INTO `bees_auto_fields` VALUES('36','cntype','类型','select','转向泵,叶片泵,齿轮泵,其他','255','3','','0','','1','0');
INSERT INTO `bees_auto_fields` VALUES('34','trading','交易方式','textarea','','255','3','','0','','8','0');
INSERT INTO `bees_auto_fields` VALUES('35','contact','联系方式','textarea','<br>联系人：韩先生\r\n<br>电话：86-0575-85182445\r\n<br>传真：86-0575-85574156\r\n<br>地址：绍兴县齐贤工业园\r\n<br>邮编：312066\r\n<br>公司网站：http://www.qxzxb.com','255','3','','0','','9','0');
DROP TABLE IF EXISTS `bees_block`;
CREATE TABLE `bees_block` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `tag` varchar(60) NOT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
INSERT INTO `bees_block` VALUES('4','联系方式','<p>联系电话：&nbsp; 86-0575-85182445&nbsp;</p>\r\n<p>联 系 人：&nbsp; 韩先生</p>\r\n<p>传&nbsp;&nbsp;&nbsp; 真：&nbsp; 86-0575-85574156</p>\r\n<p>邮&nbsp;&nbsp;&nbsp; 编：&nbsp; 312066&nbsp;</p>\r\n<p>EMail&nbsp; &nbsp;：&nbsp; <a href=\"mailto:sdyycn@163.com\">sdyycn@163.com</a></p>\r\n<p>地&nbsp;&nbsp;&nbsp; 址：&nbsp; 绍兴县齐贤工业园<br />\r\n&nbsp;</p>');
INSERT INTO `bees_block` VALUES('6','公司简介','<p>&nbsp;<strong><font color=\"#ff0000\">&nbsp;&nbsp;&nbsp;</font></strong><span style=\"font-size: medium\"><strong><font color=\"#ff0000\"> 绍兴申达液压机械厂</font></strong>是一家专业生产汽车转向泵,转向泵配件企业，企业现生产一百多种各种规格汽车转向泵，产品被国内各大中型汽车公司所广泛采用。</span></p>\r\n<p><span style=\"font-size: medium\">&nbsp;&nbsp;&nbsp; 企业秉承&ldquo;顾客至上，锐意进取&rdquo;的经营理念，坚持&ldquo;客户第一&rdquo;的原则为广大客户提供优质的服务。欢迎来电来函咨询洽谈!</span></p>');
DROP TABLE IF EXISTS `bees_blog`;
CREATE TABLE `bees_blog` (
  `id` mediumint(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `bees_book`;
CREATE TABLE `bees_book` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(60) DEFAULT NULL,
  `book_title` varchar(60) NOT NULL,
  `book_content` text NOT NULL,
  `addtime` varchar(60) NOT NULL,
  `reply` text,
  `verify` mediumint(8) NOT NULL DEFAULT '0',
  `lang` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `bees_book_info`;
CREATE TABLE `bees_book_info` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `is_book` varchar(60) DEFAULT NULL,
  `book_pos` varchar(60) DEFAULT NULL,
  `book_verify` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
INSERT INTO `bees_book_info` VALUES('1','1','1,2','1');
DROP TABLE IF EXISTS `bees_category`;
CREATE TABLE `bees_category` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(60) NOT NULL,
  `cate_mb_is` mediumint(8) NOT NULL,
  `cate_hide` mediumint(8) NOT NULL,
  `cate_channel` mediumint(8) NOT NULL,
  `cate_fold_name` varchar(60) NOT NULL,
  `cate_order` mediumint(8) NOT NULL,
  `cate_rank` mediumint(8) DEFAULT '0',
  `cate_tpl` mediumint(8) NOT NULL,
  `cate_tpl_index` varchar(60) DEFAULT NULL,
  `cate_tpl_list` varchar(60) DEFAULT NULL,
  `cate_tpl_content` varchar(60) DEFAULT NULL,
  `cate_title_seo` varchar(60) DEFAULT NULL,
  `cate_key_seo` varchar(60) DEFAULT NULL,
  `cate_info_seo` varchar(350) DEFAULT NULL,
  `lang` varchar(60) NOT NULL,
  `cate_parent` mediumint(8) NOT NULL,
  `cate_html` mediumint(8) NOT NULL DEFAULT '0',
  `cate_nav` varchar(60) NOT NULL DEFAULT '0',
  `is_content` mediumint(8) DEFAULT '0',
  `cate_url` varchar(60) DEFAULT NULL,
  `cate_is_open` mediumint(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
INSERT INTO `bees_category` VALUES('4','企业介绍','0','0','1','cncompany','10','0','0','','list_alone.html','alone_content.html','','','','cn','0','1','2,3','1','http://','0');
INSERT INTO `bees_category` VALUES('5','产品展示','0','0','3','cnprodoct','20','0','0','','list_product.html','product_content.html','','','','cn','0','1','2,3','0','http://','0');
INSERT INTO `bees_category` VALUES('6','新闻中心','0','0','2','cnnews','30','0','0','','list_article.html','article_content.html','','','','cn','0','1','2,3','0','http://','0');
INSERT INTO `bees_category` VALUES('7','联系我们','0','0','1','cncontract','40','0','3','','list_alone.html','alone_content.html','','','','cn','0','1','2,3','1','http://','0');
INSERT INTO `bees_category` VALUES('8','转向泵博客','0','0','6','cnblog','50','0','2','','list_blog.html','blog_content.html','','','','cn','0','1','2,3','0','http://www.qxzxb.com/blog','0');
INSERT INTO `bees_category` VALUES('9','下载中心','0','0','4','cndownload','70','0','0','','list_down.html','down_content.html','','','','cn','0','1','3','0','http://','0');
INSERT INTO `bees_category` VALUES('11','单页内容','0','1','1','test','90','0','3','','list_alone.html','alone_content.html','','','','cn','0','1','','0','http://','0');
INSERT INTO `bees_category` VALUES('12','公司简介','0','0','2','company','110','0','0','','list_article.html','article_content.html','','','','cn','0','1','','0','http://','0');
DROP TABLE IF EXISTS `bees_channel`;
CREATE TABLE `bees_channel` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `channel_name` varchar(60) NOT NULL,
  `channel_mark` varchar(60) NOT NULL,
  `channel_table` varchar(60) NOT NULL,
  `is_disable` mediumint(8) NOT NULL,
  `is_member` mediumint(8) NOT NULL,
  `channel_mb_grade` mediumint(8) DEFAULT '0',
  `is_verify` mediumint(8) NOT NULL COMMENT '发布内容是否审核',
  `is_del` mediumint(8) NOT NULL DEFAULT '0',
  `channel_order` mediumint(8) NOT NULL DEFAULT '10',
  `is_alone` mediumint(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
INSERT INTO `bees_channel` VALUES('1','单页模型','alone','alone','0','0','2','0','1','5','1');
INSERT INTO `bees_channel` VALUES('2','文章模块','article','article','0','0','2','0','0','1','0');
INSERT INTO `bees_channel` VALUES('3','产品模块','product','product','0','0','2','0','0','2','0');
INSERT INTO `bees_channel` VALUES('4','下载模块','down','down','0','0','2','0','0','3','0');
INSERT INTO `bees_channel` VALUES('5','招聘模块','job','job','0','0','2','0','0','4','0');
INSERT INTO `bees_channel` VALUES('6','博客','blog','blog','0','0','0','0','0','70','0');
DROP TABLE IF EXISTS `bees_cmsinfo`;
CREATE TABLE `bees_cmsinfo` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `info_tag` varchar(60) DEFAULT NULL COMMENT '配置信息标识',
  `info_array` text COMMENT '配置信息内容',
  `info_name` varchar(60) DEFAULT NULL COMMENT '配置信息名',
  `lang_tag` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
INSERT INTO `bees_cmsinfo` VALUES('1','sys','array (\n  \'web_upload_image\' => \'jpg|gif|jpeg\',\n  \'web_upload_file\' => \'zip|gz|rar|iso|doc|xsl|ppt|wps|swf|mpg|mp3|rm|rmvb|wmv|wma|wav|mid|mov\',\n  \'thump_width\' => \'300\',\n  \'thump_height\' => \'200\',\n  \'upload_size\' => \'52428800\',\n  \'web_member\' => \n  array (\n    0 => \'1\',\n  ),\n  \'is_member\' => \n  array (\n    0 => \'1\',\n  ),\n  \'member_mail\' => \n  array (\n    0 => \'1\',\n  ),\n  \'member_no_name\' => \'admin|administrator|user|users\',\n  \'image_is\' => \n  array (\n    0 => \'0\',\n  ),\n  \'image_url_is\' => \n  array (\n    0 => \'1\',\n  ),\n  \'image_type\' => \n  array (\n    0 => \'1\',\n  ),\n  \'image_text\' => \'www.beescms.com\',\n  \'image_text_color\' => \'0,0,0\',\n  \'image_text_size\' => \'12\',\n  \'pic\' => \'mark_logo.gif\',\n  \'image_position\' => \n  array (\n    0 => \'9\',\n  ),\n  \'safe_open\' => \n  array (\n    0 => \'1\',\n    1 => \'2\',\n    2 => \'3\',\n  ),\n  \'safe_height\' => \'50\',\n  \'safe_width\' => \'50\',\n  \'safe_num\' => \'5\',\n  \'web_pagesize\' => \'20\',\n  \'web_content_title\' => \'180\',\n  \'web_content_info\' => \'200\',\n  \'is_hits\' => \'0\',\n  \'fialt_words\' => \'她妈|它妈|他妈|你妈|去死|贱人|非典|艾滋病|阳痿\',\n  \'arc_html\' => \n  array (\n    0 => \'1\',\n  ),\n)','系统配置','');
INSERT INTO `bees_cmsinfo` VALUES('2','index_info','array (\n  \'flash_is\' => \n  array (\n    0 => \'0\',\n  ),\n  \'lang_btn_is\' => \n  array (\n    0 => \'0\',\n  ),\n  \'flash_url\' => \'gfgfdg545\',\n  \'flash_height\' => \'46\',\n  \'flash_width\' => \'656\',\n  \'index_lang\' => \'9\',\n)','首页配置','');
INSERT INTO `bees_cmsinfo` VALUES('6','info','array (\n  \'web_name\' => \'汽车转向泵,转向助力泵--绍兴县申达液压机械厂\',\n  \'web_url\' => \'HTTP://WWW.QXZXB.COM\',\n  \'web_path\' => \'/\',\n  \'web_html\' => \'0\',\n  \'is_cache\' => \'0\',\n  \'cache_time\' => \'30\',\n  \'web_template\' => \'default\',\n  \'web_powerby\' => \'copyright by 绍兴县申达液压机械厂\',\n  \'web_keywords\' => \'汽车转向助力泵,汽车转向泵,汽车液压转向泵,汽车液压转向助力泵\',\n  \'web_description\' => \'汽车转向助力泵,汽车转向泵,汽车液压转向泵,汽车液压转向助力泵\',\n  \'web_beian\' => \'\',\n  \'web_yinxiao\' => \'\',\n  \'hot_key\' => \'\',\n)','网站配置','cn');
DROP TABLE IF EXISTS `bees_collect`;
CREATE TABLE `bees_collect` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `member_id` mediumint(8) NOT NULL,
  `arc_id` mediumint(8) NOT NULL,
  `addtime` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `bees_down`;
CREATE TABLE `bees_down` (
  `id` mediumint(8) NOT NULL,
  `down` varchar(255) DEFAULT NULL,
  `body` text,
  `content` text,
  `filesize` varchar(255) DEFAULT NULL,
  `filetype` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `bees_down` VALUES('7','','','<p>&lt;html&gt;<br />\r\n&lt;head&gt;<br />\r\n&lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=gb2312&quot; /&gt;<br />\r\n&lt;title&gt;漂浮广告&lt;/title&gt;<br />\r\n&lt;/head&gt;<br />\r\n&lt;body&gt;<br />\r\n&lt;DIV id=img1 style=&quot;Z-INDEX: 100; LEFT: 2px; WIDTH: 59px; POSITION: absolute; TOP: 43px; HEIGHT: 61px;<br />\r\n&nbsp;visibility: visible;&quot;&gt;&lt;a href=&quot;<a href=\"http://bbs.carcav.com/\">http://bbs.carcav.com/</a>&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;<a href=\"http://bbs.carcav.com/ad/bbspfkld.jpg\">http://bbs.carcav.com/ad/bbspfkld.jpg</a>&quot; width=&quot;300&quot; height=&quot;100&quot; border=&quot;0&quot;&gt;&lt;/a&gt;&lt;/DIV&gt;<br />\r\n&lt;SCRIPT&gt;<br />\r\nvar xPos = 300;<br />\r\nvar yPos = 200; <br />\r\nvar step = 1;<br />\r\nvar delay = 30; <br />\r\nvar height = 0;<br />\r\nvar Hoffset = 0;<br />\r\nvar Woffset = 0;<br />\r\nvar yon = 0;<br />\r\nvar xon = 0;<br />\r\nvar pause = true;<br />\r\nvar interval;<br />\r\nimg1.style.top = yPos;<br />\r\nfunction changePos() <br />\r\n{<br />\r\n&nbsp;width = document.body.clientWidth;<br />\r\n&nbsp;height = document.body.clientHeight;<br />\r\n&nbsp;Hoffset = img1.offsetHeight;<br />\r\n&nbsp;Woffset = img1.offsetWidth;<br />\r\n&nbsp;img1.style.left = xPos + document.body.scrollLeft;<br />\r\n&nbsp;img1.style.top = yPos + document.body.scrollTop;<br />\r\n&nbsp;if (yon) <br />\r\n&nbsp;&nbsp;{yPos = yPos + step;}<br />\r\n&nbsp;else <br />\r\n&nbsp;&nbsp;{yPos = yPos - step;}<br />\r\n&nbsp;if (yPos &lt; 0) <br />\r\n&nbsp;&nbsp;{yon = 1;yPos = 0;}<br />\r\n&nbsp;if (yPos &gt;= (height - Hoffset)) <br />\r\n&nbsp;&nbsp;{yon = 0;yPos = (height - Hoffset);}<br />\r\n&nbsp;if (xon) <br />\r\n&nbsp;&nbsp;{xPos = xPos + step;}<br />\r\n&nbsp;else <br />\r\n&nbsp;&nbsp;{xPos = xPos - step;}<br />\r\n&nbsp;if (xPos &lt; 0) <br />\r\n&nbsp;&nbsp;{xon = 1;xPos = 0;}<br />\r\n&nbsp;if (xPos &gt;= (width - Woffset)) <br />\r\n&nbsp;&nbsp;{xon = 0;xPos = (width - Woffset);&nbsp;&nbsp; }<br />\r\n&nbsp;}<br />\r\n&nbsp;<br />\r\n&nbsp;function start()<br />\r\n&nbsp; {<br />\r\n&nbsp; &nbsp;img1.visibility = &quot;visible&quot;;<br />\r\n&nbsp;&nbsp;interval = setInterval(\'changePos()\', delay);<br />\r\n&nbsp;}<br />\r\n&nbsp;function pause_resume() <br />\r\n&nbsp;{<br />\r\n&nbsp;&nbsp;if(pause) <br />\r\n&nbsp;&nbsp;{<br />\r\n&nbsp;&nbsp;&nbsp;clearInterval(interval);<br />\r\n&nbsp;&nbsp;&nbsp;pause = false;}<br />\r\n&nbsp;&nbsp;else <br />\r\n&nbsp;&nbsp;{<br />\r\n&nbsp;&nbsp;&nbsp;interval = setInterval(\'changePos()\',delay);<br />\r\n&nbsp;&nbsp;&nbsp;pause = true; <br />\r\n&nbsp;&nbsp;&nbsp;}<br />\r\n&nbsp;&nbsp;}<br />\r\n&nbsp;start();<br />\r\n&lt;/SCRIPT&gt;<br />\r\n&lt;/body&gt;<br />\r\n&lt;/html&gt;<br />\r\n&nbsp;</p>','50000','其他');
DROP TABLE IF EXISTS `bees_flash_ad`;
CREATE TABLE `bees_flash_ad` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `pic` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `pic_url` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `pic_text` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `pic_order` mediumint(8) NOT NULL DEFAULT '10',
  `lang` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
INSERT INTO `bees_flash_ad` VALUES('1','img/20110529/20110529223910.jpg','http://www.qxzxb.com','汽车转向泵,转向助力泵--绍兴申达液压机械厂','10','cn');
INSERT INTO `bees_flash_ad` VALUES('2','img/20110529/20110529223952.JPG','http://www.qxzxb.com','汽车转向泵,转向助力泵--绍兴申达液压机械厂','20','cn');
INSERT INTO `bees_flash_ad` VALUES('3','img/20110529/20110529224020.JPG','http://www.qxzxb.com','汽车转向泵,转向助力泵--绍兴申达液压机械厂','30','cn');
INSERT INTO `bees_flash_ad` VALUES('4','img/20110529/20110529224047.JPG','http://www.qxzxb.com','汽车转向泵,转向助力泵--绍兴申达液压机械厂','40','cn');
DROP TABLE IF EXISTS `bees_flash_info`;
CREATE TABLE `bees_flash_info` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `flash_width` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `flash_height` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `flash_style` mediumint(8) NOT NULL,
  `lang` varchar(60) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
INSERT INTO `bees_flash_info` VALUES('1','950','200','3','cn');
DROP TABLE IF EXISTS `bees_form`;
CREATE TABLE `bees_form` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `form_name` varchar(60) NOT NULL,
  `form_mark` varchar(60) NOT NULL,
  `is_disable` mediumint(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
INSERT INTO `bees_form` VALUES('5','产品反馈','prinfo','0');
DROP TABLE IF EXISTS `bees_formfield`;
CREATE TABLE `bees_formfield` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(60) NOT NULL,
  `use_name` varchar(60) NOT NULL,
  `field_type` varchar(60) NOT NULL,
  `field_value` varchar(255) NOT NULL,
  `field_length` mediumint(8) NOT NULL,
  `form_id` mediumint(8) NOT NULL,
  `field_info` varchar(60) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `is_disable` mediumint(8) NOT NULL,
  `form_order` mediumint(8) NOT NULL DEFAULT '0',
  `is_empty` mediumint(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
INSERT INTO `bees_formfield` VALUES('8','title','主题','text','','255','5','','0','1','0');
INSERT INTO `bees_formfield` VALUES('9','user','姓名','text','','255','5','','0','3','0');
INSERT INTO `bees_formfield` VALUES('10','sex','性别','select','保密,男士,女士','255','5','','0','5','1');
INSERT INTO `bees_formfield` VALUES('11','infotype','反馈类型','select','建议,咨询,投诉,其它','255','5','','0','2','1');
INSERT INTO `bees_formfield` VALUES('12','mail','邮箱','text','','255','5','','0','6','1');
INSERT INTO `bees_formfield` VALUES('13','tel','联系电话','text','','255','5','','0','4','1');
INSERT INTO `bees_formfield` VALUES('14','content','咨询内容','textarea','','255','5','','0','7','0');
DROP TABLE IF EXISTS `bees_formlist`;
CREATE TABLE `bees_formlist` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `form_id` mediumint(8) DEFAULT NULL,
  `form_time` varchar(60) DEFAULT NULL,
  `form_ip` varchar(60) DEFAULT NULL,
  `is_read` mediumint(8) NOT NULL DEFAULT '0',
  `member_id` mediumint(8) DEFAULT '0',
  `arc_id` mediumint(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `bees_job`;
CREATE TABLE `bees_job` (
  `id` mediumint(8) NOT NULL,
  `jobtype` varchar(255) DEFAULT NULL,
  `jobnum` varchar(255) DEFAULT NULL,
  `jobexp` varchar(255) DEFAULT NULL,
  `jopaddress` varchar(255) DEFAULT NULL,
  `jobage` varchar(255) DEFAULT NULL,
  `jobheight` varchar(255) DEFAULT NULL,
  `joblanguage` varchar(255) DEFAULT NULL,
  `joblasttime` varchar(255) DEFAULT NULL,
  `jobsalary` varchar(255) DEFAULT NULL,
  `jobedu` varchar(255) DEFAULT NULL,
  `jobsex` varchar(255) DEFAULT NULL,
  `jobtel` varchar(255) DEFAULT NULL,
  `jobmail` varchar(255) DEFAULT NULL,
  `jobweb` varchar(255) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `bees_keywords`;
CREATE TABLE `bees_keywords` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `keywords` varchar(60) NOT NULL,
  `wordsurl` varchar(60) NOT NULL,
  `lang` varchar(60) CHARACTER SET ucs2 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
INSERT INTO `bees_keywords` VALUES('1','转向泵','http://www.qxzxb.com','cn');
DROP TABLE IF EXISTS `bees_lang`;
CREATE TABLE `bees_lang` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `lang_name` varchar(60) NOT NULL,
  `lang_order` mediumint(8) NOT NULL,
  `lang_tag` varchar(60) NOT NULL,
  `lang_is_use` mediumint(8) NOT NULL DEFAULT '1',
  `lang_is_open` mediumint(8) NOT NULL,
  `lang_is_url` mediumint(8) NOT NULL,
  `lang_url` varchar(60) DEFAULT NULL,
  `lang_is_fix` mediumint(8) NOT NULL DEFAULT '0',
  `lang_main` mediumint(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
INSERT INTO `bees_lang` VALUES('10','English','9','en','1','0','0','http://','0','0');
INSERT INTO `bees_lang` VALUES('9','简体中文','10','cn','1','0','0','http://','1','1');
DROP TABLE IF EXISTS `bees_lang_cate`;
CREATE TABLE `bees_lang_cate` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `lang_cate` varchar(60) NOT NULL,
  `lang_info` text,
  `lang` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
INSERT INTO `bees_lang_cate` VALUES('1','模板语言','模板中使用到的语言，如栏目名等','cn');
INSERT INTO `bees_lang_cate` VALUES('2','全局语言','程序中使用的语言，为了程序运行正常，请勿删除','cn');
INSERT INTO `bees_lang_cate` VALUES('3','信息提示','前台一些反馈信息','cn');
INSERT INTO `bees_lang_cate` VALUES('4','会员中心','会员中心使用的导航等语言','cn');
INSERT INTO `bees_lang_cate` VALUES('18','会员中心','会员中心使用的导航等语言','en');
INSERT INTO `bees_lang_cate` VALUES('17','信息提示','前台一些反馈信息','en');
INSERT INTO `bees_lang_cate` VALUES('16','全局语言','程序中使用的语言，为了程序运行正常，请勿删除','en');
INSERT INTO `bees_lang_cate` VALUES('15','模板语言','模板中使用到的语言，如栏目名等','en');
DROP TABLE IF EXISTS `bees_lang_lang`;
CREATE TABLE `bees_lang_lang` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `lang_tag` varchar(60) NOT NULL,
  `lang_cate` mediumint(8) NOT NULL,
  `lang_value` varchar(240) DEFAULT NULL,
  `lang` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=364 DEFAULT CHARSET=utf8;
INSERT INTO `bees_lang_lang` VALUES('5','pages','2','共','cn');
INSERT INTO `bees_lang_lang` VALUES('6','pagesize','2','条记录','cn');
INSERT INTO `bees_lang_lang` VALUES('7','page','2','当前第','cn');
INSERT INTO `bees_lang_lang` VALUES('8','pagehome','2','首页','cn');
INSERT INTO `bees_lang_lang` VALUES('9','pageend','2','尾页','cn');
INSERT INTO `bees_lang_lang` VALUES('10','pagapre','2','上一页','cn');
INSERT INTO `bees_lang_lang` VALUES('11','pagenext','2','下一页','cn');
INSERT INTO `bees_lang_lang` VALUES('12','pagego','2','转到','cn');
INSERT INTO `bees_lang_lang` VALUES('13','previous','2','上一条','cn');
INSERT INTO `bees_lang_lang` VALUES('14','next','2','下一条','cn');
INSERT INTO `bees_lang_lang` VALUES('15','nonestr','2','没有了','cn');
INSERT INTO `bees_lang_lang` VALUES('16','index','2','首页','cn');
INSERT INTO `bees_lang_lang` VALUES('17','sitemap','1','网站地图','cn');
INSERT INTO `bees_lang_lang` VALUES('19','index_news','1','新闻中心','cn');
INSERT INTO `bees_lang_lang` VALUES('20','index_company','1','公司简介','cn');
INSERT INTO `bees_lang_lang` VALUES('21','contact','1','联系方式','cn');
INSERT INTO `bees_lang_lang` VALUES('22','products','1','产品展示','cn');
INSERT INTO `bees_lang_lang` VALUES('23','products_nav','1','产品导航','cn');
INSERT INTO `bees_lang_lang` VALUES('24','links','1','友情链接','cn');
INSERT INTO `bees_lang_lang` VALUES('25','location','1','当前位置','cn');
INSERT INTO `bees_lang_lang` VALUES('26','rec_content','1','推荐产品','cn');
INSERT INTO `bees_lang_lang` VALUES('27','hot_content','1','热门内容','cn');
INSERT INTO `bees_lang_lang` VALUES('28','rec_products','1','推荐产品','cn');
INSERT INTO `bees_lang_lang` VALUES('29','like_content','1','相关内容','cn');
INSERT INTO `bees_lang_lang` VALUES('30','content_hits','1','点击次数','cn');
INSERT INTO `bees_lang_lang` VALUES('31','content_pubdate','1','更新时间','cn');
INSERT INTO `bees_lang_lang` VALUES('32','close','1','关闭','cn');
INSERT INTO `bees_lang_lang` VALUES('33','print','1','打印','cn');
INSERT INTO `bees_lang_lang` VALUES('34','add_favorites','1','加入收藏','cn');
INSERT INTO `bees_lang_lang` VALUES('35','current_time','4','当前时间','cn');
INSERT INTO `bees_lang_lang` VALUES('36','member_home','4','中心首页','cn');
INSERT INTO `bees_lang_lang` VALUES('37','member_info','4','用户信息','cn');
INSERT INTO `bees_lang_lang` VALUES('38','member_ask','4','会员咨询','cn');
INSERT INTO `bees_lang_lang` VALUES('39','member_fav','4','我的收藏','cn');
INSERT INTO `bees_lang_lang` VALUES('40','member_wel','4','欢迎你回来!','cn');
INSERT INTO `bees_lang_lang` VALUES('41','member_grade','4','用户级别','cn');
INSERT INTO `bees_lang_lang` VALUES('42','member_last_login','4','上次登陆时间','cn');
INSERT INTO `bees_lang_lang` VALUES('43','member_last_login_ip','4','上次登陆IP','cn');
INSERT INTO `bees_lang_lang` VALUES('44','member_login_num','4','登录次数','cn');
INSERT INTO `bees_lang_lang` VALUES('45','member_home_title','4','用户中心统计','cn');
INSERT INTO `bees_lang_lang` VALUES('46','member_birth','4','出生日期','cn');
INSERT INTO `bees_lang_lang` VALUES('47','member_sex','4','性别','cn');
INSERT INTO `bees_lang_lang` VALUES('48','member_sex_none','4','保密','cn');
INSERT INTO `bees_lang_lang` VALUES('49','member_sex_man','4','男','cn');
INSERT INTO `bees_lang_lang` VALUES('50','member_sex_woman','4','女','cn');
INSERT INTO `bees_lang_lang` VALUES('51','member_mail','4','电子邮件','cn');
INSERT INTO `bees_lang_lang` VALUES('52','member_js','4','联系QQ','cn');
INSERT INTO `bees_lang_lang` VALUES('53','member_tel','4','固定电话','cn');
INSERT INTO `bees_lang_lang` VALUES('54','member_phone','4','手机','cn');
INSERT INTO `bees_lang_lang` VALUES('55','sys_dec','2','参数说明','cn');
INSERT INTO `bees_lang_lang` VALUES('56','sys_value','2','参数值','cn');
INSERT INTO `bees_lang_lang` VALUES('57','sys_name','2','变量名','cn');
INSERT INTO `bees_lang_lang` VALUES('58','sys_submit','2','确定','cn');
INSERT INTO `bees_lang_lang` VALUES('59','sys_reset','2','取消','cn');
INSERT INTO `bees_lang_lang` VALUES('60','member_ask_manage','4','咨询管理','cn');
INSERT INTO `bees_lang_lang` VALUES('61','member_ask_add','4','添加咨询','cn');
INSERT INTO `bees_lang_lang` VALUES('62','member_ask_title','4','咨询标题','cn');
INSERT INTO `bees_lang_lang` VALUES('63','member_ask_content','4','咨询内容','cn');
INSERT INTO `bees_lang_lang` VALUES('64','sys_title','2','标题','cn');
INSERT INTO `bees_lang_lang` VALUES('65','sys_time','2','添加时间','cn');
INSERT INTO `bees_lang_lang` VALUES('66','sys_stas','2','状态','cn');
INSERT INTO `bees_lang_lang` VALUES('67','sys_caozuo','2','操作','cn');
INSERT INTO `bees_lang_lang` VALUES('68','member_password_old','4','旧密码','cn');
INSERT INTO `bees_lang_lang` VALUES('69','member_password_new','4','新密码','cn');
INSERT INTO `bees_lang_lang` VALUES('70','member_password_newt','4','确认新密码','cn');
INSERT INTO `bees_lang_lang` VALUES('71','member_index','4','网站首页','cn');
INSERT INTO `bees_lang_lang` VALUES('72','member_out','4','退出登陆','cn');
INSERT INTO `bees_lang_lang` VALUES('73','member_login_user','4','用户名','cn');
INSERT INTO `bees_lang_lang` VALUES('74','member_login_pass','4','登陆密码','cn');
INSERT INTO `bees_lang_lang` VALUES('75','member_login_code','4','验证码','cn');
INSERT INTO `bees_lang_lang` VALUES('76','member_login','4','登陆','cn');
INSERT INTO `bees_lang_lang` VALUES('77','member_regist','4','注册会员','cn');
INSERT INTO `bees_lang_lang` VALUES('78','member_reg_nich','4','昵称','cn');
INSERT INTO `bees_lang_lang` VALUES('79','member_reg_pass','4','登陆密码','cn');
INSERT INTO `bees_lang_lang` VALUES('80','member_reg_passt','4','确认密码','cn');
INSERT INTO `bees_lang_lang` VALUES('81','member_reg_mail','4','电子邮箱','cn');
INSERT INTO `bees_lang_lang` VALUES('82','member_reg_mail_info','4','每个电子邮邮箱只能注册一个帐号','cn');
INSERT INTO `bees_lang_lang` VALUES('83','member_login_info','4','账号登陆','cn');
INSERT INTO `bees_lang_lang` VALUES('84','member_msg','4','请先登录','cn');
INSERT INTO `bees_lang_lang` VALUES('85','member_msg2','4','验证码不正确','cn');
INSERT INTO `bees_lang_lang` VALUES('86','member_smg3','4','用户名或密码不能为空','cn');
INSERT INTO `bees_lang_lang` VALUES('87','member_msg3','4','用户名名或密码不正确','cn');
INSERT INTO `bees_lang_lang` VALUES('88','member_msg4','4','登录失败,该账号已被锁定','cn');
INSERT INTO `bees_lang_lang` VALUES('89','member_msg5','4','会员注册已经暂停','cn');
INSERT INTO `bees_lang_lang` VALUES('90','member_msg6','4','用户名只能是字母数字，4以上长度','cn');
INSERT INTO `bees_lang_lang` VALUES('91','member_msg7','4','昵称只能是字母数字，4以上长度','cn');
INSERT INTO `bees_lang_lang` VALUES('92','member_msg8','4','密码不能为空','cn');
INSERT INTO `bees_lang_lang` VALUES('93','member_msg9','4','两次密码不一样','cn');
INSERT INTO `bees_lang_lang` VALUES('94','member_msg10','4','邮箱不正确','cn');
INSERT INTO `bees_lang_lang` VALUES('95','member_msg11','4','该用户名不能注册','cn');
INSERT INTO `bees_lang_lang` VALUES('96','member_msg12','4','已经存在相同的用户名，请更换用户名','cn');
INSERT INTO `bees_lang_lang` VALUES('97','member_msg13','4','该邮箱已经被使用,请更换','cn');
INSERT INTO `bees_lang_lang` VALUES('98','member_msg14','4','用户注册成功','cn');
INSERT INTO `bees_lang_lang` VALUES('99','msg_info','3','不存在flash引导页模板','cn');
INSERT INTO `bees_lang_lang` VALUES('100','msg_info2','3','不存在【@】语言首页模板','cn');
INSERT INTO `bees_lang_lang` VALUES('101','msg_info3','3','找不到【@】语言模板文件','cn');
INSERT INTO `bees_lang_lang` VALUES('102','msg_info4','3','请先生成【@】语言首页','cn');
INSERT INTO `bees_lang_lang` VALUES('103','msg_info5','3','请先更新栏目缓存','cn');
INSERT INTO `bees_lang_lang` VALUES('104','msg_info6','3','请先更新频道缓存','cn');
INSERT INTO `bees_lang_lang` VALUES('105','msg_info7','3','你当前的会员权限不能浏览','cn');
INSERT INTO `bees_lang_lang` VALUES('106','msg_info8','3','该内容未审核,还不能浏览','cn');
INSERT INTO `bees_lang_lang` VALUES('107','msg_info9','3','还没有添加内容','cn');
INSERT INTO `bees_lang_lang` VALUES('108','tpl_look','1','详细查看','cn');
INSERT INTO `bees_lang_lang` VALUES('109','tpl_file_type','1','文件类型','cn');
INSERT INTO `bees_lang_lang` VALUES('110','tpl_file_size','1','文件大小','cn');
INSERT INTO `bees_lang_lang` VALUES('111','tpl_content','1','详细内容','cn');
INSERT INTO `bees_lang_lang` VALUES('112','tpl_dwon_add','1','下载地址','cn');
INSERT INTO `bees_lang_lang` VALUES('113','tpl_down','1','点击下载','cn');
INSERT INTO `bees_lang_lang` VALUES('114','tpl_jobtype','1','工作性质','cn');
INSERT INTO `bees_lang_lang` VALUES('115','tpl_jobnum','1','招聘人数','cn');
INSERT INTO `bees_lang_lang` VALUES('116','tpl_jobexp','1','工作经验','cn');
INSERT INTO `bees_lang_lang` VALUES('117','tpl_jobaddress','1','工作地点','cn');
INSERT INTO `bees_lang_lang` VALUES('118','tpl_jobage','1','年龄','cn');
INSERT INTO `bees_lang_lang` VALUES('119','tpl_joblanguage','1','语言及水平要求','cn');
INSERT INTO `bees_lang_lang` VALUES('120','tpl_joblasttime','1','截止日期','cn');
INSERT INTO `bees_lang_lang` VALUES('121','tpl_jobsalary','1','待遇','cn');
INSERT INTO `bees_lang_lang` VALUES('122','tpl_jobheight','1','身高','cn');
INSERT INTO `bees_lang_lang` VALUES('123','tpl_jobedu','1','学历','cn');
INSERT INTO `bees_lang_lang` VALUES('124','tpl_jobsex','1','性别','cn');
INSERT INTO `bees_lang_lang` VALUES('125','tpl_jobtel','1','联系电话','cn');
INSERT INTO `bees_lang_lang` VALUES('126','tpl_jobmail','1','EMail','cn');
INSERT INTO `bees_lang_lang` VALUES('127','tpl_jobweb','1','网址','cn');
INSERT INTO `bees_lang_lang` VALUES('128','tpl_list','1','列表页','cn');
INSERT INTO `bees_lang_lang` VALUES('129','tpl_spec','1','产品规格','cn');
INSERT INTO `bees_lang_lang` VALUES('130','tpl_marketprice','1','产品价格','cn');
INSERT INTO `bees_lang_lang` VALUES('131','tpl_model','1','产品型号','cn');
INSERT INTO `bees_lang_lang` VALUES('132','tpl_pfsm','1','批发说明','cn');
INSERT INTO `bees_lang_lang` VALUES('133','tpl_yfsm','1','运费说明','cn');
INSERT INTO `bees_lang_lang` VALUES('134','tpl_jyfs','1','交易方式','cn');
INSERT INTO `bees_lang_lang` VALUES('135','tpl_fkxx','1','反馈信息','cn');
INSERT INTO `bees_lang_lang` VALUES('136','sitemap','15','Site Map','en');
INSERT INTO `bees_lang_lang` VALUES('137','index_news','15','News','en');
INSERT INTO `bees_lang_lang` VALUES('138','index_company','15','Company Profile','en');
INSERT INTO `bees_lang_lang` VALUES('139','contact','15','Contact','en');
INSERT INTO `bees_lang_lang` VALUES('140','products','15','Products','en');
INSERT INTO `bees_lang_lang` VALUES('141','products_nav','15','Navigation','en');
INSERT INTO `bees_lang_lang` VALUES('142','links','15','Links','en');
INSERT INTO `bees_lang_lang` VALUES('143','location','15','Location','en');
INSERT INTO `bees_lang_lang` VALUES('144','rec_content','15','Recommended Content','en');
INSERT INTO `bees_lang_lang` VALUES('145','hot_content','15','Popular content','en');
INSERT INTO `bees_lang_lang` VALUES('146','rec_products','15','Recommended Products','en');
INSERT INTO `bees_lang_lang` VALUES('147','like_content','15','Related Content','en');
INSERT INTO `bees_lang_lang` VALUES('148','content_hits','15','Clicks','en');
INSERT INTO `bees_lang_lang` VALUES('149','content_pubdate','15','Updated','en');
INSERT INTO `bees_lang_lang` VALUES('150','close','15','Close','en');
INSERT INTO `bees_lang_lang` VALUES('151','print','15','Print','en');
INSERT INTO `bees_lang_lang` VALUES('152','add_favorites','15','Add to Favorites','en');
INSERT INTO `bees_lang_lang` VALUES('153','tpl_look','15','Detailed View','en');
INSERT INTO `bees_lang_lang` VALUES('154','tpl_file_type','15','File Type','en');
INSERT INTO `bees_lang_lang` VALUES('155','tpl_file_size','15','File Size','en');
INSERT INTO `bees_lang_lang` VALUES('156','tpl_content','15','Details','en');
INSERT INTO `bees_lang_lang` VALUES('157','tpl_dwon_add','15','Download','en');
INSERT INTO `bees_lang_lang` VALUES('158','tpl_down','15','Click to download','en');
INSERT INTO `bees_lang_lang` VALUES('159','tpl_jobtype','15','Nature of work','en');
INSERT INTO `bees_lang_lang` VALUES('160','tpl_jobnum','15','Number','en');
INSERT INTO `bees_lang_lang` VALUES('161','tpl_jobexp','15','Work experience','en');
INSERT INTO `bees_lang_lang` VALUES('162','tpl_jobaddress','15','Location','en');
INSERT INTO `bees_lang_lang` VALUES('163','tpl_jobage','15','Age','en');
INSERT INTO `bees_lang_lang` VALUES('164','tpl_joblanguage','15','Language and level requirements','en');
INSERT INTO `bees_lang_lang` VALUES('165','tpl_joblasttime','15','Deadline','en');
INSERT INTO `bees_lang_lang` VALUES('166','tpl_jobsalary','15','Treatment','en');
INSERT INTO `bees_lang_lang` VALUES('167','tpl_jobheight','15','Height','en');
INSERT INTO `bees_lang_lang` VALUES('168','tpl_jobedu','15','Education','en');
INSERT INTO `bees_lang_lang` VALUES('169','tpl_jobsex','15','sex','en');
INSERT INTO `bees_lang_lang` VALUES('170','tpl_jobtel','15','Contact','en');
INSERT INTO `bees_lang_lang` VALUES('171','tpl_jobmail','15','EMail','en');
INSERT INTO `bees_lang_lang` VALUES('172','tpl_jobweb','15','Website','en');
INSERT INTO `bees_lang_lang` VALUES('173','tpl_list','15','List','en');
INSERT INTO `bees_lang_lang` VALUES('174','tpl_spec','15','Product Specifications','en');
INSERT INTO `bees_lang_lang` VALUES('175','tpl_marketprice','15','Product Price','en');
INSERT INTO `bees_lang_lang` VALUES('176','tpl_model','15','Product Type','en');
INSERT INTO `bees_lang_lang` VALUES('177','tpl_pfsm','15','Wholesale Help','en');
INSERT INTO `bees_lang_lang` VALUES('178','tpl_yfsm','15','Shipping instructions','en');
INSERT INTO `bees_lang_lang` VALUES('179','tpl_jyfs','15','Trading','en');
INSERT INTO `bees_lang_lang` VALUES('180','tpl_fkxx','15','Feedback','en');
INSERT INTO `bees_lang_lang` VALUES('181','pages','16','total','en');
INSERT INTO `bees_lang_lang` VALUES('182','pagesize','16','Records','en');
INSERT INTO `bees_lang_lang` VALUES('183','page','16','Current','en');
INSERT INTO `bees_lang_lang` VALUES('184','pagehome','16','Home','en');
INSERT INTO `bees_lang_lang` VALUES('185','pageend','16','Last','en');
INSERT INTO `bees_lang_lang` VALUES('186','pagapre','16','Previous','en');
INSERT INTO `bees_lang_lang` VALUES('187','pagenext','16','Next','en');
INSERT INTO `bees_lang_lang` VALUES('188','pagego','16','Go','en');
INSERT INTO `bees_lang_lang` VALUES('189','previous','16','Previous','en');
INSERT INTO `bees_lang_lang` VALUES('190','next','16','Next','en');
INSERT INTO `bees_lang_lang` VALUES('191','nonestr','16','None','en');
INSERT INTO `bees_lang_lang` VALUES('192','index','16','Home','en');
INSERT INTO `bees_lang_lang` VALUES('193','sys_dec','16','Parameter Description','en');
INSERT INTO `bees_lang_lang` VALUES('194','sys_value','16','Parameter values','en');
INSERT INTO `bees_lang_lang` VALUES('195','sys_name','16','Variable name','en');
INSERT INTO `bees_lang_lang` VALUES('196','sys_submit','16','OK','en');
INSERT INTO `bees_lang_lang` VALUES('197','sys_reset','16','Reset','en');
INSERT INTO `bees_lang_lang` VALUES('198','sys_title','16','Title','en');
INSERT INTO `bees_lang_lang` VALUES('199','sys_time','16','Add Time','en');
INSERT INTO `bees_lang_lang` VALUES('200','sys_stas','16','Status','en');
INSERT INTO `bees_lang_lang` VALUES('201','sys_caozuo','16','Operation','en');
INSERT INTO `bees_lang_lang` VALUES('202','msg_info','17','There is no template to guide page','en');
INSERT INTO `bees_lang_lang` VALUES('203','msg_info2','17','There is no language page templates 【@】','en');
INSERT INTO `bees_lang_lang` VALUES('204','msg_info3','17','【@】 Language can not find the template file','en');
INSERT INTO `bees_lang_lang` VALUES('205','msg_info4','17','Please generate 【@】 Language Home','en');
INSERT INTO `bees_lang_lang` VALUES('206','msg_info5','17','Please update column cache','en');
INSERT INTO `bees_lang_lang` VALUES('207','msg_info6','17','请先更新频道缓存','en');
INSERT INTO `bees_lang_lang` VALUES('208','msg_info7','17','You can not view the current membership privilege','en');
INSERT INTO `bees_lang_lang` VALUES('209','msg_info8','17','The content is not reviewed, and can not browse','en');
INSERT INTO `bees_lang_lang` VALUES('210','msg_info9','17','No Contents','en');
INSERT INTO `bees_lang_lang` VALUES('211','current_time','18','Current time','en');
INSERT INTO `bees_lang_lang` VALUES('212','member_home','18','Home','en');
INSERT INTO `bees_lang_lang` VALUES('213','member_info','18','User Information','en');
INSERT INTO `bees_lang_lang` VALUES('214','member_ask','18','Member Advisory','en');
INSERT INTO `bees_lang_lang` VALUES('215','member_fav','18','Favorites','en');
INSERT INTO `bees_lang_lang` VALUES('216','member_wel','18','Welcome back!','en');
INSERT INTO `bees_lang_lang` VALUES('217','member_grade','18','User level','en');
INSERT INTO `bees_lang_lang` VALUES('218','member_last_login','18','Last login time','en');
INSERT INTO `bees_lang_lang` VALUES('219','member_last_login_ip','18','Last Login IP','en');
INSERT INTO `bees_lang_lang` VALUES('220','member_login_num','18','Login times','en');
INSERT INTO `bees_lang_lang` VALUES('221','member_home_title','18','Users statistics','en');
INSERT INTO `bees_lang_lang` VALUES('222','member_birth','18','Date of birth','en');
INSERT INTO `bees_lang_lang` VALUES('223','member_sex','18','sex','en');
INSERT INTO `bees_lang_lang` VALUES('224','member_sex_none','18','secrecy','en');
INSERT INTO `bees_lang_lang` VALUES('225','member_sex_man','18','man','en');
INSERT INTO `bees_lang_lang` VALUES('226','member_sex_woman','18','woman','en');
INSERT INTO `bees_lang_lang` VALUES('227','member_mail','18','E-mail','en');
INSERT INTO `bees_lang_lang` VALUES('228','member_js','18','Contact MSN','en');
INSERT INTO `bees_lang_lang` VALUES('229','member_tel','18','Telephone','en');
INSERT INTO `bees_lang_lang` VALUES('230','member_phone','18','Mobile','en');
INSERT INTO `bees_lang_lang` VALUES('231','member_ask_manage','18','Consulting','en');
INSERT INTO `bees_lang_lang` VALUES('232','member_ask_add','18','Add contact','en');
INSERT INTO `bees_lang_lang` VALUES('233','member_ask_title','18','Consultation Title','en');
INSERT INTO `bees_lang_lang` VALUES('234','member_ask_content','18','Advisory Content','en');
INSERT INTO `bees_lang_lang` VALUES('235','member_password_old','18','Old Password','en');
INSERT INTO `bees_lang_lang` VALUES('236','member_password_new','18','New Password','en');
INSERT INTO `bees_lang_lang` VALUES('237','member_password_newt','18','Confirm New Password','en');
INSERT INTO `bees_lang_lang` VALUES('238','member_index','18','Home','en');
INSERT INTO `bees_lang_lang` VALUES('239','member_out','18','Logout','en');
INSERT INTO `bees_lang_lang` VALUES('240','member_login_user','18','Username','en');
INSERT INTO `bees_lang_lang` VALUES('241','member_login_pass','18','Password','en');
INSERT INTO `bees_lang_lang` VALUES('242','member_login_code','18','Code','en');
INSERT INTO `bees_lang_lang` VALUES('243','member_login','18','Login','en');
INSERT INTO `bees_lang_lang` VALUES('244','member_regist','18','Register','en');
INSERT INTO `bees_lang_lang` VALUES('245','member_reg_nich','18','Nickname','en');
INSERT INTO `bees_lang_lang` VALUES('246','member_reg_pass','18','Password','en');
INSERT INTO `bees_lang_lang` VALUES('247','member_reg_passt','18','Confirm Password','en');
INSERT INTO `bees_lang_lang` VALUES('248','member_reg_mail','18','E-mail','en');
INSERT INTO `bees_lang_lang` VALUES('249','member_reg_mail_info','18','Each e-mail mailbox can only register an account','en');
INSERT INTO `bees_lang_lang` VALUES('250','member_login_info','18','Account Login','en');
INSERT INTO `bees_lang_lang` VALUES('251','member_msg','18','Please login','en');
INSERT INTO `bees_lang_lang` VALUES('252','member_msg2','18','Incorrect verification code','en');
INSERT INTO `bees_lang_lang` VALUES('253','member_smg3','18','User name or password can not be empty','en');
INSERT INTO `bees_lang_lang` VALUES('254','member_msg3','18','User name or password is incorrect','en');
INSERT INTO `bees_lang_lang` VALUES('255','member_msg4','18','Login fails, the account is locked','en');
INSERT INTO `bees_lang_lang` VALUES('256','member_msg5','18','Member registration has been suspended','en');
INSERT INTO `bees_lang_lang` VALUES('257','member_msg6','18','User name can only be alphanumeric, length of 4 or more','en');
INSERT INTO `bees_lang_lang` VALUES('258','member_msg7','18','Nickname only alphanumeric, length of 4 or more','en');
INSERT INTO `bees_lang_lang` VALUES('259','member_msg8','18','Password can not be empty','en');
INSERT INTO `bees_lang_lang` VALUES('260','member_msg9','18','Not the same password twice','en');
INSERT INTO `bees_lang_lang` VALUES('261','member_msg10','18','E-mail is not correct','en');
INSERT INTO `bees_lang_lang` VALUES('262','member_msg11','18','The user name can not be registered','en');
INSERT INTO `bees_lang_lang` VALUES('263','member_msg12','18','The same user name already exists, replace the user name','en');
INSERT INTO `bees_lang_lang` VALUES('264','member_msg13','18','The mailbox is already in use, replace','en');
INSERT INTO `bees_lang_lang` VALUES('265','member_msg14','18','User registration is successful','en');
INSERT INTO `bees_lang_lang` VALUES('266','member_msg15','4','QQ号码不正确','cn');
INSERT INTO `bees_lang_lang` VALUES('267','member_msg16','4','手机必须为数字','cn');
INSERT INTO `bees_lang_lang` VALUES('268','member_msg17','4','请从表单提交','cn');
INSERT INTO `bees_lang_lang` VALUES('269','member_msg18','4','修改成功','cn');
INSERT INTO `bees_lang_lang` VALUES('270','member_msg15','18','QQ number is not correct','en');
INSERT INTO `bees_lang_lang` VALUES('271','member_msg16','18','Phone number must be','en');
INSERT INTO `bees_lang_lang` VALUES('272','member_msg17','18','From the form submission','en');
INSERT INTO `bees_lang_lang` VALUES('273','member_msg18','18','Successfully modified','en');
INSERT INTO `bees_lang_lang` VALUES('274','msg_info10','3','参数传递错误,请重新操作','cn');
INSERT INTO `bees_lang_lang` VALUES('275','msg_info10','17','Parameter error, please try again','en');
INSERT INTO `bees_lang_lang` VALUES('276','member_msg19','4','标题或内容不能为空','cn');
INSERT INTO `bees_lang_lang` VALUES('277','member_msg20','4','咨询添加成功','cn');
INSERT INTO `bees_lang_lang` VALUES('278','member_msg21','4','不存在该咨询','cn');
INSERT INTO `bees_lang_lang` VALUES('279','member_msg22','4','咨询已经处理,请重新添加','cn');
INSERT INTO `bees_lang_lang` VALUES('280','member_msg23','4','内容不能为空','cn');
INSERT INTO `bees_lang_lang` VALUES('281','member_msg24','4','咨询修改成功','cn');
INSERT INTO `bees_lang_lang` VALUES('282','member_msg25','4','删除成功','cn');
INSERT INTO `bees_lang_lang` VALUES('283','member_msg26','4','原始密码不正确','cn');
INSERT INTO `bees_lang_lang` VALUES('284','member_msg27','4','已经退出','cn');
INSERT INTO `bees_lang_lang` VALUES('285','member_msg28','4','用户中心','cn');
INSERT INTO `bees_lang_lang` VALUES('286','member_msg29','4','用户登录','cn');
INSERT INTO `bees_lang_lang` VALUES('287','member_msg30','4','用户注册','cn');
INSERT INTO `bees_lang_lang` VALUES('288','member_msg31','4','注册会员','cn');
INSERT INTO `bees_lang_lang` VALUES('289','member_msg19','18','The title or content can not be empty','en');
INSERT INTO `bees_lang_lang` VALUES('290','member_msg20','18','Consulting added successfully','en');
INSERT INTO `bees_lang_lang` VALUES('291','member_msg21','18','The consultation does not exist','en');
INSERT INTO `bees_lang_lang` VALUES('292','member_msg22','18','Consultation has been processed, please re-add','en');
INSERT INTO `bees_lang_lang` VALUES('293','member_msg23','18','Content can not be empty','en');
INSERT INTO `bees_lang_lang` VALUES('294','member_msg24','18','Consulting successfully modified','en');
INSERT INTO `bees_lang_lang` VALUES('295','member_msg25','18','Deleted successfully','en');
INSERT INTO `bees_lang_lang` VALUES('296','member_msg26','18','The original password is incorrect','en');
INSERT INTO `bees_lang_lang` VALUES('297','member_msg27','18','Has withdrawn','en');
INSERT INTO `bees_lang_lang` VALUES('298','member_msg28','18','User Center','en');
INSERT INTO `bees_lang_lang` VALUES('299','member_msg29','18','User Login','en');
INSERT INTO `bees_lang_lang` VALUES('300','member_msg30','18','Register','en');
INSERT INTO `bees_lang_lang` VALUES('301','member_msg31','18','Register','en');
INSERT INTO `bees_lang_lang` VALUES('302','member_msg32','4','咨询总数','cn');
INSERT INTO `bees_lang_lang` VALUES('303','member_msg33','4','参数说明','cn');
INSERT INTO `bees_lang_lang` VALUES('304','member_msg34','4','内容','cn');
INSERT INTO `bees_lang_lang` VALUES('305','member_msg35','4','说明','cn');
INSERT INTO `bees_lang_lang` VALUES('306','member_msg36','4','标题','cn');
INSERT INTO `bees_lang_lang` VALUES('307','member_msg37','4','添加时间','cn');
INSERT INTO `bees_lang_lang` VALUES('308','member_msg38','4','状态','cn');
INSERT INTO `bees_lang_lang` VALUES('309','member_msg39','4','操作','cn');
INSERT INTO `bees_lang_lang` VALUES('310','member_msg40','4','未回复','cn');
INSERT INTO `bees_lang_lang` VALUES('311','member_msg41','4','已回复','cn');
INSERT INTO `bees_lang_lang` VALUES('312','member_msg42','4','咨询时间','cn');
INSERT INTO `bees_lang_lang` VALUES('313','member_msg43','4','回复','cn');
INSERT INTO `bees_lang_lang` VALUES('314','member_msg44','4','修改','cn');
INSERT INTO `bees_lang_lang` VALUES('315','member_msg45','4','查看','cn');
INSERT INTO `bees_lang_lang` VALUES('316','member_msg46','4','删除','cn');
INSERT INTO `bees_lang_lang` VALUES('317','member_msg47','4','确定','cn');
INSERT INTO `bees_lang_lang` VALUES('318','member_msg48','4','重置','cn');
INSERT INTO `bees_lang_lang` VALUES('319','member_msg49','4','已经注册！立即登录','cn');
INSERT INTO `bees_lang_lang` VALUES('320','member_msg50','4','注册会员您可以：','cn');
INSERT INTO `bees_lang_lang` VALUES('321','member_msg51','4','1. 保存您的个人资料','cn');
INSERT INTO `bees_lang_lang` VALUES('322','member_msg52','4','2. 收藏您关注的商品','cn');
INSERT INTO `bees_lang_lang` VALUES('323','member_msg53','4','3. 及时跟踪反馈信息','cn');
INSERT INTO `bees_lang_lang` VALUES('324','member_msg32','18','Advisory number','en');
INSERT INTO `bees_lang_lang` VALUES('325','member_msg33','18','Parameter Description','en');
INSERT INTO `bees_lang_lang` VALUES('326','member_msg34','18','Content','en');
INSERT INTO `bees_lang_lang` VALUES('327','member_msg35','18','Help','en');
INSERT INTO `bees_lang_lang` VALUES('328','member_msg36','18','Title','en');
INSERT INTO `bees_lang_lang` VALUES('329','member_msg37','18','Added Time','en');
INSERT INTO `bees_lang_lang` VALUES('330','member_msg38','18','Status','en');
INSERT INTO `bees_lang_lang` VALUES('331','member_msg39','18','Operation','en');
INSERT INTO `bees_lang_lang` VALUES('332','member_msg40','18','Did not respond','en');
INSERT INTO `bees_lang_lang` VALUES('333','member_msg41','18','Has returned','en');
INSERT INTO `bees_lang_lang` VALUES('334','member_msg42','18','Ask Time','en');
INSERT INTO `bees_lang_lang` VALUES('335','member_msg43','18','Reply','en');
INSERT INTO `bees_lang_lang` VALUES('336','member_msg44','18','Modify','en');
INSERT INTO `bees_lang_lang` VALUES('337','member_msg45','18','View','en');
INSERT INTO `bees_lang_lang` VALUES('338','member_msg46','18','Delete','en');
INSERT INTO `bees_lang_lang` VALUES('339','member_msg47','18','OK','en');
INSERT INTO `bees_lang_lang` VALUES('340','member_msg48','18','Reset','en');
INSERT INTO `bees_lang_lang` VALUES('341','member_msg49','18','Has been registered! Sign in now','en');
INSERT INTO `bees_lang_lang` VALUES('342','member_msg50','18','Registered member you can:','en');
INSERT INTO `bees_lang_lang` VALUES('343','member_msg51','18','1. to save your personal data','en');
INSERT INTO `bees_lang_lang` VALUES('344','member_msg52','18','2. collection for your interest in the goods','en');
INSERT INTO `bees_lang_lang` VALUES('345','member_msg53','18','3. timely feedback tracking','en');
INSERT INTO `bees_lang_lang` VALUES('346','member_msg54','4','修改密码','cn');
INSERT INTO `bees_lang_lang` VALUES('347','member_msg54','18','Change Password','en');
INSERT INTO `bees_lang_lang` VALUES('348','book','1','留言本','cn');
INSERT INTO `bees_lang_lang` VALUES('349','book','15','Guestbook','en');
INSERT INTO `bees_lang_lang` VALUES('350','book_msg1','3','留言本不能使用','cn');
INSERT INTO `bees_lang_lang` VALUES('351','book_msg2','3','留言标题不能为空','cn');
INSERT INTO `bees_lang_lang` VALUES('352','book_msg3','3','留言内容不能为空','cn');
INSERT INTO `bees_lang_lang` VALUES('353','book_msg4','3','添加成功','cn');
INSERT INTO `bees_lang_lang` VALUES('354','book_msg1','17','Message this can not be used','en');
INSERT INTO `bees_lang_lang` VALUES('355','book_msg2','17','Message title can not be empty','en');
INSERT INTO `bees_lang_lang` VALUES('356','book_msg3','17','Content can not be empty','en');
INSERT INTO `bees_lang_lang` VALUES('357','book_msg4','17','Successfully added','en');
INSERT INTO `bees_lang_lang` VALUES('358','book_msg5','17','Message name','en');
INSERT INTO `bees_lang_lang` VALUES('359','book_msg6','17','Message Title','en');
INSERT INTO `bees_lang_lang` VALUES('360','book_msg7','17','Message','en');
INSERT INTO `bees_lang_lang` VALUES('361','book_msg5','3','留言名','cn');
INSERT INTO `bees_lang_lang` VALUES('362','book_msg6','3','留言标题','cn');
INSERT INTO `bees_lang_lang` VALUES('363','book_msg7','3','留言内容','cn');
DROP TABLE IF EXISTS `bees_link`;
CREATE TABLE `bees_link` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `link_url` varchar(60) NOT NULL,
  `link_name` varchar(60) NOT NULL,
  `link_logo` varchar(60) DEFAULT NULL,
  `link_order` mediumint(8) NOT NULL DEFAULT '1',
  `link_info` varchar(255) DEFAULT NULL,
  `link_mail` varchar(60) DEFAULT NULL,
  `lang` varchar(60) NOT NULL,
  `addtime` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
INSERT INTO `bees_link` VALUES('1','http://www.qxzxb.com','申达液压','http://www.qxzxb.com/template/default/images/shenda.GIF','1','汽车转向泵,转向助力泵,绍兴县申达液压机械厂','sdyycn@163.com','cn','1307021652');
DROP TABLE IF EXISTS `bees_maintb`;
CREATE TABLE `bees_maintb` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `filter` varchar(60) DEFAULT NULL,
  `tbpic` varchar(60) DEFAULT NULL,
  `keywords` varchar(60) DEFAULT NULL,
  `info` text,
  `author` varchar(60) DEFAULT NULL,
  `source` varchar(60) DEFAULT NULL,
  `hits` mediumint(8) NOT NULL DEFAULT '0',
  `category` mediumint(8) NOT NULL,
  `channel` mediumint(9) NOT NULL,
  `addtime` varchar(60) NOT NULL,
  `updatetime` varchar(60) DEFAULT NULL,
  `top` mediumint(8) NOT NULL,
  `purview` mediumint(8) NOT NULL COMMENT '浏览权限',
  `is_html` mediumint(8) NOT NULL COMMENT '1为动态浏览,0为静态',
  `verify` mediumint(8) NOT NULL DEFAULT '0',
  `url` varchar(60) DEFAULT NULL,
  `lang` varchar(60) DEFAULT NULL,
  `is_url` mediumint(8) NOT NULL DEFAULT '0',
  `url_add` varchar(60) DEFAULT NULL,
  `title_color` varchar(60) DEFAULT NULL,
  `title_style` mediumint(8) NOT NULL DEFAULT '0',
  `is_open` mediumint(8) NOT NULL DEFAULT '0',
  `cache_time` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
INSERT INTO `bees_maintb` VALUES('1','转向助力泵CACB1318-6110-065','a,b,c,','img/20110529/20110529230003_thumb.jpeg','转向助力泵CACB1318-6110-065','转向助力泵CACB1318-6110-065','未知','未知','27','5','3','1306677942','1306677942','0','0','0','0','htm/cnprodoct/2011/0529/1.html','cn','0','http://','#fe0000','1','0','30');
INSERT INTO `bees_maintb` VALUES('2','企业介绍','','','申达液压,绍兴县申达液压机械厂,转向泵,液压转向泵','绍兴申达液压机械厂是一家专业生产汽车转向泵企业，企业现生产一百多种各种规格汽车转向泵，产品被国内各大中型汽车公司所广泛采用。欢迎来电来函咨询洽谈!','未知','未知','267','4','1','1306681555','1307012791','0','0','0','0','','cn','0','','','0','0','30');
INSERT INTO `bees_maintb` VALUES('3','联系我们','','','','联系人: 韩先生\r\n电话: 86-0575-85182445\r\n传真: 86-0575-85574156\r\nEMail: sdyycn@163.com ','未知','未知','153','7','1','1306681527','1306926372','0','0','0','0','','cn','0','','','0','0','30');
INSERT INTO `bees_maintb` VALUES('4','热烈祝贺企业网站正式启用!','a,b,c,','','申达液压,绍兴县申达液压机械厂,转向泵,液压转','热烈祝贺企业网站正式启用!','未知','未知','208','6','2','1306681521','1306926418','0','0','0','0','htm/cnnews/2011/0529/4.html','cn','0','http://','#fe0000','1','0','30');
INSERT INTO `bees_maintb` VALUES('5','汽车转向泵CACB1419-6110-064','a,b,c,','img/20110530/20110530201221_thumb.jpeg','申达液压,绍兴县申达液压机械厂,转向泵,液压转向泵','汽车转向泵CACB1419-6110-064','未知','未知','198','5','3','1306757135','1306757135','0','0','0','0','htm/cnprodoct/2011/0530/5.html','cn','0','http://','#fe0000','1','0','30');
INSERT INTO `bees_maintb` VALUES('7','经典漂浮广告的JS代码','a,b,c,','','','<html>\r\n<head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=gb2312\" />\r\n<title>漂浮广告</title>\r\n</head>\r\n<body>\r\n<DIV id=img1 style=\"Z-INDEX: 100; LEFT: 2px; WIDTH: ','未知','未知','381','9','4','1306757140','1306893972','0','0','0','0','htm/cndownload/2011/0530/7.html','cn','0','http://','','0','0','30');
INSERT INTO `bees_maintb` VALUES('8','转向助力泵CLCB1316-6108-067','a,b,c,','img/20110531/20110531191216_thumb.jpeg','转向助力泵CLCB1316-6108-067','转向助力泵CLCB1316-6108-067','未知','未知','227','5','3','1306825507','1306839938','0','0','0','0','htm/cnprodoct/2011/0531/8.html','cn','0','http://','#fe0000','1','0','30');
INSERT INTO `bees_maintb` VALUES('9','齿轮泵CLCB1316-6108-069','a,b,c,','img/20110531/20110531151715_thumb.jpeg','齿轮泵CLCB1316-6108-069','齿轮泵CLCB1316-6108-069','未知','未知','1','5','3','1306825515','1306825515','0','0','0','0','htm/cnprodoct/2011/0531/9.html','cn','0','http://','#fe0000','1','0','30');
INSERT INTO `bees_maintb` VALUES('10','转向泵CLCB1416-6108-070','b,c,','img/20110531/20110531151914_thumb.jpeg','转向泵CLCB1416-6108-070','转向泵CLCB1416-6108-070','未知','未知','332','5','3','1306825516','1306940761','0','0','0','0','htm/cnprodoct/2011/0531/10.html','cn','0','http://','#fe0000','1','0','30');
INSERT INTO `bees_maintb` VALUES('11','转向泵CLCB1318-6105-066','a,b,c,','img/20110531/20110531152043_thumb.jpeg','转向泵CLCB1318-6105-066','转向泵CLCB1318-6105-066','未知','未知','84','5','3','1306825506','1306940799','0','0','0','0','htm/cnprodoct/2011/0531/11.html','cn','0','http://','#fe0000','1','0','30');
INSERT INTO `bees_maintb` VALUES('12','转向泵CLCB1416-6105-68','a,b,c,','img/20110531/20110531153126_thumb.jpeg','转向泵CLCB1416-6105-68','转向泵CLCB1416-6105-68','未知','未知','240','5','3','1306825543','1306825543','0','0','0','0','htm/cnprodoct/2011/0531/12.html','cn','0','http://','#fe0000','1','0','30');
INSERT INTO `bees_maintb` VALUES('13','转向泵SYBZ1419-6110-017','a,b,c,','img/20110531/20110531153232_thumb.jpeg','转向泵SYBZ1419-6110-017','转向泵SYBZ1419-6110-017','未知','未知','283','5','3','1306825553','1306825553','0','0','0','0','htm/cnprodoct/2011/0531/13.html','cn','0','http://','#fe0000','1','0','30');
INSERT INTO `bees_maintb` VALUES('14','转向泵YBZ100-JMC-072','b,c,','img/20110531/20110531153415_thumb.jpeg','转向泵YBZ100-JMC-072','转向泵YBZ100-JMC-072','未知','未知','330','5','3','1306825512','1306940765','0','0','0','0','htm/cnprodoct/2011/0531/14.html','cn','0','http://','#fe0000','1','0','30');
INSERT INTO `bees_maintb` VALUES('15','转向泵YBZ216Q-120_100-018','a,b,c,','img/20110531/20110531153540_thumb.jpeg','转向泵YBZ216Q-120_100-018','转向泵YBZ216Q-120_100-018','未知','未知','341','5','3','1306825545','1306940805','0','0','0','0','htm/cnprodoct/2011/0531/15.html','cn','0','http://','#fe0000','1','0','30');
INSERT INTO `bees_maintb` VALUES('16','转向泵YBZ410-071','b,c,','img/20110531/20110531153741_thumb.jpeg','转向泵YBZ410-071','转向泵YBZ410-071','未知','未知','50','5','3','1306825512','1306940791','0','0','0','0','htm/cnprodoct/2011/0531/16.html','cn','0','http://','#fe0000','1','0','30');
INSERT INTO `bees_maintb` VALUES('17','转向泵YBZ611-236E-042','b,c,','img/20110531/20110531153847_thumb.jpeg','转向泵YBZ611-236E-042','转向泵YBZ611-236E-042','未知','未知','364','5','3','1306825559','1306940766','0','0','0','0','htm/cnprodoct/2011/0531/17.html','cn','0','http://','#fe0000','1','0','30');
INSERT INTO `bees_maintb` VALUES('18','转向泵YBZ1010-048','b,c,','img/20110531/20110531191408_thumb.jpeg','转向泵YBZ1010-048','转向泵YBZ1010-048','未知','未知','309','5','3','1306825504','1306940810','0','0','0','0','htm/cnprodoct/2011/0531/18.html','cn','0','http://','#fe0000','1','0','30');
INSERT INTO `bees_maintb` VALUES('19','转向泵YBZ1016-049','a,b,c,','img/20110531/20110531154131_thumb.jpeg','转向泵YBZ1016-049','转向泵YBZ1016-049','未知','未知','46','5','3','1306825543','1306929961','0','0','0','0','htm/cnprodoct/2011/0531/19.html','cn','0','http://','#fe0000','1','0','30');
INSERT INTO `bees_maintb` VALUES('20','转向泵YBZ1113-4110-058','a,b,c,','img/20110531/20110531154937_thumb.jpeg','转向泵YBZ1113-4110-058','转向泵YBZ1113-4110-058','未知','未知','38','5','3','1306825538','1306937171','0','0','0','0','htm/cnprodoct/2011/0531/20.html','cn','0','http://','#fe0000','1','0','30');
INSERT INTO `bees_maintb` VALUES('21','转向泵YBZ1310-6110-002','a,b,c,','img/20110531/20110531155942_thumb.jpeg','转向泵YBZ1310-6110-002','转向泵YBZ1310-6110-002','未知','未知','118','5','3','1306825554','1306825554','0','0','0','0','htm/cnprodoct/2011/0531/21.html','cn','0','http://','#fe0000','1','0','30');
INSERT INTO `bees_maintb` VALUES('22','转向泵YBZ1316-4_6-050','b,c,','img/20110531/20110531160057_thumb.jpeg','转向泵YBZ1316-4_6-050','转向泵YBZ1316-4_6-050','未知','未知','30','5','3','1306829108','1306940775','0','0','0','0','htm/cnprodoct/2011/0531/22.html','cn','0','http://','#fe0000','1','0','30');
INSERT INTO `bees_maintb` VALUES('23','转向泵YBZ1316-6CT-044','a,b,c,','img/20110531/20110531160158_thumb.jpeg','转向泵YBZ1316-6CT-044','转向泵YBZ1316-6CT-044','未知','未知','485','5','3','1306829112','1306940795','0','0','0','0','htm/cnprodoct/2011/0531/23.html','cn','0','http://','#fe0000','1','0','30');
INSERT INTO `bees_maintb` VALUES('24','转向泵YBZ1316-6CT-081','b,c,','img/20110531/20110531162104_thumb.jpeg','转向泵YBZ1316-6CT-081','转向泵YBZ1316-6CT-081','未知','未知','452','5','3','1306829115','1306940781','0','0','0','0','htm/cnprodoct/2011/0531/24.html','cn','0','http://','#fe0000','1','0','30');
INSERT INTO `bees_maintb` VALUES('25','转向泵YBZ1316-077','a,b,c,','img/20110531/20110531162354_thumb.jpeg','转向泵YBZ1316-077','转向泵YBZ1316-077','未知','未知','390','5','3','1306829107','1306829107','0','0','0','0','htm/cnprodoct/2011/0531/25.html','cn','0','http://','#fe0000','1','0','30');
INSERT INTO `bees_maintb` VALUES('26','转向泵YBZ1316-4100-078','b,c,','img/20110531/20110531191557_thumb.jpeg','转向泵YBZ1316-4100-078','转向泵YBZ1316-4100-078','未知','未知','113','5','3','1306829123','1306940817','0','0','0','0','htm/cnprodoct/2011/0531/26.html','cn','0','http://','#fe0000','1','0','30');
DROP TABLE IF EXISTS `bees_market`;
CREATE TABLE `bees_market` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `market_name` varchar(60) DEFAULT NULL,
  `market_type` mediumint(8) NOT NULL DEFAULT '0',
  `market_num` varchar(60) NOT NULL,
  `market_order` varchar(60) NOT NULL DEFAULT '10',
  `market_is` mediumint(8) NOT NULL DEFAULT '1',
  `lang` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
INSERT INTO `bees_market` VALUES('1','0575-85182445','1','0575-85182445','10','1','cn');
DROP TABLE IF EXISTS `bees_member`;
CREATE TABLE `bees_member` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(60) DEFAULT NULL,
  `member_password` varchar(60) NOT NULL,
  `member_nich` varchar(60) NOT NULL,
  `member_purview` mediumint(8) NOT NULL DEFAULT '0',
  `member_user` varchar(60) NOT NULL,
  `member_mail` varchar(60) NOT NULL,
  `member_tel` varchar(60) DEFAULT NULL,
  `is_disable` mediumint(8) NOT NULL DEFAULT '0',
  `member_ip` varchar(60) DEFAULT NULL,
  `member_time` varchar(60) DEFAULT NULL,
  `member_count` mediumint(8) NOT NULL DEFAULT '0',
  `member_qq` varchar(60) DEFAULT NULL,
  `member_phone` varchar(60) DEFAULT NULL,
  `member_sex` mediumint(8) DEFAULT '0',
  `member_addtime` varchar(60) DEFAULT NULL,
  `member_birth` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `bees_member_group`;
CREATE TABLE `bees_member_group` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `member_group_name` varchar(60) NOT NULL,
  `member_group_info` varchar(255) NOT NULL,
  `is_disable` mediumint(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
INSERT INTO `bees_member_group` VALUES('1','注册会员','注册完成的所有会员都是这个级别','0');
INSERT INTO `bees_member_group` VALUES('2','VIP会员','注册会员通过管理后台升级的级别','0');
DROP TABLE IF EXISTS `bees_prinfo`;
CREATE TABLE `bees_prinfo` (
  `id` mediumint(8) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `infotype` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `bees_product`;
CREATE TABLE `bees_product` (
  `id` mediumint(8) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `spec` text,
  `marketprice` varchar(255) DEFAULT NULL,
  `pics` varchar(255) DEFAULT NULL,
  `content` text,
  `wholesale` text,
  `shipping` varchar(255) DEFAULT NULL,
  `trading` text,
  `contact` varchar(255) DEFAULT NULL,
  `cntype` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `bees_product` VALUES('1','转向助力泵CACB1318-6110-065','转向助力泵CACB1318-6110-065','转向助力泵CACB1318-6110-065','img/20110529/201105292301080.JPG,img/20110529/201105292301081.JPG,img/20110529/201105292301082.JPG,','<p>转向助力泵CACB1318-6110-065</p>','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','','','<br>电话：\r\n<br>移动电话：\r\n<br>传真：\r\n<br>地址：\r\n<br>邮编：\r\n<br>公司网站：http://www.qxzxb.com','');
INSERT INTO `bees_product` VALUES('5','','产品型号: CACB1419-6110-064\r\n原图号:\r\n适用车型: 大柴,锡柴6110系列(长型)\r\n公称排量: 15.77 mL/r\r\n最大压力: 14.0 Mpa\r\n最高流量: 3600 r/min\r\n控制流量: 19.0 L/min\r\n进油孔: M18x1.5\r\n出油孔: M16x1.5\r\n旋向: 逆转\r\n','电询','img/20110530/201105302013430.JPG,img/20110530/201105302013431.JPG,img/20110530/201105302013432.JPG,','','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','','','<br>联系人：韩先生\r\n<br>电话：86-0575-85182445\r\n<br>传真：86-0575-85574156\r\n<br>地址：绍兴县齐贤工业园\r\n<br>邮编：312066\r\n<br>公司网站：http://www.qxzxb.com','');
INSERT INTO `bees_product` VALUES('8','转向助力泵CLCB1316-6108-067','<p>产品型号: &nbsp;CLCB1316-6108-067<br />\r\n原图号&nbsp;:<br />\r\n适用车型: &nbsp;玉柴6108发动机(湖北十通)<br />\r\n公称排量: &nbsp;15.77 mL/r<br />\r\n最大压力: &nbsp;13.0 Mpa<br />\r\n最高流量: &nbsp;3600 r/min<br />\r\n控制流量: &nbsp;16.0 L/min<br />\r\n进油孔&nbsp;: &nbsp;M27x1.5<br />\r\n出油孔&nbsp;: &nbsp;M20x1.5<br />\r\n旋向&nbsp;: &nbsp;逆转<br />\r\n&nbsp;</p>','电询','img/20110531/201105311515460.JPG,img/20110531/201105311515461.JPG','<p>产品型号: &nbsp;CLCB1316-6108-067<br />\r\n原图号&nbsp;:<br />\r\n适用车型: &nbsp;玉柴6108发动机(湖北十通)<br />\r\n公称排量: &nbsp;15.77 mL/r<br />\r\n最大压力: &nbsp;13.0 Mpa<br />\r\n最高流量: &nbsp;3600 r/min<br />\r\n控制流量: &nbsp;16.0 L/min<br />\r\n进油孔&nbsp;: &nbsp;M27x1.5<br />\r\n出油孔&nbsp;: &nbsp;M20x1.5<br />\r\n旋向&nbsp;: &nbsp;逆转<br />\r\n&nbsp;</p>','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','','','<br>联系人：韩先生\r\n<br>电话：86-0575-85182445\r\n<br>传真：86-0575-85574156\r\n<br>地址：绍兴县齐贤工业园\r\n<br>邮编：312066\r\n<br>公司网站：http://www.qxzxb.com','');
INSERT INTO `bees_product` VALUES('9','','<p>产品型号: &nbsp;CLCB1316-6108-069<br />\r\n原图号&nbsp;:<br />\r\n适用车型: &nbsp;6108发动机(福田金刚龙卡车)(中孔)<br />\r\n公称排量: &nbsp;15.77 mL/r<br />\r\n最大压力: &nbsp;13.0 Mpa<br />\r\n最高流量: &nbsp;3600 r/min<br />\r\n控制流量: &nbsp;16.0 L/min<br />\r\n进油孔&nbsp;: &nbsp;M27x1.5<br />\r\n出油孔&nbsp;: &nbsp;M18x1.5<br />\r\n旋向&nbsp;: &nbsp;逆转<br />\r\n&nbsp;</p>','电询','img/20110531/201105311517290.JPG,','','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','','','<br>联系人：韩先生\r\n<br>电话：86-0575-85182445\r\n<br>传真：86-0575-85574156\r\n<br>地址：绍兴县齐贤工业园\r\n<br>邮编：312066\r\n<br>公司网站：http://www.qxzxb.com','');
INSERT INTO `bees_product` VALUES('10','','<p>产品型号: &nbsp;CLCB1416-6108-070<br />\r\n原图号&nbsp;:<br />\r\n适用车型: &nbsp;6108发动机(湖北十通)<br />\r\n&nbsp;&nbsp;短型带增压(大孔)<br />\r\n公称排量: &nbsp;15.77 ml/r<br />\r\n最大压力: &nbsp;14.0 Mpa<br />\r\n最高流量: &nbsp;3600 r/min<br />\r\n控制流量: &nbsp;16.0 L/min<br />\r\n进油孔&nbsp;: &nbsp;M27x1.5<br />\r\n出油孔&nbsp;: &nbsp;M20x1.5<br />\r\n旋向&nbsp;: &nbsp;逆转<br />\r\n&nbsp;</p>','电询','img/20110531/201105311519280.JPG','','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','','','<br>联系人：韩先生\r\n<br>电话：86-0575-85182445\r\n<br>传真：86-0575-85574156\r\n<br>地址：绍兴县齐贤工业园\r\n<br>邮编：312066\r\n<br>公司网站：http://www.qxzxb.com','转向泵');
INSERT INTO `bees_product` VALUES('11','','<p>产品型号: &nbsp;CLCB1318-6105-066<br />\r\n原图号&nbsp;:<br />\r\n适用车型: &nbsp;玉柴6105发动机(乘龙)<br />\r\n&nbsp;&nbsp;6108小孔发动机(长型)<br />\r\n公称排量: &nbsp;15.77 mL/r<br />\r\n最大压力: &nbsp;13.0 Mpa<br />\r\n最高流量: &nbsp;3600 r/min<br />\r\n控制流量: &nbsp;16.0 L/min<br />\r\n进油孔&nbsp;: &nbsp;M27x1.5<br />\r\n出油孔&nbsp;: &nbsp;M16x1.5<br />\r\n旋向&nbsp;: &nbsp;逆转<br />\r\n&nbsp;</p>','电询','img/20110531/201105311521040.JPG','<p>转向泵CLCB1318-6105-066</p>','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','','','<br>联系人：韩先生\r\n<br>电话：86-0575-85182445\r\n<br>传真：86-0575-85574156\r\n<br>地址：绍兴县齐贤工业园\r\n<br>邮编：312066\r\n<br>公司网站：http://www.qxzxb.com','转向泵');
INSERT INTO `bees_product` VALUES('12','','<p>产品型号: &nbsp;CLCB1416-6105-68<br />\r\n原图号&nbsp;:<br />\r\n适用车型: &nbsp;6105发动机(乘龙)<br />\r\n&nbsp;&nbsp;短型带增压(小孔)<br />\r\n公称排量: &nbsp;15.77 mL/r<br />\r\n最大压力: &nbsp;14.0 Mpa<br />\r\n最高流量: &nbsp;3600 r/min<br />\r\n控制流量: &nbsp;16.0 L/min<br />\r\n进油孔&nbsp;: &nbsp;M27x1.5<br />\r\n出油孔&nbsp;: &nbsp;M16x1.5<br />\r\n旋向&nbsp;: &nbsp;逆转<br />\r\n&nbsp;</p>','电询','img/20110531/201105311531470.JPG,','<p>产品型号: &nbsp;CLCB1416-6105-68<br />\r\n原图号&nbsp;:<br />\r\n适用车型: &nbsp;6105发动机(乘龙)<br />\r\n&nbsp;&nbsp;短型带增压(小孔)<br />\r\n公称排量: &nbsp;15.77 mL/r<br />\r\n最大压力: &nbsp;14.0 Mpa<br />\r\n最高流量: &nbsp;3600 r/min<br />\r\n控制流量: &nbsp;16.0 L/min<br />\r\n进油孔&nbsp;: &nbsp;M27x1.5<br />\r\n出油孔&nbsp;: &nbsp;M16x1.5<br />\r\n旋向&nbsp;: &nbsp;逆转<br />\r\n&nbsp;</p>','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','','','<br>联系人：韩先生\r\n<br>电话：86-0575-85182445\r\n<br>传真：86-0575-85574156\r\n<br>地址：绍兴县齐贤工业园\r\n<br>邮编：312066\r\n<br>公司网站：http://www.qxzxb.com','');
INSERT INTO `bees_product` VALUES('13','','<p>产品型号: &nbsp;SYBZ1419-6110-017<br />\r\n原图号&nbsp;:&nbsp;3407020C600-0367<br />\r\n适用车型: &nbsp;解放奥威(出油孔右边)<br />\r\n公称排量: &nbsp;18.0 ml/r<br />\r\n最大压力: &nbsp;14.0 Mpa<br />\r\n最高流量: &nbsp;3600 r/min<br />\r\n控制流量: &nbsp;22.0 L/min<br />\r\n进油孔&nbsp;: &nbsp;M18x1.5<br />\r\n出油孔&nbsp;: &nbsp;M18x1.5<br />\r\n旋向&nbsp;: &nbsp;逆转<br />\r\n&nbsp;</p>','电询','img/20110531/201105311533030.JPG,img/20110531/201105311533031.JPG,img/20110531/201105311533032.JPG,','','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','','','<br>联系人：韩先生\r\n<br>电话：86-0575-85182445\r\n<br>传真：86-0575-85574156\r\n<br>地址：绍兴县齐贤工业园\r\n<br>邮编：312066\r\n<br>公司网站：http://www.qxzxb.com','');
INSERT INTO `bees_product` VALUES('14','转向泵YBZ100-JMC-072','<p>产品型号: &nbsp;YBZ100-JMC-072<br />\r\n原图号&nbsp;:&nbsp;FZ12-3407010D<br />\r\n适用车型: &nbsp;江西五十铃皮卡<br />\r\n公称排量: &nbsp;7.0 ml/r<br />\r\n最大压力: &nbsp;10.0 Mpa<br />\r\n最高转速: &nbsp;5000 r/min<br />\r\n控制流量: &nbsp;7.0 L/min<br />\r\n旋向&nbsp;: &nbsp;顺转<br />\r\n&nbsp;</p>','电询','img/20110531/201105311534350.JPG','','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','','','<br>联系人：韩先生\r\n<br>电话：86-0575-85182445\r\n<br>传真：86-0575-85574156\r\n<br>地址：绍兴县齐贤工业园\r\n<br>邮编：312066\r\n<br>公司网站：http://www.qxzxb.com','转向泵');
INSERT INTO `bees_product` VALUES('15','转向泵YBZ216Q-120_100-018','<p>产品型号: &nbsp;YBZ216Q-120/100-018<br />\r\n原图号&nbsp;:&nbsp;3407020-7K<br />\r\n适用车型: &nbsp;北京京华公交客车<br />\r\n公称排量: &nbsp;15.77 ml/r<br />\r\n最大压力: &nbsp;13.0 Mpa<br />\r\n最高流量: &nbsp;3600 r/min<br />\r\n控制流量: &nbsp;16.0 L/min<br />\r\n进油孔&nbsp;: &nbsp;M18x1.5<br />\r\n出油孔&nbsp;: &nbsp;M16x1.5<br />\r\n旋向&nbsp;: &nbsp;顺转<br />\r\n&nbsp;</p>','电询','img/20110531/201105311535590.JPG','','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','','','<br>联系人：韩先生\r\n<br>电话：86-0575-85182445\r\n<br>传真：86-0575-85574156\r\n<br>地址：绍兴县齐贤工业园\r\n<br>邮编：312066\r\n<br>公司网站：http://www.qxzxb.com','转向泵');
INSERT INTO `bees_product` VALUES('16','转向泵YBZ410-071','<p>产品型号: &nbsp;YBZ410-071<br />\r\n原图号&nbsp;:<br />\r\n适用车型: &nbsp;沈阳鑫杯及其他轿车,轻型车<br />\r\n公称排量: &nbsp;16.00 ml/r<br />\r\n最大压力: &nbsp;8.4 Mpa<br />\r\n最高流量: &nbsp;6000 r/min<br />\r\n控制流量: &nbsp;7-11.0 L/min<br />\r\n旋向&nbsp;: &nbsp;顺转<br />\r\n&nbsp;</p>','电询','img/20110531/201105311537510.JPG','','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','','','<br>联系人：韩先生\r\n<br>电话：86-0575-85182445\r\n<br>传真：86-0575-85574156\r\n<br>地址：绍兴县齐贤工业园\r\n<br>邮编：312066\r\n<br>公司网站：http://www.qxzxb.com','转向泵');
INSERT INTO `bees_product` VALUES('17','转向泵YBZ611-236E-042','<p>产品型号: &nbsp;YBZ611-236E-042<br />\r\n原图号&nbsp;:&nbsp;236E-3407010<br />\r\n适用车型: &nbsp;6112-236E发动机/上客等<br />\r\n公称排量: &nbsp;15.77 ml/r<br />\r\n最大压力: &nbsp;13.0 Mpa<br />\r\n最高流量: &nbsp;3600 r/min<br />\r\n控制流量: &nbsp;16.0 L/min<br />\r\n进油孔&nbsp;: &nbsp;M27x1.5<br />\r\n出油孔&nbsp;: &nbsp;M16x1.5<br />\r\n旋向&nbsp;: &nbsp;顺转<br />\r\n&nbsp;</p>','电询','img/20110531/201105311538580.JPG','','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','','','<br>联系人：韩先生\r\n<br>电话：86-0575-85182445\r\n<br>传真：86-0575-85574156\r\n<br>地址：绍兴县齐贤工业园\r\n<br>邮编：312066\r\n<br>公司网站：http://www.qxzxb.com','转向泵');
INSERT INTO `bees_product` VALUES('18','转向泵YBZ1010-048','<p>产品型号: &nbsp;YBZ1010-048<br />\r\n原图号&nbsp;:&nbsp;ZYB1009S02<br />\r\n适用车型: &nbsp;扬客<br />\r\n公称排量: &nbsp;15.77 ml/r<br />\r\n最大压力: &nbsp;10.0 Mpa<br />\r\n最高流量: &nbsp;3600 r/min<br />\r\n控制流量: &nbsp;10.0 L/min<br />\r\n进油孔&nbsp;: &nbsp;M18x1.5<br />\r\n出油孔&nbsp;: &nbsp;M16x1.5<br />\r\n旋向&nbsp;: &nbsp;顺转<br />\r\n&nbsp;</p>','电询','img/20110531/201105311908540.JPG','','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','','','<br>联系人：韩先生\r\n<br>电话：86-0575-85182445\r\n<br>传真：86-0575-85574156\r\n<br>地址：绍兴县齐贤工业园\r\n<br>邮编：312066\r\n<br>公司网站：http://www.qxzxb.com','转向泵');
INSERT INTO `bees_product` VALUES('19','转向泵YBZ1016-049','<p>产品型号: &nbsp;YBZ1016-049<br />\r\n原图号&nbsp;:&nbsp;ZYB-1016S07<br />\r\n适用车型: &nbsp;东风EQ6105<br />\r\n公称排量: &nbsp;15.77 ml/r<br />\r\n最大压力: &nbsp;10.0 Mpa<br />\r\n最高流量: &nbsp;3600 r/min<br />\r\n控制流量: &nbsp;16.0 L/min<br />\r\n进油孔&nbsp;: &nbsp;M27x1.5<br />\r\n出油孔&nbsp;: &nbsp;M16x1.5<br />\r\n旋向&nbsp;: &nbsp;顺转<br />\r\n&nbsp;</p>','电询','img/20110531/201105311541430.JPG','','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','','','<br>联系人：韩先生\r\n<br>电话：86-0575-85182445\r\n<br>传真：86-0575-85574156\r\n<br>地址：绍兴县齐贤工业园\r\n<br>邮编：312066\r\n<br>公司网站：http://www.qxzxb.com','转向泵');
INSERT INTO `bees_product` VALUES('20','转向泵YBZ1113-4110-058','<p>产品型号: &nbsp;YBZ1113-4110-058<br />\r\n原图号&nbsp;:&nbsp;530A-3400010A<br />\r\n适用车型: &nbsp;玉柴4110发动机<br />\r\n公称排量: &nbsp;15.77 ml/r<br />\r\n最大压力: &nbsp;11.5 Mpa<br />\r\n最高流量: &nbsp;3600 r/min<br />\r\n控制流量: &nbsp;13.0 L/min<br />\r\n进油孔&nbsp;: &nbsp;M27x1.5<br />\r\n出油孔&nbsp;: &nbsp;M16x1.5<br />\r\n旋向&nbsp;: &nbsp;逆转<br />\r\n&nbsp;</p>','电询','img/20110531/201105311549470.JPG','','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','','','<br>联系人：韩先生\r\n<br>电话：86-0575-85182445\r\n<br>传真：86-0575-85574156\r\n<br>地址：绍兴县齐贤工业园\r\n<br>邮编：312066\r\n<br>公司网站：http://www.qxzxb.com','转向泵');
INSERT INTO `bees_product` VALUES('21','转向泵YBZ1310-6110-002','<p>产品型号: &nbsp;YBZ1310-6110-002<br />\r\n原图号&nbsp;:&nbsp;S3407020A8EA1<br />\r\n适用车型: &nbsp;CA4113Z苏州金龙 豪华中巴 KLQ6791E<br />\r\n公称排量: &nbsp;15.77 ml/r<br />\r\n最大压力: &nbsp;10 Mpa<br />\r\n最高流量: &nbsp;3600 r/min<br />\r\n控制流量: &nbsp;13.0 L/min<br />\r\n进油孔&nbsp;: &nbsp;M18x1.5<br />\r\n出油孔&nbsp;: &nbsp;M16x1.5<br />\r\n旋向&nbsp;: &nbsp;逆转(左)<br />\r\n&nbsp;</p>','电询','img/20110531/201105311600010.JPG,img/20110531/201105311600011.JPG,','','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','','','<br>联系人：韩先生\r\n<br>电话：86-0575-85182445\r\n<br>传真：86-0575-85574156\r\n<br>地址：绍兴县齐贤工业园\r\n<br>邮编：312066\r\n<br>公司网站：http://www.qxzxb.com','');
INSERT INTO `bees_product` VALUES('22','转向泵YBZ1316-4_6-050','<p>产品型号: &nbsp;YBZ1316-4/6-050<br />\r\n原图号&nbsp;:&nbsp;VOP202-A160/BOG1<br />\r\n适用车型: &nbsp;锡柴四缸,六缸统一型<br />\r\n公称排量: &nbsp;15.77 ml/r<br />\r\n最大压力: &nbsp;13.0 Mpa<br />\r\n最高流量: &nbsp;3600 r/min<br />\r\n控制流量: &nbsp;16.0 L/min<br />\r\n进油孔&nbsp;: &nbsp;M18x1.5<br />\r\n出油孔&nbsp;: &nbsp;M16x1.5<br />\r\n旋向&nbsp;: &nbsp;顺转<br />\r\n&nbsp;</p>','电询','img/20110531/201105311601070.JPG','','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','','','<br>联系人：韩先生\r\n<br>电话：86-0575-85182445\r\n<br>传真：86-0575-85574156\r\n<br>地址：绍兴县齐贤工业园\r\n<br>邮编：312066\r\n<br>公司网站：http://www.qxzxb.com','转向泵');
INSERT INTO `bees_product` VALUES('23','转向泵YBZ1316-6CT-044','<p>产品型号: &nbsp;YBZ1316-6CT-044<br />\r\n原图号&nbsp;:&nbsp;3406207-001-A<br />\r\n适用车型: &nbsp;康明斯双桥6CT发动机<br />\r\n公称排量: &nbsp;15.77 ml/r<br />\r\n最大压力: &nbsp;13.0 Mpa<br />\r\n最高流量: &nbsp;3600 r/min<br />\r\n控制流量: &nbsp;16.0 L/min<br />\r\n进油孔&nbsp;: &nbsp;M22x1.5<br />\r\n出油孔&nbsp;: &nbsp;M20x1.5<br />\r\n旋向&nbsp;: &nbsp;顺转<br />\r\n&nbsp;</p>','电询','img/20110531/201105311602080.JPG','','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','','','<br>联系人：韩先生\r\n<br>电话：86-0575-85182445\r\n<br>传真：86-0575-85574156\r\n<br>地址：绍兴县齐贤工业园\r\n<br>邮编：312066\r\n<br>公司网站：http://www.qxzxb.com','转向泵');
INSERT INTO `bees_product` VALUES('24','转向泵YBZ1316-6CT-081','<p>产品型号: &nbsp;YBZ1316-6CT-081<br />\r\n原图号&nbsp;:<br />\r\n适用车型: &nbsp;康明斯6CT配宇通客车<br />\r\n公称排量: &nbsp;15.77 ml/r<br />\r\n最大压力: &nbsp;13.0 Mpa<br />\r\n最高流量: &nbsp;3600 r/min<br />\r\n控制流量: &nbsp;16.0 L/min<br />\r\n进油孔&nbsp;: &nbsp;M20x1.5<br />\r\n出油孔&nbsp;: &nbsp;M20x1.5<br />\r\n旋向&nbsp;: &nbsp;顺转<br />\r\n&nbsp;</p>','电询','img/20110531/201105311621560.JPG','','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','','','<br>联系人：韩先生\r\n<br>电话：86-0575-85182445\r\n<br>传真：86-0575-85574156\r\n<br>地址：绍兴县齐贤工业园\r\n<br>邮编：312066\r\n<br>公司网站：http://www.qxzxb.com','转向泵');
INSERT INTO `bees_product` VALUES('25','转向泵YBZ1316-077','<p>产品型号: &nbsp;YBZ1316-077<br />\r\n原图号&nbsp;:&nbsp;3406Q92-001<br />\r\n适用车型: &nbsp;康明斯四缸机<br />\r\n公称排量: &nbsp;15.77 ml/r<br />\r\n最大压力: &nbsp;13.0 Mpa<br />\r\n最高流量: &nbsp;3600 r/min<br />\r\n控制流量: &nbsp;16.0 L/min<br />\r\n进油孔&nbsp;: &nbsp;M22x1.5<br />\r\n出油孔&nbsp;: &nbsp;M20x1.5<br />\r\n旋向&nbsp;: &nbsp;顺转<br />\r\n&nbsp;</p>','电询','img/20110531/201105311624150.JPG,img/20110531/201105311624161.JPG,','','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','','','<br>联系人：韩先生\r\n<br>电话：86-0575-85182445\r\n<br>传真：86-0575-85574156\r\n<br>地址：绍兴县齐贤工业园\r\n<br>邮编：312066\r\n<br>公司网站：http://www.qxzxb.com','');
INSERT INTO `bees_product` VALUES('26','转向泵YBZ1316-4100-078','<p>产品型号: &nbsp;YBZ1316-4100-078<br />\r\n原 图 号:&nbsp;&nbsp;G24YA-3407100<br />\r\n适用车型: &nbsp;玉柴4100发动机(4G)<br />\r\n公称排量: &nbsp;15.77 ml/r<br />\r\n最大压力: &nbsp;13.0 Mpa<br />\r\n最高流量: &nbsp;3600 r/min<br />\r\n控制流量: &nbsp;16.0 L/min<br />\r\n进 油 孔: &nbsp;M27x1.5<br />\r\n出 油 孔: &nbsp;M18x1.5<br />\r\n旋&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 向: &nbsp;逆转<br />\r\n&nbsp;</p>','电询','img/20110531/201105311911140.JPG','','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','','','<br>联系人：韩先生\r\n<br>电话：86-0575-85182445\r\n<br>传真：86-0575-85574156\r\n<br>地址：绍兴县齐贤工业园\r\n<br>邮编：312066\r\n<br>公司网站：http://www.qxzxb.com','转向泵');
DROP TABLE IF EXISTS `bees_tpl`;
CREATE TABLE `bees_tpl` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `tpl_id` varchar(60) DEFAULT NULL,
  `tpl_name` varchar(60) DEFAULT NULL,
  `tpl_info` varchar(255) DEFAULT NULL,
  `tpl_value` varchar(60) DEFAULT NULL,
  `tpl_tag` varchar(60) DEFAULT NULL,
  `lang` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
INSERT INTO `bees_tpl` VALUES('1','index_1','案例展示','','','loop','cn');
INSERT INTO `bees_tpl` VALUES('2','index_3','首页产品展示','上传缩略图才会在该位置显示','5|1|a|4|0|0,10000|0','loop','cn');
INSERT INTO `bees_tpl` VALUES('3','index_block_1','首页联系方式','','4|0|0|0|0|0,0|0','block','cn');
INSERT INTO `bees_tpl` VALUES('4','index_en_pr','英文首页产品展示','显示有缩略图的内容','','loop','en');
INSERT INTO `bees_tpl` VALUES('5','index_en_link','英文首页联系方式','','','block','en');
INSERT INTO `bees_tpl` VALUES('6','index_en_company','英文首页公司简介','','','block','en');
INSERT INTO `bees_tpl` VALUES('7','alone_nav','单页内容页产品导航','','','loop','cn');
INSERT INTO `bees_tpl` VALUES('8','alone_article','单页内容页热点内容','排序使用点击排序','','loop','cn');
INSERT INTO `bees_tpl` VALUES('9','alone_product','单页内容页推荐产品','发布产品时勾选\'标志\'勾选推荐才能显示','','loop','cn');
INSERT INTO `bees_tpl` VALUES('10','alone_link','单页内容页联系方式','','4|0|0|0|0|0,0|0','block','cn');
INSERT INTO `bees_tpl` VALUES('11','list_pr_nav1','产品列表页产品导航','','','loop','cn');
INSERT INTO `bees_tpl` VALUES('12','list_pr_article','产品列表页热点内容','排序使用点击排序','','loop','cn');
INSERT INTO `bees_tpl` VALUES('13','list_pr_link','产品列表页联系方式','','4|0|0|0|0|0,0|0','block','cn');
INSERT INTO `bees_tpl` VALUES('14','list_nav1','文章列表页产品导航','','','loop','cn');
INSERT INTO `bees_tpl` VALUES('15','list_article','文章列表页热点内容','排序使用点击排序','','loop','cn');
INSERT INTO `bees_tpl` VALUES('16','list_product','文章列表页推荐产品','发布产品时勾选\'标志\'勾选推荐才能显示','','loop','cn');
INSERT INTO `bees_tpl` VALUES('17','list_link','文章列表页联系方式','','','block','cn');
INSERT INTO `bees_tpl` VALUES('18','content_pr_nav','产品内容页产品导航','','','loop','cn');
INSERT INTO `bees_tpl` VALUES('19','content_pr_article','产品内容页热点内容','排序使用点击排序','','loop','cn');
INSERT INTO `bees_tpl` VALUES('20','content_pr_product','产品内容页推荐产品','发布产品时勾选\'标志\'勾选推荐才能显示','','loop','cn');
INSERT INTO `bees_tpl` VALUES('21','content_pr_link','产品内容页联系方式','','','block','cn');
INSERT INTO `bees_tpl` VALUES('22','pr_form','产品内容页表单','','','form','cn');
INSERT INTO `bees_tpl` VALUES('23','content_nav','文章内容页产品导航','','','loop','cn');
INSERT INTO `bees_tpl` VALUES('24','content_article','文章内容页热点内容','排序使用点击排序','','loop','cn');
INSERT INTO `bees_tpl` VALUES('25','content_product','文章内容页推荐产品','发布产品时勾选\'标志\'勾选推荐才能显示','','loop','cn');
INSERT INTO `bees_tpl` VALUES('26','content_link','文章内容页联系方式','','','block','cn');
INSERT INTO `bees_tpl` VALUES('27','list_down_nav1','下载列表页产品导航','','','loop','cn');
INSERT INTO `bees_tpl` VALUES('28','list_down_article','下载列表页热点内容','排序使用点击排序','','loop','cn');
INSERT INTO `bees_tpl` VALUES('29','list_down_product','下载列表页推荐产品','发布产品时勾选\'标志\'勾选推荐才能显示','','loop','cn');
INSERT INTO `bees_tpl` VALUES('30','list_down_link','下载列表页联系方式','','','block','cn');
INSERT INTO `bees_tpl` VALUES('31','down_arc_nav','下载内容页产品导航','','','loop','cn');
INSERT INTO `bees_tpl` VALUES('32','dow_arc_article','下载内容页热点内容','排序使用点击排序','','loop','cn');
INSERT INTO `bees_tpl` VALUES('33','down_arc_product','下载内容页推荐产品','发布产品时勾选\'标志\'勾选推荐才能显示','','loop','cn');
INSERT INTO `bees_tpl` VALUES('34','down_arc_link','下载内容页联系方式','','','block','cn');
INSERT INTO `bees_tpl` VALUES('35','index_2','首页新闻中心图片显示','数量从0到1，显示上传有缩略图的内容','','loop','cn');
INSERT INTO `bees_tpl` VALUES('36','article2','首页新闻中心','','6|0|0|1|0|0,10000|0','loop','cn');
INSERT INTO `bees_tpl` VALUES('37','index_block_2','首页公司简介','','6|0|0|0|0|0,0|0','block','cn');
