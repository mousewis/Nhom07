@if (count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
@if (isset($nguoimua))
	<table>
		<tr>
			<form action="{{url('quantri/nguoimua')}}" method="get">
				<td>Sắp xếp theo:</td>
				<td>
					<select name="col">
						<option value="nd_maso">Tên tài khoản</option>
						<option value="nd_tinhtrang">Tình trạng</option>
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
			<th><i class="fa fa-info-circle"></i> Mã số</th>
			<th><i class="fa fa-info-circle"></i> Họ tên</th>
			<th><i class="fa fa-home"></i>Thông tin liên lạc</th>
			<th><i class="fa fa-lock"></i> Tình trạng</th>
		</tr>
		@foreach($nguoimua as $item)
			<td>
				<a href="{{url('quantri/nguoidung/'.$item->nd_maso)}}"><?= $item->nd_maso ?></a>
			</td>
			<td>
				<?= $item->nd_hoten ?>
			</td>
			<td>
				<table>
					<tr>
						<td>Email</td>
						<td><?= $item->nd_email ?></td>
					</tr>
					<tr>
						<td>Số điện thoại</td>
						<td><?= $item->nd_sdt ?></td>
					</tr>
					<tr>
						<td>Địa chỉ</td>
						<td><?= $item->nd_dchi ?></td>
					</tr>
				</table>
			</td>
			<td>
				<?php
				switch ($item->nd_tinhtrang)
				{
					case '0': echo 'Chưa kích hoạt';
						break;
					case '1': echo 'Đã kích hoạt';
						break;
					case '-1': echo 'Tài khoản bị khóa';
						break;
				}
				?>
			</td>
			</tr>
		@endforeach
		<tr>
			<td colspan="6">
				<div class="col-sm-12 text-center">
					<ul class="pagination">
						{!! $nguoimua->appends(Request::input())->links() !!}
					</ul>
				</div>
			</td>
		</tr>
	</table>

@endif