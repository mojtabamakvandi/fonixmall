<?php
include "../admin/class/dataBase.php";
$db = new dataBase();
include "inc/checkLogin.php";
if(isset($login) && $login==true) {
    $_POST = $db::RealString($_POST);
    $select = $db::Query("SELECT * FROM user where 
                         userId='$userID'",$db::$RESULT_ARRAY);
    $call = array(
        "error"=>false,
        "login"=>true,
        "name"=>$select['userName'],
        "email"=>$select['userEmail'],
        "phoneNumber"=>$select['userPhonenumber']
    );
    echo json_encode($call);

}else{
    $call = array("error"=>false,"login"=>false);
    echo json_encode($call);
}