<link href="/resources/styles/userpicture/style.css" rel="stylesheet"  />
<h3>图片管理器</h3>
<hr/>

<div class="row local-row">
<div class="span10">
    <input type="file" name="file_upload" id="file_upload" />
</div>
</div>
<div class="row local-row">
<div class="span10">
   <div class="span2 pic-border">
    <ul class="ztree" id="phonetree"></ul>
   </div>
   <div class="span8 pic-border">
       <ul class="thumbnails" id="mythumb"></ul>


   </div>

</div>
</div>

<script type="text/javascript">
    var mert = '<?=$merchant?>';
</script>
<link rel="stylesheet" type="text/css" href="/resources/uploadify/uploadify.css" />
<link rel="stylesheet" href="/resources/zTree/css/zTreeStyle/zTreeStyle.css" type="text/css" />
<script type="text/javascript" src="/resources/zTree/js/jquery.ztree.core-3.5.js"></script>
<script type="text/javascript" src="/resources/uploadify/jquery.uploadify.js"></script>
<script type="text/javascript" src="/resources/scripts/userpicture/index.js"></script>
