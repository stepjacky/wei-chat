$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#respnewsmessageform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    $('.datepicker').datepicker();
});
function saveData(){
    var vadrst = $("#respnewsmessageform").validationEngine('validate');
    if(!vadrst)return;
    var sform = document.getElementById("respnewsmessageform");
    sform.action = "/respnewsmessage/saveupdate";
    sform.enctype="multipart/form-data";
    sform.target="dataFrame";
    sform.submit();
}

function validationCmp(form, status){
    return status;   
}       