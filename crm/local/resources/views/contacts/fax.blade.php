@extends('layouts.main')

@section('content')

    <section class="content-header">
        <h1>
            فکس ها
            <small>تعداد فکس باقیمانده: 0 فکس </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/cp')}}"><i class="fa fa-dashboard"></i> داشبورد </a></li>
            <li class="active">ارسال شده ها</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="text-center">
                <div class="alert alert-danger">
                    <h3>برای استفاده از این قابلیت باید از parsgreen.com اکانت تهیه کنید</h3>
                    <a href="https://www.parsgreen.com/Fax/%D9%BE%D9%86%D9%84-%D9%81%DA%A9%D8%B3-%D8%A7%DB%8C%D9%86%D8%AA%D8%B1%D9%86%D8%AA%DB%8C" class="btn btn-link">parsgreen.com</a>
                </div>
            </div>
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
