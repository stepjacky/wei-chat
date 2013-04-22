<link href="/resources/styles/couponcatalog/style.css" media="screen" rel="stylesheet" type="text/css" />
<h3>优惠券类别列表</h3>
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th colspan="11">
            <button type="button" class="btn btn-info" onclick="newOne();">
             <i class="icon-plus"></i>新增优惠券类别
            </button>
          </th>
        </tr>
        <tr>
                <th>编号</th> 
                         
                <th>名称</th> 
                         
                <th>发行数量</th> 
                         
                <th>优惠券图</th> 
                         
                <th>起始日期</th> 
                         
                <th>结束日期</th> 
                         
                <th>优惠策略</th> 
                         
                <th>商家</th> 
                         
                <th>日领取数</th> 
                         
                         
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
              <?=val($id)?>             
            </td>  
                      
                <td>
              <?=val($name)?>             
            </td>  
                      
                <td>
              <?=val($amount)?>             
            </td>  
                      
                <td>
              <?=val($image)?>             
            </td>  
                      
                <td>
              <?=val($startdate)?>             
            </td>  
                      
                <td>
              <?=val($enddate)?>             
            </td>  
                      
                <td>
              <?=val($couponpolicy_id)?>             
            </td>  
                      
                <td>
              <?=val($merchant_id)?>             
            </td>  
                      
                <td>
              <?=val($daily_limit)?>             
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
<script type="text/javascript" src="/resources/scripts/couponcatalog/list.js"></script>