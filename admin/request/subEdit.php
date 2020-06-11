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
        $id = $result['id'];


        $s = $db::Query("SELECT  * FROM subcategory where subName='$subName' AND subId!='$id'", $db::$NUM_ROW);
        if ($s == 1) {
            $call = array("error" => true, "MSG" => "محصول تکراری است");
            echo json_encode($call);
            return;
        }
        $data = $db::GetDate();
        $time = $db::GetTime();
        $idAdmin = $_SESSION['adminId'];
        $upsub = $db::Query("update subcategory set subName='$subName',SubCatId='$category',subAdminId=$idAdmin where subId='$id'");
        if($upsub){
            $call =array("error" => false);
            echo json_encode($call);
            return;
        }
    } else {
        $call = array("error" => true, "MSG" => "تمامی فیلد ها پر شود");
        echo json_encode($call);
        return;
    }
}
