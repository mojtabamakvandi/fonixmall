<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 2019-10-05
 * Time: 11:27
 */
include "../admin/class/dataBase.php";
$db= new dataBase();
$userID = "";
include "inc/checkLogin.php";
$shbUserId="";
$pr=array();
$_POST = $db::RealString($_POST);
if (isset($userID) && $userID != "") {
    $shbUserId = $userID;
}else if(isset($_POST['GustId']) && $_POST['GustId']!=''){
    $shbUserId=$_POST['GustId'];
}
$totalPrice = "0";
if($shbUserId!=""){
    $SELECT = $db::Query("SELECT * FROM 
              productshb,shoppingbasket,product where SHBid = PSHBSHBId 
                                                  AND productId=productshb.PSHBPrId AND
                                                   shoppingbasket.SHBPay='0' AND
                                                      (SHBUserId='$shbUserId' OR SHBGuest='$shbUserId')");
    while ($rowPr = mysqli_fetch_assoc($SELECT)) {
        $prDetail = $rowPr['Description'];
        $prName = $rowPr['productName'];
        $idProduct = $rowPr['productId'];

        $specialSelect = $db::Query("SELECT * FROM specialoffer where specialOfferProductId='$idProduct'");
        if(mysqli_num_rows($specialSelect)==1){
            $rowSp = mysqli_fetch_assoc($specialSelect);
            $offer  = $rowSp['specialOfferPercentage'];
        }else{
            $offer = $rowPr['offer'];
        }
        $catId = $rowPr['productSubCatid'];
        $select = $db::Query("SELECT * FROM subcategory where subId='$catId'",$db::$RESULT_ARRAY);
        $catName = $select['subName'];
        $brandId=$rowPr['productBrandId'];
        $selectBrand = $db::Query("SELECT * FROM brand where brandId='$brandId'",$db::$RESULT_ARRAY);
        $brandName = $selectBrand['brand'];



        $price = $rowPr['productPrice'];
        $off = $price / 100 * $offer;


        $selectGallery = $db::Query("SELECT * FROM gallery where galleryPrId='$idProduct' and galleryStatus='1'", $db::$RESULT_ARRAY);

        $img = 'gallery/'.$selectGallery['galleryImg'].'.jpg';
        $price = $rowPr['productPrice'];
        $count  = $rowPr['PSHBCount'];

        $pr[]=array(

            "id"=>$idProduct,
            "img"=>$img,
            "price"=>@$db::toMoney($price),
            "count"=>$count,
            "offer"=>@$db::toMoney($off),
            "detail"=>$prDetail,
            "name"=>$prName,
            "catName"=>$catName,
            "brandName"=>$brandName,
            "total"=>$db::toMoney($price*$count-$off)
        );
        $totalPrice +=$price;
    }
}
$call =array("error"=>false,"total"=>$totalPrice);

$call["product"]=$pr;
echo json_encode($call);


