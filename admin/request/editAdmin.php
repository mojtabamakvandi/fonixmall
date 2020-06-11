<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (
            isset($_POST['password']) &&
            isset($_POST['username']) && $_POST['username'] != '' &&
            isset($_POST['id']) && $_POST['id'] != '' &&
            isset($_POST['level']) && $_POST['level'] != '' &&
            isset($_POST['name']) && $_POST['name'] != ''
        ) {
            $result = $db::RealString($_POST);
            $password = $db::HashPassword($result['password']);

            if($_POST['password']!=''){
                $password = $db::HashPassword($result['password']);
                $up =$db::Query("update admin set adminPassword='$password'");
            }

            $username = $result['username'];
            $level = $result['level'];
            $name = $result['name'];
            $id = $result['id'];

            $Q = $db::Query("SELECT * FROM admin where adminUsername='$username' AND adminId!='$id'", $db::$NUM_ROW);
            if ($Q == 1) {
                $call = array("error" => true, "MSG" => "نام کاربری تکراری است");
                echo json_encode($call);
                return;
            }
            $adminId = $db::GenerateId();
            $up = $db::Query("update admin set adminUsername='$username',adminName='$name',adminLevel='$level' where shopping.admin.adminId='$id'");

            $call = array("error" => false);
            echo json_encode($call);
            return;
        } else {
            $call = array("error" => true, "MSG" => "تمامی فیلدها اجباری می باشند.");
            echo json_encode($call);
            return;
        }
    }
}