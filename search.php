<?php
include "head.php";
?>
<style>
    #loading
    {
        text-align:center;
        background: url('IMG/loader.gif') no-repeat center;
        height: 150px;
    }
</style>
<link href="JS/skins/square/blue.css" rel="stylesheet">
</head>
<div>
<div class='customAlert' style="display: none">
    <p class='message'>
        محصول با موفقیت به سبد خرید افزوده شد<i class="fas fa-check-circle" style="margin-left: 10px;position: relative;top: 2px;"></i>
    </p>
</div>
<?php
include "header.php";
// for subcategory
if(isset($_GET['subId']) && $_GET['subId']!=''){
    $id = '';
    $_GET = $db::RealString($_GET);
    $id = $_GET['subId'];
    $model = "subId";
// for category
} else if(isset($_GET['catId']) && $_GET['catId']!=''){
    $id = '';
    $_GET = $db::RealString($_GET);
    $id = $_GET['catId'];
    $model = "catId";
// for product name
} else if(isset($_GET['name']) && $_GET['name']!=''){
        $id = '';
        $_GET = $db::RealString($_GET);
        $id = $_GET['name'];
        $model = "name";
    }
?>

<!-------------------------------دسته بندی--------------------------------->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="container-fluid">
        <div class="mydiv">
        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" style="display: block">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: right">
                <?php
                if($model=="subId")
                {
                     $cat = $db::Query("SELECT * FROM product WHERE productSubCatid='$id' and product.active = 1");
                     $subCatAndCatName = $db::Query("SELECT * FROM subcategory,category where category.catId = subcategory.subCatId AND subId='$id'");
                     $rowQ = mysqli_fetch_assoc($subCatAndCatName);
                ?>
                <h3 class="IRANSans" style="font-size:21px">دسته بندی:
                     <span class="IRANSans" style="margin-right: 2%;color:#dc1a52"><?php echo $rowQ['catName']?> \ <?php echo $rowQ['subName']?></span>
                </h3>
                <?php
                }
                else if($model=="catId")
                {
                    $cat = $db::Query("SELECT * FROM product,subcategory,category where category.catId='$id'  and product.active = 1 AND category.catId = subcategory.subCatId AND product.productSubCatid=subId");
                    $catName = $db::Query("SELECT * FROM category where category.catId = '$id'");
                    $rowQ2 = mysqli_fetch_assoc($catName);
                ?>
                <h3 class="IRANSans" style="font-size:21px"> دسته بندی:
                    <span class="IRANSans" style="margin-right: 2%;color:#dc1a52
                                     "><?php echo $rowQ2['catName']?></span>
                </h3>
                <?php
                }
                else if($model=="name")
                {
                    $cat = $db::Query("SELECT * FROM product WHERE productName LIKE'%$id%' and product.active = 1");
                ?>
                <h3 class="IRANSans" style="font-size:21px"> نتیجه جستجو:
                    <span class="IRANSans" style="margin-right: 2%;color:#dc1a52
                                     "><?php echo $id?></span>
                </h3>
                <?php
                }
                ?>
                <br/>
            </div>
            <!-- filter output -->
            <div class="row">
                <div class="filter_data"></div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" id="noMargin" style="margin-top: 82px;">
            <div class="row" style="direction: rtl;text-align: right">
                <div class="col-md-12">
                    <div class="box" style="border: 1px dashed #acafb1;padding: 15px;">
                        <div class="box-header">
                            <h3 class="box-title">دسته بندی</h3>
                        </div>
                        <div class="box-body">
                                <?php
                                $brand_query = $db::Query("SELECT subName,subId FROM subcategory where subCatId = '$id'");
                                while ($brand_result = mysqli_fetch_assoc($brand_query))
                                {
                                    ?>
                                        <span class="badge badge-danger mb-2"><input type="checkbox" class="filter_all subcategory mb-2" value="<?php echo $brand_result["subId"]; ?>">&nbsp;&nbsp;<?php echo $brand_result["subName"]; ?></span>
                                    <?php
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="direction: rtl;text-align: right">
                <div class="col-md-12">
                    <div class="box" style="border: 1px dashed #acafb1;margin-top:15px;margin-bottom:82px;padding: 15px">
                        <div class="box-header">
                            <h3 class="box-title">برند ها</h3>
                        </div>
                        <div class="box-body">
                            <?php
                            $brand_query = $db::Query("SELECT brand,brandId FROM brands where subCatId = '$id'");
                            while ($brand_result = mysqli_fetch_assoc($brand_query))
                            {
                                ?>
                                <span class="badge badge-danger mb-2"><input type="checkbox" class="filter_all subcategory mb-2" value="<?php echo $brand_result["brandId"]; ?>">&nbsp;&nbsp;<?php echo $brand_result["brand"]; ?></span>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div></div></div>
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
<script src="JS/icheck.min.js"></script>
<script>
    <?php
    $id = '';
    $_GET = $db::RealString($_GET);
    $id = $_GET["catId"];
    ?>
    $(document).ready(function() {
        filter_data();
        function filter_data() {
            $('.filter_data').html('<br/><br/><br/><br/><br/><br/><br/><br/><div id="loading" style="" ></div>');
            var action = 'fetch_data';
            var brand = get_filter('brand');
            var subcategory = get_filter('subcategory');
            $.ajax({
                url: "request/filter.php",
                method: "POST",
                data: {
                    action: action,
                    brand: brand,
                    subcategory: subcategory,
                    catId: String('<?php echo $id ?>')
                },
                success: function(data) {
                    $('.filter_data').html(data);
                }
            });
        }

        function get_filter(class_name) {
            var filter = [];
            $('.' + class_name + ':checked').each(function() {
                filter.push($(this).val());
            });
            return filter;
        }

        $('.filter_all').click(function() {
            filter_data();
        });
    });

</script>
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
</html>
