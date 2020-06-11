<?php
include"inc/header.php";
?>
    <div class="row">

        <div class="col-lg-12" id="adminform">
            <section class="panel">
                <header class="panel-heading">
                    اضافه کردن منوی فوتر
                </header>
                <div class="panel-body">
                    <div class="alert alert-danger" id="pru" style="display: none">
                        tamam fild ha por she
                    </div>
                    <div class="alert alert-success" id="prd" style="display: none">
                        ثبت با موفقیت انجام شد.
                    </div>
                    <select id="news">
                        <option selected disabled>دسته بندی خود را انتخاب کنید</option>
                        <?php
                        include "class/dataBase.php";
                        $db = new dataBase();
                        $select = $db::Query("SELECT * FROM news");
                        while ($rowSelect = mysqli_fetch_assoc($select)){
                            ?>
                            <option value="<?php echo $rowSelect['newsId']?>"><?php echo $rowSelect['newsTitle']?></option>
                            <?php
                        }

                        ?>
                    </select>

                    <div class="form-group">
                        <label for="exampleInputEmail1">نام </label>
                        <input type="text" class="form-control" id="footerMenuName" placeholder="نام ">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">چیدمان</label>
                        <input type="number" class="form-control" id="footerMenuSort" placeholder="چیدمان">
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
            var news = $("#news").val();
            var footerMenuName = $("#footerMenuName").val();
            var footerMenuSort = $("#footerMenuSort").val();
            $.ajax({
                url:"request/addFooterMenu.php",
                data:{
                    news:news,
                    footerMenuName:footerMenuName,
                    footerMenuSort:footerMenuSort,
                },
                dataType:'json',
                type:'POST',
                success:function (data) {
                    if (data["error"]){
                        $("#pru").show("fast").html(data['MSG']);


                    }else  {
                        $("#prd").show("fast");
                    }
                }
            });

        }
    </script>
    </body>
    </html>
<?php
/**
 * Created by PhpStorm.
 * User: RasoolB
 * Date: 07/08/2019
 * Time: 10:59 AM
 */