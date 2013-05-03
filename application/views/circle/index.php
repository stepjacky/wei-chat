
    <style>
        .pie { width:200px; height:200px; background-color:blue; border-radius:100px; position:absolute; clip:rect(0px,100px,200px,0px); -o-transform:rotate(30deg); -moz-transform:rotate(30deg); -webkit-transform:rotate(30deg); }
        .pie1 { background:-o-linear-gradient(90deg, #00F, #fff 50%); background:-moz-linear-gradient(90deg, #00F, #fff 50%); background:-webkit-gradient(linear, 0% 100%, 50% 50%, from(#00F), to(#fff)) }
        .pie2 { background:-o-linear-gradient(90deg, #FF0, #fff 50%); background:-moz-linear-gradient(90deg, #FF0, #fff 50%); background:-webkit-gradient(linear, 0% 100%, 50% 50%, from(#FF0), to(#fff)) }
        .pie3 { background:-o-linear-gradient(90deg, #0FF, #fff 50%); background:-moz-linear-gradient(90deg, #0FF, #fff 50%); background:-webkit-gradient(linear, 0% 100%, 50% 50%, from(#0FF), to(#fff)) }
        .pie4 { background:-o-linear-gradient(90deg, #F0F, #fff 50%); background:-moz-linear-gradient(90deg, #F0F, #fff 50%); background:-webkit-gradient(linear, 0% 100%, 50% 50%, from(#F0F), to(#fff)) }
        .pie5 { background:-o-linear-gradient(90deg, #0F0, #fff 50%); background:-moz-linear-gradient(90deg, #0F0, #fff 50%); background:-webkit-gradient(linear, 0% 100%, 50% 50%, from(#0F0), to(#fff)) }
        .pie6 { background:-o-linear-gradient(90deg, #F00, #fff 50%); background:-moz-linear-gradient(90deg, #F00, #fff 50%); background:-webkit-gradient(linear, 0% 100%, 50% 50%, from(#F00), to(#fff)) }
        .hold { width:200px; height:200px; position:absolute; clip:rect(100px,200px,200px,0px); }
        .hold1 { -o-transform:rotate(120deg); -moz-transform:rotate(120deg); -webkit-transform:rotate(120deg); margin-top:-4px; }
        .hold2 { -o-transform:rotate(180deg); -moz-transform:rotate(180deg); -webkit-transform:rotate(180deg); margin-top:-2px; margin-left:4px; }
        .hold3 { -o-transform:rotate(240deg); -moz-transform:rotate(240deg); -webkit-transform:rotate(240deg); margin-top:2px; margin-left:4px; }
        .hold4 { -o-transform:rotate(300deg); -moz-transform:rotate(300deg); -webkit-transform:rotate(300deg); margin-top:4px; }
        .hold5 { -o-transform:rotate(360deg); -moz-transform:rotate(360deg); -webkit-transform:rotate(360deg); margin-top:2px; margin-left:-4px; }
        .hold6 { -o-transform:rotate(420deg); -moz-transform:rotate(420deg); -webkit-transform:rotate(420deg); margin-top:-2px; margin-left:-4px; }
        .bg { width:208px; height:208px; background:#990000; padding-left:8px; padding-top:8px; position:relative; border-radius:108px; }
        .pointer { width:50px; height:50px; position:absolute; top:50%; left:50%; margin-top:-25px; margin-left:-25px; -o-transform:rotate(0deg); -moz-transform:rotate(0deg); -webkit-transform:rotate(0deg); }
        .plate { width:50px; height:50px; position:absolute; border-radius:25px; background:-o-linear-gradient(90deg, #999, #939394); background:-moz-radial-gradient(50% 50% 0deg, #fff, #666); background:-webkit-gradient(radial, 25 25, 0, 25 25, 35, from(#fff), to(#666)); box-shadow:0px 0px 5px #999; }
        .dot { width:10px; height:10px; background:#939394; position:absolute; left:50%; margin-left:-5px; margin-top:-4px; -o-transform:rotate(45deg); -moz-transform:rotate(45deg); -webkit-transform:rotate(45deg); }
    </style>

<div class="bg">
    <div class="hold hold1">
        <div class="pie pie1"></div>
    </div>
    <div class="hold hold2">
        <div class="pie pie2"></div>
    </div>
    <div class="hold hold3">
        <div class="pie pie3"></div>
    </div>
    <div class="hold hold4">
        <div class="pie pie4"></div>
    </div>
    <div class="hold hold5">
        <div class="pie pie5"></div>
    </div>
    <div class="hold hold6">
        <div class="pie pie6"></div>
    </div>
    <div class="pointer">
        <div class="dot"></div>
        <div class="plate"></div>
    </div>
</div>
<div style="width:200px; text-align:center; margin-top:20px;">
    <input type="button" value="开始转" id="start" style="width:80px; height:30px;">

    <input type="button" value="停止" id="stop" style="width:80px; height:30px;">
</div>
<script src="jquery-1.7.min.js"></script>
<script>
    i = 0;
    isstart = 0;
    function start(){
        i = i + 10;
        $(".pointer").css("-o-transform","rotate(" + i + "deg)");
        $(".pointer").css("-moz-transform","rotate(" + i + "deg)");
        $(".pointer").css("-webkit-transform","rotate(" + i + "deg)");
    };
    $("#start").click(function(){
        if(!isstart){
            t = setInterval("start()",10);
            isstart = 1;
        };
    });
    $("#stop").click(function(){
        clearInterval(t);
        i = Math.ceil((i - 360*Math.floor(i/360))/60)*60;
        $(".pointer").css("-o-transform","rotate(" + i + "deg)");
        $(".pointer").css("-moz-transform","rotate(" + i + "deg)");
        $(".pointer").css("-webkit-transform","rotate(" + i + "deg)");
        isstart = 0;
    });
</script>