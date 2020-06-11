<?php
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    include "class/dataBase.php";

    $db=new dataBase();
    $real=$db::RealString($_GET);

    $id = '';
    $id = $real['prPrId'];

    $query = $db::Query("delete from productproperties where prPrId='$id'");
    header("location:showProductProreties.php");
}
?>
