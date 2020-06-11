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
        width: 800px !important;
        height: 300px !important;
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
                اضافه کردن اسلایدر
            </header>
            <div class="panel-body">
                <div class="alert alert-danger" id="ergio" style="display: none">
                    tamam fild ha por she
                </div>
                <div class="alert alert-success" id="succc" style="display: none">
                    ثبت با موفقیت انجام شد.
                </div>
                <div class="form-group">
                    <label for="sliderLinkModel">نوع اسلایدر</label>
                    <select id="sliderLinkModel" class="form-control" style="height: 40px" onchange="geter()">
                        <option value='0' disabled selected>نوع اسلایدر را انتخاب کنید</option>
                        <option value='1'>فستیوال</option>
                        <option value='2'>خبر</option>
                        <option value='3'>دسته بندی</option>
                        <option value='4'>زیر دسته بندی</option>
                        <option value='5'>دسته بندی خبر</option>
                        <option value='6'>لینک</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">نام اسلایدر</label>
                    <input type="text" class="form-control" id="sliderName" placeholder="نام اسلایدر">
                </div>
                <div class="form-group" id="LinkBlock">
                    <label for="sliderLink">لینک اسلایدر</label>
                    <input type="text" class="form-control" id="sliderLink" placeholder="لینک اسلایدر">
                </div>
                </section>
        <select id="subCat">
            <option selected disabled>مدل</option>
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
<script src="js/jquery.js"></script>


<script src="js/jquery.cropit.js"></script>

<script>
    $(document).ready(function () {
       $("#LinkBlock").hide();
       $("#subCat").hide();
    });
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
            quality: 0.88,
            originalSize: true
        });
        var sliderName = $("#sliderName").val();
        var sliderLinkModel = $("#sliderLinkModel").val();
        var subCat = $("#subCat").val();
        var sliderLink = $("#sliderLink").val();
        $.ajax({
            url:"request/addSlider.php",
            data:{
                sliderName:sliderName,
                sliderLinkModel:sliderLinkModel,
                subCat:subCat,
                sliderLink:sliderLink,
                img:imgprofile
            },
            dataType:"json",
            type:"POST",
            success:function (data) {
                if (data['error']) {
                    $("#ergio").show("fast").html(data['MSG']);

                }else {
                    $("#succc").show("fast");
                }
            }
        });
    }


</script>
<script>
    function geter() {
        var sliderLinkModel = $("#sliderLinkModel").val();
        if(sliderLinkModel=='6'){
            $("#LinkBlock").show();
            $("#subCat").hide();
        }else{
            $("#LinkBlock").hide();
            $("#subCat").show();
            $.ajax({
                url:"request/getSlider.php",
                data: {
                    value:sliderLinkModel,
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
    }
</script>
