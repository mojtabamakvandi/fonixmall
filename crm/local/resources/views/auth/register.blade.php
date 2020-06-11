@extends('layouts.auth')

@section('content')

<div class="login-box">
    <div class="login-logo">
        <a href="{{url('/')}}"><b>سامانه CRM فونیکس</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">برای ثبت نام تلفن همراه خود را پر کنید</p>

        <form action="{{url('SendRegisterOtp')}}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input name="mobile" type="text" class="form-control" placeholder="شماره همراه">
                <span class="fa fa-mobile form-control-feedback"></span>
            </div>
            @error('mobile')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @if(session()->has('err'))
                <span class="invalid-feedback" role="alert">
                    <strong class="text-black-50">{{ session()->get('err') }}</strong>
                </span>
                <br/>
                <br/>
            @endif

            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-success btn-block btn-flat">ثبت نام</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@endsection