<link href="/resources/styles/subscribemessage/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="subscribemessageform" method="post">

<fieldset>
<legend>
<h4>编辑[新增]<span class="label label-info">关注时回复</span></h4>
</legend>
<table class="table table-hover table-bordered">
<tbody>

<!--<input id="id" type="hidden" name="fromusername" value="<?/*=val($fromusername)*/?>" />
-->

<tr>
   <td>
       内容<br>
       <span class="label label-info" style="width: 80px ;line-height:20px;text-align: justify;display: block;word-break: break-all">
           当用户第一次<br>关注你公众账<br>号时的内容,
           可<br>以提示菜单和<br>关键字,让用户<br>学习和了解

       </span>
   </td>
   <td>            
        <textarea id="content" name="content" style="height: 400px" class="validate[required] input-xxlarge"><?=val($content)?></textarea>


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

<script type="text/javascript" src="/resources/scripts/subscribemessage/edit.js"></script>