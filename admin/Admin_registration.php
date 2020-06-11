<?php
include "inc/header.php";
?>
<div class="row">
    <div class="col-lg-12" id="adminform">
        <section class="panel">
            <header class="panel-heading">
                فرم ثبت نام مدیر
            </header>
            <div class="panel-body">
                <div class="alert alert-danger" id="errorrig" style="display: none">
                    tamam fild ha por she
                </div>
                <div class="alert alert-success" id="succ" style="display: none">
                    ثبت با موفقیت انجام شد.
                </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">نام خود را وارد کنید</label>
                        <input type="text" class="form-control" id="name" placeholder="نام خود را وارد کنید">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">نام کاربری خود را وارد کنید</label>
                        <input type="text" class="form-control" id="username" placeholder="نام کاربری خود را وارد کنید">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">رمز عبور خود را وارد کنید</label>
                        <input type="text" class="form-control" id="password" placeholder="رمز عبور خود را وارد کنید">
                    </div>
                    <div class="form-group">
                       <select id="level">
                           <option value="1">مدیریت فروشگاه</option>
                           <option value="2">همکاری در فروش</option>
                       </select>
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

<script>
    function submit() {
        var name = $("#name").val();
        var username = $("#username").val();
        var password = $("#password").val();
        var level = $("#level").val();

        $.ajax({
            url:"request/addAdmin.php",
            data:{
                name:name,
                username:username,
                password:password,
                level:level
            },
            dataType:'json',
            type:'POST',
            success:function (data) {
                if(data['error']){
                    $("#errorrig").show("fast").html(data['MSG']);


                }else {
                    $("#succ").show("fast");
                    }
                }

        });

    }
</script>
</body>
</html>
