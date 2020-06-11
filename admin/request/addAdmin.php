<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (
            isset($_POST['password']) && $_POST['password'] != '' &&
            isset($_POST['username']) && $_POST['username'] != '' &&
            isset($_POST['level']) && $_POST['level'] != '' &&
            isset($_POST['name']) && $_POST['name'] != ''
        ) {
            $result = $db::RealString($_POST);
            $password = $db::HashPassword($result['password']);
            $username = $result['username'];
            $level = $result['level'];
            $name = $result['name'];

            $Q = $db::Query("SELECT * FROM admin where adminUsername='$username'", $db::$NUM_ROW);
            if ($Q == 1) {
                $call = array("error" => true, "MSG" => "نام کاربری تکراری است");
                echo json_encode($call);
                return;
            }
            $adminId = $db::GenerateId();
            $insert = $db::Query("INSERT INTO admin
        (adminId, adminPassword, adminName, adminLevel, adminUsername) 
          VALUES ('$adminId','$password','$name','$level','$username')");

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