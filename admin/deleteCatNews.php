<?php
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    include "class/dataBase.php";

    $db=new dataBase();
    $real=$db::RealString($_GET);

    $id = '';
    $id = $real['catNewsId'];

    $query = $db::Query("delete from categorynews where catNewsId='$id'");
    $query = $db::Query("delete from news where newsCatNewsId='$id'");
    $query = $db::Query("delete from footermenu where footerMenuSort='$id'");
    header("location:showNewsCat.php");
}
?>
