
<?php foreach($beans as $pic):?>
<? extract($pic); ?>
<script type="text/javascript">
    var topType = '<?=$ptype?>';
</script>

<li class="span2">
    <div class="thumbnail">
        <img alt="<?=val($name)?>"  style="width: 64px; height: 60px;" src="<?=$path?>" >
        <div class="caption">
            <div class="caption">

                <label class="radio">
                    <input type="radio" name="optionsRadios" value="<?=val($path)?>" onclick="checkPath(this.value)" />
                    选择
                </label>
            </div>
        </div>
    </div>
</li>

<?php endforeach;?>
<li>
    <?=$pagelink?>

</li>



<script type="text/javascript">
    $(function(){
        $("div.pagination ul li a").bind("click",function(){
            var page = $(this).attr("link").substring(1);
            $("#mythumb").load("/picture/selector_thumbnails/"+topType+"/"+page);
        })

    })
</script>