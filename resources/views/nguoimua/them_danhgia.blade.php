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
        @include('nguoimua.panel')
            </div>
        </div>
    <?php if (isset($danhgia)): ?>
    <div class="col-sm-9 padding-right text-center">
        <div class="signup-form"><!--sign up form-->
            <h2 class="title text-center">Người bán cần được đánh giá</h2>
            <table>
                <tr>
                    <th><i class="fa fa-info"></i>Hóa đơn</th>
                    <th><i class="fa fa-user"></i>Người bán</th>
                    <th><i class="fa fa-star"></i>Điểm</th>
                    <th></th>
                </tr>
                @foreach($danhgia as $item)
                    @if ($item->danhgia==0)
                    <tr>
                        <form action="{{url('nguoimua/danhgia/luu')}}" method="post">
                        <td><?= $item->hoadon ?>
                            <input type="hidden" name="dg_hoadon" value="<?= $item->hoadon?>"></td>
                        <td><?= $item->nguoiban?>
                        <input type="hidden" name="dg_nguoiban" value="<?= $item->nguoiban?>">
                        </td>
                        <td>
                            <select name="dg_diem">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </td>
                        <td>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit">Lưu đánh giá</button>
                        </td>
                        </form>
                    </tr>
                    @endif
                @endforeach
            </table>
    </div>
        </div>
    <?php endif; ?>
@endsection