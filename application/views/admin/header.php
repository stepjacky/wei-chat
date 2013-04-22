<!DOCTYPE html>
<html>
<head>
    <!--
        Charisma v1.0.0

        Copyright 2012 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
    -->
    <meta charset="utf-8">
    <title>微信会员卡管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="stepjacky@cloudweb.pw">

    <!-- The styles -->
    <link id="bs-css" href="/resources/bootstrap/charisma/css/bootstrap-Redy.css" rel="stylesheet">
    <style type="text/css">
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }
    </style>
    <link href="/resources/bootstrap/charisma/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="/resources/bootstrap/charisma/css/charisma-app.css" rel="stylesheet">
    <link href="/resources/bootstrap/charisma/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
    <link href='/resources/bootstrap/charisma/css/fullcalendar.css' rel='stylesheet'>
    <link href='/resources/bootstrap/charisma/css/fullcalendar.print.css' rel='stylesheet'  media='print'>
    <link href='/resources/bootstrap/charisma/css/chosen.css' rel='stylesheet'>
    <link href='/resources/bootstrap/charisma/css/uniform.default.css' rel='stylesheet'>
    <link href='/resources/bootstrap/charisma/css/colorbox.css' rel='stylesheet'>
    <link href='/resources/bootstrap/charisma/css/jquery.cleditor.css' rel='stylesheet'>
    <link href='/resources/bootstrap/charisma/css/jquery.noty.css' rel='stylesheet'>
    <link href='/resources/bootstrap/charisma/css/noty_theme_default.css' rel='stylesheet'>
    <link href='/resources/bootstrap/charisma/css/elfinder.min.css' rel='stylesheet'>
    <link href='/resources/bootstrap/charisma/css/elfinder.theme.css' rel='stylesheet'>
    <link href='/resources/bootstrap/charisma/css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='/resources/bootstrap/charisma/css/opa-icons.css' rel='stylesheet'>
    <link href='/resources/bootstrap/charisma/css/uploadify.css' rel='stylesheet'>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="/resources/bootstrap/charisma/img/favicon.ico">



</head>

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
                        <i class="icon-user"></i><span class="hidden-phone"> admin</span>
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
                <ul class="nav nav-tabs nav-stacked main-menu">
                    <li class="nav-header hidden-tablet">微生活卡</li>
                    <li><a class="ajax-link"
                           link="/member/list" href="###">
                            <i class="icon-home"></i><span class="hidden-tablet">
                                      会员管理                      </span></a></li>
                    <li><a class="ajax-link" link="/member/cards" href="###">
                            <i class="icon-eye-open"></i>
                            <span class="hidden-tablet">会员卡管理</span></a></li>
                    <li><a class="ajax-link" link="/credits/list" href="###">
                            <i class="icon-edit"></i>
                            <span class="hidden-tablet">优惠券管理</span></a></li>
                    <li><a class="ajax-link" link="/credits/validate" href="###">
                            <i class="icon-list-alt"></i>
                            <span class="hidden-tablet">优惠券验证</span></a></li>
                    <li><a class="ajax-link" link="/credits/distribute" href="###">
                            <i class="icon-font"></i>
                            <span class="hidden-tablet">优惠券发放</span></a></li>

                    <li class="nav-header hidden-tablet">公众账号</li>
                    <li><a class="ajax-link" link="/watcher/list" href="###">
                            <i class="icon-align-justify"></i>
                            <span class="hidden-tablet">关注者账号</span></a></li>
                    <li><a class="ajax-link" link="/message/index" href="###">
                            <i class="icon-calendar"></i>
                            <span class="hidden-tablet">信息发布</span></a></li>
                    <li><a class="ajax-link" link="/message/list" href="###">
                            <i class="icon-th"></i>
                            <span class="hidden-tablet">我的消息</span></a></li>

                    <li class="nav-header hidden-tablet">系统管理</li>
                    <li><a class="ajax-link" link="/profile" href="###">
                            <i class="icon-picture"></i>
                            <span class="hidden-tablet">我的资料</span></a></li>
                    <li><a link="/system/logout" href="###">
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
