$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#lotterydialform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    $('.datepicker').datepicker();
});
function saveData(){

    var vadrst = $("#lotterydialform").validationEngine('validate');
    if(!vadrst)return;
    var data = $("#lotterydialform").serialize();
    var url  = "/lotterydial/saveupdate";
    $.post(url,data,function(html){
        eval(html);
    });

}

function validationCmp(form, status){
    return status;   
}       