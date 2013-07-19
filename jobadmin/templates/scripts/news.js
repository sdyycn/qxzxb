/**
 * author: maweiguo
 * 
 */
 
 // use belowing function for debug.
function reloadJS(id, newJS){
	var oldjs = null;
	var t = null;
	var oldjs = document.getElementById(id);
	if (oldjs)
		oldjs.parentNode.removeChild(oldjs);
		
	var scriptObj = document.createElement("script");
	scriptObj.src = newJS;
	scriptObj.type = "text/Javascript";
	scriptObj.id   = id;
	document.getElementsByTagName("head")[0].appendChild(scriptObj);
}

$(document).ready(function(){
	
});

// remove HTML tags
function mask_HTMLCode(strInput) { 
	var myReg = "/<(\w+)>/; ";
	
	return strInput.replace(myReg, "&lt;$1&gt;"); 
} 

function checkemail(strEmail) { 
	var myReg = "/^[_a-z0-9]+@([_a-z0-9]+\.)+[a-z0-9]{2,3}$/"; 
	if(myReg.test(strEmail))
		return true; 
		
	return false; 
}

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

function type_add(){
	var typename = '';
	typename = $("#add_typename").val();
//	alert(typename);
	if (typename == '') {
		alert("类型名不能为空!");
		$("#add_typename").focus();
		
		return;
	} else {
		var dataString = "typename=" + typename;
//	alert(dataString);
		run_ajax("/jobadmin/news/newspage.php?act=type_add", dataString, type_add_handler);
	}
};

function type_add_handler(response){
//	alert(response);
	if (response.status == 'true') {
		alert("添加成功！");
		
		var col0 = '<td class="col0">' + response.id + "</td>";
		var col1 = '<td class="col1"><input type="text" id=' + response.id + ' size="30"  value=' + response.typename + ' /></td>';
		var col2 = '<td class="col2"><input type="button" class="btn2" onclick="type_edit(' + response.id + ')" value="修  改"  /></td>';
//		alert(col2);
		var col3 = '<td class="col3"><input type="button" class="btn2" onclick="type_delete(' + response.id + ',' + "'" + response.typename + "'" + ')"' + 'value="删  除" /></td>';
		var row = '<tr id="row_' + response.id + '">' + col0 + col1 + col2 + col3 + '</tr>';

		$("#t_type").append(row);

	} else {
		alert("添加失败!\n" + response.error);
		$("#add_typename").focus();
	}
}

function type_delete(id, typename){
	var msg = "确定删除此类型 ?\r\nID:\t" + id + "\r\n类型名:\t" + typename;

	if (confirm(msg)) {
		var dataString = "id=" + id;
	//	alert(dataString);
		run_ajax("/jobadmin/news/newspage.php?act=type_delete", dataString, type_delete_handler);
	}
}

function type_delete_handler(response){
	if (response.status == 'true') {
		alert("删除成功！");
		
		var id = response.id;
		$("#row_"+id).remove();
	} else {
		alert("删除失败！\n" + response.error);
	}
}

function type_edit(id){
	var name = $("#"+id).val();
	var dataString = "id=" + id + "&typename=" + name;
//	alert(dataString);
	run_ajax("/jobadmin/news/newspage.php?act=type_edit", dataString, type_edit_handler);
}

function type_edit_handler(response){
	if (response.status == 'true') {
		alert("修改成功！\n");
	} else {
		alert("修改失败！\n" + response.error);
	}
}

function news_delete(id, title) {
	var msg = "确定删除 ?\r\nID:\t" + id + "\r\n标题:\t" + title;

	if (confirm(msg)) {
		var dataString = "id=" + id;
	//	alert(dataString);
		run_ajax("/jobadmin/news/newspage.php?act=news_delete", dataString, news_delete_handler);
	}
}

function news_delete_handler(response) {
	if (response.status == 'true') {
		alert("删除成功");
		
		var id = response.id;
		$("#row_"+id).remove();
	} else {
		alert("删除失败！\n" + response.error);
	}
		
}

function news_edit(id) {
	window.location="/jobadmin/news/newspage.php?page=edit&id="+id;
}

function news_view(id) {
	window.location="/jobadmin/news/newspage.php?page=view&id="+id;
}

function news_add(){
	var title = $("#title");
	
	if (title == null  || title.val() == ""){
		alert("请输入标题!");
		title.focus();
		reutrn;
	}
	
	var author = $("#author");
	if (author == null || author.val() == "") {
		alert("请输入作者!");
		author.focus();
		reutrn;
	}
	
	var content = newsContent;
	if (content == null || content.getData() == "") {
		alert("请输入内容!");
		content.focus();
		return;
	}
	
	$("#newsaddform").submit();
}

function news_add_handler(response) {
	if (response.status == 'true') {
		alert("添加成功");
	} else {
		alert("添加失败！\n" + response.error);
	}
}