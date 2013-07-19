// 用户输入验证
<!--
function VF_loginform(){
    var theForm = document.loginform;
    var numRE = /^\d+$/;
    var errMsg = "";
    var setfocus = "";
    if (theForm['password'].value == ""){
        errMsg = "请填写登录密码！";
        setfocus = "['password']";
    }
    if (theForm['username'].value == ""){
        errMsg = "请填写登录用户名！";
        setfocus = "['username']";
    }
    if (errMsg != ""){
        alert(errMsg);
        eval("theForm" + setfocus + ".focus()");
    }
    if (theForm['yzcode'].value == ""){
        errMsg = "请填写右边的验证码。";
        setfocus = "['yzcode']";
    }
    else theForm.submit();
}//-->