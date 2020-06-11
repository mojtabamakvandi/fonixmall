<?php
/**
 * Created by PhpStorm.
 * User: RasoolB
 * Date: 26/08/2019
 * Time: 12:19 PM
 */
include "../admin/class/dataBase.php";
$db = new dataBase();
session_start();
if(isset($_SESSION['loginUser']) && $_SESSION['loginUser']==true) {
    if (isset($_POST['addresId']) && $_POST['addresId'] != '') {
        $_POST = $db::RealString($_POST);
        $id = $_POST['addresId'];
        $_SESSION = $db::RealString($_SESSION);
        $userId = $_SESSION['userId'];

        $selectAddress = $db::Query("SELECT * FROM address,city,province where addressUserId='$userId' AND addressId='$id' AND provinceId=addressProvinceId AND cityId=addressCityId",$db::$RESULT_ARRAY);
        $provinceName = $selectAddress['provinceName'];
        $cityName = $selectAddress['cityName'];
        $call = array("error"=>false,"provinceName"=>$provinceName,"cityName"=>$cityName,"addressText"=>$selectAddress['addressText'],"postCode"=>$selectAddress['postCode']);
        echo json_encode($call);
        return;
    }
}