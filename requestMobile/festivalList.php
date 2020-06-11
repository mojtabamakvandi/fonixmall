<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 2019-10-05
 * Time: 10:55
 */

include "../admin/class/dataBase.php";
$db=new dataBase();
$_POST  = $db::RealString($_POST);
include "inc/checkLogin.php";


$selectFestival = $db::Query("SELECT * FROM festival");
while ($rowFestival = mysqli_fetch_assoc($selectFestival)){
    $festival[]=array(
        "id"=>$rowFestival['festivalId'],
        "Percentage"=>$rowFestival['festivalOfferPercentage'],
        "img"=>'img/'.$rowFestival['festivalImg'],
        "name"=>$rowFestival['festivalName']

    );
}
$call = array("error"=>false);
$call["festival"]=$festival;
echo json_encode($call);
return;