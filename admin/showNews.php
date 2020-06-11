<?php
include"inc/header.php";
?>
<?php
include "class/dataBase.php";
$db=new dataBase();
$news = $db::Query("select * from news,admin,categorynews where catNewsId=newsCatNewsId AND admin.adminId=catNewsAdminId ")
?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    لیست اخبار
                    </header>

                    <table class="table table-striped border-top" id="sample_1">

                        <thead>

                        <tr>
                            <th>ردیف</th>
                            <th>دسته بندی خبر</th>
                            <th>عنوان خبر</th>
                            <th class="hidden-phone">تاریخ ثبت</th>
                            <th>زمان ثبت</th>
                            <th>نام مدیر</th>
                            <th>متن خبر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <?php
                        $i=1;
                        if (mysqli_num_rows($news) > 0) { ?>
                            <?php
                            while ($fetch = mysqli_fetch_assoc($news)) {


                                ?>

                                <tbody>

                                <tr>
                                    <td class="hidden-phone"><?php echo $i?></td>
                                    <td class="hidden-phone"><?php echo $fetch['catNewsName']?></td>
                                    <td class="hidden-phone"><?php echo $fetch['newsTitle']?></td>
                                    <td class="hidden-phone"><?php echo $fetch['newsRegDate']?></td>
                                    <td><?php echo $fetch['newsRegTime']?> </td>
                                    <td><?php echo $fetch['adminName']?> </td>
                                    <td><?php echo $fetch['newsText']?> </td>
                                    <td>
                                        <a href="editNews.php?newsId=<?php echo $fetch['newsId']?>">

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