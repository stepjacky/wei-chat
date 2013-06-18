$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#respmusicmessageform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
   // $('.datepicker').datepicker();
});
function saveData(){
    var vadrst = $("#respmusicmessageform").validationEngine('validate');
    if(!vadrst)return;
    var data = $("#respmusicmessageform").serialize();
    var url  = "/respmusicmessage/saveupdate";
    $.post(url,data,function(html){
        eval(html);
    });
}

function validationCmp(form, status){
    return status;   
}       