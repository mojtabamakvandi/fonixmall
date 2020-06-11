<?php
include "../admin/class/dataBase.php";
$db = new dataBase();
if (isset($_POST['name']) &&
    !empty($_POST['name'])
) {
    $result = $db::RealString($_POST);
    $name = $result['name'];

    $select = $db::Query("SELECT productName,productId FROM product WHERE product.active = true AND
                (product.productName like '%$name%') LIMIT 5");


    $qu = $db::Query("SELECT catName,catId FROM category  WHERE 
                                   (category.catName like '%$name%') LIMIT 5");

    if (mysqli_num_rows($select)==0 && mysqli_num_rows($qu)==0){
        $data = array("error" =>true,"MSG" => "چیزی یافت نشد");
        echo json_encode($data);
        return;
    }else{
        $productName = "";
        $catName = "";
        while ($row = mysqli_fetch_assoc($select)){
            $productName.='<p id="hov" style="height: 3pc;display: grid"><a class="nodectrion" href="product.php?productId='.$row["productId"].'"><span class="c-search__result-item c-search__result-icon c-search__result-icon--history">'.$row['productName'].'</span></a></p>';


        }

        while ($row1 = mysqli_fetch_assoc($qu)){
            $catName.='<p  id="hov" style="height: 3pc;display: grid;"><a class="nodectrion" href="search.php?catId='.$row1["catId"].'"><span class="c-search__result-item c-search__result-icon c-search__result-icon--history">'.$row1['catName'].'</span></a></p>';
        }
        $call=array("ok"=>true);
        $call["productName"]=$productName;
        $call["catName"]=$catName;
        echo json_encode($call);
        return;

    }
}
