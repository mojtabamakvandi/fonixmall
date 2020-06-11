@extends('layouts.main')
@section('style')

@endsection
@section('content')
    <section class="content-header">
        <h1>
            واریز های آنلاین
            <small> تعداد خرید موفق آنلاین: {{$count}} </small>
            <small> جمع کل مبالغ خرید ها: {{$sum}} </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/cp')}}"><i class="fa fa-dashboard"></i> خانه</a></li>
            <li>گزارشات</li>
            <li class="active">واریز های آنلاین</li>
        </ol>
    </section>

    <section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">واریز های آنلاین</h3>
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-responsive table-hover">
                    <thead>
                        <tr>
                            <td>ردیف</td>
                            <td>شناسه فاکتور</td>
                            <td>شناسه سبد خرید</td>
                            <td>مبلغ</td>
                            <td>تاریخ</td>
                            <td>ساعت</td>
                            <td>عملیات</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($factor as $index => $value)
                            <tr>
                                <td>{{ ++$index }}</td>
                                <td>{{ $value->facId }}</td>
                                <td>{{ $value->shbId }}</td>
                                <td>{{ $value->amount }}</td>
                                <td>{{  substr(verta($value->facDate),0,10) }}</td>
                                <td>{{ $value->facTime }}</td>
                                <td>
                                    <a href="{{ url('cp/sale').'/'.$value->facId }}" class="btn btn-info btn-xs" title="نمایش"><i class="fa fa-eye"></i></a>
                                    <a href="" class="btn btn-success btn-xs" title="ارسال پیام"><i class="fa fa-file-text"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-center">{{ $factor->links() }}</div>
            </div>
        </div>
    </div>
</div>
    </section>
@endsection
@section('script')

@endsection
