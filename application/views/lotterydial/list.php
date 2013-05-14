<link href="/resources/styles/lotterydial/style.css" media="screen" rel="stylesheet" type="text/css" />
<h3>抽奖大转盘列表</h3>
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th colspan="20">
            <button type="button" class="btn btn-info" onclick="newOne();">
             <i class="icon-plus"></i>新增抽奖大转盘
            </button>
          </th>
        </tr>
        <tr>
                         
                <th>名称</th> 
                
                         
                <th>一等奖数</th> 
                
                         
                <th>一等奖说明</th> 
                
                         
                <th>二等奖数</th> 
                
                         
                <th>二等奖说明</th> 
                
                         
                <th>三等奖数</th> 
                
                         
                <th>三等奖说明</th> 
                
                         
                <th>预计人数</th> 
                
                         
                <th>说明</th> 
                
                         
                <th>抽奖成功消息</th> 
                
                         
                <th>抽奖失败消息</th> 
                
                         
                <th>开始消息</th> 
                
                         
                <th>起始日期</th> 
                
                         
                <th>结束消息</th> 
                
                         
                <th>j结束日期</th> 
                
                         
                <th>商家验证</th> 
                
                         
                <th>是否启用</th> 
                
                         
                         
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
              <?=$firstnum?>             
            </td> 
                      
                <td>
              <?=$firstmsg?>             
            </td> 
                      
                <td>
              <?=$secondnum?>             
            </td> 
                      
                <td>
              <?=$secondmsg?>             
            </td> 
                      
                <td>
              <?=$thirdnum?>             
            </td> 
                      
                <td>
              <?=$thirdmsg?>             
            </td> 
                      
                <td>
              <?=$futures?>             
            </td> 
                      
                <td>
              <?=$remark?>             
            </td> 
                      
                <td>
              <?=$success?>             
            </td> 
                      
                <td>
              <?=$failure?>             
            </td> 
                      
                <td>
              <?=$start?>             
            </td> 
                      
                <td>
              <?=$startdate?>             
            </td> 
                      
                <td>
              <?=$end?>             
            </td> 
                      
                <td>
              <?=$enddate?>             
            </td> 
                      
                <td>
              <?=$code?>             
            </td> 
                      
             <td>
              <button class=" btn btn-inverse btn-small" type="button" onclick="toggleProp('lotterydial','enabled','<?=$id?>')"><span class="icon icon-color icon-wrench"></span>切換</button>     
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
            <td colspan="20">
                <?=$pagelink;?>
            </td>
        </tr>
        </tfoot>
    </table>
<script type="text/javascript" src="/resources/scripts/list.js"></script>
<script type="text/javascript" src="/resources/scripts/lotterydial/list.js"></script>