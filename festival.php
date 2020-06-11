<?php
include "head.php";
?>
</head>
<body>
<?php
include "header.php";

$id = '';
$_GET = $db::RealString($_GET);
$id = $_GET['festivalId'];
?>
<!----------------------------------------------------------------->
<!-------------------------------دسته بندی--------------------------------->

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="margin-top:3%;"><!--Pictures list / item list-->
    <div class="container">
        <div class="mydiv">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="display: block;margin-bottom:60px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: right">
                    <?php
                    $ca = $db::Query("SELECT * FROM festival WHERE festivalId='$id'");
                    $fetch = mysqli_fetch_assoc($ca)
                    ?>
                    <h3 class="IRANSans" style="font-size:21px"> نتیجه جستوجوی شما :<span class="IRANSans" style="margin-right: 2%;color:#dc1a52 "><?php echo $fetch['festivalName']?></span></h3>
                    <br>
                    <!--<p class="IRANSans" style="font-size: 14px">-->
                    <!--مرتب سازی <button style="background-color: transparent;border: none;width: 7%"><img src="IMG/Path%204%20Copy%204.png"></button>-->
                    <!--</p>-->

                </div>
                <!-----1----->
                <?php
                $cat = $db::Query("SELECT * FROM festival,festivalproduct,product WHERE festivalId='$id' and product.active = true AND fePrFestivalId=festivalId AND fePrProductId=productId");
                while ($fetch = mysqli_fetch_assoc($cat)){
                    $price3 = $fetch['productPrice'];
                    $offer = $fetch['festivalOfferPercentage'];
                    $off3 = $price3/100*$offer;

                    $img = $fetch['productId'];
                    $qu = $db::Query("SELECT * FROM gallery WHERE galleryPrId='$img'");
                    $r = mysqli_fetch_assoc($qu);

                    ?>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-6" style="text-align: center;padding-top: 50px;position: relative">

                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 stylemycard">

                            <a href="product.php?productId=<?php echo $fetch['productId'] ?>">

                            <img src="admin/upload/gallery/<?php echo $r['galleryImg']?>.jpg" style="width: 100%">
                                                        </a>

                            <div class="offtag-search"><h1 class="IRANSans darsad-takhfif"><?php echo $offer?></h1><h1 class="IRANSans takhfif-search">تخفیف</h1></div>
                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding: 10px 25px">
                                <h4 class="IRANSans" style="float: right;margin-top: 14px;"><?php echo $fetch['productName']?></h4>
                                <h4 class="starstyle-search" style=";margin-bottom: 0"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h4>
                                <br><br>
                                <h4 class="SansBold gheymatjadid-search"> <?php echo @$db::toMoney($price3 - $off3)?> ریال </h4>

                                <h4 class="card-text IRANSans gheymatghadim-search"><?php if($off3>0) echo @$db::toMoney($price3)?></h4>
                                <br><br><br>
                                <div class="text-center"><a class="btn btn-primary  SansBold sabad-afzudan-psearch" >اضافه کردن به سبد خرید</a></div> </div>

                        </div>

                    </div>
                    <?php
                }
                ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border-bottom: 2px solid #AFAFAF;margin-top:20px"></div>
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
</html>
