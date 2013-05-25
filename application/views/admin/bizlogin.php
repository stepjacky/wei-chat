<style type="text/css">
    body {
        padding-bottom: 40px;
    }
    .login-box {
        margin: 0 auto;
        width:50%;
    }
</style>
<div class="container">

    <div class="row">

        <div class="row">
            <div class="span12 center login-header">
                <h2>登录商家管理中心</h2>
            </div><!--/span-->
        </div><!--/row-->
        <div class="span12 " >
            <div class="alert alert-info">
                请输入商家账号或者<a href="/welcome/start_register">注册</a>
            </div>
            <form class="form-horizontal" action="/admin/login" method="post">
                <fieldset>
                    <div class="input-prepend" title="Username" data-rel="tooltip">
                        <span class="add-on"><i class="icon-user"></i></span>
                        <input autofocus class="input-xlarge" name="id" id="username" type="text"  />
                        <span class="add-on"><i class="icon-lock"></i></span>
                        <input class="input-xlarge" name="pword" id="password" type="password"  />
                        <button type="submit" class="btn btn-primary">登录</button>
                        <a href="/welcome/start_register" class="btn btn-info">注册</a>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <div class="span12 btn-group">



                    </div>
                </fieldset>
            </form>
        </div><!--/span-->
    </div><!--/fluid-row-->

</div><!--/.fluid-container-->
