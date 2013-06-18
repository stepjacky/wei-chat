<link href="/resources/styles/lotterydial/style.css" media="screen" rel="stylesheet" type="text/css" />
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th colspan="20">
            <a
                type="button"
                class="btn btn-info"
                href="/lotterydial/editNew"
                >
             <i class="icon-plus"></i>新增抽奖大转盘
            </a>
          </th>
        </tr>
        <tr>
                         
                <th>名称</th>

                <th>说明</th>
                         
                <th>起始日期</th>
                         
                <th>结束日期</th>


                <th>状态</th>

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
              <?=$remark?>             
            </td> 


                <td>
              <?=$startdate?>             
            </td> 

                <td>
              <?=$enddate?>             
            </td> 
                      


               <td>
                  <span class="label label-<?=$enabled?'success':'danger'?>">
                      <?=$enabled?'启用中':'停用'?>

                  </span>
               </td>
                      
           <td class="btn-group">
             <a
                 class="btn btn-success"
                 type="button"
                 href="/lotterydial/editNew/<?=$id?>"
                 >
               <i class="icon-edit"></i>
             </>
             <button class="btn btn-danger" type="button" onclick="removeOne('<?=$id;?>');">
               <i class="icon-remove"></i>
             </button>
               <button class=" btn btn-inverse"
                       type="button"
                       onclick="toggleProp('lotterydial','enabled','<?=$id?>')">
                   <span class="icon icon-color icon-wrench"></span>
                   <?=$enabled?'禁用':'启用'?>
               </button>
           </td>
           </tr>
        <?php endforeach; ?>
        
        
        </tbody>
        <tfoot>
        <tr>          
            <td colspan="20">
                <?=$pagelink;?>
            </td>
        </tr>
        </tfoot>
    </table>
<script type="text/javascript" src="/resources/scripts/list.js"></script>
<script type="text/javascript" src="/resources/scripts/lotterydial/list.js"></script>