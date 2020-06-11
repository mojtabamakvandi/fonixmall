<?php
include"inc/header.php";
?>
<?php
include "class/dataBase.php";
include "class/jdf.php";
$db=new dataBase();
$catquery = $db::Query("select * from offercode,admin where admin.adminId=OCAdminId");

?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        لیست کد های تخفیف
                    </header>

                    <table class="table table-striped border-top" id="sample_1">

                        <thead>

                        <tr>
                            <th>ردیف</th>
                            <th>کد تخفیف</th>
                            <th>تعدادمورد استفاده</th>
                            <th>درصد تخفیف</th>
                            <th class="hidden-phone">تاریخ ثبت</th>
                            <th>زمان ثبت</th>
                            <th>نام مدیر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <?php
                        $i=1;
                        if (mysqli_num_rows($catquery) > 0) {

                            ?>
                            <?php
                            while ($fetch = mysqli_fetch_assoc($catquery)) {
                                $date = $fetch  ['OCRegDate'];


                                ?>

                                <tbody>

                                <tr>
                                    <td class="hidden-phone"><?php echo $i?></td>
                                    <td class="hidden-phone"><?php echo $fetch['OCCode']?></td>
                                    <td class="hidden-phone"><?php echo $fetch['OCCount']?></td>
                                    <td class="hidden-phone"><?php echo $fetch['OCPercentage']?></td>
                                    <td class="hidden-phone"><?php echo @$db::G2J($date)?></td>
                                    <td><?php echo $fetch['OCRegTime']?> </td>
                                    <td><?php echo $fetch['adminName']?> </td>
                                    <td>
                                        <a href="editOffer.php?OCid=<?php echo $fetch['OCid']?>">
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