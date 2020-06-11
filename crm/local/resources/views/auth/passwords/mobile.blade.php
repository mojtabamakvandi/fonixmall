@extends('layouts.auth')

@section('content')

    <div class="login-box">
        <div class="login-logo">
            <a href="{{url('/')}}"><b>سامانه CRM فونیکس</b></a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">برای بازیابی رمز عبور، همراه خود را وارد کنید</p>

            <form action="{{route('password.email')}}" method="post">
                @csrf

                <div class="form-group has-feedback">

                    <input name="mobile" type="text" class="form-control" placeholder="شماره همراه">
                    <span class="fa fa-mobile form-control-feedback"></span>
                    @error('mobile')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                    @if(session()->has('err'))
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ session()->get('err') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">ارسال کد تصدیق</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

@endsection