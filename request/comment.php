<?php
include "../admin/class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginUser']) && $_SESSION['loginUser']==true) {
    if (
        isset($_POST['comment']) && $_POST['comment'] != ''
        &&
        isset($_POST['id']) && $_POST['id'] != ''

    ) {
        $result = $db::RealString($_POST);
        $comment = $result['comment'];
        $prID = $result['id'];
        $username = $_SESSION['userId'];

        $s = $db::Query("SELECT  * FROM comment where commentText='$comment' AND commentUserId='$username'", $db::$NUM_ROW);
        if ($s == 1) {
            $call = array("error" => true, "MSG" => "نظر تکراری است");
            echo json_encode($call);
            return;
        }
        $id = $db::GenerateId();
        $time = $db::GetTime();
        $date = $db::GetDate();
        $query5 = $db::Query("INSERT INTO comment(commentId, commentText, commentUserId,
                    commentRegDate, commentRegTime, commentAdminIdAccepted,commentProductId) 
          VALUES('$id','$comment','$username','$date','$time','','$prID') ");
        $call = array("error" => false);
        echo json_encode($call);
        return;
    } else {
        $call = array("error" => true, "MSG" => "تمامی فیلد ها پر شود");
        echo json_encode($call);
        return;
    }
}
