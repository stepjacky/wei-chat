
<link href="/resources/styles/member/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="memberform" method="post">

<fieldset>
<legend>
<h4>编辑[新增]<span class="label label-info">会员</span></h4>
</legend>
<table class="table table-hover table-bordered">
<tbody>
      <input id="id" type="hidden" name="id" value="<?=val($id)?>" />
  
  
     
  
     <tr>
   <td>微信</td>
   <td>            
        <input name="weixin" id="weixin" type="text" value="<?=val($weixin)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>昵称</td>
   <td>            
        <input name="nick" id="nick" type="text" value="<?=val($nick)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>电邮</td>
   <td>            
        <input name="email" id="email" type="text" value="<?=val($email)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>会员卡号</td>
   <td>            
        <input name="vip" id="vip" type="text" value="<?=val($vip)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>所属商户</td>
   <td>            
        <input name="merchant_id" id="merchant_id" type="text" value="<?=val($merchant_id)?>" class="validate[required]" />
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
<script type="text/javascript" src="/resources/scripts/member/edit.js"></script>