<?php
include"inc/header.php";
?>
<?php
include "class/dataBase.php";
$db=new dataBase();
$catquery1 = $db::Query("select * from subsubcategory,admin,subcategory where subcategory.subId=subsubCatId && admin.adminId=subsubAdminId")
?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                <div class="container">
                    <header class="panel-heading">
                        لیست زیر دسته بندی
                    </header>

                    <table class="table table-bordered border-top" id="sample_1">

                        <thead>

                        <tr>
                            <th>ردیف</th>
                            <th>نام زیرزیردسته بندی</th>
                            <th class="hidden-phone">تاریخ ثبت</th>
                            <th>زمان ثبت</th>
                            <th>نام مدیر</th>
                            <th>زیردسته بندی</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <?php
                        $i=1;
                        if (mysqli_num_rows($catquery1) > 0) { ?>
                            <?php
                            while ($fetch = mysqli_fetch_assoc($catquery1)) {
                                $id = $fetch['subsubId'];
                                $PrSelect = $db::Query("SELECT * FROM product where productSubSubCatid='$id'",$db::$NUM_ROW);

                                ?>

                                <tbody>

                                <tr>
                                    <td class="hidden-phone"><?php echo $i?></td>
                                    <td class="hidden-phone"><?php echo $fetch['subsubName']?></td>
                                    <td class="hidden-phone"><?php echo $fetch['subsubRegDate']?></td>
                                    <td><?php echo $fetch['subsubRegTime']?> </td>
                                    <td><?php echo $fetch['adminName']?> </td>
                                    <td><?php echo $fetch['subName']?> </td>
                                    <td>
                                        <a href="editSubSub.php?subsubId=<?php echo $fetch['subsubId']?>">
                                        <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
                                    </td>
                                    <td>
                                        <a href="deleteSubSub.php?subsubId=<?php echo $fetch['subsubId']?>">
                                            <button class="btn btn-danger btn-xs"><i class="icon-pencil"></i></button>
                                    </td>
                                </tr>

                                </tbody>
                                <?php
                                $i++;
                            } ?>
                        <?php }?>
                    </table>
                    </div>                      
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