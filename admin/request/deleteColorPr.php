<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['id']) && $_POST['id'] != ''
    ) {
        $result = $db::RealString($_POST);
        $id = $result['id'];

        $Query = $db::Query("DELETE FROM colorproduct where coPrId='$id'");

        $call = array("error" => false);
        echo json_encode($call);
        return;

    }
}
