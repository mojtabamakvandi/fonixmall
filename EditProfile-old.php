<?php

include "head.php";
?>
    <link href="CSS/Active5.css" rel="stylesheet">
    </head>
    <body>

<?php
include "header.php";
if (!isset($_SESSION['userId']) || $_SESSION['userId'] == '') {
    ?>
    <script>
        window.location.href = "login.php";
    </script>
    <?php
}
?>
    <!--heading-->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="line92"></div>
    <!--heading-->

    <div class="gradi col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
    <div class="parent-name">
        <h4 id="name">
            <?php echo $row['userName'] ?>
        </h4>
        <div class="border-botton"></div>
        <h4 id="number"><?php echo $row['userPhonenumber'] ?></h4>




    </div>
    <div class="img-icon">
        <a class="center-div-icon" href="favoraite.php">
            <div><img class="tak-img" src="IMG/Shape4.png"/>
                <br>
                <h5 class="tak-h5">علاقه مندی</h5>
            </div>
        </a>
        <a class="center-div-icon" href="transaction.php">
            <div><img class="tak-img" src="IMG/bars.png"/>
                <br>
                <h5 class="tak-h5">تراکنش ها</h5>
            </div>
        </a>
        <a class="center-div-icon" href="EditProfile.php">
            <div><img class="tak-img" src="IMG/resume.png"/>
                <br>
                <h5 class="tak-h5">ویرایش پروفایل</h5>
            </div>
        </a>
        <a class="center-div-icon" href="LastShopping.php">
            <div><img class="tak-img" src="IMG/checklist.png"/>
                <br>
                <h5 class="tak-h5">تاریخچه خرید</h5>
            </div>
        </a>
        <a class="center-div-icon" href="sabad-kharid.php">
            <div><img class="tak-img" src="IMG/clothing-store.png"/>
                <br>
                <h5 class="tak-h5">سبد خرید</h5>
            </div>
        </a>
    </div>
    <div class="sabt">
        <a href="">خروج</a>
        <img id="img-davin-icon" src="IMG/2ddavin.png" alt="">
        <h3 id="name3">ویرایش به حساب کاربری</h3>
        <div class="border-botton1"></div>
        <br>
        <div class="alert alert-danger" id="danger" style="display: none">
            ویرایش با موفقیت انجام نشد
        </div>
        <div class="alert alert-success" id="success" style="display: none">
            ویرایش با موفقیت انجام شد
        </div>
        <div class="parent-input">
            <input class="input-number" type="text" id="mobile" value="<?php echo $row['userPhonenumber'] ?>"
                   placeholder="شماره موبایل">
            <input class="input-number" type="text" id="email" value="<?php echo $row['userEmail'] ?>"
                   placeholder="ایمیل">
            <input class="input-number" id="password" type="password" placeholder="رمز عبور">
            <input class="input-number" id="password1" type="password" placeholder="تکرار رمز عبور">
        </div>

        <div class="tow-botton">
            <button class="button" onclick="edit()" type="button">ویرایش حساب کاربری</button>
        </div>
        <div class="tow-botton1">
            <button class="button2" type="button">انصراف</button>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <script>
            function edit() {
                var email = $("#email").val();
                var password = $("#password").val();
                var password1 = $("#password1").val();
                var mobile = $("#mobile").val();

                $.ajax({
                    url: "request/editProfile.php",
                    data: {
                        email: email,
                        mobile: mobile,
                        password: password,
                        password1:password1
                    },
                    dataType: 'json',
                    type: 'POST',
                    success: function (data) {
                        if(data['error']){
                            $("#danger").show().html(data['MSG']);
                        }else{
                            $("#success").show().html(data['MSG']);
                        }

                    }
                });
            }
        </script>
    </div>
<?php
include "footer.php"
?>