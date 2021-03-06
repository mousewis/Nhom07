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
    <div class="col-sm-3">
        <div class="left-sidebar">
            @include('quantri.panel')
        </div>
    </div>

    <?php if (isset($cthoadon)): ?>
    <div class="col-sm-9 padding-right">
        <div class="signup-form"><!--sign up form-->
            <h2>Hóa đơn <?=$cthoadon[0]->hd_maso ?></h2>
            <h4>Tình trạng:
                <?php
                echo (($cthoadon[0]->hd_hoantat>0)&&($cthoadon[0]->hd_hoantat == ($cthoadon[0]->hd_soluong - $cthoadon[0]->hd_huy)))?'ĐÃ HOÀN TẤT</br>':'';
                echo (($cthoadon[0]->hd_xuly>0)&&($cthoadon[0]->hd_xuly == ($cthoadon[0]->hd_soluong - $cthoadon[0]->hd_huy - $cthoadon[0]->hd_hoantat)))?'ĐÃ XÁC NHẬN</br>':'';
                echo (($cthoadon[0]->hd_soluong - $cthoadon[0]->hd_huy - $cthoadon[0]->hd_hoantat - $cthoadon[0]->hd_xuly )>0)?'ĐANG XỬ LÝ</br>':'';
                echo ($cthoadon[0]->hd_huy == $cthoadon[0]->hd_soluong)?'ĐÃ HỦY</br>':'';
                ?>
            </h4>
            <h5>
                <?php
                echo ($cthoadon[0]->hd_xuly>0)?'</br>Đã xử lý: '.$cthoadon[0]->hd_xuly.'</br>':'';
                echo ($cthoadon[0]->hd_hoantat>0)?'</br>Đã hoàn tất: '.$cthoadon[0]->hd_hoantat.'</br>':'';
                echo ($cthoadon[0]->hd_xuly>0)?'</br>Đã hủy: '.$cthoadon[0]->hd_huy.'</br>':'';
                ?>
            </h5>
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
                            <th>Người bán</th>
                            <th>Tình trạng</th>
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
                                <a href="{{url('quantri/nguoidung/'.$item->nd_maso)}}"><?= $item->nd_hoten ?></a>
                                </br><?= $item->nd_dchi ?>
                                </br><?= $item->nd_sdt ?>
                                </br>Đánh giá:<?= $item->nd_danhgia?>/5
                            </td>
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
                        </tr>
                        <?php endforeach; ?>
                        <tr class="table table-condensed total-result">
                            <td colspan="4" align="right" style="color: #D62617;font-size:22px;">Tổng cộng</td>
                            <td colspan="3" align="left" class="cart_total_price"><p class="number"><?= $cthoadon[0]->hd_gia?></p></td>
                        </tr>
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
                                <td><a href="{{url('quantri/nguoidung/'.$item->hd_nguoimua)}}"><?= $item->hd_nguoimua ?></a></td>
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