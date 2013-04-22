/**
 * Created with JetBrains PhpStorm.
 * User: 饭
 * Date: 12-11-25
 * Time: 下午4:03
 * To change this template use File | Settings | File Templates.
 */
var curMenu = null, zTree_Menu = null;
var setting = {
    view: {
        showLine: false,
        showIcon: true,
        selectedMulti: false,
        dblClickExpand: false,
        addDiyDom: addDiyDom
    },
    data: {
        simpleData: {
            enable: true
        }
    },
    callback: {
        beforeClick: beforeClick,
        onClick: onClick
    }
};

var zNodes =[
    { id:1, pId:0, name:"应用领域"},
    { id:11, pId:1, name:"纺织"},
    { id:111, pId:11, name:"纯金属纤维线"},
    { id:112, pId:11, name:"金属纤维混纺纱"},
    { id:12, pId:1, name:"汽车"},
    { id:121, pId:12, name:"柴油机尾气过滤"},
    { id:122, pId:12, name:"汽车座椅加热"},
    { id:123, pId:12, name:"汽车安全气囊"},
    { id:13, pId:1, name:"设备"},
    { id:131, pId:13, name:"燃烧器"},
    { id:132, pId:13, name:"喷墨打印机"},
    { id:14, pId:1, name:"化工"},
    { id:141, pId:14, name:"煤化工"},
    { id:142, pId:14, name:"稠化器"},
    { id:15, pId:1, name:"化纤"},
    { id:16, pId:1, name:"粘胶"},
    { id:17, pId:1, name:"导电塑料"},
    { id:18, pId:1, name:"太阳能"},
    { id:19, pId:1, name:"电子"},
    { id:1110, pId:1, name:"玻璃"},
    { id:1111, pId:1, name:"医药"},
    { id:1112, pId:1, name:"冶金"},
    { id:2, pId:0, name:"产品信息"},
    { id:21, pId:2, name:"金属纤维"},
    { id:211, pId:21, name:"不锈钢纤维"},
    { id:212, pId:21, name:"铁烙铝纤维"},
    { id:213, pId:21, name:"镍纤维"},
    { id:214, pId:21, name:"哈氏合金纤维"},
    { id:215, pId:21, name:"锆纤维"},
   // { id:216, pId:21, name:"压花纤维"},
    { id:22, pId:2, name:"金属纤维毡"},
    { id:221, pId:22, name:"不锈钢纤维烧结毡"},
    { id:222, pId:22, name:"铁铬铝纤维烧结毡"},
    //{ id:223, pId:22, name:"非烧结毡"},
    { id:224, pId:22, name:"针刺毡"},
    { id:225, pId:22, name:"水刺毡"},
    { id:23, pId:2, name:"多层金属烧结网"},
    { id:231, pId:23, name:"五层金属烧结网"},
    { id:232, pId:24, name:"六层金属烧结网"}, //新加
    { id:24, pId:2, name:"金属纤维制品"},
    { id:241, pId:24, name:"金属纤维毡滤芯"},
    { id:242, pId:24, name:"多层金属烧结滤芯"},
    { id:243, pId:24, name:"过滤碟片"},
    { id:244, pId:24, name:"高温气体除尘滤袋"},
    { id:245, pId:24, name:"太阳能回热器网芯"},
    { id:246, pId:24, name:"多层网片式过滤器"},
    { id:247, pId:24, name:"燃烧用编织网"},
    { id:3, pId:0, name:"技术研发"},
    { id:31, pId:3, name:"研发平台"},
    { id:311, pId:31, name:"多孔材料国家实验室"},
    { id:312, pId:31, name:"国家实验室认可的理化检测中心"},
    { id:313, pId:31, name:"公司市级技术中心"},
    { id:32, pId:3, name:"拥有技术"},
    { id:321, pId:32, name:"金属纤维技术"},
    { id:322, pId:32, name:"金属纤维毡技术"},
    { id:323, pId:32, name:"金属烧结网技术"},
    { id:324, pId:32, name:"各种滤器的设计及加工技术"},
    { id:33, pId:3, name:"研发项目、课题及专利"},
    { id:331, pId:33, name:"研发项目"},
    { id:332, pId:33, name:"研发课题"},
    { id:333, pId:33, name:"获得专利"},
    { id:4, pId:0, name:"质量控制"},
    { id:41, pId:4, name:"质量方针"},
    { id:42, pId:4, name:"ISO 9000质量管理体系"},
    { id:43, pId:4, name:"严格分析检测体系"},
    { id:44, pId:4, name:"严格过程控制"},
    { id:5, pId:0, name:"公司概况"},
    { id:51, pId:5, name:"公司简介"},
    { id:52, pId:5, name:"发展历程"},
    { id:53, pId:5, name:"企业文化"},
    { id:54, pId:5, name:"企业荣誉"},
    { id:55, pId:5, name:"领导关怀"},
    { id:56, pId:5, name:"社会责任"},
    { id:561, pId:56, name:"节能与环保"},
    { id:562, pId:56, name:"健康与安全"},
    { id:57, pId:5, name:"企业宣传册"},
    { id:6, pId:0, name:"联系方式"},
    { id:61, pId:6, name:"关于我们"},
    { id:62, pId:6, name:"网站地图"},
    { id:63, pId:6, name:"常见问题"}
];

function addDiyDom(treeId, treeNode) {
    var spaceWidth = 5;
    var switchObj = $("#" + treeNode.tId + "_switch"),
        icoObj = $("#" + treeNode.tId + "_ico");
    switchObj.remove();
    icoObj.before(switchObj);

    if (treeNode.level > 1) {
        var spaceStr = "<span style='display: inline-block;width:" + (spaceWidth * treeNode.level)+ "px'></span>";
        switchObj.before(spaceStr);
    }
}

function beforeClick(treeId, treeNode) {
    /*if (treeNode.level == 0 ) {
        var zTree = $.fn.zTree.getZTreeObj("treeDemo");
        zTree.expandNode(treeNode);
        return false;
    }*/
    return true;
}

function onClick(event, treeId, treeNode, clickFlag){
    var url="artitle/one/"+treeNode.id;

    $.get(url,function(html){
        $("#mainArea").html(html);
    });
}

$(document).ready(function(){
    /*
    var treeObj = $("#artTree");
    $.fn.zTree.init(treeObj, setting, zNodes);
    zTree_Menu = $.fn.zTree.getZTreeObj("artTree");
    curMenu = zTree_Menu.getNodes()[0].children[0].children[0];
    zTree_Menu.selectNode(curMenu);
    treeObj.addClass("showIcon");
    treeObj.hover(function () {
        if (!treeObj.hasClass("showIcon")) {
            treeObj.addClass("showIcon");
        }
    }, function() {
        treeObj.removeClass("showIcon");
    });*/
});