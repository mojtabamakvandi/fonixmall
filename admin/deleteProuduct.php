<?php
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    include "class/dataBase.php";

    $db=new dataBase();
    $real=$db::RealString($_GET);

    $id = '';
    $id = $real['productId'];

    $query = $db::Query("delete from product where productId='$id'");
    $query = $db::Query("delete from gallery where galleryPrId='$id'");
    header("location:productList.php");
}
?>
