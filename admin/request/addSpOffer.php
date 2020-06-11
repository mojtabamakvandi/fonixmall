<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['specialOfferPercentage']) && $_POST['specialOfferPercentage'] != '' &&
        isset($_POST['specialOfferExpireDate']) && $_POST['specialOfferExpireDate'] != '' &&
        isset($_POST['product']) && $_POST['product'] != ''

    ) {
        $result = $db::RealString($_POST);
        $specialOfferPercentage = $result['specialOfferPercentage'];
        $specialOfferExpireDate = $result['specialOfferExpireDate'];
        $product = $result['product'];

        $s = $db::Query("SELECT  * FROM specialoffer where specialOfferProductId='$product'", $db::$NUM_ROW);
        if ($s == 1) {
            $call = array("error" => true, "MSG" => "محصول تکراری است");
            echo json_encode($call);
            return;
        }
        $id = $db::GenerateId();
        $time = $db::GetTime();
        $date = $db::GetDate();
        $idAdmin = $_SESSION['adminId'];
        $productq = $db::Query("INSERT INTO specialoffer(specialOfferid, specialOfferProductId, specialOfferPercentage, specialOfferAdminId, specialOfferRegDate, specialOfferRegTime, specialOfferExpireDate) 
        VALUES ('$id','$product','$specialOfferPercentage','$idAdmin','$date','$time','$specialOfferExpireDate')");
        $call = array("error" => false);
        echo json_encode($call);
        return;
    } else {
        $call = array("error" => true, "MSG" => "تمامی فیلد ها پر شود");
        echo json_encode($call);
        return;
    }
}
