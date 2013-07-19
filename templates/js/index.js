/**
 * @author: maweiguo
 * @date: 2013/7/8
 */
 
 function error_handler(XMLHttpRequest, textStatus, errorThrown) {
	alert(" responseText:\t"+XMLHttpRequest.responseText
		  + "\n status:\t"+XMLHttpRequest.status
		  + "\n readyState\t"+ XMLHttpRequest.readyState
		  + "\n textStatus\t"+ textStatus);
}

function run_ajax(url, dataString, success_handler, method){
//	alert(method);
//	alert(url);
//	alert(dataString);
	if (method == 'json') {
//		alert('.getJSON');
		$.getJSON(url, dataString, success_handler);
		
	} else if (method == 'post'){
//		alert('.post');
		$.post(url, dataString, success_handler);
		
	} else if (method == 'get') {
//		alert('.get');
		$.get(url, dataString, success_handler);
		
	} else {
//		alert('.ajax post');
		$.ajax({cache:false,
			   type : 'POST',
			   url : url,
			   data : dataString,
			   dataType: "json",
//			   contentType: "application/json; charset=utf-8",
			   success : success_handler,
			   error : error_handler,
		});
	}
}

function checkloginform(){
	var username = $("#username").val();
	if (username == undefined || username == ''){
		alert("请输入用户名!");
		$("#username").focus();
		return false;
	}
	
	var password = $("#password").val();
	if (password == undefined || password == ''){
		alert("请输入密码!");
		$("#password").focus();
		return false;
	}
	
	return true;
}

function clickLogin(){
	if (checkloginform()){
		var dataString = "username=" + $("#username").val() + "&password=" + $("#password").val();
		alert(dataString);
		run_ajax("/index_login.php?act=login", dataString, loginHandler);
	}
};
 
function loginHandler(res){
	if (res.status == 'true') {
		alert(res.msg);
	} else {
		
	}
}
 
 function clickRegister()
 {
	 alert("index register");
 }
 