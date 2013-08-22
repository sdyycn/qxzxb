//简历编辑页相关操作
$(document).ready(function() {
//===============================信件弹出框
$("#letter-body .btn-view").click(function(){
	var index = $("#letter-body .btn-view").index($(this));
	//获取当前索引项的信件ID
	var id = $(".letterid").eq(index).html();
	
	var offset = $(this).offset();
	//=============================ajax查询信件详细内容
	//ajax查询代码及弹出框内容的动态绑定
	$.getJSON("/percenter/letter.php?act=view&id="+id, function(result){
		if (result.status == false){
			alert(result.msg);
		} else {
			$('#pop-letter .title').text(result.title);
			$('#pop-letter .company').text(result.company);
			$('#pop-letter .date').text(result.date);
			$('#pop-letter .jobname').text(result.jobname);
			$('#pop-letter .letter-content').text(result.content);
			//=============================弹出框定位
//				var offset = $(this).offset();
			$("#pop-letter").css("top", offset.top -50);
			$("#pop-letter").css("left", offset.left -120);
			$("#pop-letter").show();
			
		}
	});
})
	
//==============================弹出框关闭
$("#pop-letter #close").click(function(){
	$("#pop-letter").hide();
})
 
//================================信件删除
$("#letter-body .btn-del").click(function(){
	var index = $("#letter-body .btn-view").index($(this));
	//获取当前索引项的信件ID
	var id = $(".letterid").eq(index).html();
	$.getJSON("/percenter/letter.php?act=delete&id="+id, function(result){
		if (result.status == false){
			alert(result.msg);
		} else {
			alert(result.msg);
		}
	});
})

})
