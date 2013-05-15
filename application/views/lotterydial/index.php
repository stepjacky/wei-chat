<script type="text/javascript" src="/resources/circle/js/jQueryRotate.2.2.js"></script>
<script type="text/javascript" src="/resources/jquery-ui/effect/jquery.easing.min.js"></script>
<style>
    #lottery {
        background: url("/resources/circle/images/disc-bg.png?v=79804") no-repeat scroll 0 0 transparent;
        background-size: 320px 320px;
        height: 320px;
        width: 100%;
       /* position: absolute;*/
        margin: 0 auto;
    }
    .image{
        cursor : pointer;
        position: relative;
        left: 116px;
        top: 63px;
        width: 90px;
        height: 191px;
    }
</style>

<header>
    <div id="lottery">

        <img id="imgs" src="/resources/circle/images/c-arrow.png" viewbox="0 0 90 191"
             class="image"/>


    </div>
</header>
<article>
    <button onclick="recicle()" >重新抽奖</button>
</article>

<script type="text/javascript">
    $(function () {
        var a =<?=$angle?>; //角度
        var p ='<?=$prize?>'; //奖项
        $("#imgs").click(function () {
            $("#imgs").rotate({
                duration:5000, //转动时间
                angle: 0,
                animateTo:3600+a, //转动角度
                easing: $.easing.easeOutSine,
                callback: function(){
                    var con = confirm('恭喜你，中得'+p+'\n还要再来一次吗？');
                    if(con){
                        window.location.href=window.location.href;
                    }else{
                        return false;
                    }
                }
            });
        });

    });
    function recicle(){
        i  =0;

        $("#imgs").rotate(i);
    }



</script>