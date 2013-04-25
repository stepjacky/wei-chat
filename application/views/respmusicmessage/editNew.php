<link href="/resources/styles/respmusicmessage/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="respmusicmessageform" method="post">

<fieldset>
<legend>
<h4>编辑[新增]<span class="label label-info">音乐消息回复</span></h4>
</legend>
<table class="table table-hover table-bordered">
<tbody>
      <input id="id" type="hidden" name="id" value="<?=val($id)?>" />
      
  
  
     
  
     <tr>
   <td>消息类型</td>
   <td>            
        <select name="msgType" id="msgType" class="validate[required]"></select>
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>接收用户</td>
   <td>            
        <input name="ToUserName" id="ToUserName" type="text" value="<?=val($ToUserName)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
    
  
  
     
  
     <tr>
   <td>创建时间</td>
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
        <textarea id="Description" name="Description" class="validate[required]"><?=val($Description)?></textarea>
   </td>     
   
</tr>
  
  
     
  
      <input id="MusicUrl" type="hidden" name="MusicUrl" value="<?=val($MusicUrl)?>" />
      
  
  
     
  
     <tr>
   <td>高品质语音链接</td>
   <td>            
        <input name="HQMusicUrl" id="HQMusicUrl" type="text" value="<?=val($HQMusicUrl)?>" class="validate[required] input-xxlarge" />
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
<script type="text/javascript" src="/resources/scripts/respmusicmessage/edit.js"></script>