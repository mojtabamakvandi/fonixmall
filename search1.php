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
if(isset($_GET['subId']) && $_GET['subId']!=''){
    $id = '';
    $_GET = $db::RealString($_GET);
    $id = $_GET['subId'];
    $model = "subId";
}else
    if(isset($_GET['catId']) && $_GET['catId']!=''){
        $id = '';
        $_GET = $db::RealString($_GET);
        $id = $_GET['catId'];
        $model = "catId";
    }else if(isset($_GET['name']) && $_GET['name']!=''){
        $id = '';
        $_GET = $db::RealString($_GET);
        $id = $_GET['name'];
        $model = "name";
    }
?>
<!-------------------------------دسته بندی--------------------------------->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="margin-top:3%;">
    <div class="container">
        <div class="mydiv">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="display: block">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: right">
                <?php
               if($model=="subId"){
                     $cat = $db::Query("SELECT * FROM product WHERE productSubCatid='$id' and product.active = 1");

                     $subCatAndCatName = $db::Query("SELECT * FROM subcategory,category where category.catId = subcategory.subCatId AND subId='$id'");
                     $rowQ = mysqli_fetch_assoc($subCatAndCatName);
                     ?>
                        <h3 class="IRANSans" style="font-size:21px"> دسته بندی: <span class="IRANSans" style="margin-right: 2%;color:#dc1a52">
                            <?php echo $rowQ['catName']?> \ <?php echo $rowQ['subName']?>
                            </span>
                        </h3>
                     <?php
                        }
                            else if($model=="catId")
                            {
                                $cat = $db::Query("SELECT * FROM product,subcategory,category where category.catId='$id'  and product.active = 1 AND category.catId = subcategory.subCatId AND product.productSubCatid=subId ");
                                $catName = $db::Query("SELECT * FROM category where category.catId = '$id'");
                                $rowQ2 = mysqli_fetch_assoc($catName);
                     ?>
                        <h3 class="IRANSans" style="font-size:21px"> دسته بندی: <span class="IRANSans" style="margin-right: 2%;color:#dc1a52
                                     ">
                            <?php echo $rowQ2['catName']?>
                            </span>
                        </h3>
                     <?php
                }else if($model=="name"){$cat = $db::Query("SELECT * FROM product WHERE productName LIKE'%$id%' and product.active = 1");?>
 <h3 class="IRANSans" style="font-size:21px"> نتایج جستجو: <span class="IRANSans" style="margin-right: 2%;color:#dc1a52
                                     ">
                                         <?php echo $id?>
                                         </span></h3>
                                <?php
                }
                ?>
                <br/>
            </div>
            <?php


            while ($fetch = mysqli_fetch_assoc($cat)){
            $price3 = $fetch['productPrice'];
            $offer = $fetch['offer'];
            if($offer>0){
                $off3 = $price3/100*$offer;
            }else{
                $off3 = $offer;
            }


            $img = $fetch['productId'];
            $qu = $db::Query("SELECT * FROM gallery WHERE galleryPrId='$img'");
            $r = mysqli_fetch_assoc($qu);


            ?>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12" style="    margin-bottom: 21px;text-align: center;padding-top: 50px;position: relative">

                   <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 stylemycard">
                       <a href="product.php?productId=<?php echo $fetch['productId']?>">
                            <img src="admin/upload/gallery/<?php echo $r['galleryImg']?>.jpg" style="width: 100%">
                        </a>
                       <?php
                        if($offer!="0"){
                            ?>
                            <div class="offtag-search"><h1 class="IRANSans darsad-takhfif"><?php echo $offer?>%</h1><h1 class="IRANSans takhfif-search">تخفیف</h1></div>

                            <?php
                        }
                       ?>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding: 10px 25px">
                    <h4 class="IRANSans" style="float: right;margin-top: 14px;width: 100%"><?php echo $fetch['productName']?></h4>
                    <br><br>
                    <h4 class="SansBold gheymatjadid-search"> <?php echo @$db::toMoney($price3 - $off3)?> ریال </h4>
                    <h4 class="card-text IRANSans gheymatghadim-search"><?php if($off3>0) echo @$db::toMoney($price3)?></h4>
                    <br><br><br>
                    <div class="text-center"><a  onclick="shbADD('<?php echo $fetch['productId']?>')" class="btn btn-primary  SansBold sabad-afzudan-psearch" >اضافه کردن به سبد خرید</a></div> </div>
                   </div>
            </div>
                <?php
            }
            ?>
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
                        }
                    });
                }
            </script>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border-bottom: 2px solid #AFAFAF"></div>
        </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top: 11%;display: block" id="noMargin">
                <div class="row">
                    <div id="widthMax100">
                        <?php
                         if($model=="catId"){

                        ?>
                        <p class="SansBold" style="direction: rtl;text-align: right;font-size:20px">دسته بندی</p>
                        <div id="mmDKhosraviy">
                            <script>
                                $(".open-close1").click();
                            </script>
                            <div class="drop-down5">
                                <ul class="drop-down-list5 IRANSans" id="drop-down-list5" dir="rtl" style="overflow: visible;display: block;list-style-type: none;padding-right: 0;">
                                    <?php
                                    $i = 1;
                                    $caa = $db::Query("SELECT * FROM subcategory WHERE  subCatId='$id'");
                                    while ($fetch = mysqli_fetch_assoc($caa)){
                                    ?>
                                    <li class="classli">
                                        <input type="checkbox" class="checkbox1" id="<?php echo $fetch['subId'] ?>" value="<?php echo $fetch['subId'] ?>">
                                        <label for="<?php echo $fetch['subId'] ?>" class="checkbox-label1"><?php echo $fetch['subName']?>
                                        </label>
                                    </li>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <!--    end-->
                        <br>
                        <br>
                    </div>
                    <br><br><br>
                    <button class="IRANSans btn-emal-filter btn btn-success btn-lg btn-block" style="height: 50px;border-radius: 0;box-shadow: 10px 10px 20px grey;" id="filter" onclick=""> اعمال فیلتر</button>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
    </div>
</div>
<!-------------------------------footer-------------------------------------------->
<?php
include "footer.php";
?>
<style>
    @media  (max-width: 996px){
        #widthMax100{
            width: 100%!important;
        }
        #widthMax100>p{
            font-size: 20px;
            text-align: center!important;
            margin-bottom: 2%;
        }
        #noMargin{
            margin: 0!important;
        }
    }
    @media (max-width: 996px){
        #mmDKhosraviy {
            width: 100%!important;
            display: grid!important;
            align-items: center!important;
            justify-content: center!important;
            grid-template-columns: repeat(1,100%)!important;
            justify-items: center;
            align-content: center;
        }
        .drop-arrow5{
            position: relative!important;
            top: -92%!important;
        }
        .drop-down5 .drop-arrow5::after {
            position: absolute;
            content: '\f0d7';
            right: 0!important;
            color: #8d9097;
            font-family: "FontAwesome";
            bottom: 0%;
        }
    .drop-down5{
        display: grid;
        justify-content: center;
    }}
</style>
<!-------------------------------------end footer------------------------------------------------------>
</body>
<script src="JS/jquery.mobile.custom.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="JS/rSlider.min.js.js"></script>
<script src="JS/page3.js"></script>

<script>
    function submit() {
        var subcats = $("#menuName").val();
        $.ajax({
            url:"request/filter.php",
            data:{
                subcats:subcats
            },
            dataType:"json",
            type:"POST",
            success:function (data) {
                if (data['error']) {
                    $("#errorrigg").show("fast").html(data['MSG']);
                }
                if(data['ddd']) {
                    $("#succccc").show("fast");
                }
            }
        });
    }
    function filter(arr) {

    }
</script>
</html>
