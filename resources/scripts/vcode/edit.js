$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#vcodeform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    $('.datepicker').datepicker();
});
function saveData(){
    var vadrst = $("#vcodeform").validationEngine('validate');
    if(!vadrst)return;
    var sform = document.getElementById("vcodeform");
    sform.action = "/vcode/saveupdate";
    sform.enctype="multipart/form-data";
    sform.target="dataFrame";
    sform.submit();
}

function validationCmp(form, status){
    return status;   
}       