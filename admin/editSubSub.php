<?php
include"inc/header.php";
?>
<?php
$id = '';


include "class/dataBase.php";
$db=new dataBase();
$real=$db::RealString($_GET);
$id = $real['subId'];
$query = $db::Query("select * from subcategory WHERE subCatId='$id'");
$fetched= mysqli_fetch_assoc($query);
?>
<div class="row">

    <div class="col-lg-12" id="adminform">
        <section class="panel">
            <header class="panel-heading">
                ویرایش زیر زیر دسته بندی
            </header>
            <div class="panel-body">
                <div class="alert alert-danger" id="errorrigg" style="display: none">
                    تمام فیلد ها الزامی است.
                </div>
                <div class="alert alert-success" id="succccc" style="display: none">
                    ثبت با موفقیت انجام شد.
                </div>
                <div class="form-group">
                    <label>نوع دسته بندی</label>
                    <select id="category">
                        <?php
                        if (mysqli_num_rows($query) > 0) { ?>
                            <?php
                            $select = $db::Query("SELECT * FROM category");

                            while ($fetch = mysqli_fetch_assoc($select)) {

                                ?>

                                <option value="<?php echo $fetch['catId']?>"><?php echo $fetch['catName'] ?></option>
                                <?php
                            } ?>
                        <?php }?>
                    </select>
                    <label>نوع زیر دسته بندی</label>
                    <select id="subcategory">
                        <?php
                        if (mysqli_num_rows($query) > 0) { ?>
                        <?php
                        while ($fetch = mysqli_fetch_assoc($query)) {

                        ?>

                        <option value="<?php echo $fetch['subId']?>"><?php echo $fetch['subName'] ?></option>
                            <?php
                        } ?>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1"> ویرایش زیر زیر دسته بندی نام محصول</label>
                    <input type="text" class="form-control" id="subsubName" placeholder=" ویرایش زیر یزر دسته بندی نام محصول  " value="<?php echo $fetched['subName']?>">
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
        var subcategory = $("#subcategory").val();
        var subsubName = $("#subsubName").val();

        $.ajax({
            url:"request/subsubEdit.php",
            data: {
                id:'<?php echo $_GET['subsubId'];?>',
                subcategory:subcategory,
                subsubName:subsubName,
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
