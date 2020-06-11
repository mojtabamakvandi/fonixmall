<?php
include"inc/header.php";
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
<?php
include "class/dataBase.php";
$db=new dataBase();
?>
<div class="row">

    <div class="col-lg-12" id="adminform">
        <section class="panel">
            <header class="panel-heading">
                اضافه کردن زیر دسته بندی
            </header>
            <div class="panel-body">
                <div class="alert alert-danger" id="errorrigg" style="display: none">
                    tamam fild ha por she
                </div>
                <div class="alert alert-success" id="succccc" style="display: none">
                    ثبت با موفقیت انجام شد.
                </div>

                <select id="cat" onchange="getSubCat()">
                    <option selected disabled>دسته بندی خود را انتخاب کنید</option>
                    <?php

                    $select = $db::Query("SELECT * FROM category");
                    while ($rowSelect = mysqli_fetch_assoc($select)){
                        ?>
                        <option value="<?php echo $rowSelect['catId']?>"><?php echo $rowSelect['catName']?></option>
                        <?php
                    }

                    ?>
                </select>
                <select id="subCat" onchange="getproduct()">
                    <option selected disabled>زیر دسته بندی خود را انتخاب کنید</option>

                    <option disabled>ابتدا دسته بندی را انتخاب کنید</option>

                </select>
                <select id="product">
                    <option selected disabled>محصول خود را انتخاب کنید</option>
                    <option disabled>ابتدا زیر دسته بندی را انتخاب کنید</option>

                </select>
                <select id="galleryStatus">
                    <option selected disabled>تصویر شاخص باشد</option>
                    <option value="1">بلی</option>
                    <option value="0">خیر</option>
                </select>
                <div class="form-group">

                    <div class="image-editor" style="text-align: center;direction: ltr;">
                        <input type="file" class="cropit-image-input" style="display:none;" id="img">
                        <a type="button" onclick="show_img()" class="btn btn-info "><i
                                class="icon-plus"></i>اضافه
                            کردن تصویر</a>
                        <div class="cropit-preview">
                        </div>
                    </div>
                </div>




                <span class="btn btn-lg btn-login btn-block" onclick="submit()">ثبت</span>
            </div>
        </section>
    </div>

</div>
<!-- js placed at the end of the document so the pages load faster -->
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

<script>
    function getSubCat() {
        var cat = $("#cat").val();
        $.ajax({
            url:"request/getSubCat.php",
            data: {
                catId:cat
            },
            dataType:'json',
            type:'POST',
            success:function (data) {
                if(!data['error']){
                    $("#subCat").html(" <option selected disabled>زیر دسته بندی خود را انتخاب کنید</option>");
                    for (var i=0;i<data['subCat'].length;i++){
                        $("#subCat").append('<option value="'+data['subCat'][i]['id']+'">'+data['subCat'][i]['name']+'</option>');
                    }
                }
            }
        });
    }
</script>
<script>
    function getproduct() {
        var subCat = $("#subCat").val();
        $.ajax({
            url: "request/getProduct.php",
            data: {
                subId: subCat
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                if (!data['error']) {
                    $("#product").html(" <option selected disabled>محصول خود را انتخاب کنید</option>");
                    for (var i = 0; i < data['product'].length; i++) {
                        $("#product").append('<option value="' + data['product'][i]['id'] + '">' + data['product'][i]['name'] + '</option>');
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

    function submit() {

        var imgprofile = $('.image-editor').cropit('export', {
            type: 'image/jpeg',
            quality: 0.33,
            originalSize: true
        });
        var product = $("#product").val();
        var galleryStatus = $("#galleryStatus").val();
        $.ajax({
            url:"request/addGallery.php",
            data:{
                product:product,
                galleryStatus:galleryStatus,
                img:imgprofile
            },
            dataType:"json",
            type:"POST",
            success:function (data) {
                if (data['error']) {
                    $("#errorrigg").show("fast").html(data['MSG']);

                }else {
                    $("#succccc").show("fast");
                }
            }
        });
    }


</script>
<!--<script>-->
<!--    function submit() {-->
<!--        var product = $("#product").val();-->
<!--        var properties = $("#properties").val();-->
<!--        var value = $("#value").val();-->
<!---->
<!--        $.ajax({-->
<!--            url:"request/addProductProperties.php",-->
<!--            data: {-->
<!--                product:product,-->
<!--                properties:properties,-->
<!--                value:value,-->
<!--            },-->
<!--            dataType:'json',-->
<!--            type:'POST',-->
<!--            success:function (data) {-->
<!--                if (data["error"]){-->
<!--                    $("#errorrigg").show("fast").html(data['MSG']);-->
<!---->
<!---->
<!--                }else  {-->
<!--                    $("#succccc").show("fast");-->
<!--                }-->
<!--            }-->
<!--        });-->
<!---->
<!--    }-->
<!--</script>-->
</body>
</html>
