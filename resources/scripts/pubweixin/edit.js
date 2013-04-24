$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#pubweixinform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    $('.datepicker').datepicker();
});
function saveData(){
    var vadrst = $("#pubweixinform").validationEngine('validate');
    if(!vadrst)return;
    var sform = document.getElementById("pubweixinform");
    sform.action = "/pubweixin/saveupdate";
    sform.enctype="multipart/form-data";
    sform.target="dataFrame";
    sform.submit();
}

function validationCmp(form, status){
    return status;   
}       