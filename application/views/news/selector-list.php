<table class="table  table-bordered table-hover">
    <thead>
    <tr>
        <th>选择</th>
        <th>名称</th>
    </tr>

    </thead>
    <tbody>
    <?php  foreach($list as $lst):?>

    <tr>


        <td>
            <input type="checkbox" value="<?=val($lst['id'])?>" class="check_spare"
                   onclick="checkitems(this.value,'<?=val($lst['name'])?>',this)" />
        </td>
        <td><?=val($lst['name'])?></td>

    </tr>

        <?php endforeach;?>
    </tbody>
    <tfoot>
    <tr>
        <th colspan="3">

            <?=val($pagelink)?>
        </th>

    </tr>

    </tfoot>
</table>