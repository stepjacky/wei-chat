$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#prerogativeform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    //$('.datepicker').datepicker();
});
function saveData(){
    var vadrst = $("#prerogativeform").validationEngine('validate');
    if(!vadrst)return;
    var data = $("#prerogativeform").serialize();
    var url  = "/prerogative/saveupdate";
    $.post(url,data,function(html){
         doPost("/cardcatalog/lists");
    });
}

function validationCmp(form, status){
    return status;   
}       