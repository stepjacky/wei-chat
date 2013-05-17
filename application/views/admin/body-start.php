<body>
<!-- topbar starts -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="/admin"> <img alt="Charisma Logo" src="/resources/bootstrap/charisma/img/logo20.png" />
                <span>台州微生活卡平台</span></a>


            <!-- user dropdown starts -->
            <div class="btn-group pull-right" >
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="icon-user"></i><span class="hidden-phone">
                        <?=$id?>
                    </span>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="/admin/logout">注销</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<!-- topbar ends -->

<div class="container-fluid">
    <div class="row-fluid">


        <!-- left menu starts -->
        <div class="span2 main-menu-span">
            <div class="well nav-collapse sidebar-nav">
                <ul class="leftnav nav nav-tabs nav-stacked main-menu">

                    <li class="nav-header hidden-tablet">公众账号</li>

                    <li><a class="ajax-link" link="/pubweixin/lists" href="###">
                            <i class="icon-picture"></i>
                            <span class="hidden-tablet">公众账号</span></a></li>

                    <li class="nav-header hidden-tablet">系统</li>
                    <li><a class="ajax-link" link="/userpicture" href="###">
                            <i class="icon-picture"></i>
                            <span class="hidden-tablet">用户图片</span></a></li>
                    <li><a class="ajax-link" link="/merchant/editNew" href="###">
                            <i class="icon-picture"></i>
                            <span class="hidden-tablet">商户资料</span></a></li>

                    <li><a  href="/admin/logout">
                            <i class="icon-globe"></i>
                            <span class="hidden-tablet">退出</span></a></li>
                </ul>
            </div><!--/.well -->
        </div><!--/span-->
        <!-- left menu ends -->

        <noscript>
            <div class="alert alert-block span10">
                <h4 class="alert-heading">警告!</h4>
                <p>
                    您必须开启浏览器的<a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    功能才可以使用本系容
                </p>
            </div>
        </noscript>

        <div id="content" class="span10">
            <!-- content starts -->