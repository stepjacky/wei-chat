$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#creditsform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    $('.datepicker').datepicker();
});
function saveData(){
    var vadrst = $("#creditsform").validationEngine('validate');
    if(!vadrst)return;
    var sform = document.getElementById("creditsform");
    sform.action = "/credits/saveupdate";
    sform.enctype="multipart/form-data";
    sform.target="dataFrame";
    sform.submit();
}

function validationCmp(form, status){
    return status;   
}       