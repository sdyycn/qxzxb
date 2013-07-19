<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.htaccess Online Editor</title>
<meta name="Keywords" content=".htaccess,htaccess" />
<meta name="Description" content="Easily create .htaccess files online" />
<meta name="Author" content="FoxCat" />
<meta name="Copyright" content="&copy; 2008 FoxCat. All rights reserved." />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<link rel="stylesheet" href="share/css/top_en.css" type="text/css" />
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
<h1><a href="./"><img src="share/images/common_files/logo_en.gif" alt=".htaccess Editor" width="300" height="60" /></a></h1>
<ul id="globalNavi"><li id="siteHome"><a href="./" title=".htaccess create">.htaccess create</a></li></ul>

<div id="language">
<select onchange='location=this.options[this.selectedIndex].value;'>
<option value="./" selected="selected"> English </option>
<option value="cn.php"> Chinese </option>
</select>
</div>

<ul id="sbs">
<?php include"share.php"; ?>
</ul>
<h2><img src="share/images/top/title_en.gif" alt="Create a .htaccess file" width="800" height="100" /></h2>

<div class="content" id="top">
<form name="htaccessform" action="">
<div id="inputForm">
<div id="itemColumn">
<ul>
<li class="display" title="Deny all access to files"><a href="#a_fileList" id="naviFileList" class="close" onclick="showElement('naviFileList')" onkeypress="showElement('naviFileList');" onkeyup="showElement('naviFileList');" accesskey="f">Deny all access to files （<span class="key">F</span>）</a></li>
<li class="display" title="Basic authentication"><a href="#a_basic" id="naviBasic" class="close" onclick="showElement('naviBasic')" onkeypress="showElement('naviBasic');" onkeyup="showElement('naviBasic');" accesskey="b">Basic authentication （<span class="key">B</span>）</a></li>
<li class="display" title="Error pages"><a href="#a_errorPage" id="naviErrorPage" class="close" onclick="showElement('naviErrorPage')" onkeypress="showElement('naviErrorPage');" onkeyup="showElement('naviErrorPage');" accesskey="e">Error page （<span class="key">E</span>）</a></li>
<li class="display" title="Default page"><a href="#a_extension" id="naviExtension" class="close" onclick="showElement('naviExtension')" onkeypress="showElement('naviExtension');" onkeyup="showElement('naviExtension');" accesskey="d">Default page （<span class="key">D</span>）</a></li>
<li class="display" title="Setup WWW"><a href="#a_WWW" id="naviWWW" class="close" onclick="showElement('naviWWW')" onkeypress="showElement('naviWWW');" onkeyup="showElement('naviWWW');" accesskey="w">Setup WWW （<span class="key">W</span>）</a></li>
<li class="display" title="Redirect directive"><a href="#a_redirect" id="naviRedirect" class="close" onclick="showElement('naviRedirect')" onkeypress="showElement('naviRedirect');" onkeyup="showElement('naviRedirect');" accesskey="r">Redirect directives （<span class="key">R</span>）</a></li>
<li class="display" title="Access restrictions"><a href="#a_access" id="naviAccess" class="close" onclick="showElement('naviAccess')" onkeyup="showElement('naviAccess');" onkeypress="showElement('naviAccess');" accesskey="a">Access restriction （<span class="key">A</span>）</a></li>
</ul>
</div>

<div id="inputColumn">
<div id="wrapper">
<div class="stretcher" id="fileList">
<h3>Deny all access to files</h3>
<p>We would strongly recommend choosing &quot;Deny(Y)&quot; if you do not have any particular reason.</p>
<p><select name="file_list" class="short" onchange="doAll()" onkeyup="doAll()" onblur="doAll()" >
<option value="" selected="selected">-</option>
<option value="true">allow</option>
<option value="false">deny</option>
</select></p>
</div>
<div class="stretcher" id="basic">
<h3>Basic authentication</h3>
<div class="step1">
<p><strong>STEP 1</strong> Create your .htpasswd</p>
<table>
<tr class="line">
<th>User name</th>
<td><input name="user" type="text" size="30" class="shortMiddle" /></td>
</tr>
<tr>
<th>Password</th>
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
</select>words
<input type="button" value="random password" onclick="generation(this.form)" class="randomBtn" />
<input type="hidden" name="alg" value="1" /></td>
</tr>
<tr class="line">
<th>&nbsp;</th>
<td><input type="button" value="Create" onclick="this.form.pwd2.value=htpasswd(this.form.user.value, this.form.pwd1.value, this.form.alg)" class="btn" /></td>
</tr>
<tr>
<th>.htpasswd</th>
<td><input name="pwd2" type="text" size="60" class="longIcon" /><br />
Create a file called &quot;.htpasswd&quot; and copy&amp;paset the texts above to file.</td>
</tr>
</table>
</div><!--step1-->
<div class="step2">
<p><strong>STEP 2</strong> Enter the path to the .htpasswd file（e.g.：/home/foo/bar/.htpasswd）</p>
<p><input name="sitePathPwd" type="text" size="60" class="longIcon" onkeyup="doAll()" onblur="doAll()" /></p>
</div><!--step2-->
</div>
<div class="stretcher" id="errorPage">
<h3>Error page setup</h3>
<p>Enter URLs or paths</p>
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
<h3>Default page</h3>
<p>Enter file name（e.g.：index.html）</p>
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
<h3>Setup WWW</h3>
<!--p>統一後のURLを入力</p--->
<p><input value="http://" name="unifiedURL" type="text" size="36" class="longIcon" onkeyup="doAll()" onblur="doAll()" /></p>
</div>
<div class="stretcher" id="redirect">
<h3>Redirect directives</h3>
<p>Enter the site path into &quot;From&quot; and URL into &quot;To&quot;</p>
<p><strong>301 Moved Permanently</strong></p>
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

<p style="margin-top: 15px;"><strong>302 Moved Temporarily</strong></p>
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
<h3>Access restrictions</h3>
<div class="leftColumn">
<p>Enter allowed addresses</p>
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
<p>Enter denied addresses</p>
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
<p class="info">Copy &amp; Paste the texts above to the .htaccess file.</p>
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
