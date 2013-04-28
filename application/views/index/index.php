<!-- Home -->
<div data-role="page" id="page1">
    <div data-theme="a" data-role="header">
        <h3>
            台州微生活
        </h3>
    </div>
    <div data-role="content">
        <a href="#page1">
            <div style="width: 100%; height: 100px; position: relative; background-color: #fbfbfb; border: 1px solid #b8b8b8;">
                <img src="http://codiqa.com/static/images/v2/image.png" alt="image" style="position: absolute; top: 50%; left: 50%; margin-left: -16px; margin-top: -18px">
            </div>
        </a>
        <h5>
            商户
        </h5>
        <div class="ui-grid-c">

            <?php
                $idx = range('a','z');
                $i=0;
            ?>

            <?php foreach($beans as $merc):

                extract($merc);
                ?>

                <div class="ui-block-<?=$idx[$i++]?>">
                    <a href="/merchant/index/<?=$id?>">
                        <img src="<?=$avator?>" width="50px" height="50px" />

                    </a>
                </div>

            <?php endforeach;?>

        </div>
    </div>
</div>