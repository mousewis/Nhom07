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
    @include('quantri.panel')
    </div>
        </div>

    <?php if (isset($nguoiban)): ?>
    <div class="col-sm-9 padding-right text-center">
        <div class="signup-form"><!--sign up form-->
            <h2>Thêm người dùng</h2>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="<?= url('quantri/nguoidung/them') ?>" method="POST" class="form-horizontal">
                <fieldset>
                    <div class="form-group"><!----<label class="control-label">Tên người dùng:</label>--->
                        <input type="text" name="nd_maso" required ='required' class="col-md-4 form-control" placeholder="Tên người dùng"></div>
                    <div class="form-group"><!---<label class="control-label">Email</label>--->
                        <input type="email" name="nd_email" required ='required' class="col-md-4 form-control" placeholder="Email"></div>
                    <div class="form-group"><!----<label class="control-label">Mật khẩu</label>-->
                        <input type="password" name="nd_matkhau" required ='required' class="col-md-4 form-control" placeholder="Mật khẩu"></div>
                    <div class="form-group"><!--<label class="control-label">Họ tên:</label>-->
                        <input type="text" name="nd_hoten" required ='required' class="col-md-4 form-control" placeholder="Họ tên"></div>
                    <div class="form-group"><!--<label class="control-label">Số điện thoại:</label>-->
                        <input type="text" name="nd_sdt" required ='required' class="col-md-4 form-control" placeholder="Số điện thoại"></div>
                    <div class="form-group"><!--<label class="control-label">Địa chỉ</label>-->
                        <input type="text" name="nd_dchi" required ='required' class="col-md-4 form-control" placeholder="Địa chỉ"></div>
                    <div class="form-group"><label class="control-label">Loại:</label>
                        <select id="nd_loai" name="nd_loai">
                            <option value="2">Người mua</option>
                            <option value="1">Người bán</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default col-sm-offset-5">Đăng kí</button>
                    </div>
                </fieldset>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
    </div>
        </div>
    <?php endif; ?>
@endsection