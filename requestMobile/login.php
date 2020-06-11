<?php
include "../admin/class/dataBase.php";
$db = new dataBase();
if($_SERVER['REQUEST_METHOD']=="POST"){

    if(
        isset($_POST['userName']) &&
        $_POST['userName']!='' &&
        isset($_POST['password']) &&
        $_POST['password']!=''
    ){
        $result = $db::RealString($_POST);
        $userName = $result['userName'];
        $password = $db::HashPassword($result['password']);
        if($db::Query("SELECT * FROM user where 
      userName='$userName'
                      AND userPassword='$password'",$db::$NUM_ROW)==1){
            session_start();
            $_SESSION['loginUser']=true;
            $Q = $db::Query("SELECT * FROM user where 
         userName='$userName'
                      AND userPassword='$password'",$db::$RESULT_ARRAY);
            $_SESSION['userId'] = $Q['userId'];
            $_SESSION['userName'] = $Q['userName'];

            if(isset($_SESSION['GustId']) && $_SESSION['GustId']!=''){
                $GId = $_SESSION['GustId'];
                $userId =  $Q['userId'];

                    $selectOpenSHB = $db::Query("SELECT * FROM shoppingbasket where SHBUserId='$userId' AND SHBPay='0'");
                    if(mysqli_num_rows($selectOpenSHB)==1){
                        $row = mysqli_fetch_assoc($selectOpenSHB);
                        $shbId = $row['SHBid'];
                        $selectOpenSHBG = $db::Query("SELECT * FROM shoppingbasket where SHBGuest='$GId' AND SHBPay='0'");
                        $rowGuest = mysqli_fetch_assoc($selectOpenSHBG);
                        $shbIdG = $rowGuest['SHBid'];
                        $delete = $db::Query("DELETE FROM shoppingbasket where SHBGuest='$GId'");
                        $update = $db::Query("UPDATE productshb set PSHBSHBId='$shbId' where PSHBSHBId='$shbIdG'");
                    }else{
                        $update = $db::Query("
                  UPDATE shoppingbasket set
                          SHBUserId='$userId',SHBGuest='' WHERE SHBGuest='$GId'");
                    }
            }
            $call = array("error"=>false);
        }else{
            $call = array("error"=>true);
        }
        echo json_encode($call);
        return;
    }

}