<?php
include "../admin/class/dataBase.php";
$db = new dataBase();
if (isset($_POST['name']) &&
    !empty($_POST['name'])
) {
    $pr=array();
    $arrayCat=array();
    $result = $db::RealString($_POST);
    $name = $result['name'];

    $select = $db::Query("SELECT * FROM product WHERE 
                (product.productName like '%$name%') LIMIT 5");

    $qu = $db::Query("SELECT subName,subId FROM subcategory  WHERE 
                                   (subcategory.subName like '%$name%') LIMIT 5");
    if (mysqli_num_rows($select)==0 && mysqli_num_rows($qu)==0){
        $data = array("error" =>true,"MSG" => "چیزی یافت نشد");
        echo json_encode($data);
        return;
    }else{
        while ($fetch = mysqli_fetch_assoc($select)) {
            $price = $fetch['productPrice'];
            $off = $price / 100 * $fetch['offer'];
            $img = $fetch['productId'];
            $qu = $db::Query("SELECT * FROM gallery WHERE galleryPrId='$img' AND galleryStatus='1'");
            $r = mysqli_fetch_assoc($qu);
            $pr[] = array(
                "price"=>@$db::toMoney($price),
                "percentageOffer"=>$fetch['offer'],
                "priceAfterOffer"=>@$db::toMoney($price-$off),
                "img"=>'gallery/'.$r['galleryImg'].".jpg",
                "star"=>"5",
                "name"=>$fetch["productName"],
                "id"=>$fetch["productId"]
            );
        }
        while ($rowCat = mysqli_fetch_assoc($qu)){
            $arrayCat[] = array(
                "name"=>$rowCat['subName'],
                "img"=>'cat/'.$rowCat['catImg'].".jpg",
                "id"=>$rowCat['subId']
            );
        }
        $call= array("error"=>false);
        $call['product']=$pr;
        $call['cat']=$arrayCat;
        echo json_encode($call);
    }
}
