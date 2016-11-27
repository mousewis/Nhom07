@if (count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
@if (isset($nguoidung))
	<table>
		<tr>
			<th><i class="fa fa-user"></i> Tên đăng nhập:</th>
			<td colspan="3"><?= $nguoidung->nd_maso ?></td>
		</tr>
		<tr>
			<th><i class="fa fa-user"></i> Tên người dùng:</th>
			<td colspan="3"><?= $nguoidung->nd_hoten ?></td>
		</tr>
		<tr>
			<th><i class="fa fa-user"></i> Loại tài khoản:</th>
			<td colspan="3">
				<?php switch($nguoidung->nd_loai)
				{
					case '1': echo 'NGƯỜI BÁN';
						break;
					case '2': echo 'NGƯỜI MUA';
						break;
				}
				?></td>

		</tr>
		<tr>
			<th><i class="fa fa-info-circle"></i> Tình trạng</th>
			<td colspan="3">
				<?php switch($nguoidung->nd_tinhtrang)
				{
					case '-1': echo 'ĐÃ KHÓA';
						break;
					case '0': echo 'CHƯA KÍCH HOẠT';
						break;
					case '1': echo 'ĐÃ KÍCH HOẠT';
						break;
				}
				?>
			</td>

		</tr>
		<tr>
			<th><i class="fa fa-inbox"></i> Email</th>
			<td colspan="3"><?= $nguoidung->nd_email?></td>
		</tr>
		<tr>
			<th><i class="fa fa-mobile-phone"></i> Số điện thoại</th>
			<td colspan="3"><?= $nguoidung->nd_sdt?></td>
		</tr>
		<tr>
			<th><i class="fa fa-home"></i> Địa chỉ</th>
			<td colspan="3"><?= $nguoidung->nd_dchi?></td>
		</tr>
		<?php if ($nguoidung->nd_loai == 1): ?>
		<tr>
			<th><i class="fa fa-dollar"></i> Tài khoản</th>
			<td colspan="3"><p class="number"><?= $nguoidung->nd_taikhoan?></p></td>
		</tr>
		<tr>
			<th><i class="fa fa-cloud"></i> Đánh giá</th>
			<td colspan="3"><?= $nguoidung->nd_danhgia?>/5
				(<?= $nguoidung->nd_luotdanhgia?> lượt)</td>
		</tr>
		<?php endif; ?>
		</table>
@endif