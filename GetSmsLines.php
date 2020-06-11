<?php
try {
	date_default_timezone_set("Asia/Tehran");
	include_once("Classes/GetSmsLines.php");
	include_once("Classes/Config.php");
	$SmsIR_GetSmsLines = new SmsIR_GetSmsLines($APIKey,$SecretKey);
	$GetSmsLines = $SmsIR_GetSmsLines->GetSmsLines();
	var_dump($GetSmsLines);
} catch (Exeption $e) {
	echo 'Error GetSmsLines : '.$e->getMessage();
}
?>
