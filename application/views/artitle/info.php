<?php
extract($bean);
?>
<hr/>
<button class="btn btn-success" onclick="editOne('<?=isset($aid)?$aid:''?>','<?=isset($lang)?$lang:''?>')">编辑</button>
<hr/>
<h2>
    <label>名称</label>
    <?=isset($name)?$name:''?>

</h2>

<hr/>
<div class="span8" id="content">
    <?=isset($content)?$content:''?>
</div>