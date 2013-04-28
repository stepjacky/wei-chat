<link href="/resources/styles/respmusicmessage/style.css" media="screen" rel="stylesheet" type="text/css" />
<h3>音乐消息回复列表</h3>
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th colspan="11">
            <button type="button" class="btn btn-info" onclick="newOne();">
             <i class="icon-plus"></i>新增音乐消息回复
            </button>
          </th>
        </tr>
        <tr>
                <th>关键字</th>

                <th>标题</th> 
                         
                <th>描述</th>
                         
                <th>语音链接</th>

                <th>高品质语音链接</th>

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
              <?=$keywords?>
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