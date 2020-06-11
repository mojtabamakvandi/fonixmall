 <?php
    $client = new SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");
    $user = "09120227235";
    $pass = "1740420586";
    $fromNum = "+983000505";
    $toNum = array("09027292106");
    $op  = "send";
    $pattern_code = '2146';
    $input_data = array(
        "PatientFullName"=>"میلاد یوسفی",
        "ClinicName"=>"پیراتیل"
        );

    //If you want to send in the future  ==> $time = '2016-07-30' //$time = '2016-07-30 12:50:50'

    $time = '';

    echo $client->sendPatternSms($fromNum,$toNum,$user,$pass,$pattern_code,$patterncode);
    echo $status;
    ?>
