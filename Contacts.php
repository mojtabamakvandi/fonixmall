<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	$param['action'] 	= 'GetGroups';
	$param['username'] 	= '916989778';
	$param['password'] 	= '1740490541';



	$ch = curl_init( );
	curl_setopt( $ch, CURLOPT_URL, "http://crm.vonmedia.ir/post/sendJson.php");
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt( $ch, CURLINFO_HEADER_OUT, true);
	curl_setopt( $ch,CURLOPT_POST, true);
	curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode($param));
	curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen(json_encode($param)))
	);

	curl_setopt( $ch, CURLOPT_TIMEOUT, 500 );
	$result = curl_exec( $ch );
	$result = json_decode($result);
	print_r($result);
?>
