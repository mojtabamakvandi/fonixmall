<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['OCCode']) && $_POST['OCCode'] != '' &&
        isset($_POST['OCCount']) && $_POST['OCCount'] != '' &&
        isset($_POST['OCPercentage']) && $_POST['OCPercentage'] != ''

    ) {
        $result = $db::RealString($_POST);
        $OCCode = $result['OCCode'];
        $OCCount = $result['OCCount'];
        $OCPercentage = $result['OCPercentage'];
        $id = $result['id'];


        $r = $db::Query("SELECT * FROM offercode where OCCode='$OCCode'", $db::$NUM_ROW);
        if ($r == 1) {
            $call = array("error" => true, "MSG" => "کد تکراری است");
            echo json_encode($call);
            return;
        }
        $data = $db::GetDate();
        $time = $db::GetTime();
        $idAdmin = $_SESSION['adminId'];
        $upcat = $db::Query("update offercode set OCCode='$OCCode',OCCount='$OCCount',OCPercentage='$OCPercentage',OCAdminId=$idAdmin where OCid='$id'");
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
