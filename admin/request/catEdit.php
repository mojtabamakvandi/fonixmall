<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['catName']) && $_POST['catName'] != '' &&
        isset($_POST['catMenuId']) && $_POST['catMenuId'] != '' &&
        isset($_POST['statusList']) && $_POST['statusList'] != ''
    ) {
        $result = $db::RealString($_POST);
        $catName = $result['catName'];
        $statusList = $result['statusList'];
        $catMenuId = $result['catMenuId'];
        $id = $result['id'];
        $idAdmin = $_SESSION['adminId'];
        if(         isset($_POST['img']) && $_POST['img'] != ''
        ){
            $img = $result['img'];
            $nameImage = $db::generateRandomString();
            $db::saveImageBase64($img,'../upload/cat/',$nameImage);
            $upcat = $db::Query("update category set catImg='$nameImage' where catId='$id'");
        }


        $r = $db::Query("SELECT * FROM category where catName='$catName' AND catId!='$id'", $db::$NUM_ROW);
        if ($r == 1) {
            $call = array("error" => true, "MSG" => "دسته بندی تکراری است");
            echo json_encode($call);
            return;
        }
       /* $t = $db::Query("SELECT * FROM category WHERE statusList='$statusList'",$db::$NUM_ROW);
        if ($t == 1){
           $call = array("error"=>true,"MSG"=>"چیدمان تکراری است");
           echo json_encode($call);
           return;
        }*/


        $data = $db::GetDate();
        $time = $db::GetTime();
        $upcat = $db::Query("update category set catName='$catName',catAdminId='$idAdmin',statusList='$statusList',catMenuId='$catMenuId' where catId='$id'");
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
