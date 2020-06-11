@extends('layouts.main')
@section('style')

@endsection
@section('content')
    <section class="content-header">
        <h1>
            محصولات
            <small>{{ $count }} محصول </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/cp')}}"><i class="fa fa-dashboard"></i> خانه</a></li>
            <li class="active">محصولات</li>
        </ol>
    </section>

    <section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">همه محصولات</h3>
                <div class="box-tools">
                    <button class="btn btn-xs btn-primary" type="button"  data-toggle="modal" data-target="#modal-warning">ورودی اکسل</button>
                    <a href="{{ route('p-export') }}" class="btn  btn-xs btn-success">خروجی اکسل</a>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-responsive table-hover">
                    <thead>
                        <tr>
                            <td>ردیف</td>
                            <td>نام محصول</td>
                            <td>زیر دسته بندی</td>
                            <td>قیمت</td>
                            <td>تخفیف</td>
                            <td>سازنده</td>
                            <td>تاریخ ثبت</td>
                            <td>ساعت ثبت</td>
                            <td>عملیات</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $index => $product)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $product->productName}}</td>
                                <td>{{ $product->productSubCatId }}</td>
                                <td>{{ $product->productPrice }}</td>
                                <td>{{ $product->offer }}</td>
                                <td>{{ $product->productBrandId }}</td>
                                <td>{{ substr(verta($product->productRegDate),0,10) }}</td>
                                <td>{{ $product->productRegTime }}</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-xs" title="نمایش محصول"><i class="fa fa-angle-double-down"></i></a>
                                    <a href="" class="btn btn-warning btn-xs" title="ویرایش"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-danger btn-xs" title="حذف"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br/>
                <div class="text-center">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
    </section>

    <div class="modal modal-primary fade" id="modal-warning" style="display: none;">
        <div class="modal-dialog">
            <form action="{{ route('p-import') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">آپلود فایل اکسل</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="password">فایل اکسل محصولات</label>
                            <input type="file" name="file" class="form-control" placeholder="فایل اکسل محصولات">
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
