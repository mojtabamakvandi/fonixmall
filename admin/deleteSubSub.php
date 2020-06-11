<?php
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    include "class/dataBase.php";

    $db=new dataBase();
    $real=$db::RealString($_GET);

    $id = '';
    $id = $real['subsubId'];

    $query = $db::Query("delete from subsubcategory WHERE subsubId='$id'");
    $query = $db::Query("delete from product WHERE productSubSubCatid='$id'");
    header("location:subsubCatList.php");
}
?>
