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

    <?php if (isset($cthoadon)): ?>
    <div class="col-sm-9 padding-right">
        <div class="signup-form"><!--sign up form-->
            <h2>Hóa đơn <?=$cthoadon[0]->hd_maso ?></h2>
            <h4>Tình trạng:
                <?php switch($cthoadon[1]->hd_tinhtrang)
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
            </h4>
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
                                <a href="{{url('home/nguoiban/'.$item->nd_maso)}}"><?= $item->nd_hoten?></a>
                                </br><?= $item->nd_dchi ?>
                                </br><?= $item->nd_sdt ?>
                                </br>Đánh giá:<?= $item->nd_danhgia?>/5
                            </td>
                            <td>
                                <?php switch($item->cthd_tinhtrang)
                                {
                                    case '-1': echo 'Đã hủy';
                                        break;
                                    case '0': echo 'Chưa xác nhận';
                                        break;
                                    case '1':echo 'Đã xác nhận';
                                        break;
                                    case '2':echo 'Thành công';
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
                <div class="row">
                    <div class="step-one">
                        <h2 class="heading">Phương thức thanh toán</h2>
                        <p>Thanh toán tiền mặt khi nhận hàng</p>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>
@endsection