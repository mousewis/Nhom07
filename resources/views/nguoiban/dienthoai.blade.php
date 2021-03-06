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
    <div class="col-sm-9 padding-right">
        <div class="features_items">
            <h2 class="title text-center">Danh sách điện thoại</h2>
            <?php if (isset($dienthoai)): ?>
            <?php foreach ($dienthoai as $item): ?>
            <?php if ($item->hdn_nguoidung==Session::get('nd_maso')): ?>
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{url('dienthoai/hinh/'.$item->dt_hinh)}}" alt="" >
                            <h2 class="number"><?= $item->dt_gia ?></h2>
                            <p><?= $item->dt_ten ?></p>
                            <a href="{{url('nguoiban/dienthoai/'.$item->dt_maso)}}" class="btn btn-default add-to-cart"><i class="fa fa-plus-square"></i>Xem chi tiết</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                            <h2 class="number"><?=(int)$item->dt_sluong>0?$item->dt_gia:'HẾT HÀNG' ?></h2>
                            <p><?= $item->dt_ten ?></p>
                            <a href="{{url('nguoiban/dienthoai/'.$item->dt_maso)}}" class="btn btn-default add-to-cart"><i class="fa fa-plus-square"></i>Xem chi tiết</a>
                            </div>
                        </div>
                        <?php
                        echo floor(abs(time() - strtotime($item->hdn_tgian))/86400)<10?"<img src='".asset('images/home/new.png')."' class='new' alt=''>":"" ?>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="#"><i class="fa fa-plus"></i>Tồn:<?=$item->dt_sluong?></a></li>
                                <li><a href="#"><i class="fa fa-minus"></i>Bán:<?=$item->dt_ban?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="col-sm-12 text-center">
            <ul class="pagination">
                {!! $dienthoai->appends(Request::input())->links() !!}
            </ul>
        </div>
            <?php else: ?>

            <p>Không có danh sách điện thoại</p>

            <?php endif; ?>
            <!--features_items-->


        </div>
@endsection