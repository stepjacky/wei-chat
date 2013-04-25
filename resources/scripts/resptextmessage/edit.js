$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#resptextmessageform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    $('.datepicker').datepicker();
});
function saveData(){
    var vadrst = $("#resptextmessageform").validationEngine('validate');
    if(!vadrst)return;
    var sform = document.getElementById("resptextmessageform");
    sform.action = "/resptextmessage/saveupdate";
    sform.enctype="multipart/form-data";
    sform.target="dataFrame";
    sform.submit();
}

function validationCmp(form, status){
    return status;   
}       