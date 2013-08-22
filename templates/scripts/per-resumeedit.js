//简历编辑页相关操作
$(document).ready(function() {
//各种按钮的状态空值
var flag_base_edit="0"; 
var flag_self_edit="0";
var flag_special_edit="0";
var flag_intention_edit="0";
var flag_exp_add="0";
var flag_exp_edit="0";
var flag_exp_add="0";
var flag_edu_add="0";
var flag_edu_edit="0";
var flag_aword_add="0";
var flag_aword_edit="0";
var flag_post_add="0";
var flag_post_edit="0";
var flag_practice_add="0";
var flag_practice_edit="0";
var flag_language_add="0";
var flag_language_edit="0";
//==============================基本资料编辑==========================================================================================
$(".btn-base").live("click",function() {
    if (flag_base_edit == "0") {
        //获取原页面中的数据
        var realname = $(".baseinfo .realname").html();
        var msex = $("sex").html();
        var marriage = $(".marriage").html();
        var political = $(".political").html();
        var birth = $(".baseinfo .birth").html();
        var nowaddr = $(".nowaddr").html();
        var residenceaddr = $(".residenceaddr").html();
        var address = $(".address").html();
        var tel = $(".tel").html();
        var mobile = $(".mobile").html();
        var email = $(".email").html();
        var yearsalary = $(".yearsalary").html();
        var workingstate = $(".workingstate").html();
        //动态加载外部编辑框html
        htmlobj = $.ajax({
            url: "ajax/baseedit.html",
            async: false
        });
        $(".baseinfo").html(htmlobj.responseText);

        // 给加载后的外部编辑框绑定数据
        $("input[name='sex'][value=" + msex + "]").attr("checked", true);
        $("#realname").val(realname);
        $("#birth").val(birth);
        $("#marriage").val(marriage);
        $("#political").val(political);
        $("#btn_hukou").val(residenceaddr);
        $("#btn_residency").val(nowaddr);
        $("#address").val(address);
        $("#tel").val(tel);
        $("#mobile").val(mobile);
        $("#email").val(email);
        $("#yearsalary").val(yearsalary);
        $("#workstate").val(workingstate);
        //状态更改
        flag_base_edit = "1"
    }
})

//编辑资料数据保存
$(".btnbasesave").live("click",function() {

    //获取表单的值
    var sex = $("input[name='sex'][type='radio']:checked").val();
    if (sex == "0") {
        strsex = "男";
    } else if (sex == "1") {
        strsex = "女";
    }
    var realname = $("#realname").val();
    var birth = $("#birth").val();
    var marriage = $("#marriage").val();
    var political = $("#political").val();
    var residenceaddr = $("#btn_hukou").val();
    var nowaddr = $("#btn_residency").val();
    var address = $("#address").val();
    var tel = $("#tel").val();
    var mobile = $("#mobile").val();
    var email = $("#email").val();
    var yearsalary = $("#yearsalary").val();
    var workingstate = $("#workstate").val();

    //ajax向后端提交，保存数据
    //相关代码=============================================
    //相关代码
    //相关代码
    //相关代码
    //相关代码
    //相关代码
    //相关代码
    //相关代码===============================================
    //数据保存成功后，加载正常模板页面，并绑定数据
    htmlobj = $.ajax({
        url: "ajax/base.html",
        async: false
    });
    $(".baseinfo").html(htmlobj.responseText);
    $(".birth").html(birth);
    $(".realname").html(realname);
    $(".sex").html(strsex);
    $(".political").html(political);
    $(".marriage").html(marriage);
    $(".residenceaddr").html(residenceaddr);
    $(".nowaddr").html(nowaddr);
    $(".address").html(address);
    $(".tel").html(tel);
    $(".mobile").html(mobile);
    $(".email").html(email);
    $(".yearsalary").html(yearsalary);
    $(".workingstate").html(workingstate);
    //状态更改
    flag_base_edit = "0";
})


//===============================自我评价===========================================================================================
//===============================自我评价添加或者编辑
//根据自我评价内容，改变按钮的值
if($(".self-evaluation .content").html()==""){
	$(".btn-evaluation").attr("value","添加");
	}
else{
	$(".btn-evaluation").attr("value","编辑");
	}
//点击编辑或者添加按钮显示
$(".btn-evaluation").click(function(){
	if(flag_self_edit=="0"){
	var strcotent = $(".self-evaluation .content").html();
	$(".self-evaluation .content").empty();
	$("#valuation-content").val(strcotent);
	$(".self-evaluation .selfedit").show();
	flag_self_edit="1"
	}
})
//点击保存按钮
$(".btn-evalsave").click(function(){
     var strvaluation=$("#valuation-content").val();
	
	//获取子我评价的值,ajax向后端保存数据代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	$(".self-evaluation .content").html(strvaluation);
	$(".self-evaluation .content").show();
	$(".self-evaluation .selfedit").hide();
	flag_self_edit="0"
	});




//===================================================技术专长========================================================================
//========================专长编辑开始
$(".btn-skill").click(function(){
	if(flag_special_edit=="0"){
	var strskill="";
	$(".note").each(function(i){
     strskill=strskill+$(".note").eq(i).html()+	"，";
 })
strskill=strskill.substr(0,strskill.length-1);
 $(".special").empty();
 $("#skill").val(strskill);
 $(".specialedit").show();
 flag_special_edit="1";
	}
})
//保存专长数据库
$(".btn-skillsave").click(function(){
var strskill=$("#skill").val();
//=====================================ajax向后端提交数据，保存专长

	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码







//前端绑定保存后的数据
var skill_a=[];
var outstr="";
skill_a = strskill.split("，");
for (var i in skill_a) {
		outstr += "<span class='special-skill'><span class='note'>" + skill_a[i] + "</span></span>";
	}
$(".special").html(outstr);
$(".special").show();
$(".specialedit").hide();
flag_special_edit="0";
	 })



// ==================================求职意向=============================================================================================================
//求职意向编辑模板加载
$(".btn-intention").click(function(){
	if(flag_intention_edit=="0"){
	var jobtype = $(".jobtype").html();
	var jobworkplace=$(".jobworkplace").html();
	var jobindustry=$(".jobindustry").html();
	var jobsort=$(".jobsort").html();
	var salary=$(".salary").html();
	htmlobj=$.ajax({url:"ajax/intentionedit.html",async:false});
	$(".intention").html(htmlobj.responseText);
     $("#jobtype").val(jobtype);
	 $("#btn_jobArea").val(jobworkplace);
	 $("#btn_IndustryID").val(jobindustry);
	 $("#btn_FuntypeID").val(jobsort);
	 $("#salary").val(salary);
	 flag_intention_edit="1";
	}
	})

//求职意向数据保存
	 $(".intentsave").live("click", function(){
	//获取提交表单的数据
      var jobtype=$("#jobtype").val();
	  var jobworkplace=$("#btn_jobArea").val();
	  var jobindustry=$("#btn_IndustryID").val();
	  var jobsort=$("#btn_FuntypeID").val();
	  var salary=$("#salary").val();
	//ajax向后端提交代码保存数据
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	
	//加载正常状态模板,并绑定数据
	htmlobj=$.ajax({url:"ajax/intention.html",async:false});
	$(".intention").html(htmlobj.responseText);
	$(".jobtype").html(jobtype);
	$(".jobworkplace").html(jobworkplace);
	$(".jobindustry").html(jobindustry);
	$(".jobsort").html(jobsort);
	$(".salary").html(salary);
	flag_intention_edit="0";
})



//===============================工作经验======================================================================================================

//===============================加载编辑模板，并绑定相关数据
$(".expedit").live("click", function(){
	if(flag_exp_edit=="0"){
	var index = $(".expedit").index($(this));
	//获取当前索引项的工作信息
	var strbegindate=$(".begindate").eq(index).html();
	var strenddate=$(".enddate").eq(index).html();
	var strpositionname=$(".jobname").eq(index).html();
	var strcompany=$(".company").eq(index).html();
	var strdes=$(".jobnote").eq(index).html();
	htmlobj=$.ajax({url:"ajax/workexpedit.html",async:false});
	$(".listworkexp tbody").eq(index).html(htmlobj.responseText);
	$("#begindate").val(strbegindate);
	$("#enddate").val(strenddate);
	$("#company").val(strcompany);
	$("#jobname").val(strpositionname);
	$("#jobnote").val(strdes);
	$("#expindex").val(index);
	flag_exp_edit="1";
	}
	})


//获取表单数据，向后端保存数据库，
$(".btn-expedit").live("click", function(){	

	//获取修改后的表单的的值
	var index=$("#expindex").val();
	var strbegindate=$("#begindate").val();
	var strenddate=$("#enddate").val();
	var strpositionname=$("#jobname").val();
	var strcompany=$("#company").val();
	var strdes=$("#jobnote").val();
	//======ajax向后台提交数据保存相应的工作信息
	//==================================相关请求代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码

	//改变修改后的工作经验的内容板
	htmlobj=$.ajax({url:"ajax/workexpbody.html",async:false});
	strexphtml=htmlobj.responseText;
	strexphtml=strexphtml.replace("$jobnote",strdes)
	strexphtml=strexphtml.replace("$company",strcompany)
	strexphtml=strexphtml.replace("$jobname",strpositionname)
	strexphtml=strexphtml.replace("$begindate",strbegindate)
	strexphtml=strexphtml.replace("$enddate",strenddate)
    $(".listworkexp tbody").eq(index).empty();
	$(".listworkexp tbody").eq(index).html(strexphtml);
	flag_exp_edit="0";
		});


//=======================================================工作经验添加
//记载工作经验添加模板
$(".btn-addexp").click(function(){
if(flag_exp_add=="0"){
htmlobj=$.ajax({url:"ajax/workexpadd.html",async:false});
$(".workexp").append(htmlobj.responseText);
flag_exp_add="1";
}
})
//保存新增的工作经验数据
 $(".btn-expadd").live("click",function(){
  //向后台提交表单，保存数据
  var company =$("#company").val();
  var begindate =$("#begindate").val();
  var enddate =$("#enddate").val();
  var jobname =$("#jobname").val();
  var jobnote=$("#jobnote").val();
  //ajax向后端保存数据代码
  //相关代码
  //相关代码
  //相关代码
  //相关代码
  //相关代码
  //相关代码
  //相关代码
  //相关代码
  //相关代码
  //相关代码
  //相关代码
  
 //清除添加模板
 $(".listworkexp:last").remove();
 //重新加载正常状态模板
 htmlobj=$.ajax({url:"ajax/workexp.html",async:false});
 var strexphtml=htmlobj.responseText
 strexphtml=strexphtml.replace("$jobnote",jobnote)
 strexphtml=strexphtml.replace("$company",company)
 strexphtml=strexphtml.replace("$jobname",jobname)
 strexphtml=strexphtml.replace("$begindate",begindate)
 strexphtml=strexphtml.replace("$enddate",enddate)
 $(".workexp").append(strexphtml);
flag_exp_add="0";
	});





//=========================================教育背景=========================================================================================
//教育背景编辑
$(".eduedit").live("click", function(){
	if(flag_edu_edit=="0"){
	var index = $(".eduedit").index($(this));
	//获取当前索引项的教育背景信息
	var strbegindate=$(".edubegindate").eq(index).html();
	var strenddate=$(".eduenddate").eq(index).html();
	var strmajor=$(".majorname").eq(index).html();
	var strschool=$(".school").eq(index).html();
	var streducation=$(".education").eq(index).html();
	var strmajornote=$(".majornote").eq(index).html();
	//加载外部编辑模板
	htmlobj=$.ajax({url:"ajax/eduedit.html",async:false});
	$(".list-education tbody").eq(index).html(htmlobj.responseText);
	$("#edubegindate").val(strbegindate);
	$("#eduenddate").val(strenddate);
	$("#major").val(strmajor);
	$("#school").val(strschool);
	$("#education").val(streducation);
	$("#majornote").val(strmajornote);
	$("#eduindex").val(index);
	flag_edu_edit="1";
	}
	})

//保存修改的教育背景的修改信息
$(".btn-eduedit").live("click", function(){								 
	//获取修改后的表单的的值
	var index=$("#eduindex").val();
	var strbegindate=$("#edubegindate").val();
	var strenddate=$("#eduenddate").val();
	var strmajor=$("#major").val();
	var strschool=$("#school").val();
	var strdes=$("#majornote").val();
	var stredu=$("#education").val();
	//======ajax向后台提交数据保存相应的工作信息
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	htmlobj=$.ajax({url:"ajax/edubody.html",async:false});
	streduhtml=htmlobj.responseText;
	streduhtml=streduhtml.replace("$edubegindate",strbegindate)
	streduhtml=streduhtml.replace("$eduenddate",strenddate)
	streduhtml=streduhtml.replace("$school",strschool)
	streduhtml=streduhtml.replace("$educationname",stredu)
	streduhtml=streduhtml.replace("$majornote",strdes)
	streduhtml=streduhtml.replace("$majorname",strmajor)
	$(".list-education tbody").eq(index).empty();
	$(".list-education tbody").eq(index).html(streduhtml);
	flag_edu_edit="0";
});




//教育背景添加,加载添加模板
$(".btn-addedu").click(function(){
	if(flag_edu_add=="0"){
 htmlobj=$.ajax({url:"ajax/eduadd.html",async:false});
 $(".educationwrapper").append(htmlobj.responseText);
 flag_edu_add="1";
	}
})
//工作经验添加保存
$(".btn-edusave").live("click", function(){
var edubegindate =$("#edubegindate").val();
var enddate=$("#eduenddate").val();
var major=$("#major").val();
var school=$("#school").val();
var education=$("#education").val();
var majornote=$("#majornote").val();
//ajax===================向后端保存数据代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码


$(".list-education tbody:last").remove();
//加载正常模板
htmlobj=$.ajax({url:"ajax/edu.html",async:false});
var stredu=htmlobj.responseText;
stredu=stredu.replace("$edubegindate",edubegindate)
stredu=stredu.replace("$eduenddate",enddate)
stredu=stredu.replace("$school",school)
stredu=stredu.replace("$educationname",education)
stredu=stredu.replace("$majornote",majornote)
stredu=stredu.replace("$majorname",major)
$(".educationwrapper").append(stredu);
flag_edu_add="0";
})






//================================学校奖励开始============================================================================================
//学校奖励添加，加载模板
$(".btn-addaword").click(function(){
if(flag_aword_add=="0"){
htmlobj=$.ajax({url:"ajax/awordadd.html",async:false});
 $(".reward").append(htmlobj.responseText);
 flag_aword_add="1"
}
})
//工作经验添加保存
$(".awordaddsave").live("click", function(){
var getdate =$("#getdate").val();
var awordname=$("#awordname").val();
$(".list-reward tbody:last").remove();
//ajax===================向后端保存数据代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码


//加载正常模板
htmlobj=$.ajax({url:"ajax/aword.html",async:false});
var strawordhtml=htmlobj.responseText;
strawordhtml=strawordhtml.replace("$getdate",getdate)
strawordhtml=strawordhtml.replace("$awordname",awordname)
$(".reward").append(strawordhtml);
flag_aword_add="0"
})

//===========================
//学校奖励编辑
$(".awordedit").live("click", function(){
	if(flag_aword_edit=="0"){
	var index = $(".awordedit").index($(this));
	//获取当前索引项的教育背景信息
	var strgetdate=$(".getdate").eq(index).html();
	var strawordname=$(".awordname").eq(index).html();
	//加载外部编辑模板
	htmlobj=$.ajax({url:"ajax/awordedit.html",async:false});
	$(".list-reward tbody").eq(index).html(htmlobj.responseText);
	$("#getdate").val(strgetdate);
	$("#awordname").val(strawordname);
	$("#awordindex").val(index);
	flag_aword_edit="1";
	}
	})
//学校奖励，编辑后的数据保存
$(".awordeditsave").live("click", function(){								 
	//获取修改后的表单的的值
	var index=$("#awordindex").val();
	var strgetdate=$("#getdate").val();
	var strawordname=$("#awordname").val();
	//======ajax向后台提交数据保存相应的工作信息
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	htmlobj=$.ajax({url:"ajax/awordbody.html",async:false});
	strawordhtml=htmlobj.responseText;
	strawordhtml=strawordhtml.replace("$getdate",strgetdate)
	strawordhtml=strawordhtml.replace("$awordname",strawordname)
	$(".list-reward tbody").eq(index).empty();
	$(".list-reward tbody").eq(index).html(strawordhtml);
	flag_aword_edit="0";
});

//==============================================校内职务开始===================================================================================
//校内职务添加，加载模板
$(".btn-addpost").click(function(){
if(flag_post_add=="0"){
htmlobj=$.ajax({url:"ajax/postadd.html",async:false});
 $(".schoolpost").append(htmlobj.responseText);
 flag_post_add="1";
}
})
//工作经验添加保存
$(".postaddsave").live("click", function(){
	var begindate=$("#postbegindate").val();
	var enddate=$("#postenddate").val();
	var postname=$("#postname").val();
	var postnote=$("#postnote").val();
$(".list-schoolpost tbody:last").remove();
//ajax===================向后端保存数据代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码


//加载正常模板
htmlobj=$.ajax({url:"ajax/post.html",async:false});
var strposthtml=htmlobj.responseText;
strposthtml=strposthtml.replace("$postbegindate",begindate);
strposthtml=strposthtml.replace("$postenddate",enddate);
strposthtml=strposthtml.replace("$postname",postname);
strposthtml=strposthtml.replace("$postnote",postnote);
$(".schoolpost").append(strposthtml);
flag_post_add="0";
})
//====================================================
//校内职务编辑
$(".postedit").live("click", function(){
	var index = $(".postedit").index($(this));
	//获取当前索引项的教育背景信息
	var begindate=$(".postbegindate").eq(index).html();
	var enddate=$(".postenddate").eq(index).html();
	var postname=$(".postname").eq(index).html();
	var postnote=$(".postnote").eq(index).html();
	//加载外部编辑模板
	htmlobj=$.ajax({url:"ajax/postedit.html",async:false});
	$(".list-schoolpost tbody").eq(index).html(htmlobj.responseText);
	$("#postindex").val(index);
	$("#postbegindate").val(begindate);
	$("#postenddate").val(enddate);
	$("#postname").val(postname);
	$("#postnote").val(postnote);
	})
//学校奖励，编辑后的数据保存
$(".posteditsave").live("click", function(){								 
	//获取修改后的表单的的值
	var index=$("#postindex").val();
	var strbegindate=$("#postbegindate").val();
	var strenddate=$("#postenddate").val();
	var strpostname=$("#postname").val();
	var strpostnote=$("#postnote").val();
	//======ajax向后台提交数据保存相应的工作信息
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	htmlobj=$.ajax({url:"ajax/postbody.html",async:false});
	strposthtml=htmlobj.responseText;
	strposthtml=strposthtml.replace("$postbegindate",strbegindate);
	strposthtml=strposthtml.replace("$postenddate",strenddate);
	strposthtml=strposthtml.replace("$postname",strpostname);
	strposthtml=strposthtml.replace("$postnote",strpostnote);
	$(".list-schoolpost tbody").eq(index).empty();
	$(".list-schoolpost tbody").eq(index).html(strposthtml);
});
//=======================================================================实践活动============================================================
$(".btn-addpractice").click(function(){
if(flag_practice_add=="0"){
	htmlobj=$.ajax({url:"ajax/practiceadd.html",async:false});
	$(".practice-container").append(htmlobj.responseText);
	flag_practice_add="1";
	}
})
$(".btn-practiceaddsave").live("click",function(){
	var practicename=$("#practicename").val();
	var practicenote=$("#practicenote").val();
	var begindate=$("#prabegindate").val();
	var enddate=$("#praenddate").val();
	$(".list-practice tbody:last").remove();
//ajax===================向后端保存数据代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码


//加载正常模板
htmlobj=$.ajax({url:"ajax/practice.html",async:false});
var strhtml=htmlobj.responseText;
strhtml=strhtml.replace("$prabegindate",begindate);
strhtml=strhtml.replace("$praenddate",enddate);
strhtml=strhtml.replace("$practicename",practicename);
strhtml=strhtml.replace("$practicenote",practicenote);
$(".practice-container").append(strhtml);
flag_practice_add="0";																					
})
//==================实践活动编辑=========================
$(".btn-pra-edit").live("click",function(){
if(flag_practice_edit=="0"){
	var index = $(".btn-pra-edit").index($(this));
	//获取当前索引项的教育背景信息
	var begindate=$(".prabegindate").eq(index).html();
	var enddate=$(".praenddate").eq(index).html();
	var practicename=$(".practicename").eq(index).html();
	var practicenote=$(".practicenote").eq(index).html();
	//加载外部编辑模板
	htmlobj=$.ajax({url:"ajax/practiceedit.html",async:false});
	$(".list-practice tbody").eq(index).html(htmlobj.responseText);
	$("#praindex").val(index);
	$("#prabegindate").val(begindate);
	$("#praenddate").val(enddate);
	$("#practicename").val(practicename);
	$("#practicenote").val(practicenote);
	flag_practice_edit="1";
	}
//实践活动数据编辑保存
$(".btn-practiceeidtsave").live("click",function(){
	var begindate=$("#prabegindate").val();
	var enddate=$("#praenddate").val();
	var practicename=$("#practicename").val();
	var practicenote=$("#practicenote").val();
	var index=$("#praindex").val();
//ajax===================向后端保存数据代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码


//加载正常模板
htmlobj=$.ajax({url:"ajax/practicebody.html",async:false});
var strhtml=htmlobj.responseText;
strhtml=strhtml.replace("$prabegindate",begindate);
strhtml=strhtml.replace("$praenddate",enddate);
strhtml=strhtml.replace("$practicename",practicename);
strhtml=strhtml.replace("$practicenote",practicenote);
$(".list-practice tbody").eq(index).html(strhtml);
flag_practice_edit="0";		
})
 })
//=================================语言能力开始=========================================================
//语言能力添加
$(".btnaddlanguage").click(function(){
  if(flag_language_add=="0"){
	htmlobj=$.ajax({url:"ajax/languageadd.html",async:false});
	$(".language").append(htmlobj.responseText);
	flag_languate_add="1";
	  }
})
$(".btn-langaddsave").live("click", function(){
	var languagename=$("#languagename").val();
	var readandwrite=$("#readandwrite").val();
	var listenandtalk=$("#listenandtalk").val();
	var master=$("#master").val();
	$(".list-language :last").remove();
//ajax===================向后端保存数据代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码


//加载正常模板
htmlobj=$.ajax({url:"ajax/language.html",async:false});
var strhtml=htmlobj.responseText;
strhtml=strhtml.replace("$languagename",languagename);
strhtml=strhtml.replace("$readandwrite",readandwrite);
strhtml=strhtml.replace("$listenandtalk",listenandtalk);
strhtml=strhtml.replace("$master",master);
$(".language").append(strhtml);
flag_language_add="0";	
})
//语言能力编辑
//==================语言编辑=========================
$(".btnlangedit").live("click",function(){
if(flag_language_edit=="0"){
	var index = $(".btnlangedit").index($(this));
	//获取当前索引项的教育背景信息
	var languagename=$(".languagename").eq(index).html();
	var readandwrite=$(".readandwrite").eq(index).html();
	var listenandtalk=$(".listenandtalk").eq(index).html();
	var master=$(".master").eq(index).html();
	//加载外部编辑模板
	htmlobj=$.ajax({url:"ajax/languageedit.html",async:false});
	$(".list-language").eq(index).html(htmlobj.responseText);
	$("#languagename").val(languagename);
	$("#readandwrite").val(readandwrite);
	$("#listenandtalk").val(listenandtalk);
	$("#master").val(master);
	$("#langindex").val(index);
	flag_language_edit="1";
	}
//实践活动数据编辑保存
$(".btnlangeditsave").live("click",function(){
	var languagename=$("#languagename").val();
	var readandwrite=$("#readandwrite").val();
	var listenandtalk=$("#listenandtalk").val();
	var master=$("#master").val();
	var index=$("#langindex").val();
//ajax===================向后端保存数据代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
	//相关代码
//加载正常模板
htmlobj=$.ajax({url:"ajax/languagebody.html",async:false});
var strhtml=htmlobj.responseText;
strhtml=strhtml.replace("$languagename",languagename);
strhtml=strhtml.replace("$readandwrite",readandwrite);
strhtml=strhtml.replace("$listenandtalk",listenandtalk);
strhtml=strhtml.replace("$master",master);
$(".list-language").eq(index).html(strhtml);
flag_language_edit="0";		
})

 })


})                  
