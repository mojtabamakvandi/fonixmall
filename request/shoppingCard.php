<?php
/**
 * Created by PhpStorm.
 * User: RasoolB
 * Date: 25/08/2019
 * Time: 04:46 PM
 */
include "../admin/class/dataBase.php";
$db = new dataBase();
if(
    isset($_POST['PrId']) && $_POST['PrId'] &&
    isset($_POST['count']) && $_POST['count']
) {
    $PostResult = $db::RealString($_POST);
    $PrId = $PostResult['PrId'];
    $count = $PostResult['count'];
    session_start();
    $_SESSION = $db::RealString($_SESSION);
    if (isset($_SESSION['loginUser']) && $_SESSION['loginUser'] == true) {
        $userId = $_SESSION['userId'];
        $select = $db::Query("SELECT * FROM shoppingbasket where SHBPay='0' AND SHBUserId='$userId'");
        if (mysqli_num_rows($select) == 0) {

            $SHBid = $db::GenerateId();
            $_SESSION['SHBid'] = $SHBid;
            $date = $db::GetDate();
            $time = $db::GetTime();
            $insert = $db::Query("INSERT INTO shoppingbasket
            (SHBid, SHBUserId, SHBModel, SHBRegDate, SHBRegTime, SHBPay, SHBGuest)
            VALUES ('$SHBid','$userId','0','$date','$time','0','')");

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


    } else {
        if (isset($_SESSION['GustId']) && $_SESSION['GustId'] != '') {
            $GustId = $_SESSION['GustId'];
        } else {
            $GustId = $db::GenerateId();
            $_SESSION['GustId'] = $GustId;
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

        }
    $array = array("error" => false);
    echo json_encode($array);


}

