<link href="/resources/styles/couponcatalog/style.css" media="screen" rel="stylesheet" type="text/css" />
<h3>优惠券列表</h3>
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th colspan="7" >
            <a
                type="button"
                class="btn btn-info"
                href="/couponcatalog/editNew"
                >
             <i class="icon-plus"></i>新增优惠券
            </a>

          </th>
        </tr>
        <tr>
                         
                <th>关键字</th>
                <th>名称</th>

                <th>发行数量</th>
                         
                <th>起始日期</th> 
                         
                <th>结束日期</th>

                <th>日领取数</th> 
                         
                         
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
              <?=$keyword?>
            </td>  

                <td>
              <?=$name?>
            </td>

                <td>
              <?=$amount?>             
            </td>  

                <td>
              <?=$startdate?>             
            </td>  
                      
                <td>
              <?=$enddate?>             
            </td>  

                      
                <td>
              <?=$daily_limit?>             
            </td>  
                      
                      
           <td class="btn-group">
             <a
                 class="btn btn-success btn-small"
                 type="button"
                 href="/couponcatalog/editNew/<?=$id?>">
               <i class="icon-edit"></i>
             </a>
              <a
                 class="btn btn-info btn-small"
                 type="button"
                 href="/coupon/lists?catalog_id=<?=$id?>">
               <i class="icon-edit"></i>验证信息
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
            <td colspan="10">
                <?=$pagelink;?>
            </td>
        </tr>
        </tfoot>
    </table>
<script type="text/javascript" src="/resources/scripts/list.js"></script>
<script type="text/javascript" src="/resources/scripts/couponcatalog/list.js"></script>