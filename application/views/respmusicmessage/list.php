<link href="/resources/styles/respmusicmessage/style.css" media="screen" rel="stylesheet" type="text/css" />
<h3>消息发送列表</h3>
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th colspan="11">
            <button type="button" class="btn btn-info" onclick="newOne();">
             <i class="icon-plus"></i>新增消息发送
            </button>
          </th>
        </tr>
        <tr>
                         
                <th>消息类型</th> 
                         
                         
                         
                         
                         
                         
                         
                         
                         
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
              <?=$Title?>             
            </td>  
                      
                <td>
              <?=$Description?>             
            </td>  
                      
                <td>
              <?=$MusicUrl?>             
            </td>  
                      
                <td>
              <?=$HQMusicUrl?>             
            </td>  
                      
                <td>
              <?=$FuncFlag?>             
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
<script type="text/javascript" src="/resources/scripts/respmusicmessage/list.js"></script>