@extends('layouts.app')
@section('content')
    <div class="col-sm-4 col-lg-offset-4 text-center">
        <div class="login-form"><!--login form-->
            <h2>Đăng nhập</h2>
            @include('nguoidung._dangnhap')
        </div><!--/login form-->
    </div>
@endsection