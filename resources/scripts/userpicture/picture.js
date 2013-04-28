/**
 * Created with JetBrains PhpStorm.
 * User: 饭
 * Date: 13-4-24
 * Time: 上午10:57
 * To change this template use File | Settings | File Templates.
 */

var imgpath='';
function  imageSelector(imgid,fieldid){
    imgpath = window.showModalDialog('/userpicture/selector');
    $("#"+imgid).attr("src",imgpath);
    $("#"+fieldid).val(imgpath);
}

