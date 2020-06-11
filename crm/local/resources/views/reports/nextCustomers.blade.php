@extends('layouts.main')
@section('style')

@endsection
@section('content')
    <section class="content-header">
        <h1>
            مشتریان بالقوه
            <small> تعداد خریداران بالقوه: {{$count}} </small>
            <small>( مشتریانی که ثبت نام شده اند ولی تا کنون خرید نکرده اند )</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/cp')}}"><i class="fa fa-dashboard"></i> خانه</a></li>
            <li>گزارشات</li>
            <li class="active">مشتریان بالقوه</li>
        </ol>
    </section>

    <section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">بیشترین فروش</h3>
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-responsive table-hover">
                    <thead>
                        <tr>
                            <td>ردیف</td>
                            <td>نام و نام خانوادگی</td>
                            <td>امتیاز</td>
                            <td>گروه</td>
                            <td>ایمیل</td>
                            <td>همراه</td>
                            <td>تاریخ تولد</td>
                            <td>کد ملی</td>
                            <td>عملیات</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $index => $value)
                            <tr>
                                <td>{{ ++$index }}</td>
                                <td>{{ $value->userName.' '.$value->userFamily }}</td>
                                <td>{{ $value->score }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->userEmail }}</td>
                                <td>{{ $value->userPhonenumber }}</td>
                                <td>{{ $value->userBday }}</td>
                                <td>{{ $value->userNcode }}</td>
                                <td>
                                    <a href="{{ url('cp/sale').'/'.$value->userId }}" class="btn btn-info btn-xs" title="نمایش"><i class="fa fa-eye"></i></a>
                                    <a href="" class="btn btn-success btn-xs" title="ارسال پیام"><i class="fa fa-file-text"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-center">{{ $customers->links() }}</div>
            </div>
        </div>
    </div>
</div>
    </section>
@endsection
@section('script')

@endsection
