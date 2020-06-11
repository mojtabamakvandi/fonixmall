<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['menuName']) && $_POST['menuName'] != '' &&
        isset($_POST['pos']) && $_POST['pos'] != '' &&
        isset($_POST['menuImgUrl']) && $_POST['menuImgUrl'] != ''
    ) {
        $result = $db::RealString($_POST);
        $menuName = $result['menuName'];
        $pos = $result['pos'];
        $img = $result['menuImgUrl'];
        $r = $db::Query("SELECT * FROM menus where menuName='$menuName'", $db::$NUM_ROW);
        if ($r == 1) {
            $call = array("error" => true, "MSG" => "فهرست تکراری است");
            echo json_encode($call);
            return;
        }
        $t = $db::Query("SELECT * FROM menus WHERE [position] ='$pos'",$db::$NUM_ROW);
        if ($t == 1){
            $call = array("error"=>true,"MSG"=>"چیدمان خود را عوض کنید");
            echo json_encode($call);
            return;
        }
        $nameImage = $db::generateRandomString();
        $db::saveImageBase64($img,'../upload/menus/',$nameImage);
        $id =$db::GenerateId();
        $data = $db::GetDate();
        $time = $db::GetTime();
        $idAdmin = $_SESSION['adminId'];
        $insert = $db::Query("INSERT INTO menus (menuId, menuName, menuRegDate, menuRegTime, menuAdminId, menuImgUrl,pos) VALUES ('$id','$menuName','$data','$time','$idAdmin','$nameImage','$pos')");
        $call =array("error" => false,"ddd" => true);
        echo json_encode($call);
        return;
    }else{
        $call = array("error" => true, "MSG" => "تمامی فیلد ها اجباری است");
        echo json_encode($call);
        return;
    }
}
