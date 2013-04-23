
<link href="/resources/styles/merchant/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="merchantform" method="post">

<fieldset>
<legend>
<h4>编辑[新增]<span class="label label-info">商户</span></h4>
</legend>
<table class="table table-hover table-bordered">
<tbody>
      <input name="id" id="id" type="text" value="<?=val($id)?>" class="validate[required] readonly" />
  
  
     
  
     <tr>
   <td>微信号</td>
   <td>            
        <input name="weixin_id" id="weixin_id" type="text" value="<?=val($weixin_id)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
      <input id="weixin" type="hidden" name="weixin" value="<?=val($weixin)?>" />
  
  
     
  
     <tr>
   <td>令牌</td>
   <td>            
        <input name="token" id="token" type="text" value="<?=val($token)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>名称</td>
   <td>            
        <input name="name" id="name" type="text" value="<?=val($name)?>" class="validate[required] input-xxlarge" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>电话</td>
   <td>            
        <input name="phone" id="phone" type="text" value="<?=val($phone)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>密码</td>
   <td>            
        <input name="pword" id="pword" type="password" value="<?=val($pword)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
      <input id="appid" type="hidden" name="appid" value="<?=val($appid)?>" />
  
  
     
  
      <input id="appsecret" type="hidden" name="appsecret" value="<?=val($appsecret)?>" />
  
  
     
  
      <input id="avatar" type="hidden" name="avatar" value="<?=val($avatar)?>" />
  
  
     
  
      <input id="address" type="hidden" name="address" value="<?=val($address)?>" />
  
  
     
  
      <input id="qq" type="hidden" name="qq" value="<?=val($qq)?>" />
  
  
     
  
      <input id="statlink" type="hidden" name="statlink" value="<?=val($statlink)?>" />
  
  
     
  
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