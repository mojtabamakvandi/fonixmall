<?php
include"inc/header.php";
?>
<?php
include "class/dataBase.php";
include "class/jdf.php";
$db=new dataBase();
$product = $db::Query("select * from product,subcategory,category,brand,admin WHERE subId=productSubCatid AND catId=subCatId AND brandId=productBrandId AND product.productAdminId=admin.adminId order by productId desc");
?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        لیست محصولات
                    </header>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-responsive table-hover" id="sample_1">
                                    <thead>
                                    <tr>
                                        <th><i class="icon-sort"></i> ردیف </th>
                                        <th><i class="icon-sort"></i> نام محصول </th>
                                        <th><i class="icon-sort"></i> قیمت </th>
                                        <th class="hidden-phone"> تاریخ ثبت <i class="icon-sort"></i></th>
                                        <th><i class="icon-sort"></i> زمان ثبت </th>
                                        <th><i class="icon-sort"></i> نام مدیر </th>
                                        <th><i class="icon-sort"></i> نوع دسته بندی </th>
                                        <th><i class="icon-sort"></i> نوع زیر دسته بندی </th>
                                        <th><i class="icon-sort"></i> برند </th>
                                        <th><i class="icon-sort"></i> گارانتی </th>
                                        <th><i class="icon-sort"></i> توضیحات محصول </th>
                                        <th><i class="icon-sort"></i> تخفیف محصول </th>
                                        <th><i class="icon-sort"></i> فعال/غیرفعال </th>
                                        <th>ورایش</th>
                                        <th>حذف</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i=1;
                                    if (mysqli_num_rows($product) > 0) { ?>
                                        <?php
                                        while ($fetch = mysqli_fetch_assoc($product)) {
                                            $date = $fetch['productRegDate'];
                                            ?>
                                            <tr>
                                                <td class="hidden-phone"><?php echo $i?></td>
                                                <td class="hidden-phone"><?php echo $fetch['productName']?></td>
                                                <td class="hidden-phone"><?php echo $fetch['productPrice']?></td>
                                                <td class="hidden-phone"><?php echo @$db::G2J($date)?></td>
                                                <td><?php echo $fetch['productRegTime']?> </td>
                                                <td><?php echo $fetch['adminName']?> </td>
                                                <td><?php echo $fetch['catName']?> </td>
                                                <td><?php echo $fetch['subName']?> </td>
                                                <td><?php echo $fetch['brand']?> </td>
                                                <td><?php echo $fetch['guarantee']?> </td>
                                                <td><?php echo $fetch['Description']?> </td>
                                                <td><?php echo $fetch['offer']?> </td>
                                                <td><?php if($fetch['active']) echo "فعال"; else echo "غیر فعال"; ?></td>
                                                <td>
                                                    <a href="productEdit.php?productId=<?php echo $fetch['productId']?>">
                                                        <button class="btn btn-warning btn-xs" title="ویرایش محصول"><i class="icon-edit"></i></button>
                                                </td>
                                                <td>
                                                    <a href="deleteProuduct.php?productId=<?php echo $fetch['productId']?>">
                                                        <button class="btn btn-danger btn-xs" title="حذف محصول"><i class="icon-trash"></i></button>
                                                </td>
                                            </tr>
                                            <?php
                                            $i++;
                                        } ?>
                                    <?php }?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th> ردیف </th>
                                        <th> نام محصول </th>
                                        <th> قیمت </th>
                                        <th> تاریخ ثبت </th>
                                        <th> زمان ثبت </th>
                                        <th> نام مدیر </th>
                                        <th> نوع دسته بندی </th>
                                        <th> نوع زیر دسته بندی </th>
                                        <th> برند </th>
                                        <th> گارانتی </th>
                                        <th> توضیحات محصول </th>
                                        <th> تخفیف محصول </th>
                                        <th> فعال/غیرفعال </th>
                                        <th>ورایش</th>
                                        <th>حذف</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
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
