@extends('layouts.app')
@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (session('error-message'))
        <div class="alert alert-danger">
            {{ session('error-message') }}
        </div>
    @endif
    <div class="col-sm-3">
        <div class="left-sidebar">
    @include('nguoimua.panel')
    </div>
        </div>

    <?php if (isset($nguoimua)): ?>
    <div class="col-sm-9 padding-right text-center">
        <div class="signup-form"><!--sign up form-->
            <h2>Thông tin tài khoản</h2>
    @include('nguoimua._taikhoan')
    </div>
        </div>
    <?php endif; ?>
@endsection