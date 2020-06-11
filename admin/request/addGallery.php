<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['product']) && $_POST['product'] != '' &&
        isset($_POST['img']) && $_POST['img'] != '' &&
        isset($_POST['galleryStatus']) && $_POST['galleryStatus'] != ''

    ) {
        $result = $db::RealString($_POST);
        $product = $result['product'];
        $img = $result['img'];
        $galleryStatus = $result['galleryStatus'];

        if($galleryStatus==1){
                    $s = $db::Query("UPDATE gallery set galleryStatus='0' where galleryPrId='$product'");
        }
        $nameImage = $db::generateRandomString();

        $db::saveImageBase64($img,'../upload/gallery/',$nameImage);


        $id = $db::GenerateId();
        $time = $db::GetTime();
        $date = $db::GetDate();
        $idAdmin = $_SESSION['adminId'];
        $festivalquery = $db::Query("INSERT INTO gallery(galleryId, galleryImg, galleryRegDate, galleryRegTime, galleryStatus, galleryAdminId, galleryPrId) 
        VALUES ('$id','$nameImage','$date','$time','$galleryStatus','$idAdmin','$product')");
        $call = array("error" => false);
        echo json_encode($call);
        return;
    } else {
        $call = array("error" => true, "MSG" => "تمامی فیلد ها پر شود");
        echo json_encode($call);
        return;
    }
}
