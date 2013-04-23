$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#merchantform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    $('.datepicker').datepicker();
});
function saveData(){
    var vadrst = $("#merchantform").validationEngine('validate');
    if(!vadrst)return;
    var sform = document.getElementById("merchantform");
    sform.action = "/merchant/saveupdate";
    sform.enctype="multipart/form-data";
    sform.target="dataFrame";
    sform.submit();
}

function validationCmp(form, status){
    return status;   
}       