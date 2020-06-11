@extends('layouts.main')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        مدیریت تخفیف ها
        <small>محصولات فروشگاه آنلاین</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/cp')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
        <li><a href="#">مدیریت امتیازها</a></li>
        <li class="active">پیشنهادات</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
            <div class="col-md-4">
            <!-- Default box -->
            <form action="{{url('/cp/scores/pishnahad/add')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">افزودن پیشنهاد جدید</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="جمع شود"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">محصول خریداری شده</label>
                                <select class="form-control select2" id="toBuy" name="toBuy">
                                    <option selected disabled >لطفا محصول را انتخاب کنید</option>
                                    @foreach($allProducts as $pr1)
                                        <option value="{{$pr1->productId}}">{{$pr1->productName.'--'.$pr1->productPrice}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">محصول پیشنهادی</label>
                                <select class="form-control select2" id="toSuggest" name="toSuggest">
                                    <option selected disabled >لطفا محصول را انتخاب کنید</option>
                                    @foreach($allProducts as $pr2)
                                        <option value="{{$pr2->productId}}">{{$pr2->productName.'--'.$pr2->productPrice}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">گروه مشتریان</label>
                                <select class="form-control select2" id="group_id" name="group_id">
                                    <option selected disabled >لطفا گروه مشتریان را انتخاب کنید</option>
                                    @foreach($groups as $group)
                                        <option value="{{$group->id}}">{{$group->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">از تاریخ</label>
                                <input type="text" class="form-control" name="from" id="from"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">تا تاریخ</label>
                                <input type="text" class="form-control" name="to" id="to"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">تخفیف(ريال)</label>
                                <input type="text" class="form-control" name="takhfif" id="takhfif"/>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="pull-left">
                        <button type="submit" class="btn btn-success">ثبت پیشنهاد</button>
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
                    <h3 class="box-title">لیست پیشنهادات</h3>
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
                                <td class="text-center" style="width: 40px">#</td>
                                <td>نام محصول</td>
                                <td class="text-center">قیمت محصول</td>
                                <td class="text-center">تخفیف</td>
                                <td class="text-center">قیمت نهایی</td>
                                <td class="text-center">از</td>
                                <td class="text-center">تا</td>
                                <td class="text-center">گروه</td>
                                <td class="text-center">اعمال کننده</td>
                                <td class="text-center">عملیات</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pishnahad as $index => $pish)
                            <tr>
                                <td class="text-center">{{ $index+1 }}</td>
                                <td>{{ $pish->product->productName }}</td>
                                <td class="bg-warning text-center">{{ $pish->product->productPrice }}</td>
                                <td class="bg-danger text-center">{{ $pish->off }}</td>
                                <td class="bg-success text-center">{{ $pish->product->productPrice-$pish->off }}</td>
                                <td class="text-center">{{ $pish->fromDate }}</td>
                                <td class="text-center">{{ $pish->toDate }}</td>
                                <td class="text-center">{{ $pish->group->name }}</td>
                                <td class="text-center">{{ $pish->user->name.' '.$pish->user->family }}</td>
                                <td class="text-center">
                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-edit-{{$pish->id}}" title="ویرایش تخفیف">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <div class="modal modal-warning fade" id="modal-edit-{{$pish->id}}" style="display: none;">
                                            <div class="modal-dialog">
                                                <form action="{{url('cp/scores/pishnahad/'.$pish->id.'/edit')}}" method="post">
                                                    @csrf
                                                    <div class="modal-content text-right">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span></button>
                                                            <h4 class="modal-title">تغییر رمز عبور</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="from">از تاریخ</label>
                                                                <input type="text" name="from" class="form-control" placeholder="از تاریخ" value="{{$pish->fromDate}}">
                                                            </div>
                                                            @error('from')
                                                                <span class="invalid-feedback" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
                                                            @enderror
                                                            <div class="form-group">
                                                                <label for="to">تا تاریخ</label>
                                                                <input type="text" name="to" class="form-control" placeholder="تا تاریخ" value="{{$pish->toDate}}">
                                                            </div>
                                                            @error('to')
                                                                <span class="invalid-feedback" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
                                                            @enderror
                                                            <div class="form-group">
                                                                <label for="takhfif">تخفیف ريال</label>
                                                                <input type="text" name="off" class="form-control" placeholder="تخفیف ريال" value="{{$pish->off}}">
                                                            </div>
                                                            @error('to')
                                                                <span class="invalid-feedback" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
                                                            @enderror
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
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-delete-{{$pish->id}}" title="ویرایش تخفیف">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <div class="modal modal-primary fade" id="modal-delete-{{$pish->id}}" style="display: none;">
                                        <div class="modal-dialog">
                                            <form action="{{url('cp/scores/pishnahad/delete/'.$pish->id)}}" method="post">
                                                @csrf
                                                <input type="hidden" value="{{$pish->id}}">
                                                <div class="modal-content text-right">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title">حذف</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="lead">آیا از حذف پیشنهاد {{$pish->product->productName}} اطمینان دارید؟</p>
                                                        <br/>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="pull-left">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> حذف </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- /.modal-content -->
                                            </form>
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
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

            $('.select2').select2();

        })
    </script>

@endsection
