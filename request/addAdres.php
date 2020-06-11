<?php
include "../admin/class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginUser']) && $_SESSION['loginUser']==true) {

    if (
        isset($_POST['postCode']) && $_POST['postCode'] != '' &&
        isset($_POST['province']) && $_POST['province'] != ''&&
        isset($_POST['city']) && $_POST['city'] != '' &&
        isset($_POST['ady']) && $_POST['ady'] != ''

    ) {
        $result = $db::RealString($_POST);
        $postCode = $result['postCode'];
        $province = $result['province'];
        $city = $result['city'];
        $ady = $result['ady'];


        $s = $db::Query("SELECT  * FROM address where addressText='$ady'", $db::$NUM_ROW);
        if ($s == 1) {
            $call = array("error" => true, "MSG" => "ادرس تکراری است");
            echo json_encode($call);
            return;
        }
        $id = $db::GenerateId();
        $date = $db::GetDate();
        $time = $db::GetTime();
        $username = $_SESSION['userId'];
        $productq = $db::Query("INSERT INTO address
        (addressId, addressText, addressProvinceId, addressCityId, addressUserId,postCode,regDate,regTime)
         VALUES('$id','$ady','$province','$city','$username','$postCode','$date','$time') ");
        
        $selectCity = $db::Query("SELECT * FROM city where cityId='$city'",$db::$RESULT_ARRAY);
        $selectProvince = $db::Query("SELECT * FROM province where provinceId='$province'",$db::$RESULT_ARRAY);
        
        
        $call = array("error" => false,"city"=>$selectCity['cityName'],"province"=>$selectProvince['provinceName']);
        echo json_encode($call);
        return;
    } else {
        $call = array("error" => true, "MSG" => "تمامی فیلد ها پر شود");
        echo json_encode($call);
        return;
    }

    }