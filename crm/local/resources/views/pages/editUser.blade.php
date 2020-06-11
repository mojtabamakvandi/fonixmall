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
            <li class="active">{{$user->name.' '.$user->family}}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-9">
                <!-- Default box -->
                <form action="{{url('/cp/users/update').'/'.$user->id}}" method="post">
                    @csrf
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">ویرایش مشخصات {{$user->name.' '.$user->family}}</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="جمع شود"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">نام</label>
                                        <input type="text" name="name" class="form-control" placeholder="نام" value="{{ $user->name }}" />
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
                                        <input type="text" name="family" class="form-control" placeholder="نام خانوادگی"  value="{{$user->family }}" />
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
                                        <input type="text" name="ncode" class="form-control" placeholder="کد ملی"  value="{{ $user->ncode }}"/>
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
                                        <input type="text" name="mobile" class="form-control" disabled="disabled" placeholder="شماره همراه"  value="{{ $user->mobile }}"/>
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
                                        <input type="text" name="email" class="form-control" placeholder="xxxxxx@xxxxxx.xxx"  value="{{ $user->email }}"/>
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <br>
                                    <button style="height: 40px;margin-top: 5px" class="btn btn-primary btn-block" type="button"  data-toggle="modal" data-target="#modal-warning">تغییر رمز عبور</button>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">تاریخ تولد</label>
                                        <input type="text" name="bday" class="form-control" placeholder="xxxx/xx/xx"  value="{{ $user->bday }}"/>
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
                                                <option @if($groups!==null) @if($user->group_id === $value->id) selected @endif @endif
                                                value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="pull-left">
                                <button type="submit" class="btn btn-warning">ویرایش کاربر</button>
                            </div>
                        </div>
                        <!-- /.box-footer-->
                    </div>
                </form>
                <!-- /.box -->
            </div>
            <div class="col-md-3">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">تصویر پروفایل {{$user->name.' '.$user->family}}</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="جمع شود"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <img src="{{asset('/img/avatars').'/'.$user->avatar}}" id="imgPreview" class="img-bordered-sm img-rounded" style="width: 100%;height: auto;"/>
                    </div>
                    <div class="box-footer">
                        <form action="{{url('cp/users/upload/avatar').'/'.$user->id}}" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                            @csrf
                            <div class="input-group">
                                <input type="file" name="avatar" id="imgFile" class="form-control">
                                <span class="input-group-btn">
                                    <button type="submit" style="height: 40px" class="btn btn-warning">آپلود تصویر</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="modal modal-warning fade" id="modal-warning" style="display: none;">
        <div class="modal-dialog">
            <form action="{{url('cp/users/changepass')}}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">تغییر رمز عبور</h4>
                    </div>
                    <div class="modal-body">
                        <p>از برابری رمز عبور و تکرار آن اطمینان حاصل کنید</p>
                        <div class="form-group">
                            <label for="password">رمز عبور جدید</label>
                            <input type="password" name="password" class="form-control" placeholder="رمز عبور جدید ( حداقل 6 کاراکتر باشد )">
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <label for="password_confirmation">تکرار رمز عبور جدید</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="تکرار رمز عبور جدید">
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
    <script>
        $(document).ready(function () {
            $("#imgFile").change(function () {
                readURL(this);
            });
            @if(\Session::has('type'))
                swal('{{\Session::get('msg')}}',' ', '{{\Session::get('type')}}', {buttons: false, timer: 3000});
            @endif
        })

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgPreview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

