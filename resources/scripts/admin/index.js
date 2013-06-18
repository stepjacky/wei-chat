/**
 * Created with JetBrains PhpStorm.
 * User: 饭
 * Date: 12-11-25
 * Time: 下午4:03
 * To change this template use File | Settings | File Templates.
 */



$(document).ready(function(){
   $("ul.nav li a.alink").bind("click",leftNavClick);
});

function leftNavClick(){

   if(!$(this).hasClass("alink")) return true;
   var url =  $(this).attr("link");

   loadContent("mcontent",url);
}

function loadContent(pid,url){
    $("#"+pid).load(url);
}