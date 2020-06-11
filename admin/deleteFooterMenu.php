<?php
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    include "class/dataBase.php";

    $db=new dataBase();
    $real=$db::RealString($_GET);

    $id = '';
    $id = $real['footerMenuId'];

    $query = $db::Query("delete from footermenu where footerMenuId='$id'");
    header("location:footerMenuShow.php");
}
?>
