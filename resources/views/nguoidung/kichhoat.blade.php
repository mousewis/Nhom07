@extends('layouts.app')
@section('content')
    <div class="col-sm-4 col-lg-offset-4 text-center">
        <div class="login-form"><!--login form-->
            <h2>Kích hoạt tài khoản</h2>
            @include('nguoidung._kichhoat')
        </div><!--/login form-->
    </div>
@endsection