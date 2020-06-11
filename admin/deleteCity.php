<?php
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    include "class/dataBase.php";

    $db=new dataBase();
    $real=$db::RealString($_GET);

    $id = '';
    $id = $real['cityId'];

    $query = $db::Query("delete from city where cityId='$id'");
    header("location:showCity.php");
}
?>
