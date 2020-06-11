@extends('layouts.auth')

@section('content')

<div class="login-box">
    <div class="login-logo">
        <a href="{{url('/')}}"><b>سامانه CRM فونیکس</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">فرم زیر را تکمیل کنید و ورود بزنید</p>
        @if(session()->has('success'))
            <div class="text-center">
                <label class="alert alert-success">
                    {{ session()->get('success') }}
                </label>
            </div>

        @endif
        <form action="{{route('login')}}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input name="mobile" type="text" class="form-control" placeholder="شماره همراه">
                <span class="fa fa-mobile form-control-feedback"></span>
                @error('mobile')
                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="form-group has-feedback">
                <input name="password" type="password" class="form-control" placeholder="رمز عبور">
                <span class="fa fa-lock form-control-feedback"></span>
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="checkbox icheck">
                        <label>
                            <input name="remember" type="checkbox"> مرا به خاطر بسپار
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">ورود</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <hr/>

        <a href="{{route('password.request')}}">رمز عبورم را فراموش کرده ام.</a><br>
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button type="submit">Exit</button>
        </form>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@endsection
