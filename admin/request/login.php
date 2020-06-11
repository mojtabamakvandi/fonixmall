<?php

include "../class/dataBase.php";
$db = new dataBase();
if($_SERVER['REQUEST_METHOD']=="POST"){

if(
    isset($_POST['userName']) &&
    $_POST['userName']!='' &&
    isset($_POST['password']) &&
    $_POST['password']!=''
){
    $result = $db::RealString($_POST);
    $userName = $result['userName'];
    $password = $db::HashPassword($result['password']);
    if($db::Query("SELECT * FROM admin where 
      adminUsername='$userName'
                      AND adminPassword='$password'",$db::$NUM_ROW)==1){
        session_start();
        $_SESSION['loginAdmin']=true;
        $Q = $db::Query("SELECT * FROM admin where 
         adminUsername='$userName'
                      AND adminPassword='$password'",$db::$RESULT_ARRAY);
        $_SESSION['adminId'] = $Q['adminId'];
        $_SESSION['adminName'] = $Q['adminName'];

        $call = array("error"=>false);
    }else{
        $call = array("error"=>true,"password"=>$password);
    }
    echo json_encode($call);
    return;
}

}