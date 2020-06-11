<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['subCat']) && $_POST['subCat'] != '' &&
        isset($_POST['proName']) && $_POST['proName'] != ''


    ) {
        $result = $db::RealString($_POST);
        $sub = $result['subCat'];
        $proName = $result['proName'];

        $s = $db::Query("SELECT  * FROM properties where proName='$proName'", $db::$NUM_ROW);
        /*if ($s == 1) {
            $call = array("error" => true, "MSG" => "خاصیت تکراری است");
            echo json_encode($call);
            return;
        }*/
        $id = $db::GenerateId();
        $time = $db::GetTime();
        $date = $db::GetDate();
        $idAdmin = $_SESSION['adminId'];
        $productq = $db::Query("INSERT INTO properties(proId, proName, proRegDate, proRegTime, prSubCatid) 
        VALUES ('$id','$proName','$date','$time','$sub') ");
        $call = array("error" => false);
        echo json_encode($call);
        return;
    } else {
        $call = array("error" => true, "MSG" => "تمامی فیلد ها پر شود");
        echo json_encode($call);
        return;
    }
}
