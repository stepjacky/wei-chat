$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#messageform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    $('.datepicker').datepicker();
});
function saveData(){
    var vadrst = $("#messageform").validationEngine('validate');
    if(!vadrst)return;
    var sform = document.getElementById("messageform");
    sform.action = "/message/saveupdate";
    sform.enctype="multipart/form-data";
    sform.target="dataFrame";
    sform.submit();
}

function validationCmp(form, status){
    return status;   
}       