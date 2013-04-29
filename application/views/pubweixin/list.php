<link href="/resources/styles/pubweixin/style.css" media="screen" rel="stylesheet" type="text/css" />
<h3>公众账号列表</h3>
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th colspan="12">
            <button type="button" class="btn btn-info" onclick="newOne();">
             <i class="icon-plus"></i>新增公众账号
            </button>
          </th>
        </tr>
        <tr>
                <th>公众号名称</th>
                         
                <th>微信号</th>

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
             <img src="<?=$avatar?>" width="24px" height="24px" />
                    <?=$name?>
                </td>

                      
                <td>
              <?=$weixin?>             
            </td>

                      
                <td>
              <?=$qq?>             
            </td>  
                      

                      
           <td class="btn-group">

             <button class="btn btn-info" type="button" onclick="managerMessage('<?=$weixin_id;?>');">
               <i class="icon-edit"></i>管理
             </button>

             <button class="btn btn-success" type="button" onclick="editOne('<?=$weixin_id;?>');">
               <i class="icon-edit"></i>编辑
             </button>
             <button class="btn btn-danger" type="button" onclick="removeOne('<?=$weixin_id;?>');">
               <i class="icon-remove"></i>删除
             </button>
             <button
                  class="btn  btn-primary"
                  type="button"
                  onclick="showConnector('<?=$weixin_id?>');"
                 >
                 <i class="icon-tags"></i>
                 接口
             </button>
           </td>
           </tr>
        <?php endforeach; ?>
        
        
        </tbody>
        <tfoot>
        <tr>          
            <td colspan="12">
                <?=$pagelink;?>
            </td>
        </tr>
        </tfoot>
    </table>
<script type="text/javascript" src="/resources/scripts/list.js"></script>
<script type="text/javascript" src="/resources/scripts/pubweixin/list.js"></script>