<link href="/resources/styles/imagemessage/style.css" media="screen" rel="stylesheet" type="text/css" />
<h3>图片消息列表</h3>
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th colspan="7">
            <button type="button" class="btn btn-info" onclick="newOne();">
             <i class="icon-plus"></i>新增图片消息
            </button>
          </th>
        </tr>
        <tr>
                         
                <th>消息类型</th> 
                         
                <th>开发者微信号</th> 
                         
                <th>发送方帐号</th> 
                         
                <th>消息创建时间</th> 
                         
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
              <?=$MsgId?>             
            </td>  
                      
                <td>
              <?=$msgType?>             
            </td>  
                      
                <td>
              <?=$ToUserName?>             
            </td>  
                      
                <td>
              <?=$FromUserName?>             
            </td>  
                      
                <td>
              <?=$CreateTime?>             
            </td>  
                      
                <td>
              <?=$PicUrl?>             
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
<script type="text/javascript" src="/resources/scripts/imagemessage/list.js"></script>