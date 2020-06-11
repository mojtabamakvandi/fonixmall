<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['festivalName']) && $_POST['festivalName'] != '' &&
        isset($_POST['title']) && $_POST['title'] != '' &&
        isset($_POST['festivalOfferPercentage']) && $_POST['festivalOfferPercentage'] != ''
    ) {
        $result = $db::RealString($_POST);
        $festivalName = $result['festivalName'];
        $title = $result['title'];
        $festivalOfferPercentage = $result['festivalOfferPercentage'];
        $img = $result['img'];
        $id = $result['id'];


        /*$r = $db::Query("SELECT * FROM festival where festivalName='$festivalName'", $db::$NUM_ROW);
        if ($r == 1) {
            $call = array("error" => true, "MSG" => "فستیوال تکراری است");
            echo json_encode($call);
            return;
        }*/
        $nameImage = $db::generateRandomString();

        $db::saveImageBase64($img,'../upload/img/',$nameImage);


        $data = $db::GetDate();
        $time = $db::GetTime();
        $idAdmin = $_SESSION['adminId'];
        if($img==null){
            $festivalqu = $db::Query("update festival set festivalName='$festivalName',festivalOfferPercentage='$festivalOfferPercentage',title='$title' where festivalId='$id'");
        }else{
            $festivalqu = $db::Query("update festival set festivalName='$festivalName',festivalOfferPercentage='$festivalOfferPercentage',festivalImg='$nameImage',title='$title' where festivalId='$id'");
        }
            $call =array("error" => false);
            echo json_encode($call);
            return;

    }else{
        $call = array("error" => true, "MSG" => "تمامی فیلد ها اجباری است");
        echo json_encode($call);
        return;
    }
}
