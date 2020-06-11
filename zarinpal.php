<?php
include "admin/class/dataBase.php";
$db = new dataBase();
if(isset($_GET['price']) && $_GET['price']){
    session_start();
    if(isset($_SESSION['loginUser']) && $_SESSION['loginUser']==true){

        $_SESSION = $db::RealString($_SESSION);
        $username = $_SESSION['userId'];
        $select = $db::Query("SELECT * FROM user WHERE userId='$username'");
        $row = mysqli_fetch_assoc($select);

$_GET = $db::RealString($_GET);
$cost = $_GET['price'];
$price = substr($cost,0,strlen($_GET['price'])-1);
$_SESSION['amount']=$price;
$MerchantID = '059ada40-9e75-11e9-a2ca-000c29344814'; //Required
$Description = 'خرید از فروشگاه اینترنتی فونیکس مال'; // Required
$Email = $row['userEmail']; // Optional
$Mobile = $row['userPhonenumber']; // Optional
$CallbackURL = 'http://fonixmall.com/Verify.php'; // Required





$client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

$result = $client->PaymentRequest(
    [
        'MerchantID' => $MerchantID,
        'Amount' => $price,
        'Description' => $Description,
        'Email' => $Email,
        'Mobile' => $Mobile,
        'CallbackURL' => $CallbackURL,
    ]
);

if ($result->Status == 100)
{
    $location = 'Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority.'/ZarinGate';
    Header($location);
}
else {
    echo'خطا: '.$result->Status;
}
    }
}
