<?php
include"inc/header.php";
?>
<div class="row">
    <div class="col-lg-12" id="adminform">
        <section class="panel">
            <header class="panel-heading">
                فرم اضافه کردن دسته بندی خبر
            </header>
            <div class="panel-body">
                <div class="alert alert-danger" id="ergio" style="display: none">
                    tamam fild ha por she
                </div>
                <div class="alert alert-success" id="succc" style="display: none">
                    ثبت با موفقیت انجام شد.
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">نوع دسته بندی خبر</label>
                    <input type="text" class="form-control" id="catNews" placeholder="نوع دسته بندی خبر">
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
<script>
    function submit() {
        var catNews = $("#catNews").val();
        $.ajax({
            url:"request/addCatNews.php",
            data:{
                catNews:catNews,
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
