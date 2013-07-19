<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="description" content="<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>漂浮广告</title>
</head>
<body>
<DIV id=img1 style="Z-INDEX: 100; LEFT: 2px; WIDTH: ">
<meta name="keywords" content="">
<title>经典漂浮广告的JS代码_下载中心_汽车转向泵,齿轮泵,叶片泵-绍兴县申达液压机械厂,申达液压机械厂,Shenda Hydraulic Machinery Factory, Power Steering Pump</title>
<link href="/template/default/images/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/template/default/images/jquery.js"></script>
<script type="text/javascript" src="/template/default/images/nav.js"></script>
</head>
<body>
<div class="head_login" id="user_login">
	<form name="form1" action="/member.php" method="post">
		<label>用户名:</label>
		<input type="text" id="ajax_user" name="user" style="width:100px" />
		<label>登陆密码:</label>
		<input type="password" id="ajax_password" name="password" style="width:100px" />
		<label>验证码:</label>
		<input type="text" name="code" id="ajax_code" style="width:50px" />
		<img src="/plus/code.php" name="code" border="0" id="code" style="display:block; float:left;cursor:pointer; margin-left:5px; display:inline"/>
		<input type="hidden" id="ajax_lang" value="cn" name="lang" />
		<input type="button" style="border:0; margin-left:5px; display:inline; padding:0" src="/template/default/images/login_input2.gif" name="go" id="ajax_login" />
		<label>
			<a href="/member.php?action=regist&lang=cn">注册会员</a>
		</label>
	</form>
	
	<div class="head_right">
		<a href="#" onclick="javascript:window.external.AddFavorite('http://www.qxzxb.com','')" title="收藏本站到你的收藏夹">加入收藏</a>
				<a href="/index.php?lang=cn" class="focus" >简体中文</a>
				<a href="/index.php?lang=en"  >English</a>
			</div>
	<div class="clear"></div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$('#code').click(function(){
	$(this).attr('src','/plus/code.php?tag='+new Date().getTime());
	});
	$.ajax({
			type:"POST",
			url:"/member.php",
			data:"action=is_ajax_login&lang="+"cn",
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

<div class="head">
	<div class="head_left">
		<div class="logo"><a href="/index.php?lang=cn"><img src="/template/default/images/logo.jpg" border="0" /></a></div>
	</div>
	<div class="clear"></div>
</div>

<div class="head_nav"><!--head-->
	<div class="nav_left">
	<div class="nav_right">
	<ul>
		<li>
		<div id ='nav_time'>
		</div>
		<script type="text/javascript">
			nav_timer();
			setInterval("nav_timer()", 1000);
			function nav_timer(){
				document.getElementById("nav_time").innerHTML=new Date().toLocaleString()+'&nbsp;&nbsp;'
			}
		</script>
		</li>
		<li><a href="/index.php?lang=cn">首页</a></li>
		 
		<li class="">
			<a href="/show_list.php?id=11" >企业介绍</a>
					</li>
		 
		<li class="">
			<a href="/show_list.php?id=5" >产品展示</a>
					</li>
		 
		<li class="">
			<a href="/show_list.php?id=6" >新闻中心</a>
					</li>
		 
		<li class="">
			<a href="/show_list.php?id=7" >联系我们</a>
					</li>
		 
		<li class="">
			<a href="/book.php?lang=cn" >留言本</a>
					</li>
			</ul>
	</div>
	</div>
</div><!--head -->

<div class="div_margin"></div>

<div class="flash">
<script language='javascript'>
linkarr = new Array();
picarr = new Array();
textarr = new Array();
var swf_width=950;
var swf_height=200;
var text_height=0;
var files = "";
var links = "";
var texts = "";
//这里设置调用标记
linkarr[1] = "http://www.qxzxb.com";
picarr[1]  = "/upload/img/20110529/20110529223910.jpg";
linkarr[2] = "http://www.qxzxb.com";
picarr[2]  = "/upload/img/20110529/20110529223952.JPG";
linkarr[3] = "http://www.qxzxb.com";
picarr[3]  = "/upload/img/20110529/20110529224020.JPG";
linkarr[4] = "http://www.qxzxb.com";
picarr[4]  = "/upload/img/20110529/20110529224047.JPG";
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
document.write('<param name="movie" value="/data/flash_ad/ad_3/bcastr.swf"><param name="quality" value="high">');
document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
document.write('<param name="FlashVars" value="pics='+files+'&links='+links+'&texts='+texts+'&borderwidth='+swf_width+'&borderheight='+swf_height+'&textheight='+text_height+'">');
document.write('<embed src="/data/flash_ad/ad_3/bcastr.swf" wmode="opaque" FlashVars="pics='+files+'&links='+links+'&texts='+texts+'&borderwidth='+swf_width+'&borderheight='+swf_height+'&textheight='+text_height+'" menu="false" quality="high" width="'+ swf_width +'" height="'+ swf_height +'" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />'); document.write('</object>'); 
</script></div><div class="div_margin"></div>
<div class="contain">
	<div class="contain_left">
		<div class="box left_width">
		<div class="box_left"></div>
		<div class="box_right"></div>
			<div class="box_title"><h2>产品导航</h2></div>
			<div class="box_in">
				<ul class="nav_list">
								</ul>
			</div>
		</div><!--容器结束-->
		<div class="div_margin"></div>
			<div class="box">
			<div class="box_left"></div>
			<div class="box_right"></div>
			<div class="box_title"><h2>联系方式</h2></div>
			<div class="box_in">
				<div class="contact">
								</div>
			</div>
		</div><!--容器结束-->
		<div class="div_margin"></div>
			<div class="box">
			<div class="box_left"></div>
			<div class="box_right"></div>
			<div class="box_title"><h2>热门内容</h2></div>
			<div class="box_in">
				<div class="list_news">
					<ul>
						   				</ul>  
				</div>
			</div>
		</div><!--容器结束-->
		<div class="div_margin"></div>
			<div class="box">
			<div class="box_left"></div>
			<div class="box_right"></div>
			<div class="box_title"><h2>推荐产品</h2></div>
			<div class="box_in">
				<div class="list_product">
					<ul>
					 	   				</ul>
					<div class="clear"></div>  
				</div>
			</div>
		</div><!--容器结束-->
		
	</div><!--左边内容-->
	<div class="contain_right">
		
		<div class="box">
			<div class="box_left"></div>
			<div class="box_right"></div>
			<div class="box_title"><h2 class="position"><span>当前位置:<a href="/index.php?lang=cn">首页</a> > <a href="/show_list.php?id=9">下载中心</a> > 经典漂浮广告的JS代码</span></h2></div>
			<div class="box_in">
				<p class="title">经典漂浮广告的JS代码</p>
  <p class="info"><span>点击次数:<script language="javascript" src="/includes/hits.php?id=7"></script></span><span>更新时间:2011-06-01 10:06:12</span><span><a href="javascript:window.print()">【打印】</a></span><span><a href="javascript:self.close()">【关闭】</a></span></p>
 <ul class="soft_info">
  <li><span>文件类型:</span>其他</li>
  <li><span>文件大小:</span>50000</li>
 </ul><!--下载信息-->
 <p style="padding:5px 0; padding-left:20px; font-weight:bold; color:#777;">详细内容:</p>
  <div class="arc_body">
  <p>&lt;html&gt;<br />
&lt;head&gt;<br />
&lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=gb2312&quot; /&gt;<br />
&lt;title&gt;漂浮广告&lt;/title&gt;<br />
&lt;/head&gt;<br />
&lt;body&gt;<br />
&lt;DIV id=img1 style=&quot;Z-INDEX: 100; LEFT: 2px; WIDTH: 59px; POSITION: absolute; TOP: 43px; HEIGHT: 61px;<br />
&nbsp;visibility: visible;&quot;&gt;&lt;a href=&quot;<a href="http://bbs.carcav.com/">http://bbs.carcav.com/</a>&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;<a href="http://bbs.carcav.com/ad/bbspfkld.jpg">http://bbs.carcav.com/ad/bbspfkld.jpg</a>&quot; width=&quot;300&quot; height=&quot;100&quot; border=&quot;0&quot;&gt;&lt;/a&gt;&lt;/DIV&gt;<br />
&lt;SCRIPT&gt;<br />
var xPos = 300;<br />
var yPos = 200; <br />
var step = 1;<br />
var delay = 30; <br />
var height = 0;<br />
var Hoffset = 0;<br />
var Woffset = 0;<br />
var yon = 0;<br />
var xon = 0;<br />
var pause = true;<br />
var interval;<br />
img1.style.top = yPos;<br />
function changePos() <br />
{<br />
&nbsp;width = document.body.clientWidth;<br />
&nbsp;height = document.body.clientHeight;<br />
&nbsp;Hoffset = img1.offsetHeight;<br />
&nbsp;Woffset = img1.offsetWidth;<br />
&nbsp;img1.style.left = xPos + document.body.scrollLeft;<br />
&nbsp;img1.style.top = yPos + document.body.scrollTop;<br />
&nbsp;if (yon) <br />
&nbsp;&nbsp;{yPos = yPos + step;}<br />
&nbsp;else <br />
&nbsp;&nbsp;{yPos = yPos - step;}<br />
&nbsp;if (yPos &lt; 0) <br />
&nbsp;&nbsp;{yon = 1;yPos = 0;}<br />
&nbsp;if (yPos &gt;= (height - Hoffset)) <br />
&nbsp;&nbsp;{yon = 0;yPos = (height - Hoffset);}<br />
&nbsp;if (xon) <br />
&nbsp;&nbsp;{xPos = xPos + step;}<br />
&nbsp;else <br />
&nbsp;&nbsp;{xPos = xPos - step;}<br />
&nbsp;if (xPos &lt; 0) <br />
&nbsp;&nbsp;{xon = 1;xPos = 0;}<br />
&nbsp;if (xPos &gt;= (width - Woffset)) <br />
&nbsp;&nbsp;{xon = 0;xPos = (width - Woffset);&nbsp;&nbsp; }<br />
&nbsp;}<br />
&nbsp;<br />
&nbsp;function start()<br />
&nbsp; {<br />
&nbsp; &nbsp;img1.visibility = &quot;visible&quot;;<br />
&nbsp;&nbsp;interval = setInterval('changePos()', delay);<br />
&nbsp;}<br />
&nbsp;function pause_resume() <br />
&nbsp;{<br />
&nbsp;&nbsp;if(pause) <br />
&nbsp;&nbsp;{<br />
&nbsp;&nbsp;&nbsp;clearInterval(interval);<br />
&nbsp;&nbsp;&nbsp;pause = false;}<br />
&nbsp;&nbsp;else <br />
&nbsp;&nbsp;{<br />
&nbsp;&nbsp;&nbsp;interval = setInterval('changePos()',delay);<br />
&nbsp;&nbsp;&nbsp;pause = true; <br />
&nbsp;&nbsp;&nbsp;}<br />
&nbsp;&nbsp;}<br />
&nbsp;start();<br />
&lt;/SCRIPT&gt;<br />
&lt;/body&gt;<br />
&lt;/html&gt;<br />
&nbsp;</p>  </div>
  <div class="list_page" style="float:none;margin-left:300px;">
   <ul>
       </ul>
   <div class="clear"></div>
  </div>
  <p style=" padding:15px 0; padding-left:18px; padding-bottom:8px; font-weight:bold;color:#999999">:</p>
  <div class="soft_down">
   <a href="" target="_blank">点击下载</a>
  </div><!--下载地址-->
 <div class="arc_link" style="clear:both"><span>上一条:没有了</span><span>下一条:没有了</span></div>
				
			</div>
		</div><!--容器结束-->
	</div>
	<div class="clear"></div>
</div>

<div class="contain foot">
 <div class="foot_nav">
    <a href="/show_list.php?id=11" title="企业介绍">企业介绍</a>|    <a href="/show_list.php?id=5" title="产品展示">产品展示</a>|    <a href="/show_list.php?id=6" title="新闻中心">新闻中心</a>|    <a href="/show_list.php?id=7" title="联系我们">联系我们</a>|    <a href="/show_list.php?id=9" title="下载中心">下载中心</a>|    <a href="/sitemap.php?lang=cn" title="网站地图">网站地图</a>|    <a href="/book.php?lang=cn" title="留言本">留言本</a>   </div>
 <p>copyright by 绍兴县申达液压机械厂</p>
<!-- <p>备案号：</p> -->
<!-- <p>powerd by <a href="http://www.beescms.com" target="_blank">BEESCMS</a></p>-->
</div><!--页脚-->
    <style type="text/css">
        /*浮动QQ在线客服*/
        .kf_contain{z-index:99; width:142px; right:0; top:100px; position:absolute}
        .kf_contain .kf_list{ width:142px; margin:0 auto; background:#3e3e48}
        .kf_contain .kf_list .t{background:url(/template/default/images/kf_top.gif) no-repeat left 0; height:66px; font-size:1px}
        .kf_contain .kf_list .b{background:#3e3e48;height:2px}
        .kf_contain .kf_list .con{margin:0 auto; background:#fff; margin:0 3px 3px 3px; width:136px; overflow:hidden; text-align:center}
        .kf_contain .kf_list .con .title{font-size:12px; margin-bottom:5px; margin-left:5px; text-align:left; height:20px; padding-left:20px; background:url(/template/default/images/kf_icon.gif) no-repeat left center; line-height:20px; color:#000000}
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
		<div class="on_kf" id="on" onmouseover="kf_on();"><img src="/template/default/images/on.gif"  border="0" alt="客服"/></div>
        <div >
            <div class="kf_list" id="off" onmouseout="kf_off();" onmousemove="kf_on();">
                <div class="t"></div>
				
                <div class="con">
                    <ul>
										                        <li>
						<span class="lf">
                           <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=0575-85182445&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:0575-85182445:4" alt="点击这里给我发消息" title="点击这里给我发消息"></a>
						   </span>
						   <span class="lf">0575-85182445</span>
                        </li>
											
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
</script>
</body>
</html>