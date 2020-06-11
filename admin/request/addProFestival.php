<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['festival']) && $_POST['festival'] != '' &&
        isset($_POST['product']) && $_POST['product'] != ''

    ) {
        $result = $db::RealString($_POST);
        $festival = $result['festival'];
        $product = $result['product'];

        $s = $db::Query("SELECT  * FROM festivalproduct where fePrProductId='$product'", $db::$NUM_ROW);
        if ($s == 1) {
            $call = array("error" => true, "MSG" => "محصول تکراری است");
            echo json_encode($call);
            return;
        }
        $id = $db::GenerateId();
        $time = $db::GetTime();
        $date = $db::GetDate();
        $idAdmin = $_SESSION['adminId'];
        $productq = $db::Query("INSERT INTO festivalproduct (fePrId, fePrProductId, fePrRegDate, fePrRegTime, fePrAdminId, fePrFestivalId) 
        VALUES('$id','$product','$date','$time','$idAdmin','$festival') ");
        $call = array("error" => false);
        echo json_encode($call);
        return;
    } else {
        $call = array("error" => true, "MSG" => "تمامی فیلد ها پر شود");
        echo json_encode($call);
        return;
    }
}
