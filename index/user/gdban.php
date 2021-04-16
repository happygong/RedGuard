<?php  
$title='您还未购买产品！';
include("./header.php"); //导入导航栏  

if($userrow['sqvip']==1){
  header('Location: ./gd.php'); 
 }
if(round($rowgxm,2)>0){
  header('Location: ./gd.php'); 
}
?>
<?php  
include("./navbar.php"); //导入链接

?>
<div class="content">
        <div class="container-fluid"></br></br></br></br></br></br></br>
          <div class="header text-center ml-auto mr-auto">
            <h2 class="title">您当前尚未购买任何产品！</br>无法发起工单~</h2>
         
            <p class="category">请先去购买您心仪的产品吧！</p>
          </div>
          
                 <div class="header text-center ml-auto mr-auto">
                   <a  href="./shop.php" class="btn btn-rose btn-round">前往购买<div class="ripple-container"></div></a>
                 </div></div></div></div>
              <?php  
include("./footeri.php"); //导入链接

?>