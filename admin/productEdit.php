<?php
include "inc/header.php";
?>
<?php
$id = '';


include "class/dataBase.php";


$db = new dataBase();

$_GET = $db::RealString($_GET);
$id = $_GET['productId'];


$query = $db::Query("SELECT * FROM product LEFT JOIN brand ON product.productBrandId = brand.brandId LEFT JOIN subcategory ON product.productSubCatid = subcategory.subId LEFT JOIN category ON subcategory.subCatId = category.catId LEFT JOIN admin ON product.productAdminId = admin.adminId LEFT JOIN gallery ON product.productId = gallery.galleryPrId WHERE product.productId='$id'");
$fetched = mysqli_fetch_assoc($query);
?>
<style>
    .cropit-preview-image {
        border-radius: 0px !important;
    }
    .cropit-preview-image-container {
        border-radius: 0px !important;
    }
    .cropit-preview {
        margin: auto;
        background: #f8f8f8;
        background-size: cover;
        border: 5px solid #ccc;
        border-radius: 0px;
        margin-top: 7px;
        width: 250px !important;
        height: 250px !important;
    }
    .cropit-preview-image-container {
        cursor: move;
    }
    .cropit-preview-background {
        opacity: .2;
        cursor: auto;
    }
    div#cropit-preview {
        width: 741px !important;
        height: 142px !important;
    }
</style>
<div class="row">

    <div class="col-lg-12" id="adminform">
        <section class="panel">
            <header class="panel-heading">
                اضافه کردن محصول
            </header>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger" id="pru" style="display: none">
                            tamam fild ha por she
                        </div>
                        <div class="alert alert-success" id="prd" style="display: none">
                            ثبت با موفقیت انجام شد.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">


                        <div class="form-group">
                            <label for="">دسته بندی</label>
                            <select class="form-control" id="cat" onchange="getSubCat()" style="height: 40px">
                                <option selected disabled>دسته بندی خود را انتخاب کنید</option>
                                <?php
                                $select = $db::Query("SELECT * FROM category");
                                while ($rowSelect = mysqli_fetch_assoc($select)) {
                                    ?>
                                    <option value="<?php echo $rowSelect['catId'] ?>" <?php if($fetched['catId']==$rowSelect['catId']) echo "selected"?>><?php echo $rowSelect['catName'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">زیر دسته بندی</label>
                            <select class="form-control" id="subCat" style="height: 40px">
                                <option selected disabled>زیر دسته بندی خود را انتخاب کنید</option>
                                <?php
                                $catID = $fetched['catId'];
                                $selectSub = $db::Query("SELECT * FROM subcategory where subCatId = '$catID'");
                                while ($rowSub = mysqli_fetch_assoc($selectSub)) {
                                    ?>
                                    <option value="<?php echo $rowSub['subId'] ?>" <?php if($fetched['subId']==$rowSub['subId']) echo "selected"?>><?php echo $rowSub['subName'] ?></option>
                                    <?php
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="brand">برند</label>
                            <select class="form-control" id="brand" style="height: 40px">
                                <option selected disabled>برند خود را انتخاب کنید</option>
                                <?php
                                $query = $db::Query("select * from brand");
                                while ($fetch = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <option value="<?php echo $fetch['brandId']?>" <?php if($fetched['productBrandId']==$fetch['brandId']) echo "selected"?>><?php echo $fetch['brand'] ?></option>
                                    <?php
                                } ?>
                                <?php ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" >فعال / غیرفعال</label>
                            <select class="form-control" id="active" style="height: 40px">
                                <option value="1" <?php if($fetched['active']=='1') echo "selected"?> >فعال</option>
                                <option value="0" <?php if($fetched['active']=='0') echo "selected"?> >غیرفعال</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="productPicture">
                            <img src="upload/gallery/<?php echo $fetched['galleryImg']?>.jpg" class="img img-responsive"/>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">نام محصول</label>
                    <input type="text" class="form-control" id="productName" placeholder="نام محصول "
                           value="<?php echo $fetched['productName'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">مبلغ محصول</label>
                    <input type="text" class="form-control" id="productPrice" placeholder="مبلغ محصول"
                           value="<?php echo $fetched['productPrice'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">توضیحات محصول</label>
                    <textarea class="form-control" rows="10" id="description" placeholder="توضیحات محصول"><?php echo $fetched['Description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">تخفیف محصول</label>
                    <input type="text" class="form-control" id="offer" placeholder="تخفیف محصول"
                           value="<?php echo $fetched['offer'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">گارانتی محصول</label>
                    <input type="text" class="form-control" id="guarantee" placeholder="گارانتی محصول "
                           value="<?php echo $fetched['guarantee'] ?>">
                </div>
                <div class="image-editor" style="text-align: center;direction: ltr;">
                    <input type="file" class="cropit-image-input" style="display:none;" id="img">

                    <a type="button" onclick="show_img()" class="btn btn-info "><i
                                class="icon-plus"></i>اضافه
                        کردن تصویر</a>
                    <div class="cropit-preview">
                    </div>
                    <br/>
                    <select id="galleryStatus" class="form-control text-right" style="direction: rtl">
                        <option selected disabled>تصویر شاخص باشد</option>
                        <option value="1">بلی</option>
                        <option value="0">خیر</option>
                    </select>
                </div>
                <br/>
                <div class="text-center">
                    <span class="btn btn-lg btn-success" onclick="submit()">ثبت</span>
                </div>

            </div>
        </section>
    </div>

    <div class="col-lg-12" id="adminform" style="margin-top: 0">
        <section class="panel">
            <header class="panel-heading">
                رنگ بندی
            </header>
            <div class="alert alert-danger" id="pru1" style="display: none">
                tamam fild ha por she
            </div>
            <div class="alert alert-success" id="prd2" style="display: none">
                ثبت با موفقیت انجام شد.
            </div>
            <select id="colorPicker" style="margin-right: 20px;margin-top: 10px">
                <?php
                $selectColor = $db::Query("SELECT * FROM color WHERE colorId NOT IN (SELECT coPrColorId FROM colorproduct where coPrProductId='$id')");
                while ($rowColor = mysqli_fetch_assoc($selectColor)) {
                    ?>
                    <option style="background-color: <?php echo $rowColor['colorName']?>" value="<?php echo $rowColor['colorId'] ?>"><?php echo $rowColor['colorName'] ?></option>
                    <?php
                }
                ?>
            </select>
            <input type="number" id="count" placeholder="تعداد موجودی" style="margin-right: 20px;">
            <input type="number" id="price" placeholder="مبلغ" style="margin-right: 20px;">
            <input type="button" value="ثبت" class="btn btn-primary btn-sm" style="margin-right: 20px;"
                   onclick="submitColorPr();">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>نام رنگ</td>
                    <td>تعداد موجودی</td>
                    <td>مبلغ</td>
                    <td>عملیات</td>
                </tr>
                </thead>
                <tbody id="tableColors">
                <?php
                $Query = $db::Query("SELECT * FROM color,product,colorproduct where colorId=coPrColorId AND  productId=coPrProductId AND product.productId='$id'");
                while ($rowPr = mysqli_fetch_assoc($Query)) {
                    ?>
                    <tr>

                        <td><?php echo $rowPr['colorName'] ?></td>
                        <td><?php echo $rowPr['coPrCount'] ?></td>
                        <td><?php echo $rowPr['coPrPrice'] ?></td>

                        <td>
                            <button class="btn btn-danger btn-xs"
                                    onclick="deleteColor('<?php echo $rowPr['coPrId'] ?>');"><i class="icon-remove"></i>
                            </button>
                        </td>
                    </tr>


                    <?php
                }
                ?>

                </tbody>
            </table>
        </section>
    </div>

</div>
<script src="js/jquery.js"></script>
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="js/jquery.sparkline.js" type="text/javascript"></script>
<script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="js/owl.carousel.js" ></script>
<script src="js/jquery.customSelect.min.js" ></script>

<!--common script for all pages-->
<script src="js/common-scripts.js"></script>

<!--script for this page-->
<script src="js/sparkline-chart.js"></script>
<script src="js/easy-pie-chart.js"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery.cropit.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function getSubCat() {
        var cat = $("#cat").val();
        $.ajax({
            url: "request/getSubCat.php",
            data: {
                catId: cat
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                if (!data['error']) {
                    $("#subCat").html(" <option selected disabled>زیر دسته بندی خود را انتخاب کنید</option>");
                    for (var i = 0; i < data['subCat'].length; i++) {
                        $("#subCat").append('<option value="' + data['subCat'][i]['id'] + '">' + data['subCat'][i]['name'] + '</option>');
                    }
                }
            }
        });
    }
</script>
<script>
    function show_img() {
        $("#img").click();
    }
    (function ($) {
        $('.image-editor').cropit({
            exportZoom: 1.25,
            imageBackground: true,
            imageBackgroundBorderWidth: 20,
            imageState: {
                src: ''
            }
        });
    })(jQuery);
    function pageReloader() {
        window.location.reload();
    }
    function submit() {

        var imgprofile = $('.image-editor').cropit('export', {
            type: 'image/jpeg',
            quality: 0.33,
            originalSize: true
        });
        var galleryStatus = $("#galleryStatus").val();

        $("#pru").hide("fast");
        $("#prd").hide("fast");
        var subCat = $("#subCat").val();
        var brand = $("#brand").val();
        var productName = $("#productName").val();
        var productPrice = $("#productPrice").val();
        var description = $("#description").val();
        var offer = $("#offer").val();
        var guarantee = $("#guarantee").val();
        var active = $("#active").val();

        $.ajax({
            url: "request/editProduct.php",
            data: {
                id: '<?php echo $_GET['productId'];?>',
                subCat: subCat,
                brand: brand,
                productName: productName,
                productPrice: productPrice,
                description: description,
                offer: offer,
                guarantee: guarantee,
                active: active,
                img:imgprofile,
                galleryStatus:galleryStatus,
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                if (data["error"]){
                    var msg = data['MSG'];
                    swal(msg,' ', 'error', {buttons: false, timer: 1000});
                    pageReloader();
                } else {
                    swal('ثبت با موفقیت انجام شد','', 'success', {buttons: false, timer: 1000});
                }
            }
        });

    }

    function submitColorPr() {
        $("#prd2").hide("fast");
        $("#pru1").hide("fast");
        var colorPicker = $("#colorPicker").val();
        var count = $("#count").val();
        var price = $("#price").val();
        $.ajax({
            url: "request/addColorProduct.php",
            data: {
                id: '<?php echo $_GET['productId'];?>',
                colorPicker: colorPicker,
                count: count,
                price: price
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                if (data["error"]) {
                    $("#pru1").show("fast").html(data['MSG']);
                } else {
                    location.reload();
                }
            }
        });
    }
    function deleteColor(id) {
        $.ajax({
            url: "request/deleteColorPr.php",
            data: {
                id: id
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                    location.reload();
            }
        });
    }
</script>
</body>
</html>
