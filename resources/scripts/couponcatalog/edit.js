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
    var sform = document.getElementById("couponcatalogform");
    sform.action = "/couponcatalog/saveupdate";
    sform.enctype="multipart/form-data";
    sform.target="dataFrame";
    sform.submit();
}

function validationCmp(form, status){
    return status;   
}       