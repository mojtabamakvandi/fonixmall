<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 2019-10-28
 * Time: 16:34
 */
include "../admin/class/dataBase.php";
$db = new dataBase();
include "inc/checkLogin.php";
if (isset($login) && $login == true) {
    $_POST = $db::RealString($_POST);
    if(
        isset($_POST['name'])
        && $_POST['name']!='' &&
        isset($_POST['email'])
        && $_POST['email']!='' &&
        isset($_POST['phoneNumber'])
        && $_POST['phoneNumber']!=''

    )
    {
        $name = $_POST['name'];
        $phoneNumber = $_POST['phoneNumber'];
        $email = $_POST['email'];

        $update= $db::Query("
UPDATE user SET userName='$name',userPhonenumber='$phoneNumber',
                userEmail='$email' where userId='$userID'
");
        $call = array("error" => false, "login" => true);
        echo json_encode($call);
    }
} else {
    $call = array("error" => false, "login" => false);
    echo json_encode($call);
}