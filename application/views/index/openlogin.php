<div class="grid_12">
<div class="login_pop" >

    <div class="login_popdiv">
        <div class="login_pop_title"><img src="/resources/images/index/login_title1.gif"><span>
            <a>

            </a></span></div>
        <form action='/myuser/login' method="post">
        <div class="login_pop_l">
            <dl>
                <dt>E-MAIL：</dt>
                <dd class="crumb">
                    <p class="inputbg1"><input type="text"  id="user_name_quick" name="id"></p>

                </dd>
            </dl>
            <dl>
                <dt>密码：</dt>
                <dd>
                    <p class="inputbg1"><input type="password" id="password_quick" name="password"></p>

                </dd>
            </dl>
            <dl>
                <dt></dt>
                <dd>
                    <label><input type="checkbox" id="is_remember" value="1" name="is_remember">记住我</label>
                    <a href="/welcome/forgetpass">找回密码</a>
                </dd>
            </dl>
            <dl>
                <dt></dt>
                <dd><input type="submit"  value=""  class="login_bnt1"></dd>
                <dd><span class="errorinfo"><?=val($info)?></span></dd>
            </dl>
        </div>
        </form>
        <div class="login_pop_r">
            <p><strong>使用合作账号登录</strong></p>
            <p><a href="http://www.vgooo.com/user/login/sina"><img src="/resources/images/index/pop_sina.gif"></a></p>
            <p>
                <a href="https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=100339887&redirect_uri=<?=site_url()?>qqlogin&scope=get_user_info">
                    <img src="/resources/images/index/Connect_logo_3.png" border="0" />
                </a>
            </p>
            <p><a href="http://www.vgooo.com/user/login/alipay"><img src="/resources/images/index/pop_alipay.gif"></a></p>
            <p>还没帐号？ <a href="/welcome/register">立即注册</a></p>

        </div>
    </div>
</div>


</div>

<div class="clear"></div>