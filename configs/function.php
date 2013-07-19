<?php
//提示信息并导向
function alert($msg,$url)
{
  if (is_int($url)==true)
  {
    if ($url==0)
    {
      echo "<script>alert(\"$msg\");window.close();</script>";
    }
    else
    {
      echo "<script>alert(\"$msg\");history.go(-$url);</script>";
    }
  }
  else
  {
    echo "<script>alert(\"$msg\");window.location=\"$url\";</script>";
  }
  exit;
}
//页面跳转
function  pageskip($url){
	echo "<script>window.location=\"$url\";</script>";
	}
//检查是否合法参数
function chkint($value)
{
  $value=intval($value);
  if ($value<=0)
  {
    echo "<script>alert(\"参数错误！\");history.go(-1);</script>";
    exit;
  }
  return $value;
}
//检测select
function ckselect($str1,$str2){
	if($str1==$str2){echo "selected =true" ;}
}
//检测
function ckcheck($str1,$str2){
	if($str1==$str2){echo "checked='checked'" ;}
}
//html代码过滤
function filterhtml($str) {
$str=eregi_replace("</*[^<>]*>", '', $str);
$str=str_replace(" ", '', $str);
$str=str_replace("n", '', $str);
$str=str_replace("t", '', $str);
$str=str_replace("::", ':', $str);
$str=str_replace(" ", '', $str);
return $str;
}
//escape  解码
function unescape($str){
$ret = '';
$len = strlen($str);
for ($i = 0; $i < $len; $i++){
if ($str[$i] == '%' && $str[$i+1] == 'u'){
$val = hexdec(substr($str, $i+2, 4));
if ($val < 0x7f) $ret .= chr($val);
else if($val < 0x800) $ret .= chr(0xc0|($val>>6)).chr(0x80|($val&0x3f));
else $ret .= chr(0xe0|($val>>12)).chr(0x80|(($val>>6)&0x3f)).chr(0x80|($val&0x3f));
$i += 5;
}
else if ($str[$i] == '%'){
$ret .= urldecode(substr($str, $i, 3));
$i += 2;
}
else $ret .= $str[$i];
}
return $ret;
} 
//生成文件夹
function make_file($filename){
	@mkdir($filename,0777);
}
//生成文件
function fp_write($config_filename,$contents){
$fp = fopen($config_filename,w);
fwrite($fp,$contents);
fclose($fp);
}

//生成图片名称
function my_setfilename(){
 $gettime = explode(' ',microtime());
 $string = 'abcdefghijklmnopgrstuvwxyz0123456789';
 $rand = '';
 for ($x=0;$x<12;$x++)
  $rand .= substr($string,mt_rand(0,strlen($string)-1),1);
 return date("ymdHis").substr($gettime[0],2,6).$rand;
}
//判断数组是否为空
function checkArray($array){
foreach ($array as $value){
if(is_array($value)){
if(count($value)){
if(!checkArray($value)){
return false;
}
}
}else{
$value=trim($value);
if(!empty($value)){
return false;
}
}
$i++;
}
return true;
}  
?>