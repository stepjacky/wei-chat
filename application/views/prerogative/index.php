<link href="/resources/styles/prerogative/style.css" media="screen" rel="stylesheet" type="text/css" />
<h3>会员特权列表</h3>
<table id="list" class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <th colspan="5" class="btn-group">
            <a class=" btn btn-info btn-small"
               type="button"
               href="/prerogative/editNew?cid=<?=$cid?>"

                >
                <span class="icon icon-color icon-wrench"></span>添加特权
            </a>

            <button class=" btn btn-inverse btn-small"
               type="button"
               onclick="doPost('/cardcatalog/lists')"

                >
                <span class="icon icon-color icon-wrench"></span>返回会员卡
            </button>
        </th>
    </tr>
    <tr>

        <th>名称</th>
        <th>内容</th>
        <th>管理</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($beans as $bean):?>
        <?php
        extract($bean);
        ?>
        <tr>

            <td>
                <?=$name?>
            </td>

            <td>
                <?=$content?>
            </td>


            <td>
                <a
                    class="btn btn-success"
                    type="button"
                    href="/prerogative/editNew/<?=$id?>"
                    >
                    <i class="icon-edit"></i>
                </a>
                <button class="btn btn-danger" type="button" onclick="removeOne('<?=$id;?>');">
                    <i class="icon-remove"></i>
                </button>
            </td>
        </tr>
    <?php endforeach; ?>


    </tbody>
    <tfoot>

    </tfoot>
</table>
<script type="text/javascript" src="/resources/scripts/list.js"></script>
<script type="text/javascript" src="/resources/scripts/prerogative/list.js"></script>