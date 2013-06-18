<link href="/resources/styles/resptextmessage/style.css" media="screen" rel="stylesheet" type="text/css" />
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th colspan="8">
            <a type="button"
               class="btn btn-info"
               href="/resptextmessage/editNew"
                >
             <i class="icon-plus"></i>新增文本消息回复
            </a>
          </th>
        </tr>
        <tr>
                         
                <th>关键字</th>
                <th>内容</th>

            <th>管理</th>
        </tr>
        </thead>
        <tbody>

            <?php foreach($datasource as $bean):?>
            <?php
               extract($bean);
            ?>
           <tr>
             <td><?=$keyword?></td>
             <td><?=$Content?></td>

           <td>
             <a class="btn btn-success" type="button"
                    href="/resptextmessage/editNew/<?=$id;?>">
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
        <tr>          
            <td colspan="8">
                <?=$pagelink;?>
            </td>
        </tr>
        </tfoot>
    </table>
<script type="text/javascript" src="/resources/scripts/list.js"></script>
<script type="text/javascript" src="/resources/scripts/resptextmessage/list.js"></script>