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
            <h2>Khóa người dùng</h2>
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
                <div class="col-sm-4 padding-right"></div>
                <div class="step-one">
                    <h2 class="heading">Khóa người dùng</h2>
                </div>
                <form action="<?= url('quantri/nguoidung/_khoa') ?>" method="POST" class="form-horizontal">
                    <fieldset>
                        <div class="form-group"><!----<label class="control-label">Tên người dùng:</label>--->
                            <select name="tk_nguoidung" id="combobox">
                                <?php foreach ($nguoidung as $item):?>
                                <?php if ($item->nd_tinhtrang==1): ?>
                                <option value="<?= $item->nd_maso ?>"><?= $item->nd_hoten ?></option>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group"><!---<label class="control-label">Email</label>--->
                            <input type="hidden" name="tk_noidung" value="-1">
                            <input type="text" name="tk_ghichu" required ='required' class="col-md-4 form-control" placeholder="Lí do khóa tài khoản"></div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default col-sm-offset-5">Lưu</button>
                        </div>
                    </fieldset>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
        </div>
        <div class="col-sm-4 padding-right"></div>
        <div class="step-one">
            <h2 class="heading">Mở khóa người dùng</h2>
        </div>
        <form action="<?= url('quantri/nguoidung/_khoa') ?>" method="POST" class="form-horizontal">
            <fieldset>
                <div class="form-group"><!----<label class="control-label">Tên người dùng:</label>--->
                    <select name="tk_nguoidung" id="combobox">
                        <?php foreach ($nguoidung as $item):?>
                        <?php if ($item->nd_tinhtrang==(-1)): ?>
                        <option value="<?= $item->nd_maso ?>"><?= $item->nd_hoten ?></option>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group"><!---<label class="control-label">Email</label>--->
                    <input type="hidden" name="tk_noidung" value="-1">
                    <input type="text" name="tk_ghichu" required ='required' class="col-md-4 form-control" placeholder="Lí do khóa tài khoản"></div>
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