$(function(){
	 $("#saveBtn").bind("click",saveData);
	
    $("#respnewsmessageform").validationEngine('attach'
                    , {
                          onValidationComplete: validationCmp 
                      });
    $('.datepicker').datepicker();
});
function saveData(){
    var vadrst = $("#respnewsmessageform").validationEngine('validate');
    if(!vadrst)return;
    var sform = document.getElementById("respnewsmessageform");
    sform.action = "/respnewsmessage/saveupdate";
    sform.enctype="multipart/form-data";
    sform.target="dataFrame";
    sform.submit();
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
            var dcnt    = $("<div></div>");
            var field   = $("<input type='hidden' name='newslist[]' />").val(item.id);
            var btn   = $("<button type='button' onclick='removeNews(this)' class='btn btn-danger'></button>").text(item.name+"X");
            dcnt.append(field).append(btn).append("<br/>");
            $("#"+ulid).append(dcnt);
        }
    })
}


function removeNews(self){
    $(self).parent().remove();
}