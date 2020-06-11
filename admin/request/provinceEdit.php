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
        $id = $result['id'];


        $r = $db::Query("SELECT * FROM province where provinceName='$provinceName' ", $db::$NUM_ROW);
        if ($r == 1) {
            $call = array("error" => true, "MSG" => "استان تکراری است");
            echo json_encode($call);
            return;
        }
        $data = $db::GetDate();
        $time = $db::GetTime();
        $idAdmin = $_SESSION['adminId'];
        $upcat = $db::Query("update province set provinceName='$provinceName' where provinceId='$id'");
        if($upcat){
            $call =array("error" => false);
            echo json_encode($call);
            return;
        }

    }else{
        $call = array("error" => true, "MSG" => "تمامی فیلد ها اجباری است");
        echo json_encode($call);
        return;
    }
}
