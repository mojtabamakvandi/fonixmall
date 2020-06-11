<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 2019-09-23
 * Time: 19:07
 */
include "../admin/class/dataBase.php";
$db = new dataBase();
if(isset($_POST['id']) && $_POST['id']!=''){
    $rowResult=array();
    $productList=array();

    $_POST = $db::RealString($_POST);
    $id = $_POST['id'];
    $cat = $db::Query("SELECT * FROM product,subcategory where subId='$id' AND product.productSubCatid=subId ");
    while ($row = mysqli_fetch_assoc($cat)){
        $price = $row['productPrice'];
        $offer = $row['offer'];
        $off = $price / 100 * $offer;

        $img = $row['productId'];
        $qu = $db::Query("SELECT * FROM gallery WHERE galleryPrId='$img' AND galleryStatus='1'");
        $r = mysqli_fetch_assoc($qu);

        $productList[] = array(
            "price"=>@$db::toMoney($price),
            "percentageOffer"=>$offer,
            "priceAfterOffer"=>@$db::toMoney($price-$off),
            "img"=>'gallery/'.$r['galleryImg'].".jpg",
            "star"=>"5",
            "name"=>$row["productName"],
            "id"=>$row["productId"]
        );
    }
    $call = array("error"=>false);
    $call['productList']=$productList;
    echo json_encode($call);
}