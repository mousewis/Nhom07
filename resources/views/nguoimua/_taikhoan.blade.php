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
			<th><i class="fa fa-user"></i> Tên người bán:</th>
			<td colspan="3"><?= $nguoimua->nd_maso ?></td>
		</tr>
		<tr>
			<th><i class="fa fa-inbox"></i> Email</th>
			<td colspan="3"><?= $nguoimua->nd_email?></td>
		</tr>
	</table>
	<form action="<?= url('nguoidung/capnhat') ?>" method="POST" class="form-horizontal">
		<fieldset>
			<table>
				<tr>
					<th><i class="fa fa-lock"></i> Mật khẩu</th>
					<td>
						<input type="password" name="nd_matkhau" required='required' class="col-md-4 form-control"
							   placeholder="Mật khẩu" value="<?=$nguoimua->nd_matkhau ?>">
					</td>
				</tr>
				<tr>
					<th><i class="fa fa-info"></i> Họ tên</th>
					<td>
						<input type="text" name="nd_hoten" required='required' class="col-md-4 form-control"
							   placeholder="Họ tên" value="<?= $nguoimua->nd_hoten?>">
					</td>
				</tr>
				<tr>
					<th><i class="fa fa-phone"></i> Số điện thoại</th>
					<td>
						<input type="text" name="nd_sdt" required='required' class="col-md-4 form-control"
							   placeholder="Số điện thoại" value="<?= $nguoimua->nd_sdt?>">
					</td>
				</tr>
				<tr>
					<th><i class="fa fa-home"></i> Địa chỉ</th>
					<td>
						<input type="text" name="nd_dchi" required='required' class="col-md-4 form-control"
							   placeholder="Địa chỉ" value="<?= $nguoimmua->nd_dchi?>">
					</td>
				</tr>
			</table>
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<button type="submit" class="btn btn-default col-sm-offset-5">Lưu</button>
			</div>
		</fieldset>
	</form>
@endif