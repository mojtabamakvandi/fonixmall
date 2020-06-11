<?php
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
include "../class/dataBase.php";

$db=new dataBase();
$real=$db::RealString($_GET);

    $id = '';
    $id = $real['festivalId'];

    $query = $db::Query("delete from festival where festivalId='$id'");
    $query = $db::Query("delete from festivalproduct where fePrFestivalId='$id'");
    header("location:../showFestival.php");
}
?>
