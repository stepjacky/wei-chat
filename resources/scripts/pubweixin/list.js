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

function showConnector(weixin_id){
    var url = '/pubweixin/connector/'+weixin_id;
    $("#modalBody").load(url,{},function(){
        $("#myModal").modal("show");
    })
}

function managerMessage(weixin){
    var url="/message/setting/"+weixin;
    loadContent("content",url);
}
function managerMember(weixin){
    var url = "/member/list4wx/"+weixin;
    loadContent("content",url);

}