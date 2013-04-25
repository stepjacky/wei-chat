<link href="/resources/styles/textmessage/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="textmessageform" method="post">

<fieldset>
<legend>
<h4>编辑[新增]<span class="label label-info">文本消息</span></h4>
</legend>
<table class="table table-hover table-bordered">
<tbody>
      <input id="MsgId" type="hidden" name="MsgId" value="<?=val($MsgId)?>" />
      
  
  
     
  
    
  
  
     
  
     <tr>
   <td>目标用户</td>
   <td>            
        <input name="ToUserName" id="ToUserName" type="text" value="<?=val($ToUserName)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>发送者</td>
   <td>            
        <input name="FromUserName" id="FromUserName" type="text" value="<?=val($FromUserName)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>创建时间</td>
   <td>            
        <input type="text" name="CreateTime" id="CreateTime" data-date-format="yyyy-mm-dd" readonly="true" class=" datepicker validate[required]" value="<?=val($CreateTime)?>" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>内容</td>
   <td>            
        <textarea id="Content" name="Content" class="validate[required]"><?=val($Content)?></textarea>
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
<script type="text/javascript" src="/resources/scripts/textmessage/edit.js"></script>