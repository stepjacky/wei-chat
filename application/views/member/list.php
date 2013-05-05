<link href="/resources/styles/member/style.css" media="screen" rel="stylesheet" type="text/css" />
<h3>会员列表</h3>
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>

                <th>公众号ID</th>
                <th>微信ID</th>
                         
                         
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
              <?=$fromuser?>
            </td> 
                      
                <td>
              <?=$weixin?>             
            </td>
                      
           <td>
             <button class="btn btn-danger" type="button" onclick="removeOne('<?=$id;?>');">
               <i class="icon-remove"></i>
             </button>
           </td>
           </tr>
        <?php endforeach; ?>
        
        
        </tbody>
        <tfoot>
        <tr>          
            <td colspan="6">
                <?=$pagelink;?>
            </td>
        </tr>
        </tfoot>
    </table>
<script type="text/javascript" src="/resources/scripts/list.js"></script>
<script type="text/javascript" src="/resources/scripts/member/list.js"></script>