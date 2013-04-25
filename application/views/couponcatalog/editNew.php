<link href="/resources/styles/couponcatalog/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="couponcatalogform" method="post">

<fieldset>
<legend>
<h4>编辑[新增]<span class="label label-info">优惠券</span></h4>
</legend>
<table class="table table-hover table-bordered">
<tbody>
      <input type="hidden" name="id" id="id" value="<?=val($id)?>" />
      
  
  
     
  
     <tr>
   <td>名称</td>
   <td>            
        <input name="name" id="name" type="text" value="<?=val($name)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>发行数量</td>
   <td>            
        <input name="amount" id="amount" type="text" value="<?=val($amount)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>优惠券图</td>
   <td>            
        <i></i>
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>起始日期</td>
   <td>            
        <input type="text" name="startdate" id="startdate" data-date-format="yyyy-mm-dd" readonly="true" class=" datepicker validate[required]" value="<?=val($startdate)?>" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>结束日期</td>
   <td>            
        <input type="text" name="enddate" id="enddate" data-date-format="yyyy-mm-dd" readonly="true" class=" datepicker validate[required]" value="<?=val($enddate)?>" />
   </td>     
   
</tr>
  
  
     
  
    
  
  
     
  
     <tr>
   <td>日领取数</td>
   <td>            
        <input name="daily_limit" id="daily_limit" type="text" value="<?=val($daily_limit)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>说明</td>
   <td>            
        <?=$my_editor;?>
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

<script type="text/javascript" src="/resources/scripts/picture/picture.js" charset="UTF-8"></script>
<script type="text/javascript" src="/resources/bootstrap/js/locales/bootstrap-datepicker.zh-CN.js" charset="UTF-8"></script>
<script type="text/javascript" src="/resources/scripts/couponcatalog/edit.js"></script>