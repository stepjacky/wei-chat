<link href="/resources/styles/respnewsmessage/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="respnewsmessageform" method="post">

<fieldset>
<legend>
<h4>编辑[新增]<span class="label label-info">图文消息回复</span></h4>
</legend>
<table class="table table-hover table-bordered">
<tbody>
      <input type="hidden" name="id" id="id" value="<?=val($id)?>" />
      
  
  
     
  
    
  
  
     
  
     <tr>
   <td>接收用户</td>
   <td>            
        <input name="ToUserName" id="ToUserName" type="text" value="<?=val($ToUserName)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
    
  
  
     
  
     <tr>
   <td>发送时间</td>
   <td>            
        <input name="CreateTime" id="CreateTime" type="text" value="<?=val($CreateTime)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>标题</td>
   <td>            
        <input name="Title" id="Title" type="text" value="<?=val($Title)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>描述</td>
   <td>            
        <textarea id="Description" name="Description" class="validate[required] input-xxlarge"><?=val($Description)?></textarea>
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>图片链接</td>
   <td>            
        <input name="PicUrl" id="PicUrl" type="text" value="<?=val($PicUrl)?>" class="validate[required] input-xxlarge" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>点击链接</td>
   <td>            
        <input name="Url" id="Url" type="text" value="<?=val($Url)?>" class="validate[required] input-xxlarge" />
   </td>     
   
</tr>
  
  
     
  
      <input type="hidden" name="parent" id="parent" value="<?=val($parent)?>" />
      
  
  
     
  
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

<script type="text/javascript" src="/resources/scripts/picture/picture.js" charset="UTF-8"></script>
<script type="text/javascript" src="/resources/bootstrap/js/locales/bootstrap-datepicker.zh-CN.js" charset="UTF-8"></script>
<script type="text/javascript" src="/resources/scripts/respnewsmessage/edit.js"></script>