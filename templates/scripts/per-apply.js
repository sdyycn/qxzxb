//收藏夹相关操作
$(document).ready(function() {
//===============================全选状态下，任一复选框取消选中，控制全选的复选框则也取消选中；所有复选框同时选中时，控制全选的复选框则也被选中（联动）
$('[name=items]:checkbox').click(function(){    
	var flag = true;    
	$('[name=items]:checkbox').each(function(){   
		if (!this.checked){
		flag = false;   
		}
});
	
$('#checkedAll').attr('checked',flag); 
});

//===============================全选或反选
$("#checkedAll").click(function(){
	$('[name=items]:checkbox').attr("checked", this.checked);
})




//删除全部
$(".btn-delall").click(function(){
//获取需要删除的职位的收藏的ID
	var strid="";
	$('[name=items]:checkbox:checked').each(function(){   
		strid += $(this).val()+",";
	});
//ajax向后台传递要删除的收藏记录的ID

//相关请求代码
	alert('deleteAll');
})










})

//单个删除
$("#apply-body .btn-del").click(function(){
	//获取当前点击项的ID
	var index = $("#apply-body .btn-del").index($(this));
	var strid = $('[name=items]:checkbox').eq(index).val();
	//ajax向后台请求相关代码
	
	
	
	//相关请求代码
	
	
	
	
	
	
	
	
})
})                  
