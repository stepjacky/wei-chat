<link href="/resources/styles/cardcatalog/style.css" media="screen" rel="stylesheet" type="text/css" />
<h3>会员卡列表</h3>
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th colspan="4">
            <a type="button" class="btn btn-info"
                    href="/cardcatalog/editNew"
                >
             <i class="icon-plus"></i>新增会员卡
            </a>
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
              <?=$picurl?>
            </td> 
                      
                      
                      
             <td>
                 <span class="label label-<?=$enabled?'success':'danger'?>">
                      <?=$enabled?'启用中':'停用中'?>

                  </span>
              <button class=" btn btn-inverse btn-small" type="button"
                      onclick="toggleProp('cardcatalog','enabled','<?=$id?>')">
                  <span class="icon icon-color icon-wrench"></span>切換
              </button>
             </td>
                      
           <td>
             <a class="btn btn-success btn-small  "
                type="button"
                href="/cardcatalog/editNew/<?=$id;?>">
               <i class="icon-edit"></i>
             </a>
             <button class="btn btn-danger btn-small" type="button" onclick="removeOne('<?=$id;?>');">
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