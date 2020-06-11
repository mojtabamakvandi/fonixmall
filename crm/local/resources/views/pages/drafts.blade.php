@extends('layouts.main')

@section('content')

    <section class="content-header">
        <h1>
            ایمیل ها
            <small>۱۳ ایمیل جدید</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/cp')}}"><i class="fa fa-dashboard"></i> خانه</a></li>
            <li class="active">پیش نویس ها</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <a href="{{url('cp/compose')}}" class="btn btn-primary btn-block margin-bottom">ارسال ایمیل جدید</a>

                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">پوشه ها</h3>

                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="{{url('cp/mailbox')}}"><i class="fa fa-inbox"></i> صندوق ورودی
                                    <span class="label label-primary pull-left">12</span></a></li>
                            <li><a href="{{url('cp/sentbox')}}"><i class="fa fa-envelope-o"></i> ارسال شده</a></li>
                            <li class="active"><a href="{{url('cp/drafts')}}"><i class="fa fa-file-text-o"></i> پیش نویس</a></li>
                            <li><a href="{{url('cp/trash')}}"><i class="fa fa-trash-o"></i> سطح زباله</a></li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">پیش نویس ها</h3>

                        <div class="box-tools pull-right">
                            <div class="has-feedback">
                                <input type="text" class="form-control input-sm" placeholder="جستجو">
                                <span class="fa fa-search form-control-feedback"></span>
                            </div>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <div class="pull-right">
                                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                                </div>
                            </div>
                            <!-- /.btn-group -->
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                            <div class="pull-left">
                                1-50/200
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                </div>
                                <!-- /.btn-group -->
                            </div>
                            <!-- /.pull-right -->
                        </div>
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tbody>
                                <tr>
                                    <td><div class="icheckbox_flat-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div></td>
                                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                                    <td class="mailbox-name"><a href="{{url('readmail')}}">علیرضا حسینی زاده</a></td>
                                    <td class="mailbox-subject"><b>تایید سفارش</b> - لورم ایپسوم متن ساختگی برای استفاده طراحان گرافیک است.
                                    </td>
                                    <td class="mailbox-attachment"></td>
                                    <td class="mailbox-date">5 دقیقه پیش</td>
                                </tr>

                                </tbody>
                            </table>
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-padding">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <div class="pull-right">
                                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                                </div>
                            </div>
                            <!-- /.btn-group -->
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                            <div class="pull-left">
                                1-50/200
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                </div>
                                <!-- /.btn-group -->
                            </div>
                            <!-- /.pull-right -->
                        </div>
                    </div>
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@endsection