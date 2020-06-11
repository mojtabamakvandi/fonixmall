<?php
include "../admin/class/dataBase.php";
$db=new dataBase();
session_start();
$_SESSION = $db::RealString($_SESSION);
if (isset($_SESSION['loginUser']) && $_SESSION['loginUser'] == true) {
    $result = $db::RealString($_POST);
    $userName = $result['userName'];
    $userId = $result['userId'];
    $userFamily = $result['userFamily'];
    $userPhonenumber = $result['userPhonenumber'];
    $userEmail = $result['userEmail'];
    $userNcode = $result['userNcode'];
    $userBday = $result['userBday'];
    $row = $db::Query("UPDATE user SET userName='$userName', userFamily='$userFamily', userPhonenumber='$userPhonenumber', userEmail='$userEmail', userNcode='$userNcode', userBday='$userBday' WHERE userId='$userId'");
    $call = array("success" => true, "MSG" => "ویرایش مشخصات با موفقیت انجام شد");
    echo json_encode($call);
    return;
}

