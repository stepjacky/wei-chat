<script type="text/javascript" src="/resources/circle/js/jQueryRotate.2.2.js"></script>
<style>
    #lottery {
        background: url("/resources/circle/images/disc-bg.png?v=79804") no-repeat scroll 0 0 transparent;
        background-size: 450px 450px;
        height: 450px;
        width: 100%;
       /* position: absolute;*/
        margin: 0 auto;
    }
</style>

<header>
    <div id="lottery">

        <img id="imgs" src="/resources/circle/images/c-arrow.png" viewbox="0 0 90 191"
             style="cursor : pointer;position: relative; left: 181px; top: 128px; width: 90px; height: 191px;" class="image"/>


    </div>
</header>
<article>
    <button onclick="recicle()" >重新抽奖</button>
</article>

<script type="text/javascript">
    $(function () {
        var j=0;
        $("#imgs").click(function () {

            for (var i = 0; i <= 10000; i++) {
                j=i;
                $("#imgs").rotate({
                    animateTo: j,
                    duration: 5000
                });
                if (j >= 4068) {

                    break;
                }

            }

        });

    });
    function recicle(){
        i  =0;

        $("#imgs").rotate(i);
    }



</script>