$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#cardcatalogform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    $('.datepicker').datepicker();
});
function saveData(){

    var vadrst = $("#cardcatalogform").validationEngine('validate');
    if(!vadrst)return;
    var data = $("#cardcatalogform").serialize();
    var url  = "/cardcatalog/saveupdate";
    $.post(url,data,function(html){
        eval(html);
    });

}

function validationCmp(form, status){
    return status;   
}       