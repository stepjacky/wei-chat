$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#newsform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    $('.datepicker').datepicker();
});
function saveData(){
    var vadrst = $("#newsform").validationEngine('validate');
    if(!vadrst)return;
    var sform = document.getElementById("newsform");
    sform.action = "/news/saveupdate";
    sform.enctype="multipart/form-data";
    sform.target="dataFrame";
    sform.submit();
}

function validationCmp(form, status){
    return status;   
}       