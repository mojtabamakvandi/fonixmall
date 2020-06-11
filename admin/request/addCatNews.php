<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['catNews']) && $_POST['catNews'] != ''
    ) {
        $result = $db::RealString($_POST);
        $catNews = $result['catNews'];
        $r = $db::Query("SELECT * FROM categorynews where catNewsName='$catNews'", $db::$NUM_ROW);
        if ($r == 1) {
            $call = array("error" => true, "MSG" => "دسته بندی تکراری است");
            echo json_encode($call);
            return;
        }
        $id =$db::GenerateId();
        $data = $db::GetDate();
        $time = $db::GetTime();
        $idAdmin = $_SESSION['adminId'];
        $insert = $db::Query(" INSERT INTO categorynews 
   (catNewsId, catNewsName, catNewsRegDate, catNewsRegTime, catNewsAdminId)
    VALUES ('$id','$catNews','$data','$time','$idAdmin')");
        $call =array("error" => false);
        echo json_encode($call);
        return;
    }else{
        $call = array("error" => true, "MSG" => "تمامی فیلد ها اجباری است");
        echo json_encode($call);
        return;
    }
}
