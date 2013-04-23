$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#cardsform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    $('.datepicker').datepicker();
});
function saveData(){
    var vadrst = $("#cardsform").validationEngine('validate');
    if(!vadrst)return;
    var sform = document.getElementById("cardsform");
    sform.action = "/cards/saveupdate";
    sform.enctype="multipart/form-data";
    sform.target="dataFrame";
    sform.submit();
}

function validationCmp(form, status){
    return status;   
}       