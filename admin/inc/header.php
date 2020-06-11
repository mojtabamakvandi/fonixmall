<?php
session_start();
if(!isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']!=true){
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>پنل مدیریت فروشگاه پیراتیل</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/all.min.css">
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <script src="../js/all.min.js"></script>

    <![endif]-->
</head>
<style>

.fas{
    font-family: "Font Awesome 5 Free";
}</style>
<body>

<section id="container" class="">
    <!--header start-->
    <header class="header white-bg">

        <!--logo start-->
        <a href="#" class="logo">فروشگاه<span>پیراتیل</span></a>
        <!--logo end-->

        <div class="top-nav ">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">

                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="img/avatar1_small.jpg">
                        <span class="username"><?php echo $_SESSION['adminName']?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li><a href="#"><i class=" icon-suitcase"></i>پروفایل</a></li>
                        <li><a href="#"><i class="icon-cog"></i> تنظیمات</a></li>
                        <li><a href="logOut.php"><i class="icon-key"></i> خروج</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu">
                <li class="active">
                    <a class="" href="index.php">
                        <i class="icon-dashboard"></i>
                        <span>صفحه اصلی</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-male"></i>
                        <span>کنترل مدیر ها</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="manager_list.php">لیست مدیران</a></li>
                        <li><a class="" href="Admin_registration.php">اضافه کردن مدیر</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-tasks"></i>
                        <span>مدیریت دسته بندی</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="addMenu.php">اضافه کردن منو بالا</a></li>
                        <li><a class="" href="products_categorization.php">اضافه کردن دسته بندی</a></li>
                        <li><a class="" href="Sub_category.php">اضافه کردن زیر دسته بندی</a></li>
                        <li><a class="" href="Sub_Sub_category.php">اضافه کردن زیر زیر دسته بندی</a></li>
                        <li><a class="" href="brand.php">اضافه کردن برند</a></li>
                        <li><a class="" href="cat_list.php">لیست دسته بندی</a></li>
                        <li><a class="" href="SubCatList.php">لیست زیر دسته بندی</a></li>
                        <li><a class="" href="SubSubCatList.php">لیست زیر زیر دسته بندی</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-shopping-cart"></i>
                        <span>مدیریت محصولات</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="product.php">اضافه کردن محصول جدید</a></li>
                        <li><a class="" href="productList.php">لیست محصولات</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-dashboard"></i>
                        <span>مدیریت رنگ </span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="colors.php">اضافه کردن رنگ جدید</a></li>
                        <li><a class="" href="colorList.php">لیست رنگها</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-comment"></i>
                        <span>کامنت ها</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="showComment.php"> کامنت های تایید نشده</a></li>
                        <li><a class="" href="show%20AcceptedComment.php">کامنت های تایید شده</a></li>
                        <li><a class="" href="charts.html">چارت</a></li>
                    </ul>
                </li>
<!--                <li class="sub-menu">-->
<!--                    <a href="javascript:;" class="">-->
<!--                        <i class="icon-pencil"></i>-->
<!--                        <span>خبر</span>-->
<!--                        <span class="arrow"></span>-->
<!--                    </a>-->
<!--                    <ul class="sub">-->
<!--                        <li><a class="" href="catNews.php"> دسته بندی خبر</a></li>-->
<!--                        <li><a class="" href="showNewsCat.php">نمایش دسته بندی خبر</a></li>-->
<!--                        <li><a class="" href="addNews.php">اضافه کردن خبر</a></li>-->
<!--                        <li><a class="" href="showNews.php">نمایش خبرها</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-dollar"></i>
                        <span>کد تخفیف </span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="offer.php">افزودن کد تخفیف</a></li>
                        <li><a class="" href="showOffercode.php">لیست کد ها</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-magic"></i>
                        <span>جشنواره</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="festival.php">افزودن فستیوال</a></li>
                        <li><a class="" href="showFestival.php">لیست فستیوال ها</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-circle"></i>
                        <span>استان</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="province.php">افزودن استان</a></li>
                        <li><a class="" href="showProvince.php">لیست استان ها</a></li>
                        <li><a class="" href="city.php">افزودن شهر</a></li>
                        <li><a class="" href="showCity.php">نمایش شهرها</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-camera"></i>
                        <span>اسلایدر</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="slider.php">افزودن اسلایدر</a></li>
                        <li><a class="" href="showSlider.php">نمایش اسلایدر</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-shopping-cart"></i>
                        <span>محصولات جشنواره</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="addFestivalpro.php">اضفه کردن محصول</a></li>
                        <li><a class="" href="showProFes.php">لیست فستیوال ها</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-shopping-cart"></i>
                        <span>محصولات تخفیف دار</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="addSpecialOffer.php"> تخفیف محصولات</a></li>
                        <li><a class="" href="showSpOffer.php">لیست تخفیف</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-magic"></i>
                        <span>ویژگی محصولات</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="addProperties.php">اضافه کردن ویژگی ها</a></li>
                        <li><a class="" href="showProperties.php">لیست ویژگی ها</a></li>
                        <li><a class="" href="productproperties.php">اضافه کردن محصول</a></li>
                        <li><a class="" href="showProductProreties.php">لیست محصولات</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-camera"></i>
                        <span>گالری</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="gallery.php">اضافه کردن تصویر</a></li>
                        <li><a class="" href="showGallery.php">نمایش تصاویر گالری</a></li>


                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-list"></i>
                        <span>منوی فوتر</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="footerMenu.php">اضافه کردن منو</a></li>
                        <li><a class="" href="footerMenuShow.php">نمایش منو ها</a></li>


                    </ul>
                </li>

            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
