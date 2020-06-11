<?php
include"inc/header.php";
?>
<?php
include "class/dataBase.php";
$db=new dataBase();

$catquery = $db::Query("select * from user");


?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    لیست کاربران
                    </header>

                    <table class="table table-striped border-top" id="sample_1">

                        <thead>

                        <tr>
                            <th>ردیف</th>
                            <th>نام کاربر</th>
                            <th class="hidden-phone">تاریخ ثبت</th>
                            <th>شماره تلفن</th>
                            <th>آدرس ایمیل</th>
                        </tr>
                        </thead>


                                <tbody>
                                <?php
                                $i=1;
                                if (mysqli_num_rows($catquery) > 0) {

                                ?>
                                <?php
                                while ($fetch = mysqli_fetch_assoc($catquery)) {


                                ?>
                                <tr>
                                    <td class="hidden-phone"><?php echo $i?></td>
                                    <td class="hidden-phone"><?php echo $fetch['userName']?></td>
                                    <td class="hidden-phone"><?php echo $fetch['userRegDate']?></td>
                                    <td><?php echo $fetch['userPhonenumber']?> </td>
                                    <td><?php echo $fetch['userEmail']?> </td>

                                </tr>

                                <?php
                                $i++;
                            } ?>
                        <?php }?>
                                </tbody>

                    </table>

                </section>

            </div>
        </div>


    </section>
</section>

<script>
    function deleteCat(catId) {
        $.ajax({
            url: "deleteCat.php",
            data: {
                id: catId
            },
            dataType: 'json',
            type: 'POST',
            success: function (data){
            if (data["error"]){
            $("#catt").show("fast").html(data['MSG']);
            }else {
                location.reload();
            }

            }
        });
    }
</script>
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