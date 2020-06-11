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
        border-radius: 50%;
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
$real=$db::RealString($_GET);
$id = '';
$id = $real['catId'];


$query = $db::Query("select * from category WHERE catId='$id'");
$fetched= mysqli_fetch_assoc($query);

?>
<div class="row">
    <div class="col-lg-12" id="adminform">
        <section class="panel">
            <header class="panel-heading">
               ویرایش دسته بندی
            </header>
            <div class="panel-body">
                <div class="alert alert-danger" id="ergio" style="display: none">
                    tamam fild ha por she
                </div>
                <div class="alert alert-success" id="succc" style="display: none">
                    ثبت با موفقیت انجام شد.
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">ویرایش دسته بندی</label>
                    <input type="text" class="form-control" id="catName" placeholder="ویرایش دسته بندی" value="<?php echo $fetched['catName']?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">قرارگیری در منو</label>
                    <select id="catMenuId" class="form-control">
                        <option value="0" selected disabled="disabled">منو را انتخاب کنید</option>
                        <?php
                            $q= $db::Query("SELECT * FROM menus");
                            while ($f=mysqli_fetch_assoc($q))
                            {
                            ?>
                                <option value="<?php echo $f['menuId'] ?>" <?php if($fetched['']==$f['menuId']) echo "selected" ?>><?php echo $f['menuName'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">ویرایش چیدمان</label>
                    <input type="text" class="form-control" id="statusList" placeholder="ویرایش چیدمان" value="<?php echo $fetched['statusList']?>">
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
                <div>
                    <img style="width: 28%;" src="../upload/cat/<?php echo $fetched['catImg']?>">
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
        if(imgprofile===undefined){
            imgprofile = "";
        }
        var catName = $("#catName").val();
        var statusList = $("#statusList").val();
        var catMenuId = $("#catMenuId").val();
        $.ajax({
            url:"request/catEdit.php",
            data:{
                id:'<?php echo $_GET['catId'];?>',

                catName:catName,
                statusList:statusList,
                catMenuId:catMenuId,
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
