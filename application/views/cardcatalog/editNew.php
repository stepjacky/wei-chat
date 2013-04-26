<link href="/resources/styles/cardcatalog/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="cardcatalogform" method="post">

<fieldset>
<legend>
<h4>编辑[新增]<span class="label label-info">会员卡</span></h4>
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
   <td>模板</td>
   <td>
       <div>
           <img src="<?=val($image)?>" style="width:100px;height:55px" />
           <input id="image" name="image" type="hidden" value="<?=val($image)?>" />
           <button type="button" class=" btn btn-info" onclick="imageSelector()">选择图片</button>
       </div>
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
<script type="text/javascript" src="/resources/scripts/cardcatalog/edit.js"></script>