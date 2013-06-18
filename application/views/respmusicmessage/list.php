<link href="/resources/styles/respmusicmessage/style.css" media="screen" rel="stylesheet" type="text/css" />
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th colspan="11">
            <a
                type="button"
                class="btn btn-info"
                href="/respmusicmessage/editNew"
                    >
             <i class="icon-plus"></i>新增音乐消息回复
            </a>
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
              <?=$keyword?>
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
             <a
                 class="btn btn-success"
                 type="button"
                 href="/respmusicmessage/editNew/<?=$id;?>"

                 >
               <i class="icon-edit"></i>
             </a>
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