@extends('layouts.auth')

@section('content')

    <div class="login-box">
        <div class="login-logo">
            <a href="{{url('/')}}"><b>سامانه CRM فونیکس</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">برای بازیابی رمز کبور ایمل خود را وارد کنید</p>

            <form action="{{route('login')}}" method="post">
                <div class="form-group has-feedback">
                    <input name="email" type="text" class="form-control" placeholder="ایمیل">
                    <span class="fa fa-envelope form-control-feedback"></span>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">بازنشانی رمز عبور</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

@endsection