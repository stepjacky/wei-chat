$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#prerogativeform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    $('.datepicker').datepicker();
});
function saveData(){
    var vadrst = $("#prerogativeform").validationEngine('validate');
    if(!vadrst)return;
    var sform = document.getElementById("prerogativeform");
    sform.action = "/prerogative/saveupdate";
    sform.enctype="multipart/form-data";
    sform.target="dataFrame";
    sform.submit();
}

function validationCmp(form, status){
    return status;   
}       