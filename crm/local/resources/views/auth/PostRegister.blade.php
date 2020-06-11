@extends('layouts.auth')

@section('style')
    <link href="{{asset('css/normalize.css')}}" rel='stylesheet' />
    <link href="{{asset('css/fontawesome/css/font-awesome.min.css')}}" rel='stylesheet' />
    <link href="{{asset('css/vertical-responsive-menu.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/prism.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/persianDatepicker-default.css')}}" />
    <link rel="stylesheet" href="{{asset('css/persianDatepicker-dark.css')}}" />
    <link rel="stylesheet" href="{{asset('css/persianDatepicker-latoja.css')}}" />
    <link rel="stylesheet" href="{{asset('css/persianDatepicker-melon.css')}}" />
    <link rel="stylesheet" href="{{asset('css/persianDatepicker-lightorang.css')}}" />
    <script src="{{asset('js/prism.js')}}"></script>
    <script src="{{asset('js/vertical-responsive-menu.min.js')}}"></script>
@endsection
@section('content')

    <div class="login-box">
        <div class="login-logo">
            <a href="{{url('/')}}"><b>سامانه CRM فونیکس</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">برای ثبت نام تلفن همراه خود را پر کنید</p>

            <form action="{{url('PostRegister')}}" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input name="name" type="text" class="form-control" placeholder="نام">
                    <span class="fa fa-user form-control-feedback"></span>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group has-feedback">
                    <input name="family" type="text" class="form-control" placeholder="نام خانوادگی">
                    <span class="fa fa-users form-control-feedback"></span>
                    @error('family')
                    <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group has-feedback">
                    <input name="ncode" type="text" class="form-control" placeholder="کد ملی">
                    <span class="fa fa-id-card form-control-feedback"></span>
                    @error('ncode')
                    <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group has-feedback">
                    <input name="bday" type="text" class="form-control" id="bday" placeholder="تاریخ تولد">
                    <span class="fa fa-calendar form-control-feedback"></span>
                    @error('bday')
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
                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-success btn-block btn-flat">تکمیل ثبت نام</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

@endsection
@section('script')
    <script src="{{asset('js/jquery-1.10.1.min.js')}}"></script>
    <script src="{{asset('js/persianDatepicker.js')}}"></script>
    <script type="text/javascript">
        $(function() {
            $('#bday').persianDatepicker({
                cellWidth: 30,
                cellHeight: 30,
                fontSize: 14,
                calendarPosition: {
                    x: 55,
                    y: 0,
                }
            });
        });
    </script>
@endsection