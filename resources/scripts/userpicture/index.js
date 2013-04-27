/**
 * Created with JetBrains PhpStorm.
 * User: 饭
 * Date: 13-1-12
 * Time: 下午4:17
 * To change this template use File | Settings | File Templates.
 */
var setting = {
    /*async: {
        enable: true,
        url:"/phone/ztree",
        autoParam:["id"],
        otherParam:{"pictype":"phone"}

    },*/
    callback: {
        onClick: onClick
    }
};
var zNodes =[

    {
        id:"root",
        name:"所有图片",
        isParent:false,
        children:[
            {
                id:'news',
                name:'消息图片',
                isParent:false
            }
        ]
    }


];
var ptype = null;
$(document).ready(function(){
    $.fn.zTree.init($("#phonetree"), setting,zNodes);
    $('#file_upload').uploadify({
        'buttonText' : '选择文件',
        'swf'      : '/resources/uploadify/uploadify.swf',
        'fileTypeDesc' : '图片文件',
        'fileTypeExts' : '*.gif; *.jpg; *.png',
        // 'debug':true,
        'onUploadStart' : function(file) {
            if(ptype==null){
                $('#file_upload').uploadify("stop");
                $('#file_upload').uploadify("cancel","*");
                alert("请选择图片分类");
            }
        }
        // Put your options here
    });


});


function onClick(event, treeId, treeNode, clickFlag) {
    if(treeNode.isParent) return;
    ptype = treeNode.id;
    $('#file_upload').uploadify('settings','uploader','/userpicture/add_picture/'+ptype+"/"+mert);
    $("#mythumb").load("/userpicture/thumbnails/"+ptype+"/"+mert);
}