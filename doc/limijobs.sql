-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 07 月 16 日 03:16
-- 服务器版本: 5.5.27
-- PHP 版本: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `limijobs`
--

-- --------------------------------------------------------

--
-- 表的结构 `ejob_ad`
--

CREATE TABLE IF NOT EXISTS `ejob_ad` (
  `adid` smallint(6) NOT NULL AUTO_INCREMENT,
  `adtype` tinyint(4) DEFAULT NULL,
  `adname` varchar(60) DEFAULT NULL,
  `adwidth` varchar(10) DEFAULT NULL,
  `adheight` varchar(10) DEFAULT NULL,
  `coname` varchar(60) DEFAULT NULL,
  `cocontact` varchar(60) DEFAULT NULL,
  `adurl` varchar(200) DEFAULT NULL,
  `adpicurl` varchar(200) DEFAULT NULL,
  `begindate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `adwz` varchar(60) DEFAULT NULL,
  `adnote` varchar(200) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`adid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ejob_admin`
--

CREATE TABLE IF NOT EXISTS `ejob_admin` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `usertype` tinyint(4) unsigned zerofill DEFAULT NULL,
  `islock` tinyint(4) unsigned zerofill DEFAULT NULL,
  `lastloginip` varchar(60) DEFAULT NULL,
  `lastlogintime` datetime DEFAULT NULL,
  `thisloginip` varchar(60) DEFAULT NULL,
  `thislogintime` datetime DEFAULT NULL,
  `loginquantity` smallint(6) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `ejob_admin`
--

INSERT INTO `ejob_admin` (`id`, `username`, `password`, `usertype`, `islock`, `lastloginip`, `lastlogintime`, `thisloginip`, `thislogintime`, `loginquantity`) VALUES
(1, 'limiadmin', 'e10adc3949ba59abbe56e057f20f883e', 0001, NULL, '127.0.0.1', '2013-06-19 09:33:53', '127.0.0.1', '2013-07-02 09:19:48', NULL),
(2, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 0000, NULL, '127.0.0.1', '2013-07-15 13:49:07', '127.0.0.1', '2013-07-15 13:49:07', 000011),
(3, 'lzp537', 'e10adc3949ba59abbe56e057f20f883e', 0000, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'lzp538', 'e10adc3949ba59abbe56e057f20f883e', 0000, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'test', '96e79218965eb72c92a549dd5a330112', 0000, NULL, '127.0.0.1', '2013-07-05 12:00:02', '127.0.0.1', '2013-07-05 12:00:02', 000007);

-- --------------------------------------------------------

--
-- 表的结构 `ejob_certificate`
--

CREATE TABLE IF NOT EXISTS `ejob_certificate` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `resumeid` mediumint(9) DEFAULT NULL,
  `certificatename` varchar(40) DEFAULT NULL,
  `certificatenote` mediumtext,
  `addtime` datetime DEFAULT NULL,
  `edittime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ejob_comapplyer`
--

CREATE TABLE IF NOT EXISTS `ejob_comapplyer` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `comid` mediumint(9) DEFAULT NULL,
  `resumeid` mediumint(9) DEFAULT NULL,
  `recruitid` mediumint(9) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ejob_comfavorite`
--

CREATE TABLE IF NOT EXISTS `ejob_comfavorite` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `comid` mediumint(9) DEFAULT NULL,
  `resumeid` mediumint(9) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ejob_education`
--

CREATE TABLE IF NOT EXISTS `ejob_education` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `resumeid` mediumint(9) DEFAULT NULL,
  `school` varchar(80) DEFAULT NULL,
  `begindate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `education` varchar(30) DEFAULT NULL,
  `bigmajor` varchar(120) DEFAULT NULL,
  `major` varchar(60) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `edittime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ejob_industry`
--

CREATE TABLE IF NOT EXISTS `ejob_industry` (
  `industryid` smallint(6) NOT NULL AUTO_INCREMENT,
  `sortname` varchar(120) DEFAULT NULL,
  `xh` smallint(6) DEFAULT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `level` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`industryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ejob_industry`
--

INSERT INTO `ejob_industry` (`industryid`, `sortname`, `xh`, `pid`, `level`) VALUES
(1, '计算机类', 1, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ejob_invited`
--

CREATE TABLE IF NOT EXISTS `ejob_invited` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `comid` mediumint(9) DEFAULT NULL,
  `perid` mediumint(9) DEFAULT NULL,
  `recruitid` mediumint(9) DEFAULT NULL,
  `senddate` datetime DEFAULT NULL,
  `note` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ejob_jobsort`
--

CREATE TABLE IF NOT EXISTS `ejob_jobsort` (
  `jobsortid` smallint(6) NOT NULL AUTO_INCREMENT,
  `sortname` varchar(120) DEFAULT NULL,
  `xh` smallint(6) DEFAULT NULL,
  `level` tinyint(4) DEFAULT NULL,
  `pid` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`jobsortid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ejob_language`
--

CREATE TABLE IF NOT EXISTS `ejob_language` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `resumeid` mediumint(9) DEFAULT NULL,
  `languagename` varchar(40) DEFAULT NULL,
  `readandwrite` varchar(40) DEFAULT NULL,
  `listenandtalk` varchar(40) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `edittime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ejob_majorsort`
--

CREATE TABLE IF NOT EXISTS `ejob_majorsort` (
  `majorsortid` smallint(6) NOT NULL AUTO_INCREMENT,
  `sortname` varchar(120) DEFAULT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `level` tinyint(4) DEFAULT NULL,
  `xh` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`majorsortid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `ejob_majorsort`
--

INSERT INTO `ejob_majorsort` (`majorsortid`, `sortname`, `pid`, `level`, `xh`) VALUES
(1, '哲学', 0, 0, 1),
(2, '经济学', 0, 0, 1),
(3, '法学', 0, 0, 1),
(4, '教育学', 0, 0, 1),
(5, '文学', 0, 0, 1),
(6, '历史学', 0, 0, 1),
(7, '理学', 0, 0, 1),
(8, '工学', 0, 0, 1),
(9, '农学', 0, 0, 1),
(10, '医学', 0, 0, 1),
(11, '军事学', 0, 0, 1),
(12, '管理学', 0, 0, 1),
(13, '哲学', 1, 1, 1),
(14, '科学技术哲学', 1, 1, 2),
(15, '国民经济学', 2, 1, 1),
(16, '理论经济学', 2, 1, 1),
(17, '马克思主义理论', 3, 1, 1),
(18, '民族学', 3, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `ejob_news`
--

CREATE TABLE IF NOT EXISTS `ejob_news` (
  `newsid` mediumint(4) NOT NULL AUTO_INCREMENT,
  `newssortid` tinyint(4) DEFAULT NULL,
  `newstitle` varchar(100) DEFAULT NULL,
  `pic` varchar(200) DEFAULT NULL,
  `newscontent` longtext,
  `author` varchar(20) DEFAULT NULL,
  `source` varchar(60) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `edittime` datetime DEFAULT NULL,
  `viewquantity` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`newsid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=67 ;

--
-- 转存表中的数据 `ejob_news`
--

INSERT INTO `ejob_news` (`newsid`, `newssortid`, `newstitle`, `pic`, `newscontent`, `author`, `source`, `addtime`, `edittime`, `viewquantity`) VALUES
(1, 36, '123', '', '', '', '', '2013-06-16 00:00:00', '2013-06-27 11:09:31', NULL),
(9, 36, 'teest0001', '', '<p>dddddddddddddd</p>\r\n', 'aaa', 'bbb', NULL, NULL, NULL),
(11, 75, 'addtime test', 'task.txt', '<p>dgggggggggggggggffffff</p>\r\n', 'm', 'a', '2013-06-27 00:00:00', '2013-06-28 10:51:58', NULL),
(12, 36, 'again', '', '<p>dddd</p>\r\n', 'd', 'd', '2013-06-27 00:00:00', NULL, NULL),
(13, 36, 'dddddd', '', '<p>dddddddddddddddddddddddddd</p>\r\n', 'dddddddddddddddddddd', 'dddddddddddddddddddd', '2013-06-27 03:20:12', NULL, NULL),
(14, 36, 'dferwer', '', '<p>e</p>\r\n', 'd', 'w', '2013-06-27 00:00:00', NULL, NULL),
(15, 36, 'hello', '', '<p>jjj</p>\r\n', 'j', 'j', '2013-06-27 00:00:00', NULL, NULL),
(16, 36, '11111111111111dddddddddddddddd', '', '<p>ddd</p>\r\n', 'dd', 'd', '2013-06-27 09:35:12', NULL, NULL),
(17, 36, 'news 10', '', '<p>d</p>\r\n', 'aaa', 'd', '2013-06-27 09:55:06', NULL, NULL),
(20, 36, 'hhhhhhh', '', '<p>h</p>\r\n', 'h', 'h', '2013-06-27 11:10:15', NULL, NULL),
(21, 36, 'd', '', '<p>d</p>\r\n', 'd', 'd', '2013-06-27 11:10:22', NULL, NULL),
(22, 36, '1', '', '<p>4</p>\r\n', '2', '3', '2013-06-27 11:10:27', NULL, NULL),
(23, 36, '3', '', '<p>5</p>\r\n', '4', '5', '2013-06-27 11:10:31', NULL, NULL),
(24, 36, '11', '', '<p>1</p>\r\n', '1', '1', '2013-06-27 11:10:36', NULL, NULL),
(25, 36, '22', '', '<p>2</p>\r\n', '2', '2', '2013-06-27 11:10:40', NULL, NULL),
(26, 36, '55', '', '<p>5</p>\r\n', '3', '5', '2013-06-27 11:10:45', NULL, NULL),
(27, 36, 'd', '', '<p>d</p>\r\n', 'd', 'd', '2013-06-27 11:10:59', NULL, NULL),
(28, 36, 's', '', '<p>s</p>\r\n', 's', 's', '2013-06-27 11:11:04', NULL, NULL),
(29, 36, 'f', '', '<p>f</p>\r\n', 'f', 'f', '2013-06-27 11:11:09', NULL, NULL),
(30, 36, 'a', '', '<p>s</p>\r\n', 's', 's', '2013-06-27 11:11:13', NULL, NULL),
(31, 36, 'b', '', '<p>b</p>\r\n', 'bb2', 'b', '2013-06-27 11:11:18', NULL, NULL),
(32, 36, 'd', '', '<p>d</p>\r\n', 's', 's', '2013-06-27 16:40:53', NULL, NULL),
(33, 36, 'd', '', '<p>d</p>\r\n', 'd', 'd', '2013-06-27 16:43:02', NULL, NULL),
(34, 36, 'd', '', '<p>d</p>\r\n', 'd', 'd', '2013-06-27 16:44:43', NULL, NULL),
(35, 36, 'd', '', '<p>d</p>\r\n', 'd', 'd', '2013-06-27 16:46:46', NULL, NULL),
(36, 36, 'ddddd', '', '<p>s</p>\r\n', 's', 's', '2013-06-27 16:47:33', NULL, NULL),
(37, 36, 'dferwer', '', '<p>d</p>\r\n', 'd', 'd', '2013-06-27 16:50:21', NULL, NULL),
(38, 36, 'd', 'E:/workspace/etherjobs/upload/20130627/task.txt', '<p>d</p>\r\n', 'd', 'd', '2013-06-27 17:08:46', NULL, NULL),
(43, 36, '11', '', '', '222', '', '2013-06-28 10:46:42', NULL, NULL),
(44, 36, 'çš„', '', '', 'è¾¾åˆ°', '', '2013-06-28 10:47:00', NULL, NULL),
(45, 36, '123', '', '<p>3</p>\r\n', '2', '', '2013-06-28 10:48:34', NULL, NULL),
(46, 36, '1', '', '<p>3</p>\r\n', '2', '', '2013-06-28 10:56:07', NULL, NULL),
(47, 36, '1', '', '<p>3</p>\r\n', '2', '2', '2013-06-28 10:57:17', NULL, NULL),
(48, 36, '1', '', '<p>4</p>\r\n', '2', '3', '2013-06-28 10:58:47', NULL, NULL),
(49, 36, '2', '', '<p>5</p>\r\n', '3', '4', '2013-06-28 10:59:46', NULL, NULL),
(50, 36, '1', 'E:/workspace/etherjobs/upload/news/201306/20130628045812.', '<p>3</p>\r\n', '2', '3', '2013-06-28 11:01:12', NULL, NULL),
(51, 36, '12', 'E:/workspace/etherjobs/upload/news/201306/20130628045915.', '<p>4</p>\r\n', '3', '4', '2013-06-28 11:02:16', NULL, NULL),
(52, 36, '2', 'E:/workspace/etherjobs/upload/news/201306/20130628050011.', '<p>3</p>\r\n', '3', '3', '2013-06-28 11:03:11', NULL, NULL),
(53, 36, '2', 'E:/workspace/etherjobs/upload/news/201306/20130628050430txt.txt', '<p>d</p>\r\n', 'çš„', '1', '2013-06-28 11:07:31', NULL, NULL),
(54, 36, '11111111111111dddddddddddddddd', 'E:/workspace/etherjobs/upload/news/201306/20130628050553txt.txt', '<p>3</p>\r\n', '222', '3', '2013-06-28 11:08:53', NULL, NULL),
(55, 36, '3', 'E:/workspace/etherjobs/upload/news/201306/20130628050717.txt', '<p>4</p>\r\n', '4', '4', '2013-06-28 11:10:17', NULL, NULL),
(56, 36, '11111111111111dddddddddddddddd', '', '<p>2</p>\r\n', '2', '2', '2013-06-28 16:19:46', NULL, NULL),
(57, 36, '123', 'E:/workspace/etherjobs/upload/news/201306/20130628101846.txt', '<p>3</p>\r\n', '2', '3', '2013-06-28 16:21:47', NULL, NULL),
(58, 36, 'ä»–', '', '<p>1</p>\r\n', '1', '1', '2013-07-05 10:56:37', NULL, NULL),
(59, 36, 'çš„', '', '<p>d</p>\r\n', 'çš„', 'çš„', '2013-07-05 10:59:04', NULL, NULL),
(60, 36, 'æ³•', '', '<p>f&nbsp;</p>\r\n', 'æ³•', 'æ³•', '2013-07-05 11:01:04', NULL, NULL),
(61, 36, 'åœ¨', '', '<p>åœ¨</p>\r\n', 'åœ¨', 'åœ¨', '2013-07-05 11:01:24', NULL, NULL),
(62, 36, 'ä»–ä»–ä»–ä»–', '', '<p>tä»–</p>\r\n', 'ä»–', 'ä»–', '2013-07-05 11:01:58', NULL, NULL),
(63, 36, 'æ³•', '', '<p>f&nbsp;</p>\r\n', 'æ³•', 'æ³•', '2013-07-05 11:02:41', NULL, NULL),
(64, 36, 'è¾¾åˆ°', '', '<p>dçš„</p>\r\n', 'è¾¾åˆ°', 'è¾¾åˆ°', '2013-07-05 11:03:24', NULL, NULL),
(65, 36, 'å¶çœ‹', '', '<p>æ–¹æ³•</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'å¶çœ‹', 'å¶çœ‹', '2013-07-05 11:04:18', NULL, NULL),
(66, 36, 'gg', '', '<p>gg</p>\r\n', 'g', 'g', '2013-07-11 17:03:37', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `ejob_newssort`
--

CREATE TABLE IF NOT EXISTS `ejob_newssort` (
  `newssortid` tinyint(4) NOT NULL AUTO_INCREMENT,
  `newsortname` varchar(20) DEFAULT NULL,
  `xh` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`newssortid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=111 ;

--
-- 转存表中的数据 `ejob_newssort`
--

INSERT INTO `ejob_newssort` (`newssortid`, `newsortname`, `xh`) VALUES
(36, 'ggggggg', NULL),
(39, 'ung12312gggg', NULL),
(66, '1111111111', NULL),
(75, 'asdf111', NULL),
(77, 'ddd11', NULL),
(85, '2', NULL),
(88, '1233', NULL),
(90, 'å®žæ‰“å®žçš„1', NULL),
(95, 'tttt', NULL),
(96, '1', NULL),
(97, 'ttt2222', NULL),
(100, 'test1111', NULL),
(102, 'ddd2', NULL),
(103, 'ddd11', NULL),
(104, 'aaa', NULL),
(105, 'ghh', NULL),
(106, 'v', NULL),
(108, 'sssss', NULL),
(109, 'undefined', NULL),
(110, 'qqdd', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `ejob_perapply`
--

CREATE TABLE IF NOT EXISTS `ejob_perapply` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `perid` mediumint(9) DEFAULT NULL,
  `comid` mediumint(9) DEFAULT NULL,
  `recruitid` mediumint(9) DEFAULT NULL,
  `senddate` datetime DEFAULT NULL,
  `isread` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ejob_perfavorite`
--

CREATE TABLE IF NOT EXISTS `ejob_perfavorite` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `perid` mediumint(9) DEFAULT NULL,
  `recruitid` mediumint(9) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ejob_perinterview`
--

CREATE TABLE IF NOT EXISTS `ejob_perinterview` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `perid` mediumint(9) DEFAULT NULL,
  `recruitid` mediumint(9) DEFAULT NULL,
  `comid` mediumint(9) DEFAULT NULL,
  `senddate` datetime DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ejob_practice`
--

CREATE TABLE IF NOT EXISTS `ejob_practice` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `resumeid` mediumint(9) DEFAULT NULL,
  `practicename` varchar(120) DEFAULT NULL,
  `practicenote` mediumtext,
  `begindate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `edittime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ejob_recruit`
--

CREATE TABLE IF NOT EXISTS `ejob_recruit` (
  `recruitid` mediumint(9) NOT NULL AUTO_INCREMENT,
  `comid` mediumint(9) DEFAULT NULL,
  `jobname` varchar(60) DEFAULT NULL,
  `quantity` tinyint(4) DEFAULT NULL,
  `workplace` varchar(60) DEFAULT NULL,
  `sex` tinyint(4) DEFAULT NULL,
  `workexp` varchar(60) DEFAULT NULL,
  `jobnote` longtext,
  `qualification` varchar(60) DEFAULT NULL,
  `jobtype` tinyint(4) DEFAULT NULL,
  `salary` varchar(4) DEFAULT NULL,
  `ispause` tinyint(4) DEFAULT NULL,
  `jobindustry` smallint(6) DEFAULT NULL,
  `jobsort` smallint(6) DEFAULT NULL,
  `jobmajor` smallint(6) DEFAULT NULL,
  `viewquantity` smallint(6) DEFAULT NULL,
  `begindate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `edittime` datetime DEFAULT NULL,
  `refresh` datetime DEFAULT NULL,
  `isauto` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`recruitid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ejob_resume`
--

CREATE TABLE IF NOT EXISTS `ejob_resume` (
  `resumeid` mediumint(9) NOT NULL DEFAULT '0',
  `perid` mediumint(9) DEFAULT NULL,
  `resumename` varchar(60) DEFAULT NULL,
  `edittime` datetime DEFAULT NULL,
  `ispublic` tinyint(4) DEFAULT NULL,
  `viewquantity` smallint(6) DEFAULT NULL,
  `jobtype` varchar(10) DEFAULT NULL,
  `jobworkplace` varchar(60) DEFAULT NULL,
  `jobindustry` smallint(4) DEFAULT NULL,
  `jobsort` smallint(4) DEFAULT NULL,
  `evaluation` mediumtext,
  `schoolpost` mediumtext,
  `schoolprize` mediumtext,
  `salary` varchar(60) DEFAULT NULL,
  `workingstate` tinyint(4) DEFAULT NULL,
  `refresh` datetime DEFAULT NULL,
  `isauto` tinyint(4) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`resumeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ejob_resviewrecord`
--

CREATE TABLE IF NOT EXISTS `ejob_resviewrecord` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `resumeid` mediumint(9) DEFAULT NULL,
  `comid` mediumint(9) DEFAULT NULL,
  `viewtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ejob_service`
--

CREATE TABLE IF NOT EXISTS `ejob_service` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(9) DEFAULT NULL,
  `utype` tinyint(4) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `servicenote` longtext,
  `contact` varchar(16) DEFAULT NULL,
  `tel` varchar(40) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ejob_shield`
--

CREATE TABLE IF NOT EXISTS `ejob_shield` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `perid` mediumint(9) DEFAULT NULL,
  `comid` mediumint(9) DEFAULT NULL,
  `companyname` varchar(120) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ejob_siteconfig`
--

CREATE TABLE IF NOT EXISTS `ejob_siteconfig` (
  `configid` tinyint(4) NOT NULL AUTO_INCREMENT,
  `sitename` varchar(60) DEFAULT NULL,
  `siteurl` varchar(120) DEFAULT NULL,
  `sitelogo` varchar(200) DEFAULT NULL,
  `siteicp` varchar(120) DEFAULT NULL,
  `siteclose` tinyint(4) DEFAULT NULL,
  `siteclosenote` mediumtext,
  `sitekeywords` varchar(200) DEFAULT NULL,
  `sitedescribe` varchar(400) DEFAULT NULL,
  `siteqq` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`configid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ejob_siteconfig`
--

INSERT INTO `ejob_siteconfig` (`configid`, `sitename`, `siteurl`, `sitelogo`, `siteicp`, `siteclose`, `siteclosenote`, `sitekeywords`, `sitedescribe`, `siteqq`) VALUES
(1, '站点名称kkkk', 'etherjob.com', NULL, '浙ICP88888888', 1, '网站维护中', '关键词', '站点描述', '305953518');

-- --------------------------------------------------------

--
-- 表的结构 `ejob_ucompany`
--

CREATE TABLE IF NOT EXISTS `ejob_ucompany` (
  `comid` mediumint(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `comname` varchar(60) DEFAULT NULL,
  `comnature` varchar(30) DEFAULT NULL,
  `comformation` date DEFAULT NULL,
  `regfunds` smallint(6) DEFAULT NULL,
  `employeenum` varchar(30) DEFAULT NULL,
  `comindustry` smallint(6) DEFAULT NULL,
  `province` smallint(6) DEFAULT NULL,
  `city` smallint(6) DEFAULT NULL,
  `county` smallint(6) DEFAULT NULL,
  `comcontent` longtext,
  `contact` varchar(20) DEFAULT NULL,
  `tel` varchar(60) DEFAULT NULL,
  `mobile` varchar(60) DEFAULT NULL,
  `fax` varchar(60) DEFAULT NULL,
  `comaddr` varchar(200) DEFAULT NULL,
  `postcode` varchar(20) DEFAULT NULL,
  `viewquantity` smallint(6) DEFAULT NULL,
  `compic` varchar(200) DEFAULT NULL,
  `fbzw` smallint(6) DEFAULT NULL,
  `Islock` tinyint(4) DEFAULT NULL,
  `edittime` datetime DEFAULT NULL,
  `lastloginip` varchar(60) DEFAULT NULL,
  `lastlogintime` datetime DEFAULT NULL,
  `thisloginip` varchar(60) DEFAULT NULL,
  `thislogintime` datetime DEFAULT NULL,
  `loginquantity` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`comid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ejob_uperson`
--

CREATE TABLE IF NOT EXISTS `ejob_uperson` (
  `perid` mediumint(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `realname` varchar(12) DEFAULT NULL,
  `sex` tinyint(4) DEFAULT NULL,
  `birth` varchar(60) DEFAULT NULL,
  `nation` varchar(20) DEFAULT NULL,
  `political` varchar(20) DEFAULT NULL,
  `marriage` varchar(20) DEFAULT NULL,
  `residenceaddr` varchar(20) DEFAULT NULL,
  `nowaddr` varchar(20) DEFAULT NULL,
  `qualification` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `tel` varchar(60) DEFAULT NULL,
  `mobile` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `isverify` tinyint(4) DEFAULT NULL,
  `perpic` varchar(200) DEFAULT NULL,
  `attachment1` varchar(200) DEFAULT NULL,
  `attachment2` varchar(200) DEFAULT NULL,
  `attachment3` varchar(200) DEFAULT NULL,
  `lastloginip` varchar(60) DEFAULT NULL,
  `lastlogintime` datetime DEFAULT NULL,
  `thisloginip` varchar(60) DEFAULT NULL,
  `thislogintime` datetime DEFAULT NULL,
  `loginquantity` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`perid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ejob_uperson`
--

INSERT INTO `ejob_uperson` (`perid`, `username`, `realname`, `sex`, `birth`, `nation`, `political`, `marriage`, `residenceaddr`, `nowaddr`, `qualification`, `address`, `tel`, `mobile`, `email`, `isverify`, `perpic`, `attachment1`, `attachment2`, `attachment3`, `lastloginip`, `lastlogintime`, `thisloginip`, `thislogintime`, `loginquantity`) VALUES
(1, 'yangfan', '杨帆', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `ejob_workexp`
--

CREATE TABLE IF NOT EXISTS `ejob_workexp` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `resumeid` mediumint(9) DEFAULT NULL,
  `company` varchar(60) DEFAULT NULL,
  `begindate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `jobname` varchar(60) DEFAULT NULL,
  `salary` varchar(60) DEFAULT NULL,
  `jobnote` mediumtext,
  `addtime` datetime DEFAULT NULL,
  `edittime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `eth_ucenter`
--

CREATE TABLE IF NOT EXISTS `eth_ucenter` (
  `uid` mediumint(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `mobile` varchar(40) DEFAULT NULL,
  `limiqq` varchar(40) DEFAULT NULL,
  `regip` varchar(60) DEFAULT NULL,
  `regdate` datetime DEFAULT NULL,
  `lastloginip` varchar(60) DEFAULT NULL,
  `lastlogintime` datetime DEFAULT NULL,
  `thisloginip` varchar(60) DEFAULT NULL,
  `thislogintime` datetime DEFAULT NULL,
  `loginquantity` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `eth_ucenter`
--

INSERT INTO `eth_ucenter` (`uid`, `username`, `password`, `email`, `mobile`, `limiqq`, `regip`, `regdate`, `lastloginip`, `lastlogintime`, `thisloginip`, `thislogintime`, `loginquantity`) VALUES
(1, 'yangfan', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2013-07-12 17:23:44', '127.0.0.1', '2013-07-12 17:23:44', 16),
(2, 'sjj', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2013-07-15 13:34:01', '127.0.0.1', '2013-07-15 13:34:01', 58),
(3, 'sjj1', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2013-07-11 20:21:12', '127.0.0.1', '2013-07-11 20:21:12', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
