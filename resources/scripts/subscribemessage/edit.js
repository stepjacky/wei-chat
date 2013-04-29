$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#subscribemessageform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    $('.datepicker').datepicker();
});
function saveData(){
    var vadrst = $("#subscribemessageform").validationEngine('validate');
    if(!vadrst)return;
    var sform = document.getElementById("subscribemessageform");
    var url   = "/subscribemessage/saveupdate";
    sform.enctype="multipart/form-data";
    var data  = $(sform).serialize();
    $.post(url,data,function(){
        alert("关注消息保存完毕");
    });
}

function validationCmp(form, status){
    return status;   
}       