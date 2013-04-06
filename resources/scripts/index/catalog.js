/**
 * Created with JetBrains PhpStorm.
 * User: 饭
 * Date: 13-3-26
 * Time: 下午4:59
 * To change this template use File | Settings | File Templates.
 */
function contactMe(fid){
    var form = document.getElementById(fid);
    var data = $(form).serialize();
    $.post('/welcome/contactme',data,function(){
         alert('谢谢提交信息')
    });

}