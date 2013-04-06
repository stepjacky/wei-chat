$(function(){
	$("#saveBtn").bind("click",saveData);
	$('.datepicker').datepicker();

});
function saveData(){
    var sform = document.getElementById("artitleform");
    sform.action = "/artitle/saveupdate";
    sform.enctype="multipart/form-data";
    sform.target="dataFrame";
    sform.submit();

}