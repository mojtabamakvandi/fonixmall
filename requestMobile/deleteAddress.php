<?php
include "../admin/class/dataBase.php";
$db = new dataBase();
include "inc/checkLogin.php";
if(isset($login) && $login==true) {
    if(isset($_POST['id']) && $_POST['id']!=''){
        $_POST = $db::RealString($_POST);
        $id = $_POST['id'];
        $delete = $db::Query("DELETE FROM address where addressId='$id'");
        $call = array("error"=>false,"login"=>true);
        echo json_encode($call);
    }
}else{
    $call = array("error"=>false,"login"=>false);
    echo json_encode($call);
}