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
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
					<h3>Thanh toán</h3>
			</div>
			<div class="row">
					<div class="col-sm-12">
						<div class="total_area">
							<ul>
								<li style="color: #D62617;font-size:22px;">Tổng <span><?= Cart::total() ?></span></li>
							</ul>
							<a style="margin-left: 45%" class="btn btn-primary" href="{{url('home/thanhtoan')}}">Thanh toán</a>
						</div>
					</div>
				</div>
		</div>
	</section><!--/#do_action-->


@endsection