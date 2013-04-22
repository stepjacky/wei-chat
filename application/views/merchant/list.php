<link href="/resources/styles/merchant/style.css" media="screen" rel="stylesheet" type="text/css" />
<h3>商户列表</h3>
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th colspan="6">
            <button type="button" class="btn btn-info" onclick="newOne();">
             <i class="icon-plus"></i>新增商户
            </button>
          </th>
        </tr>
        <tr>
                <th>编号</th> 
                         
                <th>名称</th> 
                         
                <th>地址</th> 
                         
                <th>电话</th> 
                         
                <th>密码</th> 
                         
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
              <?=val($address)?>             
            </td>  
                      
                <td>
              <?=val($phone)?>             
            </td>  
                      
                <td>
              <?=val($pword)?>             
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
<script type="text/javascript" src="/resources/scripts/merchant/list.js"></script>