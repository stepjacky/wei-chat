var i=-1;
var offset = 5000; 
var timer = null;
function autoroll(){
	n = $(".vip_flash dt span").length-1;
	i++;
	if(i > n){
		i = 0;
	}
	slide(i);
	timer = window.setTimeout(autoroll, offset);
}
function slide(i){
	$(".vip_flash dt span").eq(i).addClass("crumb").siblings().removeClass("crumb");
	$(".vip_flash dd").eq(i).addClass("block").siblings().removeClass("block");
}
function hookThumb(){    
	$(".vip_flash dt span").hover(function () {
		if (timer) {
			clearTimeout(timer);
		i = $(this).prevAll().length;
		 slide(i); 
		}
	},function () {
  		timer = window.setTimeout(autoroll, offset);  
		this.blur();            
		return false;
	}); 
}
$(document).ready(function(){
	$(".vip_flash dt span:first").addClass("crumb");
	$(".vip_flash dd:first").addClass("block");
	autoroll();
	hookThumb();
});