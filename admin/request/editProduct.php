<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['subCat']) && $_POST['subCat'] != '' &&
        isset($_POST['brand']) && $_POST['brand'] != '' &&
        isset($_POST['productName']) && $_POST['productName'] != '' &&
        isset($_POST['productPrice']) && $_POST['productPrice'] != ''
    ) {
        $result = $db::RealString($_POST);
        $sub = $result['subCat'];
        $brand = $result['brand'];
        $productName = $result['productName'];
        $productPrice = $result['productPrice'];
        $description = $result['description'];
        $offer = $result['offer'];
        $guarantee = $result['guarantee'];
        $active = $result['active'];
        $id = $result['id'];
        $img = $result['img'];
        $galleryStatus = $result['galleryStatus'];

        if($img!=null && $img!=''){
            $nameImage = $db::generateRandomString();
            $db::saveImageBase64($img,'../upload/gallery/',$nameImage);
            $gallery = $db::Query("UPDATE gallery SET galleryImg='$nameImage', galleryStatus='$galleryStatus' WHERE galleryPrId='$id'");
        }
        /*$s = $db::Query("SELECT * FROM product where productName='$productName' ", $db::$NUM_ROW);*/
        /*if ($s == 1) {
            $call = array("error" => true, "MSG" => "محصول تکراری است");
            echo json_encode($call);
            return;
        }*/
        $time = $db::GetTime();
        $date = $db::GetDate();
        $idAdmin = $_SESSION['adminId'];
        $product = $db::Query("update product set productSubCatid='$sub',productName='$productName',productPrice='$productPrice',productAdminId='$idAdmin',Description='$description',offer='$offer',productBrandId='$brand',guarantee='$guarantee',active='$active' where productId='$id'");


        if($product){

            $call =array("error" => false,"imgName" => $gallery);
            echo json_encode($call);
            return;
        }
    } else {
        $call = array("error" => true, "MSG" => "تمامی فیلد ها باید تکمیل گردد");
        echo json_encode($call);
        return;
    }
}
