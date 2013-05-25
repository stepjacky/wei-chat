<link href="/resources/styles/couponcatalog/getcode.css0" rel="stylesheet"/>
<div class="wrap">
    <div  class="anim_a">
        <p>&nbsp;</p>
        <div class="anim_b"></div>
    </div>
</div>
<div class="dblock"></div>
<div class="panel">
 <span class="label label-important">
               您已经获得该惠券使用权,并且通过验证
        </span>

    <dl class="dl-horizontal">
        <dt>
                    验证码:  </dt>
        <dd><?=$coupon['code']?></dd>
        <dd>本次兑奖码已关联你的微信号,可向公众账号发送[优惠券]查询</dd>
    </dl>
</div>
<div class="panel">
 <span class="label label-success">
        优惠券设置    
 </span>
    <dl class="dl-horizontal">
        <dt> <?=$config['csetting']?></dt>
    </dl>

</div>
<div class="panel">
 <span class="label label-info">
        优惠券使用说明    
 </span>
    <dl class="dl-horizontal">
        <dt> <?=$config['info']?></dt>
    </dl>

</div>