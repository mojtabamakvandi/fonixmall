<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['news']) && $_POST['news'] != '' &&
        isset($_POST['footerMenuName']) && $_POST['footerMenuName'] != '' &&
        isset($_POST['footerMenuSort']) && $_POST['footerMenuSort'] != ''

    ) {
        $result = $db::RealString($_POST);
        $news = $result['news'];
        $footerMenuName = $result['footerMenuName'];
        $footerMenuSort = $result['footerMenuSort'];

        $s = $db::Query("SELECT  * FROM footermenu where footerMenuName='$footerMenuName'", $db::$NUM_ROW);
        if ($s == 1) {
            $call = array("error" => true, "MSG" => "منو تکراری است");
            echo json_encode($call);
            return;
        }
        $id = $db::GenerateId();
        $time = $db::GetTime();
        $date = $db::GetDate();
        $idAdmin = $_SESSION['adminId'];
        $productq = $db::Query("INSERT INTO footermenu(footerMenuId, footerMenuName, footerMenuRegDate, footerMenuRegTime, footerMenuSort, footerMenuContentId) 
        VALUES ('$id','$footerMenuName','$date','$time','$footerMenuSort','$news')");
        $call = array("error" => false);
        echo json_encode($call);
        return;
    } else {
        $call = array("error" => true, "MSG" => "تمامی فیلد ها پر شود");
        echo json_encode($call);
        return;
    }
}
