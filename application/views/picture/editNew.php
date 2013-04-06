
<link href="/resources/styles/picture/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="pictureform" method="post" >

<fieldset>
<legend>编辑/新增-图片</legend>
<table class="table table-hover table-bordered">
<tbody>
      <input id="id" type="hidden" name="id" value="<?php echo isset($id)?$id:''?>" />
  
  
     
  
     <tr>
   <td>名称</td>
   <td>            
        <input name="name" id="name" type="text" value="<?php echo isset($name)?$name:''?>" />
   </td>     
   
<tr>
  
  
     
  
     <tr>
   <td>手机编号</td>
   <td>            
        <input name="phone_id" id="phone_id" type="text" value="<?php echo isset($phone_id)?$phone_id:''?>" />
   </td>     
   
<tr>
  
  
     
  
     <tr>
   <td>动态编号</td>
   <td>            
        <input name="trends_id" id="trends_id" type="text" value="<?php echo isset($trends_id)?$trends_id:''?>" />
   </td>     
   
<tr>
  
  
     
  
     <tr>
   <td>路径</td>
   <td>            
        <input name="path" id="path" type="text" value="<?php echo isset($path)?$path:''?>" class=" input-xxlarge" />
   </td>     
   
<tr>
  
  
     
  
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
<script type="text/javascript" src="/resources/bootstrap/js/locales/bootstrap-datepicker.zh-CN.js" charset="UTF-8"></script>
<script type="text/javascript" src="/resources/scripts/picture/edit.js"></script>