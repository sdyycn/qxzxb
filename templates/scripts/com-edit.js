$(document).ready(function() {
	//企业性质绑定
	getSelectitems("#comnature",companytype_a);
	getSelectitems("#employeenum",companysize_a);
	//表单信息提示配置
	 msgnote = new Array("请输入公司名称!", "请输入联系人,不少于2个字符!", "请输入电子信箱!")
    //表单获取焦点提示信息
    function on_input(objname) {
        var strtxt;
        var obj = document.getElementById(objname);
        switch (objname) {
        case "d_comname":
            strtxt = msgnote[0];
            break;
        case "d_contact":
            strtxt = msgnote[1];
		 
		case "d_email":
            strtxt = msgnote[2];
        }
        obj.innerHTML = strtxt;
        obj.className = "d_normal";
    }
	//===========================公司名称输入检测
    function out_comname() {
        var chk = true;
        var obj = document.getElementById("d_comname");
        var str = document.getElementById("comname").value;
        if (str == "") {
            chk = false;
        }
        if (chk) {
            obj.className = "d_ok";
            obj.innerHTML = '公司名称输入正确!';
        } else {
            obj.className = "d_err";
            obj.innerHTML = '请输入公司名称!';
        }
        return chk;
    }
	//===========================联系人输入检测
    function out_contact() {
        var chk = true;
        var obj = document.getElementById("d_contact");
        var str = document.getElementById("contact").value;
        if (str == "") {
            chk = false;
        }
        if (chk) {
            obj.className = "d_ok";
            obj.innerHTML = '联系人输入正确!';
        } else {
            obj.className = "d_err";
            obj.innerHTML = '请输入联系人!';
        }
        return chk;
    }
	//==========================电子信箱输入检测
    function out_email() {
        var chk = true;
        var obj = document.getElementById("d_email");
        var str = document.getElementById("email").value;
        if (str == "") {
            chk = false;
			obj.className = "d_err";
            obj.innerHTML = '请输入邮箱!';
        }
		else
		{
			if(!(checkEmail(str))){
			obj.className = "d_err";
            obj.innerHTML = '请输入正确的邮箱格式!';
			 chk=false;
				}
			}
        if (chk) {
            obj.className = "d_ok";
            obj.innerHTML = '邮箱输入正确!';
        }
        return chk;
    }
	//公司名称检测
    $("#comname").focus(function() {
		on_input("d_comname");
	}) 
	$("#comname").blur(function() {
		out_comname();
	})
	//联系人检测
    $("#contact").focus(function() {
		on_input("d_contact");
	}) 
	$("#contact").blur(function() {
		out_contact();
	})
	$("#email").focus(function() {
		on_input("d_email");
	}) 
	$("#email").blur(function() {
		out_email();
	})
	$("#btn-editcomsave").click(function(){
		var  chk=true;
		//公司名称检测
		if($("#comname").val()==""|!out_comname()){
			$("#d_comname").html("请输入公司名称.");
			$("#d_comname").attr("class" , "d_err");
			chk=false;
			}
		//联系人输入检测
		if($("#contact").val()==""|!out_contact()){
			$("#d_contact").html("请输入联系人.");
			$("#d_contact").attr("class" , "d_err");
			chk=false;
			}
		//电子信箱输入检测
		if($("#email").val()==""|!out_email()){
			$("#d_email").html("请输入电子信箱.");
			$("#d_email").attr("class" , "d_err");
			chk=false;
			}
		//电子信箱格式是否正确
		if(!($("#email").val()=="")){
			if(!(checkEmail(str))){
			$("#d_email").html("邮箱格式不对.");
			$("#d_email").attr("class" , "d_err");
			 	chk=false;
				}
			}
		//注册资金输入是否为数字检测
		if(!($("#regfunds").val()=="")){
			if (!(checkNum($("#regfunds").val()))){
				$("#d_regfunds").html("请输入数字.");
				$("#d_regfunds").attr("class" ,"d_err");
				chk=false;
				}
			}
		//行业选择
		if($("#btn_IndustryID_2").val()=="请选择行业"){
			$("#d_Industry").html("你还没有选择行业.");
			$("#d_Industry").attr("class" ,"d_err" );
			chk=false;
			}
		//验证成立时间格式是否正确
		if(!($("#comformation").val()=="")){
			 if(!(checkDate($("#comformation").val()))){
				 $("#d_comformation").html("时间格式不对.");
				 $("#d_comformation").attr( "class", "d_err");
				 chk=false;
				 }
			}
		//电话和手机号码必须输入一项
		if($("#tel").val()==""&$("#mobile").val()==""){
			$("#d_phone").html("电话和手机至少得输入一项.")
			$("#d_phone").attr("class","d_err");
			chk=false;
			}
		//固话号码格式检测
		if(!($("#tel").val()=="")){
			if(!(checkTelephone($("#tel").val()))){
				$("#d_tel").html("电话号码格式不正确.");
				$("#d_tel").attr("class", "d_err");
											}
		//手机号码格式检测
		if(!($("#mobile").val()=="")){
			alert("123456");
			if(!(checkMobilePhone($("#mobile").val()))){
				$("#d_phone").html("手机号码格式不对.");
				}
			}
			
			}
		if(chk){
			document.comedit.submit();
		}
								})
})