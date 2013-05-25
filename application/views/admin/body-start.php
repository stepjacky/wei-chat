<body>
<div class="navbar navbar-inverse">
<div class="navbar-inner">
<div class="container-fluid">


<a href="#" class="brand"><small><i class="icon-leaf"></i> 台州微生活卡平台</small> </a>
<ul class="nav ace-nav pull-right">
    <li class="grey">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <i class="icon-tasks"></i>
            <span class="badge">4</span>
        </a>
        <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
            <li class="nav-header">
                <i class="icon-ok"></i> 4 Tasks to complete
            </li>

            <li>
                <a href="#">
                    <div class="clearfix">
                        <span class="pull-left">Software Update</span>
                        <span class="pull-right">65%</span>
                    </div>
                    <div class="progress progress-mini"><div style="width:65%" class="bar"></div></div>
                </a>
            </li>

            <li>
                <a href="#">
                    <div class="clearfix">
                        <span class="pull-left">Hardware Upgrade</span>
                        <span class="pull-right">35%</span>
                    </div>
                    <div class="progress progress-mini progress-danger"><div style="width:35%" class="bar"></div></div>
                </a>
            </li>

            <li>
                <a href="#">
                    <div class="clearfix">
                        <span class="pull-left">Unit Testing</span>
                        <span class="pull-right">15%</span>
                    </div>
                    <div class="progress progress-mini progress-warning"><div style="width:15%" class="bar"></div></div>
                </a>
            </li>

            <li>
                <a href="#">
                    <div class="clearfix">
                        <span class="pull-left">Bug Fixes</span>
                        <span class="pull-right">90%</span>
                    </div>
                    <div class="progress progress-mini progress-success progress-striped active"><div style="width:90%" class="bar"></div></div>
                </a>
            </li>

            <li>
                <a href="#">
                    See tasks with details
                    <i class="icon-arrow-right"></i>
                </a>
            </li>
        </ul>
    </li>


    <li class="purple">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <i class="icon-bell-alt icon-animated-bell icon-only"></i>
            <span class="badge badge-important">8</span>
        </a>
        <ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer">
            <li class="nav-header">
                <i class="icon-warning-sign"></i> 8 Notifications
            </li>

            <li>
                <a href="#">
                    <div class="clearfix">
                        <span class="pull-left"><i class="icon-comment btn btn-mini btn-pink"></i> New comments</span>
                        <span class="pull-right badge badge-info">+12</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="icon-user btn btn-mini btn-primary"></i> Bob just signed up as an editor ...
                </a>
            </li>

            <li>
                <a href="#">
                    <div class="clearfix">
                        <span class="pull-left"><i class="icon-shopping-cart btn btn-mini btn-success"></i> New orders</span>
                        <span class="pull-right badge badge-success">+8</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="#">
                    <div class="clearfix">
                        <span class="pull-left"><i class="icon-twitter btn btn-mini btn-info"></i> Followers</span>
                        <span class="pull-right badge badge-info">+4</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="#">
                    See all notifications
                    <i class="icon-arrow-right"></i>
                </a>
            </li>
        </ul>
    </li>


    <li class="green">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <i class="icon-envelope-alt icon-animated-vertical icon-only"></i>
            <span class="badge badge-success">5</span>
        </a>
        <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
            <li class="nav-header">
                <i class="icon-envelope"></i> 5 Messages
            </li>

            <li>
                <a href="#">
                    <img src="/resources/bootstrap/ace/avatar.png" class="msg-photo" alt="Alex's Avatar">
									<span class="msg-body">
										<span class="msg-title">
											<span class="blue">Alex:</span>
											Ciao sociis natoque penatibus et auctor ...
										</span>
										<span class="msg-time">
											<i class="icon-time"></i> <span>a moment ago</span>
										</span>
									</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <img src="/resources/bootstrap/ace/avatar3.png" class="msg-photo" alt="Susan's Avatar">
									<span class="msg-body">
										<span class="msg-title">
											<span class="blue">Susan:</span>
											Vestibulum id ligula porta felis euismod ...
										</span>
										<span class="msg-time">
											<i class="icon-time"></i> <span>20 minutes ago</span>
										</span>
									</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <img src="/resources/bootstrap/ace/avatar4.png" class="msg-photo" alt="Bob's Avatar">
									<span class="msg-body">
										<span class="msg-title">
											<span class="blue">Bob:</span>
											Nullam quis risus eget urna mollis ornare ...
										</span>
										<span class="msg-time">
											<i class="icon-time"></i> <span>3:15 pm</span>
										</span>
									</span>
                </a>
            </li>

            <li>
                <a href="#">
                    See all messages
                    <i class="icon-arrow-right"></i>
                </a>
            </li>

        </ul>
    </li>


    <li class="light-blue user-profile">
        <a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle">
            <img class="nav-user-photo" src="/resources/bootstrap/ace/user.jpg" alt="Jason's Photo">
							<span id="user_info">
								<small>欢迎,</small>  <?=$id?>
							</span>
            <i class="icon-caret-down"></i>
        </a>
        <ul class="pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer" id="user_menu">
            <li><a href="#"><i class="icon-cog"></i>系统设置</li>
            <li><a href="#"><i class="icon-user"></i>个人资料</li>
            <li class="divider"></li>
            <li><a href="/admin/logout"><i class="icon-off"></i>注销</a></li>
        </ul>
    </li>




</ul><!--/.ace-nav-->

</div><!--/.container-fluid-->
</div><!--/.navbar-inner-->
</div>

<div id="main-container" class="container-fluid">
<a id="menu-toggler" href="#"><span></span></a><!-- menu toggler -->

<div id="sidebar">

    <div id="sidebar-shortcuts">
        <div id="sidebar-shortcuts-large">
            <button class="btn btn-small btn-success"><i class="icon-signal"></i></button>
            <button class="btn btn-small btn-info"><i class="icon-pencil"></i></button>
            <button class="btn btn-small btn-warning"><i class="icon-group"></i></button>
            <button class="btn btn-small btn-danger"><i class="icon-cogs"></i></button>
        </div>
        <div id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>
            <span class="btn btn-info"></span>
            <span class="btn btn-warning"></span>
            <span class="btn btn-danger"></span>
        </div>
    </div><!-- #sidebar-shortcuts -->

    <ul class="nav nav-list">

        <li class="active">
            <a href="#">
                <i class="icon-dashboard"></i>
                <span>管理面板</span>

            </a>
        </li>


        <li>
            <a class="alink" href="#" link="/pubweixin/lists">
                <i class="icon-text-width"></i>
                <span>公众账号</span>

            </a>
        </li>


        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-desktop"></i>
                <span>用户资源</span>
                <b class="arrow icon-angle-down"></b>
            </a>
            <ul class="submenu">
                <li><a class="alink"  href="#" link="/userpicture"><i class="icon-double-angle-right"></i>用户图片</a></li>

            </ul>
        </li>


        <li>
            <a class="alink"  href="#" link="/merchant/editNew">
                <i class="icon-list"></i>
                <span>商户信息</span>

            </a>
        </li>
    </ul><!--/.nav-list-->

    <div id="sidebar-collapse"><i class="icon-double-angle-left"></i></div>


</div><!--/#sidebar-->


<div class="clearfix" id="main-content">

<div id="breadcrumbs">
    <ul class="breadcrumb">
        <li><i class="icon-home"></i> <a href="#">台州微生活平台</a>
            <span class="divider"><i class="icon-angle-right"></i></span></li>
        <li class="active">管理面板</li>
    </ul><!--.breadcrumb-->

    <div id="nav-search" class="hide">
        <form class="form-search">


            <span class="input-icon">
			  <input type="text" placeholder="Search ..."
                     class="input-small search-query" id="nav-search-input" autocomplete="off">
										<i class="icon-search" id="nav-search-icon"></i>
		    </span>
        </form>
    </div><!--#nav-search-->
</div><!--#breadcrumbs-->



<div class="clearfix" id="page-content">

<div class="page-header position-relative hide  ">
    <h1>管理面板<small><i class="icon-double-angle-right"></i>

      </small></h1>
</div><!--/page-header-->

<div class="row-fluid" id="content">
<!-- PAGE CONTENT BEGINS HERE -->


