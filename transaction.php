<?php
include "head.php";
?>
    <link href="CSS/Active5.css" rel="stylesheet">

</head>
<body>

<?php
include "header.php";
?>
<!--Navbar-->
<!--heading-->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="line92"></div>
<!--heading-->

<div class="gradi col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <br>
    <br>
    <br>
    <br>
    <br>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="parent-name">
                <h4 id="name"><?php echo $row['userName']?></h4>
                <div class="border-botton"></div>
                <h4 id="number"><?php  echo  $row['userPhonenumber']?></h4>
            </div>
            <div class="img-icon">
                <a class="center-div-icon" href="favoraite.php">
                    <div><img class="tak-img" src="IMG/Shape4.png"/>
                        <br>
                        <h5 class="tak-h5">علاقع مندی ها</h5>
                    </div>
                </a>
                <a class="center-div-icon" href="transaction.php">
                    <div><img class="tak-img" src="IMG/bars.png"/>
                        <br>
                        <h5 class="tak-h5">تراکنش ها</h5>
                    </div>
                </a>
                <a class="center-div-icon" href="EditProfile.php">
                    <div><img class="tak-img" src="IMG/resume.png"/>
                        <br>
                        <h5 class="tak-h5">ویرایش پروفایل</h5>
                    </div>
                </a>
                <a class="center-div-icon" href="LastShopping.php">
                    <div><img class="tak-img" src="IMG/checklist.png"/>
                        <br>
                        <h5 class="tak-h5">تاریخچه خرید</h5>
                    </div>
                </a>
                <a class="center-div-icon" href="sabad-kharid.php">
                    <div><img class="tak-img" src="IMG/clothing-store.png"/>
                        <br>
                        <h5 class="tak-h5">سبد خرید</h5>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-9">
            <h3 style="text-align: center;color: #303590">تراکنش های صورت گرفته</h3>
            <br/>
            <table class="start">
                <thead class="today">
                    <tr class="table-shop14w">
                        <td class="liul">#</td>
                        <td class="liul">کد پیگیری</td>
                        <td class="liul">تاریخ پرداخت</td>
                        <td class="liul">قیمت</td>
                    </tr>
                </thead>
                <tbody>

                <?php
                $user_id = $row['userId'];
                $factor_query = $db::Query("SELECT * FROM factor left join shoppingbasket on factor.shbid = shoppingbasket.SHBid where shoppingbasket.SHBUserId = '$user_id'");
                $i = 1;
                while ($factor_rows = mysqli_fetch_assoc($factor_query))
                {
                ?>
                    <tr class="table-shop14w">
                        <td class="liul"><?php echo $i ?></td>
                        <td class="liul"><?php echo $factor_rows["facId"] ?></td>
                        <td class="liul"><?php echo @$db::G2J($factor_rows["facDate"]) ?></td>
                        <td class="liul"><?php echo $factor_rows["amount"] ?></td>
                    </tr>
                <?php
                $i++;
                } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<?php
include "footer.php"
?>
