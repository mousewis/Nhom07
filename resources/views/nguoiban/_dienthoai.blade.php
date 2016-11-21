@if (count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@if (session('error-message'))
		<div class="alert alert-danger">
			{{ session('error-message') }}
		</div>
	@endif
@endif
<form action="<?= url('nguoiban/dienthoai/luu')?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
	<div class="col-sm-3">
		<div class="product-image-wrapper">
			<div class="productinfo text-center">
				<img id="dt_hinh_preview" src="{{asset('images/product-details/blank.jpg')}}">
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<fieldset>
			<div class="form-group"><label class="control-label">Hình ảnh</label>
				<input type="file" name="dt_hinh" required ='required' class="col-md-4 form-control" accept="image/*"></div>
			<div class="form-group">
				<input type="text" name="dt_ten" value ="<?= isset($dienthoai) ? $dienthoai->dt_ten : ''?>" required ='required' class="col-md-4 form-control" placeholder="Tên điện thoại"></div>
			<div class="form-group">
				<input type="number" name="dt_sluong" value ="<?= isset($dienthoai) ? $dienthoai->dt_sluong : ''?>" required ='required' min="1" class="col-md-4 form-control" placeholder="Số lượng"></div>
			<div class="form-group">
				<select name="dt_thuonghieu" required>
					<option value="">Chọn thương hiệu</option>
					<?php if (isset($thuonghieu)):?>
						<?php foreach ($thuonghieu as $item):?>
					<option value="<?= $item->th_maso?>"><?= $item->th_ten ?></option>
				<?php endforeach; ?>
					<?php endif; ?>
				</select>
				</div>
			<div class="form-group">
				<input type="number" name="dt_gia" value ="<?= isset($dienthoai) ? $dienthoai->dt_gia : ''?>" required ='required' min="0" class="col-md-4 form-control" placeholder="Giá *"></div>
			<div class="form-group">
				<input type="text" name="dt_loai" value ="<?= isset($dienthoai) ? $dienthoai->dt_loai : ''?>" required ='required' class="col-md-4 form-control" placeholder="Loại *"></div>
			<div class="form-group">
				<input type="text" name="dt_kco" value ="<?= isset($dienthoai) ? $dienthoai->dt_kco : ''?>" required ='required' class="col-md-4 form-control" placeholder="Kích cỡ *"></div>
			<div class="form-group">
				<input type="text" name="dt_pgiai" value ="<?= isset($dienthoai) ? $dienthoai->dt_pgiai : ''?>" required ='required' class="col-md-4 form-control" placeholder="Độ phân giải *"></div>
			<div class="form-group">
				<input type="text" name="dt_pin" value ="<?= isset($dienthoai) ? $dienthoai->dt_pin : ''?>" required ='required' class="col-md-4 form-control" placeholder="Dung lượng pin *"></div>
			<div class="form-group">
				<input type="text" name="dt_hdh" value ="<?= isset($dienthoai) ? $dienthoai->dt_hdh : ''?>" required ='required' class="col-md-4 form-control" placeholder="Hệ điều hành *"></div>
			<div class="form-group">
				<input type="text" name="dt_ram" value ="<?= isset($dienthoai) ? $dienthoai->dt_ram : ''?>" required ='required' class="col-md-4 form-control" placeholder="Dung lượng ram *"></div>
			<div class="form-group">
				<input type="text" name="dt_bnho" value ="<?= isset($dienthoai) ? $dienthoai->dt_bnho : ''?>" required ='required' class="col-md-4 form-control" placeholder="Dung lượng bộ nhớ trong *"></div>
			<div class="form-group">
				<input type="text" name="dt_cam" value ="<?= isset($dienthoai) ? $dienthoai->dt_cam : ''?>" required ='required' class="col-md-4 form-control" placeholder="Camera *"></div>
			<div class="form-group">
				<label class="control-label">&nbsp;</label>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="submit" value="Đăng tin" class="btn btn-primary">
			</div>
		</fieldset>
	</div>
</form>
