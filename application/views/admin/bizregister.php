
<body>
<div>
<div class="container"><!--/#content.span10-->

<div class="row-fluid"><!--/fluid-row-->
    <div class="alert alert-block ">
        <!--<button data-dismiss="alert" class="close" type="button">×</button>-->
        <h4 class="alert-heading">台州微生活商户注册</h4>
       <h4>
            请认真填写您的注册信息,用户名一旦填写不可更改,Email请填写真实email,以便以后重置密码
       </h4>
    </div>
    <div class="alert alert-error">
        <?=isset($_GET['info'])?$_GET['info']:''?>
    </div>
<form class="form-horizontal" id="rform">
    <fieldset>
        <div class="control-group">
            <label for="focusedInput" class="control-label">用户名</label>
            <div class="controls">
                <input type="text" id="focusedInput" name="id" class="input-xlarge validate[required,comstm[onlyLetterNumber]]">
                仅允许英文字母和数字
            </div>
        </div>
        <div class="control-group">
            <label for="focusedInput" class="control-label">密码</label>
            <div class="controls">
                <input type="password" id="pword" name="pword" class="input-xlarge validate[required]">
            </div>
        </div>
        <div class="control-group">
            <label for="focusedInput" class="control-label">确认密码</label>
            <div class="controls">
                <input type="password" id="pword1" class="input-xlarge validate[required,equals[pword]]">
            </div>
        </div>
        <div class="control-group">
            <label for="focusedInput" class="control-label">EMAIL</label>
            <div class="controls">
                <input type="text" id="focusedInput" name="email" class="input-xlarge validate[required,custome[email]]">
            </div>
        </div>
        <div class="control-group">
            <label for="focusedInput" class="control-label">验证码</label>
            <div class="controls">
                <input type="text" id="focusedInput"
                       name="capcode"
                       class="validate[required]">
               <?=$capimage?>
                <?=$word;?>
            </div>
        </div>



        <div class="form-actions">
            <button class="btn btn-primary" id="saveBtn" type="button">注册</button>
            <a  class="btn btn-link" href="/welcome/bizlogin" >登录</a>

        </div>
    </fieldset>
</form>
<script type="text/javascript">
    $(function(){
        $("#saveBtn").bind("click",saveData);

        $("#rform").validationEngine('attach'
            , {
                onValidationComplete: validationCmp
            });
        $('.datepicker').datepicker();
    });
    function saveData(){
        var vadrst = $("#rform").validationEngine('validate');
        if(!vadrst)return;
        var sform = document.getElementById("rform");
        sform.action = "/admin/register";
        sform.method="post";
        sform.target="_self";
        sform.submit();
    }

    function validationCmp(form, status){
        return status;
    }
</script>