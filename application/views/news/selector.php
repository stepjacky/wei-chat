<div style="margin-bottom: 18px;" class="tabbable">
    <ul class="nav nav-tabs">

        <li class="active"><a data-toggle="tab" href="javascript:;" onclick="loadAll()">所有消息</a></li>
        <li><a data-toggle="tab" href="javascript:;">查询消息</a></li>

    </ul>
    <div id="newslist" class="tab-pane">

    </div>
</div>
<div id="selnews"></div>

<script type="text/javascript">
    var news = {};
    var selected = [];
    function loadAll(){
        var url='/news/list_with_paged';
        $("#newslist").load(url);
    }


    function checkitems(id,name,self){

        news[id] = {'name':name,checked:$(self).prop('checked')};

        $("#selnews").empty();



        $.each(news,function(pid,item){
            var checked = item.checked;

            if(checked){
                var btn = $("<button class='btn' pid='"+pid+"'><i class='icon-remove-circle'></i></button>");
                btn.append(item.name);
                btn.bind('click',function(){
                    news[pid] = undefined;
                    $(this).remove();
                });
                $("#selnews").append(btn);
            }
        });

        selected = [];
        $.each(news,function(pid,item){
            var checked = item.checked;
            if(checked){
                selected.push({id:pid,name:item.name});
            }
        });



        window.returnValue = selected==null?'':selected;
    }

    function print(msg){
        if(console)
            console.log(msg);
    }


    loadAll();
</script>