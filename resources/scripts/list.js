/**
 * Created with JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-12
 * Time: 下午4:20
 * To change this template use File | Settings | File Templates.
 */

$(function(){
    $("div.pagination ul li a").bind("click",function(){
        var link = $(this).attr("link");

        if(!link)return;
        doPost(link);
    });
    $("tbody tr td label ").tooltip();
    $("tbody tr td label").bind('click',function(){
         var title = $(this).attr('title');
         //copyToClipboard(title);

    });
    $("tbody tr td button.youku").bind('click',function(){
        var url = $(this).attr('youku');
        window.showModalDialog(url);
    });
});

function setPicture(domain,pname,id){
    var ps = window.showModalDialog('/picture/selector');

    if(ps==null || ps=='' || ps==undefined) return;
    var url = '/'+domain+'/update_picture/'+pname+'/'+id ;

    $.post(url,'path='+ps,function(){
        alert('配图更新完毕!');
    })
}

function setPictureExtra(domain,pkname,pkval,field){
    var ps = window.showModalDialog('/picture/selector');

    if(ps==null || ps=='' || ps==undefined) return;
    var url = '/'+domain+'/update_picture_extra/'+pkname+'/'+pkval+'/'+field;

    $.post(url,'path='+ps,function(){
        alert('配图更新完毕!');
    })
}

function toggleProp(domain,prop,id){
    var url = '/'+domain+'/toggle/'+prop+'/'+id;
    $.post(url);
}
