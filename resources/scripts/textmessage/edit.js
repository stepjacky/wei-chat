$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#textmessageform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    $('.datepicker').datepicker();
});
function saveData(){
    var vadrst = $("#textmessageform").validationEngine('validate');
    if(!vadrst)return;
    var sform = document.getElementById("textmessageform");
    sform.action = "/textmessage/saveupdate";
    sform.enctype="multipart/form-data";
    sform.target="dataFrame";
    sform.submit();
}

function validationCmp(form, status){
    return status;   
}       