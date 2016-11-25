@if (count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
@if (isset($hoadon))
	<table>
		<tr>
			<th><i class="fa fa-info-circle"></i> Mã đơn hàng</th>
			<th><i class="fa fa-clock-o"></i> Thời gian</th>
			<th><i class="fa fa-user"></i> Người nhận</th>
			<th><i class="fa fa-dollar"></i> Tổng tiền</th>
			<th><i class="fa fa-star"></i> Tình trạng</th>
			<th><i class="fa fa-unlock"></i> Xem chi tiết</th>
		</tr>
		@foreach($hoadon as $item)
		<br>
			<td><?= $item->hd_maso ?></td>
			<td><?= $item->hd_tgian ?></td>
			<td>
				<?= $item->hd_nguoinhan ?></br>
					<?= $item->hd_dchi ?></br>
					<?= $item->hd_sdt ?>
			</td>
		<td><?= $item->hd_gia?></td>
		<td><?php switch($item->hd_tinhtrang)
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
			<a href="{{url('nguoimua/hoadon/'.$item->hd_maso)}}">Chi tiết</a>
		</td>
		</tr>
		@endforeach
<tr>
	<td colspan="6">
		<div class="col-sm-12 text-center">
			<ul class="pagination">
				{!! $hoadon->appends(Request::input())->links() !!}
			</ul>
		</div>
	</td>
</tr>
	</table>

@endif