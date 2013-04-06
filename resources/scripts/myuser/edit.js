$(function(){
	$("#saveBtn").bind("click",saveData);
	$('.datepicker').datepicker();

});
function saveData(){
    var sform = document.getElementById("myuserform");
    sform.action = "/myuser/saveupdate";
    sform.enctype="multipart/form-data";
    sform.target="dataFrame";
    sform.submit();
}