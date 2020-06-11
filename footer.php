<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 backg" style="text-align: center;padding-bottom:57px">
    <br><br>
    <div class="container">
        <h1 class="text-center IRANSans" style="color:white;font-size:42px;margin-top: 30px">همراه با هم خرید کنیم</h1>
        <br>
        <p class="text-center IRANSans" style="font-size:21px;color:white">لورم ایپسوم تولید متن ساختگی در صنعت چاپ در صنعت چاپدر صنعت چاپ</p>
        <br><br>
        <div class=" col-sm-12 col-xs-12 col-lg-9 col-md-9" style="float:none;margin: auto;background-color:#f89db5;text-align: center"></div>
        <br><br>
        <div class="col-md-9 col-lg-9 col-xs-12 col-sm-12 IRANSans" style="float: none;margin: auto">
            <?php
            $query10 = $db::Query("SELECT * FROM footermenu order by footerMenuSort ");
            while ($fetch = mysqli_fetch_assoc($query10)) {


                ?>
                <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3 " style="float: right;">
                    <p class="textfooter"><a><?php echo $fetch['footerMenuName']?></a>
                        <br>

                </div>
                <?php
            }
            ?>

        </div>
    </div>
    <br><br><br>
    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-6 socialicon IRANSans" style="margin: auto;float: none;text-align: center;direction:rtl">
        <a><i class="fab fa-google-plus-g" ></i></a>

        <a><i class="fab fa-linkedin-in" style="margin-right: 26px"></i></a>
        <a><i class="fab fa-twitter" style="margin-right: 26px"></i></a>
        <a><i class="fab fa-facebook-f" style="margin-right: 26px"></i></a>
        <br> <br>
        <p style="color: white;text-align: center">fonixmall.com</p>
        <p style="color: white;text-align: center">2019<i class="far fa-copyright" style="margin-right:3px;"></i></p>
    </div>
</div>
