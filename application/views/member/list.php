<link href="/resources/styles/member/style.css" media="screen" rel="stylesheet" type="text/css" />
<h3>会员列表</h3>
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th colspan="7">
            <button type="button" class="btn btn-info" onclick="newOne();">
             <i class="icon-plus"></i>新增会员
            </button>
          </th>
        </tr>
        <tr>
                         
                <th>微信</th> 
                         
                <th>昵称</th> 
                         
                <th>电邮</th> 
                         
                <th>会员卡号</th> 
                         
                         
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
              <?=$weixin?>             
            </td>  
                      
                <td>
              <?=$nick?>             
            </td>  
                      
                <td>
              <?=$email?>             
            </td>  
                      
                <td>
              <?=$vip?>             
            </td>  
                      
                <td>
              <?=$merchant_id?>             
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
            <td colspan="7">
                <?=$pagelink;?>
            </td>
        </tr>
        </tfoot>
    </table>
<script type="text/javascript" src="/resources/scripts/list.js"></script>
<script type="text/javascript" src="/resources/scripts/member/list.js"></script>