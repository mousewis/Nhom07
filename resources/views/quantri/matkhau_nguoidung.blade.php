@extends('layouts.admin')
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

    <div class="col-sm-9 padding-right text-center">
        <div class="signup-form"><!--sign up form-->
            <h2>Đặt lại mật khẩu</h2>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (isset($nguoidung))
                <div class="col-sm-9 col-sm-offset-2 padding-right">
                    <form action="<?= url('quantri/nguoidung/_matkhau') ?>" method="POST" class="form-horizontal">
                        <fieldset>
                            <div class="form-group"><!----<label class="control-label">Tên người dùng:</label>--->
                                <select name="nd_maso" id="combobox">
                                    <?php foreach ($nguoidung as $item):?>
                                    <option value="<?= $item->nd_maso ?>"><?= $item->nd_hoten ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group"><!---<label class="control-label">Email</label>--->
                                <input type="password" name="nd_matkhau" required ='required' class="col-md-4 form-control" placeholder="Nhập mật khẩu mới"></div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default col-sm-offset-5">Lưu</button>
                            </div>
                        </fieldset>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
            @endif
        </div>
    </div>
@endsection