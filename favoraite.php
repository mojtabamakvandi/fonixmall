<?php include "head.php"; ?>
    <link href="CSS/Active5.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include "header.php";
    if (!isset($_SESSION['userId']) || $_SESSION['userId'] == '') { ?>
    <script>
        window.location.href="login.php";
    </script>
    <?php } ?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="line92"></div>
<div class="gradi col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <br>
    <br>
    <br>
    <br>
    <br>
</div>
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
<h3 style="text-align: center;color: #303590">محصولات مورد علاقه</h3>
<br>
<div class="iwukjfn">
<table class="start">
    <tbody class="today">
    <tr class="table-shop14" >
        <td class="liul">#</td>
        <td class="liul">نام محصول</td>
    </tr>
    <?php
        $select = $db::Query("SELECT * FROM fav where favUserId='$username'");
        $i = 1;
        while ($row = mysqli_fetch_assoc($select)){
            $prId = $row['favPrId'];
            $selectQ = $db::Query("SELECT * FROM product where productId='$prId' and product.active = true");
            $rowPr = mysqli_fetch_assoc($selectQ);
            ?>
            <tr class="vasat1">
                    <td class="liull122">
                        <a href="product.php?productId=<?php echo $rowPr['productId']?>"><?php echo $i ?></a>
                    </td>
                    <td class="liull122">
                        <a href="product.php?productId=<?php echo $rowPr['productId']?>"><?php echo $rowPr['productName'] ?></a>
                    </td>
            </tr>
            <?php
        }
    ?>

    </tbody>
</table>
</div>
<br>
<br>
<br>
<br>
<!--footer-->
<?php
include "footer.php"
?>
