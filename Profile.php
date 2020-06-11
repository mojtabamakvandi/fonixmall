<?php

include "head.php";
?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   <style>
       .nav-pills>li.active>a {
           background-color: #ff2b63;
           color: black;
       }
       .nav-pills>li.active>a:hover {
           background-color: rgba(255, 47, 105, 0.58);

       }

       .nav-pills>li>a {
           background-color: #acafb1;
           margin-bottom:5px;
           color: black;
       }
       .nav-pills>li>a:hover {
           background-color: rgba(255, 43, 99, 0.4);
       }
   </style>

    </head>
    <body>
<?php
include "header.php";
if (!isset($_SESSION['userId']) || $_SESSION['userId'] == '') {
    ?>
    <script>
        window.location.href = "login.php";
    </script>
    <?php
}
?>
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12" style="height: 30px"></div>
        <div class="col-md-9 text-right">
            <div id="Profile" class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">اطلاعات شخصی</h3>
                </div>
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">

                                    <?php
                                    $group_id = $row['group_id'];
                                    $group_query = $db::Query("SELECT * FROM groups WHERE id='$group_id'");
                                    $group_row = mysqli_fetch_assoc($group_query);
                                    ?>

                                    <?php
                                    if($group_id>1){
                                    ?>
                                    <span><img src="<?php echo '/crm/img/'.$group_row['id'].'.png' ?>" style="width: 100px"/></span>
                                    <?php } else { ?>
                                        <label for="">گروه</label>
                                        <br/>
                                    <span><p class="lead"><?php echo $group_row['name'] ?></p></span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">نام و نام خانوادگی</label>
                                    <br/>
                                    <p class="lead"><?php echo $row['userName'].' '.$row['userFamily'] ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">ایمیل</label>
                                    <br/>
                                    <p class="lead"><?php echo $row['userEmail'] ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">شماره موبایل</label>
                                    <br/>
                                    <p class="lead"><?php echo $row['userPhonenumber'] ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">کد ملی</label>
                                    <br/>
                                    <p class="lead"><?php echo $row['userNcode'] ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">تاریخ تولد</label>
                                    <br/>
                                    <p class="lead"><?php echo $row['userBday'] ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">تاریخ ثبت نام</label>
                                    <br/>
                                    <p class="lead"><?php echo @$db::G2J($row['userRegDate']) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-center">
                    <a href="EditProfile.php" class="btn btn-link">ویرایش اطلاعات شخصی</a>
                </div>
            </div>
            <div id="Fav" class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">علاقه مندی ها</h3>
                </div>
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row">
                            <table class="table table-bordered table-responsive table-hover">
                                <tbody>
                                <?php
                                $user_id = $row['userId'];
                                $select = $db::Query("SELECT * FROM fav where favUserId='$user_id' order by favId DESC LIMIT 5");
                                $i = 1;
                                while ($row1 = mysqli_fetch_assoc($select)){
                                    $prId = $row1['favPrId'];
                                    $selectQ = $db::Query("SELECT * FROM product where productId='$prId' and product.active = true");
                                    $rowPr = mysqli_fetch_assoc($selectQ);
                                    ?>
                                    <tr>
                                        <td style="width: 50px" class="text-center">
                                            <br/>
                                            <br/>
                                            <a href="" onclick="deleteFav('<?php echo $row1['favId'] ?>')" class="btn btn-default"><i class="fa fa-trash"></i></a>
                                        </td>
                                        <td style="width: 150px" class="text-center">
                                            <br/>
                                            <br/>
                                            <?php echo @$db::toMoney($rowPr['productPrice']-$rowPr['offer']) ?>
                                        </td>
                                        <td style="word-wrap: break-word">
                                            <br/>
                                            <br/>
                                            <a href="product.php?productId=<?php echo $rowPr['productId']?>"><?php echo $rowPr['productName']?></a>
                                        </td>
                                        <td style="width: 150px" class="text-center">
                                            <?php
                                            $PrIdGallery = $rowPr['productId'];
                                            $selectImg = $db::Query("SELECT galleryImg FROM gallery where galleryPrId='$PrIdGallery' and galleryStatus = 1");
                                            $rowImg = mysqli_fetch_assoc($selectImg);
                                            ?>
                                            <img class="img-thumbnail" src="admin/upload/gallery/<?php echo $rowImg['galleryImg']?>.jpg"/>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-center">
                    <a href="" class="btn btn-link">مشاهده و ویرایش لیست علاقه مندی ها</a>
                </div>
            </div>
            <div id="Transaction" class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">تراکنش ها</h3>
                </div>
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row">
                            <table class="table table-bordered table-responsive table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">مبلغ</th>
                                        <th class="text-center">ساعت</th>
                                        <th class="text-center">تاریخ</th>
                                        <th class="text-center">کد رهگیری</th>
                                        <th class="text-center">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $user_id = $row['userId'];
                                $trans_query = $db::Query("SELECT * FROM factor left join shoppingbasket on factor.shbid = shoppingbasket.SHBid where shoppingbasket.SHBUserId = '$user_id' order by facId DESC LIMIT 5");
                                $i = 1;
                                while ($trans_rows = mysqli_fetch_assoc($trans_query)){
                                    ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo @$db::toMoney($trans_rows["amount"]) ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $trans_rows["facTime"] ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo @$db::G2J($trans_rows["facDate"]) ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $trans_rows["facId"] ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $i ?>
                                        </td>

                                    </tr>
                                    <?php $i++;
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-center">
                    <a href="" class="btn btn-link">مشاهده همه تراکنش ها</a>
                </div>
            </div>
            <div id="Shopping" class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">تاریخچه خرید</h3>
                </div>
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row">
                            <table class="table table-bordered table-responsive table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">مبلغ</th>
                                    <th class="text-center">ساعت</th>
                                    <th class="text-center">تاریخ</th>
                                    <th class="text-center">عنوان محصول</th>
                                    <th class="text-center">تصویر محصول</th>
                                    <th class="text-center">#</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $user_id = $row['userId'];
                                $shb_query = $db::Query("SELECT * FROM productshb left join product on productshb.PSHBPrId=product.productId left join shoppingbasket on productshb.PSHBSHBId=shoppingbasket.SHBid LEFT JOIN factor ON factor.shbId=shoppingbasket.SHBid left join gallery on product.productId=galleryPrId where galleryStatus='1' AND shoppingbasket.SHBPay = '1' AND shoppingbasket.SHBUserId = '$user_id' order by factor.facId DESC LIMIT 5");
                                $i = 1;
                                while ($shb_rows = mysqli_fetch_assoc($shb_query)){
                                    ?>
                                    <tr>
                                        <td class="text-center">
                                            <br/>
                                            <br/>
                                            <?php echo @$db::toMoney($shb_rows["amount"]) ?>
                                        </td>
                                        <td class="text-center">
                                            <br/>
                                            <br/>
                                            <?php echo $shb_rows["facTime"] ?>
                                        </td>
                                        <td class="text-center">
                                            <br/>
                                            <br/>
                                            <?php echo @$db::G2J($shb_rows["facDate"]) ?>
                                        </td>
                                        <td class="text-center">
                                            <br/>
                                            <br/>
                                            <a href="product.php?productId=<?php echo $shb_rows['productId']?>">
                                                <?php echo $shb_rows["productName"] ?></a>
                                        </td>
                                        <td class="text-center" width="150">

                                            <a href="product.php?productId=<?php echo $shb_rows['productId']?>">
                                                <img src="<?php echo 'admin/upload/gallery/'.$shb_rows["galleryImg"].'.jpg' ?>" class="img-thumbnail"/></a>
                                        </td>
                                        <td class="text-center">
                                            <br/>
                                            <br/>
                                            <?php echo $i ?>
                                        </td>

                                    </tr>
                                    <?php $i++;
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-center">
                    <a href="" class="btn btn-link">مشاهده همه محصولات خریداری شده</a>
                </div>
            </div>
            <div id="Comments" class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">نظرات شما</h3>
                </div>
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row">
                            <table class="table table-bordered table-responsive table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">ساعت</th>
                                    <th class="text-center">تاریخ</th>
                                    <th class="text-center">متن نظر</th>
                                    <th class="text-center">عنوان محصول</th>
                                    <th class="text-center">تصویر محصول</th>
                                    <th class="text-center">#</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $user_id = $row['userId'];
                                $comment_query = $db::Query("SELECT * FROM comment left join product on comment.commentProductId=product.productId left join gallery on product.productId=galleryPrId where galleryStatus='1' AND comment.commentUserId = '$user_id' and comment.commentAdminIdAccepted > 1 order by commentId DESC LIMIT 5");
                                $i = 1;
                                while ($comment_rows = mysqli_fetch_assoc($comment_query)){
                                    ?>
                                    <tr>

                                        <td class="text-center">
                                            <br/>
                                            <br/>
                                            <?php echo $comment_rows["commentRegTime"] ?>
                                        </td>
                                        <td class="text-center">
                                            <br/>
                                            <br/>
                                            <?php echo @$db::G2J($comment_rows["commentRegDate"]) ?>
                                        </td>
                                        <td class="text-center">
                                            <br/>
                                            <br/>
                                            <?php echo $comment_rows["commentText"] ?>
                                        </td>
                                        <td class="text-center">
                                            <br/>
                                            <br/>
                                            <a href="product.php?productId=<?php echo $comment_rows['productId']?>">
                                                <?php echo $comment_rows["productName"] ?></a>
                                        </td>
                                        <td class="text-center" width="150">

                                            <a href="product.php?productId=<?php echo $comment_rows['productId']?>">
                                                <img src="<?php echo 'admin/upload/gallery/'.$comment_rows["galleryImg"].'.jpg' ?>" class="img-thumbnail"/></a>
                                        </td>
                                        <td class="text-center">
                                            <br/>
                                            <br/>
                                            <?php echo $i ?>
                                        </td>

                                    </tr>
                                    <?php $i++;
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-center">
                    <a href="" class="btn btn-link">مشاهده همه نظرات شما</a>
                </div>
            </div>
            <div id="Address" class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">آدرس های من</h3>
                </div>
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row text-right">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">کد پستی</label>
                                    <input type="text" class="form-control" id="txtPostCode"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">شهر</label>
                                    <select id="txtCity" class="form-control">
                                        <option selected disabled> شهر خود را انتخاب کنید</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">استان</label>
                                    <select id="txtProvince" onchange="getCity()" class="form-control">
                                        <option selected disabled>استان خود را انتخاب کنید</option>
                                        <?php
                                        $select2 = $db::Query("SELECT * FROM province");
                                        while ($fetch = mysqli_fetch_assoc($select2)) {
                                            ?>
                                            <option value="<?php echo $fetch['provinceId'] ?>" ><?php echo $fetch['provinceName'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">آدرس</label>
                                    <input type="text" class="form-control" id="txtAddress"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="button" onclick="submit()" class="btn btn-success"><i class="fa fa-plus"></i>  افزودن آدرس  </button>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <table class="table table-bordered table-responsive table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">حذف</th>
                                    <th class="text-center">ساعت</th>
                                    <th class="text-center">تاریخ</th>
                                    <th class="text-center">کدپستی</th>
                                    <th class="text-center">آدرس</th>
                                    <th class="text-center">شهر</th>
                                    <th class="text-center">استان</th>
                                    <th class="text-center">#</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $user_id = $row['userId'];
                                $address_query = $db::Query("SELECT * FROM address left join province on address.addressProvinceId=province.provinceId left join city on address.addressCityId=cityId where address.addressUserId = '$user_id' order by addressId DESC LIMIT 5");
                                $i = 1;
                                while ($address_rows = mysqli_fetch_assoc($address_query)){
                                    ?>
                                    <tr>
                                        <td style="width: 50px" class="text-center">

                                            <a href="" onclick="deleteadd('<?php echo $address_rows['addressId'] ?>')" class="btn btn-default"><i class="fa fa-trash"></i></a>
                                        </td>
                                        <td class="text-center">

                                            <?php echo $address_rows["regTime"] ?>
                                        </td>
                                        <td class="text-center">

                                            <?php echo @$db::G2J($address_rows["regDate"]) ?>
                                        </td>
                                        <td class="text-center">

                                            <?php echo $address_rows["postCode"] ?>
                                        </td>
                                        <td class="text-center">

                                            <?php echo $address_rows["addressText"] ?>
                                        </td>
                                        <td class="text-center">

                                            <?php echo $address_rows["cityName"] ?>
                                        </td>
                                        <td class="text-center">

                                            <?php echo $address_rows["provinceName"] ?>
                                        </td>
                                        <td class="text-center">

                                            <?php echo $i ?>
                                        </td>

                                    </tr>
                                    <?php $i++;
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'ProfileMenu.php'?>
    </div>
</div>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="تغییر رمز عبور">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            ...
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    function removeActiveFromAll(){
        $("#btnProfile").removeClass("active");
        $("#btnProfile").removeClass("active");
        $("#btnFav").removeClass("active");
        $("#btnTransaction").removeClass("active");
        $("#btnShopping").removeClass("active");
        $("#btnComments").removeClass("active");
        $("#btnAddress").removeClass("active");
    }

    function hideAllPanels(){
        $("#Profile").hide();
        $("#Fav").hide();
        $("#Transaction").hide();
        $("#Shopping").hide();
        $("#Comments").hide();
        $("#Address").hide();
    }


    $(document).ready(function () {
        hideAllPanels();
        $("#Profile").fadeIn();
        $("#btnProfile").click(function () {
            removeActiveFromAll();
            hideAllPanels();
            $("#Profile").fadeIn();
            $("#btnProfile").addClass("active");
        });
        $("#btnFav").click(function () {
            removeActiveFromAll();
            hideAllPanels();
            $("#Fav").fadeIn();
            $("#btnFav").addClass("active");
        });
        $("#btnTransaction").click(function () {
            removeActiveFromAll();
            hideAllPanels();
            $("#Transaction").fadeIn();
            $("#btnTransaction").addClass("active");
        });
        $("#btnShopping").click(function () {
            removeActiveFromAll();
            hideAllPanels();
            $("#Shopping").fadeIn();
            $("#btnShopping").addClass("active");
        });
        $("#btnComments").click(function () {
            removeActiveFromAll();
            hideAllPanels();
            $("#Comments").fadeIn();
            $("#btnComments").addClass("active");
        });
        $("#btnAddress").click(function () {
            removeActiveFromAll();
            hideAllPanels();
            $("#Address").fadeIn();
            $("#btnAddress").addClass("active");
        });
    });

    function deleteFav(favId) {
        $.ajax({
            url: 'request/delFav.php',
            data: {
                favId: favId
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                location.reload();
            }
        })
    }
    function deleteadd(addressId) {
        $.ajax({
            url: 'request/delAddress.php',
            data: {
                addressId: addressId
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                location.reload();
            }
        })
    }

    function submit() {
        var postCode = $("#txtPostCode").val();
        var province = $("#txtProvince").val();
        var city = $("#txtCity").val();
        var ady = $("#txtAddress").val();


        $.ajax({
            url: "request/addAdres.php",
            data: {

                postCode: postCode,
                province: province,
                city: city,
                ady: ady,

            },
            dataType: 'json',
            type: 'POST',
            success: function () {
                location.reload();
                removeActiveFromAll();
                hideAllPanels();
                $("#Address").fadeIn();
                $("#btnAddress").addClass("active");
            }
        });

    }

    function getCity() {
        var province = $("#txtProvince").val();
        $.ajax({
            url: "request/getCity.php",
            data: {
                provinceId: province
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                if (!data['error']) {
                    $("#city").html(" <option selected disabled>استان خود را انتخاب کنید</option>");
                    for (var i = 0; i < data['city'].length; i++) {
                        $("#txtCity").append('<option value="' + data['city'][i]['id'] + '">' + data['city'][i]['name'] + '</option>');
                    }
                }
            }
        });
    }
</script>
<?php
include "footer.php"
?>
