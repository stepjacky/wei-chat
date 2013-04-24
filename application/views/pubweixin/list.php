<link href="/resources/styles/pubweixin/style.css" media="screen" rel="stylesheet" type="text/css" />
<h3>公众账号列表</h3>
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th colspan="11">
            <button type="button" class="btn btn-info" onclick="newOne();">
             <i class="icon-plus"></i>新增公众账号
            </button>
          </th>
        </tr>
        <tr>
                <th>原始微信号</th> 
                         
                <th>令牌</th> 
                         
                <th>公众号名称</th> 
                         
                <th>微信号</th> 
                         
                <th>头像</th> 
                         
                <th>AppId</th> 
                         
                <th>AppSecret</th> 
                         
                <th>图文页统计代码</th> 
                         
                <th>公众账号QQ</th> 
                         
                         
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
              <?=$token?>             
            </td>  
                      
                <td>
              <?=$name?>             
            </td>  
                      
                <td>
              <?=$weixin?>             
            </td>  
                      
                <td>
              <?=$avatar?>             
            </td>  
                      
                <td>
              <?=$appid?>             
            </td>  
                      
                <td>
              <?=$appsecret?>             
            </td>  
                      
                <td>
              <?=$statlink?>             
            </td>  
                      
                <td>
              <?=$qq?>             
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
            <td colspan="11">
                <?=$pagelink;?>
            </td>
        </tr>
        </tfoot>
    </table>
<script type="text/javascript" src="/resources/scripts/list.js"></script>
<script type="text/javascript" src="/resources/scripts/pubweixin/list.js"></script>