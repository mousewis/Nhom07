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
            @include('nguoiban.panel');
        </div>
    </div>
    <?php if(isset($dienthoai)):?>
    <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="{{url('dienthoai/hinh/'.$dienthoai->dt_hinh)}}" alt=""/>
                </div>
                <div id="similar-product" class="carousel slide" style="width:10px">
                </div>
            </div>
            <div class="col-sm-7">
                <div class="product-information">
                    <h2>Hóa đơn nhập</h2>
                    <div class="choose">
                        <ul>
                            <li><p>Mã số: <?= $dienthoai->hdn_maso ?></p></li>
                            <li><p>Thời gian: <?= $dienthoai->hdn_tgian?></p></li>
                            <li><p>Giá: <?= $dienthoai->hdn_gia?></p></li>
                        </ul>
                    </div>
                </div>
                <div class="product-information"><!--/product-information-->
                    <h2>Thông tin điện thoại</h2>
                    <div class="choose">
                        <ul>
                            <li><p>Mã số: <?= $dienthoai->dt_maso?></p></li>
                            <li><p>Tên điện thoại: <?= $dienthoai->dt_ten?></p></li>
                            <li><p>Giá: <p class="number"><?= $dienthoai->dt_gia ?></p></p></li>
                            <li><p>Số lượng còn lại: <?= $dienthoai->dt_sluong?></p></li>
                            <li><p>Thương hiệu: <?= $dienthoai->th_ten?></p></li>
                        </ul>
                    </div>
                    <!--/product-information-->
            </div>
        </div><!--/product-details-->

        <!--<div class="category-tab shop-details-tab">-->
        <!--category-tab-->
        <div class="component">
            <table>
                <tr>
                    <th>Loại</th>
                    <td><?= $dienthoai->dt_loai?></td>
                </tr>
                <tr>
                    <th>Kích cỡ</th>
                    <td><?= $dienthoai->dt_kco?></td>
                </tr>
                <tr>
                    <th>Độ phân giải</th>
                    <td><?= $dienthoai->dt_pgiai?></td>
                </tr>
                <tr>
                    <th>Dung lượng pin</th>
                    <td><?= $dienthoai->dt_pin?></td>
                </tr>
                <tr>
                    <th>Hệ điều hành</th>
                    <td><?= $dienthoai->dt_hdh?></td>
                </tr>
                <tr>
                    <th>Dung lượng RAM</th>
                    <td><?= $dienthoai->dt_ram?></td>
                </tr>
                <tr>
                    <th>Bộ nhớ</th>
                    <td><?= $dienthoai->dt_bnho?></td>
                </tr>
                <tr>
                    <th>Camera</th>
                    <td><?= $dienthoai->dt_cam?></td>
                </tr>
            </table>

        </div>
        <!--</div><!--/category-tab-->
    </div>
    <?php endif;?>
@endsection