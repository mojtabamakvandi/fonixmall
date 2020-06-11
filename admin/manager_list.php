<?php
include"inc/header.php";
?>
<?php
include "class/dataBase.php";
$db=new dataBase();
$query = $db::Query("select * from admin")
?>
<section id="main-content">
    <section class="wrapper">
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                لیست مدیران

            </header>

            <table class="table table-striped border-top" id="sample_1">

                <thead>

                <tr>
                    <th>ردیف</th>
                    <th>نام کاربری</th>
                    <th class="hidden-phone">سطح</th>
                    <th>نام</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <?php
                $i=1;
                if (mysqli_num_rows($query) > 0) { ?>
                    <?php
                    while ($fetch = mysqli_fetch_assoc($query)) {
                        if($fetch['adminLevel']=='1'){
                            $level='مدیریت فروشگاه';
                        }elseif ($fetch['adminLevel']=='2'){
                            $level='همکاری در فروش';
                        }

                        ?>

                <tbody>

                <tr>
                    <td class="hidden-phone"><?php echo $i?></td>
                    <td class="hidden-phone"><?php echo $fetch['adminUsername']?></td>
                    <td class="hidden-phone"><?php echo $level?></td>
                    <td><?php echo $fetch['adminName']?> </td>
                    <td>
                        <a href="EditManeger.php?adminId=<?php echo $fetch['adminId']?>">
                        <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
                        </a>
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

<!-- js placed at the end of the document so the pages load faster -->
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