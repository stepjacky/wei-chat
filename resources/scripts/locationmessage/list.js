function newOne(){
  	var url="/locationmessage/editNew";
  	window.showModalDialog(url,window);   
  	
}
function editOne(id){
    var url="/locationmessage/editNew/"+id;
    window.showModalDialog(url,window);
}
function removeOne(id){
    if(!confirm("确定要删除这条记录吗？"))return;
    var that = getEventSource();
    var url="/locationmessage/remove/"+id;
    $.post(url,function(){
        $(that).parent().parent().remove();
    });
}