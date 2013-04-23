function newOne(){
  	var url="/joinus/editNew";
  	window.showModalDialog(url,window);   
}
function editOne(id){
    var url="/joinus/editNew/"+id;
    window.showModalDialog(url,window);
}
function removeOne(id){
    if(!confirm("确定要删除这条记录吗？"))return;
    var that = getEventSource();
    var url="/joinus/remove/"+id;
    $.post(url,function(){
        $(that).parent().parent().remove();
    });
}