<?php
include"inc/header.php";
?>
<?php
include "class/dataBase.php";
include "class/jdf.php";
$db=new dataBase();

$catquery = $db::Query("select * from category ");

?>
<head>
    <link rel="stylesheet" href="css/notiflix-1.8.0.css">

</head>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    لیست دسته بندی
                    </header>
<!--                    <div class="alert-danger" id="deleteCatAlert" style="display: none">-->
<!--                        با حذف دسته بندی زیر دسته بندی و محصولات این دسته بندی حذف میشود-->
<!--                    </div>-->
                    <table class="table table-striped border-top" id="sample_1">

                        <thead>
                            <div class="alert-danger" id="catt">

                            </div>
                        <tr>
                            <th>ردیف</th>
                            <th>نام دسته بندی</th>
                            <th class="hidden-phone">تاریخ ثبت</th>
                            <th>زمان ثبت</th>
                            <th>تصویر دسته بندی</th>
                            <th>ویراش</th>
                            <th>حذف</th>
                            <th>حذف فوری</th>
                        </tr>
                        </thead>
                                                        <tbody>

                        <?php
                        $i=1;
                        if (mysqli_num_rows($catquery) > 0) {

                            ?>
                            <?php
                            while ($fetch = mysqli_fetch_assoc($catquery)) {
                                $catId = $fetch['catId'];
                                $date = $fetch['catRegDate'];

                                $selecter = $db::Query("SELECT * FROM subcategory where subCatId='$catId'",$db::$NUM_ROW);

                                ?>


                                <tr>
                                    <td class="hidden-phone"><?php echo $i?></td>
                                    <td class="hidden-phone"><?php echo $fetch['catName']?></td>
                                    <td class="hidden-phone"><?php echo @$db::G2J($date)?></td>
                                    <td><?php echo $fetch['catRegTime']?> </td>
                                    <td style="width: 20%"><img style="width: 20%;height: 42px" src="upload/cat/<?php echo $fetch['catImg']?>.jpg"> </td>
                                    <td>
                                        <a href="editCat.php?catId=<?php echo $fetch['catId']?>">
                                        <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
                                    </td>
                                    <td>

                                        <?php
                                        if($selecter==0){
                                            ?>
                                            <button class="btn btn-danger btn-xs"
                                                    onclick="deleteCat('<?php echo $fetch['catId']?>')">
                                                <i class="icon-pencil"></i></button>
                                            <?php
                                        }
                                        ?>

                                    </td>
                                    <td><button class="btn btn-danger btn-xs" onclick="forseDelete('<?php echo $fetch['catId']?>')">
                                            حذف
                                        </button></td>
                                </tr>

                                <?php
                                $i++;
                            } ?>
                        <?php }?>
                                                        </tbody>

                    </table>

                </section>

            </div>
        </div>


    </section>
</section>
<script type="text/javascript" src="js/notiflix-1.8.0.js"></script>

<script>
    function deleteCat(id) {
        $.ajax({
            url: "deleteCat.php",
            data: {
                id: id
            },
            dataType: 'json',
            type: 'POST',
            success: function (data){
            if (data["error"]){
            $("#catt").show("fast").html(data['MSG']);
            }else {
                location.reload();
            }

            }
        });
    }
</script>
<script>
    Notiflix.Notify.Init({
        rtl: true,
        useGoogleFont: false,
        fontFamily: "yekanboldfanum",
        timeout: 1500,
    });
</script>
<script>
    Notiflix.Confirm.Init({
        rtl: true,
        useGoogleFont: false,
        fontFamily: "yekan",
        cancelButtonBackground: "#ef2828",
    });
</script>
<script>
    function forseDelete(catId){
    Notiflix.Confirm.Show('دسته بندی حذف شود؟', 'آیا مطمئن هستید؟',
        'بله', 'خیر',
        function () {// Yes button callback
            $.ajax({
                url: "request/forseDelete.php",
                data: {
                    catId: catId
                },
                dataType: "json",
                type: "POST",
                success: function (jsonData) {
                    if (jsonData['error']) {
                        location.reload();
                    } else {
                        location.reload();
                    }
                }
            });

        },
        function () { // No button callback
            location.reload();
            return;
        }
    );
    }



</script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>


<!--common script for all pages-->
<script src="js/common-scripts.js"></script>

<!--script for this page only-->
<script src="js/dynamic-table.js"></script>
</body>
</html>
