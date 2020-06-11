<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['subcategory']) && $_POST['subcategory'] != '' &&
        isset($_POST['subsubName']) && $_POST['subsubName'] != ''

    ) {
        $result = $db::RealString($_POST);
        $subcategory = $result['subcategory'];
        $subsubName = $result['subsubName'];
        $id = $result['id'];


        $s = $db::Query("SELECT  * FROM subsubcategory where subsubName='$subName' AND subsubId!='$id'", $db::$NUM_ROW);
        if ($s == 1) {
            $call = array("error" => true, "MSG" => "محصول تکراری است");
            echo json_encode($call);
            return;
        }
        $data = $db::GetDate();
        $time = $db::GetTime();
        $idAdmin = $_SESSION['adminId'];
        $upsub = $db::Query("update subsubcategory set subsubName='$subName',subSubCatId='$category',subsubAdminId=$idAdmin where subsubId='$id'");
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
