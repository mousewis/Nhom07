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
		<td><p class="number"><?= $item->hd_gia?></p></td>
		<td><p><?php
				echo ($item->hd_hoantat == ($item->hd_soluong - $item->hd_huy))?'ĐÃ HOÀN TẤT':'';
				echo ($item->hd_xuly == ($item->hd_soluong - $item->hd_huy - $item->hd_hoantat))?'ĐÃ XÁC NHẬN':'';
				echo (($item->hd_soluong - $item->hd_huy - $item->hd_hoantat - $item->hd_xuly )>0)?'ĐANG XỬ LÝ':'';
				echo ($item->hd_huy == $item->hd_soluong)?'ĐÃ HỦY':'';
				?>
			</p>
			<?php
				echo ($item->hd_xuly>0)?'</br>Đã xử lý: '.$item->hd_xuly.'</br>':'';
				echo ($item->hd_hoantat>0)?'</br>Đã hoàn tất: '.$item->hd_xuly.'</br>':'';
				echo ($item->hd_xuly>0)?'</br>Đã hủy: '.$item->hd_huy.'</br>':'';
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