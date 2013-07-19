<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="description" content="">
<meta name="keywords" content="">
<title></title>
<link href="/template/default_en/images/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/template/default_en/images/jquery.js"></script>
</head>
<body>
<div class="head_login" id="user_login">
<form name="form1" action="/member.php" method="post">
<label>Username:</label><input type="text" id="ajax_user" name="user" style="width:100px" />
<label>Password:</label><input type="password" id="ajax_password" name="password" style="width:100px" />
<label>Code:</label><input type="text" name="code" id="ajax_code" style="width:50px" /><img src="/plus/code.php" name="code" border="0" id="code" style="display:block; float:left;cursor:pointer; margin-left:5px; display:inline"/>
<input type="hidden" id="ajax_lang" value="en" name="lang" /><input type="button" style="border:0; margin-left:5px; display:inline; padding:0" src="/template/default_en/images/login_input2.gif" name="go" id="ajax_login" />
<label><a href="/member.php?action=regist&lang=en">Register</a></label>
</form>
<div class="clear"></div>
</div><!--登录-->
<script type="text/javascript">
$(document).ready(function(){
	$('#code').click(function(){
	$(this).attr('src','/plus/code.php?tag='+new Date().getTime());
	});
	$.ajax({
			type:"POST",
			url:"/member.php",
			data:"action=is_ajax_login&lang="+"en",
			dataType:"json",
			success:function(data){
				if(data.login==1){
					$('#user_login').html(data.info);
				}
			}	
	});
	$('#ajax_login').click(function(){
		$.ajax({
			type:"POST",
			url:"/member.php",
			data:"action=ajax_login&lang="+$('#ajax_lang').val()+"&password="+$('#ajax_password').val()+"&user="+$('#ajax_user').val()+"&code="+$('#ajax_code').val(),
			dataType:"json",
			success:function(data){
				if(data.login==1){
					$('#user_login').html(data.info);
				}else{
					alert(data.info);
				}
			}
		});
	});
	
});
</script>

<div class="contain">
<div class="head">
 <div class="head_top"><a href="#">Contact Us</a><a href="#">Add To Favorites</a><a href="/index.php?lang=cn" >简体中文</a><a href="/index.php?lang=en" class="focus">English</a></div>
 <div class="head_logo">
  <div class="logo"></div>
  <div class="nav">
  <div class="nav_right">
   <ul>
    <li class="nav_left"></li>
	<li><a href="/index.php?lang=en">Home</a></li>
		<li class=""><a href="/book.php?lang=en"  title="Guestbook">Guestbook</a></li>
	   </ul>
   </div>
   <div class="clear"></div>
  </div>
 </div><!--导航-->
</div>
</div><!--顶部-->
<div class="flash">
<script language='javascript'>
linkarr = new Array();
picarr = new Array();
textarr = new Array();
var swf_width=950;
var swf_height=200;
var files = "";
var links = "";
var texts = "";
//这里设置调用标记
for(i=1;i<picarr.length;i++){
  if(files=="") files = picarr[i];
  else files += "|"+picarr[i];
}
for(i=1;i<linkarr.length;i++){
  if(links=="") links = linkarr[i];
  else links += "|"+linkarr[i];
}
for(i=1;i<textarr.length;i++){
  if(texts=="") texts = textarr[i];
  else texts += "|"+textarr[i];
}
document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ swf_width +'" height="'+ swf_height +'">');
document.write('<param name="movie" value="/data/flash_ad/ad_1/bcastr.swf"><param name="quality" value="high">');
document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
document.write('<param name="FlashVars" value="bcastr_file='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'">');
document.write('<embed src="/data/flash_ad/ad_1/bcastr.swf" wmode="opaque" FlashVars="bcastr_file='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'& menu="false" quality="high" width="'+ swf_width +'" height="'+ swf_height +'" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />'); document.write('</object>'); 
</script></div><!--幻灯--><div class="contain" style="margin-top:8px;">
 <div class="main_left">
  <h2 class="title"><span class="search_icon">Search</span></h2>
  <div class="search">
  <form name="form1" action="/search.php?lang=en" method="post" style="margin-top:5px;">
  <input name="key" style="width:100px; display:block; float:left; height:20px; line-height:19px;"/><input type="submit" name="submit" value="Search" style="border:1px solid #CC3300; background:#FF9900; color:#FFFFFF; margin-left:5px; padding:2px 0;" />
  </form>
  </div><!--搜索-->
  <h2 class="title" style="margin-top:15px;"><span class="link_icon">Contact</span></h2>
  <div class="link">
   </div>
  <h2 class="title"><span class="pr_icon">Navigation</span></h2>
  <ul class="pr_nav">
    </ul>
 </div><!--左边-->
 <div class="main_right">
  <h2 class="title2"><span>Company Profile</span></h2>
  <div class="us"></div>
  <div class="index_pr_list">
   <div class="list_top">
    <div class="list_btn">
	<div class="dl_list">
		
	</div>
	<div class="clear"></div>
	</div>
   </div>
  </div>
 </div><!--右边-->
 <div class="clear"></div>
</div><!--主体-->
<div class="index_link">
<h2 class="title2" style="border:none"><span>Links</span></h2>
<ul>
</ul>
<div class="clear"></div>
</div><!--友情-->
<div class="foot">
 <div class="foot_nav">
  <div class="foot_nav_left">
  <div class="foot_nav_right">
    <a href="/sitemap.php?lang=en" title="Site Map">Site Map</a>|
    <a href="/book.php?lang=en" title="Guestbook">Guestbook</a>|
    </div>
  </div>
 </div>
 <p></p>
 <p>备案号：</p>
 <p>powerd by <a href="http://www.beescms.com" target="_blank">BEESCMS</a></p>
</div><!--页脚-->
    <style type="text/css">
        /*浮动QQ在线客服*/
        .kf_contain{z-index:99; width:142px; right:0; top:100px; position:absolute}
        .kf_contain .kf_list{ width:142px; margin:0 auto; background:#3e3e48}
        .kf_contain .kf_list .t{background:url(/template/default_en/images/kf_top.gif) no-repeat left 0; height:66px; font-size:1px}
        .kf_contain .kf_list .b{background:#3e3e48;height:2px}
        .kf_contain .kf_list .con{margin:0 auto; background:#fff; margin:0 3px 3px 3px; width:136px; overflow:hidden; text-align:center}
        .kf_contain .kf_list .con .title{font-size:12px; margin-bottom:5px; margin-left:5px; text-align:left; height:20px; padding-left:20px; background:url(/template/default_en/images/kf_icon.gif) no-repeat left center; line-height:20px; color:#000000}
        .kf_contain .kf_list .con ul{margin:0 auto; padding:0; width:133px; background-color:#FFFFFF; border:#FFFFFF 1px solid}
        .kf_contain .kf_list .con li{font-size:9pt; list-style-type:none; height:25px; padding-right:5px; clear:both; display:block;}
        .kf_contain .kf_list .con li span{line-height:25px; margin-left:10px;  display:block; vertical-align:middle}
		.kf_contain .kf_list .con li span.lf{float:left}
		.kf_contain .kf_list .con li span.lr{float:right}
		.on_kf{width:25px; height:120px; float:right}
        /*浮动QQ在线客服*/
    </style>
    <form id="form1" runat="server">
    <div>
	<div  class="kf_contain" id="kf_contain">
		<div class="on_kf" id="on" onmouseover="kf_on();"><img src="/template/default_en/images/on.gif"  border="0" alt="客服"/></div>
        <div >
            <div class="kf_list" id="off" onmouseout="kf_off();" onmousemove="kf_on();">
                <div class="t"></div>
				
                <div class="con">
                    <ul>
					                    </ul>
					
                </div>
				
                <div class="b"></div>
            </div>
        </div>
    </div>
	</div>
    </form>
</body>
</html>
<script type="text/javascript">
    var tips;
    var theTop = 100/*这是默认高度,越大越往下*/;
    var old = theTop;
	var $on_e= document.getElementById("on");
	var	$off_e=document.getElementById("off");
    function initFloatTips() {
        document.getElementById("off").style.display = "none";
        tips = document.getElementById("kf_contain");
        moveTips();
    };
    function moveTips() {
        var sped = 50;
        if (window.innerHeight) {
            pos = window.pageYOffset
        }
        else if (document.documentElement && document.documentElement.scrollTop) {
            pos = document.documentElement.scrollTop
        }
        else if (document.body) {
            pos = document.body.scrollTop;
        }
        pos = pos - tips.offsetTop + theTop;
        pos = tips.offsetTop + pos / 10;
        if (pos < theTop) pos = theTop;
        if (pos != old) {
            tips.style.top = pos + "px";
            sped = 10;
        }
        old = pos;
        setTimeout(moveTips, sped);
    }
    initFloatTips();
	function kf_on(){
		$on_e.style.display = "none";
		$off_e.style.display = "block";
	}
	function kf_off(){
		$on_e.style.display = "block";
		$off_e.style.display = "none";
	}
</script></body>
</html>