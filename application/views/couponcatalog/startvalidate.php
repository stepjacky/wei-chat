<form id="vform">
<table class="table table-hover table-bordered">
    <caption>优惠券验证</caption>

    <input name="catalog_id" type="hidden" value="<?=$catalog_id?>"   />
    <tbody>
      <tr>
         <td>
             用户微信
         </td>

         <td >
            <input name="member_id" type="text" />
         </td>
      </tr>
      <tr>
         <td>
             验证码
         </td>
         <td class="input-append">
             <input name="cvcode" type="text"  />
             <button
                 type="button"
                 class="btn btn-inverse"
                 onclick="validateCoupon()"
                 >验证</button>
         </td>
      </tr>
    </tbody>

</table>
</form>
 <script type="text/javascript">
    function validateCoupon(){
        var data = $("#vform").serialize();
        alert(data);
        $.post('/coupon/validate',data,function(){
            $("#myModal").modal("hide");
        })
    }

</script>