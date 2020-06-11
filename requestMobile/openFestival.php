<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 2019-10-05
 * Time: 10:57
 */
include "../admin/class/dataBase.php";
$db = new dataBase();
if (isset($_POST['id']) &&
    !empty($_POST['id'])
) {
    $_POST = $db::RealString($_POST);
    $productList=array();
    $id = $_POST['id'];
    $cat = $db::Query("SELECT * FROM festivalproduct,product where 
                                            fePrFestivalId='$id' AND productId=fePrProductId ");
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
    $call['product']=$productList;
    echo json_encode($call);

}