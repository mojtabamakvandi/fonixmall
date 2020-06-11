<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 2019-09-23
 * Time: 18:34
 */

include "../admin/class/dataBase.php";

$db = new dataBase();
if(isset($_POST['id']) && $_POST['id']){
    include "inc/checkLogin.php";

    $_POST = $db::RealString($_POST);
    $id = $_POST['id'];
    $selectPr = $db::Query("SELECT * FROM product where productId='$id'",$db::$RESULT_ARRAY);
    $prDetail = $selectPr['Description'];
    $prName = $selectPr['productName'];
    $price1 = $selectPr['productPrice'];
    $specialSelect = $db::Query("SELECT * FROM specialoffer where specialOfferProductId='$id'");
    if(mysqli_num_rows($specialSelect)==1){
        $rowSp = mysqli_fetch_assoc($specialSelect);
        $offer  = $rowSp['specialOfferPercentage'];
    }else{
        $offer = $selectPr['offer'];
    }
    $catId = $selectPr['productSubCatid'];
    $select = $db::Query("SELECT * FROM subcategory where subId='$catId'",$db::$RESULT_ARRAY);
    $catName = $select['subName'];
    $brandId=$selectPr['productBrandId'];
    $selectBrand = $db::Query("SELECT * FROM brand where brandId='$brandId'",$db::$RESULT_ARRAY);
    $brandName = $selectBrand['brand'];

    $likeArray = array();
    $Attr=array();



    $selectAttr = $db::Query("SELECT * FROM productproperties where prPrId='$id'");
    while ($rowPr = mysqli_fetch_assoc($selectAttr)){
        $attrId = $rowPr['prPrPropertiesId'];
        $selectAttrDetail = $db::Query("SELECT * FROM properties where proId='$attrId'",$db::$RESULT_ARRAY);
        $Attr[] = array(
            "name"=>$selectAttrDetail['proName'],
            "value"=>$rowPr['prPrValue']
        );
    }
    $likeSelect= $db::Query("SELECT * FROM product where productId!='$id' AND productSubCatid='$catId'");
    while ($rowLikePr = mysqli_fetch_assoc($likeSelect)){
        $price = $rowLikePr['productPrice'];
        $offer = $rowLikePr['offer'];
        $off = $price / 100 * $offer;

        $img = $rowLikePr['productId'];
        $qu = $db::Query("SELECT * FROM gallery WHERE galleryPrId='$img' AND galleryStatus='1'");
        $r = mysqli_fetch_assoc($qu);

        $likeArray[] = array(
            "price"=>@$db::toMoney($price),
            "percentageOffer"=>$offer,
            "priceAfterOffer"=>@$db::toMoney($price-$off),
            "img"=>'gallery/'.$r['galleryImg'].".jpg",
            "star"=>"5",
            "name"=>$rowLikePr["productName"],
            "id"=>$rowLikePr["productId"]
        );
    }

    $imgSelect = $db::Query("SELECT * FROM gallery where galleryPrId='$id'");
    while ($rowImg = mysqli_fetch_assoc($imgSelect)){
        $imgGallery[] = array(
            "img"=>'gallery/'.$rowImg['galleryImg'].".jpg"
        );
    }
    $numRows=0;
    if (isset($userID) && $userID != "") {
        $numRows = $db::Query("SELECT * FROM fav where favPrId='$id' AND favUserId='$userID'",$db::$NUM_ROW);
    }
        $call = array(
            "userID"=>$userID,
        "fav"=>$numRows>0?true:false,
        "error"=>false,
        "detail"=>$prDetail,
        "name"=>$prName,
        "price"=>@$db::toMoney($price1),
        "offer"=>$offer,
        "catName"=>$catName,
        "brandName"=>$brandName
    );
    $call['attr']=$Attr;
    $call['productLike']=$likeArray;
    $call['img']=$imgGallery;
    echo json_encode($call);

}