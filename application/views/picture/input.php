<link rel="stylesheet" href="/resources/zTree/css/zTreeStyle/zTreeStyle.css" type="text/css" />
<script type="text/javascript" src="/resources/zTree/js/jquery.ztree.core-3.5.js"></script>
<form class="form-inline">
    <label>按类别</label>
    <input type="text" class="input-large" id='ptree' onclick="showZtree(this.id)" placeholder="选择类别" readonly="readonly" />
    <label>按名称</label>
    <input type="text" class="input-large" placeholder="名称关键字" id="key"  />

    <button type="button" class="btn btn-success" onclick="search()">
        <i class="icon-search icon-2x"></i>

    </button>
</form>
<div id="piclist">
<ul id="mythumb" class="thumbnails">


</ul>
</div>
<div id="menuContent" style="display: none;background-color: #b9b9b9; position: absolute;">
    <ul class="ztree" id="phonetree">


    </ul>
</div>
<script type="text/javascript">
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
        }

    ];

    $(document).ready(function(){
        $.fn.zTree.init($("#phonetree"), setting,zNodes);

    });

    function showZtree(id) {
        var cityObj = $("#"+id);
        var cityOffset = cityObj.offset();
        $("#menuContent").css({
            left:(cityOffset.left) + "px",
            top:cityOffset.top + (cityObj.outerHeight()) + "px"
        }).slideDown("fast");
        $("#menuContent").width(cityObj.width()+15);
        $("body").bind("mousedown", onBodyDown);
    }
    function hideMenu() {
        $("#menuContent").fadeOut("fast");
        $("body").unbind("mousedown", onBodyDown);
    }
    function onBodyDown(event) {
        if (!(event.target.id == "menuBtn" || event.target.id == "menuContent" || $(event.target).parents("#menuContent").length>0)) {
            hideMenu();
        }
    }
    function onClick(event, treeId, treeNode, clickFlag) {
        if(treeNode.isParent) return;
        $("#mythumb").load("/picture/selector_thumbnails/"+treeNode.id);
        hideMenu();
    }

    function search(){
        var key= $("#key").val();
        if(key=='') return;
        $.post('/picture/search/'+key,'fields=name',function(data){
           $("#piclist").html(data);
        });

    }
</script>
