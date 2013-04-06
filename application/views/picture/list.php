<link href="/resources/styles/picture/style.css" media="screen" rel="stylesheet" type="text/css" />
<h3>图片列表</h3>
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th colspan="6">
            <button type="button" class="btn btn-info" onclick="newOne();">
             <i class="icon-plus"></i>新增图片
            </button>
          </th>
        </tr>
        <tr>
                <th>编号</th> 
                         
                <th>名称</th> 
                         
                <th>手机编号</th> 
                         
                <th>动态编号</th> 
                         
                <th>路径</th> 
                         
            <th>管理</th>
        </tr>
        </thead>
        <tbody>

            <?php foreach($datasource as $bean):?>
           <tr>
                <td>
              <?=$bean['id']?>               
            </td>  
                      
                <td>
              <?=$bean['name']?>               
            </td>  
                      
                <td>
              <?=$bean['phone_id']?>               
            </td>  
                      
                <td>
              <?=$bean['trends_id']?>               
            </td>  
                      
                <td>
              <?=$bean['path']?>               
            </td>  
                      
           <td>
             <button class="btn btn-success" type="button" onclick="editOne('<?php echo $bean['id'];?>');">
               <i class="icon-edit"></i>
             </button>
             <button class="btn btn-danger" type="button" onclick="removeOne('<?php echo $bean['id'];?>');">
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
<script type="text/javascript" src="/resources/scripts/picture/list.js"></script>