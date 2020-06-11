<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 2019-09-23
 * Time: 18:17
 */


if(
    isset($_POST['userName']) &&
    $_POST['userName']!='' &&
    isset($_POST['userPassword']) &&
    $_POST['userPassword']!=''){
    $_POST = $db::RealString($_POST);
    $userName = $_POST['userName'];
    $password = $db::HashPassword($_POST['userPassword']);
    $selectUser = $db::Query("SELECT * FROM user WHERE userName ='$userName' AND userPassword='$password'");
    if(mysqli_num_rows($selectUser)==0){
        $login=false;
    }else{
        $rowUser = mysqli_fetch_assoc($selectUser);
        $userID = $rowUser['userId'];
        $login=true;

    }
}