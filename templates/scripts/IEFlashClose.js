// JavaScript Document

try {
    document.execCommand("BackgroundImageCache", false, true);
} catch(err) {}


function(){
   
    var m = document.uniqueID
    && document.compatMode
    && !window.XMLHttpRequest
    && document.execCommand;
  
    try{
        if(!!m){
            m("BackgroundImageCache", false, true)
        }
      
    }catch(oh){};
    }