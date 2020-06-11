<?php
include "../admin/class/dataBase.php";
$db= new dataBase();
$userID = "";
include "inc/checkLogin.php";
$shbUserId="";
$pr=array();
$_POST = $db::RealString($_POST);
$arrayListAddress = array();
$cites=array();
$provinces=array();
if (isset($userID) && $userID != "") {
    $selectCites = $db::Query("SELECT * FROM city ");
    while ($rowCites = mysqli_fetch_assoc($selectCites)){
        $cites[]= array(
            "id"=>$rowCites['cityId'],
            "name"=>$rowCites['cityName'],
            "provinceId"=>$rowCites['cityProvinceId']
        );
    }
    $select = $db::Query("SELECT * FROM province");
    while ($rowProvince = mysqli_fetch_assoc($select)){
        $provinces[]=array(
            "id"=>$rowProvince['provinceId'],
            "name"=>$rowProvince['provinceName']
        );
    }

    $call = array("error"=>false,"login"=>true);
        $call['provinces']=$provinces;
    $call['cites']=$cites;
        echo  json_encode($call);
        return;

}else{
    echo json_encode(array("error"=>false,"login"=>false));
    return;
}