//简历编辑页相关操作
$(document).ready(function() {
//加载编辑资料模板
$(".btn-base").click(function(){
	//获取原页面中的数据
	var realname = $(".baseinfo .realname").html();
	var msex=$("input[name='sex'][type='radio']:checked").val(); 
	var marriage=$(".marriage").html();
	var political=$(".political").html();
	var birth=$(".baseinfo .birth").html();
	var nowaddr=$(".nowaddr").html();
	var residenceaddr=$(".residenceaddr").html();
	var address=$(".address").html();
	var tel=$(".tel").html();
	var mobile=$(".mobile").html();
	var email =$(".email").html();
	var yearsalary=$(".yearsalary").val();
	var workingstate=$(".workingstate").html();
	//动态加载外部编辑框html
	htmlobj=$.ajax({url:"ajax/baseedit.html",async:false});
	$(".baseinfo").html(htmlobj.responseText);
	// 给表单绑值
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
	$("#workingstate").val(workingstate);
	})

//编辑资料数据提交
$("#btnbasesave").click(function(){
								 alert("123");
								 })
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
	var strcotent = $(".self-evaluation .content").html();
	$(".self-evaluation .content").empty();
	$("#valuation-content").val(strcotent);
	$(".self-evaluation .edit").show();
})
//点击保存按钮
$(".btn-evalsave").click(function(){
	$(".self-evaluation .content").html($("#valuation-content").val());					  
	$(".self-evaluation .content").show();
	$(".self-evaluation .edit").hide();
	});






//================================工作经验添加
$(".btn-addexp").click(function(){
 htmlobj=$.ajax({url:"ajax/workexpadd.html",async:false});
 $(".workexp").append(htmlobj.responseText);
 $(".btn-expadd").click(function(){
  //向后台提交表单，保存数据
  var company =$("#company").val();
  var begindate =$("#begindate").val();
  var enddate =$("#enddate").val();
  var jobname =$("#jobname").val();
  var jobnote=$("#jobnote").val();
  
  
  
  
  
  
  
 $(".listworkexp:last").remove();
  //重新加载正常状态模板
 htmlobj=$.ajax({url:"ajax/workexp.html",async:false});
 $(".workexp").append(htmlobj.responseText);
 $(".company:last").html(company);
 $(".begindate:last").html(begindate);
 $(".enddate:last").html(enddate);
 $(".jobname:last").html(jobname);
 $(".jobnote:last").html(jobnote);
	});
})
//===============================工作经验编辑
$(".expedit").click(function(){
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
	$(".btn-expedit").bind("click", function(){
											 
	//获取修改后的表单的的值
	var strbegindate=$("#begindate").val();
	var strenddate=$("#enddate").val();
	var strpositionname=$("#jobname").val();
	var strcompany=$("#company").val();
	var strdes=$("#jobnote").val();
	//======ajax向后台提交数据保存相应的工作信息
	//============================相关请求代码
	
	
	
	
	
	
	
	//改变修改后的工作经验的内容板
	htmlobjstate=$.ajax({url:"ajax/workexp.html",async:false});
	$(".listworkexp tbody").eq(index).html(htmlobjstate.responseText);
	$(".jobnote").eq(index).html(strdes);
	$(".company").eq(index).html(strcompany);
	$(".jobname").eq(index).html(strpositionname);
	$(".begindate").eq(index).html(strbegindate);
	$(".enddate").eq(index).html(strenddate);
									 });

	})
})                  
