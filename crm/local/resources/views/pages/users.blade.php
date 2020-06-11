@extends('layouts.main')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        مدیریت کاربران
        <small>مدیران و کارشناسان</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> داشبورد</a></li>
        <li><a href="#">مدیریت کاربران</a></li>
        <li class="active">همه کاربران</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">

            <div class="col-md-4">
            <!-- Default box -->
            <form action="{{url('cp/users/add')}}" method="post">
                @csrf
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">افزودن کاربر جدید</h3>
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
                                <label for="">نام خانوادگی</label>
                                <input type="text" name="family" class="form-control" placeholder="نام خانوادگی"  value="{{ old('family') }}" />
                            </div>
                            @error('family')
                            <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">کد ملی</label>
                                <input type="text" name="ncode" class="form-control" placeholder="کد ملی"  value="{{ old('ncode') }}"/>
                            </div>
                            @error('ncode')
                            <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">شماره همراه</label>
                                <input type="text" name="mobile" class="form-control" placeholder="شماره همراه"  value="{{ old('mobile') }}"/>
                            </div>
                            @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">ایمیل</label>
                                <input type="text" name="email" class="form-control" placeholder="xxxxxx@xxxxxx.xxx"  value="{{ old('email') }}"/>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">رمز عبور</label>
                                <input type="password" name="password" class="form-control" placeholder="حداقل 6 کاراکتر" />
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">تاریخ تولد</label>
                                <input type="text" name="bday" class="form-control" placeholder="xxxx/xx/xx"  value="{{ old('bday') }}"/>
                            </div>
                            @error('bday')
                            <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">نوع کاربر</label>
                                <select class="form-control" name="group_id">
                                    <option selected disabled value="0" >نوع کاربر را انتخاب کنید</option>
                                    @foreach($groups as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="pull-left">
                        <button type="submit" class="btn btn-success">ثبت کاربر</button>
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
                    <h3 class="box-title">لیست کاربران</h3>

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
                                <td>نام و نام خانوادگی</td>
                                <td>ایمیل</td>
                                <td>همراه</td>
                                <td>تاریخ تولد</td>
                                <td>عملیات</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $index => $user)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $user->name.' '.$user->family }}</td>
                                <td>{{ $user->bday }}</td>
                                <td>{{ $user->mobile }}</td>
                                <td>{{ $user->bday }}</td>
                                <td>
                                        <a href="{{url('/cp/users/user').'/'.$user->id}}" class="btn btn-primary btn-xs" title="نمایش پروفایل">
                                            <i class="fa fa-vcard"></i>
                                        </a>
                                        <a href="{{url('/cp/users').'/'.$user->id.'/edit'}}" class="btn btn-warning btn-xs" title="ویرایش کاربر">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                         <a href="{{url('/cp/users/delete').'/'.$user->id}}" class="btn btn-danger btn-xs" title="حذف کاربر">
                                             <i class="fa fa-trash"></i>
                                         </a>
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
            @if(\Session::has('type'))
                swal('{{\Session::get('msg')}}',' ', '{{\Session::get('type')}}', {buttons: false, timer: 3000});
            @endif
        })
    </script>
@endsection
