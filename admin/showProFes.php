<?php
include"inc/header.php";
?>
<?php
include "class/dataBase.php";
include "class/jdf.php";
$db=new dataBase();
$product = $db::Query("select * from festivalproduct,admin,product WHERE adminId=fePrAdminId AND fePrProductId=productId");

?>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        لیست محصولات
                    </header>

                    <table class="table table-striped border-top" id="sample_1">

                        <thead>

                        <tr>
                            <th>ردیف</th>
                            <th>نام محصول</th>
                            <th class="hidden-phone">تاریخ ثبت</th>
                            <th>زمان ثبت</th>
                            <th>نام مدیر</th>
                            <th>نام جشنواره</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <?php
                        $i=1;

                        if (mysqli_num_rows($product) > 0) { ?>
                            <?php

                            while ($fetch = mysqli_fetch_assoc($product)) {

                                $festivalId = $fetch['fePrFestivalId'];
                                $date = $fetch['fePrRegDate'];

                                $qu = $db::Query("select * from festival WHERE festivalId='$festivalId'");
                                $rowFestival = mysqli_fetch_assoc($qu);


                                ?>

                                <tbody>

                                <tr>
                                    <td class="hidden-phone"><?php echo $i?></td>
                                    <td class="hidden-phone"><?php echo $fetch['productName']?></td>
                                    <td class="hidden-phone"><?php echo @$db::G2J($date)?></td>
                                    <td><?php echo $fetch['fePrRegTime']?> </td>
                                    <td><?php echo $fetch['adminName']?> </td>
                                    <td><?php echo $rowFestival['festivalName']?> </td>



                                    <td>
                                        <a href="deletFePe.php?fePrId=<?php echo $fetch['fePrId']?>">
                                            <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
                                    </td>
                                </tr>

                                </tbody>
                                <?php
                                $i++;
                            } ?>
                        <?php }?>
                    </table>

                </section>

            </div>
        </div>


    </section>
</section>
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
