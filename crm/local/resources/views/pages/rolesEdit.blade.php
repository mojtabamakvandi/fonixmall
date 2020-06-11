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
            <li><a href="{{url('cp/users/roles')}}">نقش ها</a>ا</li>
            <li class="active">ویرایش نقش {{$role->display_name}}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <!-- Default box -->
                <form action="{{url('cp/users/roles/update').'/'.$role->id}}" method="post">
                    @csrf
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">ویرایش نقش {{$role->display_name}}</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="جمع شود"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">نام</label>
                                        <input type="text" name="name" class="form-control" placeholder="نام" value="{{ $role->name }}" />
                                    </div>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">نام نمایشی</label>
                                        <input type="text" name="display_name" class="form-control" placeholder="نام نمایشی"  value="{{ $role->display_name }}" />
                                    </div>
                                    @error('display_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">توضیحات</label>
                                        <textarea type="text" name="description" class="form-control" placeholder="توضیحات">{{ $role->description }}</textarea>
                                    </div>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">دسترسی ها</label>
                                        <select class="form-control select2 text-right" name="permission_role[]" multiple="multiple" data-placeholder="دسترسی ها" style="width: 100%;direction: rtl;text-align: right" tabindex="-1">
                                            <option disabled value="0">لطفا دسترسی ها را انتخاب کنید</option>
                                            @foreach($permissions as $value)

                                                <option
                                                    @foreach($role->permissions as $selected)
                                                    @if($value->id == $selected->id) selected @endif
                                                    @endforeach
                                                    value="{{$value->id}}">{{$value->display_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
