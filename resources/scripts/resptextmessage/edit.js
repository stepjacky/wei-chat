$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#resptextmessageform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
});
function saveData(){
    var vadrst = $("#resptextmessageform").validationEngine('validate');
    if(!vadrst)return;
    var data = $("#resptextmessageform").serialize();
    var url = "/resptextmessage/saveupdate";
    $.post(url,data,function(html){
        eval(html);
    });
}

function validationCmp(form, status){
    return status;   
}       