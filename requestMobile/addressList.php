<?php
include "../admin/class/dataBase.php";
$db= new dataBase();
$userID = "";
include "inc/checkLogin.php";
$shbUserId="";
$pr=array();
$_POST = $db::RealString($_POST);
$arrayListAddress = array();
if (isset($userID) && $userID!="") {
    $selectAddress = $db::Query(
        "SELECT * FROM address,city,province 
    where addressUserId='$userID' AND city.cityProvinceId=provinceId 
    AND addressCityId=cityId");
    while ($rowAddress = mysqli_fetch_assoc($selectAddress)){
        $arrayListAddress[]=array(
            "id"=>$rowAddress['addressId'],
            "address"=>$rowAddress['addressText'],
            "city"=>$rowAddress['cityName'],
            "province"=>$rowAddress['provinceName'],
            "postCode"=>$rowAddress['postCode']
        );
    }
    $call = array("error"=>false,"login"=>true);
    $call['addressList']=$arrayListAddress;
    echo json_encode($call);
    return;


}else{
    echo json_encode(array("error"=>false,"login"=>false));
    return;
}