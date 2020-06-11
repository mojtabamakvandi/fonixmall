@extends('layouts.main')
@section('style')

@endsection
@section('content')
    <section class="content-header">
        <h1>
            پروفایل مشتری
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/cp')}}"><i class="fa fa-dashboard"></i> خانه</a></li>
            <li><a href="{{url('/cp/customers/all')}}"><i class="fa fa-arrow-circle-left"></i>مشتریان</a></li>
            <li class="active">{{ $customer->userName.' '.$customer->userFamily }}</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ $customer->userName.' '.$customer->userFamily }}</h3>
                        <div class="box-tools">
                            <a href="{{url('cp/customers/all')}}" class="btn btn-warning"><i class="fa fa-backward"></i> بازگشت </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="{{asset('img/avatars/').'/'.$customer->avatar}}" class="img img-responsive img-bordered-sm"/>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">نام مشتری</label>
                                    <input type="text" class="form-control" value="{{$customer->userName}}" />
                                </div>
                                <div class="form-group">
                                    <label for="">تاریخ تولد مشتری</label>
                                    <input type="text" class="form-control" value="{{$customer->userBday}}" />
                                </div>
                                <div class="form-group">
                                    <label for="">ایمیل مشتری</label>
                                    <input type="text" class="form-control" value="{{$customer->userEmail}}" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">نام خانوادگی مشتری</label>
                                    <input type="text" class="form-control" value="{{$customer->userFamily}}" />
                                </div>
                                <div class="form-group">
                                    <label for="">همراه مشتری</label>
                                    <input type="text" class="form-control" value="{{$customer->userPhonenumber}}" />
                                </div>
                                <div class="form-group">
                                    <label for="">کد ملی مشتری</label>
                                    <input type="text" class="form-control" value="{{$customer->userNcode}}" />
                                </div>
                            </div>

                        </div>
                        <br/>
                        <hr/>
                        <br/>
                        @if($buys!=null)
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="box box-danger bg-red-gradient">
                                        <div class="box-header">
                                            <h3 class="box-title">گروه مشتری</h3>
                                        </div>
                                        <div class="box-body">
                                            <br/>
                                            <h1 class="text-center">{{$customer->group->name}}</h1>
                                            <br/>
                                            <br/>
                                            <br/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="box box-success bg-green-gradient">
                                        <div class="box-header">
                                            <h3 class="box-title">امتیاز مشتری</h3>
                                        </div>
                                        <div class="box-body">
                                            <br/>
                                            <h1 class="text-center">{{$customer->score}}</h1>
                                            <br/>
                                            <br/>
                                            <br/>
                                        </div>
                                    </div>
                                </div><div class="col-md-3">
                                    <div class="box box-warning bg-yellow-gradient">
                                        <div class="box-header">
                                            <h3 class="box-title">خرید های مشتری</h3>
                                        </div>
                                        <div class="box-body">
                                            <br/>
                                            <h1 class="text-center">{{$buys}}</h1>
                                            <br/>
                                            <br/>
                                            <br/>
                                        </div>
                                    </div>
                                </div><div class="col-md-3">
                                    <div class="box box-primary bg-light-blue-gradient">
                                        <div class="box-header">
                                            <h3 class="box-title">آخرین خرید</h3>
                                        </div>
                                        <div class="box-body">
                                            <h1 class="text-center">{{$last_buy->productPrice}}</h1>
                                            <h3 class="text-center">{{substr(verta($last_buy->SHBRegDate),0,10)}}</h3>

                                            <br/>
                                            <br/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="text-center">
                                    <span class="alert alert-danger">
                                        آقا / خانم {{$customer->userName.' '.$customer->userFamily}} هنوز خریدی انجام نداده است
                                    </span>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                </div>
                            </div>
                        @endif
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
