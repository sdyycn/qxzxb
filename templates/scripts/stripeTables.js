/*
项目名称：EtherJobs
作者：宋佳杰
时间：2013-07-09
*/
//此函数用于表格斑马线化
function stripeTables(){
	if(!document.getElementsByTagName) return false;
	var tables = document.getElementsByTagName("table");
	var even, rows;
	for(var i=0; i<tables.length; i++){
		even = true;
		rows = tables[i].getElementsByTagName("tr");
		for(var j=0; j<rows.length; j++){
			if(even==true){
				//rows[j].style.backgroundColor = "#ffc";
				addClass(rows[j], "odd");
				even = false;
		}else{
			even = true;
			}
		}
	}
	alert("out");
}
addLoadEvent(stripeTables);