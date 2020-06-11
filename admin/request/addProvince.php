<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['provinceName']) && $_POST['provinceName'] != ''

    ) {
        $result = $db::RealString($_POST);
        $provinceName = $result['provinceName'];

        $s = $db::Query("SELECT  * FROM province where provinceName='$provinceName'", $db::$NUM_ROW);
        if ($s == 1) {
            $call = array("error" => true, "MSG" => "استان تکراری است");
            echo json_encode($call);
            return;
        }
        $id = $db::GenerateId();
        $idAdmin = $_SESSION['adminId'];
        $productq = $db::Query("INSERT INTO province(provinceId, provinceName) VALUES ('$id','$provinceName')");
        $call = array("error" => false);
        echo json_encode($call);
        return;
    } else {
        $call = array("error" => true, "MSG" => "تمامی فیلد ها پر شود");
        echo json_encode($call);
        return;
    }
}
