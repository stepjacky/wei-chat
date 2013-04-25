<link href="/resources/styles/credits/style.css" media="screen" rel="stylesheet" type="text/css" />
<h3>会员积分列表</h3>
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th colspan="6">
            <button type="button" class="btn btn-info" onclick="newOne();">
             <i class="icon-plus"></i>新增会员积分
            </button>
          </th>
        </tr>
        <tr>
                         
                <th>分值</th> 
                         
                <th>积分日期</th> 
                         
                <th>积分用户</th> 
                         
                <th>积分优惠券</th> 
                         
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
              <?=$id?>             
            </td>  
                      
                <td>
              <?=$amount?>             
            </td>  
                      
                <td>
              <?=$firedate?>             
            </td>  
                      
                <td>
              <?=$member_id?>             
            </td>  
                      
                <td>
              <?=$catalog_id?>             
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
            <td colspan="6">
                <?=$pagelink;?>
            </td>
        </tr>
        </tfoot>
    </table>
<script type="text/javascript" src="/resources/scripts/list.js"></script>
<script type="text/javascript" src="/resources/scripts/credits/list.js"></script>