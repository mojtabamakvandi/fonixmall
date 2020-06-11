<?php
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    include "class/dataBase.php";

    $db=new dataBase();
    $real=$db::RealString($_GET);

    $id = '';
    $id = $real['specialOfferid'];

    $query = $db::Query("delete from specialoffer where specialOfferid='$id'");
    header("location:showSpOffer.php");
}
?>
