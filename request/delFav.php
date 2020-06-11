<?php
include "../admin/class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginUser']) && $_SESSION['loginUser']==true) {

    if (
        isset($_POST['favId']) && $_POST['favId'] != ''
    ) {
        $result = $db::RealString($_POST);
        $id = $result['favId'];
        $delete = $db::Query("DELETE FROM fav where favId='$id'");
        $call = array("error"=>false);
        echo json_encode($call);
        return;
    }

    }
