<link href="/resources/styles/respmusicmessage/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="respmusicmessageform" method="post">

<fieldset>
<legend>
<h4>编辑[新增]<span class="label label-info">消息发送</span></h4>
</legend>
<table class="table table-hover table-bordered">
<tbody>
      <input id="MsgId" type="hidden" name="MsgId" value="<?=val($MsgId)?>" />
  
  
     
  
     <tr>
   <td>消息类型</td>
   <td>            
        <select name="msgType" id="msgType" class="validate[required]"></select>
   </td>     
   
</tr>
  
  
     
  
      <input id="ToUserName" type="hidden" name="ToUserName" value="<?=val($ToUserName)?>" />
  
  
     
  
      <input id="FromUserName" type="hidden" name="FromUserName" value="<?=val($FromUserName)?>" />
  
  
     
  
      <input id="CreateTime" type="hidden" name="CreateTime" value="<?=val($CreateTime)?>" />
  
  
     
  
      <input id="Title" type="hidden" name="Title" value="<?=val($Title)?>" />
  
  
     
  
      <input id="Description" type="hidden" name="Description" value="<?=val($Description)?>" />
  
  
     
  
      <input id="MusicUrl" type="hidden" name="MusicUrl" value="<?=val($MusicUrl)?>" />
  
  
     
  
      <input id="HQMusicUrl" type="hidden" name="HQMusicUrl" value="<?=val($HQMusicUrl)?>" />
  
  
     
  
      <input id="FuncFlag" type="hidden" name="FuncFlag" value="<?=val($FuncFlag)?>" />
  
  
     
  
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
<script type="text/javascript" src="/resources/scripts/respmusicmessage/edit.js"></script>