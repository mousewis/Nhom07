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
            <h2 class="title text-center">Đánh giá</h2>
            <table>
                <tr>
                    <th><i class="fa fa-user"></i>Người đánh giá</th>
                    <th><i class="fa fa-clock-o"></i>Thời gian</th>
                    <th><i class="fa fa-star"></i>Điểm</th>
                </tr>
                @foreach($danhgia as $item)
                    <tr>
                        <td><?= $item->dg_nguoimua?></td>
                        <td><?= $item->dg_tgian ?></td>
                        <td><?= $item->dg_diem ?>/5</td>
                    </tr>
                @endforeach
            </table>
    </div>
        </div>
    <?php endif; ?>
@endsection