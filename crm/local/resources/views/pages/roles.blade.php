@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            مدیریت کاربران
            <small>مدیران و کارشناسان</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('cp')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
            <li><a href="{{url('cp/users/all')}}">مدیریت کاربران</a></li>
            <li class="active">نقش ها</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-4">
                <!-- Default box -->
                <form action="{{url('cp/users/roles/add')}}" method="post">
                    @csrf
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">افزودن نقش جدید</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="جمع شود"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">نام</label>
                                        <input type="text" name="name" class="form-control" placeholder="نام" value="{{ old('name') }}" />
                                    </div>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">نام نمایشی</label>
                                        <input type="text" name="display_name" class="form-control" placeholder="نام نمایشی"  value="{{ old('display_name') }}" />
                                    </div>
                                    @error('display_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">توضیحات</label>
                                        <textarea type="text" name="description" rows="4" class="form-control" placeholder="توضیحات">{{ old('description') }}</textarea>
                                    </div>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="pull-left">
                                <button type="submit" class="btn btn-success">ثبت نقش</button>
                            </div>
                        </div>
                        <!-- /.box-footer-->
                    </div>
                </form>
                <!-- /.box -->
            </div>
            <div class="col-md-8">
                <!-- Default box -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">لیست دسترسی ها</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="جمع شود">
                                <i class="fa fa-minus"></i></button>

                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-responsive table-bordered table-hover">
                            <thead class="bg-purple-gradient">
                            <tr>
                                <td style="width: 40px">#</td>
                                <td>نام</td>
                                <td>نام نمایشی</td>
                                <td>توضیحات</td>
                                <td>عملیات</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $index => $role)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->display_name }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>
                                        <a href="{{url('/cp/users/roles').'/'.$role->id.'/edit'}}" class="btn btn-warning btn-xs" title="ویرایش نقش"><i class="fa fa-edit"></i> ویرایش </a>
                                        {{--<a href="{{url('/cp/users/roles/delete').'/'.$role->id}}" class="btn btn-danger btn-xs" title="حذف نقش">
                                            <i class="fa fa-trash"></i>
                                        </a>--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $(".select2").select2();
            @if(\Session::has('type'))
            swal('{{\Session::get('msg')}}',' ', '{{\Session::get('type')}}', {buttons: false, timer: 3000});
            @endif
        })
    </script>
@endsection
