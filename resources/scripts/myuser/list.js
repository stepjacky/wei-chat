function newOne(){
  	var url="/myuser/editNew/-1/name";
  	window.showModalDialog(url,window);   
}
function editOne(id){
    var url="/myuser/editNew/"+id+"/name";
    window.showModalDialog(url,window);
}
function removeOne(id){
    if(!confirm("确定要删除这条记录吗？"))return;
    var that = this;
    var url="/myuser/remove/"+id+"/name";;
    $.post(url,function(){
        $(that).parent().parent().remove();
    });
}