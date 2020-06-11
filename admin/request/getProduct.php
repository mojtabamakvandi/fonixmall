<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (
            isset($_POST['subId']) && $_POST['subId'] != ''
        ) {
            $result = $db::RealString($_POST);
            $subId = $result['subId'];
            $select = $db::Query("SELECT * FROM subcategory where subId='$subId'",$db::$NUM_ROW);
            if($select==1){
                $getpro = $db::Query("SELECT * FROM product where productSubCatid='$subId'");
                while ($rowCat = mysqli_fetch_assoc($getpro)){
                    $resulter[] = array(
                        'id'=>$rowCat['productId'],
                        'name'=>$rowCat['productName']
                    );
                }

                $call= array("error"=>false);
                $call['product']=$resulter;
                echo json_encode($call);
            }
        }
    }
}