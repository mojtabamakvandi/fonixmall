<?php
$userID = "";
include "../admin/class/dataBase.php";
$db=new dataBase();
$_POST  = $db::RealString($_POST);
include "inc/checkLogin.php";
if(isset($login) && $login!="") {
    if (
        isset($_POST['id']) && $_POST['id'] != ''
    ) {
        $result = $db::RealString($_POST);
        $select = $db::Query("SELECT * FROM fav where favUserId='$userID' AND favPrId='$id'",$db::$NUM_ROW);
        if($select==1){
            $delete = $db::Query("DELETE FROM fav where favPrId='$id' AND favUserId='$userID'");
            $like = false;
        }else{
            $date = $db::GetDate();
            $time = $db::GetTime();
            $favId = $db::GenerateId();
            $insert= $db::Query("INSERT INTO fav (favId, favPrId, favUserId) VALUES ('$favId','$id','$userID')");
            $like=true;
        }
        $call = array("error"=>false,"fav"=>$like,"login"=>true);
        echo json_encode($call);
        return;
    }

}else{
    $call=array("error"=>false,"login"=>false);
    echo json_encode($call);
    return;
}