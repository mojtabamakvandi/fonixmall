<?php
include "../admin/class/dataBase.php";
$db=new dataBase();
session_start();
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (
            isset($_POST['provinceId']) && $_POST['provinceId'] != ''
        ) {

            $result = $db::RealString($_POST);
            $provinceId = $result['provinceId'];
            $select = $db::Query("SELECT * FROM province where provinceId='$provinceId'",$db::$NUM_ROW);
            if($select==1){

                $getProvince = $db::Query("SELECT * FROM city where cityProvinceId='$provinceId'");
                while ($rowCat = mysqli_fetch_assoc($getProvince)){
                    $resulter[] = array(
                        'id'=>$rowCat['cityId'],
                        'name'=>$rowCat['cityName']
                    );
                }

                $call= array("error"=>false);
                $call['city']=$resulter;
                echo json_encode($call);
            }
        }
    }
