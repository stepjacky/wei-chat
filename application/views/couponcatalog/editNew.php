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
   <td>关键字</td>
   <td>            
        <input name="keywords" id="keywords" type="text" value="<?=val($keywords)?>" class="validate[required]" />
   </td>     
   <td>
      触发关键字,不可重复

   </td>
</tr>  <tr>

          <td>名称</td>
   <td>
        <input name="name" id="name" type="text" value="<?=val($name)?>" class="validate[required]" />
   </td>
   <td></td>
</tr>
  
  
     
  
     <tr>
   <td>发行数量</td>
   <td>            
        <input name="amount" id="amount" type="text" value="<?=val($amount)?>" class="validate[required]" />
   </td>     
   <td>优惠券总发行量</td>
</tr>

  <tr>
   <td>日领取量</td>
   <td>
        <input name="daily_limit" id="daily_limit" type="text" value="<?=val($daily_limit)?>" class="validate[required]" />
   </td>
   <td>每日可领取量</td>
</tr>


      <tr>
   <td>每用户领取总量</td>
   <td>
        <input name="user_daily_limit" id="user_daily_limit" type="text" value="<?=val($user_daily_limit)?>" class="validate[required]" />
   </td>
   <td>每用户可领取数量量</td>
</tr>

  
     
  
     <tr>
   <td>优惠券模板</td>
   <td>
       <div>
           <img src="<?=val($image)?>" style="width:100px;height:55px" />
           <input id="image" name="image" type="hidden" value="<?=val($image)?>" />
           <button type="button" class=" btn btn-info" onclick="imageSelector()">选择图片</button>
       </div>
   </td>
         <td>选择优惠券图片模板</td>
</tr>

      <tr>
          <td>优惠券活动开始图片</td>
          <td>
              <textarea name="picurl" id="picurl" class="validate[required] input-xxlarge"><?=val($picurl)?></textarea>
          </td>
          <td>用于当用户输入关键字后,显示的图文消息</td>
      </tr>



      <tr>
   <td>起始日期</td>
   <td>            
        <input type="text" name="startdate" id="startdate" data-date-format="yyyy-mm-dd" readonly="true" class=" datepicker validate[required]" value="<?=val($startdate)?>" />
   </td>
         <td>领取起始日期</td>
</tr>
  
  
     
  
     <tr>
   <td>结束日期</td>
   <td>            
        <input type="text" name="enddate" id="enddate" data-date-format="yyyy-mm-dd" readonly="true" class=" datepicker validate[required]" value="<?=val($enddate)?>" />
   </td>
         <td>领取结束日期</td>
</tr>
  
  
     
  
    
  
  
     
  
     <tr>
   <td>日领取数</td>
   <td>            
        <input name="daily_limit" id="daily_limit" type="text" value="<?=val($daily_limit)?>" class="validate[required]" />
   </td>
         <td>每日限制领取数</td>
</tr>

   <tr>
   <td>商家验证码</td>
   <td>
        <input name="merchant_code" id="merchant_code" type="text" value="<?=val($merchant_code)?>" class="validate[required]" />
   </td>
       <td>用户商户验证有效性</td>
</tr>

  
     
  
     <tr>
   <td>说明</td>
   <td>            
        <?=$my_editor;?>
   </td>
         <td>内容说明</td>
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