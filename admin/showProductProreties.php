<?php
include"inc/header.php";
?>
<?php

include "class/dataBase.php";
$db=new dataBase();
$catquery1 = $db::Query("select * from productproperties,product where productId=proId");
?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        لیست زیر دسته بندی
                    </header>

                    <table class="table table-striped border-top" id="sample_1">

                        <thead>

                        <tr>
                            <th>ردیف</th>
                            <th>نام محصول </th>
                            <th class="hidden-phone">تعداد</th>
                            <th>تاریخ ثبت</th>
                            <th>زمان ثبت</th>
                            <th>خاصیت</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <?php
                        $i=1;
                        if (mysqli_num_rows($catquery1) > 0) { ?>
                            <?php
                            while ($fetch = mysqli_fetch_assoc($catquery1)) {

                                $proId = $fetch['prPrPropertiesId'];

                                $qu = $db::Query("select * from properties WHERE proId='$proId'");
                                $r = mysqli_fetch_assoc($qu);



                                ?>

                                <tbody>

                                <tr>
                                    <td class="hidden-phone"><?php echo $i?></td>
                                    <td class="hidden-phone"><?php echo $fetch['productName']?></td>
                                    <td class="hidden-phone"><?php echo $fetch['prPrValue']?></td>
                                    <td><?php echo $fetch['prPrRegDate']?> </td>
                                    <td><?php echo $fetch['prPrRegTime']?> </td>
                                    <td><?php echo $r['proName']?> </td>
                                    <td>
                                        <a href="deletproductproperties.php?prPrId=<?php echo $fetch['prPrId']?>">

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