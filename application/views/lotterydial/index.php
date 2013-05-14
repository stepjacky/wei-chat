<script type="text/javascript" src="/resources/circle/js/jQueryRotate.2.2.js"></script>
<style>
    #lottery {
        background: url("/resources/circle/images/disc-bg.png?v=79804") no-repeat scroll 0 0 transparent;
        height: 100%;
        left: 50px;
        width: 100%;
        margin:0 auto;
        position: absolute;
    }

    #lottery .arrow {
        background: url("/resources/circle/images/arrow.png?v=1bde2") no-repeat scroll 0 0 transparent;
        height: 191px;
        left: 207px;
        position: absolute;
        top: 120px;
        width: 32px;
    }

    #lottery .lot-btn {
        height: 92px;
        left: 177px;
        overflow: hidden;
        position: absolute;
        top: 181px;
        width: 91px;
    }

    #lottery .lot-btn span {
        cursor: pointer;
        display: block;
        height: 92px;
        position: relative;
        width: 91px;
    }

    #lottery .first span {
        background: url("/resources/circle/images/buttons_01.png?v=8bc8e") no-repeat scroll 0 0 transparent;
    }
</style>



<div id="lottery">
    <img id="imgs" src="/resources/circle/images/disc-rotate.gif" viewbox="0 0 352 30"
         style="position: absolute; left: 47px; top: 47px; width: 352px; height: 352px;" class="image"/>


    <div class="arrow">
    </div>
    <div class="lot-btn first">
        <span></span>
    </div>

</div>
<button onclick="recicle()" >重新抽奖</button>

<div class="demo">
    <div id="disk"></div>
    <div id="start"><img src="start.png" id="startbtn"></div>
</div>





<script type="text/javascript">
    $(function () {
        var j=0;
        $(".lot-btn").click(function () {

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


        alert($(document).width());


    });
    function recicle(){
        i  =0;

        $("#imgs").rotate(i);
    }



</script>