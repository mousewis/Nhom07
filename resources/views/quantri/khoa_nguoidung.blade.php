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
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
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
            @if (isset($nguoidung))
                <div class="col-sm-6 padding-left">
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
                <div class="col-sm-1"></div>
                <div class="col-sm-5 padding-right">
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
                                <input type="hidden" name="tk_noidung" value="1">
                                <input type="text" name="tk_ghichu" required ='required' class="col-md-4 form-control" placeholder="Lí do mở khóa tài khoản"></div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default col-sm-offset-5">Lưu</button>
                            </div>
                        </fieldset>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
            @endif
            <div class="col-sm-12 padding-right">
                <div class="step-one">
                    <h2 class="heading">Lịch sử khóa/mở khóa tài khoản</h2>
                </div>
                <table>
                    <tr>
                        <th>Mã số</th>
                        <th>Người dùng</th>
                        <th>Thời gian</th>
                        <th>Nội dung</th>
                        <th>Lí do</th>
                    </tr>
                    @if (isset($taikhoan))
                    @foreach($taikhoan as $item)
                        <tr>
                            <td><?=$item->tk_maso ?></td>
                            <td><?= $item->tk_nguoidung?></td>
                            <td><?= $item->tk_tgian?></td>
                            <td><?php switch ($item->tk_noidung)
                                {
                                    case '-1': echo 'Khóa tài khoản';
                                        break;
                                    case '1': echo 'Mở khóa tài khoản';
                                        break;
                                }
                                ?>
                            </td>
                            <td>
                                <?= $item->tk_ghichu ?>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5">{!! $taikhoan->appends(Request::input())->links() !!}</td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>

@endsection