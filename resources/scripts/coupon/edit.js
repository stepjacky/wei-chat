$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#couponform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    $('.datepicker').datepicker();
});
function saveData(){
    var vadrst = $("#couponform").validationEngine('validate');
    if(!vadrst)return;
    var sform = document.getElementById("couponform");
    sform.action = "/coupon/saveupdate";
    sform.enctype="multipart/form-data";
    sform.target="dataFrame";
    sform.submit();
}

function validationCmp(form, status){
    return status;   
}       