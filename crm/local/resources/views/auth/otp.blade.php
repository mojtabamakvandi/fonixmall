@extends('layouts.auth')

@section('content')

    <div class="login-box">
        <div class="login-logo">
            <a href="{{url('/')}}"><b>سامانه CRM فونیکس</b></a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">کد ارسالی به تلفن همراهتان را وارد کنید</p>

            <form action="{{url('checkOtp')}}" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input name="otp" type="text" class="form-control" placeholder="کد تصدیق">
                    <span class="fa fa-code form-control-feedback"></span>
                    @if(session()->has('err'))
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ session()->get('err') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">تصدیق</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

@endsection