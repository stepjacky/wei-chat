<style>

    body{
        background-color: #ff822e;
    }
    .panel {
        position: relative;
        margin: 15px 15px  5px 15px;
        padding: 0px 19px 14px 19px;
        *padding-top: 0px;
        background-color: #FFD993;
        border: 1px solid #ddd;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }
</style>

<header>

</header>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="panel">

        <span class="label label-important">
            恭喜你中奖了
        </span>

            <dl class="dl-horizontal">
                <dt>
                  你中了:<?=$prizename?>
                </dt>
                <dd><?=$prizemsg?></dd>
                <dt>
                          兑奖验证码:
                </dt>
                <dd>
                   <?=$prizecode?>
                </dd>
                <dd>本次兑奖码已关联你的微信号,可向公众账号发送[大转盘]查询</dd>
            </dl>
            <p>
            <input class="input-block-level" type="text" id="lottery_code"/>
            <button class="btn btn-block btn-danger" onclick="userSubmit('<?=$lotteryid?>','<?=$member?>','lottery_code')">
                用户提交</button>
            </p>
            <p>
            <input class="input-block-level " type="text" id="merchant_code"/>
            <button class="btn btn-block btn-danger" onclick="merchantSubmit('<?=$lotteryid?>','<?=$member?>','merchant_code')">
                商户提交</button>
            </p>
        </div>
        <div class="panel">

        <span class="label label-important">
                奖项设置
        </span>
            <?php
                 extract($config);
            ?>
            <dl class="dl-horizontal">
                <dt>
                    一等奖
                </dt>
                <dd><?=$firstmsg?></dd>
                <dt>

                    二等奖
                </dt>
                <dd><?=$secondmsg?></dd>
                <dt>
                    三等奖
                </dt>
                <dd><?=$thirdmsg?></dd>

            </dl>


        </div>


    </div>


    <div class="row-fluid">
        <div class="panel">

        <span class="label label-success">
             活动说明
        </span>

            <dl class="dl-horizontal">

                <dd>
                  <?=$remark;?>

                </dd>


            </dl>


        </div>


    </div>

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
    function  userSubmit(lottery,member,valid){
        var code = $('#'+valid).val();
        if(!code) return;
        var url = '/lotterydial/u_validate/'+lottery+'/'+member+'/'+code;
        $.get(url,function(rst){
              if(rst) showModal("手机号成功提交");
        });

    }

    function merchantSubmit(lottery,member,valid){
        var code = $('#'+valid).val();
        if(!code) return;
        var url = '/lotterydial/m_validate/'+lottery+'/'+member+'/'+code;
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