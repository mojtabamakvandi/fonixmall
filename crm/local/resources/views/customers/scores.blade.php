@extends('layouts.main')
@section('style')

@endsection
@section('content')
    <section class="content-header">
        <h1>
            مشتریان
            <small>{{ $count }} مشتری</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/cp')}}"><i class="fa fa-dashboard"></i> خانه</a></li>
            <li class="active">مشتریان</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">همه مشتریان</h3>
                        <div class="box-tools">
                            <button class="btn btn-xs btn-primary" type="button"  data-toggle="modal" data-target="#modal-warning">ورودی اکسل</button>
                            <a href="{{ route('export') }}" class="btn  btn-xs btn-success">خروجی اکسل</a>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-responsive table-hover">
                            <thead>
                            <tr>
                                <td>ردیف</td>
                                <td>نام و نام خانوادگی</td>
                                <td>گروه بندی</td>
                                <td>کد ملی</td>
                                <td>امتیاز</td>
                                <td>تلفن همراه</td>
                                <td>تاریخ ثبت نام</td>
                                <td>ساعت ثبت نام</td>
                                <td>عملیات</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $index => $customer)
                                <tr>
                                    <td>{{ ++$index }}</td>
                                    <td>{{ $customer->userName.' '.$customer->userFamily }}</td>
                                    <td>{{ $customer->group->name }}</td>
                                    <td>{{ $customer->userNcode }}</td>
                                    <td>{{ $customer->score }}</td>
                                    <td>{{ $customer->userPhonenumber }}</td>
                                    <td>{{ substr(verta($customer->userRegDate),0,10) }}</td>
                                    <td>{{ $customer->userRegTime }}</td>
                                    <td>
                                        <a href="{{ url('cp/customers').'/'.$customer->userId }}" class="btn btn-info btn-xs" title="نمایش"><i class="fa fa-eye"></i></a>
                                        <a href="" class="btn btn-primary btn-xs" title="سوابق امتیاز"><i class="fa fa-angle-double-down"></i></a>
                                        <a href="" class="btn btn-warning btn-xs" title="ویرایش"><i class="fa fa-edit"></i></a>
                                        <a href="" class="btn btn-success btn-xs" title="ارسال پیام"><i class="fa fa-file-text"></i></a>
                                        <a href="" class="btn btn-danger btn-xs" title="حذف"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="text-center">
                            {{$customers->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal modal-primary fade" id="modal-warning" style="display: none;">
        <div class="modal-dialog">
            <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">آپلود فایل اکسل</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="password">فایل اکسل مشتریان</label>
                            <input type="file" name="file" class="form-control" placeholder="فایل اکسل مشتریان">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="pull-left">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
                            <button type="submit" class="btn btn-success">ثبت</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@section('script')

@endsection
