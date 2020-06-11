<?php
include "head.php";
?>
</head>
<body>
<div class='customAlert' style="display: none">
    <p class='message'>
        محصول با موفقیت به سبد خرید افزوده شد<i class="fas fa-check-circle" style="margin-left: 10px;position: relative;top: 2px;"></i>
    </p>
</div>
<?php
include "header.php";
?>
</div>
<?php

$_GET = $db::RealString($_GET);
$id = $_GET['productId'];
?>
<!--------------------------slider------------------------------------>
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 IRANSans" style="color: #666666;font-size: 14px;direction: rtl;text-align: right;padding-top: 30px">
    <?php
    $product = $db::Query("select * from product,subcategory,category WHERE subCatId=catId  AND subId=productSubCatid AND productId='$id' and product.active = 1");
     $fetch = mysqli_fetch_assoc($product);
     $subCatId = $fetch['productSubCatid'];
    ?>
    <p><?php echo $fetch['catName']?> / <?php echo $fetch['subName']?> / <?php echo $fetch['productName']?></p>
</div>
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align: right;direction: rtl;">
    <?php
        $qu = $db::Query("SELECT * FROM gallery WHERE galleryPrId='$id'");
        $r = mysqli_fetch_assoc($qu);
    ?>
    <div class="sliderKinf">
        <!--    imgBigg-->
        <div class="part1BigImg text-center">
            <img src="admin/upload/gallery/<?php echo $r['galleryImg']?>.jpg" alt="" id="image-container" style="width: auto;height: 500px">
            <!--    chilld-->
            <div class="part1Img2">
            <?php
            $img = $db::Query("SELECT * FROM gallery WHERE galleryPrId='$id'");
            while ($m = mysqli_fetch_assoc($img)){
            ?>
                <img class="stylelittpic" onclick="change_img(this)" src="admin/upload/gallery/<?php echo $m['galleryImg']?>.jpg" alt="">
                <?php
            }
            ?>
            </div>
        </div>
        <!--    About Mig-->
        <div class="part3Text">
            <?php
            $query = $db::Query("select * from product ,subcategory,brand WHERE productId='$id' and product.productSubCatId=subcategory.subId and brand.brandId=product.productBrandId and product.active = 1");
                $fetch = mysqli_fetch_assoc($query);
            ?>
              <hr class="myhr">
            <div class="IRANSans" style="font-size:16px;color:#2d3e50">  <label>نام محصول : <?php echo $fetch['productName']?> </label><span><img src="IMG/Rectangle.png"  style="margin: 0 7%"></span><label> برند محصول : <?php echo $fetch['brand']?></label><span style="float: left">
                    <?php
                    if(isset($_SESSION['loginUser']) && $_SESSION['loginUser']==true) {
                        $cot = "'";
                    $select = $db::Query("SELECT * FROM fav where favPrId='$id' AND favUserId='$username'",$db::$NUM_ROW);
                    if($select==1){
                        echo '<img title="علاقه مندی" id="like" src="IMG/likebsolid.png" style="padding-left: 25px;cursor:" onclick="like('.$cot.$id.$cot.')"></span>';
                    }else{
                        echo '<img id="like" title="علاقه مندی" src="IMG/likeb.png" style="padding-left: 25px"  onclick="like('.$cot.$id.$cot.')"></span>';
                    }
                    }
                    ?>
                </div>
              <hr class="myhr">
            <div style=" display: flex;  align-items: end;
    justify-content: flex-end;
    align-self: end;
    justify-self: end;"><h4 class="SansBold" style="color: #2d3e50">ویژگی محصول</h4>
                <img src="IMG/img@2x.png" style="    width: 87%;margin-right: 1%;height: 33px;">
            </div>
            <br>
            <p class="IRANSans" style="line-height: 25px"><?php echo $fetch['Description']?>
            </p>
            <br/>
            <div class="row">
                <div class="col-md-6 col-md-offset-6">
                    <table class="table table-bordered">
                        <tbody>
                        <?php
                        $properties = $db::Query("SELECT * FROM productproperties,properties WHERE productproperties.prPrPropertiesId=properties.proId AND productproperties.proId='$id'");
                        $i=1;
                        if (mysqli_num_rows($properties) > 0) {
                        ?>
                        <?php
                        while ($feched = mysqli_fetch_assoc($properties)) {
                        ?>
                        <tr>
                            <td><?php echo $feched['proName']?> </td>
                            <td><?php echo $feched['prPrValue']?> </td>
                        </tr>

                        <?php
                        $i++;
                        } ?>
                        <?php }?>

                        </tbody>
                    </table>
                </div>
            </div>
            <hr class="myhr">
            <div class="checkboxKIngMmdKhosroviy">

                <p class="SansBold" style="font-size: 16px">رنگ بندی</p>

                <div class="checking" style="margin-left: 200px">
                    <?php
                    $se = $db::Query("SELECT * FROM color,colorproduct WHERE colorId=coPrColorId AND coPrProductId='$id'");
                    while ($fetch = mysqli_fetch_assoc($se)){
                    $name = $fetch['colorName'];
                    ?>
                    <label class="containerw">
                        <input type="radio" checked="checked" name="radio" class="inputRadioCk1">
                        <span class="checkmark inputRadioCk1" onclick="changeColored('<?php echo $fetch['coPrId'] ?>')"  style="background-color: <?php echo $name?>"></span>
                    </label>
                        <?php
                    }
                    ?>
                </div>

                <script>
                    function changeColored(id) {
                        $.ajax({
                            url: 'request/changeColored.php',
                            data: {
                                id:id,
                            },
                            dataType: 'json',
                            type: 'POST',
                            success: function (data) {
                                if(!data['error']){
                                    $("#price").html(data['price']+' ریال ');
                                }
                            }
                        });
                    }
                    function like(id) {
                        $.ajax({
                            url: 'request/addFav.php',
                            data: {
                                id:id,
                            },
                            dataType: 'json',
                            type: 'POST',
                            success: function (data) {
                                if(!data['error']){
                                    if(data['like']==true){
                                        $("#like").attr("src","IMG/likebsolid.png");

                                    }else{
                                        $("#like").attr("src","IMG/likeb.png");

                                    }
                                }
                            }
                        });
                    }
                </script>
            </div>
            <hr class="myhr">
            <div class="checkboxKIngMmdKhosroviy">

                <p class="SansBold" style="font-size: 16px">قیمت</p>

                <div class="checking" style="margin-left: 200px">
                    <?php
                    $cat = $db::Query("SELECT * FROM product WHERE  productId='$id' and product.active = 1");
                    while ($fetch = mysqli_fetch_assoc($cat)){
                     $price3 = $fetch['productPrice'];
                     $offer = $fetch['offer'];
                     $off3 = $price3/100*$offer;
                      ?>
                        <p class="SansBold" id="price" style="font-size: 16px"><?php echo @$db::toMoney($fetch['productPrice'] - $fetch['offer'])?> ریال</p>

                        <?php
                    }
                    ?>
                </div>

            </div>

            <hr class="myhr">
<!--            <div class="checkboxKIngMmdKhosroviy">-->
<!--                <p class="SansBold" style="font-size: 16px">اندازه</p>-->
<!--                <div class="divSizeLsMX IRANSans" style="margin-left: 200px">-->
<!--                    <div><p class="activeBtn">Xl</p></div>-->
<!--                    <div><p class="activeNotBtn">L</p></div>-->
<!--                    <div><p class="activeNotBtn">M</p></div>-->
<!--                    <div><p class="activeNotBtn">S</p></div>-->
<!--                </div>-->
<!--            </div>-->
            <br><br><br>
            <div class="checkboxKIngMmdKhosroviy1">
                <div style="text-align: center;width: 50%;">
                    <p class="SansBold" style="font-size: 17px;">تعداد</p>


                    <div style="text-align: center;float: none;
    margin: auto;width: 180px">
                        <div type="button" class="nexNum"
                             id="divnex" onclick="changePluss('divnex','+')" style="width:30px;height:30px;
                             border-radius:100%;background-color: #dc1a52;float: right">
                            <span>+</span>
                        </div>
                        <input id="pr20190827144144083796" type="number" step="1" max="99" min="1" value="1" title="Qty" class="qty btnnumbrik SansBold" size="4" disabled="" style="font-size:16px;color: #dc1a52;    position: relative;
    top: 5px;
    right: 3px;">
                        <div type="button" value="-" class="prevNum"
                             id="divprev" onclick="changePluss('divprev')" style="width:30px;height:30px;border-radius: 100%;background-color: #dc1a52;float: left;">
                            <span>-</span>

                        </div>
                    </div>
                </div>
                <div class="text-center"><a  onclick="shbADD('<?php echo $id?>')" class="btn btn-primary  SansBold sabad-afzudan-psearch" >اضافه کردن به سبد خرید</a></div> </div>

            </div>

        </div>

    </div>
<script>
    function shbADD(id) {
        var count = $("#pr20190827144144083796").val();
        $.ajax({
            url: 'request/shoppingCard.php',
            data: {
                PrId:id,
                count:count
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
            }
        });
    }
</script>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script >
    var container = document.getElementById('image-container');

    function change_img(image){
        container.src=image.src;
    }
    // plusss

    function changePluss(id,operator) {
        if(operator == '+'){
            $(`#${id}`).next().val(parseInt($(`#${id}`).next().val())+1);
        } else{
            if($(`#${id}`).prev().val() <= 1) {
                // $(`#${id}`).parent().parent().parent().parent().hide();
                // $(`#${id}`).parent().parent().parent().parent().next().hide();
            } else {
                $(`#${id}`).prev().val(parseInt($(`#${id}`).prev().val())-1);
            }
        }
    }
    // dispalynone
    function changeDisplay(id) {
        if($id = true){
            $(`#${id}`).parent().parent().parent().parent().hide();
        } else{
            $(`#${id}`).parent().parent().parent().parent().css('display','block');
        }
    }
</script>
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding:70px 0;text-align: center">
    <div class="container">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="float: none;margin: auto">
           <img src="IMG/warrenty@2x.png" style="margin-right: 2%;width:18%;">
           <img src="IMG/7days@2x.png"  style="margin-right: 2%;width:18%;">
           <img src="IMG/payment@2x.png"  style="margin-right: 2%;width:18%;">
           <img src="IMG/support@2x.png"  style="margin-right: 2%;width: 18%;">
           <img src="IMG/express@2x.png" style="width: 18%;">
        </div>
    </div>
</div>
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
                $fes1 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 0");
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
                $fes2 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 1");
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
                $fes3 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 2");
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
                $fes4 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 3");
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
                $fes5 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 4");
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
                $fes6 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 5");
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
                $fes7 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 6");
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
                $fes8 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 7");
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
                $fes8 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 8");
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
                $fes8 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 9");
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
            <a href="category.html"> <div class="btn btn-lg btn-default SansBold" style="    bottom: -12%;
       right: 1%;padding:13px 57px;color:#dc1a52;font-size: 20px;float: right">محصولات حراجی</div></a>
        </div>
    </div>
</div>

<!----------------------------------ax1--------------------------------------------->

<!----------------------------------2 text 1------------------------------------------------->
<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
            <h1 style="text-align: center"class="h1nazarat SansBold">توضیحات محصول</h1>
        <div class="col-md-7 col-lg-7 col-sm-8 col-xs-8 divtext col-md-offset-3 col-lg-offset-3 col-sm-offset-2 col-xs-offset-2 IRANSans">
            <?php
            $query = $db::Query("select * from product  WHERE productId='$id' and product.active = 1");
            $fetch = mysqli_fetch_assoc($query);
            ?>
            <p class="mytext"><?php echo $fetch['Description']?></p>
        </div>

</div>

<!--------------------------------3cards---------------------------------------------------->

<!--------------------------------------------text 2---------------------------------------->

<!----------------------------------------ax2----------------------------------------------->

<!----------------------------------------nazarat-------------------------------------------------->
<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12" >


    <div class="container">
        <h1 class="h1nazarat SansBold">نظرات کاربران</h1>
        <br>
        <div class=" col-sm-1 col-xs-1 col-lg-1 col-md-1" style="float:none;margin: auto;background-color:#dc1a52"></div>
        <div class="col-md-7 col-lg-7 col-xs-10 col-sm-10 text-center" style=";margin: auto;float: none;padding: 20px 30px">
            <?php
            $comment = $db::Query("select * from comment,user,admin where adminId=commentAdminIdAccepted AND userId=commentUserId AND commentProductId='$id'");
            while ($fetch = mysqli_fetch_assoc($comment)){


            ?>
            <br>
            <div class="col-md-7 col-lg-7 col-xs-7 col-sm-7 IRANSans namenazar">
               <p>سه شنبه  <?php echo $db::G2J($fetch['commentRegDate'])?> ساعت <?php echo $fetch['commentRegTime']?></p>
            </div>
            <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5" style="display: flex;align-items: center;justify-content: center;align-self: center">
                <P class="IRANSans namenazar" style="margin-right: 7%"><?php echo $fetch['userName']?></P>
                <img src="IMG/Bitmap@2x.png">
            </div>
            <br><br>
            <p class="textnazarat1 IRANSans"><?php echo $fetch['commentText']?></p>
            <?php
            }
            ?>
    </div>
        <div class="alert alert-danger" id="errorrigg" style="display: none">
            tamam fild ha por she
        </div>
        <div class="alert alert-success" id="succccc" style="display: none">
            نظر با موفقیت ثبت شد
        </div>
        <div  class="col-md-5 col-xs-5 col-lg-5 col-sm-5 col-lg-offset-3 col-md-offset-3 col-xs-offset-3 col-sm-offset-3" style="padding-top:4%">
            <textarea id="comment" class="textarea IRANSans" placeholder="نظر خود را وارد نمایید"></textarea>
            <br><br>
            <?php
            if(isset($_SESSION['loginUser']) && $_SESSION['loginUser']==true) {
            $username = $_SESSION['userId'];
            $select = $db::Query("SELECT * FROM user WHERE userId='$username'");
            $row = mysqli_fetch_assoc($select);
            echo '<button type="button" onclick="submit()" class="btn btn-lg btn-default SansBold btn-sabt-nazar">ثبت نظر</button>';

             }else{
echo '<p><a href="login.php">
        ابتدا وارد شوید
    </a></p>';
            ?>
            <?php } ?>

        </div>
</div>
</div>
<script>
    function submit() {
        var comment = $("#comment").val();

        $.ajax({
            url:"request/comment.php",
            data: {
                comment:comment,
                id:'<?php echo $id;?>'
            },
            dataType:'json',
            type:'POST',
            success:function (data) {
                if (data["error"]){
                    $("#errorrigg").show("fast").html(data['MSG']);


                }else  {
                    $("#succccc").show("fast");
                }
            }
        });

    }
</script>
<!----------------------------------------mahsoolate moshabeh-------------------------------------------------->

<div class="col-md-12 hidden-xs hidden-sm col-lg-12 mycarousel" style="padding: 30px 45px 30px 45px;position: relative;">
    <br> <br>
    <div class="container">
        <h1 class="SansBold" style="color:#2d3e50;font-size: 41px;text-align: center">محصولات مشابه</h1>
        <br>
        <div class=" col-sm-1 col-xs-1 col-lg-1 col-md-1" style="float:none;margin: auto;background-color:#dc1a52;"></div>
        <br><br><br>
        <section class="center2 slider">
            <?php
            $query3 = $db::Query("SELECT * FROM product WHERE productSubCatid='$subCatId' LIMIT 10 ");
            while ($fetch = mysqli_fetch_assoc($query3)) {
                $price = $fetch['productPrice'];
                $percentageOffer = $fetch['offer'];
                $off = $price / 100 * $percentageOffer;

                $img = $fetch['productId'];
                $qu = $db::Query("SELECT * FROM gallery WHERE galleryPrId='$img' AND galleryStatus='1'");
                $r = mysqli_fetch_assoc($qu);
                ?>

                <div class="col-md-3 col-lg-3 col-xs-12 col-sm-6" style="border: 1px solid #e8e8e8;padding: 20px 0;height: 450px">
                    <a href="product.php?productId=<?php echo $fetch['productId'] ?>" class="image-holder__link">
                        <img src="admin/upload/gallery/<?php echo $r['galleryImg'] ?>.jpg" style="width: 100%">
                    </a>
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                        <h4 class="esmekalatakhfif IRANSans"><?php echo $fetch['productName'] ?></h4>
                        <?php
                        if($fetch['offer']!="0"){
                            ?>
                            <h4 class="offstyle SansBlack"><?php echo $fetch['offer']*100/$fetch["productPrice"] ?>% تخفیف</h4>
                            <?php
                        }
                        ?>
                        <h4 class="starstyle"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h4>
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">

                            <h4 class=" gheymatjadid IRANSans" style=""><?php echo @$db::toMoney($fetch["productPrice"] - $fetch["offer"]) ?> ریال  </h4>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">


                            <h4 class="card-text gheymatghadimIn IRANSans" style="margin-top: -9px;display: block">
                                <span class="gheymatghadim">
                                    <?php if($off>0) echo @$db::toMoney($price) ?>
                                </span>
                            </h4>
                        </div>
                        <div class="text-center"><a onclick="shbADD('<?php echo $fetch['productId']?>')" class="btn btn-primary IRANSans"
                                                    style="padding: 6px 28px;font-size: 13px;color: white;background-color: #dc1a52;border:1px solid #454e60;">اضافه
                                کردن به سبد خرید</a></div>
                    </div>
                </div>
                <?php
            }
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
        <h1 class="SansBold" style="color:#2d3e50;font-size:35px;text-align: center">محصولات مشابه</h1>
        <br>
        <div class=" col-sm-1 col-xs-1 col-lg-1 col-md-1" style="float:none;margin: auto;background-color:#dc1a52;"></div>
        <br><br>

        <section class="center6 slider">
            <?php
            $query3 = $db::Query("SELECT * FROM product WHERE productSubCatid='$subCatId' and product.active = 1");
            while ($fetch = mysqli_fetch_assoc($query3)) {
                $price = $fetch['productPrice'];
                $percentageOffer = $fetch['offer'];
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
                            if($fetch['offer']!="0"){
                                ?>
                                <h4 class="offstyle SansBlack"><?php echo $fetch['offer']*100/$fetch["productPrice"] ?>% تخفیف</h4>

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
                            <h4 class="card-text gheymatghadim IRANSans"> ریال <?php echo @$db::toMoney($fetch["productPrice"] - $fetch["offer"]) ?> </h4>
                            <h4 class="card-text gheymatghadimIn IRANSans" style="margin-top: -9px;display: block">
                                <span class="gheymatghadim">
                                    <?php echo @$db::toMoney($fetch["productPrice"]) ?>
                                </span>
                            </h4>
                        </div>
                        <!--<div class="buttonPrice">
                            <button onclick="shbADD('<?php /*echo $fetch['productId']*/?>')">اضافه کردن به سبد خرید</button>
                        </div>-->
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
    function center4Prev() {
        $(".center4").slick('slickPrev');

    }    function center4Next() {
        $(".center4").slick('slickNext');

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

        $(".center6").slick({

            infinite: true,
            slidesToShow:1,
            slidesToScroll:1
        });


    });
</script>
<script src="JS/slider.js" type="text/javascript"></script>
<!--    <script src="js/jquery.js"></script>-->
<script src="slider/js/popper.js"></script>
<script src="slider/js/bootstrap.js"></script>
<script src="slider/js/migrate.js"></script>
<script src="slider/js/slick.js"></script>
<script type="text/javascript">
    $(document).on('ready', function() {

        $(".center4").slick({

            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 2
        });


    });
</script>
<!------------------------------------------------------------>

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
            $query3 = $db::Query("SELECT * FROM specialoffer,product WHERE specialOfferProductId=productId and product.active = 1 order by productId limit 4 offset 0");
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

                                <br>
                                <div class="col-xs-12 col-sm-4 product-description__price">
                                    <?php echo @$db::toMoney($fetch['productPrice'] - $fetch['offer']) ?>
                                </div>
                                <div class="col-xs-12 col-sm-8 product-description__category secondary-text"><?php echo $fetch['Description']?>
                                </div>
                                <br>
                            </div>

                            <!-- divider -->
                            <hr/>

                            <!-- sizes -->
                            <div class="sizes-wrapper SansBold">
                                <b>Sizes</b>
                                <br/>
                                <span class="secondary-text text-uppercase">
							<ul class="list-inline">
								<li>xs,</li>
								<li>s,</li>
								<li>sm,</li>
								<li>m,</li>
								<li>l,</li>
								<li>xl,</li>
								<li>xxl</li>
							</ul>
						</span>
                            </div>

                            <!-- colors -->
                            <div class="color-wrapper">
                                <b>Colors</b>
                                <br/>
                                <ul class="list-inline color-list">
                                    <li class="color-list__item color-list__item--red"></li>
                                    <li class="color-list__item color-list__item--blue"></li>
                                    <li class="color-list__item color-list__item--green"></li>
                                    <li class="color-list__item color-list__item--orange"></li>
                                    <li class="color-list__item color-list__item--purple"></li>
                                </ul>
                            </div>
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
<!-----------------------------------app phonix------------------------------------------->
<div class="container-fluid" id="nomarginAndpadding1">
    <div class="col-xs-12 col-sm-12 col-md-12 col-xs-12" id="nomarginAndpadding2">
        <div class="allAppPhonix">
            <div class="imgAppPhonix">
                <img src="IMG/mobile.png" >
            </div>
            <div class="downloadAppPhonix">
                <div class="SansBold  tittleApp"><h1>دانلود اپ فونیکس</h1></div>
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

</body>
</html>
