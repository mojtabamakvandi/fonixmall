<?php
include "class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {

    if (isset($_POST['id']) && $_POST['id'] != ''){

    $real=$db::RealString($_POST);
    $id = $real['id'];
    $del = $db::Query("SELECT * FROM subcategory,category WHERE subCatId='$id'",$db::$NUM_ROW);
    if ($del != 0){
        $call = array("error" => true, "MSG" => "ابتدا زیر دسته بندی و محصولات زیر دسته بندی حذف شود");
        echo json_encode($call);
        return;
    }else{
        $query = $db::Query("delete from category WHERE catId='$id'");
        $uu = $db::Query("select * from subcategory where subCatId ='$id'");

        while ($fetch=mysqli_fetch_assoc($uu)) {
            $subId = $fetch['subId'];

            $query2 = $db::Query("delete from product WHERE productSubCatid='$subId'");
        }
        $query1 = $db::Query("delete from subcategory WHERE subCatId='$id'");

        $call = array("error"=>false,"MSG"=>"حذف با موفقیت انجام شد");
        echo json_encode($call);
        header("location:cat_list");
    }
    }


}
?>
