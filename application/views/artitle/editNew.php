
<link href="/resources/styles/artitle/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="artitleform" method="post" >

<fieldset>
<legend><?=$name?></legend>
<table class="table table-hover table-bordered">
<tbody>
      <input id="id" type="hidden" name="id" value="<?php echo isset($id)?$id:''?>" />
<tr>
  
  
     
  
     <tr>
   <td>内容</td>
   <td>            
        <?php echo $my_editor;?>
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
<script type="text/javascript" src="/resources/scripts/artitle/edit.js"></script>