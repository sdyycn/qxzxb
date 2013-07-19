/**
 * 
 */

function checkform() {
	var pwd = document.myform.password;
	if (checkspace(pwd.value)
			|| pwd.value.length < 6
			|| pwd.value.length > 20) {
		alert("长度必须在6-20之间!");
		document.myform.password.focus();
		return false;
	}
	
	var pwd2 = document.myform.repassword;
	if (pwd.value != pwd2.value) {
		pwd.value = '';
		pwd2.value = '';
		
		alert("两次输入密码不一致!");
		pwd.focus();
		
		return false;
	}

	function checkspace(checkstr) {
		var str = '';
		for (i = 0; i < checkstr.length; i++) {
			str = str + ' ';
		}
		return (str == checkstr);
	}
}