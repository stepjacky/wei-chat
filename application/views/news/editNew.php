<link href="/resources/styles/news/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="newsform" method="post">

<fieldset>
<legend>
<h4>编辑[新增]<span class="label label-info">图文消息</span></h4>
</legend>
<table class="table table-hover table-bordered">
<tbody>

<input id="id" type="hidden" name="id" value="<?=val($id)?>" />
  
     
  
     <tr>
   <td>标题</td>
   <td>            
        <input name="name" id="title" type="text" value="<?=val($name)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>说明</td>
   <td>            
        <textarea id="info" name="info" class="validate[required]"><?=val($info)?></textarea>
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>图片链接</td>
   <td>            
        <div>
 <img src="<?=val($picurl)?>" style="width:100px;height:55px" id="imageid" />
 <input id="picurl" name="picurl" type="hidden" value="<?=val($picurl)?>" />
 <button type="button" class=" btn btn-info" onclick="imageSelector('imageid','picurl')">选择图片</button>
</div>
   </td>     
   
</tr>
  
  
     
  
  <!--   <tr>
   <td>
       点击跳转

   </td>
   <td>
       <p>
           <button class="btn btn-success"
                   type="button"
                   onclick="useLotteryUrl('url')">使用大转盘链接</button>

       </p>
       <p>
        <span class="label label-info">
                 如有值,则当前内容被忽略,直接跳转此链接
        </span>
       </p>
      <textarea id="url" name="url" class="input-xxlarge"><?/*=$url;*/?></textarea>

   </td>     

</tr>-->


     <tr>
   <td>内容</td>
   <td>
        <?=$my_editor;?>
   </td>

</tr>

  
     
  
</tbody>
<tfoot>
  <tr>
   <td>
           
   </td>
   <td>
   <button class="btn btn-success" id="saveBtn" type="button">保存</button>
      <button class="btn" type="reset">重置</button> 
   </td>
  </tr>
</tfoot>     
</table>
</fieldset>
</form>

<script type="text/javascript" src="/resources/scripts/userpicture/picture.js" charset="UTF-8"></script>
<script type="text/javascript" src="/resources/bootstrap/js/locales/bootstrap-datepicker.zh-CN.js" charset="UTF-8"></script>
<script type="text/javascript" src="/resources/scripts/news/edit.js"></script>