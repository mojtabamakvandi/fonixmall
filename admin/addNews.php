<?php
include"inc/header.php";
?>
<?php
include "class/dataBase.php";
$db=new dataBase();
$query7 = $db::Query("select * from categorynews")
?>
<div class="row">

    <div class="col-lg-12" id="adminform">
        <section class="panel">
            <header class="panel-heading">
                اضافه کردن خبر
            </header>
            <div class="panel-body">
                <div class="alert alert-danger" id="errorrigg" style="display: none">
                    tamam fild ha por she
                </div>
                <div class="alert alert-success" id="succccc" style="display: none">
                    ثبت با موفقیت انجام شد.
                </div>
                <div class="form-group">
                    <select id="newsCategory">
                        <?php
                        if (mysqli_num_rows($query7) > 0) { ?>
                            <?php
                            while ($fetch = mysqli_fetch_assoc($query7)) {

                                ?>
                                <label>نوع دسته بندی خبر</label>
                                <option value="<?php echo $fetch['catNewsId']?>"><?php echo $fetch['catNewsName'] ?></option>
                                <?php
                            } ?>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">عنوان خبر</label>
                    <input type="text" class="form-control" id="newsTitle" placeholder="عنوان خبر">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">متن خبر</label>
                    <input type="text" class="form-control" id="newsText" placeholder="متن خبر">
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
        var newsCategory = $("#newsCategory").val();
        var newsText = $("#newsText").val();
        var newsTitle = $("#newsTitle").val();

        $.ajax({
            url:"request/addNews.php",
            data: {
                newsCategory:newsCategory,
                newsText:newsText,
                newsTitle:newsTitle,
            },
            dataType:'json',
            type:'POST',
            success:function (data) {
                if (data["error"]){
                    $("#errorrigg").show("fast").html(data['MSG']);


                }else  {
                    $("#succccc").show("fast");
                }
            }
        });

    }
</script>
</body>
</html>
