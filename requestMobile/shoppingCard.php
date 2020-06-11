<?php
/**
 * Created by PhpStorm.
 * User: RasoolB
 * Date: 25/08/2019
 * Time: 04:46 PM
 */
if(
    isset($_POST['PrId']) && $_POST['PrId'] &&
    isset($_POST['count']) && $_POST['count']
) {
    include "../admin/class/dataBase.php";
    $db=new dataBase();
    $_POST  = $db::RealString($_POST);
    $userID = "";
    include "inc/checkLogin.php";
    $_POST = $db::RealString($_POST);
    $PrId = $_POST['PrId'];
    $count = $_POST['count'];

    if (isset($userID) && $userID != "") {

        $select = $db::Query("SELECT * FROM shoppingbasket where SHBPay='0' AND SHBUserId='$userID'");
        if (mysqli_num_rows($select) == 0) {
            $SHBid = $db::GenerateId();
            $date = $db::GetDate();
            $time = $db::GetTime();
            $insert = $db::Query("INSERT INTO shoppingbasket
            (SHBid, SHBUserId, SHBModel, SHBRegDate, SHBRegTime, SHBPay, SHBGuest)
            VALUES ('$SHBid','$userID','0','$date','$time','0','')");
        } else {
            $result = mysqli_fetch_assoc($select);
            $SHBid = $result['SHBid'];
        }
        if ($count == 'delete') {
            $delete = $db::Query("DELETE FROM productshb where PSHBSHBId='$SHBid' AND PSHBPrId='$PrId'");

        } else {
            $countGet = $db::Query("SELECT * FROM productshb where PSHBPrId='$PrId' AND PSHBSHBId='$SHBid'", $db::$NUM_ROW);
            if ($countGet == 1) {
                if ($count == "addBTN") {
                    $countGetArray = $db::Query("SELECT * FROM productshb where PSHBPrId='$PrId' AND PSHBSHBId='$SHBid'", $db::$RESULT_ARRAY);
                    $countAfter = $countGetArray['PSHBCount'] + 1;
                    $update = $db::Query("UPDATE productshb set PSHBCount='$countAfter' where PSHBSHBId='$SHBid' AND PSHBPrId='$PrId'");
                } else {
                    $update = $db::Query("UPDATE productshb set PSHBCount='$count' where PSHBSHBId='$SHBid' AND PSHBPrId='$PrId'");
                }
            } else {
                if ($count == "addBTN") {
                    $count = '1';
                }
                $SHBPrId = $db::GenerateId();
                $date = $db::GetDate();
                $time = $db::GetTime();

                $insertPr = $db::Query("INSERT INTO productshb
                 (PSHBid, PSHBPrId, PSHBCount, PSHBRegDate,
                 PSHBRegTime, PSHBLastPrice, PSHBSHBId)
                 VALUES ('$SHBPrId','$PrId','$count','$date','$time','0','$SHBid')");
            }
        }
        $array = array("error" => false, "login" => true);
        echo json_encode($array);
    }else{
        if (isset($_POST['GustId']) && $_POST['GustId'] != '') {
            $GustId = $_POST['GustId'];
        } else {
            $GustId = $db::GenerateId();
        }
        $select = $db::Query("SELECT * FROM shoppingbasket where SHBPay='0' AND shoppingbasket.SHBGuest='$GustId'");
        if (mysqli_num_rows($select) == 0) {
            $SHBid = $db::GenerateId();
            $date = $db::GetDate();
            $time = $db::GetTime();
            $insert = $db::Query("INSERT INTO shoppingbasket
            (SHBid, SHBUserId, SHBModel, SHBRegDate, SHBRegTime, SHBPay, SHBGuest)
            VALUES ('$SHBid','','0','$date','$time','0','$GustId')");
        } else {
            $result = mysqli_fetch_assoc($select);
            $SHBid = $result['SHBid'];
        }
        if ($count == 'delete') {
            $delete = $db::Query("DELETE FROM productshb where PSHBSHBId='$SHBid' AND PSHBPrId='$PrId'");
        } else {
            $countGet = $db::Query("SELECT * FROM productshb where PSHBPrId='$PrId' AND PSHBSHBId='$SHBid'", $db::$NUM_ROW);
            if ($countGet == 1) {
                if ($count == "addBTN") {
                    $countGetArray = $db::Query("SELECT * FROM productshb where PSHBPrId='$PrId' AND PSHBSHBId='$SHBid'", $db::$RESULT_ARRAY);
                    $countAfter = $countGetArray['PSHBCount'] + 1;
                    $update = $db::Query("UPDATE productshb set PSHBCount='$countAfter' where PSHBSHBId='$SHBid' AND PSHBPrId='$PrId'");

                } else {
                    $update = $db::Query("UPDATE productshb set PSHBCount='$count' where PSHBSHBId='$SHBid' AND PSHBPrId='$PrId'");
                }
            } else {
                $SHBPrId = $db::GenerateId();
                $date = $db::GetDate();
                $time = $db::GetTime();
                if ($count == "addBTN") {
                    $count = '1';
                }
                $insertPr = $db::Query("INSERT INTO productshb
                 (PSHBid, PSHBPrId, PSHBCount, PSHBRegDate,
                 PSHBRegTime, PSHBLastPrice, PSHBSHBId)
                 VALUES ('$SHBPrId','$PrId','$count','$date','$time','0','$SHBid')");
            }
        }
        $array = array("error" => false,"login"=>false,"gustId"=>$GustId);
        echo json_encode($array);
        }

}





