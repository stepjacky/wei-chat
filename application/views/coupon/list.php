<link href="/resources/styles/coupon/style.css" media="screen" rel="stylesheet" type="text/css" />
<h3>优惠券记录列表</h3>
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th colspan="8">
            <button type="button" class="btn btn-inverse"
                    onclick="doPost('/couponcatalog/lists')"
                >
             <i class="icon-plus"></i>返回优惠券
            </button>
          </th>
        </tr>
        <tr>

            <th>领取人</th>

            <th>优惠券验证码</th>

            <th>用户验证信息</th>

            <th>商家验证信息</th>

            <th>验证完成时间</th>

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
                   <?=$weixin_id?>
               </td>



               <td>
              <?=$code?>
            </td>  
                      
                <td>
              <?=$memberphone?>
            </td>

               <td>
                   <?=$m_code?>
               </td>
               <td>
              <?=$firedate?>             
            </td>  
                      

                      

                      
           <td>
             <button class="btn btn-danger" type="button" onclick="removeOne('<?=$id;?>');">
               <i class="icon-remove"></i>
             </button>
           </td>
           </tr>
        <?php endforeach; ?>
        
        
        </tbody>
        <tfoot>
        <tr>          
            <td colspan="8">
                <?=$pagelink;?>
            </td>
        </tr>
        </tfoot>
    </table>
<script type="text/javascript" src="/resources/scripts/list.js"></script>
<script type="text/javascript" src="/resources/scripts/coupon/list.js"></script>