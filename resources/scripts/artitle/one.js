/**
 * Created with JetBrains PhpStorm.
 * User: 饭
 * Date: 13-1-19
 * Time: 上午9:54
 * To change this template use File | Settings | File Templates.
 */


$(function(){

    $("div.btn-group button").bind("click",langClick);


});


function langClick(evt){
    var $that = $(evt.target);
    var btns = $that.siblings("button");
    $.each(btns,function(idx,item){
        if($(item).hasClass("btn-success")){
           $(item).removeClass("btn-success");
           $(item).addClass("btn-info");
        }
    });
    $that.removeClass("btn-info");
    $that.addClass("btn-success");
    var aid = $that.attr('aid');
    var lang = $that.attr('lang');
    $("#detail").load('artitle/one_info/'+aid+"/"+lang);
}

function editOne(id,lang){
    window.showModalDialog('artitle/edit_one_info/'+id+'/'+lang,window,'dialogWidth=500px;dialogHeight=400px;resizable=yes;maximize=yes');
}
