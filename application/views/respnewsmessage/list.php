<link href="/resources/styles/respnewsmessage/style.css" media="screen" rel="stylesheet" type="text/css" />
<h3>图文消息回复列表</h3>
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th colspan="11">
            <button type="button" class="btn btn-info" onclick="newOne();">
             <i class="icon-plus"></i>新增图文消息回复
            </button>
          </th>
        </tr>
        <tr>
                <th>关键字</th>
            <th>管理</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($datasource as $bean):?>
            <?php
               extract($bean);
            ?>
           <tr>

            <td>
              <?=$keywords?>
            </td>
                      
           <td>
             <button class="btn btn-success" type="button" onclick="editOne('<?=$id;?>');">
               <i class="icon-edit"></i>
             </button>
             <button class="btn btn-danger" type="button" onclick="removeOne('<?=$id;?>');">
               <i class="icon-remove"></i>
             </button>
           </td>
           </tr>
        <?php endforeach; ?>
        
        
        </tbody>
        <tfoot>
        <tr>          
            <td colspan="11">
                <?=$pagelink;?>
            </td>
        </tr>
        </tfoot>
    </table>
<script type="text/javascript" src="/resources/scripts/list.js"></script>
<script type="text/javascript" src="/resources/scripts/respnewsmessage/list.js"></script>