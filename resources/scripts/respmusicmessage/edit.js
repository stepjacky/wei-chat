$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#respmusicmessageform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    $('.datepicker').datepicker();
});
function saveData(){
    var vadrst = $("#respmusicmessageform").validationEngine('validate');
    if(!vadrst)return;
    var sform = document.getElementById("respmusicmessageform");
    sform.action = "/respmusicmessage/saveupdate";
    sform.enctype="multipart/form-data";
    sform.target="dataFrame";
    sform.submit();
}

function validationCmp(form, status){
    return status;   
}       