<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
// +----------------------------------------------------------------------+
// | PHP version 5                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2004 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 3.0 of the PHP license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.php.net/license/3_0.txt.                                  |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Authors: Original Author <author@example.com>                        |
// |          Your Name <you@example.com>                                 |
// +----------------------------------------------------------------------+
//
// 

function page($page, $total, $phpfile, $pagesize = 10, $pagelen = 7) {
    $pagecode = ""; //定义变量，存放分页生成的HTML
    $page = intval($page); //避免非数字页码
    $total = intval($total); //保证总记录数值类型正确
    if (!$total) return array(); //总记录数为零返回空数组
    $pages = ceil($total / $pagesize); //计算总分页
    if ($page < 1) $page = 1;//处理页码合法性
    if ($page > $pages) $page = $pages;
    $offset = $pagesize * ($page - 1);//计算查询偏移量，为什么要计算查询偏移量？
    //页码范围计算
    $init = 1; //起始页码数
    $max = $pages; //结束页码数
    $pagelen = ($pagelen % 2)? $pagelen : $pagelen + 1; //页码个数,设置页码个数为奇数
    $pageoffset = ($pagelen - 1) / 2; //页码个数左右偏移量
    //生成html
    $pagecode = "<div class = 'page'>";
    $pagecode.= "<span>".$page."/".$pages."</span>"; //第几页,共几页
    //如果是第一页，则不显示第一页和上一页的连接
    if ($page != 1) {
        $pagecode.= "<a href=\"".$phpfile."?page=1\">&lt;&lt;</a>"; //第一页
        $pagecode.= "<a href=\"".$phpfile."?page=".($page - 1)."\">&lt;</a>"; //上一页
    }
    //分页数大于页码个数时可以偏移
    if ($pages > $pagelen) {
        //如果当前页小于等于左偏移
        if ($page <= $pageoffset) {
            $init = 1;
            $max = $pagelen;
        } else { //如果当前页大于左偏移
            //如果当前页码右偏移超出最大分页数
            if ($page + $pageoffset >= $pages + 1) {
                $init = $pages - $pagelen + 1;
            } 
			else {
                //左右偏移都存在时的计算
                $init = $page - $pageoffset;
                $max = $page + $pageoffset;
            }
        }
    }
    //生成html
    for ($i = $init; $i <= $max; $i++) {
        if ($i == $page) {
            $pagecode.= "<span>".$i."</span>";
        } else {
            $pagecode.= "<a href=\"".$phpfile."?page=".$i."\'>".$i"</a>";
        }
    }
    if ($page != $pages) {
        $pagecode.= "<a href=\"".$phpfile."?page=" . ($page + 1) . "\">&gt;</a>"; //下一页
        $pagecode.= "<a href=\"".$phpfile."?page=".$pages."\'>&gt;&gt;</a>"; //最后一页
        
    }
    $pagecode.= "</div >";
    return array(
        "pagecode" => $pagecode,
        "sqllimit" => "limit" . $offset ."'".$pagesize
    );
}


函数参数： 

//$page 当前$_GET获得的页码 
//$total 总记录数 
//$phpfile 页码连接文件名 
//$pagesize 不用解释了吧 呵呵 
//$pagelen 最多显示几个页码 注意（奇数），对称嘛！ 
//函数返回一个数组： 
//pagecode 索引对应的内容是 生成的HTML 代码 
//sqllimit 索引对应的是sql limit 后缀 

        if($page<=$pageoffset){ 
            $init=1; 
            $max = $pagelen; 
        }else{//如果当前页大于左偏移 
            //如果当前页码右偏移超出最大分页数 
            if($page+$pageoffset>=$pages+1){ 
                $init = $pages-$pagelen+1; 
            }else{ 
                //左右偏移都存在时的计算 
                $init = $page-$pageoffset; 
                $max = $page+$pageoffset; 
            } 
        } 
    } 
    //生成html 
    for($i=$init;$i<=$max;$i++){ 
        if($i==$page){ 
            $pagecode.=’<span>’.$i.’</span>’; 
        } else { 
            $pagecode.="<a href=\"{$phpfile}?page={$i}\">$i</a>"; 
        } 
    } 
    if($page!=$pages){ 
        $pagecode.="<a href=\"{$phpfile}?page=".($page+1)."\">&gt;</a>";//下一页
        $pagecode.="<a href=\"{$phpfile}?page={$pages}\">&gt;&gt;</a>";//最后一页 
    } 
    $pagecode.="<input type=\"text\" size=\"3\" onkeydown=\"if(event.keyCode==13) {window.location.href=’{$phpfile}?page=’+this.value; return false;}\" /></div>"; 
    return array(’pagecode’=>$pagecode,’sqllimit’=>’ limit ’.$offset.’,’.$pagesize); 
} 


$phpfile = "index.php";//页面文件名
$page = isset($_GET["page"])?$_GET["page"]:1; //默认页码
$db = mysql_connect(’localhost’, ’test’, ’test’); //链接数据库
mysql_select_db(’test’, $db); //选择数据库
$counts = mysql_num_rows(mysql_query("select id from test ", $db)); //获取需要的数据总条数
$sql = "select id ,title from test "; //定义查询语句SQL
$getpageinfo = page($page, $counts, $phpfile); //调用函数，生成分页HTML 和 SQL LIMIT 子句
$sql.= $getpageinfo[’sqllimit’]; //组合完整的SQL语句
$data = $row = array(); //初始化数组
$result = mysql_query($sql, $db); //获取结果集
//将数据装入$data数组
while ($row = mysql_fetch_array($result)) {
    $data[] = $row;
}
echo $getpageinfo["pagecode"]; //显示分页的html代码
?>

