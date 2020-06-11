<?php
include "head.php";
?>
    <!------------js links----------------->
    <style>
        input[type=tel], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            /*margin: 8px 0;*/
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;

        }
        input[type=email], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            /*margin: 8px 0;*/
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;

        }
        #pru{
            overflow: hidden;
            border-radius: 29px;
            width: 30%;
            text-align: center;
            margin-right: auto;
            margin-left: auto;
            display: block;
        }
        #prd{
            overflow: hidden;
            border-radius: 29px;
            width: 30%;
            text-align: center;
            margin-right: auto;
            margin-left: auto;
            display: block;
        }
        #phoneNumber{
                  border-radius: 21px;
                 text-align: right;
                    margin: 2px;
        }
        #userName{
             border-radius: 21px;
                 text-align: right;
                    margin: 2px;
        }
        #userEmail{
             border-radius: 21px;
                 text-align: right;
                    margin: 2px;
        }
        #userPassword{
             border-radius: 21px;
                 text-align: right;
                    margin: 2px;
        }
        #confirm_password{
             border-radius: 21px;
                 text-align: right;
                    margin: 2px;
        }
    </style>
</head>
<body>
<?php
include "header.php";
?><!------------------------------------------sabte nam--------------------------------------------------->
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="padding-top:8%;padding-bottom: 9%">

    <div class="col-md-10 col-xs-10 col-sm-10 col-lg-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-offset-1 text-center"  style="background-color: #f1f1f1;padding-top:7%;padding-bottom: 4%">
        <img src="IMG/Group%207.png">
        <br><br><br><br><br>
        <h1 class="h1dastebandi SansBold">ثبت نام حساب کاربری</h1>
        <br>
        <div class=" col-sm-1 col-xs-1 col-lg-1 col-md-1" style="float:none;margin: auto;background-color:#dc1a52"></div>
        <br><br><br>
        <div class="alert alert-danger" id="pru" style="display: none;direction: rtl">
            tamam fild ha por she
        </div>
        <div class="alert alert-success" id="prd" style="display: none;direction: rtl">
            ثبت با موفقیت انجام شد.
        </div>

        <div class="col-md-4 col-xs-12 col-lg-4 col-sm-6  col-sm-offset-3 col-lg-offset-4 col-md-offset-4">
                <input type="text" placeholder="نام کاربری" name="uname" id="userName" required class="IRANSans">
                <input type="tel" placeholder="شماره موبایل" name="uname" id="phoneNumber" required class="IRANSans">
                <input type="email" placeholder="ایمیل" name="uname" id="userEmail" required class="IRANSans">
                <input type="password" placeholder="رمز عبور"  name="psw" id="userPassword" required class="IRANSans">
                <input type="password" placeholder="تکرار رمز عبور"  name="psw" id="confirm_password" required class="IRANSans">
            <p id='message'></p>

            <br>    <br>
                <button type="submit" onclick="submit()" class="btnlogin1 IRANSans">ثبت نام</button>
                <br>    <br>
               <a href="login.php"><button type="button" class="btnlogin2 IRANSans">انصراف</button></a>


            <br><br><br>
        </div>
    </div>
</div>
<script>



    function submit() {
        var userName = $("#userName").val();
        var phoneNumber = $("#phoneNumber").val();
        var userEmail = $("#userEmail").val();
        var userPassword = $("#userPassword").val();

        if (document.getElementById('userPassword').value ==
            document.getElementById('confirm_password').value) {
        } else {

            document.getElementById('message').style.color = 'red';
            document.getElementById('message').style.backgroundColor = '#ddd8d8';
            document.getElementById('message').style.fontSize = '19px';
            document.getElementById('message').style.borderRadius = '25px';
            document.getElementById('message').style.padding = '10px';
            document.getElementById('message').innerHTML = 'پسورد ها یکسان نیستند';
            return;

        }


        $.ajax({
            url:"request/adduser.php",
            data:{
                userName:userName,
                phoneNumber:phoneNumber,
                userEmail:userEmail,
                userPassword:userPassword,
            },
            dataType:'json',
            type:'POST',
            success:function (data) {
                if (data["error"]){
                    $("#pru").show("fast").html(data['MSG']);


                }else  {
                    // $("#prd").show("fast");
                    window.location.href="index.php"
                }
            }
        });

    }
</script>

<!---------------------------------------footer------------------------------------------------>
<?php
include "footer.php";
?><!-------------------------------------end footer------------------------------------------------------>
</body>
</html>