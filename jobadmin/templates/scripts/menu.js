// JavaScript Document
	window.onload=function(){showdd(0);}
	function showdd(mydl){//显示指定DL下的DD
	var alldl=document.getElementsByTagName("dl");
	var thedt=alldl[mydl].getElementsByTagName("dt");thedt[0].className="dtjian";
	var thedd=alldl[mydl].getElementsByTagName("dd");
	for (ii=0;ii<thedd.length;ii++){thedd[ii].style.display="block";}
	}
	function hidd(){//隐藏所有DD
	var alldd = document.getElementsByTagName("dd");
	for (i=0;i<alldd.length;i++){
    alldd[i].style.display="none";}
	}
	//function showjia(strtype2){strtype2.className="";}//显示+号背景
	//function showjia(strtype2){strtype2.className="dtjian";}//显示-号背景
    function show(strtype){
	if (strtype.className=="dtjian"){ strtype.className="";hidd();}
	else{
	hidd();//隐藏所有DD
	var alldt = document.getElementsByTagName("dt");
	for (i=0;i<alldt.length;i++){
    alldt[i].className="";}
    strtype.className="dtjian";
	for (i=0;i<alldt.length;i++){if (strtype==alldt[i]){showdd(i);}}

	}
    }