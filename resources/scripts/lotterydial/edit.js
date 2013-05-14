$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#lotterydialform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    $('.datepicker').datepicker();
});
function saveData(){
    var vadrst = $("#lotterydialform").validationEngine('validate');
    if(!vadrst)return;
    var sform = document.getElementById("lotterydialform");
    sform.action = "/lotterydial/saveupdate";
    sform.enctype="multipart/form-data";
    sform.target="dataFrame";
    sform.submit();
}

function validationCmp(form, status){
    return status;   
}       