@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            مدیریت کاربران
            <small>مدیران و کارشناسان</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('cp')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
            <li><a href="{{url('cp/users/all')}}">مدیریت کاربران</a></li>
            <li class="active">{{$user->name.' '.$user->family}}</li>
        </ol>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle img-bordered-sm" src="{{asset('img/avatars').'/'.$user->avatar}}" alt="User profile picture">
                        <h3 class="profile-username text-center">{{$user->name.' '.$user->family}}</h3>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">درباره من</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> تحصیلات</strong>

                        <p class="text-muted">
                           تحصیلات
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> موقعیت</strong>

                        <p class="text-muted">ایران، خوزستان</p>

                        <hr>

                        <strong><i class="fa fa-pencil margin-r-5"></i> توانایی ها</strong>

                        <p>
                            {{--<span class="label label-danger">UI Design</span>
                            <span class="label label-info">Javascript</span>
                            <span class="label label-warning">PHP</span>
                            <span class="label label-primary">laravel</span>--}}
                            لیست توانایی ها
                        </p>

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> یادداشت</strong>

                        <p>یادداشت یادداشت یادداشت</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <!-- The timeline -->
                {{--<ul class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    <li class="time-label">
                                    <span class="bg-red">
                                         ۱۲ اردیبهشت ۱۳۹۴
                                    </span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-envelope bg-blue"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                            <h3 class="timeline-header"><a href="#">تیم پشتیبانی</a> یک ایمیل برای شما ارسال کرد</h3>

                            <div class="timeline-body">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                            </div>
                            <div class="timeline-footer">
                                <a class="btn btn-primary btn-xs">ادامه</a>
                                <a class="btn btn-danger btn-xs">حذف</a>
                            </div>
                        </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-user bg-aqua"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 5 دقیقه پیش</span>

                            <h3 class="timeline-header no-border"><a href="#">سارا</a> درخواست دوستی شما را قبول کرد</h3>
                        </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-comments bg-yellow"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 27 دقیقه پیش</span>

                            <h3 class="timeline-header"><a href="#">جواد</a> در پست شما نظر گذاشت</h3>

                            <div class="timeline-body">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                            </div>
                            <div class="timeline-footer">
                                <a class="btn btn-warning btn-flat btn-xs">نمایش نظر</a>
                            </div>
                        </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline time label -->
                    <li class="time-label">
                  <span class="bg-green">
                   ۱۲ خرداد ۱۳۹۴
                  </span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-camera bg-purple"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 2 روز پیش</span>

                            <h3 class="timeline-header"><a href="#">مینا</a> تصویر آپلود کرد</h3>

                            <div class="timeline-body">
                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                            </div>
                        </div>
                    </li>
                    <!-- END timeline item -->
                    <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                </ul>--}}
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
@endsection
