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
              <input name="keyword" id="keyword" type="text" value="<?=val($keyword)?>" class="validate[required]" />
          </td>
          <td>在用户输入时触发,必须全局唯一,不可与其他消息重复</td>
      </tr>



      <tr>
   <td>名称</td>
   <td>            
        <input name="name" id="name" type="text" value="<?=val($name)?>" class="validate[required]" />
   </td>     
   <td>名称</td>
</tr>
  
  
     
  
     <tr>
   <td>发行数量</td>
   <td>            
        <input name="amount" id="amount" type="text" value="<?=val($amount)?>" class="validate[required,custom[number]]" />
   </td>     
   <td>总发行数量</td>
</tr>

      <tr>
          <td>商家验证码</td>
          <td>
              <input name="merchant_code" id="merchant_code" type="text" value="<?=val($merchant_code)?>" class="validate[required]" />
          </td>
          <td>用户在验证时,商家用防伪用,不要太长4-8位2即可</td>
      </tr>
     
  
     <tr>
   <td>优惠券图</td>
   <td>            
        <div>
 <img src="<?=val($image)?>" style="width:100px;height:55px" />
 <input id="image" name="image" type="hidden" value="<?=val($image)?>" />
 <button type="button" class=" btn btn-info" onclick="imageSelector()">选择图片</button>
</div>
   </td>     
   <td>模板图片[暂时默认,以后自定义扩展]</td>
</tr>

     <tr>
   <td>每日每用户领取数</td>
   <td>            
        <input name="user_daily_limit" id="user_daily_limit" type="text" value="<?=val($user_daily_limit)?>"
               class="validate[required,custom[number]]" />
   </td>     
   <td>该优惠券每用户每日最多可领取数量,必须是数字,默认是1</td>
</tr>
  
  
     
  
     <tr>
   <td>日领总数</td>
   <td>            
        <input name="daily_limit" id="daily_limit" type="text" value="<?=val($daily_limit)?>"
               class="validate[required,custom[number]]" />
   </td>     
   <td>该优惠券每日总共可领取数</td>
</tr>
  

      <tr>
          <td>起始日期</td>
          <td>
              <input type="text" name="startdate" id="startdate" data-date-format="yyyy-mm-dd" readonly="true" class=" datepicker validate[required]" value="<?=val($startdate)?>" />
          </td>
          <td>该优惠券活动有效起始日期</td>
      </tr>
      <tr>
          <td>活动开始说明</td>
          <td>
              <textarea id="start" name="start" class="validate[required]"><?=val($start)?></textarea>
          </td>
          <td>简短介绍,当用户输入关键字触发时,显示在图文消息中</td>
      </tr>

      <tr>
          <td>开始图片url</td>
          <td>
              <textarea id="picurl" name="picurl"><?=val($picurl)?></textarea>
          </td>
          <td>活动开始图片,当用户输入关键字触发时,显示在图文消息中</td>
      </tr>





      <tr>
          <td>结束日期</td>
          <td>
              <input type="text" name="enddate" id="enddate" data-date-format="yyyy-mm-dd" readonly="true" class=" datepicker validate[required]" value="<?=val($enddate)?>" />
          </td>
          <td>该优惠券活动结束日期</td>
      </tr>
      <tr>
          <td>活动结束说明</td>
          <td>
              <textarea id="end" name="end" class="validate[required]"><?=val($end)?></textarea>
          </td>
          <td>活动结束说明,当优惠券过期后,如果用户点击领取,予以提示信息</td>
      </tr>
  

     <tr>
   <td>优惠券设置</td>
   <td>            
        <textarea id="csetting" name="csetting" class="validate[required]"><?=val($csetting)?></textarea>
   </td>     
   <td>简单介绍,显示在用户领取优惠券时主页部分,描述本次优惠活动的预设情况</td>
</tr>

      <tr>
          <td>说明</td>
          <td>
              <?=$my_editor;?>
          </td>
          <td>用于说明该优惠券的使用方法和途径或者其他情况,显示在用户领取主页中</td>
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
<script type="text/javascript" src="/resources/scripts/couponcatalog/edit.js"></script>