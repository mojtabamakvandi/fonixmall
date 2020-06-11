@extends('layouts.main')

@section('content')

    <section class="content-header">
        <h1>
            پیامک ها
            <small>تعداد پیامک باقیمانده: {{$credit}} پیامک </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/cp')}}"><i class="fa fa-dashboard"></i> داشبورد </a></li>
            <li class="active">ارسال شده ها</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-3"><div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">ارسال پیام به مشتری</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="جمع شود"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form action="{{url('cp/texts/sendToACustomer')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="contact">انتخاب مشتری</label>
                                <select class="form-control select2" name="mobile">
                                    <option selected disabled>لطفا یک مشتری انتخاب کنید</option>
                                    @foreach($customers as $value)
                                        <option value="{{$value->userPhonenumber}}">{{$value->userName.' '.$value->userFamily.' --- '.$value->userPhonenumber}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="text">متن پیام</label>
                                <textarea class="form-control" rows="7" name="text"></textarea>
                            </div>
                            <div class="text-left">
                                <button type="submit" class="btn btn-info">ارسال پیامک</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div></div>
            <div class="col-md-3"><div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">ارسال پیام به گروه مشتری</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="جمع شود"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form action="{{url('cp/texts/sendToCustomersGroup')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="contact">انتخاب گروه مشتریان</label>
                                <select class="form-control select2" name="customers_group">
                                    <option selected disabled>لطفا یک گروه انتخاب کنید</option>
                                    @foreach($customer_groups as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="text">متن پیام</label>
                                <textarea class="form-control" rows="7" name="text"></textarea>
                            </div>
                            <div class="text-left">
                                <button type="submit" class="btn btn-success">ارسال پیامک</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div></div>
            <div class="col-md-3"><div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">ارسال پیام به یک کارمند</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="جمع شود"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form action="{{url('cp/texts/sendToAEmployeer')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="contact">انتخاب یک کارمند</label>
                                <select class="form-control select2" name="mobile">
                                    <option selected disabled>لطفا یک کارمند انتخاب کنید</option>
                                    @foreach($employeers as $value)
                                        <option value="{{$value->mobile}}">{{$value->name.' '.$value->family.' -- '.$value->mobile}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="text">متن پیام</label>
                                <textarea class="form-control" rows="7" name="text"></textarea>
                            </div>
                            <div class="text-left">
                                <button type="submit" class="btn btn-warning">ارسال پیامک</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div></div>
            <div class="col-md-3"><div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">ارسال پیام به گروه کارمندان</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="جمع شود"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form action="{{url('cp/texts/sendToEmployeersGroup')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="contact">انتخاب گروه کارمندان</label>
                                <select class="form-control select2" name="user_groups">
                                    <option selected disabled>لطفا یک گروه انتخاب کنید</option>
                                    @foreach($user_groups as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="text">متن پیام</label>
                                <textarea class="form-control" rows="7" name="text"></textarea>
                            </div>
                            <div class="text-left">
                                <button type="submit" class="btn btn-danger">ارسال پیامک</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div></div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">ارسال پیام به شماره</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="جمع شود"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form action="{{url('cp/texts/sendToANumber')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="contact">شماره همراه</label>
                                <input type="text" class="form-control" name="mobile" placeholder="09161112233">
                            </div>
                            <div class="form-group">
                                <label for="text">متن پیام</label>
                                <textarea class="form-control" rows="7" name="text"></textarea>
                            </div>
                            <div class="text-left">
                                <button type="submit" class="btn btn-success">ارسال پیامک</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">ارسال شده ها</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="mailbox-controls">
                        </div>
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr class="bg-purple-gradient">
                                        <td>از شماره</td>
                                        <td>به شماره</td>
                                        <td>متن</td>
                                        <td>وضعیت ارسال</td>
                                        <td>تاریخ</td>
                                        <td>ساعت</td>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($messages as $value)
                                    <tr>
                                        <td class="bg-danger">{{$value->from}}</td>
                                        <td class="bg-warning">{{$value->to}}</td>
                                        <td class="bg-success">{{$value->message}}</td>
                                        <td class="bg-info">{{$value->response}}</td>
                                        <td>{{substr(verta($value->created_at),0,10)}}</td>
                                        <td>{{substr($value->created_at,11,8)}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-padding">
                        <div class="text-center">
                            {{ $messages->links() }}
                        </div>
                    </div>
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

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
