function newOne(){
  	var url="/subscribemessage/editNew";
  	window.showModalDialog(url,window);   
  	
}
function editOne(id){
    var url="/subscribemessage/editNew/"+id;
    window.showModalDialog(url,window);
}
function removeOne(id){
    if(!confirm("确定要删除这条记录吗？"))return;
    var that = getEventSource();
    var url="/subscribemessage/remove/"+id;
    $.post(url,function(){
        $(that).parent().parent().remove();
    });
}