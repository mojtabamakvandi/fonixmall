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
            <div class="col-md-12">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">فاکتورهای ثبت شده</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-responsive table-hover">
                            <thead>
                                <tr class="bg-purple-gradient">
                                    <td>ردیف</td>
                                    <td>شناسه فاکتور</td>
                                    <td>مشتری</td>
                                    <td>تاریخ خرید</td>
                                    <td>ساعت خرید</td>
                                    <td>مبلغ</td>
                                    <td>تخفیف</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($factors as $index => $factor)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $factor->factor_id }}</td>
                                        <td>{{ $factor->customer->userName.' '.$factor->customer->userFamily }}</td>
                                        <td>{{ substr(verta($factor->created_at),0,10) }}</td>
                                        <td>{{ substr(verta($factor->created_at),10,18)  }}</td>
                                        <td>{{ $factor->amount }}</td>
                                        <td>{{ $factor->offer }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer text-center">
                        {{ $factors->links() }}
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
