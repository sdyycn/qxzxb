<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="description" content="<?php echo $webinfo['description'];?>">
<meta name="keywords" content="<?php echo $webinfo['keywords'];?>">
<title><?php echo $webinfo['webname'];?></title>
<link href="<?php cmspath('template');?>/images/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php cmspath('template');?>/images/jquery.js"></script>
<script type="text/javascript" src="<?php cmspath('template');?>/images/nav.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#code').click(function(){
$(this).attr('src','<?php cmspath('plus');?>/code.php?tag='+new Date().getTime());
});
});
</script>
</head>
<body>
<?php $this->display('head',1);?>
<div class="div_margin"></div>
<div class="contain c_margin">
<!--用户登录-->
<?php if($act=='login'){?>
<h2 class="user_position"><span><?php echo $language['location'];?>:<?php echo $position;?></span></h2>
	<div class="reg_contain">
<div id="reg_div" class="user_login">
<form name="maininfo" method="post" action="?action=save_login&lang=<?php echo $lang;?>" class="form">
<div class="clear"></div>
 <table cellpadding="0" cellspacing="0" width="100%" id="reg_tb">
	<tbody>
		<tr>
		<td style="width:20%;text-align:right"><?php echo $language['member_login_user'];?>：</td><td style="width:80%"><input name="user" style="width:60%;padding:3px 0;" value="" /><span style="color:red;padding:0 8px;">*</span></td>
		</tr>
		<tr>
		<td style="width:20%;text-align:right"><?php echo $language['member_login_pass'];?>：</td><td style="width:80%"><input name="password" type="password" style="width:60%;padding:3px 0;" value="" /><span style="color:red;padding:0 8px;">*</span></td>
		</tr>
		<?php if($is_code){?>
		<tr>
		<td style="width:20%;text-align:right"><?php echo $language['member_login_code'];?>：</td><td style="width:80%"><input name="code" value="" style="width:50px; display:block; float:left; margin-right:3px; display:inline"/><img style="display:block; float:left; cursor:pointer" src="<?php cmspath('plus');?>/code.php" border="0" id="code"/><div class="clear"></div></td>
		</tr>
		<?php }?>
	</tbody>
 </table>
<div class="btn" style="margin-top:0; margin-left:80px; text-align:left"><input type="image" style="border:0" src="<?php cmspath('template');?>/images/login_input.gif" name="submit"/></div>
</form>
 </div>
 <div class="user_login_info">
 <h2><?php echo $language['member_msg50'];?></h2>
 <p><?php echo $language['member_msg51'];?></p>
 <p><?php echo $language['member_msg52'];?></p>
 <p><?php echo $language['member_msg53'];?></p>
 <div class="user_reg_btn"><a href="member.php?action=regist&lang=<?php echo $lang;?>"><img src="<?php cmspath('template');?>/images/reg_input.gif" border="0" /></a></div>
 </div>
 <div class="clear"></div>
 </div>
<?php }?>
<!--用户注册-->
<?php if($act=='regist'){?>
<h2 class="user_position"><span><?php echo $language['location'];?>:<?php echo $position;?></span></h2>
<div class="reg_contain">
<div id="reg_div">
<form name="maininfo" method="post" enctype="multipart/form-data" action="?action=save_reg" class="form">
<div class="clear"></div>
 <table cellpadding="0" cellspacing="0" width="100%" id="reg_tb">
	<tbody>
		<tr>
		<td style="width:20%;text-align:right"><?php echo $language['member_login_user'];?>：</td><td style="width:80%"><input name="user" style="width:40%;padding:3px 0;" value="" /><span style="color:red;padding:0 8px;">*</span></td>
		</tr>
		<tr>
		<td style="width:20%;text-align:right"><?php echo $language['member_reg_nich'];?>：</td><td style="width:80%"><input name="nich" style="width:40%;padding:3px 0;" value="" /><span style="color:red;padding:0 8px;">*</span></td>
		</tr>
		<tr>
		<td style="width:20%;text-align:right"><?php echo $language['member_login_pass'];?>：</td><td style="width:80%"><input type="password" name="password" style="width:40%;padding:3px 0;" value="" /><span style="color:red;padding:0 8px;">*</span></td>
		</tr>
		<tr>
		<td style="width:20%;text-align:right"><?php echo $language['member_reg_passt'];?>：</td><td style="width:80%"><input type="password" name="password2" style="width:40%;padding:3px 0;" value="" /><span style="color:red;padding:0 8px;">*</span></td>
		</tr>
		<tr>
		<td style="width:20%;text-align:right"><?php echo $language['member_reg_mail'];?>：</td><td style="width:80%"><input name="mail" style="width:40%;padding:3px 0;" value="" /></td>
		</tr>
		<?php if($is_code){?>
		<tr>
		<td style="width:20%;text-align:right"><?php echo $language['member_login_code'];?>：</td><td style="width:80%"><input name="code" value="" style="width:50px; display:block; float:left; margin-right:3px; display:inline"/><img src="<?php cmspath('plus');?>/code.php" name="code" border="0" id="code" style="display:block; float:left; cursor:pointer"/>
		  <div class="clear"></div></td>
		</tr>
		<?php }?>
	</tbody>
 </table>
<div class="btn" style="height:40px; line-height:40px; margin-left:180px; text-align:left"><input type="hidden" value="<?php echo $lang;?>" name="lang" /><input type="image" style="border:0" src="<?php cmspath('template');?>/images/reg_input.gif" name="submit"/><a href="member.php?action=login&lang=<?php echo $lang;?>" style="padding-bottom:10px;"><?php echo $language['member_msg49'];?></a></div>
</form>
 </div>
 </div>
<?php }?>
<!--用户中心主要页面--> 
<?php if($act=='main'){?>
<h2 class="user_position"><span><?php echo $language['location'];?>:<?php echo $position;?></span></h2>
<div class="reg_contain">
<?php $this->display('member_nav',1);?>
<div class="user_right">
<div class="login_info">
<span><?php echo $member;?></span><?php echo $language['member_wel'];?><span><?php echo $language['member_grade'];?></span><?php echo $purview;?>
<span><?php echo $language['member_last_login'];?>:</span><?php echo $login_time;?><span><?php echo $language['member_last_login_ip'];?>:</span><?php echo $login_ip;?><span><?php echo $language['member_login_num'];?>:</span><?php echo $login_count;?>
</div><!--登陆信息-->

<div class="member_info">
<h2><?php echo $language['member_home_title'];?></h2>
<p><?php echo $language['member_msg32'];?>:<span>
<?php echo $ask_count;?>
</span></p>
</div>
</div>
<div class="clear"></div>
</div>
<?php }?>
<!--用户信息-->
<?php if($act=='info'){?>
<h2 class="user_position"><span><?php echo $language['location'];?>:<?php echo $position;?></span></h2>
<div class="reg_contain">
<?php $this->display('member_nav',1);?>
 <div class="user_right">
 	<form name="maininfo" method="post" enctype="multipart/form-data" action="?" class="form">
<div class="div_out" id="tb">
 <table cellpadding="0" cellspacing="0" width="100%">
 	<thead>
		<tr><th class="w1"><?php echo $language['member_msg33'];?></th><th class="w2"><?php echo $language['member_msg34'];?></th><th class="w3"><?php echo $language['member_msg35'];?></th></tr>
	</thead>
	<tbody>
		<tr>
		  <td class="w1"><?php echo $language['member_birth'];?>:</td><td class="w2"><select name="birthdayYear"><option value="1950" <?php if($year=="1950"){?>selected="selected"<?php }?> >1950</option><option value="1951" <?php if($year=="1951"){?>selected="selected"<?php }?>>1951</option><option value="1952" <?php if($year=="1952"){?>selected="selected"<?php }?>>1952</option><option value="1953" <?php if($year=="1953"){?>selected="selected"<?php }?>>1953</option><option value="1954" <?php if($year=="1954"){?>selected="selected"<?php }?>>1954</option><option value="1955" <?php if($year=="1955"){?>selected="selected"<?php }?>>1955</option><option <?php if($year=="1956"){?>selected="selected"<?php }?> value="1956">1956</option><option value="1957" <?php if($year=="1957"){?>selected="selected"<?php }?>>1957</option><option value="1958" <?php if($year=="1958"){?>selected="selected"<?php }?>>1958</option><option value="1959" <?php if($year=="1959"){?>selected="selected"<?php }?>>1959</option><option value="1960" <?php if($year=="1960"){?>selected="selected"<?php }?>>1960</option><option value="1961" <?php if($year=="1961"){?>selected="selected"<?php }?>>1961</option><option value="1962" <?php if($year=="1962"){?>selected="selected"<?php }?>>1962</option><option <?php if($year=="1963"){?>selected="selected"<?php }?> value="1963">1963</option><option value="1964" <?php if($year=="1964"){?>selected="selected"<?php }?>>1964</option><option value="1965" <?php if($year=="1965"){?>selected="selected"<?php }?>>1965</option><option value="1966" <?php if($year=="1966"){?>selected="selected"<?php }?>>1966</option><option value="1967" <?php if($year=="1967"){?>selected="selected"<?php }?>>1967</option><option value="1968" <?php if($year=="1968"){?>selected="selected"<?php }?>>1968</option><option value="1969" <?php if($year=="1969"){?>selected="selected"<?php }?>>1969</option><option <?php if($year=="1970"){?>selected="selected"<?php }?> value="1970">1970</option><option value="1971" <?php if($year=="1971"){?>selected="selected"<?php }?>>1971</option><option value="1972" <?php if($year=="1972"){?>selected="selected"<?php }?>>1972</option><option value="1973" <?php if($year=="1973"){?>selected="selected"<?php }?>>1973</option><option value="1974" <?php if($year=="1974"){?>selected="selected"<?php }?>>1974</option><option value="1975" <?php if($year=="1975"){?>selected="selected"<?php }?>>1975</option><option value="1976" <?php if($year=="1976"){?>selected="selected"<?php }?>>1976</option><option value="1977" <?php if($year=="1977"){?>selected="selected"<?php }?>>1977</option><option value="1978" <?php if($year=="1978"){?>selected="selected"<?php }?>>1978</option><option value="1979" <?php if($year=="1979"){?>selected="selected"<?php }?>>1979</option><option value="1980" <?php if($year=="1980"){?>selected="selected"<?php }?>>1980</option><option value="1981" <?php if($year=="1981"){?>selected="selected"<?php }?>>1981</option><option value="1982" <?php if($year=="1982"){?>selected="selected"<?php }?>>1982</option><option value="1983" <?php if($year=="1983"){?>selected="selected"<?php }?>>1983</option><option <?php if($year=="1984"){?>selected="selected"<?php }?> value="1984">1984</option><option value="1985" <?php if($year=="1985"){?>selected="selected"<?php }?>>1985</option><option value="1986" <?php if($year=="1986"){?>selected="selected"<?php }?>>1986</option><option value="1987" <?php if($year=="1987"){?>selected="selected"<?php }?>>1987</option><option value="1988" <?php if($year=="1988"){?>selected="selected"<?php }?>>1988</option><option value="1989" <?php if($year=="1989"){?>selected="selected"<?php }?>>1989</option><option value="1990" <?php if($year=="1990"){?>selected="selected"<?php }?>>1990</option><option value="1991" <?php if($year=="1991"){?>selected="selected"<?php }?>>1991</option><option value="1992" <?php if($year=="1992"){?>selected="selected"<?php }?>>1992</option><option value="1993" <?php if($year=="1993"){?>selected="selected"<?php }?>>1993</option><option value="1994" <?php if($year=="1994"){?>selected="selected"<?php }?>>1994</option><option value="1995" <?php if($year=="1995"){?>selected="selected"<?php }?>>1995</option><option value="1996" <?php if($year=="1996"){?>selected="selected"<?php }?>>1996</option><option value="1997" <?php if($year=="1997"){?>selected="selected"<?php }?>>1997</option><option <?php if($year=="1998"){?>selected="selected"<?php }?> value="1998">1998</option><option value="1999" <?php if($year=="1999"){?>selected="selected"<?php }?>>1999</option><option value="2000" <?php if($year=="2000"){?>selected="selected"<?php }?>>2000</option><option value="2001" <?php if($year=="2001"){?>selected="selected"<?php }?>>2001</option><option value="2002" <?php if($year=="2002"){?>selected="selected"<?php }?>>2002</option><option value="2003" <?php if($year=="2003"){?>selected="selected"<?php }?>>2003</option><option value="2004" <?php if($year=="2004"){?>selected="selected"<?php }?>>2004</option><option value="2005" <?php if($year=="2005"){?>selected="selected"<?php }?>>2005</option><option value="2006" <?php if($year=="2006"){?>selected="selected"<?php }?>>2006</option><option value="2007" <?php if($year=="2007"){?>selected="selected"<?php }?>>2007</option><option value="2008" <?php if($year=="2008"){?>selected="selected"<?php }?>>2008</option><option value="2009" <?php if($year=="2009"){?>selected="selected"<?php }?>>2009</option><option value="2010" <?php if($year=="2010"){?>selected="selected"<?php }?>>2010</option><option value="2011" <?php if($year=="2011"){?>selected="selected"<?php }?>>2011</option></select>
		  <select name="birthdayMonth"><option value="01" <?php if($month=="01"){?>selected="selected"<?php }?>>01</option><option value="02" <?php if($month=="02"){?>selected="selected"<?php }?>>02</option><option value="03" <?php if($month=="03"){?>selected="selected"<?php }?>>03</option><option value="04" <?php if($month=="04"){?>selected="selected"<?php }?>>04</option><option value="05" <?php if($month=="05"){?>selected="selected"<?php }?>>05</option><option value="06" <?php if($month=="06"){?>selected="selected"<?php }?>>06</option><option value="07" <?php if($month=="07"){?>selected="selected"<?php }?>>07</option><option value="08" <?php if($month=="08"){?>selected="selected"<?php }?>>08</option><option value="09" <?php if($month=="09"){?>selected="selected"<?php }?>>09</option><option value="10" <?php if($month=="10"){?>selected="selected"<?php }?>>10</option><option value="11" <?php if($month=="11"){?>selected="selected"<?php }?>>11</option><option value="12" <?php if($month=="12"){?>selected="selected"<?php }?>>12</option></select>
		  <select name="birthdayDay"><option value="01" <?php if($day=="01"){?>selected="selected"<?php }?>>01</option><option value="02" <?php if($day=="02"){?>selected="selected"<?php }?>>02</option><option value="03" <?php if($day=="03"){?>selected="selected"<?php }?>>03</option><option value="04" <?php if($day=="04"){?>selected="selected"<?php }?>>04</option><option value="05" <?php if($day=="05"){?>selected="selected"<?php }?>>05</option><option value="06" <?php if($day=="06"){?>selected="selected"<?php }?>>06</option><option value="07" <?php if($day=="07"){?>selected="selected"<?php }?>>07</option><option value="08" <?php if($day=="08"){?>selected="selected"<?php }?>>08</option><option value="09" <?php if($day=="09"){?>selected="selected"<?php }?>>09</option><option value="10" <?php if($day=="10"){?>selected="selected"<?php }?>>10</option><option value="11" <?php if($day=="11"){?>selected="selected"<?php }?>>11</option><option value="12" <?php if($day=="12"){?>selected="selected"<?php }?>>12</option><option value="13" <?php if($day=="13"){?>selected="selected"<?php }?>>13</option><option value="14" <?php if($day=="14"){?>selected="selected"<?php }?>>14</option><option value="15" <?php if($day=="15"){?>selected="selected"<?php }?>>15</option><option value="16" <?php if($day=="16"){?>selected="selected"<?php }?>>16</option><option value="17" <?php if($day=="17"){?>selected="selected"<?php }?>>17</option><option value="18" <?php if($day=="18"){?>selected="selected"<?php }?>>18</option><option value="19" <?php if($day=="19"){?>selected="selected"<?php }?>>19</option><option value="20" <?php if($day=="20"){?>selected="selected"<?php }?>>20</option><option value="21" <?php if($day=="21"){?>selected="selected"<?php }?>>21</option><option value="22" <?php if($day=="22"){?>selected="selected"<?php }?>>22</option><option value="23" <?php if($day=="23"){?>selected="selected"<?php }?>>23</option><option value="24" <?php if($day=="24"){?>selected="selected"<?php }?>>24</option><option value="25" <?php if($day=="25"){?>selected="selected"<?php }?>>25</option><option value="26" <?php if($day=="26"){?>selected="selected"<?php }?>>26</option><option value="27" <?php if($day=="27"){?>selected="selected"<?php }?>>27</option><option value="28" <?php if($day=="28"){?>selected="selected"<?php }?>>28</option><option value="29" <?php if($day=="29"){?>selected="selected"<?php }?>>29</option><option value="30" <?php if($day=="30"){?>selected="selected"<?php }?>>30</option><option value="31" <?php if($day=="31"){?>selected="selected"<?php }?>>31</option></select>
		  </td><td class="w3"></td>
		</tr>
		<tr>
		  <td class="w1"><?php echo $language['member_sex'];?>:</td><td class="w2"><input type="radio" value="0" name="sex" style="margin:0 5px; border:none" <?php if($info['member_sex']==0){?>checked="checked"<?php }else{?><?php }?>/><?php echo $language['member_sex_none'];?><input style="margin:0 5px; border:none" <?php if($info['member_sex']==1){?>checked="checked"<?php }else{?><?php }?> type="radio" value="1" name="sex"/><?php echo $language['member_sex_man'];?><input type="radio" value="2" name="sex" style="margin:0 5px;border:none" <?php if($info['member_sex']==2){?>checked="checked"<?php }else{?><?php }?> /><?php echo $language['member_sex_woman'];?></td><td class="w3"></td>
		</tr>
		<tr>
		  <td class="w1"><?php echo $language['member_mail'];?>:</td><td class="w2"><?php if($info['member_mail']){?><?php echo $info['member_mail'];?><?php }?></td><td class="w3"></td>
		</tr>
		<tr>
		  <td class="w1"><?php echo $language['member_js'];?>:</td><td class="w2"><input name="qq"  value="<?php echo $info['member_qq'];?>" style="width:50%"/></td><td class="w3"></td>
		</tr>
		<tr>
		  <td class="w1"><?php echo $language['member_tel'];?>:</td><td class="w2"><input name="tel"  value="<?php echo $info['member_tel'];?>" style="width:50%"/>&nbsp;格式为0000-0000000</td><td class="w3"></td>
		</tr>
		<tr>
		  <td class="w1"><?php echo $language['member_phone'];?>:</td><td class="w2"><input name="phone"  value="<?php echo $info['member_phone'];?>" style="width:50%"/></td><td class="w3"></td>
		</tr>
	</tbody>
 </table>
 </div>
 <div class="btn" style="margin-top:10px;width:300px;">
<input type="hidden" name="action" value="save_info"/>
<input type="hidden" name="lang" value="<?php echo $lang;?>" />
  <input type="submit" value="<?php echo $language['member_msg47'];?>" class="go" name="submit"/><input type="reset" style="margin:0 10px;" class="go" value="<?php echo $language['member_msg48'];?>" name="reset"/>
 </div>
</form>
 </div>
 <div class="clear"></div>
</div>
<?php }?>
<!--添加咨询-->
<?php if($act=='add_ask'){?>
<h2 class="user_position"><span><?php echo $language['location'];?>:<?php echo $position;?></span></h2>
<div class="reg_contain">
<?php $this->display('member_nav',1);?>
<div class="user_right">
	<form name="maininfo" method="post" enctype="multipart/form-data" action="?" class="form">
<div class="clear"></div>
 <table cellpadding="0" cellspacing="0" width="100%">
 	<thead>
		<tr><th style="width:20%"><?php echo $language['member_msg33'];?></th><th style="width:80%"><?php echo $language['member_msg34'];?></th></tr>
	</thead>
	<tbody>
		<tr>
		<td style="width:20%; text-align:right; padding-right:5px;"><?php echo $language['member_ask_title'];?></td><td style="width:80%"><input type="text" style="width:50%;" name="title" /></td>
		</tr>
		<tr>
		<td style="width:20%; text-align:right;padding-right:5px;"><?php echo $language['member_ask_content'];?></td><td style="width:80%"><textarea style="width:50%;height:150px;" name="content"></textarea></td>	
		</tr>
	</tbody>
 </table>
 <div class="btn" style="margin-top:10px;"><input type="hidden" name="member_id" value="<?php echo $member_id;?>" />
<input type="hidden" name="action" value="save_add_ask"/>
<input type="hidden" name="lang" value="<?php echo $lang;?>" />
  <input type="submit" value="<?php echo $language['member_msg47'];?>" class="go" name="submit"/><input type="reset" style="margin:0 10px;" class="go" value="<?php echo $language['member_msg48'];?>" name="reset"/>
 </div>
</form>
</div>
<div class="clear"></div>
</div>
<?php }?>
<!--用户咨询列表-->
<?php if($act=='ask'){?>
<h2 class="user_position"><span><?php echo $language['location'];?>:<?php echo $position;?></span></h2>
<div class="reg_contain">
<?php $this->display('member_nav',1);?>
<div class="user_right">
	 <table cellpadding="0" cellspacing="0" width="100%">
 	<thead>
		<tr><th style="width:40%"><?php echo $language['member_msg36'];?></th><th style="width:20%"><?php echo $language['member_msg37'];?></th><th style="width:10%"><?php echo $language['member_msg38'];?></th><th style="width:30%"><?php echo $language['member_msg39'];?></th></tr>
	</thead>
	<tbody style="text-align:center">
	<?php 
 if(isset($ask_list)&&is_array($ask_list)){
foreach($ask_list as $v){?>
		<tr>
		<td style="width:40%"><?php echo $v['title'];?></td><td style="width:20%"><?php echo date('Y-m-d H:m:s',$v['addtime']);?></td><td style="width:10%">
		<?php if(empty($v['reply'])){?>
		<span><?php echo $language['member_msg40'];?></span>
		<?php }else{?>
	    <span style="color:red"><?php echo $language['member_msg41'];?></span>"
		<?php }?>
		</td><td style="width:30%"><a href="?action=xg_ask&id=<?php echo $v['id'];?>&member_id=<?php echo $v['member'];?>&lang=<?php echo $lang;?>"><?php echo $language['member_msg44'];?></a>|<a href="?action=show_ask&id=<?php echo $v['id'];?>&member_id=<?php echo $v['member'];?>&lang=<?php echo $lang;?>"><?php echo $language['member_msg45'];?></a></td>
		</tr>
	<?php 
}
}?>
	</tbody>
 </table>
</div>
<div class="clear"></div>
</div>
<?php }?>
<!--咨询修改-->
<?php if($act=='xg_ask'){?>
<h2 class="user_position"><span><?php echo $language['location'];?>:<?php echo $position;?></span></h2>
<div class="reg_contain">
<?php $this->display('member_nav',1);?>
<div class="user_right">
<form name="maininfo" method="post" enctype="multipart/form-data" action="?" class="form">
<div class="clear"></div>
 <table cellpadding="0" cellspacing="0" width="100%">
 	<thead>
		<tr><th style="width:20%"><?php echo $language['member_msg33'];?></th><th style="width:80%"><?php echo $language['member_msg34'];?></th></tr>
	</thead>
	<tbody>
		<tr>
		<td style="width:20%; text-align:right; padding-right:5px;"><?php echo $language['member_ask_title'];?>:</td><td style="width:80%"><?php echo $ask['title'];?></td>
		</tr>
		<tr>
		<td style="width:20%; text-align:right;padding-right:5px;"><?php echo $language['member_ask_content'];?>:</td><td style="width:80%"><textarea style="width:50%;height:150px;" name="content"><?php echo $ask['content'];?></textarea></td>	
		</tr>
	</tbody>
 </table>
 <div class="btn" style="margin-top:10px;"><input type="hidden" name="id" value="<?php echo $ask['id'];?>" /><input type="hidden" name="member_id" value="<?php echo $ask['member'];?>" />
<input type="hidden" name="action" value="save_xg_ask"/>
<input type="hidden" name="lang" value="<?php echo $lang;?>" />
  <input type="submit" value="<?php echo $language['member_msg47'];?>" class="go" name="submit"/><input type="reset" style="margin:0 10px;" class="go" value="<?php echo $language['member_msg48'];?>" name="reset"/>
 </div>
</form>
</div>
<div class="clear"></div>
</div>
<?php }?>
<!--显示咨询-->
<?php if($act=='show_ask'){?>
<h2 class="user_position"><span><?php echo $language['location'];?>:<?php echo $position;?></span></h2>
<div class="reg_contain">
<?php $this->display('member_nav',1);?>
<div class="user_right">
	 <table cellpadding="0" cellspacing="0" width="100%">
 	<thead>
		<tr><th style="width:20%"><?php echo $language['member_msg33'];?></th><th style="width:80%"><?php echo $language['member_msg34'];?></th></tr>
	</thead>
	<tbody>
		<tr>
		<td style="width:20%; text-align:right; padding-right:5px;"><?php echo $language['member_ask_title'];?>:</td><td style="width:80%"><?php echo $ask['title'];?></td>
		</tr>
		<tr>
		<td style="width:20%; text-align:right;padding-right:5px;"><?php echo $language['member_msg42'];?>:</td><td style="width:80%"><?php echo date('Y-m-d H:m:s',$ask['addtime']);?></td>	
		</tr>
		<tr>
		<td style="width:20%; text-align:right;padding-right:5px;"><?php echo $language['member_ask_content'];?>:</td><td style="width:80%"><?php echo $ask['content'];?></td>	
		</tr>
		<tr>
		<td style="width:20%; text-align:right;padding-right:5px;"><?php echo $language['member_msg43'];?>:</td><td style="width:80%"><?php echo $ask['reply'];?></td>	
		</tr>
	</tbody>
 </table>
</div>
<div class="clear"></div>
</div>
<?php }?>
<!--用户收藏-->
<?php if($act=='coll'){?>
<h2 class="user_position"><span><?php echo $language['location'];?>:<?php echo $position;?></span></h2>
<div class="reg_contain">
<?php $this->display('member_nav',1);?>
<div class="user_right">
	<form name="maininfo" method="post" enctype="multipart/form-data" action="?" class="form">
<div class="div_out" id="tb">
 <table cellpadding="0" cellspacing="0" width="100%">
 	<thead>
		<tr><th class="w1" style="width:80%;"><?php echo $language['member_msg36'];?></th><th class="w2" style="width:20%"><?php echo $language['member_msg39'];?></th></tr>
	</thead>
	<tbody>
	<?php 
 if(isset($coll)&&is_array($coll)){
foreach($coll as $v){?>
		<tr>
		  <td class="w1" style="width:80%"><a href="../show_content.php?id=<?php echo $v['arc_id'];?>" target="_blank"><?php echo $v['title'];?></a></td>
		  <td class="w2" style="width:20%;"><a href="?action=del&id=<?php echo $v['id'];?>"><?php echo $language['member_msg46'];?></a></td>
		</tr>
	<?php 
}
}?>
	</tbody>
 </table>
 </div>

 <?php unset($rel);?>
<div class="page">
 	<ul>
		<?php echo $page;?>
	</ul>
 </div>

</form>
</div>
<div class="clear"></div>
</div>
<?php }?>
<?php if($act=='password'){?>
<h2 class="user_position"><span><?php echo $language['location'];?>:<?php echo $position;?></span></h2>
<div class="reg_contain">
<?php $this->display('member_nav',1);?>
<div class="user_right">
	<form name="maininfo" method="post" enctype="multipart/form-data" action="?" class="form">
<div class="div_out" id="tb">
 <table cellpadding="0" cellspacing="0" width="100%">
 	<thead>
		<tr><th class="w1"><?php echo $language['member_msg33'];?></th><th class="w2"><?php echo $language['member_msg34'];?></th><th class="w3"><?php echo $language['member_msg35'];?></th></tr>
	</thead>
	<tbody>
		<tr>
		  <td class="w1"><?php echo $language['member_password_old'];?>:</td><td class="w2"><input name="password_use" style="width:50%;" type="password" /></td><td class="w3"></td>
		</tr>
		<tr>
		  <td class="w1"><?php echo $language['member_password_new'];?>:</td><td class="w2"><input name="password_new" style="width:50%;" type="password" /></td><td class="w3"></td>
		</tr>
		<tr>
		  <td class="w1"><?php echo $language['member_password_newt'];?>:</td><td class="w2"><input name="password_new2" style="width:50%;" type="password" /></td><td class="w3"></td>
		</tr>
	</tbody>
 </table>
 </div>
 <div class="btn" style="margin-top:10px; width:300px;">
<input type="hidden" name="action" value="save_password"/><input type="hidden" name="lang" value="<?php echo $lang;?>" />
  <input type="submit" value="<?php echo $language['member_msg47'];?>" class="go" name="submit"/><input type="reset" style="margin:0 10px;" class="go" value="<?php echo $language['member_msg48'];?>" name="reset"/>
 </div>
</form>
</div>
<div class="clear"></div>
</div>
<?php }?>
</div>
<?php $this->display('foot',1);?>

</body>
</html>