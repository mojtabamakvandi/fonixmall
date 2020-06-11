@extends('layouts.main')
@section('style')

@endsection
@section('content')
    <section class="content-header">
        <h1>
            فاکتور فروش
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/cp')}}"><i class="fa fa-dashboard"></i> خانه</a></li>
            <li>گزارشات</li>
            <li>بیشترین فروش</li>
            <li class="active">فاکتور فروش</li>
        </ol>
    </section>
<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-globe"></i> فروشگاه اینترنتی فونیکس مال
                <small class="pull-left">{{substr(verta()->today(),0,10)}}</small>
            </h2>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            از
            <address>
                <strong>فونیکس مال</strong><br>
                کمپلو شیخ بها جنوبی نبش جلالی<br>
                هایپر 7 - 11<br>
                تلفن: 061-32239644
                <br>
                ایمیل: sale@fonixmall.com
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            به
            <address>
                <strong>{{$f1->userName.' '.$f1->userFamily}}</strong><br>
                تلفن: {{$f1->userPhonenumber}}<br>
                ایمیل: {{$f1->userEmail}}
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b> سفارش {{$f1->facId}}</b><br>
            <br>
            <b>کد سفارش:</b> {{$f1->SHBid}}<br>
            <b>تاریخ پرداخت:</b> {{$facDate}} <br>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>تعداد</th>
                    <th>کد محصول</th>
                    <th>نام محصول</th>
                    <th>قیمت</th>
                    <th>تخفیف</th>
                    <th>نهایی</th>
                </tr>
                </thead>
                <tbody>
                @foreach($factor as $index => $value)
                    <tr>
                        <td>{{++$index}}</td>
                        <td>{{$value->productId}}</td>
                        <td>{{$value->productName}}</td>
                        <td>{{$value->productPrice}}</td>
                        <td>{{$value->offer}}</td>
                        <td>{{$value->productPrice-$value->offer}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">

        </div>
        <!-- /.col -->
        <div class="col-xs-6">

            <div class="table-responsive">
                <table class="table">
                    <tbody><tr>
                        <th style="width:50%">جمع کل </th>
                        <td>{{$sum}}</td>
                    </tr>
                    <tr>
                        <th>تخفیف</th>
                        <td>{{$off}}</td>
                    </tr>
                    <tr>
                        <th>مبلغ کل</th>
                        <td>{{$sum-$off}}</td>
                    </tr>
                    </tbody></table>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12 text-center">
            <a target="_blank" onclick="window.print()" class="btn btn-default"><i class="fa fa-print"></i> پرینت</a>
        </div>
    </div>
</section>

@endsection
@section('script')

@endsection
