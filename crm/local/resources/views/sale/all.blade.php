@extends('layouts.main')
@section('style')

@endsection
@section('content')
    <section class="content-header">
        <h1>
            فروش
            <small> تعداد سبد های خرید: {{ $count }} </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/cp')}}"><i class="fa fa-dashboard"></i> خانه</a></li>
            <li class="active">فروش </li>
        </ol>
    </section>

    <section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">همه فروش ها</h3>
                <div class="box-tools">
                    <a href="{{ route('s-export') }}" class="btn  btn-xs btn-success">خروجی اکسل</a>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-responsive table-hover">
                    <thead>
                        <tr>
                            <td>ردیف</td>
                            <td>نام و نام خانوادگی</td>
                            {{--<td>گروه بندی</td>--}}
                            <td>امتیاز</td>
                            <td>مبلغ</td>
                            <td>تخفیف</td>
                            <td>تاریخ ثبت نام</td>
                            <td>ساعت ثبت نام</td>
                            <td>عملیات</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sale as $index => $value)
                            <tr>
                                <td>{{ ++$index }}</td>
                                <td>{{ $value->userName.' '.$value->userFamily }}</td>
                                {{--<td>{{ $value->group->name }}</td>--}}
                                <td>{{ $value->score }}</td>
                                <td>{{ $value->productPrice }}</td>
                                <td>{{ $value->offer }}</td>
                                <td>{{ substr(verta($value->SHBRegDate),0,10) }}</td>
                                <td>{{ $value->SHBRegTime }}</td>
                                <td>
                                    <a href="{{ url('cp/sale').'/'.$value->facId }}" class="btn btn-info btn-xs" title="نمایش"><i class="fa fa-eye"></i></a>
                                    <a href="" class="btn btn-success btn-xs" title="ارسال پیام"><i class="fa fa-file-text"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-center">{{ $sale->links() }}</div>
            </div>
        </div>
    </div>
</div>
    </section>
@endsection
@section('script')

@endsection
