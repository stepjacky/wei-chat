<link href="/resources/styles/locationmessage/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="locationmessageform" method="post">

<fieldset>
<legend>
<h4>编辑[新增]<span class="label label-info">地理位置消息</span></h4>
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
   <td>地理位置纬度</td>
   <td>            
        <input name="Location_X" id="Location_X" type="text" value="<?=val($Location_X)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>地理位置经度</td>
   <td>            
        <input name="Location_Y" id="Location_Y" type="text" value="<?=val($Location_Y)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>地图缩放大小</td>
   <td>            
        <input name="Scale" id="Scale" type="text" value="<?=val($Scale)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>地理位置信息</td>
   <td>            
        <input name="Label" id="Label" type="text" value="<?=val($Label)?>" class="validate[required]" />
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
<script type="text/javascript" src="/resources/scripts/locationmessage/edit.js"></script>