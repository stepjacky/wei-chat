
<h4><?=$pubwx['name']?></h4>推广业务
<hr/>
<div id="msgTab" class="tabbable"> <!-- Only required for left/right tabs -->
    <ul class="nav nav-tabs">
        <li>
            <a href="#tab1" url="/subscribemessage" data-toggle="tab">关注时回复</a>
        </li>

        <li>
            <a href="#tab1" url="/resptextmessage/lists" data-toggle="tab">文本消息回复</a>
        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">图文消息回复<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li> <a href="#tab1" url="/respnewsmessage/lists" data-toggle="tab">图文消息回复</a></li>
                <li> <a href="#tab1" url="/news/lists" data-toggle="tab">图文消息</a></li>
            </ul>

        </li>
        <li>
            <a href="#tab1" url="/respmusicmessage/lists" data-toggle="tab">语音消息回复</a>
        </li>


        <li>
            <a href="#tab1" url="/lotterydial/lists" data-toggle="tab">大转盘</a>
        </li>

        <li>
            <a href="#tab1" url="/couponcatalog/lists" data-toggle="tab">优惠券</a>
        </li>
        <li>
            <a href="#tab1" url="/cardcatalog/lists" data-toggle="tab">会员卡</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab1">
            <p>消息回复设置</p>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
       $("div#msgTab ul.nav-tabs li a ").bind("click",loadMsgContent);

    });

    function loadMsgContent(){
       var url = $(this).attr("url");
       $("#tab1").load(url);
    }

</script>