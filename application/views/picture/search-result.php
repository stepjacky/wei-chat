<div class="row-fluid">
    <ul class="thumbnails">
        <?php foreach($beans as $bean):?>
        <?php
           extract($bean);
        ?>
        <li class="span2">
            <div class="thumbnail">
                <img alt="<?=val($width)?>*<?=val($height)?>-<?=val($name)?>"
                     style="width: 80px; height: 60px;"
                     src="<?=val($path)?>">
                <div class="caption">

                    <label class="radio">
                        <input type="radio" name="optionsRadios" value="<?=val($path)?>" onclick="checkPath(this.value)" />
                        选择
                    </label>
                </div>
            </div>
        </li>

            <?php endforeach;?>
    </ul>

    <?=val($pagelink)?>
</div>


