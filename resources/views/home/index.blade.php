@extends('layouts.app')
@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="col-sm-3">
        <div class="left-sidebar">
    @include('thuonghieu.danhsach')
    @include('nguoiban.danhsach')
            </div>
        </div>
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Danh sách điện thoại</h2>
            <?php if (isset($dienthoai)): ?>
            <?php foreach ($dienthoai as $item): ?>
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::asset('/images/product-details/'.$item->dt_hinh)}}" alt="" >
                            <h2 class="number"><?= $item->dt_gia ?></h2>
                            <p><?= $item->dt_ten ?></p>
                            <a href="{{url('dienthoai/chitiet/'.$item->dt_maso)}}" class="btn btn-default add-to-cart">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                        <?php
                        echo floor(abs(time() - strtotime($item->hdn_tgian))/86400)<10?"<img src='images/home/new.png' class='new' alt=''>":"" ?>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href=""><i class="fa fa-user"></i><?=$item->hdn_nguoidung?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>

            <p>Không có danh sách điện thoại</p>

            <?php endif; ?>
            <div class="col-sm-12 text-center">
                <ul class="pagination">
                    {!! $dienthoai->links() !!}
                </ul>
            </div><!--features_items-->


        </div>
        </div>
@endsection