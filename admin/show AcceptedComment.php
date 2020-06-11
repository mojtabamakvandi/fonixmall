<?php
include "inc/header.php";
?>
<?php
include "class/dataBase.php";
include "class/jdf.php";
$db = new dataBase();
$comment = $db::Query("select * from comment,user,admin where adminId=commentAdminIdAccepted AND userId=commentUserId");

?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        لیست کامنت ها
                    </header>

                    <table class="table table-striped border-top" id="sample_1">

                        <thead>

                        <tr>
                            <th>ردیف</th>
                            <th>نام کاربر</th>
                            <th>متن نظر</th>
                            <th class="hidden-phone">تاریخ ثبت</th>
                            <th>زمان ثبت</th>
                            <th>نام مدیر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <?php
                        $i = 1;
                        if (mysqli_num_rows($comment) > 0) {

                            ?>
                            <?php
                            while ($fetch = mysqli_fetch_assoc($comment)) {
                                $date = $fetch['commentRegDate'];


                                ?>

                                <tbody>

                                <tr>
                                    <td class="hidden-phone"><?php echo $i ?></td>
                                    <td class="hidden-phone"><?php echo $fetch['userName'] ?></td>
                                    <td class="hidden-phone"><?php echo $fetch['commentText'] ?></td>
                                    <td class="hidden-phone"><?php echo @$db::G2J($date)?></td>
                                    <td><?php echo $fetch['commentRegTime'] ?> </td>
                                    <td><?php echo $fetch['adminName']?> </td>

                                    <td>


                                        <button class="btn btn-danger btn-xs" ><i
                                                class="icon-remove" onclick="deleteC('<?php echo $fetch['commentId'] ?>')"></i></button>

                                    </td>
                                </tr>

                                </tbody>
                                <?php
                                $i++;
                            } ?>
                        <?php } ?>
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

<script>
    function deleteC(id) {

        $.ajax({
            url:"request/deleteComment.php",
            data:{
                id:id
            },
            dataType:"json",
            type:"POST",
            success:function (data) {
location.reload();
            }
        });
    }
</script>
<!--common script for all pages-->
<script src="js/common-scripts.js"></script>

<!--script for this page only-->
<script src="js/dynamic-table.js"></script>


</body>
</html>
