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
<div class="row">

    <div class="col-lg-12" id="adminform">
        <section class="panel">
            <header class="panel-heading text-danger">
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
                            <select id="cat" onchange="getSubCat()" class="form-control">
                                <option selected disabled>دسته بندی خود را انتخاب کنید</option>
                                <?php
                                include "class/dataBase.php";
                                $db = new dataBase();
                                $select = $db::Query("SELECT * FROM category");
                                while ($rowSelect = mysqli_fetch_assoc($select)){
                                    ?>
                                    <option value="<?php echo $rowSelect['catId']?>"><?php echo $rowSelect['catName']?></option>
                                    <?php
                                }

                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">زیر دسته بندی</label>
                            <select id="subCat" class="form-control">
                                <option selected disabled>زیر دسته بندی خود را انتخاب کنید</option>
                                <option disabled>ابتدا دسته بندی را انتخاب کنید</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">برند</label>
                            <select id="brand" class="form-control">
                                <option selected disabled>برند خود را انتخاب کنید</option>

                                <?php
                                $query = $db::Query("select * from brand");

                                while ($fetch = mysqli_fetch_assoc($query)) {

                                    ?>
                                    <label>برند</label>
                                    <option value="<?php echo $fetch['brandId']?>"><?php echo $fetch['brand'] ?></option>
                                    <?php
                                } ?>
                                <?php ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">نام محصول</label>
                            <input type="text" class="form-control" id="productName" placeholder="نام محصول ">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">مبلغ محصول</label>
                            <input type="text" class="form-control" id="productPrice" placeholder="مبلغ محصول">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">تخفیف محصول</label>
                            <input type="number" class="form-control" id="offer" placeholder="تخفیف محصول(0)" value="0">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">توضیحات محصول</label>
                    <textarea class="form-control" rows="10" id="description" placeholder="توضیحات محصول"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">گارانتی محصول</label>
                    <input type="text" class="form-control" id="guarantee" placeholder="گارانتی محصول " value="ندارد">
                </div>
                <div class="form-group">
                    <label for="">تصویر</label>
                    <select id="galleryStatus" class="form-control">
                        <option selected disabled>تصویر شاخص باشد</option>
                        <option value="1">بلی</option>
                        <option value="0">خیر</option>
                    </select>
                </div>
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
                <div class="text-center">
                    <span class="btn btn-lg btn-success" onclick="submit()">ثبت</span>
                </div>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
        var galleryStatus = $("#galleryStatus").val();

        var subCat = $("#subCat").val();
        var brand = $("#brand").val();
        var productName = $("#productName").val();
        var productPrice = $("#productPrice").val();
        var description = $("#description").val();
        var offer = $("#offer").val();
        var guarantee = $("#guarantee").val();
        $.ajax({
            url:"request/addProduct.php",
            data:{
                subCat:subCat,
                brand:brand,
                productName:productName,
                productPrice:productPrice,
                description:description,
                offer:offer,
                guarantee:guarantee,
                galleryStatus:galleryStatus,
                img:imgprofile
            },
            dataType:'json',
            type:'POST',
            success:function (data) {

                if(data["ddd"]) {
                    //$("#prd").show("fast");
                    swal('ثبت با موفقیت انجام شد',data['pr'], 'success', {buttons: false, timer: 2000});
                }

                if (data["error"]){
                    //$("#pru").show("fast").html(data['MSG']);
                    var msg = data['MSG'];
                    swal(msg,' ', 'error', {buttons: false, timer: 2000});
                }

            }
        });
    }
</script>
</body>
</html>
