/*
项目名称：EtherJobs
作者：宋佳杰
时间：2013-07-09
*/
/*
注册登录界面的各类函数
*/

/*文本框获取焦点时的处理*/
function focused(object){
    if(object.value=="请在此处输入您的邮箱/手机/SS号"
	|| object.value=="请在此处输入您的用户名"
	|| object.value=="请在此处输入您的邮箱/手机/SS号/用户名"
	|| object.value=="请在此处输入您的密码"
	|| object.value=="请在此处输入您的新密码"
	|| object.value=="请在此处确认您的密码"
	|| object.value=="请在此处确认您的新密码"
	|| object.value=="请输入验证码"
	|| object.value=="请输入正确的邮箱帐号"
	|| object.value=="请输入正确的手机号码"
	|| object.value=="请输入正确的SS帐号"
	|| object.value=="密码不一致"
	|| object.value=="密码不包括汉字"
	){
		object.value = "";
		if(object.id=="siVeCd"||object.id=="feVeCd"){
			object.color="#000";
		}else{
		    object.className = "styleSec";
			if(object.id=="rePsWd"||object.id=="reRePW"||object.id=="siPsWd"){
				object.type="password";
			}
		}
	}else {
		return false;
	}

	return true;
}
	
/*
文本框失去焦点及按Button时的处理
*/

/*填写注册帐号时的处理*/
function rAcotCheck(object){
	var way = document.getElementsByName("reWay");
	var checkedOne = 0;
	for ( var i = 0; i < way.length; i++) {
        if (way[i].checked==true) {
		   checkedOne = i;
        }
    }
	if(object.value==""){
		object.value = "请在此处输入您的邮箱/手机/SS号";
		object.className = "styleFir";
	}else if(checkedOne==0&&!checkEmail(object.value)){
		object.value = "请输入正确的邮箱帐号";
		object.className = "styleThi";
	}else if(checkedOne==1&&!checkMobilePhone(object.value)){
		object.value = "请输入正确的手机号码";
		object.className = "styleThi";
	}else if(checkedOne==2&&!checkQQ(object.value)){
		object.value = "请输入正确的SS帐号";
		object.className = "styleThi";
	}else {
		return false;
	}
	
	return true;
}
/*填写注册昵称时的处理*/
function nameCheck(object){
	if(object.value==""){
		object.value = "请在此处输入您的用户名";
		object.className = "styleFir";
	}else {
		return false;
	}
	
	return true;
}
/*填写密码时的处理*/
function psWdCheck(object){
	if(object.value==""){
		object.value = "请在此处输入您的密码";
		object.type="text";
		object.className = "styleFir";
	}else if(checkChinese(object.value)){
		object.value = "密码不包括汉字";
		object.className = "styleThi";
		object.type="text";
	}else {
		return false;
	}
	
	return true;
}
/*重复密码时的处理*/
function rePWCheck(object){
	if(object.value==""){
		object.value = "请在此处确认您的密码";
		object.type="text";
		object.className = "styleFir";
	}else if(object.value!==document.getElementById("rePsWd").value){
		object.value = "密码不一致";
		object.className = "styleThi";
		object.type="text";
	}else {
		return false;
	}
	
	return true;
}
/*提交注册信息时的处理*/
function regSubmit(){
	var account = document.getElementById("reAcot");
	var name = document.getElementById("reName");
	var passWord = document.getElementById("rePsWd");
	var rePassWord = document.getElementById("reRePW");
	var Ero = document.getElementById("reEro");
	if(account.className=="styleSec"&&name.className=="styleSec"
	&&passWord.className=="styleSec"&&rePassWord.className=="styleSec"){
		Ero.textContent="注册成功";
		Ero.style.color = "#0F0";	
	}else{
		Ero.textContent="请正确填写您的注册信息，再尝试提交！";
	} 
	var e = window.event || arguments.callee.caller.arguments[0];
    stopBubble(e);

	return true;
}
/*填写帐号时的处理*/
function acotCheck(object){
	if(object.value==""){
		if(object.id=="siAcot"){
			object.value = "请在此处输入您的邮箱/手机/SS号/用户名";
		}else{
			object.value = "请在此处输入您的用户名";
		}	
		object.className = "styleFir";
	}else {
		return false;
	}
}
/*重新获取验证码*/
function freshVeCd(){
	var e = window.event || arguments.callee.caller.arguments[0];
    stopBubble(e);
		
	return true;
}

/*提交登录信息时的处理*/
function sigSubmit(){
	var account = document.getElementById("siAcot").value;
	var passWord = document.getElementById("siPsWd").value;
	if(checkEmail(account)){//邮箱登录户
	}else if(checkMobilePhone(account)){//手机登录户
	}else if(checkQQ(account)){//SS登录户
	}else {//昵称登录户
	}
	
	var e = window.event || arguments.callee.caller.arguments[0];
    stopBubble(e);
	
	return true;
}



/*
找回密码处理
*/
/*找回密码按钮*/
function fetchPswd(){
	//document.getElementById("signIn").style.display = "none";
    document.getElementById("fetPsWd").style.display = "block";
	
	var e = window.event || arguments.callee.caller.arguments[0];
    stopBubble(e);
	
	return true;
}
/*找回密码-下一步*/
function nextStep(){ 
    document.getElementById("fetPsWd1").style.display = "none"; 
    document.getElementById("fetPsWd2").style.display = "block";
		
	return true;
}
/*找回密码-重发验证信*/
function resetEmail(){
	var sendEmail = document.getElementById("setEmail");
	var wait = 60; //停留时间

    sendEmail.disabled = "disabled";
	sendEmail.style.width="205px";
	sendEmail.style.color = "#ccc";
    updateInfo(wait);

		
	return true;
}
function updateInfo(time){
  var sendEmail = document.getElementById("setEmail");

  if(time != 0){
	sendEmail.value = time+"秒后可重发验证信";
    window.setTimeout(function(){updateInfo(--time);},1000);
  }
  else{
	sendEmail.value = "重发验证信";
    sendEmail.disabled = false;
	sendEmail.style.width = "120px";
	sendEmail.style.color = "#fff"; 
  }
  
  return true;
}
/*找回密码-进入邮箱*/
function goEmail(){
	window.open("http://m.mail.qq.com/" ,"QQeMail","fullscreen=yes,scrollbars=yes,menubar=yes,toolbar=yes,statys=yes");
	
	return true;
}
/*找回密码-邮件链接*/
function emailLink(){
	document.getElementById("fetPsWd2").style.display = "none";
    document.getElementById("fetPsWd3").style.display = "block"; 
		
	return true;
}
/*找回密码-填写密码时的处理*/
function pWdCheck(object){
	if(object.value==""){
		object.value = "请在此处输入您的新密码";
		object.type="text";
		object.className = "styleFir";
	}else if(checkChinese(object.value)){
		object.value = "密码不包括汉字";
		object.className = "styleThi";
		object.type="text";
	}else {
		return false;
	}
	
	return true;
}
/*找回密码-重复密码时的处理*/
function rPWCheck(object){
	if(object.value!==document.getElementById("fePsWd").value){
		object.value = "密码不一致";
		object.className = "styleThi";
		object.type="text";
	}else {
		return false;
	}
	
	return true;
}
/*找回密码-提交新密码*/
function subNPW(){  
	document.getElementById("fetPsWd3").style.display = "none";
    document.getElementById("fetPsWd4").style.display = "block"; 
		
	return true;
}
/*找回密码-进入用户中心*/
function goCentre(){
	return true;  
}
/*找回密码-返回主页*/
function goHomepage(){
	return true;  
}



/*鼠标浮于图片上或离开图片时的处理*/
function lLight(object){
	var midBox = document.getElementById("midBox");
	var sign = document.getElementById("signIn");
    var regis = document.getElementById("regisIn");
	var fePswd = document.getElementById("fetPsWd");

	if((object.id=="regis"||object.id=="mid2"||
	    object.id=="mid4"||object.id=="mid6")
		&&regis.style.display=="none"
		&&sign.style.display=="block"){
		midBox.style.backgroundImage="url(account/images/mid2.jpg)";
    }else if((object.id=="sign"||object.id=="mid1"||
	          object.id=="mid3"||object.id=="mid5")
			  &&sign.style.display=="none"
			  &&regis.style.display=="block"){
		midBox.style.backgroundImage="url(account/images/mid.jpg)";
	}else {
		return false;
	} 
	
	return true;
}
function hLight(object){
	var midBox = document.getElementById("midBox");
	var sign = document.getElementById("signIn");
    var regis = document.getElementById("regisIn");
	var fePswd = document.getElementById("fetPsWd");

	if((object.id=="regis"||object.id=="mid2"||
	    object.id=="mid4"||object.id=="mid6"||
	    object.id=="sigRe")&&regis.style.display=="none"
		&&sign.style.display=="block"
		&&fePswd.style.display=="none"){
		midBox.style.backgroundImage="url(account/images/midh2.jpg)";
    }else if((object.id=="sign"||object.id=="mid1"||
	          object.id=="mid3"||object.id=="mid5"||
	          object.id=="regMB")&&sign.style.display=="none"
			  &&regis.style.display=="block"
			  &&fePswd.style.display=="none"){
		midBox.style.backgroundImage="url(account/images/midh.jpg)";
	}else {
		return false;
	}
	
	return true;
}

/*点击图片时的处理*/
function switched(object){
	var midBox = document.getElementById("midBox");
	var sign = document.getElementById("signIn");
    var regis = document.getElementById("regisIn");
	var fePswd = document.getElementById("fetPsWd");
    var wait = 7; //动画总共帧数

	if((object.id=="regis"||object.id=="mid2"||
	    object.id=="mid4"||object.id=="mid6"||
	    object.id=="sigRe")&&regis.style.display=="none"
		&&sign.style.display=="block"
		&&fePswd.style.display=="none"){
		updPicr(wait);
		document.getElementById("reAcot").className = "styleFir";
	    document.getElementById("reName").className = "styleFir";
	    document.getElementById("rePsWd").className = "styleFir";
	    document.getElementById("reRePW").className = "styleFir";
		document.getElementById("reAcot").value = "请在此处输入您的邮箱/手机/SS号";
	    document.getElementById("reName").value = "请在此处输入您的用户名";
	    document.getElementById("rePsWd").value = "请在此处输入您的密码";
	    document.getElementById("reRePW").value = "请在此处确认您的密码";
		document.getElementById("reEro").textContent = "";
		document.getElementById("rePsWd").type = "text";
		document.getElementById("reRePW").type = "text";		
    }else if((object.id=="sign"||object.id=="mid1"||
	          object.id=="mid3"||object.id=="mid5"||
	          object.id=="regMB")&&sign.style.display=="none"
			  &&regis.style.display=="block"
			  &&fePswd.style.display=="none"){
		updPics(wait);
		document.getElementById("siAcot").className = "styleFir";
	    document.getElementById("siPsWd").className = "styleFir";
	    document.getElementById("siVeCd").className = "styleFir";
		document.getElementById("siAcot").value = "请在此处输入您的邮箱/手机/SS号/用户名";
	    document.getElementById("siPsWd").value = "请在此处输入您的密码";
	    document.getElementById("siVeCd").value = "请输入验证码";
		document.getElementById("siPsWd").type = "text";

	}else {
		return false;
	}
	
	var e = window.event || arguments.callee.caller.arguments[0];
    stopBubble(e); 
		
	return true;
}
function updPicr(wait1){
	var midBox = document.getElementById("midBox");
	var sign = document.getElementById("signIn");
    var regis = document.getElementById("regisIn");
    switch(wait1){
	    case 0: return true;
	    case 1: midBox.style.backgroundImage="url(account/images/mid.jpg)"; regis.style.display = "block"; window.setTimeout(function(){updPicr(--wait1);},40); break;
	    case 2: midBox.style.backgroundImage="url(account/images/mida.jpg)"; window.setTimeout(function(){updPicr(--wait1);},40); break;
		case 3: midBox.style.backgroundImage="url(account/images/midb.jpg)"; window.setTimeout(function(){updPicr(--wait1);},40); break;
		case 4: midBox.style.backgroundImage="url(account/images/midc.jpg)"; window.setTimeout(function(){updPicr(--wait1);},40); break;
		case 5: midBox.style.backgroundImage="url(account/images/midc2.jpg)"; window.setTimeout(function(){updPicr(--wait1);},40); break;
		case 6: midBox.style.backgroundImage="url(account/images/midb2.jpg)"; window.setTimeout(function(){updPicr(--wait1);},40); break;
	    case 7: midBox.style.backgroundImage="url(account/images/mida2.jpg)"; sign.style.display = "none"; window.setTimeout(function(){updPicr(--wait1);},40); break;
	    default: return false;
    }
	
    return true;
}
function updPics(wait2){
	var midBox = document.getElementById("midBox");
	var sign = document.getElementById("signIn");
    var regis = document.getElementById("regisIn");
    switch(wait2){
	    case 0: return true;
	    case 1: midBox.style.backgroundImage="url(account/images/mid2.jpg)";  sign.style.display = "block"; window.setTimeout(function(){updPics(--wait2);},40); break;
	    case 2: midBox.style.backgroundImage="url(account/images/mida2.jpg)"; window.setTimeout(function(){updPics(--wait2);},40); break;
		case 3: midBox.style.backgroundImage="url(account/images/midb2.jpg)"; window.setTimeout(function(){updPics(--wait2);},40); break;
		case 4: midBox.style.backgroundImage="url(account/images/midc2.jpg)"; window.setTimeout(function(){updPics(--wait2);},40); break;
		case 5: midBox.style.backgroundImage="url(account/images/midc.jpg)"; window.setTimeout(function(){updPics(--wait2);},40); break;
		case 6: midBox.style.backgroundImage="url(account/images/midb.jpg)"; window.setTimeout(function(){updPics(--wait2);},40); break;
	    case 7: midBox.style.backgroundImage="url(account/images/mida.jpg)"; regis.style.display = "none"; window.setTimeout(function(){updPics(--wait2);},40); break;
	    default: return false;
    }
  
    return true;
}
