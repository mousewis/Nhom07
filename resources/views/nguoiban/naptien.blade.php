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
            @include('nguoiban.panel')
        </div>
    </div>
    <div class="col-sm-9 padding-right text-center">
        <div class="signup-form"><!--sign up form-->
            <h2>Lịch sử giao dịch</h2>
            <table>
                <tr>
                    <form action="{{url('nguoiban/naptien')}}" method="get">
                        <td>Sắp xếp theo:</td>
                        <td>
                            <select name="col">
                                <option value="hdtk_tgian">Thời gian</option>
                                <option value=hdtk_gia>Giá trị</option>
                            </select>
                        </td>
                        <td>
                            <select name="type">
                                <option value="desc">Giá trị giảm dần</option>
                                <option value="asc">Giá trị tăng dần</option>
                            </select>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary">Sắp xếp</button>
                        </td>
                    </form>
                </tr>
            </table>
            <table>
                    <form name="timkiem" action="{{url('nguoiban/naptien')}}" method="get">
                        <tr>
                        <td>
                            Từ:<input name="hdtk_tgian_tu" type="date" value="2010-01-01" required>
                        </td>
                        <td>
                            Đến:<input name="hdtk_tgian_den" type="date" value="2020-01-01" required>
                        </td>
                        <td>
                            Từ:<input name="hdtk_gia_tu" type="number" value="0" required min="0">
                        </td>
                        <td>
                            Đến:<input name="hdtk_gia_den" type="number" value="10000000" required min="0">
                        </td>
                        </tr>
                        <tr>
                        <td colspan="1">
                            <button type="submit" class="btn btn-primary">Lọc</button>
                        </td>
                        </tr>
                    </form>
            </table>

            <table>
                <tr>
                    <th>Mã số</th>
                    <th>Người dùng</th>
                    <th>Thời gian</th>
                    <th>Giá</th>
                </tr>
                @if (isset($hoadontk))
                    @foreach ($hoadontk as $item)
                        <tr>
                            <td><?= $item->hdtk_maso?></td>
                            <td><?= $item->hdtk_nguoidung?></td>
                            <td><?= $item->hdtk_tgian?></td>
                            <td><p class="number"><?= $item->hdtk_gia?></p></td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">
                            {!! $hoadontk->appends(Request::input())->links() !!}
                        </td>
                    </tr>
                @endif
            </table>

                </div>
    </div>

@endsection