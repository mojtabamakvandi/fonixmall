<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['newsCat']) && $_POST['newsCat'] != '' &&
        isset($_POST['newsText']) && $_POST['newsText'] != '' &&
        isset($_POST['newsTitle']) && $_POST['newsTitle'] != ''

    ) {
        $result = $db::RealString($_POST);
        $newsCat = $result['newsCat'];
        $newsText = $result['newsText'];
        $newsTitle = $result['newsTitle'];
        $id = $result['id'];


        $s = $db::Query("SELECT  * FROM news where newsText='$newsText'", $db::$NUM_ROW);
        if ($s == 1) {
            $call = array("error" => true, "MSG" => "خبر تکراری است");
            echo json_encode($call);
            return;
        }
        $data = $db::GetDate();
        $time = $db::GetTime();
        $ne = $db::Query("update news set newsCatNewsId='$newsCat',newsText='$newsText',newsTitle='$newsTitle' where newsId='$id'");
        if($ne){
            $call =array("error" => false);
            echo json_encode($call);
            return;
        }
    } else {
        $call = array("error" => true, "MSG" => "تمامی فیلد ها پر شود");
        echo json_encode($call);
        return;
    }
}
