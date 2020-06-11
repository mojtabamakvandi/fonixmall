<?php
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    include "class/dataBase.php";

    $db=new dataBase();
    $real=$db::RealString($_GET);

    $id = '';
    $id = $real['provinceId'];

    $query = $db::Query("delete from province where provinceId='$id'");
    $query = $db::Query("delete from city where cityProvinceId='$id'");
    header("location:showProvince.php");
}
?>
