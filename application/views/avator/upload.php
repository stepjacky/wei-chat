<script type="text/javascript">
    function preview(img, selection) {
        var scaleX = <?=$thumb_width;?> / selection.width;
        var scaleY = <?=$thumb_height;?> / selection.height;

        $('#thumbnail + div > img').css({
            width: Math.round(scaleX * <?=$large_width;?>) + 'px',
            height: Math.round(scaleY * <?=$large_height;?>) + 'px',
            marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px',
            marginTop: '-' + Math.round(scaleY * selection.y1) + 'px'
        });
        $('#x1').val(selection.x1);
        $('#y1').val(selection.y1);
        $('#x2').val(selection.x2);
        $('#y2').val(selection.y2);
        $('#w').val(selection.width);
        $('#h').val(selection.height);
    }

    $(document).ready(function () {
        $('#save_thumb').click(function() {
            var x1 = $('#x1').val();
            var y1 = $('#y1').val();
            var x2 = $('#x2').val();
            var y2 = $('#y2').val();
            var w = $('#w').val();
            var h = $('#h').val();
            if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
                alert("You must make a selection first");
                return false;
            }else{
                return true;
            }
        });
    });

    $(window).load(function () {
        $('#thumbnail').imgAreaSelect({ aspectRatio: '1:<?= $thumb_height/$thumb_width;?>', onSelectChange: preview });


    });
    window.returnValue  = '<?=$thumb_src;?>';
</script>


<h2>请在大图上拉取所需要的部分</h2>
<div align="center">
    <img src="<?=$image_src?>"
         style="float: left; margin-right: 10px;"
         id="thumbnail" alt="Create Thumbnail" />
    <div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden;
            width:<?=$thumb_width;?>px;
            height:<?=$thumb_height;?>px;">
        <img src="<?=$image_src;?>"
             style="position: relative;" alt="Thumbnail Preview" />
    </div>
    <br style="clear:both;"/>
    <form name="thumbnail" action="/avator/thumbnail" method="post">
        <input type="hidden" name="x1" value="" id="x1" />
        <input type="hidden" name="y1" value="" id="y1" />
        <input type="hidden" name="x2" value="" id="x2" />
        <input type="hidden" name="y2" value="" id="y2" />
        <input type="hidden" name="w" value="" id="w" />
        <input type="hidden" name="h" value="" id="h" />
        <input type="submit" name="upload_thumbnail" value="保存头像" id="save_thumb" />
    </form>
</div>
