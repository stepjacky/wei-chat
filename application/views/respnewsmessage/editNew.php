<link href="/resources/styles/respnewsmessage/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="respnewsmessageform" method="post">

<fieldset>
<legend>
<h4>编辑[新增]<span class="label label-info">图文消息回复</span></h4>
</legend>
<table class="table table-hover table-bordered">
<tbody>
      <input type="hidden" name="id" id="id" value="<?=val($id)?>" />



           <tr>
   <td>关键字</td>
   <td>            
        <input name="keywords"
               type="text"
               class="validate[required] input-xxlarge"
               value="<?=val($keywords)?>"    />
       <span class="label label-info">多个关键字请用半角逗号隔开,例如:  天气,气温</span>
   </td>
   
</tr>
  
   <tr>
      <td>
        消息列表
      </td>
      <td>
        <button class="btn btn-info" type="button" onclick="selectNews('newslist')">选择消息</button>
        <br />
        <span class="label label"
          <hr/>
        <div id="newslist">
           <?php foreach($newslist as $news):?>
              <div>
                  <input type='hidden' name='newslist[]' value="<?$news['id']?>" />
                  <button type='button' onclick='removeNews(this)' class='btn btn-danger'>
                      <?=$news['name']?>
                  </button>
              </div>
               <br/>

           <?php endforeach;?>
        </div>
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
<script type="text/javascript" src="/resources/scripts/respnewsmessage/edit.js"></script>