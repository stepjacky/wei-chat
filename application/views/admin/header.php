<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>
        <?=lang('site_name')?>

    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" charset="utf-8" src="/resources/jquery-1.8.2.js"></script>

    <script type="text/javascript" src="/resources/ckfinder/ckfinder.js"></script>

    <link type="text/css" href="/resources/bootstrap/css/bootstrap.css" media="screen" rel="stylesheet" />

    <link type="text/css" href="/resources/bootstrap/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link type="text/css" href="/resources/bootstrap/css/datepicker.css" media="screen" rel="stylesheet" />

    <link href="/resources/bootstrap/css/bootstrap-responsive.css" rel="stylesheet" />

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="text/javascript" src="/resources/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="/resources/bootstrap/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="/resources/zTree/css/zTreeStyle/zTreeStyle.css" type="text/css">
    <script type="text/javascript" src="/resources/zTree//js/jquery.ztree.core-3.5.js"></script>
    <style>
        body{
            padding-top: 180px;
        }
    </style>
    <link href="/resources/styles/admin/login.css"  rel="stylesheet" media="screen"  >
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">菲尔特网站后台管理</a>

            <ul class="nav pull-right">
                <li class="divider-vertical"></li>
                <li class="dropdown">
                    <form action="admin/logout">
                        <button class="btn btn-danger">退出</button>
                    </form>

                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
