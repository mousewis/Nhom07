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

    <?php if (isset($cthoadon)): ?>
    <div class="col-sm-9 padding-right">
        <div class="signup-form"><!--sign up form-->
            <h2>Hóa đơn <?=$cthoadon[0]->hd_maso ?></h2>
            <div class="step-one">
                <h2 class="heading">Thông tin sản phẩm</h2>
            </div>
            <section id="cart_items">
                <div class="table-responsive cart_info">
                    <table class="table table-responsive" >
                        <tr class="cart_menu">
                            <th>Mã số</th>
                            <th>Điện thoại</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                            <th>Tình trạng</th>
                            <th>Tùy chọn</th>
                        </tr>
                        <?php foreach ($cthoadon as $item):?>
                        <tr>
                            <td class="cart_quantity_input"><?= $item->cthd_maso?></td>
                            <td>
                                <h4><?= $item->dt_ten?></h4>
                                <p><?= $item->dt_maso ?></p>
                            </td>
                            <td><p class="number"><?= $item->dt_gia ?></p></td>
                            <td><p class="number"><?= $item->cthd_soluong ?></p></td>
                            <td><p class="number"><?= $item->cthd_gia ?></p></td>
                            <td>
                                <?php switch($item->cthd_tinhtrang)
                                {
                                    case '-1': echo 'Đã hủy';
                                        break;
                                    case '0': echo 'Đang xử lý';
                                        break;
                                    case '1':echo 'Đã xác nhận';
                                        break;
                                    case '2':echo 'Hoàn tất';
                                        break;
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($item->cthd_tinhtrang=='-1')
                                    echo '';
                                if ($item->cthd_tinhtrang=='2')
                                    echo '';
                                ?>
                                <?php if (($item->cthd_tinhtrang=='0')||($item->cthd_tinhtrang=='1')): ?>
                                <form action="{{url('nguoiban/hoadon/capnhat')}}" method="post">
                                    <input type="hidden" name="cthd_hoadon" value="<?= $item->cthd_hoadon?>">
                                    <input type="hidden" name="cthd_maso" value="<?=$item->cthd_maso ?>">
                                    <input type="hidden" name="cthd_tinhtrang" value="<?=($item->cthd_tinhtrang=='0')?'1':'2' ?>">
                                    <button type="submit"><?=($item->cthd_tinhtrang=='0')?'XÁC NHẬN':'HOÀN TẤT' ?></button>';
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                                <form action="{{url('nguoiban/hoadon/capnhat')}}" method="post">
                                    <input type="hidden" name="cthd_hoadon" value="<?= $item->cthd_hoadon?>">
                                    <input type="hidden" name="cthd_maso" value="<?=$item->cthd_maso ?>">
                                    <input type="hidden" name="cthd_tinhtrang" value="-1">
                                    <button type="submit">HỦY</button>';
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </section>
            <div class="shopper-informations">
                <div class="step-one">
                    <h2 class="heading">Thông tin thanh toán</h2>
                </div>
                <div class="table-responsive cart_info">
                    <div class="shopper-info">
                        <table>
                            <tr>
                                <th>Người mua</th>
                                <td><?= $cthoadon[0]->hd_nguoimua ?></td>
                            </tr>
                            <tr>
                                <th>Người nhận</th>
                                <td><?= $cthoadon[0]->hd_nguoinhan ?></td>
                            </tr>
                            <tr>
                                <th>Địa chỉ</th>
                                <td><?= $cthoadon[0]->hd_dchi ?></td>
                            </tr>
                            <tr>
                                <th>Số điện thoại</th>
                                <td><?= $cthoadon[0]->hd_sdt ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="step-one">
                    <h2 class="heading">Phương thức thanh toán</h2>
                </div>
                <div class="shopper-info">
                    <p>Thanh toán tiền mặt khi nhận hàng</p>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
@endsection