<?php
include "../admin/class/dataBase.php";
$db=new dataBase();
session_start();
    if (
        isset($_POST['userName']) && $_POST['userName'] != '' &&
        isset($_POST['phoneNumber']) && $_POST['phoneNumber'] != '' &&
        isset($_POST['userEmail']) && $_POST['userEmail'] != '' &&
        isset($_POST['userPassword']) && $_POST['userPassword'] != ''



    ) {
        $result = $db::RealString($_POST);
        $userName = $result['userName'];
        $phoneNumber = $result['phoneNumber'];
        $userEmail = $result['userEmail'];
        $userPassword = $db::HashPassword($result['userPassword']);

        $s = $db::Query("SELECT  * FROM shopping.user WHERE userPhonenumber='$phoneNumber'", $db::$NUM_ROW);
        if ($s == 1) {
            $call = array("error" => true, "MSG" => "قبلا با این شماره ثبت نام کرده اید");
            echo json_encode($call);
            return;
        }


        if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
            $call = array("error" => true, "MSG" => "ایمیل اشتباه است");
            echo json_encode($call);
            return;
        }

        $id = $db::GenerateId();
        $time = $db::GetTime();
        $date = $db::GetDate();
        $productq = $db::Query("INSERT INTO user(userId, userName, userRegDate, userRegTime, userEmail, userPhonenumber, userPassword) 
        VALUES ('$id','$userName','$date','$time','$userEmail','$phoneNumber','$userPassword')");
        $call = array("error" => false);
        echo json_encode($call);
        return;
    } else {
        $call = array("error" => true, "MSG" => "تمامی فیلد ها پر شود");
        echo json_encode($call);
        return;
    }

