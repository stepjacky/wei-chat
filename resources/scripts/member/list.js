function newOne(){
  	var url="/member/editNew";
  	window.showModalDialog(url,window);   
  	
}
function editOne(id){
    var url="/member/editNew/"+id;
    window.showModalDialog(url,window);
}
function removeOne(id){
    if(!confirm("确定要删除这条记录吗？"))return;
    var that = getEventSource();
    var url="/member/remove/"+id;
    $.post(url,function(){
        $(that).parent().parent().remove();
    });
}