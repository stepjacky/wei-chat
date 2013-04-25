<link href="/resources/styles/userpicture/style.css" media="screen" rel="stylesheet" type="text/css" />
<h3>用户图片列表</h3>
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th colspan="9">
            <button type="button" class="btn btn-info" onclick="newOne();">
             <i class="icon-plus"></i>新增用户图片
            </button>
          </th>
        </tr>
        <tr>
                         
                <th>名称</th> 
                         
                <th>路径</th> 
                         
                <th>类型</th> 
                         
                <th>宽度</th> 
                         
                <th>高度</th> 
                         
                <th>日期</th> 
                         
                <th>所属商家</th> 
                         
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
              <?=$path?>             
            </td>  
                      
                <td>
              <?=$ptype?>             
            </td>  
                      
                <td>
              <?=$width?>             
            </td>  
                      
                <td>
              <?=$height?>             
            </td>  
                      
                <td>
              <?=$firedate?>             
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
            <td colspan="9">
                <?=$pagelink;?>
            </td>
        </tr>
        </tfoot>
    </table>
<script type="text/javascript" src="/resources/scripts/list.js"></script>
<script type="text/javascript" src="/resources/scripts/userpicture/list.js"></script>