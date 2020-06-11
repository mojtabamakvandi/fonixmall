<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['product']) && $_POST['product'] != '' &&
        isset($_POST['properties']) && $_POST['properties'] != '' &&
        isset($_POST['value']) && $_POST['value'] != ''

    ) {
        $result = $db::RealString($_POST);
        $product = $result['product'];
        $properties = $result['properties'];
        $value = $result['value'];

        $s = $db::Query("SELECT  * FROM productproperties where prPrPropertiesId='$properties'", $db::$NUM_ROW);
        if ($s == 1) {
            $call = array("error" => true, "MSG" => "محصول تکراری است");
            echo json_encode($call);
            return;
        }
        $id = $db::GenerateId();
        $time = $db::GetTime();
        $date = $db::GetDate();
        $query5 = $db::Query("INSERT INTO productproperties(prPrId, prPrPropertiesId, prPrValue, prPrRegDate, prPrRegTime, proId) 
        VALUES('$id','$properties','$value','$date','$time','$product') ");
        $call = array("error" => false);
        echo json_encode($call);
        return;
    } else {
        $call = array("error" => true, "MSG" => "تمامی فیلد ها پر شود");
        echo json_encode($call);
        return;
    }
}
