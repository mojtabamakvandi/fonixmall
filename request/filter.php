<?php

include('../admin/class/dataBase.php');

$db = new dataBase();

if(isset($_POST["catId"])&&$_POST["catId"]!=null)
{
    $catid = $_POST["catId"];
}

$query = "SELECT productId,productName,productBrandId,productSubCatId,productPrice,offer,galleryImg,category.catId FROM product left join subcategory on product.productSubCatId = subcategory.subId left join gallery on product.productId = gallery.galleryPrId left JOIN category on category.catId = subcategory.subCatId WHERE category.catId='$catid' AND gallery.galleryStatus = '1'  AND active = 1 ";

if (isset($_POST["brand"]))
{
    $brand_filter = implode("','", $_POST["brand"]);
    $query .= " AND productBrandId IN('" . $brand_filter . "')";
}
if (isset($_POST["subcategory"]))
{
    $sub_filter = implode("','", $_POST["subcategory"]);
    $query .= " AND productSubCatId IN('" . $sub_filter . "')";
}

$notting .= '<br/><br/><br/><br/><br/><div class="text-center" style="margin-top:70px">'.
                '<h3 class="alert alert-danger">متاسفانه محصولات مورد نظر یافت نشدند</h3>'.
            '</div>';


$data = $db::Query($query);

if(mysqli_num_rows($data)==0){
    echo $notting;
}else{
    $i = mysqli_num_rows($data);
}
while ($total = mysqli_fetch_assoc($data))
{
    if($total["offer"]>0){
        $price = @$db::toMoney($total["productPrice"] - $total["offer"]);
        $offPercent = $total["offer"]*100/$total["productPrice"];
    }else{
        $price = @$db::toMoney($total["productPrice"]);
    }
    $product .='<div class="col-md-3 col-lg-3 col-sm-12 col-xs-12" style="margin-bottom: 50px;text-align: center;padding: 10px">'.
                       '<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 stylemycard">'.
                       '<a class="pr-block" href="product.php?productId='. $total['productId'] .'">'.
                            /*'<div class="pr-hover">'.
                                '<div style="margin-top: 40%">'.
                                    '<div style="text-align: center">'.
                                        '<a class="pr-icons" href="#"><span> <i class="fa fa-eye"></i> </span></a>'.
                                        '<a class="pr-icons" href="#"><span> <i class="fa fa-list"></i> </span></a>'.
                                        '<a class="pr-icons" onclick="shbADD('. $total['productId'].')"><span> <i class="fa fa-shopping-cart"></i> </span></a>'.
                                    '</div>'.
                                '</div>'.
                            '</div>'.*/
                            '<img src="admin/upload/gallery/'.$total['galleryImg'].'.jpg" style="width: 100%"/>'.
                        '</a>'; if($total["offer"]!="0") { echo
                        '<div class="offtag-search">' .
                        '<p class="IRANSans darsad-takhfif" style="padding: 0;margin: 0">' . $offPercent . '</p>تخفیف %' .
                        '</div>'; }
                        $product .= '<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding: 10px 25px">'.
                        '<h4 class="IRANSans" style="float: right;margin-top: 14px;width: 100%">'.$total["productName"].'</h4>'.
                        '<br/>'.
                        '<br/>'.
                        '<h4 class="SansBold gheymatjadid-search">'. $price . ' ریال </h4>'.
                        '<h4 class="card-text IRANSans gheymatghadim-search">';
                        /*if($total["offer"]>0) echo $price;*/
                        $product .= '</h4><br/>'.
                            '<br/>'.
                            '<br/>'.
                            '<div class="text-center">'.
                                '<a onclick="shbADD('. $total['productId'].')" class="btn btn-primary  SansBold sabad-afzudan-psearch" >اضافه کردن به سبد خرید</a>'.
                            '</div>'.
                        '</div>'.
                   '</div>'.
            '</div>';
        echo $product;
        $i--;
}


