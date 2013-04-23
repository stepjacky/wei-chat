
<link href="/resources/styles/credits/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="creditsform" method="post">

<fieldset>
<legend>
<h4>编辑[新增]<span class="label label-info">会员积分</span></h4>
</legend>
<table class="table table-hover table-bordered">
<tbody>
      <input id="id" type="hidden" name="id" value="<?=val($id)?>" />
  
  
     
  
     <tr>
   <td>分值</td>
   <td>            
        <input name="amount" id="amount" type="text" value="<?=val($amount)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>积分日期</td>
   <td>            
        <input type="text" name="firedate" id="firedate" data-date-format="yyyy-mm-dd" readonly="true" class=" datepicker validate[required]" value="<?=val($firedate)?>" />
   </td>     
   
</tr>
  
  
     
  
      <input type="hidden" name="member_id" id="member_id" value="<?=val($member_id)?>" />
  
  
     
  
      <input type="hidden" name="catalog_id" id="catalog_id" value="<?=val($catalog_id)?>" />
  
  
     
  
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