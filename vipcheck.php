<?php
//bylegong VipCheckFunction
include_once("./include/common.php");
//$numrows=$DB->query("SELECT * from hgfh_user WHERE 1")->rowCount();
$rs=$DB->query("SELECT * FROM `hgfh_user` WHERE `vip`=1");
while($res=$rs->fetch()){
    $usertime = $res['vipendtime'];
    $id = $res['id'];
    $result=isvip($usertime);
    if($result){
        echo 'UnDo';
    }else{
        $sql=$DB->exec("UPDATE `hgfh_user` SET `vip`=0 WHERE id='{$id}'");
        echo 'Remove Successfully!';
    }
}
?>