<?php
session_start();
if (isset($_SESSION['userId']) && !empty($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    if (
        isset($_POST['email']) && $_POST['email'] != '' &&
        isset($_POST['mobile']) && $_POST['mobile'] != ''
    )
    {


        include "../admin/class/dataBase.php";
        $db = new dataBase();
        $_POST = $db::RealString($_POST);

        $email = $_POST['email'];
        $phoneNumber  = $_POST['mobile'];

        if(
            isset($_POST['password']) && $_POST['password']!='' &&
            isset($_POST['password1']) && $_POST['password1']!=''
        ){
            if($_POST['password'] ===$_POST['password1'] ){
                $password = $db::HashPassword($_POST['password']);
                $update2 = $db::Query("UPDATE user set userPassword='$password' where userId='$userId'");
            }else{
                $call = array("error"=>true,"MSG"=>"رمز عبور یکسان نیست");
                echo json_encode($call);
                return;
            }

        }

        $update = $db::Query("UPDATE user set userEmail='$email',userPhonenumber='$phoneNumber' where userId='$userId'");


        $call = array("error"=>false);
        echo json_encode($call);
        return;
    }
}
