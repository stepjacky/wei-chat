<style type="text/css">
    body {
        padding-bottom: 40px;
    }
    .login-box {
        margin: 0 auto;
        width:50%;
    }
</style>
<div class="container-fluid">
    <div class="row-fluid">

        <div class="row-fluid">
            <div class="span12 center login-header">
                <h2>登录商家管理中心</h2>
            </div><!--/span-->
        </div><!--/row-->

        <div class="row-fluid">
            <div class="well span5 center login-box">
                <div class="alert alert-info">
                    请输入商家账号
                </div>
                <form class="form-horizontal" action="/admin/login" method="post">
                    <fieldset>
                        <div class="input-prepend" title="Username" data-rel="tooltip">
                            <span class="add-on"><i class="icon-user"></i></span>
                            <input autofocus class="input-xxlarge" name="id" id="username" type="text"  />
                        </div>
                        <div class="clearfix"></div>

                        <div class="input-prepend" title="Password" data-rel="tooltip">
                            <span class="add-on"><i class="icon-lock"></i></span>
                            <input class="input-xxlarge" name="pword" id="password" type="password"  />
                        </div>
                        <div class="clearfix"></div>

                        <p class="center span5">
                            <button type="submit" class="btn btn-primary">登录</button>
                        </p>
                    </fieldset>
                </form>
            </div><!--/span-->
        </div><!--/row-->
    </div><!--/fluid-row-->

</div><!--/.fluid-container-->
