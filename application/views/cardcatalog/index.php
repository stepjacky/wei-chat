<div class="dblock"></div>
<div class="wrap">
<div class="accordion" id="accordion2">

    <?php
       $acroidx = 0;
    ?>
    <?php foreach($preros as $preo):?>
    <?php
        $acroidx++;
     ?>

    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse"
               data-parent="#accordion2"
               href="#accordionContent<?=$acroidx?>">
               <?=$preo['name']?>
                <i class="icon-chevron-right" style='float:right'></i>
            </a>
        </div>
        <div id="accordionContent<?=$acroidx?>" class="accordion-body collapse">
            <div class="accordion-inner">
                <?=$preo['content']?>
            </div>
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
</div>