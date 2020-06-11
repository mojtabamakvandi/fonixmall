<?php
include"inc/header.php";
?>

<div class="row">

    <div class="col-lg-12" id="adminform">
        <section class="panel">
            <header class="panel-heading">
                اضافه کردن محصول جشنواره
            </header>
            <div class="panel-body">
                <div class="alert alert-danger" id="pru" style="display: none">
                    tamam fild ha por she
                </div>
                <div class="alert alert-success" id="prd" style="display: none">
                    ثبت با موفقیت انجام شد.
                </div>
                <div class="form-group">


                    <select id="festival">

                        <?php
                        include "class/dataBase.php";
                        $db= new dataBase();
                        $query=$db::Query("select * from festival");
                            while ($fetch = mysqli_fetch_assoc($query)) {


                                ?>
                                <label>نوع دسته بندی</label>
                                <option value="<?php echo $fetch['festivalId']?>"><?php echo $fetch['festivalName'] ?></option>
                                <?php
                            } ?>
                        <?php ?>
                    </select>
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
            url:"request/getProduct.php",
            data: {
                subId:subCat
            },
            dataType:'json',
            type:'POST',
            success:function (data) {
                if(!data['error']){
                    $("#product").html(" <option selected disabled>محصول خود را انتخاب کنید</option>");
                    for (var i=0;i<data['product'].length;i++){
                        $("#product").append('<option value="'+data['product'][i]['id']+'">'+data['product'][i]['name']+'</option>');
                    }
                }
            }
        });
    }
</script>
<script>
    function submit() {
        var festival = $("#festival").val();
        var product = $("#product").val();
        $.ajax({
            url:"request/addProFestival.php",
            data:{
                festival:festival,
                product:product,
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
