<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['offer']) && $_POST['offer'] != '' &&
        isset($_POST['count']) && $_POST['count'] != '' &&
        isset($_POST['ocPercentage']) && $_POST['ocPercentage'] != ''
    ) {
        $result = $db::RealString($_POST);
        $offer = $result['offer'];
        $count = $result['count'];
        $ocPercentage = $result['ocPercentage'];
        $r = $db::Query("SELECT * FROM offercode where OCCode='$offer'", $db::$NUM_ROW);
        if ($r == 1) {
            $call = array("error" => true, "MSG" => "کد تخفیف تکراری است");
            echo json_encode($call);
            return;
        }
        $id =$db::GenerateId();
        $data = $db::GetDate();
        $time = $db::GetTime();
        $idAdmin = $_SESSION['adminId'];
        $insert = $db::Query("INSERT INTO offercode(ocid, occode, ocregdate, ocregtime, occount, ocadminid, ocpercentage) 
        VALUES  ('$id','$offer','$data','$time','$count','$idAdmin','$ocPercentage') ");
        $call =array("error" => false);
        echo json_encode($call);
        return;
    }else{
        $call = array("error" => true, "MSG" => "تمامی فیلد ها اجباری است");
        echo json_encode($call);
        return;
    }
}
