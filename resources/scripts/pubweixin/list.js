function newOne(){
  	var url="/pubweixin/editNew";
  	window.showModalDialog(url,window);   
  	
}
function editOne(id){
    var url="/pubweixin/editNew/"+id;
    window.showModalDialog(url,window);
}
function removeOne(id){
    if(!confirm("确定要删除这条记录吗？"))return;
    var that = getEventSource();
    var url="/pubweixin/remove/"+id;
    $.post(url,function(){
        $(that).parent().parent().remove();
    });
}

function showInterface(weixin_id){

}