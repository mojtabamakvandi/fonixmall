<?php
include"inc/header.php";
?>
<?php
include "class/dataBase.php";
include "class/jdf.php";
$db=new dataBase();
$product = $db::Query("select * from slider order by pariority");
?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        لیست اسلایدر
                    </header>

                    <table class="table table-striped border-top" id="sample_1">

                        <thead>

                        <tr>
                            <th>ردیف</th>
                            <th>نام اسلایدر</th>
                            <th>نوع زیر دسته بندی</th>
                            <th>نوع دسته بندی</th>
                            <th class="hidden-phone">تاریخ ثبت</th>
                            <th>زمان ثبت</th>
                            <th>تصویر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <?php

                        ?>
                        <?php
                        $i=1;
                        if (mysqli_num_rows($product) > 0) { ?>
                            <?php


                            while ($fetched = mysqli_fetch_assoc($product)) {
                                $id = $fetched['sliderLinkId'];
                                $mode = $fetched['sliderLinkModel'];
                                $date = $fetched['sliderRegDate'];


                                if($mode==1){
                                    $select = $db::Query("SELECT * from festival where festivalId='$id'");
                                    $fetched_news = mysqli_fetch_assoc($select);
                                    $name = $fetched_news['festivalName'];
                                    $modelCat="فستیوال";

                                }
                                if($mode==2){
                                    $select = $db::Query("SELECT * from news where newsId='$id'");
                                    $fetched_news = mysqli_fetch_assoc($select);
                                    $name = $fetched_news['newsTitle'];
                                    $modelCat="خبر";

                                }
                                if($mode==3){
                                    $select = $db::Query("SELECT * from category where catId='$id'");
                                    $fetched_news = mysqli_fetch_assoc($select);
                                    $name = $fetched_news['catName'];
                                    $modelCat="دسته بندی";

                                }
                                if($mode==4){
                                    $select = $db::Query("SELECT * from subcategory where subId='$id'");
                                    $fetched_news = mysqli_fetch_assoc($select);
                                    $name = $fetched_news['subName'];
                                    $modelCat="زیردسته بندی";

                                }

                                if($mode==5){
                                    $select = $db::Query("SELECT * from categorynews where catNewsId='$id'");
                                    $fetched_news = mysqli_fetch_assoc($select);
                                    $name = $fetched_news['catNewsName'];
                                    $modelCat=" دسته بندی خبر";

                                }


                                ?>



                                <tbody>

                                <tr>
                                    <td class="hidden-phone"><?php echo $i?></td>
                                    <td class="hidden-phone"><?php echo $fetched['sliderName']?></td>
                                    <td class="hidden-phone"><?php echo $name?></td>
                                    <td class="hidden-phone"><?php echo $modelCat?></td>
                                    <td class="hidden-phone"><?php echo @$db::G2J($date)?></td>
                                    <td><?php echo $fetched['sliderRegTime']?> </td>
                                    <td style="width: 20%"><img style="    width: 20%;height: 42px;" src="upload/slider/<?php echo $fetched['sliderImg']?>.jpg" </td>



                                    <td>
                                        <a href="deleteSlider.php?sliderId=<?php echo $fetched['sliderId']?>" title="حذف">
                                        <button class="btn btn-danger btn-xs"><i class="icon-trash"></i></button>
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
