function newOne(){
  	var url="/textmessage/editNew";
  	window.showModalDialog(url,window);   
  	
}
function editOne(id){
    var url="/textmessage/editNew/"+id;
    window.showModalDialog(url,window);
}
function removeOne(id){
    if(!confirm("确定要删除这条记录吗？"))return;
    var that = getEventSource();
    var url="/textmessage/remove/"+id;
    $.post(url,function(){
        $(that).parent().parent().remove();
    });
}