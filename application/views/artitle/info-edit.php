<?php
extract($bean);
?>

<form class="form-horizontal"
      action='/artitle/save_info/<?=isset($aid)?$aid:''?>/<?=isset($lang)?$lang:''?>'
      method="post"
      target="dataFrame">
    <!--
 <input  type="hidden"  name="aid"  value="<?=isset($aid)?$aid:''?>"  />
 <input  type="hidden"  name="lang"  value="<?=isset($lang)?$lang:''?>"  />
  -->
    <fieldset>
        <legend>编辑内容</legend>

        <label >名称</label>
        <input
            name="name"
            type="text"
            value="<?=isset($name)?$name:''?>"
            />

        <label>内容</label>
        <?=isset($my_editor)?$my_editor:''?>

        <button class="btn btn-success" type="submit">保存</button>

        </fieldset>
</form>