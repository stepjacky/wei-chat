<link href="/resources/styles/userpicture/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="userpictureform" method="post">

<fieldset>
<legend>
<h4>编辑[新增]<span class="label label-info">用户图片</span></h4>
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
   <td>路径</td>
   <td>            
        <input name="path" id="path" type="text" value="<?=val($path)?>" class="validate[required] input-xxlarge" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>类型</td>
   <td>            
        <input name="ptype" id="ptype" type="text" value="<?=val($ptype)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>宽度</td>
   <td>            
        <input name="width" id="width" type="text" value="<?=val($width)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>高度</td>
   <td>            
        <input name="height" id="height" type="text" value="<?=val($height)?>" class="validate[required]" />
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
<script type="text/javascript" src="/resources/scripts/userpicture/edit.js"></script>