$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#newsform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
   // $('.datepicker').datepicker();
});
function saveData(){
    var vadrst = $("#newsform").validationEngine('validate');
    if(!vadrst)return;
    var da = $("#newsform").serializeArray();
    $.each(da,function(i,field){
       if(field['name']=='content'){
           field['value'] = CKEDITOR.instances.content.getData();
           return;
       }
    });
    var url  = "/news/saveupdate";
    var data = $.param(da);
    $.post(url,data,function(html){
        eval(html);
    });
}

function validationCmp(form, status){
    return status;   
}

function useLotteryUrl(id){
    $.get('/lotterydial/current_url',function(url){
       $("#"+id).text(url);
    });
}