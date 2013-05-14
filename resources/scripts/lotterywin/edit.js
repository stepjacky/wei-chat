$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#lotterywinform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    $('.datepicker').datepicker();
});
function saveData(){
    var vadrst = $("#lotterywinform").validationEngine('validate');
    if(!vadrst)return;
    var sform = document.getElementById("lotterywinform");
    sform.action = "/lotterywin/saveupdate";
    sform.enctype="multipart/form-data";
    sform.target="dataFrame";
    sform.submit();
}

function validationCmp(form, status){
    return status;   
}       