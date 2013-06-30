<script type="text/javascript" src="/resources/circle/js/jQueryRotate.2.2.js"></script>
<script type="text/javascript" src="/resources/jquery-ui/effect/jquery.easing.min.js"></script>
<link href="/resources/styles/lotterydial/style.css" rel="stylesheet"  >

<header>
    <div id="lottery">

        <img id="imgs" src="/resources/circle/images/c-arrow.png" viewbox="0 0 90 191"
             class="image"/>


    </div>
</header>
<div class="container-fluid">
   <div class="row-fluid">
      <div class="panel">

        <span class="label label-important">
           奖项设置
        </span>

          <ul class="local-inline">
              <li>一等奖:<?=$lconfig['firstmsg']?></li>
              <li>二等奖:<?=$lconfig['secondmsg']?></li>
              <li>
                  三等奖:<?=$lconfig['thirdmsg']?>

              </li>
          </ul>

      </div>


   </div>


    <div class="row-fluid">
        <div class="panel">

        <span class="label label-success">
           活动说明
        </span>

            <dl class="dl-horizontal">
                <?=$lconfig['remark']?>
            </dl>


        </div>


    </div>

</div>


<script type="text/javascript">

    var pubweixin   = '<?=$pubweixin?>';
    var lottery     = '<?=$lotteryid?>';
    var member      = '<?=$member?>';
    var lcode       = '<?=$lotterycode?>';
    var mcode       = '<?=$merchantcode?>';

    $(function () {
        var a =<?=$angle?>; //角度
        var p ='<?=$prize?>'; //奖项名
        var g = '<?=$id?>';//等级

        $("#imgs").click(function () {
            $("#imgs").rotate({
                duration:6000, //转动时间
                angle: 0,
                animateTo:3600+a, //转动角度
                easing: $.easing.easeOutSine,
                callback: function(){
                   $.get('/lotterydial/winit/'+lottery+'/'+member+'/'+g+'/'+lcode,function(again){

                         window.location.href=window.location.href;

                    });


                }
            });
        });

    });
</script>