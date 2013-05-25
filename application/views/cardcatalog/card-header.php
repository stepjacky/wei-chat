<link href='/resources/styles/cardcatalog/card.css' rel="stylesheet"/>
<div class="wrap">
    <div  class="anim_a">
        <div class='card_logo_wrap'>
            <img src='logo.png' class="card_logo">
        </div>
        <div class="m_name"><?=$card['m_name']?></div>
        <div class="u_code"><?=$card['code']?></div>
    </div>
    <div  class="anim_b">
        <p>&nbsp;</p>
        <div class="m_info"><?=$card['m_info']?></div>
        <div class="dblock"></div>
        <div class="list">电话:<?=$card['m_phone']?></div>
        <div class="list">地址:<?=$card['m_address']?></div>
    </div>
</div>