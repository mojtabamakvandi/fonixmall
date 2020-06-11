<?php include "head.php"; ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
<body>
    <div class='customAlert' style="display: none;margin-left: 10px;position: absolute;top: 200px;">
        <p class='message'>
            محصول با موفقیت به سبد خرید  افزوده شد<i class="fas fa-check-circle" style="margin-left: 10px;position: relative;top: 2px;"></i>
        </p>
    </div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="nomarginAndpadding">
    <?php include "header.php"; ?>
    <!---------------------slider----------------------------->
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="padding: 0">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators" style="justify-content: left">
                <?php $query = $db::Query("SELECT * FROM slider order by pariority");
                        for($i=0;$i<mysqli_num_rows($query);$i++){
                            if($i==0){ ?>
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <?php }else{ ?>
                                <li data-target="#myCarousel" data-slide-to="<?php echo $i ?>" style="width: 11px;height: 11px"></li>
                            <?php }
                            } ?>
            </ol>
            <div class="carousel-inner">
                <?php
                $i="active";
                while ($fetch = mysqli_fetch_assoc($query)){


                    ?>


                    <div class="item <?php echo$i?>">
                        <a href="<?php echo $fetch['sliderLink']?>">
                            <img style="width: 100%;height: 83vh" src="admin/upload/slider/<?php echo $fetch['sliderImg']?>.jpg">
                        </a>
                    </div>


                <?php

                    $i++;
                }
                ?>

            </div>
        </div>
    </div>
    <!-------------------------------------------دسته بندی محصولات------------------------->
    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align: center;padding-top: 35px">

        <div class="container">
            <!--all parts Shop-->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h3 class="h1dastebandi SansBold">دسته بندی محصولات</h3>
                <br>
            </div>
            <div class="allShoping">
                <?php
                $query2 = $db::Query("SELECT * FROM category");
                while ($fetch = mysqli_fetch_assoc($query2)){
                    ?>
                    <!--part1-->
                    <div style="width: 100%;cursor: pointer;" class="cateGory">
                        <a href="search.php?catId=<?php echo $fetch['catId']?>">
                        <img src="admin/upload/cat/<?php echo $fetch['catImg']?>.jpg" alt="imgMahsoolat" style=" width: 150px;height: 150px;border: 1px solid white;border-radius: 100%;box-shadow: 5px 5px 15px grey;">

                            <p style="color: #5b646f;font-size: 19px;margin-top: 3%;" ><?php echo $fetch['catName']?></p>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <style>
        .allShoping{
            direction:rtl;

            width: 100%;display: grid;grid-template-columns: repeat(6,14%);grid-gap: 1rem;cursor: pointer;    align-items: center;    font-family: IRANSANSFANNUMUlFaNum !important;
            justify-content: center;
            text-align: center;}
        @media  (max-width: 996px){
            .allShoping{
                direction: rtl;
                display: grid;grid-template-columns: repeat(2,45%);
            }
        }
    </style>
    <!----------------------------------------------------محصولات ویژه----------------------->

    <div class="col-md-12 hidden-xs hidden-sm col-lg-12 mycarousel" style="padding: 30px 45px 30px 45px;position: relative;">
        <br> <br>
        <div class="container">
            <h3 class="SansBold" style="color:#2d3e50;font-size: 41px;text-align: center">محصولات ویژه</h3>
            <br>
            <div class=" col-sm-1 col-xs-1 col-lg-1 col-md-1" style="float:none;margin: auto;background-color:#dc1a52;"></div>
            <br><br><br>
            <section class="center2 slider">
                <?php
                $query3 = $db::Query("SELECT * FROM specialoffer,product WHERE specialOfferProductId=productId and product.active = true");
                while ($fetch = mysqli_fetch_assoc($query3)) {
                    $price = $fetch['productPrice'];
                    $percentageOffer = $fetch['specialOfferPercentage'];
                    $off = $price / 100 * $percentageOffer;

                    $img = $fetch['productId'];
                    $qu = $db::Query("SELECT * FROM gallery WHERE galleryPrId='$img' AND galleryStatus='1'");
                    $r = mysqli_fetch_assoc($qu);
                    ?>

                    <div class="col-md-3 col-lg-3 col-xs-12 col-sm-6" style="border: 1px solid #e8e8e8;padding: 20px 0;">
                        <a href="product.php?productId=<?php echo $fetch['productId'] ?>" class="image-holder__link">
                            <img src="admin/upload/gallery/<?php echo $r['galleryImg'] ?>.jpg" style="width: 100%">
                        </a>
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                            <h4 class="esmekalatakhfif IRANSans"><?php echo $fetch['productName'] ?></h4>
                            <?php
                            if($fetch['specialOfferPercentage']!="0"){
                                ?>
                                <h3 class="offstyle SansBlack"><?php echo $fetch['specialOfferPercentage'] ?>% تخفیف</h3>
                                <?php
                            }
                            ?>
                                <h4 class="starstyle"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h4>
                            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">

                            <h4 class=" gheymatjadid IRANSans" style=""><?php echo @$db::toMoney($price - $off) ?> ریال  </h4>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">


                            <h4 class="card-text gheymatghadimIn IRANSans" style="margin-top: -9px;display: block">
                                <span class="gheymatghadim">
                                    <?php
                                    if ($off == 0){
                                        ?>
                                    <span class="gheymatghadim">
                                        <?php
                                        echo "";
                                        ?>
                                    </span>
                                    <?php

                                    }else{
                                        echo "<span class='gheymatghadim'>".@$db::toMoney($price)."</span>";
                                    }
                                    ?>
                                </span>
                            </h4>
                            </div>
                            <div class="text-center"><a onclick="shbADD(<?php echo $fetch['productId']?>)" class="btn btn-primary IRANSans"
                                                        style="padding: 6px 28px;font-size: 13px;color: white;background-color: #dc1a52;border:1px solid #454e60;">اضافه
                                    کردن به سبد خرید</a></div>
                        </div>
                    </div>
                    <?php
                }
                echo $_SESSION['SHBid'];
                ?>


            </section>

            <script>
                function shbADD(id) {
                    $.ajax({
                        url: 'request/shoppingCard.php',
                        data: {
                            PrId:id,
                            count:'addBTN'
                        },
                        dataType: 'json',
                        type: 'POST',
                        success: function (data) {
                            $('.customAlert').fadeIn("slow");
                            var x = $("#numberCount").html();
                            x++;
                            $("#numberCount").html(x);

                            setTimeout(
                                function()
                                {
                                    //do something special
                                    $('.customAlert').fadeOut("slow");


                                }, 2000);

                            // location.reload()
                        }
                    });
                }
            </script>
        </div>
        <a class="left carousel-control" onclick="center2Prev()">
            <span class="mycursor glyphicon glyphicon-chevron-right fa fa-angle-left "></span>
            <button class="slick-prev slick-arrow " aria-label="Previous" type="button" style="display: block;">Previous</button>
        </a>
        <a class="  right carousel-control" onclick="center2Next()">
            <span class="glyphicon glyphicon-chevron-right fa fa-angle-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <script>
        function center2Prev() {
            $(".center2").slick('slickPrev');

        }    function center2Next() {
            $(".center2").slick('slickNext');

        }
    </script>

    <script src="JS/slider.js" type="text/javascript"></script>

    <!--    <script src="js/jquery.js"></script>-->
    <script src="slider/js/popper.js"></script>
    <script src="slider/js/bootstrap.js"></script>
    <script src="slider/js/migrate.js"></script>
    <script src="slider/js/slick.js"></script>
    <script type="text/javascript">
        $(document).on('ready', function() {

            $(".center2").slick({

                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 4
            });


        });
    </script>
    <!---------------------------------sm xs ------------------------------------>
    <div class="hidden-md hidden-lg col-sm-12 col-xs-12" style="padding-top: 80px">
        <div class="container">
            <h3 class="SansBold" style="color:#2d3e50;font-size:35px;text-align: center">محصولات ویژه</h3>
            <br>
            <div class=" col-sm-1 col-xs-1 col-lg-1 col-md-1" style="float:none;margin: auto;background-color:#dc1a52;"></div>
            <br><br>

            <section class="center6 slider">
                <?php
                $query3 = $db::Query("SELECT * FROM specialoffer,product WHERE specialOfferProductId=productId and product.active = true");
                while ($fetch = mysqli_fetch_assoc($query3)) {
                $price = $fetch['productPrice'];
                $percentageOffer = $fetch['specialOfferPercentage'];
                $off = $price / 100 * $percentageOffer;

                $img = $fetch['productId'];
                $qu = $db::Query("SELECT * FROM gallery WHERE galleryPrId='$img' AND galleryStatus='1'");
                $r = mysqli_fetch_assoc($qu);
                ?>

                <div class="onePart1Slider">
                    <a href="product.php?productId=<?php echo $fetch['productId'] ?>">

                        <div class="imgSliderTop">
                            <img src="admin/upload/gallery/<?php echo $r['galleryImg'] ?>.jpg" >
                        </div>
                        <div class="textAppleAndOffer">
                            <h4><?php echo $fetch['productName'] ?></h4>
                            <?php
                            if($fetch['specialOfferPercentage']!="0"){
                                ?>
                                <h4 class="offstyle SansBlack"><?php echo $fetch['specialOfferPercentage'] ?>% تخفیف</h4>

                            <?php
                            }
                            ?>
                        </div>
                        <div class="starOff">
                            <h4 class="starstyle">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            </h4>
                        </div>
                        <div class="pricetext">
                            <h4 class="card-text gheymatghadim IRANSans"> ریال <?php echo @$db::toMoney($price - $off) ?> </h4>
                            <h4 class="card-text gheymatghadimIn IRANSans" style="margin-top: -9px;display: block">
                                <?php
                                if ($off == 0){
                                   ?>
                                    <span class="gheymatghadim">
                                        <?php
                                        echo "";
                                        ?>
                                    </span>


                                <?php
                                }else{
                                    echo "<span class='gheymatghadim'>".@$db::toMoney($price)."</span>";

                                }
                                ?>

                            </h4>
                        </div>
                    </a>
                    <div class="buttonPrice">
                            <button onclick="shbADD('<?php echo $fetch['productId']?>')">اضافه کردن به سبد خرید</button>
                        </div>
                </div>

                    <?php
                }
                ?>

            </section>

        </div>
        <a class=" left carousel-control" onclick="center4Prev()">
            <span class="glyphicon glyphicon-chevron-right fa fa-angle-left"></span>
            <button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="display: block;">Previous</button>
        </a>
        <a class=" right carousel-control" onclick="center4Next()">
            <span class="glyphicon glyphicon-chevron-right fa fa-angle-right"></span>
            <span class="sr-only">Next</span>
        </a>


    </div>
    <script>
        function center4Prev() {
            $(".center4").slick('slickPrev');

        }    function center4Next() {
            $(".center4").slick('slickNext');

        }
    </script>
    <script src="JS/slider.js" type="text/javascript"></script>
    <!--    <script src="js/jquery.js"></script>-->
    <script src="slider/js/popper.js"></script>
    <script src="slider/js/bootstrap.js"></script>
    <script src="slider/js/migrate.js"></script>
    <script src="slider/js/slick.js"></script>
    <script type="text/javascript">
        function sliderXsAndSm(){
            var respansive600= window.matchMedia("(max-width:600px)")
            if (respansive600 === true){
                $(".center4").slick({

                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1
                });
            }else {

                $(".center4").slick({

                    infinite: true,
                    slidesToShow: 2,
                    slidesToScroll: 2
                });
            }

        }
        $(document).on('ready', function() {
            sliderXsAndSm();
        });
        $(window).on('resize',function () {
            sliderXsAndSm();
        })
    </script>
    <!------------------------------------------------------------>
    <script>
        function center5Prev() {
            $(".center5").slick('slickPrev');

        }    function center5Next() {
            $(".center5").slick('slickNext');

        }
    </script>
    <script src="JS/slider.js" type="text/javascript"></script>
    <!--    <script src="js/jquery.js"></script>-->
    <script src="slider/js/popper.js"></script>
    <script src="slider/js/bootstrap.js"></script>
    <script src="slider/js/migrate.js"></script>
    <script src="slider/js/slick.js"></script>
    <script type="text/javascript">
        $(document).on('ready', function() {

            $(".center5").slick({

                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 2
            });


        });
    </script>

    <!-------------------------چگونه با هم همراه شویم ؟؟؟------------------------------------->

    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align: center;padding-top: 40px;padding-bottom: 60px">
        <br>
        <div class="container">
            <h3 class="SansBold" style="color:#2d3e50;font-size:28px;text-align: center">چگونه با هم همراه شویم ؟</h3>
            <br>
            <div class=" col-sm-1 col-xs-1col-lg-1 col-md-1" style="float:none;margin: auto;background-color:#dc1a52;"></div>
            <br><br><br>

            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12" style="padding-top: 20px;height: 467px">
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 " style="background-color: white;padding:56px 30px;box-shadow: 2px 2px 7px #cacaca;text-align: center">
                    <img src="IMG/iconpc1.png">
                    <br><br><br><br>
                    <h2  class="IRANSans" style="color: #5b5d6c;text-align: center;font-size: 18px;font-weight: bold">سفارش از هرجا</h2>
                    <br>
                    <p class="IRANSans" style="font-size:17px;color: #6f8095;text-align: center">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</p>
                </div>
            </div>
            <!-------------->

            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12" style="padding-top: 20px;height: 467px;position: relative;overflow: visible">
                <img src="IMG/Group%2013%20Copy@2x.png" style="position: absolute;z-index: 2000;right:-57px;top:166px;" class="hidden-xs hidden-sm">

                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="background-color: white;padding:56px 30px;box-shadow: 2px 2px 7px #cacaca;text-align: center">
                    <img src="IMG/icontab1.png">
                    <br><br><br><br>
                    <h2   class="IRANSans" style="color: #5b5d6c;text-align: center;font-size: 18px;font-weight: bold">سفارش آنی</h2>

                    <br>
                    <p class="IRANSans" style="font-size: 17px;color: #6f8095;text-align: center">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</p>
                </div>

                <img src="IMG/Group%2013%20Copy@2x.png" style="position: absolute;z-index: 2000;left:-57px;;top:166px;" class="hidden-xs hidden-sm">

            </div>
            <!---------------->
            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12" style="padding-top: 20px;height:467px;">
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="background-color: white;padding:56px 30px;box-shadow: 2px 2px 7px #cacaca;text-align: center">
                    <img src="IMG/iconhome1.png">
                    <br><br><br><br>
                    <h2  class="IRANSans h2hamrah" style="color: #5b5d6c;text-align: center;font-size:18px;font-weight: bold">تحویل درب منزل</h2>
                    <br>
                    <p class="IRANSans phamrah" style="font-size:17px;color: #6f8095;text-align: center">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</p>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>

    <!--------------------------------------حراج فونیکس----------------------------->
    <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12 backg" style="padding-bottom:80px">
        <br><br>
        <div class="container">
            <h1 class="SansBold" style="color:white;font-size:37px;text-align: center">حراج فونیکس</h1>
            <br>
            <div class=" col-sm-1 col-xs-1 col-lg-1 col-md-1" style="float:none;margin: auto;background-color: #ffffff"></div>
            <br><br>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 SansBold" style="color:black;padding:0">
                <div class="circle" id="circle">
                    <?php
                    $fes1 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 3");
                    $fetch = mysqli_fetch_assoc($fes1);
                    ?>
                    <a href="festival.php?festivalId=<?php echo $fetch['festivalId']?>">
                        <div>
                            <img src="IMG/Fill%201312@2x.png" class="msls1">
                            <span class=""><?php echo $fetch['festivalOfferPercentage']?>%</span>
                        </div>
                    </a>
                </div>
                <!---------------------------->
                <div class="circle"  style="margin-left: 27%;margin-top: -18%;" id="circle2">
                    <?php
                    $fes2 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 4");
                    $fetch = mysqli_fetch_assoc($fes2)
                    ?>
                    <a href="festival.php?festivalId=<?php echo $fetch['festivalId']?>">
                        <div>
                            <img src="IMG/Fill%2013@2x.png" class="msls1">
                            <span class=""><?php echo $fetch['festivalOfferPercentage']?>%</span>
                        </div>
                    </a>
                </div>
                <!---------------------------->
                <div class="circle" style="margin-left: 49%;margin-top: -25%;"  id="circle3">
                    <?php
                    $fes3 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 5");
                    $fetch = mysqli_fetch_assoc($fes3)
                    ?>
                    <a href="festival.php?festivalId=<?php echo $fetch['festivalId']?>">
                        <div>
                            <img src="IMG/Fill%201344@2x.png" class="msls1">
                            <span class=""><?php echo $fetch['festivalOfferPercentage']?>%</span>
                        </div>
                    </a>
                </div>
                <!------------------------>
                <div class="circle" style= "float: right ;margin-top:-9%;margin-right: 5%;" id="circle4">
                    <?php
                    $fes4 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 6");
                    $fetch = mysqli_fetch_assoc($fes4)
                    ?>
                    <a href="festival.php?festivalId=<?php echo $fetch['festivalId']?>">
                        <div>
                            <img src="IMG/Fill%201312@2x.png" class="msls1">
                            <span class=""><?php echo $fetch['festivalOfferPercentage']?>%</span>
                        </div>
                    </a>
                </div>
                <!------------------------>
                <div class="circle" style="margin-left: -8px;margin-top: -11%;" id="circle5">
                    <?php
                    $fes5 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 7");
                    $fetch = mysqli_fetch_assoc($fes5)
                    ?>
                    <a href="festival.php?festivalId=<?php echo $fetch['festivalId']?>">
                        <div>
                            <img src="IMG/Fill%201312@2x.png" class="msls1">
                            <span class=""><?php echo $fetch['festivalOfferPercentage']?>%</span>
                        </div>
                    </a>
                </div>
                <!------------------------>

                <div class="circle" style="margin-left: 18%;margin-top: -9%;" id="circle6">
                    <?php
                    $fes6 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 8");
                    $fetch = mysqli_fetch_assoc($fes6)
                    ?>
                    <a href="festival.php?festivalId=<?php echo $fetch['festivalId']?>">
                        <div>
                            <img src="IMG/Fill%201331@2x.png" class="msls1">
                            <span class=""><?php echo $fetch['festivalOfferPercentage']?>%</span>
                        </div>
                    </a>
                </div>
                <!------------------->
                <div class="circle" style="margin-left: 51%; margin-top: -21%;" id="circle7">
                    <?php
                    $fes7 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 9");
                    $fetch = mysqli_fetch_assoc($fes7)
                    ?>
                    <a href="festival.php?festivalId=<?php echo $fetch['festivalId']?>">
                        <div>
                            <img src="IMG/Fill%201312@2x.png" class="msls1">
                            <span class=""><?php echo $fetch['festivalOfferPercentage']?>%</span>
                        </div>
                    </a>
                </div>
                <!----------------------------->
                <div class="circle" style="margin-right: 6%;margin-top: -8%;float: right;"  id="circle8">
                    <?php
                    $fes8 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 10");
                    $fetch = mysqli_fetch_assoc($fes8)
                    ?>
                    <a href="festival.php?festivalId=<?php echo $fetch['festivalId']?>">
                        <div>
                            <img src="IMG/Fill%201312@2x.png" class="msls1">
                            <span class=""><?php echo $fetch['festivalOfferPercentage']?>%</span>
                        </div>
                    </a>
                </div>
                <!--------------------------------->
                <div class="circle" style="margin-right: 2%; margin-top: -4%;float: right;" id="circle9">
                    <?php
                    $fes8 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 11");
                    $fetch = mysqli_fetch_assoc($fes8)
                    ?>
                    <a href="festival.php?festivalId=<?php echo $fetch['festivalId']?>">
                        <div>
                            <img src="IMG/Fill%201312@2x.png" style="width: 65px" class="msls1">
                            <span style="font-size: 30px!important;"><?php echo $fetch['festivalOfferPercentage']?>%</span>
                        </div>
                    </a>
                </div>
                <!--------------------------->
                <div class="circle" style="margin-right: 82%;margin-top: -46%;float: right;"  id="circle10">
                    <?php
                    $fes8 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 12");
                    $fetch = mysqli_fetch_assoc($fes8)
                    ?>
                    <a href="festival.php?festivalId=<?php echo $fetch['festivalId']?>">

                        <div>
                            <img src="IMG/Fill%201312@2x.png" class="msls1">
                            <span class=""><?php echo $fetch['festivalOfferPercentage']?>%</span>
                        </div>
                    </a>
                </div>


            </div>
            <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12 harajphonix">
                <h1 class="IRANSans" style="text-align: right;font-size: 35px">حراج فونیکس</h1>
                <br>
                <p class="IRANSans harajtext">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. هنگ پیشرو در زبان فارسی ایجاد کرد.</p>
                <br>
                <p style="direction: rtl;font-size: 17px;text-align: right" class="IRANSans"><i class="far fa-check-circle" style="margin-left: 5px;font-size: 14px"></i>محصولات حراجی فونیکس را سریع دریافت می کنید . </p>
                <p style="direction: rtl;font-size:17px;text-align: right" class="IRANSans"><i class="far fa-check-circle" style="margin-left: 5px;font-size: 14px"></i>محصولات حراجی فونیکس تا 24 ساعت تضمین می شوند . </p>
                <br><br>
                <a href="allFestival.php"> <div class="btn btn-lg btn-default SansBold" style="    bottom: -12%;
       right: 1%;padding:13px 57px;color:#dc1a52;font-size: 20px;float: right">محصولات حراجی</div></a>
            </div>
        </div>
    </div>
    <!------------------------------------3 cards haraj------------------------------------------------->
    <!--<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="padding-top: 35px">
        <div class="container">
            <div class="allcontainerEditeMMd">
                <div class="divall30offer" >
            <?php
/*            $query4 = $db::Query("SELECT * FROM festival order by festivalId limit 3 offset 3" );
            while ($fetch = mysqli_fetch_assoc($query4)){
                */?>

                        <img src="admin/upload/img/<?php /*echo $fetch['festivalImg'] */?>.jpg" style="width: 100%;height:100%">
                        <div class="offtag2"><h1 class="IRANSans" style="font-size: 20px"><?php /*echo $fetch['festivalOfferPercentage'] */?>%</h1>
                            <h1 class="IRANSans" style="font-size: 20px;margin-top: 10px;">تخفیف</h1></div>
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 tozihat">
                            <h1 class="namekala1 IRANSans"><?php /*echo $fetch['festivalName'] */?></h1>

                            <p class="darbarekala1 SansBold" ><?php /*echo $fetch['title'] */?></p>
                        </div>
                        <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1 dokmebishtar2 btn btn-lg" style="padding: 1px 90px;"><a href="festival.php?festivalId=<?php /*echo $fetch['festivalId']*/?>" style="color: #dc1a52;text-decoration: none"><p
                                        class="SansBold" style="text-align: center;margin: 5px -20px;">بیشتر</p></a></div>

                <?php
/*            }
            */?>
                </div>
            </div>
        </div>
    </div>-->
    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding-top: 50px">
        <div class="container">
            <div class="col-md-5 col-lg-5 col-xs-12 col-sm-12 card1" style="text-align: center">
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding:0;overflow:hidden;background-color: white;border: 1px solid lightgrey;border-radius: 10px;text-align: center ;height: 45rem;box-shadow: 5px 5px 15px grey;">
                    <div class="stylepmyoff11">
                        <?php
                        $query8 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 0");
                        while ($fetch = mysqli_fetch_assoc($query8)){
                        $feId = $fetch["festivalId"];
                        $q = $db::Query("SELECT subCatId FROM festivalproduct left join product on product.productId = festivalproduct.fePrProductId left join subcategory on product.productSubCatId = subcategory.subId
                                        where fePrFestivalId = '$feId' limit 1");
                        $subCatId = mysqli_fetch_assoc($q);
                        ?>
                    </div>
                    <!--<span class="SansBold a2"><?php /*echo $fetch['festivalOfferPercentage']*/?>%</span>-->
                    <a href="search.php?catId=<?php echo $subCatId['subCatId']?>">
                        <img src="admin/upload/img/<?php echo $fetch['festivalImg']?>.jpg" style="width: 100%!important;height: 45rem!important;"></a>
                    <!--<div class="h1card1">
                        <h1 class="SansBold" style="font-size: 25px;"><?php /*echo $fetch['festivalName']*/?></h1>
                        <p class="IRANSans" style="font-size: 18px;margin-top: 22px"><?php /*echo $fetch['title']*/?></p>
                    </div>-->
                </div>
                <?php
                }
                ?>
            </div>
            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-6 card1" style="text-align: right;">
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding: 0;border-radius: 10px;overflow: hidden;box-shadow: 5px 5px 15px grey;">
                    <div class="stylepmyoff21">
                        <?php
                        $query8 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 1");
                        while ($fetch=mysqli_fetch_assoc($query8)){
                        $feId = $fetch["festivalId"];
                        $q = $db::Query("SELECT productSubCatId FROM festivalproduct left join product on product.productId = festivalproduct.fePrProductId left join subcategory on product.productSubCatId = subcategory.subId
                                        where fePrFestivalId = '$feId' limit 1");
                        $subCatId = mysqli_fetch_assoc($q);
                        ?>
                    </div> <!--<span class="SansBold a2"><?php /*echo $fetch['festivalOfferPercentage']*/?>%</span>-->
                    <a href="search.php?subId=<?php echo $subCatId['productSubCatId']?>">
                        <img src="admin/upload/img/<?php echo $fetch['festivalImg']?>.jpg" style="width: 100%!important;height: 45rem!important;"></a>
                    <!--<div class="h1card3">
                        <h1 class="SansBold" style="font-size: 25px;"><?php /*echo $fetch['festivalName']*/?></h1>
                        <p class="IRANSans" style="font-size: 18px;margin-top: 22px"><?php /*echo $fetch['title']*/?></p>
                    </div>-->
                </div>
            </div>
            <?php
            }
            ?>
            <div class="col-md-3 col-lg-3 col-xs-12 col-sm-6 card1" style="text-align: right;">
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding: 0;border-radius: 10px;overflow: hidden;box-shadow: 5px 5px 15px grey;">
                    <div class="stylepmyoff21">
                        <?php
                        $query8 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 2");
                        while ($fetch=mysqli_fetch_assoc($query8)){
                        $feId = $fetch["festivalId"];
                        $q = $db::Query("SELECT subCatId FROM festivalproduct left join product on product.productId = festivalproduct.fePrProductId left join subcategory on product.productSubCatId = subcategory.subId
                                        where fePrFestivalId = '$feId' limit 1");
                        $subCatId = mysqli_fetch_assoc($q);
                        ?>
                    </div> <!--<span class="SansBold a2"><?php /*echo $fetch['festivalOfferPercentage']*/?>%</span>-->
                    <a href="search.php?catId=<?php echo $subCatId['subCatId']?>">
                        <img src="admin/upload/img/<?php echo $fetch['festivalImg']?>.jpg" style="width: 100%!important;height: 45rem!important;"></a>
                    <!--<div class="h1card3">
                        <h1 class="SansBold" style="font-size: 25px;"><?php /*echo $fetch['festivalName']*/?></h1>
                        <p class="IRANSans" style="font-size: 18px;margin-top: 22px"><?php /*echo $fetch['title']*/?></p>
                    </div>-->
                </div>
            </div>
        <?php
        }
        ?>

            <!-------------------------------------------------------------------------------------->

        </div>
    </div>
    <!---------------------------------------------پرفروش ترین محصولات----------------------->
    <div class="col-md-12 hidden-sm hidden-xs col-lg-12 " style="padding:95px 45px 0px 45px; position: relative;">

        <div class="container">
<!--            <h1 class="SansBold" style="color:#2d3e50;font-size:35px;text-align: center">پرفروش ترین محصولات</h1>-->
            <br>
            <div class=" col-sm-1 col-xs-1 col-lg-1 col-md-1" style="float:none;margin: auto;background-color:#dc1a52;"></div>
            <br><br>
        </div>
        <a class=" left carousel-control" onclick="center1Prev()">
            <span class="glyphicon glyphicon-chevron-right fa fa-angle-left"></span>
            <button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="display: block;">Previous</button>
        </a>
        <a class=" right carousel-control" onclick="center1Next()">
            <span class="glyphicon glyphicon-chevron-right fa fa-angle-right"></span>
            <span class="sr-only">Next</span>
        </a>


    </div>

    <script>
        function center1Prev() {
            $(".center1").slick('slickPrev');

        }    function center1Next() {
            $(".center1").slick('slickNext');

        }
    </script>


    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

    <!--    <script src="js/jquery.js"></script>-->
    <script src="slider/js/popper.js"></script>
    <script src="slider/js/bootstrap.js"></script>
    <script src="slider/js/migrate.js"></script>
    <script src="slider/js/slick.js"></script>
    <script type="text/javascript">
        $(document).on('ready', function() {

            $(".center1").slick({

                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 4
            });


        });
    </script>
    <!--------------------------------sm xs------------------------------------>
    <div class="hidden-md hidden-lg col-sm-12 col-xs-12" style="padding-top: 80px">
        <div class="container">
<!--            <h1 class="SansBold" style="color:#2d3e50;font-size:35px;text-align: center">پرفروش ترین محصولات</h1>-->
            <br>
            <div class=" col-sm-1 col-xs-1 col-lg-1 col-md-1" style="float:none;margin: auto;background-color:#dc1a52;"></div>
            <br><br>

<!--            <section class="center6 slider">-->
<!---->
<!--                <div class="onePart1Slider">-->
<!--                    <a href="one%20page.html">-->
<!---->
<!--                        <div class="imgSliderTop">-->
<!--                            <img src="IMG/smartwatch.jpg" >-->
<!--                        </div>-->
<!--                        <div class="textAppleAndOffer">-->
<!--                            <h4>اپل واچ</h4>-->
<!--                            <h4 class="offstyle SansBlack">35% off</h4>-->
<!--                        </div>-->
<!--                        <div class="starOff">-->
<!--                            <h4 class="starstyle">-->
<!--                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>-->
<!--                            </h4>-->
<!--                        </div>-->
<!--                        <div class="pricetext">-->
<!--                            <h4 class="card-text gheymatghadim IRANSans"><p> ریال</p> 14,450,000 </h4>-->
<!--                            <h4 class=" gheymatghadim IRANSans" style="text-align: center"><div></div>14,450,000</h4>-->
<!--                        </div>-->
<!--                        <div class="buttonPrice">-->
<!--                            <button>            اضافه کردن به سبد خرید</button>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="onePart1Slider">-->
<!--                    <a href="one%20page.html">-->
<!---->
<!--                        <div class="imgSliderTop">-->
<!--                            <img src="IMG/smartwatch.jpg" >-->
<!--                        </div>-->
<!--                        <div class="textAppleAndOffer">-->
<!--                            <h4>اپل واچ</h4>-->
<!--                            <h4 class="offstyle SansBlack">35% off</h4>-->
<!--                        </div>-->
<!--                        <div class="starOff">-->
<!--                            <h4 class="starstyle">-->
<!--                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>-->
<!--                            </h4>-->
<!--                        </div>-->
<!--                        <div class="pricetext">-->
<!--                            <h4 class="card-text gheymatghadim IRANSans"><p> ریال</p> 14,450,000 </h4>-->
<!--                            <h4 class=" gheymatghadim IRANSans" style="text-align: center"><div></div>14,450,000</h4>-->
<!--                        </div>-->
<!--                        <div class="buttonPrice">-->
<!--                            <button>            اضافه کردن به سبد خرید</button>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="onePart1Slider">-->
<!--                    <a href="one%20page.html">-->
<!---->
<!--                        <div class="imgSliderTop">-->
<!--                            <img src="IMG/smartwatch.jpg" >-->
<!--                        </div>-->
<!--                        <div class="textAppleAndOffer">-->
<!--                            <h4>اپل واچ</h4>-->
<!--                            <h4 class="offstyle SansBlack">35% off</h4>-->
<!--                        </div>-->
<!--                        <div class="starOff">-->
<!--                            <h4 class="starstyle">-->
<!--                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>-->
<!--                            </h4>-->
<!--                        </div>-->
<!--                        <div class="pricetext">-->
<!--                            <h4 class="card-text gheymatghadim IRANSans"><p> ریال</p> 14,450,000 </h4>-->
<!--                            <h4 class=" gheymatghadim IRANSans" style="text-align: center"><div></div>14,450,000</h4>-->
<!--                        </div>-->
<!--                        <div class="buttonPrice">-->
<!--                            <button>            اضافه کردن به سبد خرید</button>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </div>-->
<!---->
<!--                <div class="onePart1Slider">-->
<!--                    <a href="one%20page.html">-->
<!---->
<!--                        <div class="imgSliderTop">-->
<!--                            <img src="IMG/smartwatch.jpg" >-->
<!--                        </div>-->
<!--                        <div class="textAppleAndOffer">-->
<!--                            <h4>اپل واچ</h4>-->
<!--                            <h4 class="offstyle SansBlack">35% off</h4>-->
<!--                        </div>-->
<!--                        <div class="starOff">-->
<!--                            <h4 class="starstyle">-->
<!--                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>-->
<!--                            </h4>-->
<!--                        </div>-->
<!--                        <div class="pricetext">-->
<!--                            <h4 class="card-text gheymatghadim IRANSans"><p> ریال</p> 14,450,000 </h4>-->
<!--                            <h4 class=" gheymatghadim IRANSans" style="text-align: center"><div></div>14,450,000</h4>-->
<!--                        </div>-->
<!--                        <div class="buttonPrice">-->
<!--                            <button>            اضافه کردن به سبد خرید</button>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="onePart1Slider">-->
<!--                    <a href="one%20page.html">-->
<!---->
<!--                        <div class="imgSliderTop">-->
<!--                            <img src="IMG/smartwatch.jpg" >-->
<!--                        </div>-->
<!--                        <div class="textAppleAndOffer">-->
<!--                            <h4>اپل واچ</h4>-->
<!--                            <h4 class="offstyle SansBlack">35% off</h4>-->
<!--                        </div>-->
<!--                        <div class="starOff">-->
<!--                            <h4 class="starstyle">-->
<!--                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>-->
<!--                            </h4>-->
<!--                        </div>-->
<!--                        <div class="pricetext">-->
<!--                            <h4 class="card-text gheymatghadim IRANSans"><p> ریال</p> 14,450,000 </h4>-->
<!--                            <h4 class=" gheymatghadim IRANSans" style="text-align: center"><div></div>14,450,000</h4>-->
<!--                        </div>-->
<!--                        <div class="buttonPrice">-->
<!--                            <button>            اضافه کردن به سبد خرید</button>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </div>-->
<!---->
<!--                <div class="onePart1Slider">-->
<!--                    <a href="one%20page.html">-->
<!---->
<!--                        <div class="imgSliderTop">-->
<!--                            <img src="IMG/smartwatch.jpg" >-->
<!--                        </div>-->
<!--                        <div class="textAppleAndOffer">-->
<!--                            <h4>اپل واچ</h4>-->
<!--                            <h4 class="offstyle SansBlack">35% off</h4>-->
<!--                        </div>-->
<!--                        <div class="starOff">-->
<!--                            <h4 class="starstyle">-->
<!--                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>-->
<!--                            </h4>-->
<!--                        </div>-->
<!--                        <div class="pricetext">-->
<!--                            <h4 class="card-text gheymatghadim IRANSans"><p> ریال</p> 14,450,000 </h4>-->
<!--                            <h4 class=" gheymatghadim IRANSans" style="text-align: center"><div></div>14,450,000</h4>-->
<!--                        </div>-->
<!--                        <div class="buttonPrice">-->
<!--                            <button>            اضافه کردن به سبد خرید</button>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </div>-->
<!---->
<!--                <div class="onePart1Slider">-->
<!--                    <a href="one%20page.html">-->
<!---->
<!--                        <div class="imgSliderTop">-->
<!--                            <img src="IMG/smartwatch.jpg" >-->
<!--                        </div>-->
<!--                        <div class="textAppleAndOffer">-->
<!--                            <h4>اپل واچ</h4>-->
<!--                            <h4 class="offstyle SansBlack">35% off</h4>-->
<!--                        </div>-->
<!--                        <div class="starOff">-->
<!--                            <h4 class="starstyle">-->
<!--                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>-->
<!--                            </h4>-->
<!--                        </div>-->
<!--                        <div class="pricetext">-->
<!--                            <h4 class="card-text gheymatghadim IRANSans"><p> ریال</p> 14,450,000 </h4>-->
<!--                            <h4 class=" gheymatghadim IRANSans" style="text-align: center"><div></div>14,450,000</h4>-->
<!--                        </div>-->
<!--                        <div class="buttonPrice">-->
<!--                            <button>            اضافه کردن به سبد خرید</button>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </div>-->
<!---->
<!--                <div class="onePart1Slider">-->
<!--                    <a href="one%20page.html">-->
<!---->
<!--                        <div class="imgSliderTop">-->
<!--                            <img src="IMG/smartwatch.jpg" >-->
<!--                        </div>-->
<!--                        <div class="textAppleAndOffer">-->
<!--                            <h4>اپل واچ</h4>-->
<!--                            <h4 class="offstyle SansBlack">35% off</h4>-->
<!--                        </div>-->
<!--                        <div class="starOff">-->
<!--                            <h4 class="starstyle">-->
<!--                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>-->
<!--                            </h4>-->
<!--                        </div>-->
<!--                        <div class="pricetext">-->
<!--                            <h4 class="card-text gheymatghadim IRANSans"><p> ریال</p> 14,450,000 </h4>-->
<!--                            <h4 class=" gheymatghadim IRANSans" style="text-align: center"><div></div>14,450,000</h4>-->
<!--                        </div>-->
<!--                        <div class="buttonPrice">-->
<!--                            <button>            اضافه کردن به سبد خرید</button>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="onePart1Slider">-->
<!--                    <a href="one%20page.html">-->
<!---->
<!--                        <div class="imgSliderTop">-->
<!--                            <img src="IMG/smartwatch.jpg" >-->
<!--                        </div>-->
<!--                        <div class="textAppleAndOffer">-->
<!--                            <h4>اپل واچ</h4>-->
<!--                            <h4 class="offstyle SansBlack">35% off</h4>-->
<!--                        </div>-->
<!--                        <div class="starOff">-->
<!--                            <h4 class="starstyle">-->
<!--                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>-->
<!--                            </h4>-->
<!--                        </div>-->
<!--                        <div class="pricetext">-->
<!--                            <h4 class="card-text gheymatghadim IRANSans"><p> ریال</p> 14,450,000 </h4>-->
<!--                            <h4 class=" gheymatghadim IRANSans" style="text-align: center"><div></div>14,450,000</h4>-->
<!--                        </div>-->
<!--                        <div class="buttonPrice">-->
<!--                            <button>            اضافه کردن به سبد خرید</button>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </div>-->
<!---->
<!--            </section>-->

        </div>
        <a class=" left carousel-control" onclick="center6Prev()">
            <span class="glyphicon glyphicon-chevron-right fa fa-angle-left"></span>
            <button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="display: block;">Previous</button>
        </a>
        <a class=" right carousel-control" onclick="center6Next()">
            <span class="glyphicon glyphicon-chevron-right fa fa-angle-right"></span>
            <span class="sr-only">Next</span>
        </a>


    </div>

    <script>
        function center6Prev() {
            $(".center6").slick('slickPrev');

        }    function center6Next() {
            $(".center6").slick('slickNext');

        }
    </script>


    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

    <!--    <script src="js/jquery.js"></script>-->
    <script src="slider/js/popper.js"></script>
    <script src="slider/js/bootstrap.js"></script>
    <script src="slider/js/migrate.js"></script>
    <script src="slider/js/slick.js"></script>
    <script type="text/javascript">
        function respansiveConteiner6(){
            if (window.matchMedia("(min-width: 650px)").matches) {
                $(".center6").slick({

                    infinite: true,
                    slidesToShow:2,
                    slidesToScroll:2
                });
                console.log('true')

            } else {
                $(".center6").slick({

                    infinite: true,
                    slidesToShow:1,
                    slidesToScroll:1
                });

                console.log('false')
            }

        }
        $(document).on('ready', function() {

            respansiveConteiner6();

        });
        $(window).on('resize', function(){
            respansiveConteiner6();
        });
    </script>
    <!------------------------------------------------------>

    <script>
        function center7Prev() {
            $(".center7").slick('slickPrev');

        }    function center7Next() {
            $(".center7").slick('slickNext');

        }
    </script>


    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

    <!--    <script src="js/jquery.js"></script>-->
    <script src="slider/js/popper.js"></script>
    <script src="slider/js/bootstrap.js"></script>
    <script src="slider/js/migrate.js"></script>
    <script src="slider/js/slick.js"></script>
    <script type="text/javascript">
        $(document).on('ready', function() {

            $(".center7").slick({

                infinite: true,
                slidesToShow:2,
                slidesToScroll:2
            });


        });
    </script>

    <!---------------------------------------------جدیدترین محصولات----------------------->
    <div class="col-md-12 hidden-xs hidden-sm col-lg-12 " style="padding:54px 45px 0px 45px; position: relative;">

        <div class="container">
            <h1 class="SansBold" style="color:#2d3e50;font-size:35px;text-align: center">جدیدترین محصولات</h1>
            <br>
            <div class=" col-sm-1 col-xs-1 col-lg-1 col-md-1" style="float:none;margin: auto;background-color:#dc1a52;"></div>
            <br><br>

            <section class="center3 slider">
                <?php
                $query6 = $db::Query("SELECT * FROM product where product.active = true ORDER BY date(productRegDate) DESC,time(productRegTime) LIMIT 10 OFFSET 0");
                while ($fetch = mysqli_fetch_assoc($query6)) {
                    $price2 = $fetch['productPrice'];
                    $offer = $fetch['offer'];
                    $off2 = $price2 / 100 * $offer;

                    $img = $fetch['productId'];
                    $qu = $db::Query("SELECT * FROM gallery WHERE galleryPrId='$img' AND galleryStatus='1'");
                    $r = mysqli_fetch_assoc($qu);
                    ?>
                    <div class="col-md-3 col-lg-3 col-xs-12 col-sm-6" style="border: 1px solid #e8e8e8;padding: 20px 0;">
                        <a href="product.php?productId=<?php echo $fetch['productId'] ?>" class="image-holder__link">
                            <img src="admin/upload/gallery/<?php echo $r['galleryImg'] ?>.jpg" style="width: 100%">
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                            <h4 class="esmekalatakhfif IRANSans"><?php echo $fetch['productName'] ?></h4>
                            <?php
                            if($fetch['offer']!="0"){
                                ?>
                                <h4 class="offstyle SansBlack"><?php echo $fetch['offer'] ?>%تخفیف</h4>

                                <?php
                            }
                            ?>

                            <h4 class="starstyle"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h4>
<!--                            <h4 class=" gheymatjadid IRANSans">--><?php //echo @$db::toMoney($price2 - $off2) ?><!--</h4>-->
<!--                            <h4 class="rial IRANSans">ریال </h4>-->
<!--                            <br> <br> <br>-->
<!--                            <h4 class="card-text gheymatghadim IRANSans" style="margin-top: 16%;display: block">-->
<!--                                <div></div>--><?php //echo @$db::toMoney("$price2") ?><!--</h4>-->
                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">


                            <div class="pricetext">
                                <h4 class=" gheymatghadim IRANSans" style="    direction: rtl;">  <?php echo @$db::toMoney($price2 - $off2) ?> ریال </h4>
                                <h4 class=" gheymatghadimIn IRANSans" style="margin-top: -9px;display: block;text-align: center">
                                    <?php
                                        if($off2 == 0){
                                            ?>
                                            <span class="gheymatghadim">
                                                <?php
                                                echo "";
                                                 ?>
                                            </span>
                                    <?php
                                        }else{
                                            echo "<span class='gheymatghadim'>".@$db::toMoney($price2)."</span>" ;

                                    }
                                    ?>
                                </h4>
                            </div>
                            </div>
                        </a>

                        <div class="text-center"><a onclick="shbADD('<?php echo $fetch['productId']?>')" class="btn btn-primary IRANSans"
                                                        style="padding: 6px 28px;font-size: 13px;color: white;background-color: #dc1a52;border:1px solid #454e60;">اضافه
                                    کردن به سبد خرید</a></div>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </section>

        </div>
        <a class=" left carousel-control" onclick="center3Prev()">
            <span class="glyphicon  fa fa-angle-left"></span>
            <button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="display: block;">Previous</button>
        </a>
        <a class=" right carousel-control" onclick="center3Next()">
            <span class="glyphicon glyphicon-chevron-right fa fa-angle-right"></span>
            <span class="sr-only">Next</span>
        </a>


    </div>

    <script>
        function center3Prev() {
            $(".center3").slick('slickPrev');

        }    function center3Next() {
            $(".center3").slick('slickNext');

        }
    </script>


    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

    <!--    <script src="js/jquery.js"></script>-->
    <script src="slider/js/popper.js"></script>
    <script src="slider/js/bootstrap.js"></script>
    <script src="slider/js/migrate.js"></script>
    <script src="slider/js/slick.js"></script>
    <script type="text/javascript">
        $(document).on('ready', function() {

            $(".center3").slick({

                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 4
            });


        });
    </script>
    <!--------------------------xs sm----------------------------------->

    <div class="hidden-md hidden-lg col-sm-12 col-xs-12" style="padding-top: 80px">
        <div class="container">
            <h1 class="SansBold" style="color:#2d3e50;font-size:35px;text-align: center">جدیدترین محصولات</h1>
            <br>
            <div class=" col-sm-1 col-xs-1 col-lg-1 col-md-1" style="float:none;margin: auto;background-color:#dc1a52;"></div>
            <br><br>

            <section class="center6 slider">
                <?php
                $query6 = $db::Query("SELECT * FROM product where product.active = true ORDER BY date(productRegDate) DESC,time(productRegTime) LIMIT 10 OFFSET 0");
                while ($fetch = mysqli_fetch_assoc($query6)) {
                    $price2 = $fetch['productPrice'];
                    $offer = $fetch['offer'];
                    $off2 = $price2 / 100 * $offer;

                    $img = $fetch['productId'];
                    $qu = $db::Query("SELECT * FROM gallery WHERE galleryPrId='$img' AND galleryStatus='1'");
                    $r = mysqli_fetch_assoc($qu);
                    ?>
                    <div class="onePart1Slider">
                        <a href="product.php?productId=<?php echo $fetch['productId'] ?>">

                            <div class="imgSliderTop">
                                <img src="admin/upload/gallery/<?php echo $r['galleryImg'] ?>.jpg" >
                            </div>
                            <div class="textAppleAndOffer">
                                <h4><?php echo $fetch['productName'] ?></h4>
                                <?php
                                if($fetch['offer']!="0"){
                                    ?>
                                    <h4 class="offstyle SansBlack"><?php echo $fetch['offer'] ?>%تخفیف</h4>

                                    <?php
                                }
                                ?>
<!--                                <h4 class="offstyle SansBlack">--><?php //echo $fetch['offer'] ?><!--%off</h4>-->
                            </div>
                            <div class="starOff">
                                <h4 class="starstyle">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </h4>
                            </div>

                            <div class="pricetext">
                                <h4 class=" gheymatghadim IRANSans"> ریال <?php echo @$db::toMoney($price2 - $off2) ?> </h4>
                                <h4 class=" gheymatghadimIn IRANSans" style="margin-top: -9px;display: block;text-align: center">
                                    <?php
                                    if($off2 == 0){
                                        ?>
                                        <span class="gheymatghadim">
                                                <?php
                                                echo "";
                                                ?>
                                            </span>
                                        <?php
                                    }else{
                                        echo "<span class='gheymatghadim'>".@$db::toMoney($price2)."</span>" ;

                                    }
                                    ?>
                                </h4>
                            </div>
                            <div class="buttonPrice">
                                <button onclick="shbADD('<?php echo $fetch['productId']?>')">اضافه کردن به سبد خرید</button>
                            </div>
                        </a>
                    </div>

                    <?php
                }
                ?>

            </section>

        </div>
        <a class=" left carousel-control" onclick="center4Prev()">
            <span class="glyphicon glyphicon-chevron-right fa fa-angle-left"></span>
            <button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="display: block;">Previous</button>
        </a>
        <a class=" right carousel-control" onclick="center4Next()">
            <span class="glyphicon glyphicon-chevron-right fa fa-angle-right"></span>
            <span class="sr-only">Next</span>
        </a>


    </div>

    <script>
        function center8Prev() {
            $(".center8").slick('slickPrev');

        }    function center8Next() {
            $(".center8").slick('slickNext');

        }
    </script>


    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

    <!--    <script src="js/jquery.js"></script>-->
    <script src="slider/js/popper.js"></script>
    <script src="slider/js/bootstrap.js"></script>
    <script src="slider/js/migrate.js"></script>
    <script src="slider/js/slick.js"></script>
    <script type="text/javascript">
        $(document).on('ready', function() {

            $(".center8").slick({

                infinite: true,
                slidesToShow:2,
                slidesToScroll: 2
            });


        });
    </script>
    <!--------------------------------------------->



    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

    <!--    <script src="js/jquery.js"></script>-->
    <script src="slider/js/popper.js"></script>
    <script src="slider/js/bootstrap.js"></script>
    <script src="slider/js/migrate.js"></script>
    <script src="slider/js/slick.js"></script>
    <script type="text/javascript">
        $(document).on('ready', function() {

            $(".center9").slick({

                infinite: true,
                slidesToShow:2,
                slidesToScroll: 2
            });


        });
    </script>
    <!--------------------------------3card takhfif---------------------------------------->
    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding-top: 50px">
        <div class="container">
            <div class="col-md-5 col-lg-5 col-xs-12 col-sm-12 card1" style="text-align: center">
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding:0;overflow:hidden;background-color: white;border: 1px solid lightgrey;border-radius: 10px;text-align: center ;height: 45rem;box-shadow: 5px 5px 15px grey;">
                    <div class="stylepmyoff11">
                        <?php
                        $query8 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 3");
                        while ($fetch = mysqli_fetch_assoc($query8)){
                        $feId = $fetch["festivalId"];
                        $q = $db::Query("SELECT subCatId FROM festivalproduct left join product on product.productId = festivalproduct.fePrProductId left join subcategory on product.productSubCatId = subcategory.subId
                                        where fePrFestivalId = '$feId' limit 1");
                        $subCatId = mysqli_fetch_assoc($q);
                        ?>
                    </div>
                    <!--<span class="SansBold a2"><?php /*echo $fetch['festivalOfferPercentage']*/?>%</span>-->
                    <a href="search.php?catId=<?php echo $subCatId['subCatId']?>">
                    <img src="admin/upload/img/<?php echo $fetch['festivalImg']?>.jpg" style="width: 100%!important;height: 45rem!important;"></a>
                    <!--<div class="h1card1">
                        <h1 class="SansBold" style="font-size: 25px;"><?php /*echo $fetch['festivalName']*/?></h1>
                        <p class="IRANSans" style="font-size: 18px;margin-top: 22px"><?php /*echo $fetch['title']*/?></p>
                    </div>-->
                </div>
                <?php
                }
                ?>
            </div>
            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-6 card1" style="text-align: right;">
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding: 0;border-radius: 10px;overflow: hidden;box-shadow: 5px 5px 15px grey;">
                    <div class="stylepmyoff21">
                        <?php
                        $query8 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 4");
                        while ($fetch=mysqli_fetch_assoc($query8)){
                        $feId = $fetch["festivalId"];
                        $q = $db::Query("SELECT subCatId FROM festivalproduct left join product on product.productId = festivalproduct.fePrProductId left join subcategory on product.productSubCatId = subcategory.subId
                                        where fePrFestivalId = '$feId' limit 1");
                        $subCatId = mysqli_fetch_assoc($q);
                        ?>
                    </div> <!--<span class="SansBold a2"><?php /*echo $fetch['festivalOfferPercentage']*/?>%</span>-->
                    <a href="search.php?catId=<?php echo $subCatId['subCatId']?>">
                        <img src="admin/upload/img/<?php echo $fetch['festivalImg']?>.jpg" style="width: 100%!important;height: 45rem!important;"></a>
                    <!--<div class="h1card3">
                        <h1 class="SansBold" style="font-size: 25px;"><?php /*echo $fetch['festivalName']*/?></h1>
                        <p class="IRANSans" style="font-size: 18px;margin-top: 22px"><?php /*echo $fetch['title']*/?></p>
                    </div>-->
                </div>
            </div>
            <?php
            }
            ?>
            <div class="col-md-3 col-lg-3 col-xs-12 col-sm-6 card1" style="text-align: right;">
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding: 0;border-radius: 10px;overflow: hidden;box-shadow: 5px 5px 15px grey;">
                    <div class="stylepmyoff21">
                        <?php
                        $query8 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 5");
                        while ($fetch=mysqli_fetch_assoc($query8)){
                            $feId = $fetch["festivalId"];
                        $q = $db::Query("SELECT productSubCatId FROM festivalproduct left join product on product.productId = festivalproduct.fePrProductId left join subcategory on product.productSubCatId = subcategory.subId
                                        where fePrFestivalId = '$feId' limit 1");
                            $subCatId = mysqli_fetch_assoc($q);
                        ?>
                    </div>
                    <a href="search.php?subId=<?php echo $subCatId['productSubCatId']?>">
                        <img src="admin/upload/img/<?php echo $fetch['festivalImg']?>.jpg" style="width: 100%!important;height: 45rem!important;">
                    </a>

                </div>
            </div>
        <?php
        }
        ?>

            <!-------------------------------------------------------------------------------------->

        </div>
    </div>
            <!----------------------------------------------------------------------------------->

        </div>
    </div>
    <!--------------------------------4card------------------------------------------------------>
    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" style="padding-top: 50px">
        <div class="mycontainer">
            <div class="row">
                <?php
                $query3 = $db::Query("SELECT * FROM specialoffer,product WHERE specialOfferProductId=productId and product.active = true order by productId limit 4 offset 0");
                while ($fetch = mysqli_fetch_assoc($query3)){
                    $price5 = $fetch['productPrice'];
                    $percentageOffer = $fetch['specialOfferPercentage'];
                    $off5 = $price5 / 100 * $percentageOffer;
                    $img = $fetch['productId'];
                    $qu = $db::Query("SELECT * FROM gallery WHERE galleryPrId='$img' AND galleryStatus='1'");
                    $r = mysqli_fetch_assoc($qu);
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 SansBold">
                        <article class="card-wrapper">
                            <div class="image-holder">
                                <a href="product.php?productId=<?php echo $fetch['productId']?>" class="image-holder__link"></a>
                                <div class="image-liquid image-holder--original">
                                    <img src="admin/upload/gallery/<?php echo $r['galleryImg'] ?>.jpg">
                                </div>
                            </div>
                            <div class="product-description">
                                <!-- title -->
                                <h1 class="product-description__title" style="font-size: 20px;color: #2d3e50;">
                                    <a class="SansBold" href="">
                                        <?php echo $fetch['productName'] ?>
                                    </a>
                                </h1>
                                <br><br>
                                <!-- category and price -->
                                <div class="row">

                                    <br>    <br>
                                    <div class="col-xs-12 col-sm-4 product-description__price">
                                        <?php echo @$db::toMoney($price5 - $off5) ?>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 product-description__category secondary-text"><?php echo $fetch['Description']?>
                                    </div>
                                    <br>
                                </div>

                                <!-- divider -->
                                <hr/>

                                <!-- sizes -->



                            </div>

                        </article>
                    </div>


                    <?php
                }
                ?>
            </div>

        </div>

    </div>
    <!----------------------------------end 4cards------------------------------------------->

    <script>
        <?php
                session_start();
        if(isset($_SESSION['PayMsg'])&& $_SESSION['PayMsg']!=""){ ?>
            $(document).ready(function () {
                swal('<?php echo "".$_SESSION["PayMsg"] ?>','', '<?php echo $_SESSION['MsgType'] ?>');
            })
        <?php
        $_SESSION["PayMsg"]="";
        $_SESSION['MsgType']="";
        } ?>
    </script>






    <!-----------------------------------app phonix------------------------------------------->
<div class="container-fluid" id="nomarginAndpadding1">
    <div class="col-xs-12 col-sm-12 col-md-12 col-xs-12" id="nomarginAndpadding2">
        <div class="allAppPhonix">
            <div class="imgAppPhonix">
                <img src="IMG/mobile.png" >
            </div>
            <div class="downloadAppPhonix">
                <div class="SansBold  tittleApp"><h3>دانلود اپ فونیکس</h3></div>
                <div class="IRANSans  textApp">
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای . </p>
                </div>
                <div class="banerApp">
                    <button class="googlePlay"></button>
                    <button class="appStore"></button>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-----------------------------------end app phonix------------------------------------------->
    <!---------------------------------------footer------------------------------------------------>
    <?php
    include "footer.php";
    ?>
    <!-------------------------------------end footer------------------------------------------------------>

</div>

</body>
</html>
