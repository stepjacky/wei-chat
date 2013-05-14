<link href="/resources/styles/lotterywin/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="lotterywinform" method="post">

<fieldset>
<legend>
<h4>编辑[新增]<span class="label label-info">大转盘中奖</span></h4>
</legend>
<table class="table table-hover table-bordered">
<tbody>
      <input id="id" type="hidden" name="id" value="<?=val($id)?>" />
      
  
  
     
  
     <tr>
   <td>用户微信号</td>
   <td>            
        <input name="weixin_id" id="weixin_id" type="text" value="<?=val($weixin_id)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>中奖级别</td>
   <td>            
        <input name="wingrade" id="wingrade" type="text" value="<?=val($wingrade)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>商家验证码</td>
   <td>            
        <input name="merchant_code" id="merchant_code" type="text" value="<?=val($merchant_code)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>用户手机号</td>
   <td>            
        <input name="userphone" id="userphone" type="text" value="<?=val($userphone)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>中奖日期</td>
   <td>            
        <input type="text" name="firedate" id="firedate" data-date-format="yyyy-mm-dd" readonly="true" class=" datepicker validate[required]" value="<?=val($firedate)?>" />
   </td>     
   
</tr>
  
  
     
  
      <input id="lottery_code" type="hidden" name="lottery_code" value="<?=val($lottery_code)?>" />
      
  
  
     
  
      <input id="user_code" type="hidden" name="user_code" value="<?=val($user_code)?>" />
      
  
  
     
  
    
  
  
     
  
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
<script type="text/javascript" src="/resources/scripts/lotterywin/edit.js"></script>