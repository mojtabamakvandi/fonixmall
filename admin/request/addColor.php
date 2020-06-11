<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['colorName']) && $_POST['colorName'] != ''
    ) {
        $result = $db::RealString($_POST);
        $colorName = $result['colorName'];
        $r = $db::Query("SELECT * FROM color where colorName='$colorName'", $db::$NUM_ROW);
        if ($r == 1) {
            $call = array("error" => true, "MSG" => "رنگ تکراری است");
            echo json_encode($call);
            return;
        }
        $id =$db::GenerateId();
        $data = $db::GetDate();
        $time = $db::GetTime();
        $idAdmin = $_SESSION['adminId'];
        $insert = $db::Query("INSERT INTO color 
            (colorId, colorName, colorAdminId, colorRegDate, colorRegTime)VALUES 
            ('$id','$colorName','$idAdmin','$data','$time')");
        $call =array("error" => false);
        echo json_encode($call);
        return;
    }else{
        $call = array("error" => true, "MSG" => "تمامی فیلد ها اجباری است");
        echo json_encode($call);
        return;
    }
}
