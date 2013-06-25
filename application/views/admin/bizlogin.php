<style type="text/css">
    body {
        padding-bottom: 40px;
    }
</style>
<div class="container">

    <div class="row">

        <div class="row">
            <div class="span12">
                <h2>登录商家管理中心</h2>
            </div><!--/span-->
        </div><!--/row-->
        <div class="span12" >
            <div class="alert alert-info">
                请输入商家账号登录或者<a href="/welcome/start_register">注册</a>
            </div>
            <div class="alert alert-error">
                <?=isset($_GET['info'])?$_GET['info']:''?>
            </div>
            <form class="form-horizontal" action="/admin/login" method="post">

                <div class="control-group">
                     <label class="control-label" for="inputEmail">用户
                        <span class="add-on"><i class="icon-user"></i></span>
                        </label>
                    <div class="controls">

                        <input autofocus class="input-xlarge" name="id" id="username" type="text"  />
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="inputPassword">
                        密码
                        <span class="add-on"><i class="icon-lock"></i></span>
                    </label>
                    <div class="controls">
                        <input class="input-xlarge" name="pword" id="password" type="password"  />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPassword">
                                验证码
                         <span class="add-on"><i class="icon-qrcode"></i></span>
                    </label>
                    <div class="controls">
                        <input class="input-xlarge" name="capcode" type="text"  />
                        <?=$capimage?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary">登录</button>
                        <a href="/welcome/start_register" class="btn btn-link">注册</a>
                    </div>
                </div>

            </form>
        </div><!--/span-->
    </div><!--/fluid-row-->

</div><!--/.fluid-container-->
