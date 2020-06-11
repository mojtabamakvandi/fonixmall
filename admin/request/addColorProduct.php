<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (
            isset($_POST['id']) && $_POST['id'] != '' &&
            isset($_POST['colorPicker']) && $_POST['colorPicker'] != '' &&
            isset($_POST['count']) && $_POST['count'] != '' &&
            isset($_POST['price']) && $_POST['price'] != ''
        ) {
            $result = $db::RealString($_POST);
            $id = $result['id'];
            $colorPicker = $result['colorPicker'];
            $count = $result['count'];
            $price = $result['price'];

            $Q = $db::Query("SELECT * FROM colorproduct where
                                 coPrColorId='$colorPicker' AND coPrProductId='$id'", $db::$NUM_ROW);
            if ($Q == 1) {
                $call = array("error" => true, "MSG" => "این رنگ قبلا موجود است");
                echo json_encode($call);
                return;
            }
            $prId = $db::GenerateId();
            $date = $db::GetDate();
            $time = $db::GetTime();
            $adminId = $_SESSION['adminId'];

            $insert = $db::Query("
            INSERT INTO colorproduct
              (coPrId, coPrProductId, coPrColorId, coPrPrice, coPrCount, coPrRegDate, coPrRegTime, coPrAdminId) 
              VALUES (
                  '$prId','$id','$colorPicker','$price','$count','$date','$time','$adminId'    
              )
            ");

            $call = array("error" => false,'id'=>$prId);
            echo json_encode($call);
            return;
        } else {
            $call = array("error" => true, "MSG" => "تمامی فیلدها اجباری می باشند.");
            echo json_encode($call);
            return;
        }
    }
}