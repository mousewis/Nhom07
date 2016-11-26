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
            <h2>Danh sách hóa đơn nhập</h2>
            <table>
                <tr>
                    <form action="{{url('quantri/hoadonnhap')}}" method="get">
                    <td>
                        Sắp xếp theo:
                        <select name="col">
                            <option value="hdn_tgian">Thời gian</option>
                            <option value="hdn_nguoidung">Người bán</option>
                        </select>
                    </td>
                        <td>
                            <select name="val">
                                <option value="asc">Giá trị tăng dần</option>
                                <option value="desc">Giá trị giảm dần</option>
                            </select>
                        </td>
                        <td>
                            <button type="submit">Sắp xếp</button>
                        </td>
                    </form>
                </tr>
            </table>
            <table>
                <tr>
                    <th>Mã số</th>
                    <th>Điện thoại</th>
                    <th>Thời gian</th>
                    <th>Người bán</th>
                    <th>Giá trị</th>
                </tr>
                @if (isset($hoadonnhap))
                    @foreach ($hoadonnhap as $item)
                        <tr>
                            <td><?= $item->hdn_maso?></td>
                            <td><p><?= $item->dt_ten?></p>
                                <?= $item->dt_maso?>
                            </td>
                            <td><?= $item->hdn_tgian?></td>
                            <td><?= $item->hdn_nguoidung?></td>
                            <td><?= $item->hdn_gia?>/5</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5">
                            {!! $hoadonnhap->appends(Request::input())->links() !!}
                        </td>
                    </tr>
                @endif
            </table>
                </div>
    </div>

@endsection