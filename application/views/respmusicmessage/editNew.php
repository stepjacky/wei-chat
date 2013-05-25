<link href="/resources/styles/respmusicmessage/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="respmusicmessageform" method="post">

<fieldset>
<legend>
<h4>编辑[新增]<span class="label label-info">语音消息回复</span></h4>
</legend>
<table class="table table-hover table-bordered">
<tbody>
      <input id="id" type="hidden" name="id" value="<?=val($id)?>" />
      
  
  
     
  
     <tr>
   <td>关键字</td>
   <td>            
        <input name="keyword" id="keyword" type="text" value="<?=val($keyword)?>" class="validate[required] input-xxlarge" />
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
  
  
     
  
     <tr>
   <td>语音链接</td>
   <td>            
        <input name="MusicUrl" id="MusicUrl" type="text" value="<?=val($MusicUrl)?>" class="validate[required] input-xxlarge" />
   </td>     
   
</tr>
  
  
     
  
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