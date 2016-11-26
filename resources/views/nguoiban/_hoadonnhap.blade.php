@if (count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
@if (isset($hoadonnhap))
	<table>
		<tr>
			<form action="{{url('nguoiban/hoadonnhap')}}" method="get">
		<td>Sắp xếp theo:</td>
			<td>
				<select name="col">
					<option value="hdn_tgian">Thời gian</option>
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
			<th><i class="fa fa-clock-o"></i> Thời gian</th>
			<th><i class="fa fa-user"></i> Sản phẩm</th>
			<th><i class="fa fa-dollar"></i> Giá trị</th>
		</tr>
		@foreach($hoadonnhap as $item)
			<td>
				<p><?= $item->hdn_maso ?></p>
			</td>
			<td>
				<?= $item->hdn_tgian ?>
			</td>
			<td>
				<?= $item->dt_ten ?>
				<?= $item->dt_maso ?></br>
			</td>
			<td>
				<p class="number"><?= $item->hdn_gia?></p>
			</td>
			</tr>
		@endforeach
		<tr>
			<td colspan="6">
				<div class="col-sm-12 text-center">
					<ul class="pagination">
						{!! $hoadonnhap->appends(Request::input())->links() !!}
					</ul>
				</div>
			</td>
		</tr>
	</table>

@endif