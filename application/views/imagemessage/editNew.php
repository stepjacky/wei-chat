<link href="/resources/styles/imagemessage/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="imagemessageform" method="post">

<fieldset>
<legend>
<h4>编辑[新增]<span class="label label-info">图片消息</span></h4>
</legend>
<table class="table table-hover table-bordered">
<tbody>
      <input id="MsgId" type="hidden" name="MsgId" value="<?=val($MsgId)?>" />
      
  
  
     
  
    
  
  
     
  
     <tr>
   <td>开发者微信号</td>
   <td>            
        <input name="ToUserName" id="ToUserName" type="text" value="<?=val($ToUserName)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>发送方帐号</td>
   <td>            
        <input name="FromUserName" id="FromUserName" type="text" value="<?=val($FromUserName)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>消息创建时间</td>
   <td>            
        <input name="CreateTime" id="CreateTime" type="text" value="<?=val($CreateTime)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>图片链接</td>
   <td>            
        <input name="PicUrl" id="PicUrl" type="text" value="<?=val($PicUrl)?>" class="validate[required] input-xxlarge" />
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
<script type="text/javascript" src="/resources/scripts/imagemessage/edit.js"></script>