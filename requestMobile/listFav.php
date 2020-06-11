<?php
include "../admin/class/dataBase.php";
$db = new dataBase();

$userID = "";
include "inc/checkLogin.php";
$productList = array();
if(isset($login) && $login==true) {
        $result = $db::RealString($_POST);
        $select = $db::Query("SELECT * FROM fav where favUserId='$userID'");
        while ($row = mysqli_fetch_assoc($select)){
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
                "catId"=>$row['productId'],
                "id"=>$row["productId"]
            );
        }
        $call =array("error"=>false,"login"=>true);
        $call["favList"]=$productList;
        echo json_encode($call);
        return;


}else{
    $call=array("error"=>false,"login"=>false);
    echo json_encode($call);
    return;
}