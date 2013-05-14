<link href="/resources/styles/lotterywin/style.css" media="screen" rel="stylesheet" type="text/css" />
<h3>大转盘中奖列表</h3>
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th colspan="10">
            <button type="button" class="btn btn-info" onclick="newOne();">
             <i class="icon-plus"></i>新增大转盘中奖
            </button>
          </th>
        </tr>
        <tr>
                         
                <th>用户微信号</th> 
                
                         
                <th>中奖级别</th> 
                
                         
                <th>商家验证码</th> 
                
                         
                <th>用户手机号</th> 
                
                         
                <th>中奖日期</th> 
                
                         
                         
                         
                         
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
              <?=$weixin_id?>             
            </td> 
                      
                <td>
              <?=$wingrade?>             
            </td> 
                      
                <td>
              <?=$merchant_code?>             
            </td> 
                      
                <td>
              <?=$userphone?>             
            </td> 
                      
                <td>
              <?=$firedate?>             
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
            <td colspan="10">
                <?=$pagelink;?>
            </td>
        </tr>
        </tfoot>
    </table>
<script type="text/javascript" src="/resources/scripts/list.js"></script>
<script type="text/javascript" src="/resources/scripts/lotterywin/list.js"></script>