<?php
include"inc/header.php";
?>
<?php
include "class/dataBase.php";
$db=new dataBase();
$query = $db::Query("select * from properties")
?>
<div class="row">

    <div class="col-lg-12" id="adminform">
        <section class="panel">
            <header class="panel-heading">
                اضافه کردن زیر دسته بندی
            </header>
            <div class="panel-body">
                <div class="alert alert-danger" id="errorrigg" style="display: none">
                    tamam fild ha por she
                </div>
                <div class="alert alert-success" id="succccc" style="display: none">
                    ثبت با موفقیت انجام شد.
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
                <select id="properties">
                    <option selected disabled>خاصیت حود را انتخاب کنید</option>
                    <option disabled>ابتدا زیر دسته بندی را انتخاب کنید</option>

                </select>
                <div class="form-group" >
                    <label for="exampleInputEmail1">تعداد</label>
                    <input id="value" type="text" class="form-control" id="specialOfferPercentage" placeholder="تعداد">
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

        $.ajax({
            url:"request/getProperties.php",
            data: {
                subId:subCat
            },
            dataType:'json',
            type:'POST',
            success:function (data) {
                if(!data['error']){
                    $("#properties").html(" <option selected disabled>خاصیت خود را انتخاب کنید</option>");
                    for (var i=0;i<data['properties'].length;i++){
                        $("#properties").append('<option value="'+data['properties'][i]['id']+'">'+data['properties'][i]['name']+'</option>');
                    }
                }
            }
        });
    }
</script>

<script>
    function submit() {
        var product = $("#product").val();
        var properties = $("#properties").val();
        var value = $("#value").val();

        $.ajax({
            url:"request/addProductProperties.php",
            data: {
                product:product,
                properties:properties,
                value:value,
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
