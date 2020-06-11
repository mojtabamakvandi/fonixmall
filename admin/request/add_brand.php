<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['brand']) && $_POST['brand'] != ''

    ) {
        $result = $db::RealString($_POST);
        $r = $result['brand'];

        $s = $db::Query("SELECT  * FROM brand where brand='$r'", $db::$NUM_ROW);
        if ($s == 1) {
            $call = array("error" => true, "MSG" => "برند تکراری است");
            echo json_encode($call);
            return;
        }
        $id = $db::GenerateId();
        $time = $db::GetTime();
        $date = $db::GetDate();
        $idAdmin = $_SESSION['adminId'];
        $query5 = $db::Query("INSERT INTO brand(brandId, brand, brregTime, brregDate, brandAdminId) 
        VALUES ('$id','$r','$time','$date','$idAdmin')");
        $call = array("error" => false);
        echo json_encode($call);
        return;
    } else {
        $call = array("error" => true, "MSG" => "تمامی فیلد ها پر شود");
        echo json_encode($call);
        return;
    }
}
