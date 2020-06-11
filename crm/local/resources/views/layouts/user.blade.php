<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>پنل کاربری</title>
    <link rel="stylesheet" href="{{asset('css/user.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('/css/rainbow.css?id=1')}}">
    <script src="{{asset('js/user.js')}}"></script>
</head>
<body>
<div class="wrapper" id="app">
    <header class="header_section">
        <div class="nav">
            <div class="message_header-box">
                <div class="container">
                    <div class="discount">
                        تخفیف پاییزه فونیکس مال ، برای اطلاع از جزئیات تخفیف <a href="#"><button class="discount"> اینجا </button></a> کلیک کنید
                    </div>
                </div>
            </div>

            <div class="header_top_menu d-none">
                <div class="container d-none">
                    <ul>
                        <li><a href="#" rel="nofollow">کانال تلگرام</a></li>
                        <li><a href="#">درباره ما</a></li>
                        <li><a href="#">همکاری با ما</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">سوالات متداول</a></li>
                        <li><a href="#">ارتباط با ما</a></li>
                    </ul>
                </div>
            </div>

            <nav class="nav_section container">
                <h3 class="title"><a href="#">پنل مشتریان <span>فونیکس مال</span></a></h3>
                <div class="header_action">
                    <div class="user_menu_panel">
                        <div class="box_info">
                            <div class="notification-badge notification-badge-warning"><span>۵</span></div>
                            <div class="image">
                                <img src="https://www.gravatar.com/avatar/333a51c2d115a6570775dc5c3a20580d?s=50&amp;d=mm&amp;r=g" alt="description">
                            </div>
                        </div>
                        <span>پروفایل من</span>
                        <i aria-hidden="true" class="fa fa-angle-down"></i>
                        <div class="dropdown-menu">
                            <nav class="submenu">
                                <a href="#" class="submenu-item">
                                    <span class="icon fa fa-user"></span>
                                    <span class="name">ناحیه کاربری</span>
                                </a>
                                <a href="#" class="submenu-item">
                                    <span class="icon fa fa-address-card"></span>
                                    <span class="name">مشاهده پروفایل</span>
                                </a>
                                <a href="#" class="submenu-item">
                                    <div class="submenu-item__right">
                                        <span class="icon fa fa-bullhorn"></span>
                                        <span class="name">اعلانات</span>
                                    </div>
                                </a>
                                <a href="#" class="submenu-item">
                                    <div class="submenu-item__right">
                                        <span class="icon fa fa-envelope"></span>
                                        <span class="name">پیام‌ها</span>
                                    </div>
                                </a>
                                <a  href="#" class="submenu-item">
                                    <div class="submenu-item__right">
                                        <span class="icon fa fa-tasks"></span>
                                        <span class="name">کارهای لازم</span>
                                    </div>
                                    <span class="count count-warning">۵ مورد</span>
                                </a>
                                <a href="#" class="submenu-item">
                                    <span class="icon fa fa-sign-out"></span>
                                    <span class="name">خروج</span>
                                </a>
                            </nav>
                        </div>
                    </div>

                </div>
                <div class="hamburger_menu">
                    <i class="fa fa-bars" id="hamburger_menu" ref="hamburgerMenu" @click="hamburgerMenu($event)" aria-hidden="true"></i>
                </div>
            </nav>
        </div>



        <div class="header_menu_toggle container" id="header_menu_toggle" ref="header_menu_toggle">
            <ul>
                <li class="no-action">
                    <form class="search_box" action="#">
                        <input type="text" name="search" placeholder="دنبال چی میگردی ؟">
                    </form>
                </li>
                <li><a href="/">فروشگاه</a></li>
                <li><a href="#">پنل کاربری</a></li>
                <li><a href="#">مشاهده پروفایل</a></li>
                <li><a href="#">آخرین تخفیفات</a></li>
                <li><a href="#" rel="nofollow">کانال تلگرام</a></li>
                <li><a href="#">ارتباط با ما</a></li>
                <li><a href="#">خروج</a></li>
            </ul>
        </div>

        <div class="header_menu">
            <ul class="container">
                <li><a href="/">فروشگاه</a></li>
            </ul>
        </div>


    </header>
    <div class="co-padding gray_bg">
        <div class="user_panel container">
            <div class="user_panel--head">
                <h2 class="title">پنل کاربری</h2>
            </div>
            <div class="user_panel--main">
                <div class="sidebar">
                    <ul class="tabs" id="user-panel">
                        <li class="tab-item dropdown-open tab-active menu">
                            <div class="tab-item-content">
                                <i class="fa fa-id-card"></i>
                                <a href="#">اطلاعات کاربری</a>
                            </div>
                            <ul class="panel-menu-dropdown">
                                <li class="dropdown-item"><a href="#">مشخصات کاربری</a></li>
                                <li class="dropdown-item"><a href="#">ویرایش اطلاعات</a></li>
                                <li class="dropdown-item"><a href="#">ثبت شماره تماس</a></li>
                                <li class="dropdown-item"><a href="#">تغییر رمز عبور</a></li>
                            </ul>
                        </li>
                        <li class="tab-item ">
                            <div class="tab-item-content">
                                <div class="right">
                                    <i class="fa fa-tasks"></i>
                                    <a href="#">کارهای انجام نشده</a>
                                </div>
                                <div class="left">
                                    <span class="count-message">۵</span>
                                </div>
                            </div>
                        </li>
                        <li class="tab-item ">
                            <div class="tab-item-content">
                                <div class="right">
                                    <i class="fa fa-envelope"></i>
                                    <a href="#">پیام ها</a>
                                </div>
                                <div class="left">
                                </div>
                            </div>
                        </li>
                        <li class="tab-item ">
                            <div class="tab-item-content">
                                <i class="fa fa-star"></i>
                                <a href="#">عضویت ویژه</a>
                            </div>
                        </li>
                        <li class="tab-item ">
                            <div class="tab-item-content">
                                <i class="fa fa-bullhorn"></i>
                                <a href="#">مدیریت اطلاع رسانی</a>
                            </div>
                        </li>
                        <li class="tab-item  menu">
                            <div class="tab-item-content">
                                <i class="fa fa-bell"></i>
                                <a href="#">علاقه مندی ها</a>
                            </div>
                        </li>
                        <li class="tab-item  menu">
                            <div class="tab-item-content">
                                <i class="fa fa-dollar-sign"></i>
                                <a href="#">تراکنش‌های مالی</a>
                            </div>
                            <ul class="panel-menu-dropdown">
                                <li class="dropdown-item"><a href="#">پرداخت ها</a></li>
                                <li class="dropdown-item"><a href="#">تبدیل امتیاز به پول</a></li>



                            </ul>
                        </li>
                        <li class="tab-item ">
                            <div class="tab-item-content">
                                <i class="fa fa-graduation-cap"></i>
                                <a href="#">خرید ها</a>
                            </div>
                        </li>
                        <li class="tab-item ">
                            <div class="tab-item-content">
                                <i class="fa fa-comments-alt"></i>
                                <a href="#">نظرات ثبت شده</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="content">
                    <h3 class="content-head__title">مشخصات کاربری</h3>

                    <div class="content-body">
                        <div class="main">
                            <div class="alert alert-info">
                                <p>در زیر اطلاعات کاربری شما نمایش داده میشود, بزودی بخش های دیگری هم به پنل کاربری اضافه میشود</p>
                            </div>
                            <ul class="list-info">
                                <li>
                                    <b class="title text-muted">نام و نام خانوادگی </b>
                                    <b>مجتبی مکوندی</b>
                                </li>
                                <li>
                                    <b class="title text-muted">نام کاربری </b>
                                    <b><a class="link" href="#">makvandi</a></b>
                                    <a href="#" class="action">تغییر</a>
                                </li>
                                <li>
                                    <b class="title text-muted">ایمیل </b>
                                    <b>mmak.pnu@gmail.com</b></li>
                                <li><b class="title text-muted">مقدار اعتبار حساب </b> <b class="text-danger">0 تومان</b></li>
                                <li><b class="title text-muted">وضعیت حساب کابری </b> <b class="text-danger">حساب Vip شما غیر فعال است</b></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="about_us">
                <h4 class="title">درباره فونیکس مال</h4>
                <p class="body">متن متن متن متن</p>
            </div>
            <div class="roocket_section">
                <h4 class="title">بخش های سامانه مشتریان</h4>
                <ul class="body">
                    <li><a href="#">قوانین و مقررات</a></li>
                    <li><a href="#">تبلیغات</a></li>
                    <li><a href="#">درباره ما</a></li>
                    <li><a href="#">ارتباط با ما</a></li>
                </ul>
            </div>
            <div class="contact_us">
                <h4 class="title">ارتباط با ما</h4>
                <div class="group">
                    <div class="body">
                        <p class="description">شما میتوانید با استفاده از یکی از راه‌های زیر با ما ارتباط برقرار کنید</p>
                        <ul>
                            <li><i class="fa fa-telegram"></i>شماره تلگرام :‌ 091122112321</li>

                        </ul>
                    </div>
                    <p class="allow">


                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="copy_right">
                کليه حقوق محصولات و محتوای اين سایت متعلق به فونیکس مال می باشد و هر گونه کپی برداری از محتوا و محصولات سایت غیر مجاز می باشد
            </div>
            <div class="social_link">
                <a href="#" rel="me"><i class="fa fa-facebook-square"></i></a>
                <a href="#" rel="me"><i class="fa fa-instagram"></i></a>
                <a href="#" rel="me"><i class="fa fa-rss-square"></i></a>
                <a href="#" rel="me"><i class="fa fa-twitter-square"></i></a>
                <a href="#" rel="me"><i class="fa fa-telegram"></i></a>
            </div>
        </div>
    </div>
</footer>
<!-- Scripts -->

<script type="text/javascript" src="{{asset('js/dash.js')}}"></script>
</body>
</html>
