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
          <td>关键字</td>
          <td>
              <input name="keyword" id="keyword" type="text" value="<?=val($keyword)?>" class="validate[required]" />
          </td>
          <td>关键字</td>
      </tr>


      <tr>
   <td>名称</td>
   <td>            
        <input name="name" id="name" type="text" value="<?=val($name)?>" class="validate[required]" />
   </td>     
   <td>名称</td>
</tr>
  
  
     
  
     <tr>
   <td>会员卡模板</td>
   <td>            
        <div>
 <img src="<?=val($picurl)?>" style="width:100px;height:55px" />
 <input id="picurl" name="picurl" type="hidden" value="<?=val($picurl)?>" />
 <button type="button" class=" btn btn-info" onclick="imageSelector()">选择图片</button>
</div>
   </td>     
   <td>会员卡模板[暂时默认,以后扩展]</td>
</tr>


      <tr>
          <td>会员卡介绍</td>
          <td>
              <textarea id="remark" name="remark" class="validate[required]"><?=val($remark)?></textarea>
          </td>
          <td>当用户发送会员卡关键字后,显示在图文消息中,尽量简短</td>
      </tr>



      <tr>
   <td>会员卡使用说明</td>
   <td>
        <?=$my_editor;?>
   </td>
   <td>显示在用户领卡主界面中,不超过200字</td>
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
<script type="text/javascript" src="/resources/scripts/cardcatalog/edit.js"></script>