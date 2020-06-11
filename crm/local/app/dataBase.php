<?php
/**
 * Created by PhpStorm.
 * User: amir
 * Date: 1/10/2019
 * Time: 9:22 AM
 */

    class  dataBase
    {
        public static $dbName = 'fonixmal_mydb';
        public static $dbUserName = 'fonixmal_mmm';
        public static $dbPassword = 'R20$PU}qpodX';
        public static $dbAddress = 'localHost';
        public static $RESULT_ARRAY = 1;
        public static $NUM_ROW = 2;

        public function __construct()
        {
            date_default_timezone_set
            ("Asia/Tehran");
        }

        public static function connection()
        {
            $connection = mysqli_connect(dataBase::$dbAddress,
                dataBase::$dbUserName,
                dataBase::$dbPassword,
                dataBase::$dbName
            );
            mysqli_set_charset($connection, "utf8");
            return $connection;
        }

        public static function  RealString($param)
        {
            $RealParams = array();

            foreach ($param as $name => $value) {
                $RealParams[$name] =
                    mysqli_real_escape_string
                    (dataBase::connection(), $value);
            }
            return $RealParams;
        }

        public static function issetParams($param, $array)
        {
            $isset = true;
            foreach ($array as $value) {
                if (isset($param[$value])) {

                } else {
                    $isset = false;
                }
            }

            return $isset;
        }
        public static function emptyParams($param, $array)
        {
            $empty = true;
            foreach ($array as $value) {
                if ($param[$value]!='') {

                } else {
                    $empty = false;
                }
            }
            return $empty;
        }
        public static function GetDate()
        {
            $date = date("Y/m/d");
            return $date;
        }

        public static function GetTime()
        {
            $date = date("H:i:s");
            return $date;
        }
        public static function GenerateId()
        {

            //ini_alter('date.timezone', 'Asia/Tehran');
            $now = new DateTime();
            $now = $now->format('YmdHis');
            $microTime = microtime();
            $id = preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', $microTime);
            $id = substr($id, 11, 1);
            $random = (rand(10000, 99999));
            $va_id = $now . $id . $random;
            return $va_id;

        }
        public static function Query($StringQuery,$result=null){

            $query =
                mysqli_query
                (dataBase::connection(),
                    "$StringQuery"
                );

            if($result==dataBase::$NUM_ROW){
                return mysqli_num_rows($query);
            }
            if($result==dataBase::$RESULT_ARRAY){
                return mysqli_fetch_assoc($query);
            }
            return $query;

        }
        public static function HashPassword($password){
            $hashedPassword = strtolower($password);
            $hashedPassword = hash("SHA512",$hashedPassword);
            $hashedPassword = hash("SHA512",$hashedPassword);
            $hashedPassword = hash("SHA256",$hashedPassword);
            $hashedPassword = hash("SHA512",$hashedPassword);
            return $hashedPassword;
        }
        public static function J2G($date){
            $year = substr($date,0,4);
            $month = substr($date,5,2);
            $day = substr($date,8,2);
            include_once ('../function/jdf.php');
            $persianDate = gregorian_to_jalali($year,$month,$day,'/');
            return $persianDate;
        }
       public static function G2J($date){

            $year = substr($date,0,4);
            $month = substr($date,5,2);
            $day = substr($date,8,2);
            include_once ('jdf.php');
            $gregorianDate = gregorian_to_jalali($year,$month,$day,'/');
            return $gregorianDate;

        }

        public static function convertNumber($var){
            $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
            $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];

            $num = range(0, 9);
            $convertedPersianNums = str_replace($persian, $num, $var);
            $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

            return $englishNumbersOnly;
        }
        public static function sendSms($code,$number){

            $client = new
            SoapClient("http://37.130.202.188/class/sms/wsdlservice/server.php?wsdl");
            $user = "amlak300";
            $pass = "amir5621";
            $fromNum = "+985000958";
            $toNum = array($number);
            $pattern_code = "128";
            $input_data = array(
                "name" => " پیراتیل ",
                "verification-code" => $code,
            );
            $client->sendPatternSms($fromNum,$toNum,$user,$pass,$pattern_code,$input_data);
        }

        public Static function randomString($length=20){
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        public static function saveImageBase64($base64img,$url,$name){
                $base64img = str_replace('data:image/jpeg;base64,', '', $base64img);
                $data = base64_decode($base64img);
                $file = $url .$name.'.jpg';
                file_put_contents($file, $data);
        }

        public static function generateRandomString($length = 20){ //FUNCTION FOR generate RAND VAR
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
    public static function toMoney($val,$symbol=' ',$r=0)
        {
            $n = $val;
            $c = is_float($n) ? 1 : number_format($n,$r);
            $d = '.';
            $t = ',';
            $sign = ($n < 0) ? '' : '';
            $i = $n=number_format(abs($n),$r);
            $j = (($j = strlen($i)) > 3) ? $j % 3 : 0;
            return  $symbol.$sign .($j ? substr($i,0, $j) + $t : '').preg_replace('/(\d{3})(?=\d)/',"$1" + $t,substr($i,$j));

        }

}
