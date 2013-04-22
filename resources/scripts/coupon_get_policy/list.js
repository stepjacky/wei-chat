function newOne(){
  	var url="/coupon_get_policy/editNew";
  	window.showModalDialog(url,window);   
}
function editOne(id){
    var url="/coupon_get_policy/editNew/"+id;
    window.showModalDialog(url,window);
}
function removeOne(id){
    if(!confirm("确定要删除这条记录吗？"))return;
    var that = getEventSource();
    var url="/coupon_get_policy/remove/"+id;
    $.post(url,function(){
        $(that).parent().parent().remove();
    });
}