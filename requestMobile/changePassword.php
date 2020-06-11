<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 2019-10-28
 * Time: 16:19
 */
include "../admin/class/dataBase.php";
$db = new dataBase();
include "inc/checkLogin.php";
if(isset($login) && $login==true) {
    $_POST = $db::RealString($_POST);
    if(
    isset($_POST['password']) &&
       $_POST['password']!='' &&
    isset($_POST['checkPassword']) &&
       $_POST['checkPassword']!='' &&
    isset($_POST['oldPassword']) &&
       $_POST['oldPassword']!=''
    ){
        if($_POST['password']==$_POST['checkPassword']){

            $password = $db::HashPassword($_POST['password']);
            $oldPassword = $db::HashPassword($_POST['oldPassword']);

            $select = $db::Query("SELECT * FROM user where
                             userId='$userID' AND userPassword='$oldPassword'"
                            ,$db::$NUM_ROW);
            if($select>0){
                $update = $db::Query("UPDATE user SET userPassword='$password' WHERE userId='$userID'");
                $call= array("error"=>false,"login"=>true);
                echo json_encode($call);
            }else{
                $call= array("error"=>true,"MSG"=>"رمز عبور اشتباه وارد شده است.","login"=>true);
                echo json_encode($call);
            }
        }else{
            $call= array("error"=>true,"MSG"=>"رمز عبور یکسان نمی باشد.","login"=>true);
            echo json_encode($call);
        }

    }
}else{
    $call = array("error"=>false,"login"=>false);
    echo json_encode($call);
}