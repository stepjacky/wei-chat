<!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
<!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
<!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
<!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<body class="">
<!--<![endif]-->
<div class="navbar">
    <div class="navbar-inner">
        <ul class="nav pull-right">

            <li><a href="/merchant/editNew"
                   class="hidden-phone visible-tablet visible-desktop"
                   role="button">商户设置</a></li>
            <li id="fat-menu" class="dropdown">
                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-user"></i>  <?=$loginuser?>
                    <i class="icon-caret-down"></i>
                </a>

                <ul class="dropdown-menu">
                    <li><a href="#"><i class="icon-cog"></i>系统设置</a></li>
                    <li><a href="#"><i class="icon-user"></i>个人资料</a></li>
                    <li class="divider"></li>
                    <li><a href="/admin/logout"><i class="icon-off"></i>注销</a></li>
                </ul>
            </li>

        </ul>
        <a class="brand" href="#"><span class="first">
               台州</span> <span class="second">微生活卡平台</span></a>
    </div>
</div>

<div class="sidebar-nav">
    <a href="#dashboard-menu" class="nav-header" data-toggle="collapse">
        <i class="icon-dashboard"></i>基本消息回复管理</a>

    <ul id="dashboard-menu" class="nav nav-list collapse in">
        <li><a class="alink" href="#" link="/subscribemessage">关注时回复</a></li>
        <li><a class="alink" href="#" link="/resptextmessage/lists">文本消息回复</a></li>
        <li><a class="alink" href="#" link="/respnewsmessage/lists">图文消息回复</a></li>
        <li><a class="alink" href="#" link="/news/lists">图文消息管理</a></li>
        <li><a class="alink" href="#" link="/respmusicmessage/lists">语音消息回复</a></li>

    </ul>

    <a href="#accounts-menu" class="nav-header" data-toggle="collapse">
        <i class="icon-briefcase"></i>推广活动</i>
        <span class="label label-info"></span></a>
    <ul id="accounts-menu" class="nav nav-list collapse in">
        <li ><a class="alink"
                href="#" link="/lotterydial/lists">大转盘</a></li>

        <li ><a class="alink"
                href="#" link="/couponcatalog/lists">优惠券</a></li>

        <li ><a class="alink"
                href="#" link="/cardcatalog/lists">会员卡</a></li>

    </ul>

    <a href="#legal-menu" class="nav-header" data-toggle="collapse">
        <i class="icon-legal"></i>帮助和说明</a>
    <ul id="legal-menu" class="nav nav-list collapse in">
        <li ><a class="alink" href="#">使用说明</a></li>
        <li ><a class="alink" href="#">推广说明</a></li>
    </ul>

</div>


<div class="content">

    <div class="header">
        <div class="stats">
            <p class="stat"><span class="number">53</span>系统通知</p>
            <p class="stat"><span class="number">27</span>充值记录</p>
            <p class="stat"><span class="number">15</span>站内短信</p>
        </div>

        <h1 class="page-title">管理面板</h1>
    </div>

    <ul class="breadcrumb">
        <li><a href="#"><?=$pubwx['name']?></a> <span class="divider">/</span></li>
        <li class="active">回复和推广</li>
    </ul>
    <div class="container-fluid" >
        <div class="row-fluid" id="content">
    <!-- PAGE CONTENT BEGINS HERE -->


