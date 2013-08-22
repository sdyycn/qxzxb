$(document).ready(function() {
    //select配置信息绑定
    getSelectitems("#qualification", degree_a);
    getSelectitems("#workexp", workexp_a);
    getSelectitems("#language", language_a);
    getSelectitems("#salary", salary_a);
    // 提示信息
    msgnote = new Array("请输入岗位名称!", "请输入联系人,不少于2个字符")
    //表单获取焦点提示信息
    function on_input(objname) {
        var strtxt;
        var obj = document.getElementById(objname);
        switch (objname) {
        case "d_jobname":
            strtxt = msgnote[0];
            break;
        case "d_contact":
            strtxt = msgnote[1];
        }
        obj.innerHTML = strtxt;
        obj.className = "d_normal";
    }
    //===============================================岗位名称输入检测
    function out_jobname() {
        var chk = true;
        var obj = document.getElementById("d_jobname");
        var str = document.getElementById("jobname").value;
        if (str == "") {
            chk = false;
        }
        if (chk) {
            obj.className = "d_ok";
            obj.innerHTML = '岗位名称输入正确!';
        } else {
            obj.className = "d_err";
            obj.innerHTML = '请输入岗位名称!';
        }
        return chk;
    }
    //=============================================联系人输入检测
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
    //岗位输入检测
    $("#jobname").focus(function() {
        on_input("d_jobname");
    })
	$("#jobname").blur(function() {
        out_jobname();
    })
    //联系人输入检测
    $("#contact").focus(function() {
        on_input("d_contact");
    })
	$("#contact").blur(function() {
        out_contact();
    })

//表单检测
	$("#posing").click(function() {
    	var chk = true;
	//工作岗位名称检测
		if(!out_jobname()){
			$("#d_jobname").html("请输入岗位名称.");
       		$("#d_jobname").attr("class", "d_err");
			chk = false;
		}
	//联系人检测
		if(!out_contact()){
			$("#d_contact").html("请输入联系人.");
			$("#d_contact").attr("class", "d_err");
			chk = false;
			}
	//招聘人数是否为数字
	if(!($("#quantity").val()=="0")){
		if (!(checkInteger($("#quantity").val()))){
			$("#d_quantity").html("请输入整数.");
			$("#d_quantity").attr("class","d_err");
			chk = false;
			}
		}
	//固定电话号码检测
	if(!($("#tel").val()=="")){
		if (!(checkTelephone($("#tel").val()))){
			$("#d_phone").html("请输入正确的电话号码.");
			$("#d_phone").attr("class","d_err");
			chk = false;
			}
		}
	//手机检测
	if(!($("#mobile").val()=="")){
		if (!(checkMobilePhone($("#mobile").val()))){
			$("#d_phone").html("请输入正确的手机号码.");
			$("#d_phone").attr("class","d_err");
			chk = false;
			}
		}
    //岗位职责是否为空
    	if ($("#jobnote").val() == "") {
        	$("#d_jobnote").html("请输入岗位职责.");
       	    $("#d_jobnote").attr("class", "d_err");
			chk = false;
    }
    //任职要求是否为空
    	if ($("#responsibility").val() == "") {
        	$("#d_responsibility").html("请输入任职要求");
       		$("#d_responsibility").attr("class", "d_err");
			chk = false;
    }
    //电话和手机必须填写一项
    	if ($("#mobile").val() == ""&$("#tel").val() == "") {
        	$("#d_phone").html("请至少输入一种联系方式");
        	$("#d_phone").attr("class", "d_err");
			chk = false;
    	}
	//地区是否选择

		if($("#btn_jobArea").val() == "请选择地区"){
			$("#d_workplace").html("你还没有选择工作地区.");
			$("#d_workplace").attr( "class","d_err" );
			chk = false;
			}
	//职位类别选择
		if($("#btn_FuntypeID").val() == "请选择职能类别"){
			$("#d_jobsort").html("你还没有选择职位类别");
			$("#d_jobsort").attr( "class","d_err" );
			chk = false;
			}
	//检测通过，提交变淡数据
	if(chk){
		document.loginform.submit();
		}
	})
})