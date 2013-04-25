function newOne(){
  	var url="/imagemessage/editNew";
  	window.showModalDialog(url,window);   
  	
}
function editOne(id){
    var url="/imagemessage/editNew/"+id;
    window.showModalDialog(url,window);
}
function removeOne(id){
    if(!confirm("确定要删除这条记录吗？"))return;
    var that = getEventSource();
    var url="/imagemessage/remove/"+id;
    $.post(url,function(){
        $(that).parent().parent().remove();
    });
}