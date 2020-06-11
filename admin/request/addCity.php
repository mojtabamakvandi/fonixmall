<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['province']) && $_POST['province'] != '' &&
        isset($_POST['cityName']) && $_POST['cityName'] != ''

    ) {
        $result = $db::RealString($_POST);
        $province = $result['province'];
        $cityName = $result['cityName'];

        $s = $db::Query("SELECT  * FROM city where cityName='$cityName'", $db::$NUM_ROW);
        if ($s == 1) {
            $call = array("error" => true, "MSG" => "شهر  تکراری است");
            echo json_encode($call);
            return;
        }
        $id = $db::GenerateId();
        $query5 = $db::Query("INSERT INTO city(cityId, cityName, cityProvinceId) values ('$id','$cityName','$province')");
        $call = array("error" => false);
        echo json_encode($call);
        return;
    } else {
        $call = array("error" => true, "MSG" => "تمامی فیلد ها پر شود");
        echo json_encode($call);
        return;
    }
}
