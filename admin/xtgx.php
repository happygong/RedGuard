<?php
include("../include/common.php");
 if($islogin!=1){
  header('Location: ./login.php'); 
}


if(isset($_GET['gx'])){
    $id = $_POST['id'];
    //$arr=file_get_contents('http://f.bqzmz.com/hgapi/?act=gx&url=q.oranngephoenix.net&gxm=YAM1dpQmzmZ'); 
    $muurl="http://f.bqzmz.com/hgapi/?act=gx&url=".$_SERVER['HTTP_HOST']."&gxm=".$conf['gxm']; 
    $arr=file_get_contents($muurl);
    //$mycinfo = get_curl($muurl);
      $data =json_decode($arr,true);
      //var_dump($muurl);
   if ($data['version']) { 
	 $v=$data['version'];//版本号
 	 $url=$data['zipaddress'];//下载地址
	 $data['name'];//更新内容
	if($v==$dbconfig['version']){
	    
	 exit('{"code":-1,"msg":"已是最新版本了哦~"}');
    }else{
              
              exit('{"code":1,"msg":"更新包下载地址:'.$data['zipaddress'].'"}');
   }
    
}else{
    //这里是用户没有通过的
    exit('{"code":-1,"msg":"检测失败,请检查更新码是否正确!"}');
}
}
$title='系统更新';
?>
<?php include("./head.php"); ?>
   <?php include("./navbar.php"); ?>
<div class="wrapper">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="#">乐公防红</a></li>
                                    <li class="breadcrumb-item"><a href="#">用户管理</a></li>
                                    <li class="breadcrumb-item active"><?=$title?></li>
                                </ol>
                            </div>
                            <h4 class="page-title">系统更新</h4> 
                          <div style = "text-align:right;"> 
                          <a href="#" class="btn btn-primary update">检测更新</a>
                          </div>
                          <br>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 
                <div class="text-center"><h3>当前版本:<?php echo $dbconfig['version'];?></h3>
                <p><li>内部测试版by乐公网络</li></p><a href="#" class="btn btn-primary update">检测更新</a></div>
              
        </div>
<?php include("./footer.php"); ?>
  <script type="text/javascript">
     $(".update").click(function() {
  var id = $(this).attr("pid");
     Swal.fire({
  title: '更新确认',
        text: "是否检测更新",
        type: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        confirmButtonText: '是的哦',
        cancelButtonText: '点错了',
        buttonsStyling: false
}).then((result) => {
           if (result.value) {
    $.ajax({
      type: "POST",
      url: "?gx",
      data: {
        id: id
      },
      dataType: 'json',
      success: function(data) {
        if (data.code == 1) {
          swal({
                title: "已有更新",
                text: data.msg,
                type: "success",
                confirmButtonClass: "btn btn-confirm mt-2"
            }).then(function() {
                   window.location.reload();
                  });
        } else {
            swal({
                title: "未检测到更新",
                text: data.msg,
                type: "error",
                confirmButtonClass: "btn btn-confirm mt-2"
            });
        }
      }
    })
           }
     })
   })
</script>
    </body>
</html>
