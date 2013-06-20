<link href="/resources/styles/merchant/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="merchantform" method="post">

<fieldset>
<legend>
<h4>编辑[新增]<span class="label label-info">商户</span></h4>
</legend>
<table class="table table-hover table-bordered">
<tbody>
     <tr>
   <td>用户名</td>
   <td>            
        <input name="id" id="id" type="text" value="<?=val($id)?>" class="validate[required]" readonly="readOnly" />
   </td>     
   
</tr>

 <tr>
   <td>商户名称</td>
   <td>
        <input name="name" id="name" type="text" value="<?=val($name)?>" class="validate[required]" />
   </td>

 </tr>




     <tr>
   <td>密码</td>
   <td>
        <input name="pword" id="pword" type="password" value="<?=val($pword)?>" class="validate[required]" />
   </td>

</tr>

     <tr>
   <td>重复密码</td>
   <td>
        <input type="password" value="<?=val($pword)?>" class="validate[required,equals[pword]]" />
   </td>

</tr>
  
  <tr>
     <td>头像</td>
      <td>
         <input name="avator" type="text" value="<?=$avator?>" class="input-xxlarge "   />
      </td>
  </tr>
     
  
     <tr>
   <td>邮件</td>
   <td>            
        <input name="email" id="email" type="text" value="<?=val($email)?>" class="validate[custom[email]]" />
   </td>     
   
</tr>
  
      <tr>
   <td>电话</td>
   <td>            
        <input name="phone" id="phone" type="text" value="<?=val($phone)?>" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>QQ</td>
   <td>            
        <input name="qq" id="qq" type="text" value="<?=val($qq)?>" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>地址</td>
   <td>            
        <textarea id="address" name="address" ><?=val($address)?></textarea>
   </td>     
   
</tr>
 <tr>
   <td>简介</td>
   <td>
        <textarea id="info" name="info" ><?=val($info)?></textarea>
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

<script type="text/javascript" src="/resources/scripts/merchant/edit.js"></script>