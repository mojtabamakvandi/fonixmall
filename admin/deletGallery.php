<?php
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    include "class/dataBase.php";

    $db=new dataBase();
    $real=$db::RealString($_GET);

    $id = '';
    $id = $real['galleryId'];

    $query = $db::Query("delete from gallery where galleryId='$id'");
    header("location:showGallery.php");
}
?>
