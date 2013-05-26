<link href="/resources/styles/couponcatalog/getcode.css" rel="stylesheet"/>
<div class="wrap">
    <div  class="anim_a">
        <p>&nbsp;</p>
        <div class="anim_b"></div>
    </div>
</div>
<div class="dblock"></div>
<div class="panel">
 <span class="label label-important">
            获得优惠券使用权
        </span>

    <dl class="dl-horizontal">
        <dt>
            您抢到:
        </dt>
        <dd><?=$name?></dd>
        <dt>
            验证码:
        </dt>
        <dd>
            <?=$code?>
        </dd>
        <dd>本次兑奖码已关联你的微信号,可向公众账号发送[优惠券]查询</dd>
    </dl>
    <p>
        <input class="input-block-level" type="text" id="phone" placeholder="请填写手机号" />
        <button class="btn btn-block btn-danger"
                onclick="userSubmit('<?=$catalog_id?>','<?=$weixin_id?>','<?=$code?>','phone')">
            用户提交</button>
    </p>
    <p>
        <input class="input-block-level " type="text" id="m_code" placeholder="填写商家验证码" />
        <button class="btn btn-block btn-danger"
                onclick="merchantSubmit('<?=$catalog_id?>','<?=$weixin_id?>','m_code','<?=$code?>')">
            商户提交</button>
    </p>
</div>
<div class="panel">
 <span class="label label-success">
        优惠券设置    
 </span>
    <dl class="dl-horizontal">
        <dt> <?=$csetting?></dt>
    </dl>

</div>
<div class="panel">
 <span class="label label-info">
        优惠券使用说明    
 </span>
    <dl class="dl-horizontal">
        <dt> <?=$remark?></dt>
    </dl>

</div>

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <label class="label label-info">系统提示</label>
    </div>
    <div class="modal-body" id="modalbody">

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" aria-hidden="true">确定</button>
    </div>
</div>
<script type="text/javascript">
    function  userSubmit(cid,weixin,ucode,phoneel){
        var code = $('#'+phoneel).val();
        if(!code) return;
        var url = '/couponcatalog/u_validate/'+cid+'/'+weixin+'/'+ucode+'/'+code;
        $.get(url,function(rst){
            if(rst) showModal("手机号成功提交");
        });

    }

    function merchantSubmit(cid,weixin,ucode,mcodeel){
        var code = $('#'+mcodeel).val();
        if(!code) return;
        var url = '/couponcatalog/m_validate/'+cid+'/'+weixin+'/'+code+'/'+ucode;
        $.get(url,function(rst){
            if(rst)
                showModal("商户已验证");
            else{
                showModal("商户验证码错误");
            }
        })
    }

    function showModal(msg){
        $("#modalbody").html(msg);
        $('#myModal').modal('show');
    }
</script>