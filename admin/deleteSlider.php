<?php
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    include "class/dataBase.php";

    $db=new dataBase();
    $real=$db::RealString($_GET);

    $id = '';
    $id = $real['sliderId'];

    $query = $db::Query("delete from slider where sliderId='$id'");
    header("location:showSlider.php");
}
?>
