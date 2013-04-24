<link href="/resources/styles/cards/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="cardsform" method="post">

<fieldset>
<legend>
<h4>编辑[新增]<span class="label label-info">会员卡记录</span></h4>
</legend>
<table class="table table-hover table-bordered">
<tbody>
      <input id="id" type="hidden" name="id" value="<?=val($id)?>" />
  
  
     
  
     <tr>
   <td>名称</td>
   <td>            
        <input name="name" id="name" type="text" value="<?=val($name)?>" class="validate[required]" />
   </td>     
   
</tr>
  
  
     
  
     <tr>
   <td>使用次数</td>
   <td>            
        <input name="times" id="times" type="text" value="<?=val($times)?>" class="validate[required] readonly" />
   </td>     
   
</tr>
  
  
     
  
      <input type="hidden" name="cardcatalog_id" id="cardcatalog_id" value="<?=val($cardcatalog_id)?>" />
  
  
     
  
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

<script type="text/javascript" src="/resources/scripts/picture/picture.js" charset="UTF-8"></script>
<script type="text/javascript" src="/resources/bootstrap/js/locales/bootstrap-datepicker.zh-CN.js" charset="UTF-8"></script>
<script type="text/javascript" src="/resources/scripts/cards/edit.js"></script>