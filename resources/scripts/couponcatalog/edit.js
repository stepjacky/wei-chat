$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#couponcatalogform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    $('.datepicker').datepicker();
});
function saveData(){

    var vadrst = $("#couponcatalogform").validationEngine('validate');
    if(!vadrst)return;
    var data = $("#couponcatalogform").serialize();
    var url  = "/couponcatalog/saveupdate";
    $.post(url,data,function(html){
        eval(html);
    });
}

function validationCmp(form, status){
    return status;   
}       