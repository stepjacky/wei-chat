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
        <h6>
            <?=$remark?>
        </h6>
        <footer data-position="fixed">
        <a data-role="button" data-direction="reverse" data-theme="b" href="/couponcatalog/get_code/<?=$id?>/<?=$merc['id']?>"
           data-icon="grid" data-iconpos="left">
            立即领取
        </a>
        </footer>
    </div>
</div>