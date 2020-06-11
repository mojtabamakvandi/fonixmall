<?php
try {
	date_default_timezone_set("Asia/Tehran");
	include_once("Classes/SendMessage.php");
	include_once("Classes/Config.php");
	// your mobile numbers
	$MobileNumbers = array('09363229872','09367006135');
	// your text messages
	$Messages = array('Hello Mojtaba','Hello Maryam');
	// sending date
	@$SendDateTime = date("Y-m-d")."T".date("H:i:s");
	$SmsIR_SendMessage = new SmsIR_SendMessage($APIKey,$SecretKey,$LineNumber);
	$SendMessage = $SmsIR_SendMessage->SendMessage($MobileNumbers,$Messages,$SendDateTime);
	var_dump($SendMessage);
} catch (Exeption $e) {
	echo 'Error SendMessage : '.$e->getMessage();
}
?>
