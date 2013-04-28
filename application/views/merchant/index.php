<!-- Home -->
<link  href="/resources/front/style.css" rel="stylesheet"    />
<script type="text/javascript" src="/resources/quickflip/jquery.quickflip.min.js"></script>
<div data-role="page" id="page1">
    <div data-theme="e" data-role="header" data-position="fixed">
        <h3>
            <?=$bean['name'];?>
        </h3>
    </div>
    <div data-role="content">
        <section id="card_ctn">
            <div class="bk1"></div>
            <div class="cont">
                <div class="card">
                    <div class="front">
                        <figure class="fg" style="background-image:url(/resources/images/avator/cards.jpg);">
                            <img src="<?=$bean['avator']?>" style="width:80px;height: 80px;" />
                            <figcaption class="fc"> <span class="cname" style="color:#957426;">台州微生活会员卡</span>
                                <span class="t" style="color:#aaa;text-shadow:#000 0 -1px;"></span>
                                <span class="n" style="color: rgb(170, 170, 170); text-shadow: rgb(0, 0, 0) 0px -1px; ">
                                    NO.88888888</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </section>

        <h6>地址:<?=$bean['address']?></h6>
        <h6>电话:<?=$bean['phone']?></h6>
        <h6>特色:<?=$bean['info']?></h6>

        <h5>
            会员特权 尊贵独享:
        </h5>
        <ul data-role="listview" data-divider-theme="b" data-inset="true">
            <?php  foreach($beans as $coup):?>

                <li data-theme="f">
                    <a data-transition="slide" href="/couponcatalog/index/<?=$coup['id']?>/<?=$bean['id']?>">
                        <?=$coup['name']?>
                    </a>
                </li>
            <?php endforeach;?>



        </ul>
    </div>
</div>