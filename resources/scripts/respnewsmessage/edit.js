$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#respnewsmessageform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });

});
function saveData(){
    var vadrst = $("#respnewsmessageform").validationEngine('validate');
    if(!vadrst)return;
    var data = $("#respnewsmessageform").serialize();
    var url  = "/respnewsmessage/saveupdate";
    $.post(url,data,function(html){
        eval(html);
    })

}

function validationCmp(form, status){
    return status;   
}




function selectNews(ulid){
    var selurl = '/news/selector';
    var news = window.showModalDialog(selurl);
    if(news==null)return;
    $.each(news,function(i,item){
        if(item){

            var field   = $("<input type='hidden' name='newslist[]' />").val(item.id);
            var btn   = $("<button type='button' onclick='removeNews(this)' class='btn btn-info'></button>").text(item.name);
            $("#"+ulid).append(field);
            $("#"+ulid).append(btn);

        }
    })
}


function removeNews(self){
    $(self).parent().remove();
}