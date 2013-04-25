/**
 * Created with JetBrains PhpStorm.
 * User: 饭
 * Date: 13-1-12
 * Time: 下午4:17
 * To change this template use File | Settings | File Templates.
 */
var setting = {
    async: {
        enable: true,
        url:"/phone/ztree",
        autoParam:["id"],
        otherParam:{"pictype":"phone"}

    },
    callback: {
        onClick: onClick
    }
};
var zNodes =[

    {
        id:"root",
        name:"所有手机品牌",
        isParent:true
    },
    {
        id:'artitle',
        name:'新闻图片',
        isParent:false
    },{
        id:'video',
        name:'视频图片',
        isParent:false
    },{
        id:'trends',
        name:'活动专题',
        isParent:false
    },{
        id:'spare',
        name:'手机配件',
        isParent:false
    },{
        id:'service',
        name:'售后服务',
        isParent:false
    }

];
var phone = null;
$(document).ready(function(){
    $.fn.zTree.init($("#phonetree"), setting,zNodes);
    $('#file_upload').uploadify({
        'buttonText' : '选择文件',
        'swf'      : '/resources/uploadify/uploadify.swf',
        'fileTypeDesc' : '图片文件',
        'fileTypeExts' : '*.gif; *.jpg; *.png',
        //'debug':true,
        'onUploadStart' : function(file) {
            if(phone==null){
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
    phone = treeNode.id;
    $('#file_upload').uploadify('settings','uploader','/picture/add_picture/'+phone);
    $("#mythumb").load("/picture/thumbnails/"+phone);
}