<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh" xml:lang="zh">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.htaccess 在线制作</title>
<meta name="Keywords" content=".htaccess,htaccess,Basic认证,存取限制,设置转址" />
<meta name="Description" content=".htaccess" />
<meta name="Author" content="FoxCat" />
<meta name="Copyright" content="&copy; 2008 FoxCat. All rights reserved." />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<link rel="stylesheet" href="share/css/top_cn.css" type="text/css" />
<script type="text/javascript" src="share/js/open.js"></script>
<script type="text/javascript" src="share/js/basic.js"></script>
<script type="text/javascript" src="share/js/makeHtaccess.js"></script>
<script type="text/javascript" src="share/js/prototype.lite.js"></script>
<script type="text/javascript" src="share/js/moo.fx.js"></script>
<script type="text/javascript" src="share/js/moo.fx.pack.js"></script>
<script type="text/javascript">
//the main function, call to the effect object
function init(){
var stretchers = document.getElementsByClassName('stretcher'); //div that stretches
var toggles = document.getElementsByClassName('display'); //h3s where I click on
//accordion effect
var myAccordion = new fx.Accordion(
toggles, stretchers, {opacity: true, duration: 400}
);
//hash function
function checkHash(){
var found = false;
toggles.each(function(li, i){
if (window.location.href.indexOf(li.title) > 0) {
myAccordion.showThisHideOpen(stretchers[i]);
found = true;
}
});
return found;
}
if (!checkHash()) myAccordion.showThisHideOpen(stretchers[0]);
}
</script>
</head>
<body onload="showElement('naviFileList')">
<div id="wrapperAll">
<h1><a href="cn.php"><img src="share/images/common_files/logo_cn.gif" alt=".htaccess Editor" width="300" height="60" /></a></h1>
<ul id="globalNavi"><li id="siteHome"><a href="cn.php" title="制作.htaccess">制作.htaccess</a></li></ul>

<div id="language">
<select onchange='location=this.options[this.selectedIndex].value;'>
<option value="cn.php" selected="selected"> Chinese </option>
<option value="en.php"> English </option>
</select>
</div>

<ul id="sbs">
<?php include"share.php"; ?>
</ul>
<h2><img src="share/images/top/title_cn.gif" alt="制作.htaccess" width="800" height="100" /></h2>

<div class="content" id="top">
<form name="htaccessform" action="">
<div id="inputForm">
<div id="itemColumn">
<ul>
<li class="display" title="显示文件列表"><a href="#a_fileList" id="naviFileList" class="close" onclick="showElement('naviFileList')" onkeypress="showElement('naviFileList');" onkeyup="showElement('naviFileList');" accesskey="f">显示文件列表 （<span class="key">F</span>）</a></li>
<li class="display" title="Basic认证"><a href="#a_basic" id="naviBasic" class="close" onclick="showElement('naviBasic')" onkeypress="showElement('naviBasic');" onkeyup="showElement('naviBasic');" accesskey="b">Basic认证 （<span class="key">B</span>）</a></li>
<li class="display" title="错误页面"><a href="#a_errorPage" id="naviErrorPage" class="close" onclick="showElement('naviErrorPage')" onkeypress="showElement('naviErrorPage');" onkeyup="showElement('naviErrorPage');" accesskey="e">错误页面 （<span class="key">E</span>）</a></li>
<li class="display" title="预设页面"><a href="#a_extension" id="naviExtension" class="close" onclick="showElement('naviExtension')" onkeypress="showElement('naviExtension');" onkeyup="showElement('naviExtension');" accesskey="d">预设页面 （<span class="key">D</span>）</a></li>
<li class="display" title="设置WWW"><a href="#a_WWW" id="naviWWW" class="close" onclick="showElement('naviWWW')" onkeypress="showElement('naviWWW');" onkeyup="showElement('naviWWW');" accesskey="w">设置WWW （<span class="key">W</span>）</a></li>
<li class="display" title="设置转址"><a href="#a_redirect" id="naviRedirect" class="close" onclick="showElement('naviRedirect')" onkeypress="showElement('naviRedirect');" onkeyup="showElement('naviRedirect');" accesskey="r">设置转址 （<span class="key">R</span>）</a></li>
<li class="display" title="存取限制"><a href="#a_access" id="naviAccess" class="close" onclick="showElement('naviAccess')" onkeyup="showElement('naviAccess');" onkeypress="showElement('naviAccess');" accesskey="a">存取限制 （<span class="key">A</span>）</a></li>
</ul>
</div>

<div id="inputColumn">
<div id="wrapper">
<div class="stretcher" id="fileList">
<h3>是否显示文件列表</h3>
<p>若无特殊用途，建议您选择「是」</p>
<p><select name="file_list" class="short" onchange="doAll()" onkeyup="doAll()" onblur="doAll()" >
<option value="" selected="selected">-</option>
<option value="true">是</option>
<option value="false">否</option>
</select></p>
</div>
<div class="stretcher" id="basic">
<h3>Basic认证模式</h3>
<div class="step1">
<p><strong>STEP 1</strong> 制作.htpasswd</p>
<table>
<tr class="line">
<th>用户名</th>
<td><input name="user" type="text" size="30" class="shortMiddle" /></td>
</tr>
<tr>
<th>密码</th>
<td><input name="pwd1" type="text" size="30" class="shortMiddle" /> 
<select name="taille">
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option selected="selected">10</option>
<option>11</option>
<option>12</option>
<option>15</option>
<option>20</option>
</select>个字
<input type="button" value="随机生成" onclick="generation(this.form)" class="btn" />
<input type="hidden" name="alg" value="1" /></td>
</tr>
<tr class="line">
<th>&nbsp;</th>
<td><input type="button" value="制作.htpasswd" onclick="this.form.pwd2.value=htpasswd(this.form.user.value, this.form.pwd1.value, this.form.alg)" class="btn" /></td>
</tr>
<tr>
<th>.htpasswd</th>
<td><input name="pwd2" type="text" size="60" class="longIcon" /><br />
请将此栏的内容复制并储存为.htpasswd</td>
</tr>
</table>
</div><!--step1-->
<div class="step2">
<p><strong>STEP 2</strong> 设置.htpasswd的路径（例：/home/foo/bar/.htpasswd）</p>
<p><input name="sitePathPwd" type="text" size="60" class="longIcon" onkeyup="doAll()" onblur="doAll()" /></p>
</div><!--step2-->
</div>
<div class="stretcher" id="errorPage">
<h3>设置错误页面</h3>
<p>请输入网址或页面路径</p>
<table>
<tr class="line">
<td class="code">400</td>
<td class="description">Bad Request</td>
<td class="page"><input name="error400" type="text" size="36" class="longIcon" onkeyup="doAll()" onblur="doAll()" /></td>
</tr>
<tr>
<td class="code">401</td>
<td class="description">Auth Req'd</td>
<td class="page"><input name="error401" type="text" size="36" class="longIcon" onkeyup="doAll()" onblur="doAll()" /></td>
</tr>
<tr class="line">
<td class="code">402</td>
<td class="description">Payment Req'd</td>
<td class="page"><input name="error402" type="text" size="36" class="longIcon" onkeyup="doAll()" onblur="doAll()" /></td>
</tr>
<tr>
<td class="code">403</td>
<td class="description">Forbidden</td>
<td class="page"><input name="error403" type="text" size="36" class="longIcon" onkeyup="doAll()" onblur="doAll()" /></td>
</tr>
<tr class="line">
<td class="code">404</td>
<td class="description">Not Found</td>
<td class="page"><input name="error404" type="text" size="36" class="longIcon" onkeyup="doAll()" onblur="doAll()" /></td>
</tr>
<tr>
<td class="code">405</td>
<td class="description">Method Not Allowed</td>
<td class="page"><input name="error405" type="text" size="36" class="longIcon" onkeyup="doAll()" onblur="doAll()" /></td>
</tr>
<tr class="line">
<td class="code">406</td>
<td class="description">Not Acceptable</td>
<td class="page"><input name="error406" type="text" size="36" class="longIcon" onkeyup="doAll()" onblur="doAll()" /></td>
</tr>
<tr>
<td class="code">407</td>
<td class="description">Proxy Auth Repid</td>
<td class="page"><input name="error407" type="text" size="36" class="longIcon" onkeyup="doAll()" onblur="doAll()" /></td>
</tr>
<tr class="line">
<td class="code">408</td>
<td class="description">Request Time Out</td>
<td class="page"><input name="error408" type="text" size="36" class="longIcon" onkeyup="doAll()" onblur="doAll()" /></td>
</tr>
<tr>
<td class="code">409</td>
<td class="description">Conficting Request</td>
<td class="page"><input name="error409" type="text" size="36" class="longIcon" onkeyup="doAll()" onblur="doAll()" /></td>
</tr>
<tr class="line">
<td class="code">410</td>
<td class="description">Gone</td>
<td class="page"><input name="error410" type="text" size="36" class="longIcon" onkeyup="doAll()" onblur="doAll()" /></td>
</tr>
<tr>
<td class="code">411</td>
<td class="description">Content Len Req'd</td>
<td class="page"><input name="error411" type="text" size="36" class="longIcon" onkeyup="doAll()" onblur="doAll()" /></td>
</tr>
<tr class="line">
<td class="code">412</td>
<td class="description">Precondition Failed</td>
<td class="page"><input name="error412" type="text" size="36" class="longIcon" onkeyup="doAll()" onblur="doAll()" /></td>
</tr>
<tr>
<td class="code">413</td>
<td class="description">Entity Too Long</td>
<td class="page"><input name="error413" type="text" size="36" class="longIcon" onkeyup="doAll()" onblur="doAll()" /></td>
</tr>
<tr class="line">
<td class="code">414</td>
<td class="description">URI Too Long</td>
<td class="page"><input name="error414" type="text" size="36" class="longIcon" onkeyup="doAll()" onblur="doAll()" /></td>
</tr>
<tr>
<td class="code">500</td>
<td class="description">Int, Server Error</td>
<td class="page"><input name="error500" type="text" size="36" class="longIcon" onkeyup="doAll()" onblur="doAll()" /></td>
</tr>
<tr class="line">
<td class="code">501</td>
<td class="description">Not Implemented</td>
<td class="page"><input name="error501" type="text" size="36" class="longIcon" onkeyup="doAll()" onblur="doAll()" /></td>
</tr>
<tr>
<td class="code">502</td>
<td class="description">Bad Gateway</td>
<td class="page"><input name="error502" type="text" size="36" class="longIcon" onkeyup="doAll()" onblur="doAll()" /></td>
</tr>
<tr class="line">
<td class="code">503</td>
<td class="description">Service Unavailable</td>
<td class="page"><input name="error503" type="text" size="36" class="longIcon" onkeyup="doAll()" onblur="doAll()" /></td>
</tr>
<tr>
<td class="code">504</td>
<td class="description">Gateway Timeout</td>
<td class="page"><input name="error504" type="text" size="36" class="longIcon" onkeyup="doAll()" onblur="doAll()" /></td>
</tr>
<tr class="line">
<td class="code">505</td>
<td class="description">HTTP Ver Not Sup...</td>
<td class="page"><input name="error505" type="text" size="36" class="longIcon" onkeyup="doAll()" onblur="doAll()" /></td>
</tr>
</table>
</div>
<div class="stretcher" id="extension">
<div class="leftColumn">
<div class="item">
<h3>预设页面</h3>
<p>请输入文件名（例：index.html）</p>
<p>

<input name="extension1" type="text" size="36" class="middle" onkeyup="doAll()" onblur="doAll()" /><br />
<input name="extension2" type="text" size="36" class="middle" onkeyup="doAll()" onblur="doAll()" /><br />
<input name="extension3" type="text" size="36" class="middle" onkeyup="doAll()" onblur="doAll()" /><br />
<input name="extension4" type="text" size="36" class="middle" onkeyup="doAll()" onblur="doAll()" />
<input name="extension5" type="text" size="36" class="middle" onkeyup="doAll()" onblur="doAll()" /><br />
<input name="extension6" type="text" size="36" class="middle" onkeyup="doAll()" onblur="doAll()" /><br />
<input name="extension7" type="text" size="36" class="middle" onkeyup="doAll()" onblur="doAll()" /><br />
<input name="extension8" type="text" size="36" class="middle" onkeyup="doAll()" onblur="doAll()" />
</p>
</div><!--item-->
</div><!--leftColumn-->
<div class="rightColumn">
<!--div class="item">
<h3>SSI（Server Side Include）の利用</h3>
<p>チェックボックスにチェック</p>
<p><input name="ssiShtml" type="checkbox" value="" onkeyup="doAll()" onblur="doAll()"  /> SSIを.shtml形式で利用する<br />
<input name="ssiHtml" type="checkbox" value="" onkeyup="doAll()" onblur="doAll()"  /> SSIを.html形式で利用する
</p>
</div--><!--item-->
</div><!--rightColumn-->
</div><!--stretcher-->
<div class="stretcher" id="WWW">
<h3>设置WWW</h3>
<p>请输入设置后的网址</p>
<p><input value="http://" name="unifiedURL" type="text" size="36" class="longIcon" onkeyup="doAll()" onblur="doAll()" /></p>
</div>
<div class="stretcher" id="redirect">
<h3>设置转址</h3>
<p>在From输入网站路径、To内输入网址</p>

<p><strong>301 Moved Permanently</strong> 永久转址</p>
<ul>
<li class="line">From:&nbsp;<input name="redirectFrom1" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" />
To:&nbsp;<input name="redirectTo1" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" /></li>
<li>From:&nbsp;<input name="redirectFrom2" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" />
To:&nbsp;<input name="redirectTo2" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" /></li>
<li class="line">From:&nbsp;<input name="redirectFrom3" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" />
To:&nbsp;<input name="redirectTo3" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" /></li>
<!--li>From:&nbsp;<input name="redirectFrom4" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" />
To:&nbsp;<input name="redirectTo4" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" /></li>
<li class="line">From:&nbsp;<input name="redirectFrom5" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" />
To:&nbsp;<input name="redirectTo5" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" /></li>
<li>From:&nbsp;<input name="redirectFrom6" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" />
To:&nbsp;<input name="redirectTo6" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" /></li>
<li class="line">From:&nbsp;<input name="redirectFrom7" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" />
To:&nbsp;<input name="redirectTo7" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" /></li>
<li>From:&nbsp;<input name="redirectFrom8" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" />
To:&nbsp;<input name="redirectTo8" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" /></li-->
</ul>

<p style="margin-top: 15px;"><strong>302 Moved Temporarily</strong> 临时转址</p>
<ul>
<li class="line">From:&nbsp;<input name="redirect302From1" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" />
To:&nbsp;<input name="redirect302To1" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" /></li>
<li>From:&nbsp;<input name="redirect302From2" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" />
To:&nbsp;<input name="redirect302To2" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" /></li>
<li class="line">From:&nbsp;<input name="redirect302From3" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" />
To:&nbsp;<input name="redirect302To3" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" /></li>
<!--li>From:&nbsp;<input name="redirect302From4" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" />
To:&nbsp;<input name="redirect302To4" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" /></li>
<li class="line">From:&nbsp;<input name="redirect302From5" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" />
To:&nbsp;<input name="redirect302To5" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" /></li>
<li>From:&nbsp;<input name="redirect302From6" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" />
To:&nbsp;<input name="redirect302To6" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" /></li>
<li class="line">From:&nbsp;<input name="redirect302From7" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" />
To:&nbsp;<input name="redirect302To7" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" /></li>
<li>From:&nbsp;<input name="redirect302From8" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" />
To:&nbsp;<input name="redirect302To8" type="text" size="36" class="longIconRedirect" onkeyup="doAll()" onblur="doAll()" /></li-->
</ul>
</div>
<div class="stretcher" id="access">
<h3>存取限制</h3>
<div class="leftColumn">
<p>请输入允许存取的网址</p>
<ul>
<li class="line">OK:&nbsp;<input name="blockOK1" type="text" size="36" class="middle" onkeyup="doAll()" onblur="doAll()" /></li>
<li>OK:&nbsp;<input name="blockOK2" type="text" size="36" class="middle" onkeyup="doAll()" onblur="doAll()" /></li>
<li class="line">OK:&nbsp;<input name="blockOK3" type="text" size="36" class="middle" onkeyup="doAll()" onblur="doAll()" /></li>
<li>OK:&nbsp;<input name="blockOK4" type="text" size="36" class="middle" onkeyup="doAll()" onblur="doAll()" /></li>
<li class="line">OK:&nbsp;<input name="blockOK5" type="text" size="36" class="middle" onkeyup="doAll()" onblur="doAll()" /></li>
<li>OK:&nbsp;<input name="blockOK6" type="text" size="36" class="middle" onkeyup="doAll()" onblur="doAll()" /></li>
<li class="line">OK:&nbsp;<input name="blockOK7" type="text" size="36" class="middle" onkeyup="doAll()" onblur="doAll()" /></li>
<li>OK:&nbsp;<input name="blockOK8" type="text" size="36" class="middle" onkeyup="doAll()" onblur="doAll()" /></li>
</ul>
</div>
<div class="rightColumn">
<p>请输入拒绝存取的网址</p>
<ul>
<li class="line">NG:&nbsp;<input name="blockNG1" type="text" size="36" class="middle" onkeyup="doAll()" onblur="doAll()" /></li>
<li>NG:&nbsp;<input name="blockNG2" type="text" size="36" class="middle" onkeyup="doAll()" onblur="doAll()" /></li>
<li class="line">NG:&nbsp;<input name="blockNG3" type="text" size="36" class="middle" onkeyup="doAll()" onblur="doAll()" /></li>
<li>NG:&nbsp;<input name="blockNG4" type="text" size="36" class="middle" onkeyup="doAll()" onblur="doAll()" /></li>
<li class="line">NG:&nbsp;<input name="blockNG5" type="text" size="36" class="middle" onkeyup="doAll()" onblur="doAll()" /></li>
<li>NG:&nbsp;<input name="blockNG6" type="text" size="36" class="middle" onkeyup="doAll()" onblur="doAll()" /></li>
<li class="line">NG:&nbsp;<input name="blockNG7" type="text" size="36" class="middle" onkeyup="doAll()" onblur="doAll()" /></li>
<li>NG:&nbsp;<input name="blockNG8" type="text" size="36" class="middle" onkeyup="doAll()" onblur="doAll()" /></li>
</ul>
</div><!--rightColumn-->
</div><!--stretcher-->
</div><!--wrapper-->
</div><!--inputColumn-->
<script type="text/javascript">
Element.cleanWhitespace('wrapper');
init();
</script>
<br class="clear" />
</div>
<!--inputForm-->

<div id="google">
<?php include"adsense.php"; ?>
</div>

<div id="outputArea">
<textarea name="htaccess" cols="80" rows="10"></textarea>
<p class="info">请将生成的内容复制并储存为.htaccess</p>
</div><!--outputArea-->
</form>
</div><!--content-->
</div>
<!--wrapperAll-->
<div id="footer">
<p>Copyright&nbsp;&copy;&nbsp;2008&nbsp;<a href="<?php echo $_SERVER['PHP_SELF'] ?>">www.ugug.cn</a>.&nbsp;All&nbsp;Rights&nbsp;Reserved.</p>
</div><!--footer-->
</body>
</html>
