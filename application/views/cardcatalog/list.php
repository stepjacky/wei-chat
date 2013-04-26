<link href="/resources/styles/cardcatalog/style.css" media="screen" rel="stylesheet" type="text/css" />
<h3>会员卡列表</h3>
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th colspan="7">
            <button type="button" class="btn btn-info" onclick="newOne();">
             <i class="icon-plus"></i>新增会员卡
            </button>
          </th>
        </tr>
        <tr>
                         
                <th>名称</th> 
                
                         
                <th>模板</th> 
                
                         
                         
                         
                <th>启用</th> 
                
                         
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
              <?=$image?>             
            </td> 
                      
                      
                      
             <td>
              <button class=" btn btn-inverse btn-small" type="button"
                      onclick="toggleProp('cardcatalog','defed','<?=$id?>')">
                  <span class="icon icon-color icon-wrench"></span>切換
              </button>
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
<script type="text/javascript" src="/resources/scripts/cardcatalog/list.js"></script>