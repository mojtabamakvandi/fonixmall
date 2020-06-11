<?php
include"inc/header.php";
?>
<?php
include "class/dataBase.php";
include "class/jdf.php";
$db=new dataBase();
$catquery1 = $db::Query("select * from subcategory,category where category.catId=subCatId ")
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
                            <th>نام محصول (زیردسته بندی)</th>
                            <th class="hidden-phone">تاریخ ثبت</th>
                            <th>زمان ثبت</th>
                            <th>نوع دسته بندی</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                                                                                <tbody>

                        <?php
                        $i=1;

                        if (mysqli_num_rows($catquery1) > 0) { ?>
                            <?php
                            while ($fetch = mysqli_fetch_assoc($catquery1)) {
                                $id = $fetch['subId'];
                                $date = $fetch['subRegDate'];
                                $PrSelect = $db::Query("SELECT * FROM product where productSubCatid='$id'",$db::$NUM_ROW);

                                ?>


                                <tr>
                                    <td class="hidden-phone"><?php echo $i?></td>
                                    <td class="hidden-phone"><?php echo $fetch['subName']?></td>
                                    <td class="hidden-phone"><?php echo @$db::G2J($date)?></td>
                                    <td><?php echo $fetch['subRegTime']?> </td>
                                    <td><?php echo $fetch['catName']?> </td>
                                    <td>
                                        <a href="editSub.php?subId=<?php echo $fetch['subId']?>">
                                        <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
                                    </td>
                                    <td>
                                        <?php
                                        if($PrSelect!=0){
                                            ?>
                                        <a href="deleteSub.php?subId=<?php echo $fetch['subId']?>">
                                            <button class="btn btn-danger btn-xs"><i class="icon-pencil"></i></button>
                                            <?php
                                        }
                                        ?>


                                    </td>
                                </tr>

                                <?php
                                $i++;
                            } ?>
                        <?php 
                            
                        }
                        ?>
                                                        </tbody>

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