function newOne(){
  	var url="/couponpolicy/editNew";
  	window.showModalDialog(url,window);   
}
function editOne(id){
    var url="/couponpolicy/editNew/"+id;
    window.showModalDialog(url,window);
}
function removeOne(id){
    if(!confirm("确定要删除这条记录吗？"))return;
    var that = getEventSource();
    var url="/couponpolicy/remove/"+id;
    $.post(url,function(){
        $(that).parent().parent().remove();
    });
}