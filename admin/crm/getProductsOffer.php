<?php
header("Content-Type:application/json");
include "../class/dataBase.php";
$db=new dataBase();
$getpro = $db::Query("SELECT * FROM product,admin,subcategory,category,brand WHERE product.productAdminId=admin.adminId AND product.productSubCatid=subcategory.subId AND subcategory.subCatId=category.catId AND product.productBrandId=brand.brandId");
while ($rowCat = mysqli_fetch_assoc($getpro)) {
    $resulter[] = array(
        'id' => $rowCat['productId'],
        'active' => $rowCat['active'],
        'price' => $rowCat['productPrice'],
        'created_date' => $rowCat['productRegDate'],
        'created_time' => $rowCat['productRegTime'],
        'creatorId' => $rowCat['productAdminId'],
        'creator' => $rowCat['adminName'],
        'subId' => $rowCat['productSubCatid'],
        'subCatName' => $rowCat['subName'],
        'catId' => $rowCat['catId'],
        'catName' => $rowCat['catName'],
        'description' => $rowCat['Description'],
        'offer' => $rowCat['offer'],
        'brandId' => $rowCat['productBrandId'],
        'brand' => $rowCat['brand'],
        'guarantee' => $rowCat['guarantee']
        );
    }
    $call['products'] = $resulter;
    $products = json_encode($call);
    $_SESSION['products'] = $products;
echo $products;
