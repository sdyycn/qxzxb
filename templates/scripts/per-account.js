$(document).ready(function() {
	//去除空格函数
	function trim(str) {
		return str.replace(/(^\s*)|(\s*$)/g, "");
	}
	// 提示信息
	msgnote = new Array("请输入你旧账号!", "请输入你的旧账号密码，注意区分大小写。", "6~18个字符，可使用字母、数字、下划线。", "请输入你的旧密码，注意区分大小写。", "不少于6个字符，区分大小写。", "请再重新输入新密码。")
	//表单获取焦点提示信息
	function on_input(objname) {
		var strtxt;
		var obj = document.getElementById(objname);
		switch (objname) {
		case "d_oldusername":
			strtxt = msgnote[0];
			break;
		case "d_password":
			strtxt = msgnote[1];
			break;
		case "d_newusername":
			strtxt = msgnote[2];
			break;
		case "d_oldpassword":
			strtxt = msgnote[3];
			break;
		case "d_newpassword":
			strtxt = msgnote[4];
			break;
		case "d_newpassword2":
			strtxt = msgnote[5];
			break;
		}
		obj.innerHTML = strtxt;
		obj.className = "d_normal";
	}
	//===============================================账号修改检测
	//旧账户检测
	function out_oldusername() {
		var chk = true;
		var obj = document.getElementById("d_oldusername");
		var str = document.getElementById("oldusername").value;
		if (str == "") {
			chk = false;
		}
		if (chk) {
			obj.className = "d_ok";
			obj.innerHTML = '旧账户已经输入!';
		} else {
			obj.className = "d_err";
			obj.innerHTML = '旧账户输入错误!';
		}
		return chk;
	}
	//旧密码检测
	function out_password() {
		var chk = true;
		var obj = document.getElementById("d_password");
		var str = document.getElementById("password").value;
		if (str == "") {
			chk = false;
		}
		if (chk) {
			obj.className = "d_ok";
			obj.innerHTML = '旧密码已经输入!';
		} else {
			obj.className = "d_err";
			obj.innerHTML = '旧密码输入错误!';
		}
		return chk;
	}
	//新账户检测
	function out_newusername() {
		var chk = true;
		var obj = document.getElementById("d_newusername");
		var str = document.getElementById("newusername").value;
		if (str == "") {
			chk = false;
			obj.className = "d_err";
			obj.innerHTML = '账号未输入!';
		}
		if (chk) {
			obj.className = "d_ok";
			obj.innerHTML = '';
		}
		if (! (chk) && str != "") {
			obj.className = "d_err";
			obj.innerHTML = '账户已经存在请选择其他账户!';
		}
		return chk;
	}

	//旧账户检测
	$("#oldusername").focus(function() {
		on_input("d_oldusername");
	}) 
	$("#oldusername").blur(function() {
		out_oldusername();
	})
	//旧密码检测
	$("#password").focus(function() {
		on_input("d_password");
	}) 
	$("#password").blur(function() {
		out_password();
	})
	//新账户检测
	$("#newusername").focus(function() {
		on_input("d_newusername");
	}) 
	$("#newusername").blur(function() {
		out_newusername()
	})
	//=============================================================密码修改检测
	//旧密码输入检测
	function out_oldpassword() {
		var chk = true;
		var obj = document.getElementById("d_oldpassword");
		var str = document.getElementById("oldpassword").value;
		if (str == "") {
			chk = false;
		}
		if (chk) {
			obj.className = "d_ok";
			obj.innerHTML = '旧密码已经输入!';
		} else {
			obj.className = "d_err";
			obj.innerHTML = '旧密码输入错误!';
		}
		return chk;
	}
	//新密码输入检测
	function out_newpassword() {
		var chk = true;
		var obj = document.getElementById("d_newpassword");
		var str = document.getElementById("newpassword").value;
		var strlen = trim(document.getElementById("newpassword").value).length;
		if (str == "") {
			chk = false;
		}
		if (chk) {
			obj.className = "d_ok";
			obj.innerHTML = '旧密码已经输入!';
			if (strlen < 6) {
				obj.className = "d_err";
				obj.innerHTML = '密码长度不能小于6位!';
			}
		} else {
			obj.className = "d_err";
			obj.innerHTML = '旧密码输入错误!';
		}
		return chk;
	}
	//新密码再次输入检测
	function out_newpassword2() {
		var chk = true;
		var obj = document.getElementById("d_newpassword2");
		var str1 = document.getElementById("newpassword").value;
		var str2 = document.getElementById("newpassword2").value;
		if (str2 == "") {
			obj.className = "d_err";
			obj.innerHTML = '新密码未输入!';
		} else {
			if (! (str1 == str2)) {
				chk = false;
				obj.className = "d_err";
				obj.innerHTML = '两次密码输入不一样!';
			}
		}
		return chk;
	}
	//旧密码检测
	$("#oldpassword").focus(function() {
		on_input("d_oldpassword");
	}) 
	$("#oldpassword").blur(function() {
		out_oldpassword();
	})
	//新密码检测
	$("#newpassword").focus(function() {
		on_input("d_newpassword");
	}) 
	$("#newpassword").blur(function() {
		out_newpassword();
	})
	//新密码再次输入检测
	$("#newpassword2").focus(function() {
		on_input("d_newpassword2");
	}) 
	$("#newpassword2").blur(function() {
		out_newpassword2()
	})
})