@extends('layouts.auth')

@section('content')

    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            <a href="{{url('/')}}"><b>سامانه CRM فونیکس</b></a>
        </div>
        <!-- User name -->
        <div class="lockscreen-name text-center">علیرضا حسینی زاده</div>

        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <!-- lockscreen image -->
            <div class="lockscreen-image">
                <img src="{{asset('img/user1-128x128.jpg')}}" alt="User Image">
            </div>
            <!-- /.lockscreen-image -->

            <!-- lockscreen credentials (contains the form) -->
            <form class="lockscreen-credentials">
                <div class="input-group">
                    <input type="password" class="form-control" placeholder="رمز عبور">

                    <div class="input-group-btn">
                        <button type="button" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                    </div>
                </div>
            </form>
            <!-- /.lockscreen credentials -->

        </div>
        <!-- /.lockscreen-item -->
        <div class="help-block text-center">
            برای ورود مجدد رمز عبور خود را وارد کنید
        </div>
        <div class="text-center">
            <a href="{{url('login')}}">و یا با یک نام کاربری دیگر وارد شوید</a>
        </div>
        <div class="lockscreen-footer text-center">
            <strong>&copy; 2019-2020 <a href="http://salmonit.ir">تیم فنی سالمون</a> & <a href="mailto:mojtaba.makvandi@hotmail.com">مجتبی مکوندی</a></strong>
        </div>
    </div>

@endsection