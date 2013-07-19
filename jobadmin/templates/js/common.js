/**
 * author: maweiguo
 */

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

function browserWidth(){
	var w=window.innerWidth
	|| document.documentElement.clientWidth
	|| document.body.clientWidth;
}

function browserHeight(){
	var h = window.innerHeight
	|| document.documentElement.clientHeight
	|| document.body.clientHeight;
}

function screenWidth(){
	var w = screen.width;
}

function screenHeight(){
	var w = screen.height;
}

function screenAvailWidth(){
	var w = screen.availWidth;
}

function screenAvailHeight(){
	var w = screen.availHeight;
}

// Cookie example, setCookie, getCookie, checkCookie
function setCookie(c_name,value,expiredays)
{
	var exdate=new Date()
	exdate.setDate(exdate.getDate()+expiredays)
	document.cookie=c_name+ "=" +escape(value)+
	((expiredays==null) ? "" : ";expires="+exdate.toGMTString())
}

function getCookie(c_name)
{
	if (document.cookie.length>0)
	  {
	  c_start=document.cookie.indexOf(c_name + "=")
	  if (c_start!=-1)
	    { 
	    c_start=c_start + c_name.length+1 
	    c_end=document.cookie.indexOf(";",c_start)
	    if (c_end==-1) c_end=document.cookie.length
	    return unescape(document.cookie.substring(c_start,c_end))
	    } 
	  }
	return ""
}

function checkCookie()
{
username=getCookie('username')
if (username!=null && username!="")
  {alert('Welcome again '+username+'!')}
else 
  {
  username=prompt('Please enter your name:',"")
  if (username!=null && username!="")
    {
    setCookie('username',username,365)
    }
  }
}
