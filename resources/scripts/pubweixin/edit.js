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
    var data = $("#pubweixinform").serialize();
    var url  = "/pubweixin/saveupdate";
    $.post(url,data,function(html){
        eval(html);
    });

}

function validationCmp(form, status){
    return status;   
}       