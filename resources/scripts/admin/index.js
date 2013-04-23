/**
 * Created with JetBrains PhpStorm.
 * User: 饭
 * Date: 12-11-25
 * Time: 下午4:03
 * To change this template use File | Settings | File Templates.
 */



$(document).ready(function(){
   $("ul.leftnav li a.ajax-link").bind("click",leftNavClick);
});

function leftNavClick(){
   var url =  $(this).attr("link");
    loadContent("content",url);
}

function loadContent(pid,url){
    $("#"+pid).load(url);
}