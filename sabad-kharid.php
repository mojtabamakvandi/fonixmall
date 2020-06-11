<?php
include "head.php";
?>
    <title>سبد خرید</title>
</head>
<div>
<?php
include "header.php";
?>
<!---------------------------------------سبد خرید-------------------------------------------->
    <?php
    $SELECT = $db::Query("SELECT * FROM productshb,shoppingbasket,product WHERE SHBid = PSHBSHBId AND productId=productshb.PSHBPrId AND shoppingbasket.SHBPay='0' AND (SHBUserId='$shbUserId' OR SHBGuest='$shbUserId')",dataBase::$NUM_ROW);
    if($SELECT>0){
    ?>

<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align: center;padding:30px">
    <h1 class="h1dastebandi SansBold">سبد خرید</h1>
    <br>
    <div class=" col-sm-1 col-xs-1 col-lg-1 col-md-1" style="float:none;margin: auto;background-color:#dc1a52"></div>
    <br><br>
    <div class="hidden-lg hidden-md col-xs-12 col-sm-12">
        <div class="col-md-12 col-lg-12 col-xs-12 col-lg-12">
            <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                <?php
                    $laster=0;
                    if (isset($_SESSION['userId']) && $_SESSION['userId'] != '') {
                        $shbUserId = $_SESSION['userId'];
                    } else if (isset($_SESSION['GustId']) && $_SESSION['GustId'] != '') {
                        $shbUserId = $_SESSION['GustId'];
                    } else {
                        $shbUserId = "";
                    }
                    if($shbUserId!=""){
                    $SELECT = $db::Query("SELECT * FROM productshb,shoppingbasket,product where SHBid = PSHBSHBId  AND productId=productshb.PSHBPrId AND shoppingbasket.SHBPay='0' AND (SHBUserId='$shbUserId' OR SHBGuest='$shbUserId')");
                    while ($rowPr = mysqli_fetch_assoc($SELECT)) {
                    $price = $rowPr['productPrice'];
                    $_SESSION['SHBid']=$rowPr['SHBid'];
                    $Offer = $rowPr['offer'];
                    $off = $price / 100 * $Offer;
                    $idProduct = $rowPr['productId'];
                    $selectGallery = $db::Query("SELECT * FROM gallery where galleryPrId='$idProduct' and galleryStatus='1'", $db::$RESULT_ARRAY);
                ?>
                <div class="hidden-md hidden-lg" style="margin-top: 20px">
                <img src="admin/upload/gallery/<?php echo $selectGallery['galleryImg'] ?>.jpg">
                <p class="SansBold text-center" style="padding-top: 10px"><?php echo $rowPr['productName']?></p>
                <span class="SansLight">قیمت : <?php echo @$db::toMoney($rowPr['productPrice']);?> تومان</span>
                <p class="SansBold text-center" style="padding-top: 10px"> تعداد <?php echo $rowPr['PSHBCount']?> عدد </p>
                <div style="text-align: center;">
                    <div type="button" class="nexNum" id="divnex"
                         onclick="changePluss('<?php echo $rowPr['productId'] ?>')"
                         style="width:30px;height:30px;border-radius:3px;background-color: #dc1a52;float: right">
                        <span>+</span>
                    </div>
                    <input id="pr<?php echo $rowPr['productId'] ?>" type="number" step="1" max="99" min="1"
                           value="<?php echo $rowPr['PSHBCount'] ?>" title="Qty" class="qty btnnumbrik SansBold"
                           size="4" disabled="" style="font-size:16px;color: #dc1a52;    position: relative;
    top: 5px;
    right: 3px;">
                    <div type="button" value="-" class="prevNum" id="divprev"
                         onclick="changePluss2('<?php echo $rowPr['productId'] ?>')"
                         style="width:30px;height:30px;border-radius: 3px;background-color: #dc1a52;float: left;">
                        <span>-</span>

                    </div>
                </div>
                </div>
            <?php
            $laster += $rowPr['productPrice'] * $rowPr['PSHBCount'] - $rowPr['offer'] * $rowPr['PSHBCount'];

            }
            ?>

        </div>
    </div>
    </div>

    <div style="" class="hidden-xs hidden-sm">
        <table align="right" style="direction: rtl;border: 1px solid #f8f8f8;width: 100%" class="">
            <tbody>
            <tr class="sabad-kharid IRANSans" style="background-color: #dc1a52;">
                <th>#</th>
    </div>
    <th>عکس محصول</th>
    <th>نام محصول</th>

<th>تعداد محصول</th></div>
<th>قیمت واحد</th></div>
<th>قیمت</th></div>
<th>تخفیف</th></div>
<th>قیمت نهایی</th></div>
<th>حذف</th></div>
</tr>
<?php
$laster = 0;


if (isset($_SESSION['userId']) && $_SESSION['userId'] != '') {
    $shbUserId = $_SESSION['userId'];
} else if (isset($_SESSION['GustId']) && $_SESSION['GustId'] != '') {
    $shbUserId = $_SESSION['GustId'];
} else {
    $shbUserId = "";
}
if ($shbUserId != ""){
$SELECT = $db::Query("SELECT * FROM productshb,shoppingbasket,product WHERE SHBid = PSHBSHBId AND productId=productshb.PSHBPrId AND shoppingbasket.SHBPay='0' AND (SHBUserId='$shbUserId' OR SHBGuest='$shbUserId')");

$i = 0;
while ($rowPr = mysqli_fetch_assoc($SELECT)) {
    $i++;
    $price = $rowPr['productPrice'];
    $Offer = $rowPr['offer'];
    $off = $price / 100 * $Offer;
?>

<tr class="sabad-kharid1 IRANSans">
    <th><?php echo $i ?></th>
    <th class="picsabad">
        <?php
        $idProduct = $rowPr['productId'];
        $selectGallery = $db::Query("SELECT * FROM gallery where galleryPrId='$idProduct' and galleryStatus='1'", $db::$RESULT_ARRAY);
        ?>
        <a href="product.php?productId=<?php echo $rowPr['productId'] ?>">
            <img src="admin/upload/gallery/<?php echo $selectGallery['galleryImg'] ?>.jpg" style="height: 70px;"></a>
    </th>
    <th>
        <p><?php echo $rowPr['productName'] ?></p>
    </th>
    <th>
        <div style="text-align: center;">
            <div type="button" class="nexNum" id="divnex"
                 onclick="changePluss('<?php echo $rowPr['productId'] ?>')"
                 style="width:30px;height:30px;border-radius:3px;background-color: #dc1a52;float: right">
                <span>+</span>
            </div>
            <input id="pr<?php echo $rowPr['productId'] ?>" type="number" step="1" max="99" min="1"
                   value="<?php echo $rowPr['PSHBCount'] ?>" title="Qty" class="qty btnnumbrik SansBold"
                   size="4" disabled="" style="font-size:16px;color: #dc1a52;    position: relative;
    top: 5px;
    right: 3px;">
            <div type="button" value="-" class="prevNum" id="divprev"
                 onclick="changePluss2('<?php echo $rowPr['productId'] ?>')"
                 style="width:30px;height:30px;border-radius: 3px;background-color: #dc1a52;float: left;">
                <span>-</span>
            </div>
        </div>
    </th>
    <th><?php echo @$db::toMoney($price) ?></th>
    <th><?php echo @$db::toMoney($rowPr['productPrice'] * $rowPr['PSHBCount']) ?></th>
    <th><?php echo @$db::toMoney($rowPr['offer'] * $rowPr['PSHBCount']) ?></th>
    <th><?php echo @$db::toMoney($rowPr['productPrice'] * $rowPr['PSHBCount'] - $rowPr['offer'] * $rowPr['PSHBCount']); ?></th>
    <th class="vImgPuser"><img src="IMG/clearbanafsh@2x.png" alt="" width="20%" id="im"
                               onclick="pak('<?php echo $rowPr['productId'] ?>')"></th>
    <br/>
    <?php
    $laster += $rowPr['productPrice'] * $rowPr['PSHBCount'] - $rowPr['offer'] * $rowPr['PSHBCount'];
    }
    }
    } ?>
        </tr>

        <!--<tr style="background-color:#f3f3f3;height: 70px">
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th style="    text-align: center;
    font-size: 20px;">مبلغ </th>
            <th style="    text-align: center;
    font-size: 20px;" id="pt1"><?php /*echo @$db::toMoney($laster) */?></th>
            <th></th>
        </tr>-->

        <!--<tr style="background-color:#f3f3f3;height: 70px">
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th style="    text-align: center;
    font-size: 20px;">درصد تخفیف</th>
            <th style="    text-align: center;
    font-size: 20px;" id="percent">0</th>
            <th></th>
        </tr>
    <tr style="background-color:#f3f3f3;height: 70px">
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th style="    text-align: center;
    font-size: 20px;">مبلغ تخفیف</th>
            <th style="    text-align: center;
    font-size: 20px;" id="priceOffer">0</th>
            <th></th>
        </tr>-->

        <tr style="background-color:#f3f3f3;height: 70px">
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th style="    text-align: center;
    font-size: 20px;color: red;">مبلغ قابل پرداخت</th>
            <th style="    text-align: center;
    font-size: 20px;color: red" id="pt"><?php echo @$db::toMoney($laster) ?></th>
            <th></th>
        </tr>

        </tbody>
</table>


</div>

    <script>
        // increase td
        function changePluss(id) {
            var pr = $("#pr" + id).val();
            pr++;
            $.ajax({
                url: 'request/shoppingCard.php',
                data: {
                    PrId: id,
                    count: pr
                },
                dataType: 'json',
                type: 'POST',
                success: function (data) {
                    location.reload();
                }
            });
        }
        // Decrese td
        function changePluss2(id) {
            var pr = $("#pr" + id).val();
            pr--;
            $.ajax({
                url: 'request/shoppingCard.php',
                data: {
                    PrId: id,
                    count: pr
                },
                dataType: 'json',
                type: 'POST',
                success: function (data) {
                    location.reload();
                }
            });
        }
        // Delete from Cart
        function pak(id) {

            $.ajax({
                url: 'request/shoppingCard.php',
                data: {
                    PrId: id,
                    count: 'delete'
                },
                dataType: 'json',
                type: 'POST',
                success: function (data) {
                    location.reload();
                }
            });
        }



    </script>
</div>
<div class="container divOffer">
    <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
        <div class="alert alert-danger " style="display: none;" id="error">
        </div>
        <input type="text" placeholder="کد تخفیف" class="offerCode" id="offerCode">
    </div>
    <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12 btn-submit-offer-div">
        <span type="button" class="btn btn-success btn-submit-offer-code" onclick="submitOfferCode()">اعمال</span>
    </div>
</div>
<script>
    function formatMoney(amount, decimalCount = 0, decimal = "", thousands = ",") {
        try {
            decimalCount = Math.abs(decimalCount);
            decimalCount = isNaN(decimalCount) ? 2 : decimalCount;
            const negativeSign = amount < 0 ? "-" : "";
            let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
            let j = (i.length > 3) ? i.length % 3 : 0;
            return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
        } catch (e) {
            console.log(e)
        }
    };

    function submitOfferCode() {
        var offerCode = $("#offerCode").val();
        $.ajax({
            url: 'request/offerCode.php',
            data: {
                offerCode:offerCode,
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                var price = parseInt($("#pt").html().replace(/,/g,""));
                if(data["error"]==false){
                    $("#percent").html(data['pr']+" % ");
                    var percentage = parseInt(data['pr']);
                    var lastPrice = price - (price/100*percentage);
                    $("#pt").html(formatMoney(lastPrice));
                    $("#priceOffer").html(formatMoney(price/100*percentage));
                    $(".divOffer").hide();
                }if (data['error']) {
                    $("#error").show("fast").html(data['MSG']); {
                    $("#offerCode").css("border","2px solid red");
                    }
                }
            }
        });
    }
</script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script>
    var container = document.getElementById('image-container');
    function change_img(image) {
        container.src = image.src;
    }
    // plusss
    function changePluss33(id, operator) {
        if (operator == '+') {
            $(`#${id}`).next().val(parseInt($(`#${id}`).next().val()) + 1);
        } else {
            if ($(`#${id}`).prev().val() <= 1) {
                $(`#${id}`).parent().parent().parent().hide();
                $(`#${id}`).parent().parent().parent().parent().next().hide();
            } else {
                $(`#${id}`).prev().val(parseInt($(`#${id}`).prev().val()) - 1);
            }
        }
    }
    // dispalynone
    function changeDisplay(id) {
        if ($id = true) {
            $(`#${id}`).parent().parent().hide();
        } else {
            $(`#${id}`).parent().css('display', 'block');
        }
    }
</script>
<!-------------------------------------مشخصات آدرس شما----------------------------------------->
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align: center;padding:30px">
    <br>
    <div class="alert alert-danger" id="errorrigg" style="display: none">
        tamam fild ha por she
    </div>
    <h1 class="h1dastebandi SansBold">مشخصات آدرس شما</h1>
    <br>
    <div class=" col-sm-1 col-xs-1 col-lg-1 col-md-1" style="float:none;margin: auto;background-color:#dc1a52"></div>
    <br><br><br>
    <?php
    $select = $db::Query("SELECT * FROM address where addressUserId='$shbUserId'");
    if(mysqli_num_rows($select)>0){
        ?>
    <div class="
    col-lg-offset-4
    col-md-offset-4
    col-xs-offset-4
    col-sm-offset-4
    col-md-4 col-xs-4 col-sm-4 col-lg-4 IRANSans " style="font-size: 17px;margin-bottom: 30px">
            <select dir="rtl" id="adr" class="inputmoshakhasat pull-right" onchange="getAddreses()">
                <option disabled selected>
                    انتخاب آدرس
                </option>
                <?php
                while ($row = mysqli_fetch_assoc($select)) {
                    ?>
                    <option value="<?php echo $row['addressId'] ?>"><?php echo $row['addressText'] ?></option>
                    <?php
                }
                ?>
            </select>
            <div class="col-xs-4 col-sm-4 col-lg-4 col-md-4 pull-left" >
                <span  onclick="$('#submitAddress').show()" class="btn btn-success pull-left" style="position: relative;bottom: 6px;" value="">ثبت آدرس جدید</span>
            </div>
    </div>
    <?php
    }
    if(!isset($_SESSION['userId'])){
    ?>

        <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
            <a href="login.php">
                <p type="button" class="btn btn-success" style="font-family:unset;position: relative;bottom: 6px;"
                   value=" ">
                    برای خرید محصول ابتدا وارد شوید
                </p>

            </a>
        </div>
    </div>
<?php
}
    ?>
    <script>
        function getAddreses() {
            var adr = $("#adr").val();
            $.ajax({
                url: "request/getAdres.php",
                data: {
                    addresId: adr
                },
                dataType: 'json',
                type: 'POST',
                success: function (data) {
                    if (!data['error']) {
                        $("#dis1").show();
                        $("#dis3").show();
                        $("#cityName").html(data['cityName']);
                        $("#provinceName").html(data['provinceName']);
                        $("#addressText").html(data['addressText']);
                        $("#postCode").html(data['postCode']);
                    }
                }
            });
        }
    </script>
    <?php
    if(isset($_SESSION['userId'])){
    ?>
    <div id="submitAddress" <?php if(mysqli_num_rows($select)>0) echo 'style="display:none"'?>  class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
        <div class="container">
            <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4 IRANSans" style="font-size: 17px;">
                <div class="col-xs-8 col-sm-8 col-lg-8 col-md-8">
                    <input id="postCodeText" type="number" class="inputmoshakhasat">
                </div>
                <div class="col-xs-4 col-sm-4 col-lg-4 col-md-4">
                    <p>کد پستی</p>
                </div>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4 IRANSans" style="font-size: 17px;">
                <div class="col-xs-8 col-sm-8 col-lg-8 col-md-8">
                    <select id="city" class="inputmoshakhasat">
                        <option selected disabled> شهر خود را انتخاب کنید</option>
                        <option disabled>ابتدا استان مورد نظر را انتخاب کنید</option>
                    </select>
                </div>
                <div class="col-xs-4 col-sm-4 col-lg-4 col-md-4">
                    <p>شهر</p>
                </div>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4 IRANSans" style="font-size: 17px;">
                <div class="col-xs-8 col-sm-8 col-lg-8 col-md-8">
                    <select id="province" onchange="getCity()" class="inputmoshakhasat">
                        <option selected disabled>استان خود را انتخاب کنید</option>
                        <?php
                        $select2 = $db::Query("SELECT * FROM province");
                        while ($fetch = mysqli_fetch_assoc($select2)) {
                            ?>
                            <option value="<?php echo $fetch['provinceId'] ?>" ><?php echo $fetch['provinceName'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-xs-4 col-sm-4 col-lg-4 col-md-4">
                    <p>استان</p>
                </div>
            </div>
            <script>
                function getCity() {
                    var province = $("#province").val();
                    $.ajax({
                        url: "request/getCity.php",
                        data: {
                            provinceId: province
                        },
                        dataType: 'json',
                        type: 'POST',
                        success: function (data) {
                            if (!data['error']) {
                                $("#city").html(" <option selected disabled>استان خود را انتخاب کنید</option>");
                                for (var i = 0; i < data['city'].length; i++) {
                                    $("#city").append('<option value="' + data['city'][i]['id'] + '">' + data['city'][i]['name'] + '</option>');
                                }
                            }
                        }
                    });
                }
            </script>
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12  IRANSans"
                 style="    direction: rtl;
    text-align: right;
    float: right;
    margin-right: 23px;
    font-size: 17px;
    margin-top: 20px;">

                <div class="col-xs-11 col-sm-11 col-lg-11 col-md-11">

                    <textarea id="ady" type="text"
                           style="width:98%;background-color: #f3f3f3;border: 0;height: 100px;padding: 2%"></textarea>
                </div>
                <div class="col-xs-1 col-sm-1 col-lg-1 col-md-1">

                    <p>آدرس</p>
                </div>
            </div>
            <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                    <span class="btn btn-primary"
                        style="margin-top: 20px" onclick="submit()" value="">
                        ثبت آدرس جدید
            </div>
                </div>
        </div>
    </div>

</div>
<?php
}
?>



<script>
    function submit() {
        var postCode = $("#postCodeText").val();
        var province = $("#province").val();
        var city = $("#city").val();
        var ady = $("#ady").val();


        $.ajax({
            url: "request/addAdres.php",
            data: {

                postCode: postCode,
                province: province,
                city: city,
                ady: ady,

            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                if (data["error"]) {
                    $("#errorrigg").show("fast").html(data['MSG']);
                } else {
                    $("#dis1").show();
                    $("#dis3").show();

                    $("#cityName").html(data['city']);
                    $("#provinceName").html(data['province']);
                    $("#addressText").html(ady);

                    $("#postCode").html(postCode);
                }
            }
        });

    }
</script>

<!------------------------------------------------تاییدیه سبد خرید----------------------------------------------->
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align: center;padding:30px;display: none" id="dis1">
    <h1 class="h1dastebandi SansBold">تاییدیه سبد خرید</h1>
    <br>

    <div class=" col-sm-1 col-xs-1 col-lg-1 col-md-1" style="float:none;margin: auto;background-color:#dc1a52"></div>
    <br><br>
    <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
        <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12 IRANSans"
             style="background-color: #dc1a52;height: 60px;color: white;font-size:25px">
            <p style="margin-top: 14px">اطلاعات شخصی</p>
        </div>

        <div class="col-md-4 hidden-sm hidden-xs col-lg-4 IRANSans etelaat-shakhsi-item">
            <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                <p id="postCode"></p>
            </div>
            <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                <p>کد پستی</p>
            </div>
        </div>
        <div class="col-md-4 col-xs-6 col-sm-6 col-lg-4 IRANSans etelaat-shakhsi-item"
             style="border-right:1px solid #e7e7e7;border-left: 1px solid #e7e7e7;">
            <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                <p id="cityName"></p>
            </div>
            <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                <p>شهر</p>
            </div>
        </div>
        <div class="col-md-4 col-xs-6 col-sm-6 col-lg-4 IRANSans etelaat-shakhsi-item">
            <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                <p id="provinceName"></p>
            </div>
            <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                <p>استان</p>
            </div>
        </div>


        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 IRANSans"
             style="background-color:#f3f3f3;border-top: 1px solid #e7e7e7;text-align: right;padding-top: 17px;padding-bottom:40px;padding-right:92px;font-size:17px;">
            <p>آدرس</p>
            <p id="addressText" type="text"
               style="border: 0;background-color:#f3f3f3;width: 100%;text-align: right;direction: rtl"></p>
        </div>

    </div>
</div>
<!---------------------------------------محصولات سبد-------------------------------------------->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script>
    var container = document.getElementById('image-container');

    function change_img(image) {
        container.src = image.src;
    }

    // plusss


</script>
<!---------------------------------------------پرداخت-------------------------------------------------->
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 text-center" style="display: none" id="dis3">
    <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6 col-xs-offset-3 col-md-offset-3 col-lg-offset-3 col-sm-offset-3 IRANSans pardakht text-center">
        <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6"  onclick="payClick()" style="border-right: 3px solid;cursor: pointer">
            <input type="radio" name="pardakht" value="" style="display: none" >
            <img id="pay" src="IMG/checkBox.png" style="width: 30px">

            پرداخت درب منزل
        </div>

        <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6" style="cursor: pointer" onclick="onlineClick()">
            <img id="online" src="IMG/box.png"  style="width: 30px">
            <input type="radio" name="pardakht" value="" style="display: none">پرداخت آنلاین
        </div>
    </div>

    <script>
        function onlineClick() {
            $("#online").attr("src","IMG/checkBox.png");
            $("#pay").attr("src","IMG/box.png");
        }
        function payClick() {
            $("#pay").attr("src","IMG/checkBox.png");
            $("#online").attr("src","IMG/box.png");

        }

    </script>

    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 text-center">

        <a href="#" onclick="gotoBank()">

        <p type="button"  class="btn btn-primary SansBold"
           style="
           padding: 15px 50px;
           margin-bottom: 20px;
           font-size: 20px;
           margin-top: 20px
"
           id="dis4">
            تایید نهایی و پرداخت
        </p>
        </a>

    </div>
</div>
<script>
    function gotoBank() {
        var a = $("#pt").html().replace(/,/g,"");
        var cost = a.substring(0, a.length-1);
        window.location.href="zarinpal.php?price="+a;
    }
</script>
<?php } else { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <h1 class="alert alert-warning">سبد خرید شما خالی است</h1>
                <a href="/">بازگشت به صفحه اصلی فروشگاه</a>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
            </div>
        </div>
    </div>

<?php } ?>
<!---------------------------------------footer------------------------------------------------>
<?php
include "footer.php";
?><!-------------------------------------end footer------------------------------------------------------>
</body>
</html>
