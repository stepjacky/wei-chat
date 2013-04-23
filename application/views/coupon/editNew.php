
<link href="/resources/styles/coupon/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="couponform" method="post">

<fieldset>
<legend>
<h4>编辑[新增]<span class="label label-info">优惠券记录</span></h4>
</legend>
<table class="table table-hover table-bordered">
<tbody>
      <input id="id" type="hidden" name="id" value="<?=val($id)?>" />
  
  
     
  
      <input id="name" type="hidden" name="name" value="<?=val($name)?>" />
  
  
     
  
     <tr>
   <td>验证类型</td>
   <td>            
        <select name="validator" id="validator" class="validate[required]"></select>
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>验证码</td>
   <td>            
        <input name="cvcode" id="cvcode" type="text" value="<?=val($cvcode)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>使用时间</td>
   <td>            
        <input type="text" name="firedate" id="firedate" data-date-format="yyyy-mm-dd" readonly="true" class=" datepicker validate[required]" value="<?=val($firedate)?>" />
   </td>     
   
</tr>
  
  
     
  
      <input type="hidden" name="catalog_id" id="catalog_id" value="<?=val($catalog_id)?>" />
  
  
     
  
      <input type="hidden" name="member_id" id="member_id" value="<?=val($member_id)?>" />
  
  
     
  
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
<script type="text/javascript" src="/resources/scripts/coupon/edit.js"></script>