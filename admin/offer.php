<?php
include"inc/header.php";
?>
<div class="row">
    <div class="col-lg-12" id="adminform">
        <section class="panel">
            <header class="panel-heading">
                اضافه کردن کد تخفیف
            </header>
            <div class="panel-body">
                <div class="alert alert-danger" id="ergio" style="display: none">
                    tamam fild ha por she
                </div>
                <div class="alert alert-success" id="succc" style="display: none">
                    ثبت با موفقیت انجام شد.
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">کد تخفیف</label>
                    <input type="text" class="form-control" id="offer" placeholder="کد تخفیف را وارد کنید">
                </div>
     <div class="form-group">
                    <label for="exampleInputEmail1">تعداد مورد استفاده</label>
                    <input type="number" class="form-control" id="count" placeholder="تعداد مورد استفاده">
                </div>
<div class="form-group">
                    <label for="exampleInputEmail1">درصد کد تخفیف</label>
                    <input type="text" class="form-control" id="ocPercentage" placeholder="درصد کد تخفیف">
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
        var offer = $("#offer").val();
        var count = $("#count").val();
        var ocPercentage = $("#ocPercentage").val();
        $.ajax({
            url:"request/addOffer.php",
            data:{
                offer:offer,
                count:count,
                ocPercentage:ocPercentage,
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
