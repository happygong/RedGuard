<?php
include("./include/common.php");
include("./include/core.php");
include ("./include/txprotect.php");
//if($tzlx==2 || $tzlx==4){
//include ("./include/tzmb.php");
//}else{
  //include ("./include/zlmb.php");
//}
if($tzlx==2){
  if(strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger')!==false){
      session_start();
      $_SESSION['siteurl'] = $t_url;
     include 'include/zlmb.php';
    }else
    if(strpos($_SERVER['HTTP_USER_AGENT'], 'QQ') !== false){
      session_start();
      $_SESSION['siteurl'] = $t_url;
     include 'include/zlmb.php';
   }
   else{
     include 'include/ord.php';
   }
    

  
}else{
if(strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger')!==false){
      session_start();
      $_SESSION['siteurl'] = $t_url;
      header("Content-type:application/pdf");
      header("Content-Disposition:attachment;filename='downloaded.pdf'");
      include 'include/tzmb.php';
    }else
    
if(strpos($_SERVER['HTTP_USER_AGENT'], 'QQ') !== false){
      session_start();
      $_SESSION['siteurl'] = $t_url;
     include 'include/tzmb.php';
   }
    include 'include/ord.php';
//echo $_SERVER['HTTP_USER_AGENT'];
}
?>