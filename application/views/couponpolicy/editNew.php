
<link href="/resources/styles/couponpolicy/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="couponpolicyform" method="post" >

<fieldset>
<legend>编辑/新增-优惠券策略</legend>
<table class="table table-hover table-bordered">
<tbody>
      <input id="id" type="hidden" name="id" value="<?=val($id)?>" />
  
  
     
  
     <tr>
   <td>名称</td>
   <td>            
        <input name="name" id="name" type="text" value="<?=val($name)?>" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>说明</td>
   <td>            
        <textarea id="remark" name="remark"><?=val($remark)?></textarea>
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
<script type="text/javascript" src="/resources/scripts/couponpolicy/edit.js"></script>