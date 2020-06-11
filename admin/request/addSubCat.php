<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['category']) && $_POST['category'] != '' &&
        isset($_POST['subName']) && $_POST['subName'] != ''

    ) {
        $result = $db::RealString($_POST);
        $category = $result['category'];
        $subName = $result['subName'];

        $s = $db::Query("SELECT  * FROM subcategory where subName='$subName'", $db::$NUM_ROW);
        if ($s == 1) {
            $call = array("error" => true, "MSG" => "محصول تکراری است");
            echo json_encode($call);
            return;
        }
        $id = $db::GenerateId();
        $time = $db::GetTime();
        $date = $db::GetDate();
        $idAdmin = $_SESSION['adminId'];
        $query5 = $db::Query("INSERT INTO subcategory
  (subId, subName, subCatId, subRegDate, subRegTime, subAdminId) VALUES 
    ('$id','$subName','$category','$date','$time','$idAdmin')");
        $call = array("error" => false);
        echo json_encode($call);
        return;
    } else {
        $call = array("error" => true, "MSG" => "تمامی فیلد ها پر شود");
        echo json_encode($call);
        return;
    }
}
