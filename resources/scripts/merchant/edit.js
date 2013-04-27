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
    var data  = $("#merchantform").serialize();
    var url = "/merchant/saveUpdate";
    $.post(url,data,function(){
        confirm("用户资料已更新!");
    });


}

function validationCmp(form, status){
    return status;   
}       