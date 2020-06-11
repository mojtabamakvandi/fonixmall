@extends('layouts.main')
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
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
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
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua-gradient">
                                    <div class="inner">
                                        <h3>{{$customerCount}}</h3>

                                        <p>مشتریان</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person"></i>
                                    </div>
                                    <a href="{{url('cp/customers/all')}}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-green-gradient">
                                    <div class="inner">
                                        <h3>{{ $onlineSales.' ريال' }}</h3>
                                        <p>فروش </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="{{url('cp/sales/')}}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow-gradient">
                                    <div class="inner">
                                        <h3>{{$productCount}}</h3>
                                        <p>کالا های فروشگاه آنلاین</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-pricetag"></i>
                                    </div>
                                    <a href="{{url('cp/products/all')}}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-red-gradient">
                                    <div class="inner">
                                        <h3>{{$hpCount}}</h3>
                                        <p>کالا های هایپرمارکت</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-pricetag"></i>
                                    </div>
                                    <a href="{{url('cp/products/hp')}}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>

            {{ $credit }}



        </section>
        <!-- /.content -->
@endsection
