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
    <?php if (isset($danhgia)): ?>
    <div class="col-sm-9 padding-right text-center">
        <div class="signup-form"><!--sign up form-->
            <h2 class="title text-center">Danh sách đánh giá</h2>
            <table>
                <tr>
                    <th><i class="fa fa-info"></i>Mã số</th>
                    <th><i class="fa fa-money"></i>Mã hóa đơn</th>
                    <th><i class="fa fa-clock-o"></i>Thời gian</th>
                    <th><i class="fa fa-user"></i>Người bán</th>
                    <th><i class="fa fa-star"></i>Điểm</th>
                </tr>
                @foreach($danhgia as $item)
                    <tr>
                        <td><?= $item->dg_maso?></td>
                        <td><?= $item->dg_hoadon ?></td>
                        <td><?= $item->dg_tgian?></td>
                        <td><?= $item->dg_nguoiban?></td>
                        <td><?= $item->dg_diem?>/5</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5">
                        <div class="col-sm-12 text-center">
                            <ul class="pagination">
                                {!! $danhgia->appends(Request::input())->links() !!}
                            </ul>
                        </div></td>
                </tr>
            </table>
        </div>
    </div>
    <?php endif; ?>
@endsection