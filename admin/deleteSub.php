<?php
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    include "class/dataBase.php";
    $db=new dataBase();
    $real=$db::RealString($_GET);
    $id = '';
    $id = $real['subId'];
    $query = $db::Query("delete from subcategory WHERE subId='$id'");
    $query = $db::Query("delete from product WHERE productSubCatid='$id'");
    header("location:subCatList.php");
}
?>
