<?php
header('Location: ./index'); 
if(isset($_GET['i'])){ session_start(); $_SESSION['code']=$_GET['i']; }
?>