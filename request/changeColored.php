<?php
/**
 * Created by PhpStorm.
 * User: RasoolB
 * Date: 26/08/2019
 * Time: 08:12 PM
 */
include "../admin/class/dataBase.php";
$db = new dataBase();
if(isset($_POST['id']) && $_POST['id']!=''){
    $_POST = $db::RealString($_POST);
    $id = $_POST['id'];
    $select = $db::Query("SELECT * FROM colorproduct where coPrId='$id'",$db::$RESULT_ARRAY);
    $price = $select['coPrPrice'];
    $call = array("error"=>false,"price"=>@$db::toMoney($price));
    echo json_encode($call);
}