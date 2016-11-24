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
        @include('nguoiban.panel')
            </div>
        </div>
    <div class="col-sm-9 padding-right text-center">
        <div class="signup-form"><!--sign up form-->
            <h2>Thêm điện thoại</h2>
    @include('nguoiban._dienthoai')
    </div>
        </div>
@endsection