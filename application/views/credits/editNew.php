
<link href="/resources/styles/credits/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="creditsform" method="post" >

<fieldset>
<legend>编辑/新增-会员积分</legend>
<table class="table table-hover table-bordered">
<tbody>
      <input id="id" type="hidden" name="id" value="<?=val($id)?>" />
  
  
     
  
     <tr>
   <td>分值</td>
   <td>            
        <input name="amount" id="amount" type="text" value="<?=val($amount)?>" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>积分日期</td>
   <td>            
        <input type="text" name="firedate" id="firedate" data-date-format="yyyy-mm-dd" readonly="true" class=" datepicker" value="<?=val($firedate)?>" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>积分用户</td>
   <td>            
        <input name="member_id" id="member_id" type="text" value="<?=val($member_id)?>" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>积分优惠券</td>
   <td>            
        <select name="catalog_id" id="catalog_id"></select>
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
<script type="text/javascript" src="/resources/scripts/credits/edit.js"></script>