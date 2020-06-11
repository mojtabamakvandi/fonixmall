<?php
include "../admin/class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginUser']) && $_SESSION['loginUser']==true) {

    if (
        isset($_POST['id']) && $_POST['id'] != ''
    ) {
        $result = $db::RealString($_POST);
        $id = $result['id'];
        $userID = $_SESSION['userId'];


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
        $call = array("error"=>false,"like"=>$like);
        echo json_encode($call);
        return;
    }

    }