<link href="/resources/styles/vcode/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="vcodeform" method="post">

<fieldset>
<legend>
<h4>编辑[新增]<span class="label label-info"></span></h4>
</legend>
<table class="table table-hover table-bordered">
<tbody>
      <input id="code" type="hidden" name="code" value="<?=val($code)?>" />
  
  
     
  
      <input id="encstr" type="hidden" name="encstr" value="<?=val($encstr)?>" />
  
  
     
  
      <input id="vpos" type="hidden" name="vpos" value="<?=val($vpos)?>" />
  
  
     
  
      <input id="vchar" type="hidden" name="vchar" value="<?=val($vchar)?>" />
  
  
     
  
      <input id="coupon_id" type="hidden" name="coupon_id" value="<?=val($coupon_id)?>" />
  
  
     
  
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
<script type="text/javascript" src="/resources/scripts/vcode/edit.js"></script>