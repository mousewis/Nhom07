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
			<form action="{{url('nguoiban/hoadon')}}" method="get">
		<td>Sắp xếp theo:</td>
			<td>
				<select name="col">
					<option value="hd_tgian">Thời gian</option>
					<option value="cthd_gia">Giá trị đơn hàng</option>
					<option value="cthd_tinhtrang">Trạng thái</option>
				</select>
			</td>
				<td>
					<select name="type">
						<option value="desc">Giá trị giảm dần</option>
						<option value="asc">Giá trị tăng dần</option>
					</select>
				</td>
				<td>
					<button type="submit" class="btn btn-primary">Sắp xếp</button>
				</td>
			</form>
		</tr>
	</table>
	<table>
		<tr>
			<form name="timkiem" action="{{url('nguoiban/hoadon')}}" method="get">
				<td>
					Từ:<input name="hd_tgian_tu" type="date" value="2010-01-01" required>
				</td>
				<td>
					Từ:<input name="hd_tgian_den" type="date" value="2020-01-01" required>
				</td>
				<td>
					Địa chỉ giao: <input type="text" name="hd_dchi">
				</td>
				<td>Trạng thái:
					<select name="cthd_tinhtrang">
						<option value="">Tất cả</option>
						<option value="-1">Đã hủy</option>
						<option value="0">Đang xử lý</option>
						<option value="1">Đã xác nhận</option>
						<option value="2">Đã hoàn tất</option>
					</select>
				</td>
				<td>
					<button type="submit" class="btn btn-primary">Lọc</button>
				</td>
			</form>
		</tr>
	</table>
	<table>
		<tr>
			<th><i class="fa fa-info-circle"></i> Mã đơn hàng</th>
			<th><i class="fa fa-clock-o"></i> Thời gian</th>
			<th><i class="fa fa-user"></i> Người nhận</th>
			<th><i class="fa fa-dollar"></i> Tổng tiền</th>
			<th><i class="fa fa-star"></i> Tình trạng</th>
			<th><i class="fa fa-unlock"></i> Hành động</th>
		</tr>
		@foreach($hoadon as $item)
			<td>
				<p><?= $item->hd_maso ?></p>
				<h4><?= $item->cthd_maso?></h4>
				<a href="{{url('nguoiban/hoadon/'.$item->hd_maso)}}">Chi tiết</a>
			</td>
			<td><?= $item->hd_tgian ?></td>
			<td><?= $item->hd_nguoimua ?>
				<?= $item->hd_nguoinhan ?></br>
				<?= $item->hd_dchi ?></br>
				<?= $item->hd_sdt ?>
			</td>
			<td><p class="number"><?= $item->cthd_gia?></p></td>
			<td><p><?php
					echo ($item->cthd_tinhtrang == '2')?'ĐÃ HOÀN TẤT':'';
					echo ($item->cthd_tinhtrang == '1')?'ĐÃ XÁC NHẬN':'';
					echo ($item->cthd_tinhtrang == '0')?'ĐANG XỬ LÝ':'';
					echo ($item->cthd_tinhtrang == '-1')?'ĐÃ HỦY':'';
					?>
				</p>
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
					<button type="submit">HỦY</button>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				</form>
				<?php endif; ?>
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