<?php
include "../admin/class/dataBase.php";
$db= new dataBase();
$userID = "";
include "inc/checkLogin.php";
$shbUserId="";
$_POST = $db::RealString($_POST);
$arrayListAddress = array();
if(
    isset($_POST['postalCode']) && !empty($_POST['postalCode']) &&
    isset($_POST['address']) && !empty($_POST['address']) &&
    isset($_POST['cityId']) && !empty($_POST['cityId']) &&
    isset($_POST['provinceId']) && !empty($_POST['provinceId'])
) {


    if (isset($userID) && $userID !== "") {
        $postCode =$_POST['postalCode'];
        $address = $_POST['address'];
        $cityId= $_POST['cityId'];
        $provinceId = $_POST['provinceId'];
        $id = $db::GenerateId();
        $date = $db::GetDate();
        $time = $db::GetTime();
        $sql = $db::Query("
INSERT INTO address (addressId, addressText, addressProvinceId, 
                     addressCityId, addressUserId, postCode, 
                     regDate, regTime) values ('$id','$address','$provinceId',
                                               '$cityId','$userID','$postCode',
                                               '$date','$time')");
        $call = array("error"=>false,"addressId"=>$id);
        echo json_encode($call);
    } else {
        echo json_encode(array("error" => false, "login" => false));
        return;
    }
}