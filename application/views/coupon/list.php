<link href="/resources/styles/coupon/style.css" media="screen" rel="stylesheet" type="text/css" />
<h3>优惠券记录列表</h3>
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th colspan="8">
            <button type="button" class="btn btn-info" onclick="newOne();">
             <i class="icon-plus"></i>新增优惠券记录
            </button>
          </th>
        </tr>
        <tr>
                         
                         
                <th>验证类型</th> 
                         
                <th>验证码</th> 
                         
                <th>使用时间</th> 
                         
                <th>所属优惠券</th> 
                         
                <th>领取人</th> 
                         
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
              <?=$name?>             
            </td>  
                      
                <td>
              <?=$validator?>             
            </td>  
                      
                <td>
              <?=$cvcode?>             
            </td>  
                      
                <td>
              <?=$firedate?>             
            </td>  
                      
                <td>
              <?=$catalog_id?>             
            </td>  
                      
                <td>
              <?=$member_id?>             
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
            <td colspan="8">
                <?=$pagelink;?>
            </td>
        </tr>
        </tfoot>
    </table>
<script type="text/javascript" src="/resources/scripts/list.js"></script>
<script type="text/javascript" src="/resources/scripts/coupon/list.js"></script>