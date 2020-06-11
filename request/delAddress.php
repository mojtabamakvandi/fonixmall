<?php
include "../admin/class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginUser']) && $_SESSION['loginUser']==true) {

    if (isset($_POST['addressId']) && $_POST['addressId'] != '') {
        $result = $db::RealString($_POST);
        $id = $result['addressId'];
        $delete = $db::Query("DELETE FROM address where addressId='$id'");
        Header('Location: http://fonixmall.com/Profile.php');
        return;
    }
}
