<link href='/resources/styles/cardcatalog/card.css' rel="stylesheet"/>
<div class="wrap">
    <div  class="anim_a">
        <div class='card_logo_wrap'>
            <img src='/resources/images/card/logo.png' class="card_logo">
        </div>

        <div class="m_name"><?=$card['m_name']?></div>
        <div class="u_code"><?=str_pad($card['code'],6,'0',STR_PAD_LEFT)?></div>
    </div>
    <div  class="anim_b">
        <p>&nbsp;</p>


        <div class="list">电话:<?=$card['m_phone']?></div>
        <div class="list">地址:<?=$card['m_address']?></div>
        <div class="dblock35"></div>
        <div class="m_info"><?=$card['m_info']?></div>
    </div>
    <div class="anim_b_down"></div>
</div>