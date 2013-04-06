/**
 * Created with JetBrains PhpStorm.
 * User: 饭
 * Date: 12-12-20
 * Time: 下午10:36
 * To change this template use File | Settings | File Templates.
 */
var i=-1;
var offset = 4000;
var timer = null;
function autoroll(){
    n = $(".parts_flash dt span").length-1;
    i++;
    if(i > n){
        i = 0;
    }
    slide(i);
    timer = window.setTimeout(autoroll, offset);
}
function slide(i){
    $(".parts_flash dt span").eq(i).addClass("crumb").siblings().removeClass("crumb");
    $(".parts_flash dd").eq(i).addClass("block").siblings().removeClass("block");
}
function hookThumb(){
    $(".parts_flash dt span").hover(function () {
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
    $(".parts_flash dd").hover(function () {
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

$(function(){

    $("div.parts_nav ul li").hover(
        function(){
           $(this).children("div").fadeIn();
        },
        function(){
           $(this).children("div").fadeOut();
        }
    );

    $(".parts_flash dt span:first").addClass("crumb");
    $(".parts_flash dd:first").addClass("block");
    autoroll();
    hookThumb();


});
