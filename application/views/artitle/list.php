<link href="/resources/styles/artitle/style.css" media="screen" rel="stylesheet" type="text/css" />
<h3>新闻列表</h3>
<table id="list" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th colspan="10">
            <button type="button" class="btn btn-info" onclick="newOne();">
             <i class="icon-plus"></i>新增新闻
            </button>
          </th>
        </tr>
        <tr>

                         
                <th>标题</th> 
                         
                <th>来源</th> 
                         
                <th>作者</th> 
                         
                <th>摘要</th> 
                         
                <th>发布日期</th> 
                         
                <th>浏览量</th> 
                         
                <th>标签</th> 

                <th>小图</th>

                <th>大图</th>

            <th>管理</th>
        </tr>
        </thead>
        <tbody>

            <?php foreach($datasource as $bean):?>
           <tr>

                      
                <td>
              <?=$bean['name']?>               
            </td>  
                      
                <td>
              <?=$bean['source']?>               
            </td>  
                      
                <td>
              <?=$bean['author']?>               
            </td>  
                      
                <td>
              <?=$bean['summary']?>               
            </td>  
                      
                <td>
              <?=$bean['firedate']?>               
            </td>  
                      
                <td>
              <?=$bean['views']?>               
            </td>  
                      
                <td>
              <?=$bean['tags']?>               
            </td>  

            <td>
                <button class="btn btn-primary " onclick="setPicture('artitle','minipic','<?=val($bean['id'])?>')">

                    <i class="icon-cloud-download"></i>

                </button>

            </td>
 <td>
                <button class="btn btn-success " onclick="setPicture('artitle','largepic','<?=val($bean['id'])?>')">

                    <i class="icon-cloud-upload"></i>

                </button>

            </td>

                      
           <td>
             <button class="btn btn-success" type="button" onclick="editOne('<?php echo $bean['id'];?>');">
               <i class="icon-edit"></i>
             </button>
             <button class="btn btn-danger" type="button" onclick="removeOne('<?php echo $bean['id'];?>');">
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
<script type="text/javascript" src="/resources/scripts/artitle/list.js"></script>