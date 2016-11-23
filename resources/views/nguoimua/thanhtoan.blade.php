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
	<section id="cart_items">
		<div class="container">
			<div class="step-one">
				<h2 class="heading">Thông tin giỏ hàng</h2>
			</div>
			<div class="table-responsive cart_info">

				<table class="table table-condensed">
					<thead>
					<tr class="cart_menu">
						<td class="description">Điện thoại</td>
						<td class="price">Giá</td>
						<td class="quantity">Số lượng</td>
						<td class="total">Tổng</td>
						<td></td>
					</tr>
					</thead>
					<tbody>
					<?php foreach (Cart::content() as $item):?>
					<form action="{{url('home/giohang/xoa')}}" method="post">
						<tr>
							<td class="cart_description">
								<h4><a href=""><?= $item->name?></a></h4>
								<input type="hidden" name="dt_maso" value="<?= $item->rowId ?>">
								<p><?= $item->id ?></p>
							</td>
							<td class="cart_price">
								<p class="number"><?= $item->price ?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<input class="cart_quantity_input" type="number" name="quantity" value="<?= $item->qty ?>" autocomplete="off" size="2" readonly>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price number"><?= $item->total ?></p>
							</td>
							<td class="cart_delete">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button class="cart_quantity_delete" type="submit"><i class="fa fa-times"></i></button>
							</td>
						</tr>
					</form>
					<?php endforeach; ?>
					<?php if(Cart::count()==0): ?>
					<tr>
						<td colspan="5">Chưa có sản phẩm trong giỏ hàng</td>
					</tr>
					<?php endif; ?>
					<tr class="table table-condensed total-result">
						<td colspan="2">&nbsp;</td>
						<td style="color: #D62617;font-size:22px;">Tổng cộng</td>
						<td><span><?= Cart::total()?></span></td>
						<td></td>
					</tr>
					</tbody>
				</table>
			</div>
			<div class="shopper-informations">
				<div class="step-one">
					<h2 class="heading">Thông tin thanh toán</h2>
				</div>
				<form action="{{url('home/hoadon/them')}}" method="post">
					<div class="row">

						<div class="col-sm-6">
							<div class="shopper-info">
								<p><input type="radio" name="type" value="0" checked onclick="type_0();"/>Sử dụng thông tin có sẵn</p>
								<input name="nd_hoten" type="text" placeholder="Họ tên" value="<?= isset($nguoimua)?$nguoimua->nd_hoten:'' ?>" readonly>
								<input name="nd_dchi" type="text" placeholder="Địa chỉ *" value="<?= isset($nguoimua)?$nguoimua->nd_dchi:'' ?>" readonly>
								<input name="nd_sdt" type="text" placeholder="Số điện thoại *" value="<?= isset($nguoimua)?$nguoimua->nd_sdt:'' ?>" readonly>
								<br><br>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="shopper-info">
								<p><input type="radio" name="type" value="1" onclick="type_1();"/>Nhập thông tin mới</p>
								<input name="hd_nguoinhan" type="text" placeholder="Họ tên người nhận *" hidden>
								<input name="hd_dchi" type="text" placeholder="Địa chỉ *" hidden>
								<input name="hd_sdt" type="text" placeholder="Số điện thoại *" hidden>
								<br><br>
							</div>
						</div>
					</div>
					<div class="row">

						<div class="col-sm-12">
							<div class="total_area">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button type="submit" class="btn btn-primary col-sm-offset-6">Thanh toán</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		</div>
		</div>
	</section> <!--/#cart_items-->
@endsection
///
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
	<input type="hidden" name="cmd" value="_xclick">
	<input type="hidden" name="business" value="maihuynh16995-facilitator@gmail.com">
	<input type="hidden" name="lc" value="VN">
	<input type="hidden" name="item_name" value="N&#7841;p ti&#7873;n">
	<input type="hidden" name="item_number" value="nd_taikhoan">
	<input type="hidden" name="button_subtype" value="services">
	<input type="hidden" name="no_note" value="0">
	<input type="hidden" name="currency_code" value="USD">
	<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
	<table>
		<tr><td><input type="hidden" name="on0" value="hdtk_gia">hdtk_gia</td></tr><tr><td><select name="os0">
					<option value="100,000 VND">100,000 VND $5.00 USD</option>
					<option value="200,000 VND">200,000 VND $10.00 USD</option>
					<option value="500,000 VND">500,000 VND $25.00 USD</option>
				</select> </td></tr>
	</table>
	<input type="hidden" name="currency_code" value="USD">
	<input type="hidden" name="option_select0" value="100,000 VND">
	<input type="hidden" name="option_amount0" value="5.00">
	<input type="hidden" name="option_select1" value="200,000 VND">
	<input type="hidden" name="option_amount1" value="10.00">
	<input type="hidden" name="option_select2" value="500,000 VND">
	<input type="hidden" name="option_amount2" value="25.00">
	<input type="hidden" name="option_index" value="0">
	<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
	<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
