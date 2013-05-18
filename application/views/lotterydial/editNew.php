<link href="/resources/styles/lotterydial/style.css" media="screen" rel="stylesheet" type="text/css" />
<form id="lotterydialform" method="post">

<fieldset>
<legend>
<h4>编辑[新增]<span class="label label-info">抽奖大转盘</span></h4>
</legend>
<table class="table table-hover table-bordered">
<tbody>
      <input type="hidden" name="id" id="id" value="<?=val($id)?>" />
      
  
  
     
  
     <tr>
   <td>名称</td>
   <td>            
        <input name="name" id="name" type="text" value="<?=val($name)?>" class="validate[required]" />
   </td>     
   <td></td>
</tr>
  
  
     
  
     <tr>
   <td>一等奖数</td>
   <td>            
        <input name="firstnum" id="firstnum" type="text" value="<?=val($firstnum)?>" class="validate[required]" />
   </td>     
   <td>数目</td>
</tr>
  
  
     
  
     <tr>
   <td>一等奖几率</td>
   <td>            
        <input name="firstodds" id="firstodds" type="text" value="<?=val($firstodds)?>" class="validate[required]" />
   </td>     
   <td>填1代表抽中率是百分之一</td>
</tr>
  
  
     
  
     <tr>
   <td>一等奖说明</td>
   <td>            
        <textarea id="firstmsg" name="firstmsg" class="validate[required]"><?=val($firstmsg)?></textarea>
   </td>     
   <td>奖名称,例如海南一日游</td>
</tr>
  
  
     
  
     <tr>
   <td>二等奖数</td>
   <td>            
        <input name="secondnum" id="secondnum" type="text" value="<?=val($secondnum)?>" class="validate[required]" />
   </td>     
   <td></td>
</tr>
  
  
     
  
     <tr>
   <td>二等奖几率</td>
   <td>            
        <input name="secondodds" id="secondodds" type="text" value="<?=val($secondodds)?>" class="validate[required]" />
   </td>     
   <td></td>
</tr>
  
  
     
  
     <tr>
   <td>二等奖说明</td>
   <td>            
        <textarea id="secondmsg" name="secondmsg" class="validate[required]"><?=val($secondmsg)?></textarea>
   </td>     
   <td></td>
</tr>
  
  
     
  
     <tr>
   <td>三等奖数</td>
   <td>            
        <input name="thirdnum" id="thirdnum" type="text" value="<?=val($thirdnum)?>" class="validate[required]" />
   </td>     
   <td></td>
</tr>
  
  
     
  
     <tr>
   <td>三等奖几率</td>
   <td>            
        <input name="thirdodds" id="thirdodds" type="text" value="<?=val($thirdodds)?>" class="validate[required]" />
   </td>     
   <td></td>
</tr>
  
  
     
  
     <tr>
   <td>三等奖说明</td>
   <td>            
        <textarea id="thirdmsg" name="thirdmsg" class="validate[required]"><?=val($thirdmsg)?></textarea>
   </td>     
   <td></td>
</tr>
  
  
     
  
     <tr>
   <td>预计人数</td>
   <td>            
        <input name="futures" id="futures" type="text" value="<?=val($futures)?>" class="validate[required]" />
   </td>     
   <td>预计参加人数</td>
</tr>
  
  
     
  
     <tr>
   <td>说明</td>
   <td>            
        <textarea id="remark" name="remark" class="validate[required]"><?=val($remark)?></textarea>
   </td>     
   <td></td>
</tr>
  
  
     
  
     <tr>
   <td>抽奖成功消息</td>
   <td>            
        <textarea id="success" name="success" class="validate[required]"><?=val($success)?></textarea>
   </td>     
   <td>用户中奖消息</td>
</tr>
  
  
     
  
     <tr>
   <td>抽奖失败消息</td>
   <td>            
        <textarea id="failure" name="failure" class="validate[required]"><?=val($failure)?></textarea>
   </td>     
   <td></td>
</tr>
  
  
     
  
     <tr>
   <td>开始消息</td>
   <td>            
        <textarea id="start" name="start" class="validate[required]"><?=val($start)?></textarea>
   </td>     
   <td>活动开始消息</td>
</tr>
  
  
     
  
     <tr>
   <td>起始日期</td>
   <td>            
        <input type="text" name="startdate" id="startdate" data-date-format="yyyy-mm-dd" readonly="true" class=" datepicker validate[required]" value="<?=val($startdate)?>" />
   </td>     
   <td>活动开始日期</td>
</tr>
  
  
     
  
     <tr>
   <td>结束消息</td>
   <td>            
        <textarea id="end" name="end" class="validate[required]"><?=val($end)?></textarea>
   </td>     
   <td></td>
</tr>
  
  
     
  
     <tr>
   <td>结束日期</td>
   <td>            
        <input type="text" name="enddate" id="enddate" data-date-format="yyyy-mm-dd" readonly="true" class=" datepicker validate[required]" value="<?=val($enddate)?>" />
   </td>     
   <td>活动截止日期</td>
</tr>
  
  
     
  
     <tr>
   <td>商家验证</td>
   <td>            
        <input name="code" id="code" type="text" value="<?=val($code)?>" class="validate[required]" />
   </td>     
   <td>商家验证码,用于商家验证用户中奖真实性,四位英文字符</td>
</tr>
  
  
     
  
     <tr>
   <td>是否启用</td>
   <td>            
        <input type="radio"  name="enabled" value="1"
            <?=$enabled?'checked':''?>
            />启用
        <input type="radio"  name="enabled" value="0"
            <?=!$enabled?'checked':''?>
            />禁用
   </td>
   <td>默认启用,一个账号只能同时启用一种抽奖</td>
</tr>
  

  
     <tr>
   <td>用户抽奖限制次数</td>
   <td>            
        <input name="userlimit" id="userlimit" type="text" value="<?=val($userlimit)?>" />
   </td>     
   <td>允许每个用户抽奖次数,默认是2</td>
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
<script type="text/javascript" src="/resources/scripts/lotterydial/edit.js"></script>