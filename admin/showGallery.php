<?php
include"inc/header.php";
?>
<?php
include "class/dataBase.php";
$db=new dataBase();
$catquery = $db::Query("select * from gallery,product,admin WHERE galleryPrId=productId  AND galleryAdminId=adminId");

?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        لیست فستیوال ها
                    </header>

                    <table class="table table-striped border-top" id="sample_1">

                        <thead>

                        <tr>
                            <th>ردیف</th>
                            <th>عکس</th>
                            <th class="hidden-phone">تاریخ ثبت</th>
                            <th>زمان ثبت</th>
                            <th>نام مدیر</th>
                            <th>نوع عکس</th>
                            <th>حذف</th>

                        </tr>
                        </thead>
                        <?php
                        $i=1;
                        if (mysqli_num_rows($catquery) > 0) {

                            ?>
                            <?php
                            while ($fetch = mysqli_fetch_assoc($catquery)) {
                                if($fetch['galleryStatus']=='1'){
                                    $image='تصویر شاخص';
                                }elseif ($fetch['galleryStatus']=='0'){
                                    $image='تصاویر گالری';
                                }

                                ?>

                                <tbody>

                                <tr>
                                    <td class="hidden-phone"><?php echo $i?></td>
                                    <td style="width: 20%"><img style="    width: 20%;height: 42px;" src="upload/gallery/<?php echo $fetch['galleryImg']?>" </td>
                                    <td class="hidden-phone"><?php echo $fetch['galleryRegDate']?></td>
                                    <td class="hidden-phone"><?php echo $fetch['galleryRegTime']?></td>
                                    <td class="hidden-phone"><?php echo $fetch['adminName']?></td>
                                    <td class="hidden-phone"><?php echo $image?></td>
                                    <td>
                                        <a href="deletGallery.php?galleryId=<?php echo $fetch['galleryId']?>">
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