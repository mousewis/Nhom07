@extends('layouts.admin')
@section('content')
    <div class="col-sm-4 col-lg-offset-4 text-center">
        <div class="login-form"><!--login form-->
            <h2>QUẢN TRỊ WEBSITE</h2>
            @include('quantri._dangnhap')
        </div><!--/login form-->
    </div>
@endsection