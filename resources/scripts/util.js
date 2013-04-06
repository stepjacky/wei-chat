/**
 * Created by JetBrains PhpStorm.
 * User: 汉图
 * Date: 12-2-28
 * Time: 下午10:44
 * To change this template use File | Settings | File Templates.
 */
function doPost(url,data){

    if(!data)data='';
    url=url+"?ds="+new Date();
    $.post(url,data,function(msg){
        $("#main-panel").empty();
        //if(typeof(console)!='undefined') console.log(msg);
        $("#main-panel").html(msg);
    });
}


function getEvent(){
    if(window.event){
        return window.event;
    }
    var f = arguments.callee.caller;
    do{
        var e = f.arguments[0];
        if(e && (e.constructor === Event || e.constructor===MouseEvent || e.constructor===KeyboardEvent)){
            return e;
        }
    }while(f=f.caller);
}

function getEventSource(){
    var e = getEvent();
    if(e.srcElement) return e.srcElement;
    return e.target;
}
