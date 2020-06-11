@extends('layouts.cm')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            داشبورد
            <small>صفحه نخست</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> صفحه نخست </a></li>
        </ol>
    </section>
    <section class="content">
        @if(\Session::get('starter')=='true')
            <br/>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="text-center">
                        <label class="alert alert-success">
                            به سامانه مدیریت ارتباط با مشتری فروشگاه فونیکس مال خوش آمدید
                        </label>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">جستجوی مشتری</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{url('cp/cash/search')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>شماره همراه مشتری</label>
                                        <input type="text" class="form-control" placeholder="شماره همراه مشتری" aria-label="شماره همراه مشتری" name="mobiles" aria-describedby="btnSearch">
                                        @error('mobiles')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="text-left">
                                        <button class="btn btn-warning" type="submit" id="btnSearch"> جستجو <i class="fa fa-search"></i> </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form action="{{url('cp/cash/customer/add')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>شماره همراه مشتری</label>
                                        <input type="text" class="form-control" placeholder="شماره همراه مشتری" aria-label="شماره همراه مشتری" name="mobile" aria-describedby="btnSearch">
                                        @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="text-left">
                                        <button class="btn btn-success" type="submit" id="btnSearch"> ثبت مشتری جدید <i class="fa fa-plus"></i> </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <form action="{{url('cp/cash/add')}}" method="post">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>شماره فاکتور</label>
                                        <input type="text" class="form-control" name="factor_id"/>
                                        <input type="hidden" class="form-control" name="customer_id" value="{{$customer->userId}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label>مبلغ</label>
                                        <input type="text" class="form-control" name="amount"/>
                                    </div>
                                    <div class="form-group">
                                        <label>تخفیف</label>
                                        <input type="text" class="form-control" name="offer"/>
                                    </div>
                                    <div class="text-left">
                                        <button type="submit" class="btn btn-info">ثبت فاکتور</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">مشخصات مشتری</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <br/>
                                <table class="table table-bordered table-responsive">
                                    <tbody style="font-size: 18px">
                                    <tr class="bg-info">
                                        <td>نام: </td>
                                        <td><b>{{$customer->userName}}</b></td>
                                    </tr>
                                    <tr class="bg-danger">
                                        <td>نام خانوادگی: </td>
                                        <td><b>{{$customer->userFamily}}</b></td>
                                    </tr>
                                    <tr  class="bg-success">
                                        <td>تاریخ تولد: </td>
                                        <td><b>{{$customer->userBday}}</b></td>
                                    </tr>
                                    <tr class="bg-warning">
                                        <td>ایمیل: </td>
                                        <td><b>{{$customer->userEmail}}</b></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            @if(\Session::has('type'))
            swal('{{\Session::get('msg')}}',' ', '{{\Session::get('type')}}', {buttons: false, timer: 3000});
            @endif

            $('.select2').select2();

        })
    </script>

@endsection
