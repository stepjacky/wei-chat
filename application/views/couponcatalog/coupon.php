<div class="dblock"></div>
<div class="accordion" id="accordion2">

    <?php foreach($beans as $coup):?>
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle"
               href="/couponcatalog/index/<?=$coup['id']?>?member=<?=$weixin?>&pubweixin=<?=$pubwx?>">
                <?=$coup['name']?>
                <i class="icon-chevron-right" style='float:right'></i>
            </a>
        </div>
    </div>
    <?php endforeach;?>
</div>

<div class="accordion" id="accordion3">
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapseOne2">
                会员卡使用说明
                <i class="icon-chevron-right" style='float:right'></i>
            </a>
        </div>
        <div id="collapseOne2" class="accordion-body collapse">
            <div class="accordion-inner">
                <?=$card['remark']?>
            </div>
        </div>
    </div>

</div>