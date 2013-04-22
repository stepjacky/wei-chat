
<link href="/resources/styles/merchant/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="merchantform" method="post" >

<fieldset>
<legend>编辑/新增-商户</legend>
<table class="table table-hover table-bordered">
<tbody>
      <input id="id" type="hidden" name="id" value="<?=val($id)?>" />
  
  
     
  
     <tr>
   <td>名称</td>
   <td>            
        <input name="name" id="name" type="text" value="<?=val($name)?>" class=" input-xxlarge" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>地址</td>
   <td>            
        <textarea id="address" name="address"><?=val($address)?></textarea>
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>电话</td>
   <td>            
        <input name="phone" id="phone" type="text" value="<?=val($phone)?>" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>密码</td>
   <td>            
        <input name="pword" id="pword" type="password" value="<?=val($pword)?>" />
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
<script type="text/javascript" src="/resources/bootstrap/js/locales/bootstrap-datepicker.zh-CN.js" charset="UTF-8"></script>
<script type="text/javascript" src="/resources/scripts/merchant/edit.js"></script>