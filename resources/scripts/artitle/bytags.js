/**
 * Created with JetBrains PhpStorm.
 * User: 饭
 * Date: 13-1-20
 * Time: 上午12:32
 * To change this template use File | Settings | File Templates.
 */
$(function(){
    var $this =  $("a.artitle-tag-"+tidx).parent('li');
    var $sibs = $this.siblings('li');
    $.each($sibs,function(idx,item){
       $(item).removeClass('crumb');
    });
    $this.addClass('crumb');
});

