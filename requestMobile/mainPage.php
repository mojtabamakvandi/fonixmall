<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 2019-09-23
 * Time: 15:08
 */
include "../admin/class/dataBase.php";
$db = new dataBase();
$festival=array();
$specialOffer=array();
$select = $db::Query("SELECT * FROM slider");
while ($rowSelect = mysqli_fetch_assoc($select)) {
    $slider[] = array(
        "imageAddress" => 'slider/' . $rowSelect['sliderImg'] . '.jpg'
    );
}

$query3 = $db::Query("SELECT * FROM specialoffer,product WHERE specialOfferProductId=productId LIMIT 10");

while ($fetch = mysqli_fetch_assoc($query3)) {
    $price = $fetch['productPrice'];
    $percentageOffer = $fetch['specialOfferPercentage'];
    $off = $price / 100 * $percentageOffer;
    $img = $fetch['productId'];
    $qu = $db::Query("SELECT * FROM gallery WHERE galleryPrId='$img' AND galleryStatus='1'");
    $r = mysqli_fetch_assoc($qu);
    $specialOffer[] = array(
        "price" => @$db::toMoney($price),
        "percentageOffer" => $percentageOffer,
        "priceAfterOffer" => @$db::toMoney($price - $off),
        "img" => 'gallery/' . $r['galleryImg'] . ".jpg",
        "star" => "5",
        "name" => $fetch["productName"],
        "id" => $fetch["productId"]
    );
}
$query4 = $db::Query("SELECT * FROM category ");
while ($rowCat = mysqli_fetch_assoc($query4)) {
    $arrayCat[] = array(
        "id" => $rowCat['catId'],
        "name" => $rowCat['catName'],
        "img" => 'cat/' . $rowCat['catImg'] . ".jpg"
    );
}

$selectFestival = $db::Query("SELECT * FROM festival");
while ($rowFestival = mysqli_fetch_assoc($selectFestival)){
    $festival[]=array(
        "id"=>$rowFestival['festivalId'],
        "Percentage"=>$rowFestival['festivalOfferPercentage'],
        "img"=>'img/'.$rowFestival['festivalImg'],
        "name"=>$rowFestival['festivalName']
        );
}


$call = array("error" => false);
$call['slider'] = $slider;
$call['specialOffer'] = $specialOffer;
$call["cat"] = $arrayCat;
$call["festival"] = $festival;
echo json_encode($call);


