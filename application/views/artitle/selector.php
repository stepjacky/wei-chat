<div style="margin-bottom: 18px;" class="tabbable">
    <ul class="nav nav-tabs">

        <li class="active"><a data-toggle="tab" href="javascript:;" onclick="loadAll()">全部文章</a></li>
        <li><a data-toggle="tab" href="javascript:;">查询文章</a></li>

    </ul>
    <div id="phones" class="tab-pane">

    </div>
</div>
<div id="selphones"></div>

<script type="text/javascript">
    var phones = {};
    var selected = [];
    function loadAll(){
        var url='/artitle/list_with_paged';
        $("#phones").load(url);
    }


    function checkphone(id,name,self){

        phones[id] = {'name':name,checked:$(self).attr('checked')};

        $("#selphones").empty();

        $.each(phones,function(pid,item){
            var checked = item.checked;
            if(checked){
                var btn = $("<button class='btn' pid='"+pid+"'><i class='icon-remove-circle'></i></button>");
                btn.append(item.name);
                btn.bind('click',function(){
                    phones[pid] = undefined;
                    $(this).remove();
                });
                $("#selphones").append(btn);
            }
        });

        selected = [];
        $.each(phones,function(pid,item){
            var checked = item.checked;
            if(checked){
                selected.push(pid);
            }
        });


        window.returnValue = selected==null?'':selected;
    }
</script>