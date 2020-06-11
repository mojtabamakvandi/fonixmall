@extends('layouts.auth')

@section('content')

    <div class="login-box">
        <div class="login-logo">
            <a href="{{url('/')}}"><b>سامانه CRM فونیکس</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">اختصاص رمز عبور جدید</p>

            <form action="{{route('password.update')}}" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input name="password" type="password" class="form-control" placeholder="رمز عبور جدید">
                    <span class="fa fa-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input name="password_confirmation" type="password" class="form-control" placeholder="تکرار رمز عبور جدید">
                    <span class="fa fa-lock form-control-feedback"></span>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                @enderror
                <div class="row">
                    <div class="col-xs-12">
                        <div class="checkbox icheck">
                            <label>
                                <input name="remember" type="checkbox">پس از تغییر رمز عبور وارد شو
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

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

@endsection