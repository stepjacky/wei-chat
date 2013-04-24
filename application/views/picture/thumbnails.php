
<?php foreach($beans as $pic):?>
<? extract($pic); ?>
<script type="text/javascript">
    var topType = '<?=$ptype?>';
</script>

<li class="span2">
    <div class="thumbnail">
        <img alt="<?=val($name)?>"  style="width: 180px; height: 100px;" src="<?=$path?>" >
        <div class="caption">
            <p>
                <label class="radio inline">
                    <input type="radio" id="ptype-mini-<?=$pic['id']?>" name="ptype-<?=$pic['id']?>" value="card"
                            <?php
                              if($ptype=="card")
                                  echo "checked='checked'";
                              ?>
                            onclick="updatePtype('<?=$pic['id']?>',this.value)"
                            />优惠卡
                </label>
                <label class="radio inline">
                    <input type="radio" id="ptype-large-<?=$pic['id']?>" name="ptype-<?=$pic['id']?>" value="coupon"
                        <?php
                    if($ptype=="largepic")
                        echo "checked='checked'";
                    ?>
                           onclick="updatePtype('<?=$pic['id']?>',this.value)"

                            >优惠券
                </label>
                <label class="radio inline">
                    <a href="javascript:;" onclick="removePic('<?=$pic['id']?>')">
                        <i class="icon-remove-circle"></i>

                    </a>

                </label>

            </p>
        </div>
    </div>
</li>

<?php endforeach;?>
<li>
    <?=$pagelink?>

</li>



<script type="text/javascript">
   function updatePtype(id,ptype){
       $.post('/picture/update_ptype/'+id+"/"+ptype);
   }

   function removePic(id){

       if(!confirm('确定删除该图？')) return;
       var t = getEventSource();

       $.post('/picture/remove/'+id,function(){
          $(t).parent().parent().parent().parent().parent().remove();
       });
   }
    $(function(){
        $("div.pagination ul li a").bind("click",function(){
            var page = $(this).attr("link").substring(1);
            $("#mythumb").load("/picture/thumbnails/"+topType+"/"+page);
        })

    })
</script>