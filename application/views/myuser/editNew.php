
<link href="/resources/styles/myuser/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="myuserform" method="post" >

<fieldset>
<legend>编辑/新增-用户</legend>
<table class="table table-hover table-bordered">
<tbody>
     <tr>
   <td>用户名</td>
   <td>            
        <input name="id" id="id" type="text" value="<?php echo urldecode(isset($id)?$id:''); ?>" />
   </td>     
   
<tr>
  
  
     
  
     <tr>
   <td>姓名</td>
   <td>            
        <input name="name" id="name" type="text" value="<?php echo isset($name)?$name:''?>" />
   </td>     
   
<tr>
  
  
     
  
     <tr>
   <td>昵称</td>
   <td>            
        <input name="nick" id="nick" type="text" value="<?php echo isset($nick)?$nick:''?>" />
   </td>     
   
<tr>
  
  
     
  
     <tr>
   <td>密码</td>
   <td>            
        <input name="password" id="password" type="password" value="<?php echo isset($password)?$password:''?>" />
   </td>     
   
<tr>
  
  
     
  
     <tr>
   <td>用户类型</td>
   <td>            
        <input name="utype" id="utype" type="text" value="<?php echo isset($utype)?$utype:''?>" />
   </td>     
   
<tr>
  
  
     
  
     <tr>
   <td>头像</td>
   <td>            
        <input name="avatar" id="avatar" type="text" value="<?php echo isset($avatar)?$avatar:''?>" />
        <img src="<?php echo isset($avatar)?$avatar:''?>" style="width: 30px;height: 30px" />
   </td>     
   
<tr>
  
  
     
  
     <tr>
   <td>手机型号</td>
   <td>            
        <input name="myphone" id="myphone" type="text" value="<?php echo isset($myphone)?$myphone:''?>" />
   </td>     
   
<tr>
  
  
     
  
     <tr>
   <td>基金</td>
   <td>            
        <input name="founds" id="founds" type="text" value="<?php echo isset($founds)?$founds:'0'?>" />
   </td>     
   
<tr>
  
  
     
  
     <tr>
   <td>是VIP</td>
   <td>            
        <input type="checkbox" id="viped" name="viped" value="<?php echo isset($viped)?$viped:''?>" />
   </td>     
   
<tr>
  
  
     
  
     <tr>
   <td>VIP编号</td>
   <td>            
        <input name="vipid" id="vipid" type="text" value="<?=val($vipid)?>" />

       <?php echo isset($vipid)?$vipid:''?>
   </td>     
   
<tr>
  
  
     
  
     <tr>
   <td>男性</td>
   <td>            
        <input type="checkbox" id="maled" name="maled" value="1"
                <?=val3($maled,1,"checked='true'")?>
                />


       <?php echo isset($maled)?$maled:''?>
   </td>     
   
<tr>
  
  
     
  
     <tr>
   <td>生日</td>
   <td>            
        <input name="birthday" id="birthday" type="text" value="<?php echo isset($birthday)?$birthday:''?>" class=" datepicker" />
   </td>     
   
<tr>
  
  
     
  
     <tr>
   <td>QQ号</td>
   <td>            
        <input name="qq" id="qq" type="text" value="<?php echo isset($qq)?$qq:''?>" />
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
<script type="text/javascript" src="/resources/scripts/myuser/edit.js"></script>