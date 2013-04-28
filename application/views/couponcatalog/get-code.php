<span class="label label-important">
    <?=$name?>
</span>



<div class="span12">

   <?=$vcode?>
</div>

<div class="span12">
    <?=$remark?>
</div>

<!-- Home -->
<div data-role="page" id="page1">
    <div data-theme="e" data-role="header">
        <h3>
            <?=$name?>
        </h3>
    </div>
    <div data-role="content">
        <div style="width: 100%;
         height: 120px;
         position: relative;
         background: #fbfbfb url(/resources/images/avator/coupbg.jpg);
         text-align: center;
         border: 1px solid #b8b8b8;
         padding-top: 20px;
         ">
            <div style="width:280px;height: 100px;margin: 0 auto;">
                <div style="float: left;width: 90px;height: 100px">

                    <img src="<?=$merc['avator'];?>" width="80px" height="80px"/>
                </div>
                <div style="float:right;width: 170px;height: 100px;text-align: left">

                    <strong>
                        <?=$name?>
                    </strong>
                    <br/>

                    截止日期:<?=$enddate?>

                </div>
            </div>

        </div>

        <div style="width: 100%;
         height: 85px;
         position: relative;
         background: #fbfbfb url(/resources/images/avator/coupbg.jpg);
         text-align: center;
         border: 1px solid #b8b8b8;
        ">
            <div style="width:250px;height: 100px;margin: 0 auto;
               background: url(/resources/images/avator/coupcodebg.png) repeat-x 0 0;
               padding-top: 20px;
            ">
                展示此页面即可领取优惠券<br/>
                验证码:<strong><?=$vcode;?></strong>
            </div>


        </div>
        <h6>
            <?=$remark?>
        </h6>
        <footer data-position="fixed">
        <a data-role="button" data-direction="reverse" data-theme="d" href="/merchant/index/<?=$merc['id']?>"
           data-icon="grid" data-iconpos="left">
            返回特权区
        </a>
        </footer>
    </div>
</div>