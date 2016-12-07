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
            <h2>Đánh giá của người mua</h2>
            <table>
                <tr>
                    <th>Mã số</th>
                    <th>Người mua</th>
                    <th>Người bán</th>
                    <th>Thời gian</th>
                    <th>Điểm</th>
                </tr>
                @if (isset($danhgia))
                    @foreach ($danhgia as $item)
                        <tr>
                            <td><?= $item->dg_maso?></td>
                            <td><?= $item->dg_nguoimua?></td>
                            <td><?= $item->dg_nguoiban?></td>
                            <td><?= $item->dg_tgian?></td>
                            <td><?= $item->dg_diem?>/5</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5">
                            {!! $danhgia->appends(Request::input())->links() !!}
                        </td>
                    </tr>
                @endif
            </table>
                </div>
    </div>

@endsection