<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['catNewsName']) && $_POST['catNewsName'] != ''

    ) {
        $result = $db::RealString($_POST);
        $catNewsName = $result['catNewsName'];
        $id = $result['id'];


        $r = $db::Query("SELECT * FROM categorynews where catNewsName='$catNewsName' ", $db::$NUM_ROW);
        if ($r == 1) {
            $call = array("error" => true, "MSG" => "دسته بندی تکراری است");
            echo json_encode($call);
            return;
        }
        $data = $db::GetDate();
        $time = $db::GetTime();
        $idAdmin = $_SESSION['adminId'];
        $newscat = $db::Query("update categorynews set catNewsName='$catNewsName', catNewsAdminId='$idAdmin' where catNewsId='$id'");
        if($newscat){
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
