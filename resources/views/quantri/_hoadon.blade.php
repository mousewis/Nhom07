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
			<form action="{{url('quantri/hoadon')}}" method="get">
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

		<form name="timkiem" action="{{url('quantri/hoadon')}}" method="get">
			<tr>
				<td colspan="2">
					Từ:<input name="hd_tgian_tu" type="date" value="2010-01-01" required>
				</td>
				<td colspan="2">
					Đến:<input name="hd_tgian_den" type="date" value="2020-01-01" required>
				</td>
			</tr>
			<tr>
				<td>Người mua
					<select name="hd_nguoimua">
						<option value="">Tất cả</option>
						<?php if(isset($nguoidung)): ?>
						<?php foreach ($nguoidung as $item): ?>
						<?php if($item->nd_loai=='2'): ?>
						<option value="<?= $item->nd_maso?>">
							<?= $item->nd_hoten?>
						</option>
								<?php endif; ?>
						<?php endforeach; ?>
						<?php endif; ?>
					</select>
				</td>
				<td>Người bán
					<select name="hd_nguoiban">
						<option value="">Tất cả</option>
						<?php if(isset($nguoidung)): ?>
						<?php foreach ($nguoidung as $item): ?>
						<?php if($item->nd_loai=='1'): ?>
						<option value="<?= $item->nd_maso?>">
							<?= $item->nd_hoten?>
						</option>
						<?php endif; ?>
						<?php endforeach; ?>
						<?php endif; ?>
					</select>
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
			</tr>
		</form>

	</table>
	<table>
		<tr>
			<th><i class="fa fa-info-circle"></i> Mã đơn hàng</th>
			<th><i class="fa fa-clock-o"></i> Thời gian</th>
			<th><i class="fa fa-user"></i> Người mua</th>
			<th><i class="fa fa-user"></i> Người bán</th>
			<th><i class="fa fa-dollar"></i> Tổng tiền</th>
			<th><i class="fa fa-star"></i> Tình trạng</th>
		</tr>
		@foreach($hoadon as $item)
			<td>
				<p><?= $item->hd_maso ?></p>
				<h4><?= $item->cthd_maso?></h4>
				<a href="{{url('quantri/hoadon/'.$item->hd_maso)}}">Chi tiết</a>
			</td>
			<td><?= $item->hd_tgian ?></td>
			<td><?= $item->hd_nguoimua ?>
				<?= $item->hd_nguoinhan ?></br>
				<?= $item->hd_dchi ?></br>
				<?= $item->hd_sdt ?>
			</td>
			<td><?= $item->hdn_nguoidung ?></td>
			<td><p class="number"><?= $item->cthd_gia?></p></td>
			<td><p><?php
					echo ($item->cthd_tinhtrang == '2')?'ĐÃ HOÀN TẤT':'';
					echo ($item->cthd_tinhtrang == '1')?'ĐÃ XÁC NHẬN':'';
					echo ($item->cthd_tinhtrang == '0')?'ĐANG XỬ LÝ':'';
					echo ($item->cthd_tinhtrang == '-1')?'ĐÃ HỦY':'';
					?>
				</p>
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