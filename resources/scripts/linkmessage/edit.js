$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#linkmessageform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    $('.datepicker').datepicker();
});
function saveData(){
    var vadrst = $("#linkmessageform").validationEngine('validate');
    if(!vadrst)return;
    var sform = document.getElementById("linkmessageform");
    sform.action = "/linkmessage/saveupdate";
    sform.enctype="multipart/form-data";
    sform.target="dataFrame";
    sform.submit();
}

function validationCmp(form, status){
    return status;   
}       