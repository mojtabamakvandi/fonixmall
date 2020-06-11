<?php

include "../admin/class/dataBase.php";
$db = new dataBase();
include "inc/checkLogin.php";
if(isset($login) && $login==true) {
    if(isset($_POST['code']) && $_POST['code']!=''){
        $_POST = $db::RealString($_POST);
        $code = $_POST['code'];
        $select = $db::Query("
SELECT * FROM offercode where OCCode='$code' AND OCCount>'0'");
        if(mysqli_num_rows($select)==1){
            $row = mysqli_fetch_assoc($select);
            $percentage = $row['OCPercentage'];
            $call= array("error"=>false,"percentage"=>$percentage,"login"=>true);
            echo json_encode($call);
        }else{
            echo json_encode(array("error"=>true,"MSG"=>"کد وارد شده اشتباه است.","login"=>true));
        }
    }
}else{
    echo json_encode(array("error"=>false,"login"=>false));
    return;
}