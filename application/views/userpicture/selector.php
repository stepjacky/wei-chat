<div class="tabbable"> <!-- Only required for left/right tabs -->
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab" onclick="loadPics();">所有图片</a></li>
        <li><a href="#tab2" data-toggle="tab" onclick="loadSearch();">搜索图片</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="plist">

        </div>

    </div>
</div>

<script type="text/javascript">
    var path='';

    function checkPath(pa){
        path = pa;
        window.returnValue = path;
    }


    function loadPics(){
        $("#plist").load('/userpicture/selector_list')
    }
    function loadSearch(){
        $("#plist").load('/userpicture/input')
    }

    window.returnValue = path;


</script>