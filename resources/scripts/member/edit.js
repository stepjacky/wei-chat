$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#memberform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    $('.datepicker').datepicker();
});
function saveData(){
    var vadrst = $("#memberform").validationEngine('validate');
    if(!vadrst)return;
    var sform = document.getElementById("memberform");
    sform.action = "/member/saveupdate";
    sform.enctype="multipart/form-data";
    sform.target="dataFrame";
    sform.submit();
}

function validationCmp(form, status){
    return status;   
}       