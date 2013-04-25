$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#locationmessageform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    $('.datepicker').datepicker();
});
function saveData(){
    var vadrst = $("#locationmessageform").validationEngine('validate');
    if(!vadrst)return;
    var sform = document.getElementById("locationmessageform");
    sform.action = "/locationmessage/saveupdate";
    sform.enctype="multipart/form-data";
    sform.target="dataFrame";
    sform.submit();
}

function validationCmp(form, status){
    return status;   
}       