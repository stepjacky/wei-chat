<link href="/resources/styles/resptextmessage/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="resptextmessageform" method="post">

<fieldset>
<legend>
<h4>编辑[新增]<span class="label label-info">文本消息回复</span></h4>
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
   <td>内容</td>
   <td>            
        <textarea id="Content" name="Content" class="validate[required] input-xlarge"><?=val($Content)?></textarea>
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

<script type="text/javascript" src="/resources/scripts/picture/picture.js" charset="UTF-8"></script>
<script type="text/javascript" src="/resources/bootstrap/js/locales/bootstrap-datepicker.zh-CN.js" charset="UTF-8"></script>
<script type="text/javascript" src="/resources/scripts/resptextmessage/edit.js"></script>