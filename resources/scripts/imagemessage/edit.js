$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#imagemessageform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    $('.datepicker').datepicker();
});
function saveData(){
    var vadrst = $("#imagemessageform").validationEngine('validate');
    if(!vadrst)return;
    var sform = document.getElementById("imagemessageform");
    sform.action = "/imagemessage/saveupdate";
    sform.enctype="multipart/form-data";
    sform.target="dataFrame";
    sform.submit();
}

function validationCmp(form, status){
    return status;   
}       