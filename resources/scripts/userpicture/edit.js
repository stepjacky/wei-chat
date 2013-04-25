$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#userpictureform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    $('.datepicker').datepicker();
});
function saveData(){
    var vadrst = $("#userpictureform").validationEngine('validate');
    if(!vadrst)return;
    var sform = document.getElementById("userpictureform");
    sform.action = "/userpicture/saveupdate";
    sform.enctype="multipart/form-data";
    sform.target="dataFrame";
    sform.submit();
}

function validationCmp(form, status){
    return status;   
}       