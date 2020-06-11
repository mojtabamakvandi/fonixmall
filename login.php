<?php
include "head.php";
?>
    <title>صفحه ورود به پنل کاربری</title>
    <style>
        #userName{
                border-radius: 20px;
    text-align: right;
    margin: 3px;
        }
        #password{
                border-radius: 20px;
    text-align: right;
    margin: 3px;
        }
    </style>
</head>
<body>
<?php
include "header.php";
?>
<!------------------------------------------log in--------------------------------------------------->
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="padding-top:8%;padding-bottom: 9%">

    <div class="col-md-10 col-xs-10 col-sm-10 col-lg-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-offset-1 text-center"  style="background-color: #f1f1f1;padding:7%">
        <img src="IMG/Group%207.png">
        <br><br><br><br><br>
        <h1 class="h1dastebandi SansBold">ورود به حساب کاربری</h1>
        <br>
        <div class=" col-sm-1 col-xs-1 col-lg-1 col-md-1" style="float:none;margin: auto;background-color:#dc1a52"></div>
        <br><br><br>
        <div class="alert alert-danger" id="errorLogin" style="display: none;">
            اطلاعات وارد شده اشتباه است
        </div>
        <div class="col-md-4 col-xs-12 col-lg-4 col-sm-6 col-xs-offset-0 col-sm-offset-3 col-lg-offset-4 col-md-offset-4">
                <input type="text" placeholder="ایمیل یا شماره موبایل" name="uname" id="userName"required class=" IRANSans">
                <input type="password" placeholder="رمز عبور" name="psw" id="password" required class=" IRANSans">
            <br>    <br>
                <button type="submit" onclick="login()" class="btnlogin1 IRANSans">ورود به حساب کاربری</button>
            <br>    <br>
                <button type="submit" class="btnlogin2 IRANSans">انصراف</button>

            <br><br><br>
    </div>
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 SansBold" style="color: #2d3e50;"><h1 style="direction: rtl;font-size:25px">اگر کاربر جدید هستید <a style="color: #dc1a52" href="sabtenam.php">برای ساخت حساب کاربری کلیک کنید</a></h1></div>
        </div>
</div>
<script>
    function login() {
        var userName = $("#userName").val();
        var password = $("#password").val();


        $.ajax({
            url:"request/login.php",
            data:{
                userName:userName,
                password:password
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                if(data['error']){
                    $("#errorLogin").show("fast");
                }else{
                    window.location.href="index.php";
                }
            }
        });
    }

</script>

<!---------------------------------------footer------------------------------------------------>
<?php
include "footer.php";
?>
<!-------------------------------------end footer------------------------------------------------------>
</body>
</html>