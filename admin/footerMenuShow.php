<?php
include"inc/header.php";
?>
<?php
include "class/dataBase.php";
$db=new dataBase();
$product = $db::Query("select * from footermenu,news WHERE footerMenuContentId=newsId");
//                                    $select = $db::Query("SELECT * FROM product,category,subcategory where catId=subCatId && subName=productSubCatid");

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
                            <th>نام منو</th>
                            <th class="hidden-phone">تاریخ ثبت</th>
                            <th>زمان ثبت</th>
                            <th>چیدمان</th>
                            <th>عنوان خبر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <?php
                        $i=1;
                        if (mysqli_num_rows($product) > 0) { ?>
                            <?php
                            while ($fetch = mysqli_fetch_assoc($product)) {


                                ?>

                                <tbody>

                                <tr>
                                    <td class="hidden-phone"><?php echo $i?></td>
                                    <td class="hidden-phone"><?php echo $fetch['footerMenuName']?></td>
                                    <td class="hidden-phone"><?php echo $fetch['footerMenuRegDate']?></td>
                                    <td class="hidden-phone"><?php echo $fetch['footerMenuRegTime']?></td>
                                    <td><?php echo $fetch['footerMenuSort']?> </td>
                                    <td><?php echo $fetch['newsTitle']?> </td>


                                    <td>
                                        <a href="deleteFooterMenu.php?footerMenuId=<?php echo $fetch['footerMenuId']?>">

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
