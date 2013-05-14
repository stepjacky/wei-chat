<link href="/resources/styles/lotterydial/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="lotterydialform" method="post">

<fieldset>
<legend>
<h4>编辑[新增]<span class="label label-info">抽奖大转盘</span></h4>
</legend>
<table class="table table-hover table-bordered">
<tbody>
      <input type="hidden" name="id" id="id" value="<?=val($id)?>" />
      
  
  
     
  
     <tr>
   <td>名称</td>
   <td>            
        <input name="name" id="name" type="text" value="<?=val($name)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>一等奖数</td>
   <td>            
        <input name="firstnum" id="firstnum" type="text" value="<?=val($firstnum)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>一等奖说明</td>
   <td>            
        <textarea id="firstmsg" name="firstmsg" class="validate[required]"><?=val($firstmsg)?></textarea>
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>二等奖数</td>
   <td>            
        <input name="secondnum" id="secondnum" type="text" value="<?=val($secondnum)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>二等奖说明</td>
   <td>            
        <textarea id="secondmsg" name="secondmsg" class="validate[required]"><?=val($secondmsg)?></textarea>
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>三等奖数</td>
   <td>            
        <input name="thirdnum" id="thirdnum" type="text" value="<?=val($thirdnum)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>三等奖说明</td>
   <td>            
        <textarea id="thirdmsg" name="thirdmsg" class="validate[required]"><?=val($thirdmsg)?></textarea>
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>预计人数</td>
   <td>            
        <input name="futures" id="futures" type="text" value="<?=val($futures)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>说明</td>
   <td>            
        <textarea id="remark" name="remark" class="validate[required]"><?=val($remark)?></textarea>
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>抽奖成功消息</td>
   <td>            
        <textarea id="success" name="success" class="validate[required]"><?=val($success)?></textarea>
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>抽奖失败消息</td>
   <td>            
        <textarea id="failure" name="failure" class="validate[required]"><?=val($failure)?></textarea>
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>开始消息</td>
   <td>            
        <textarea id="start" name="start" class="validate[required]"><?=val($start)?></textarea>
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>起始日期</td>
   <td>            
        <input type="text" name="startdate" id="startdate" data-date-format="yyyy-mm-dd" readonly="true" class=" datepicker validate[required]" value="<?=val($startdate)?>" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>结束消息</td>
   <td>            
        <textarea id="end" name="end" class="validate[required]"><?=val($end)?></textarea>
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>j结束日期</td>
   <td>            
        <input type="text" name="enddate" id="enddate" data-date-format="yyyy-mm-dd" readonly="true" class=" datepicker validate[required]" value="<?=val($enddate)?>" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>商家验证</td>
   <td>            
        <input name="code" id="code" type="text" value="<?=val($code)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>是否启用</td>
   <td>            
        <input type="checkbox" id="enabled" name="enabled" value="<?=val($enabled)?>" class="validate[required]" />
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
<script type="text/javascript" src="/resources/scripts/lotterydial/edit.js"></script>