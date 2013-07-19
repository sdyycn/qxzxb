<?
//说明：
//一、此分页函数一共有三个
//1、function setParam($param1) //传递参数
//2、function page1($sqlstr)//执行query
//3、function page2($style)//分页的页码显示
//二、分页页码显示一共有六种显示方式
//样式1: 第 1 2 3 4 5 6 7 8 9 页
//样式2: 共 记录 第一页 上一页 6 7 8 9 10 11 12 13 14 15 16 17 18 下一页 最后页
//样式3: 第一页 上一页 6 7 8 9 10 11 12 13 14 15 16 17 18 下一页最后页
//样式4: 首页 | 上页 | 下页 | 末页
//样式5: 首页 | 上页 | 下页 | 末页 第 页 每页 条
//样式6: 第 页 每页 条
//
//三、函数的使用
//把三个函数拷到你要使用的页面上。或者你建立一个function.php文件，把三个函数拷到function.php文件中，
//在需要使用的时候require就可以了。
//使用示例：

$str="select * from Table ";//不能用limit,Table改为你自己的表名
$temp=page1($str);//这里设置你你要传递的参数
$param1=array("a1","a2");//你可以加任意个你需要传递的参数，只要写上参数的名字。不要使
用$per_page,$page
$param=setParam($param1);

//这里显示你的分页导航条
page2(n);//n可以为1-6的数值，也可以不设置。

while ($result=mysql_fetch_array($temp))
{
// 写你自己的显示语句。
}





//----------------------------------分页函数共三个-------------------//
// ipsearch 2003-08-01
//email ipsearch@sohu.com QQ=153254

//-----------------------------------分页函数共三个-------------------//
function setParam($param1)
{
// ipsearch 2003-08-01
//email ipsearch@sohu.com
foreach( $param1 as $key)
{
global ${$key};
$param .= urlencode($key).'='.urlencode(${$key}).'&';
}
return $param;
}

function page1($sqlstr)//分页的第一个处理程序,用来处理一系列环境变量.
{
// ipsearch 2003-08-01
//email ipsearch@sohu.com
global $rows_num,$page,$pages_num,$per_page,$rows_offset,$per_screen;

if (!isset($page)) $page=1;//第几页
if (!isset($rows_offset)) $rows_offse=2; //每页起始偏移
if (!isset($per_screen)) $per_screen=10;//分页样式2 3 显示的页数
if (!isset($per_page)) $per_page=30;//每页记录行数。
$query=mysql_query($sqlstr);
$rows_num=mysql_num_rows($query);
$pages_num = ceil(($rows_num-$rows_offset)/$per_page);
$str= $sqlstr." limit ".(($page-1)*$per_page+$rows_offset).", ".$per_page;
return mysql_query($str);
}
function page2($style=2)
{
global $rows_num,$page,$pages_num,$per_page,$rows_offset,$param,$per_screen;
$font_size="10pt";


switch($style) {
case 1:
/* 样式1: 第 1 2 3 4 5 6 7 8 9 页*/
for($i=1; $i<=$pages_num; $i++) {
if (($i%26)==0) $nav .="<br>";
if($i == $page) {
$nav .= " <span style='font-size=$font_size;color=red;'>$i</span> ";
}else {
$nav .= " <a href=><span style='font-size=$font_size;'>$i</span></a> ";
}
}
$nav = "<span style='font-size=$font_size;'>第</spqn> $nav <span style='font-size=$font_size;'>
页</span>";
break;

case 2:
/* 样式2: 共 记录 第一页 上一页 6 7 8 9 10 11 12 13 14 15 16 17 18 下一页 最后页
$per_screen 每页显示的条数
*/
$mid = ceil(($per_screen+1)/2);
$nav = '';
if($page<=$mid ) {
$begin = 1;
}else if($page > $pages_num-$mid) {
$begin = $pages_num-$per_screen+1;
}else {
$begin = $page-$mid+1;
}
if($begin<0) $begin = 1;
$nav .="<span style='font-size=$font_size;'>共".$rows_num."记录</span> ";
if($begin!=1) $nav .= "<span style='font-size=$font_size;'>[</span><a href='' title='第1
页'><span style='font-size=$font_size;'>第一页</span></a><span
style='font-size=$font_size;'>]</spqn> ";
if($page>1) $nav .= "<span style='font-size=$font_size;'>[</span><a href='' title='第".($page-1)."页'><span style='font-size=$font_size;'>上一页</span></a><span
style='font-size=$font_size;'>]</span> ";
$end = ($begin+$per_screen>$pages_num)?$pages_num+1:$begin+$per_screen;
for($i=$begin; $i<$end; $i++) {
$nav .=($page!=$i)?"<a href='' title='第{$i}页'><span
style='font-size=$font_size;'>$i</span></a> ":" <span
style='font-size=$font_size;color:red;'>$i</span> ";
}
if($page<$pages_num) $nav .= "<span style='font-size=$font_size;'>[</span><a href='?
$param&page=".($page+1)."' title='第".($page+1)."页'><span style='font-size=$font_size;'>下一
页</span></a><span style='font-size=$font_size;'>]</span> ";
if($end!=$pages_num+1) $nav .= "<span style='font-size=$font_size;'>[</span><a href='' title='第{$pages_num}页'><span style='font-size=$font_size;'>最后
页</span></a><span style='font-size=$font_size;'>]</span> ";
break;

case 3:
/* 样式3: << 第一页 ... << 上一页 6 7 8 9 10 11 12 13 14 15 16 17 18 下一页 >> ... 最后页 >>
*/
$mid = ceil(($per_screen+1)/2);
$nav = '';
if($page<=$mid ) {
$begin = 1;
}else if($page > $pages_num-$mid) {
$begin = $pages_num-$per_screen+1;
}else {
$begin = $page-$mid+1;
}
if($begin<0) $begin = 1;
if($begin!=1) $nav .= "<span style='font-size=$font_size;'>[</span><a href='' title='第1
页'><span style='font-size=$font_size;'>第一页</span></a><span
style='font-size=$font_size;'>]</spqn> ";
if($page>1) $nav .= "<span style='font-size=$font_size;'>[</span><a href='' title='第".($page-1)."页'><span style='font-size=$font_size;'>上一页</span></a><span
style='font-size=$font_size;'>]</span> ";
$end = ($begin+$per_screen>$pages_num)?$pages_num+1:$begin+$per_screen;
for($i=$begin; $i<$end; $i++) {
$nav .=($page!=$i)?"<span style='font-size=$font_size;'>[</span><a href=''
title='第{$i}页'><span style='font-size=$font_size;'>$i</span></a><span
style='font-size=$font_size;'>]</span> ":" <span style='font-size=$font_size;'>[</span><span
style='font-size=$font_size;color:red;'>$i</span><span style='font-size=$font_size;'>]</span> ";
}
if($page<$pages_num) $nav .= "<span style='font-size=$font_size;'>[</span><a href='?
$param&page=".($page+1)."' title='第".($page+1)."页'><span style='font-size=$font_size;'>下一
页</span></a><span style='font-size=$font_size;'>]</span> ";
if($end!=$pages_num+1) $nav .= "<span style='font-size=$font_size;'>[</span><a href='' title='第{$pages_num}页'><span style='font-size=$font_size;'>最后
页</span></a><span style='font-size=$font_size;'>]</span> ";
break;

case 4:
if ($page > 1) {
$nav .= '<a href=""><span style=\'font-size=$font_size;\'>首页</span></a>
<span style=\'font-size=$font_size;\'>|</span> ';
$nav .= '<a href=""><span style=\'font-size=$font_size;\'>上
页</span></a> <span style=\'font-size=$font_size;\'>|</span> ';
}else {
$nav .= '<span style="font-size=$font_size;">首页 |</span> ';
$nav .= '<span style="font-size=$font_size;">上页 |</span> ';
}
if ($page < $pages_num) {
$nav .= '<a href=""><span style=\'font-size=$font_size;\'>下
页</span></a> <span style=\'font-size=$font_size;\'>|</span> ';
$nav .= '<a href=""><span style=\'font-size=$font_size;\'>末
页</span></a>';
}else {
$nav .= '<span style=\'font-size=$font_size;\'>下页 |</span> ';
$nav .= '<span style=\'font-size=$font_size;\'>末页</span>';
}
break;

case 5:
$param .="per_page=".$per_page."&";
if ($page > 1) {
$nav .= '<a href=""><span style=\'font-size=$font_size;\'>首页</span></a>
<span style=\'font-size=$font_size;\'>|</span> ';
$nav .= '<a href=""><span style=\'font-size=$font_size;\'>上
页</span></a> <span style=\'font-size=$font_size;\'>|</span> ';
}else {
$nav .= '<span style="font-size=$font_size;">首页 |</span> ';
$nav .= '<span style="font-size=$font_size;">上页 |</span> ';
}
if ($page < $pages_num) {
$nav .= '<a href=""><span style=\'font-size=$font_size;\'>下
页</span></a> <span style=\'font-size=$font_size;\'>|</span> ';
$nav .= '<a href=""><span style=\'font-size=$font_size;\'>末
页</span></a>';
}else {
$nav .= '<span style=\'font-size=$font_size;\'>下页 |</span> ';
$nav .= '<span style=\'font-size=$font_size;\'>末页</span>';
}

$nav .= ' <span style=\'font-size=$font_size;\'>第</span><select
onchange="location.href=\'?'.$param.'&page=\'+this.value;">';
for($i=1; $i<=$pages_num; $i++) {
$nav .= '<option value="'.$i.'"'.($i==$page?' selected':'').'>'.$i.'</option>';
}
$nav .= "</select><span style=\'font-size=$font_size;\'>页</span>";


$nav .= ' <span style=\'font-size=$font_size;\'>每页</span><select
onchange="location.href=\'?'.$param.'&page='.$page.'&per_page=\'+this.value;">';

$nav .= '<option value="10"'.(10==$per_page?' selected':'').'>10</option>';
$nav .= '<option value="15"'.(15==$per_page?' selected':'').'>15</option>';
$nav .= '<option value="20"'.(20==$per_page?' selected':'').'>20</option>';
$nav .= '<option value="25"'.(25==$per_page?' selected':'').'>25</option>';
$nav .= '<option value="30"'.(30==$per_page?' selected':'').'>30</option>';
$nav .= '<option value="40"'.(40==$per_page?' selected':'').'>40</option>';
$nav .= '<option value="50"'.(50==$per_page?' selected':'').'>50</option>';
$nav .= '<option value="100"'.(100==$per_page?' selected':'').'>100</option>';
$nav .= "</select><span style=\'font-size=$font_size;\'>条</span>";
break;
/*下拉框直接跳转 */
case '6':
$param .="per_page=".$per_page."&";
$nav = '<span style=\'font-size=$font_size;\'>第</span><select
onchange="location.href=\'?'.$param.'&page=\'+this.value;">';
for($i=1; $i<=$pages_num; $i++) {
$nav .= '<option value="'.$i.'"'.($i==$page?' selected':'').'>'.$i.'</option>';
}
$nav .= "</select><span style=\'font-size=$font_size;\'>页</span>";

$nav .= ' <span style=\'font-size=$font_size;\'>每页</span><select
onchange="location.href=\'?'.$param.'&page='.$page.'&per_page=\'+this.value;">';

$nav .= '<option value="10"'.(10==$per_page?' selected':'').'>10</option>';
$nav .= '<option value="15"'.(15==$per_page?' selected':'').'>15</option>';
$nav .= '<option value="20"'.(20==$per_page?' selected':'').'>20</option>';
$nav .= '<option value="25"'.(25==$per_page?' selected':'').'>25</option>';
$nav .= '<option value="30"'.(30==$per_page?' selected':'').'>30</option>';
$nav .= '<option value="40"'.(40==$per_page?' selected':'').'>40</option>';
$nav .= '<option value="50"'.(50==$per_page?' selected':'').'>50</option>';
$nav .= '<option value="100"'.(100==$per_page?' selected':'').'>100</option>';
$nav .= "</select><span style=\'font-size=$font_size;\'>条</span>";
break;

default:
$nav = '';
}
echo $nav;
}
// ipsearch 2003-08-01
//email ipsearch@sohu.com
//--------------------------------------------------end 分页函数--------------