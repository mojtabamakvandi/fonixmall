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
                $getprop = $db::Query("SELECT * FROM properties where prSubCatid='$subId'");
                while ($rowCat = mysqli_fetch_assoc($getprop)){
                    $resulter[] = array(
                        'id'=>$rowCat['proId'],
                        'name'=>$rowCat['proName']
                    );
                }

                $call= array("error"=>false);
                $call['properties']=$resulter;
                echo json_encode($call);
            }
        }
    }
}