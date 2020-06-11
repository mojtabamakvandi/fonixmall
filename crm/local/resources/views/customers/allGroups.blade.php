@extends('layouts.main')
@section('style')

@endsection
@section('content')
    <section class="content-header">
        <h1>
            گروه بندی مشتریان
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/cp')}}"><i class="fa fa-dashboard"></i> خانه</a></li>
            <li><a href="{{url('/cp/customers/all')}}">مشتریان</a></li>
            <li class="active">گروه بندی</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">گروه جدید</h3>
                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('addGroup') }}" method="post">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">نام گروه</label>
                                <input name="name" type="text" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="">حداقل امتیاز</label>
                                <input name="minScore" type="text" class="form-control"/>
                            </div>
                            <br/>
                            <div class="text-left">
                                <button type="submit" class="btn btn-success">ثبت گروه جدید</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">گروه ها</h3>
                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-responsive table-hover">
                            <thead>
                            <tr>
                                <td>ردیف</td>
                                <td>نام گروه</td>
                                <td>حداقل امتیاز</td>
                                <td>زمان ایجاد</td>
                                <td>عملیات</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($groups as $index => $group)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $group->name }}</td>
                                    <td>{{ $group->minScore }}</td>
                                    <td>{{ \Verta($group->created_at)->formatDifference() }}</td>
                                    <td>
                                        <a href="{{ url('cp/customers').'/' }}" class="btn btn-info btn-xs" title="نمایش"><i class="fa fa-eye"></i></a>
                                        <a href="" class="btn btn-primary btn-xs" title="سوابق امتیاز"><i class="fa fa-angle-double-down"></i></a>
                                        <a href="" class="btn btn-warning btn-xs" title="ویرایش"><i class="fa fa-edit"></i></a>
                                        <a href="" class="btn btn-success btn-xs" title="ارسال پیام"><i class="fa fa-file-text"></i></a>
                                        <a href="{{url('cp/customers/groups/delete').'/'.$group->id}}" class="btn btn-danger btn-xs" title="حذف"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
