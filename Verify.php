<?php
include "admin/class/dataBase.php";
session_start();
$db = new dataBase();
$_GET = $db::RealString($_GET);
$facId = $db::GenerateId();
$SHBid = $_SESSION['SHBid'];
$Amount = $_SESSION['amount'];
$facDate = $db::GetDate();
$facTime = $db::GetTime();
$MerchantID = '059ada40-9e75-11e9-a2ca-000c29344814';
$Authority = $_GET['Authority'];

if ($_GET['Status'] == 'OK') {
    $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
    $result = $client->PaymentVerification(
        [
            'MerchantID' => $MerchantID,
            'Authority' => $Authority,
            'Amount' => $Amount,
        ]
    );

    if ($result->Status == 100) {
        $_SESSION['PayMsg']= 'تراکنش موفقیت آمیز بود. کد رهگیری'.$result->RefID;
        $_SESSION['MsgType']='success';
        $query5 = $db::Query("INSERT INTO factor(facId, shbId, amount, facDate, facTime) VALUES ('$facId','$SHBid','$Amount','$facDate','$facTime')");
        $query5 = $db::Query("UPDATE shoppingbasket SET SHBPay = 1 WHERE SHBid = '$SHBid'");
        Header('Location: http://fonixmall.com/index.php');
        return;
    } else {
        $_SESSION['PayMsg']='تراکنش ناموفق. وضعیت: '.$result->Status;
        $_SESSION['MsgType']='error';
        Header('Location: http://fonixmall.com/index.php');
        return;
    }
} else {
    $_SESSION['PayMsg']='تراکنش با انصراف کاربر لغو شد';
    $_SESSION['MsgType']='error';
    Header('Location: http://fonixmall.com/index.php');
    return;
}
