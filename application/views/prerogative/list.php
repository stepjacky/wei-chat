<link href="/resources/styles/prerogative/style.css" media="screen" rel="stylesheet" type="text/css" />
<h3>会员特权列表</h3>
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th colspan="5">
              <a class=" btn btn-info btn-small"
                 type="button"
                 href="/prerogative/editNew?cid=<?=$id?>"

                  >
                  <span class="icon icon-color icon-wrench"></span>添加特权
              </a>
          </th>
        </tr>
        <tr>
                         
                <th>名称</th> 
                
                         
                <th>内容</th> 
                
                         
                         
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
              <?=$content?>             
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
            <td colspan="5">
                <?=$pagelink;?>
            </td>
        </tr>
        </tfoot>
    </table>
<script type="text/javascript" src="/resources/scripts/list.js"></script>
<script type="text/javascript" src="/resources/scripts/prerogative/list.js"></script>