<?php
include "../admin/class/dataBase.php";
$db=new dataBase();
session_start();

if (isset($_POST['offerCode']) && $_POST['offerCode']!=''){


    $result = $db::RealString($_POST);
    $offer = $result['offerCode'];

    $select = $db::Query("SELECT * FROM offercode WHERE OCCode=$offer");
    if (mysqli_num_rows($select) == 1){
        $fetch = mysqli_fetch_assoc($select);
        $oc = $fetch['OCPercentage'];

        $call = array(
            "error" => false,"pr"=>$oc);
        echo json_encode($call);
    }else{
        $call = array("error"=>true,"MSG"=>"کد تخفیف اشتباه است");
        echo json_encode($call);
        return;
    }
}else{
    $call = array("error"=>"true","MSG"=>"لطفا کد تخفیف خود را وارد کنید");
    echo json_encode($call);
    return;
}

