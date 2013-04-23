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
    var sform = document.getElementById("cardcatalogform");
    sform.action = "/cardcatalog/saveupdate";
    sform.enctype="multipart/form-data";
    sform.target="dataFrame";
    sform.submit();
}

function validationCmp(form, status){
    return status;   
}       