<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['newsCategory']) && $_POST['newsCategory'] != '' &&
        isset($_POST['newsText']) && $_POST['newsText'] != '' &&
        isset($_POST['newsTitle']) && $_POST['newsTitle'] != ''

    ) {
        $result = $db::RealString($_POST);
        $newsCategory = $result['newsCategory'];
        $newsText = $result['newsText'];
        $newsTitle = $result['newsTitle'];

        $s = $db::Query("SELECT  * FROM news where newsText='$newsText'", $db::$NUM_ROW);
        if ($s == 1) {
            $call = array("error" => true, "MSG" => "محصول تکراری است");
            echo json_encode($call);
            return;
        }
        $id = $db::GenerateId();
        $time = $db::GetTime();
        $date = $db::GetDate();
        $idAdmin = $_SESSION['adminId'];
        $query8 = $db::Query("INSERT INTO news (newsId,newsTitle, newsText, newsRegDate, newsRegTime, newsCatNewsId) VALUES
             ('$id','$newsTitle','$newsText','$date','$time','$newsCategory')");
        $call = array("error" => false);
        echo json_encode($call);
        return;
    } else {
        $call = array("error" => true, "MSG" => "تمامی فیلد ها پر شود");
        echo json_encode($call);
        return;
    }
}
