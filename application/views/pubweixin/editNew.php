<link href="/resources/styles/pubweixin/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="pubweixinform" method="post">

<fieldset>
<legend>
<h4>编辑[新增]<span class="label label-info">公众账号</span></h4>
</legend>
<table class="table table-hover table-bordered">
<tbody>
     <tr>
   <td>原始微信号</td>
   <td>            
        <input name="weixin_id" id="weixin_id" type="text" value="<?=val($weixin_id)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>令牌</td>
   <td>            
        <input name="token" id="token" type="text" value="<?=val($token)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>公众号名称</td>
   <td>            
        <input name="name" id="name" type="text" value="<?=val($name)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>微信号</td>
   <td>            
        <input name="weixin" id="weixin" type="text" value="<?=val($weixin)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>头像</td>
   <td>            
        <input name="avatar" id="avatar" type="text" value="<?=val($avatar)?>" class="validate[required] input-xxlarge" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>AppId</td>
   <td>            
        <input name="appid" id="appid" type="text" value="<?=val($appid)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>AppSecret</td>
   <td>            
        <input name="appsecret" id="appsecret" type="text" value="<?=val($appsecret)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>图文页统计代码</td>
   <td>            
        <textarea id="statlink" name="statlink" class="validate[required]"><?=val($statlink)?></textarea>
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>公众账号QQ</td>
   <td>            
        <input name="qq" id="qq" type="text" value="<?=val($qq)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
      <input id="merchant_id" type="hidden" name="merchant_id" value="<?=val($merchant_id)?>" />
  
  
     
  
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
<script type="text/javascript" src="/resources/scripts/pubweixin/edit.js"></script>