@extends('layouts.main')

@section('content')

    <section class="content-header">
        <h1>
            ایمیل ها
            <small>۱۳ ایمیل جدید</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
            <li class="active">ایمیل ها</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <a href="{{url('cp/mailbox')}}" class="btn btn-primary btn-block margin-bottom">بازشگت</a>

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
                            <li><a href="{{url('cp/drafts')}}"><i class="fa fa-file-text-o"></i> پیش نویس</a></li>
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
                        <h3 class="box-title">ارسال ایمیل جدید</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <input class="form-control" placeholder="به"/>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="موضوع"/>
                        </div>
                        <div class="form-group">
                            <textarea id="mytextarea" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> ضمیمه
                                <input type="file" name="attachment">
                            </div>
                            <p class="help-block">حداکثر سایز 20MB</p>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="pull-right">
                            <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> پیش نویس</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> ارسال</button>
                        </div>
                        <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> انصراف</button>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@endsection

@section('script')

    <script src="{{asset('bower_components/tinymce/tinymce.min.js')}}"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            language: 'fa_IR'
        });
    </script>
@endsection