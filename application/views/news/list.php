<link href="/resources/styles/news/style.css" media="screen" rel="stylesheet" type="text/css" />
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th colspan="6">
            <a
                type="button"
                class="btn btn-info"
                href="/news/editNew"
                >
             <i class="icon-plus"></i>新增图文消息
            </a>
          </th>
        </tr>
        <tr>
                         
                <th>标题</th> 
                
                         
                <th>说明</th> 
                
                         
                <th>图片链接</th> 
                
                         
                         
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
              <?=$name?>
            </td> 
                      
                <td>
              <?=$info?>             
            </td> 
                      
                <td>
              <?=$picurl?>             
            </td> 
                      
                      
           <td>
             <a
                 class="btn btn-success"
                 type="button"
                 href="/news/editNew/<?=$id;?>"
                 >
               <i class="icon-edit"></i>
             </a>
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
<script type="text/javascript" src="/resources/scripts/news/list.js"></script>