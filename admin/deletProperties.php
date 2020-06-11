<?php
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    include "class/dataBase.php";

    $db=new dataBase();
    $real=$db::RealString($_GET);

    $id = '';
    $id = $real['proId'];

    $query = $db::Query("delete from properties where proId='$id'");
    $query = $db::Query("delete from productproperties where prPrPropertiesId='$id'");
    header("location:showProperties.php");
}
?>
