@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<?php
  $method = $action == 'update' ? '<input type="hidden" name="_method" value="PUT">' : '';
  $action = $action == 'update' ? $action.'/'.$nguoidung->nd_maso : $action; 
?>
<form action="<?= url('nguoidung/'.$action) ?>" method="POST" class="form-horizontal">
<?= $method ?>
	<fieldset>
    		<div class="form-group"><label class="control-label">Nd Email</label>
		<input type="text" name="nd_email" value ="<?= isset($nguoidung) ? $nguoidung->nd_email : ''?>" required ='required' class="col-md-4 form-control" placeholder="Nd Email"></div>
		<div class="form-group"><label class="control-label">Nd Matkhau</label>
		<input type="text" name="nd_matkhau" value ="<?= isset($nguoidung) ? $nguoidung->nd_matkhau : ''?>" required ='required' class="col-md-4 form-control" placeholder="Nd Matkhau"></div>
		<div class="form-group"><label class="control-label">Nd Hoten</label>
		<input type="text" name="nd_hoten" value ="<?= isset($nguoidung) ? $nguoidung->nd_hoten : ''?>" required ='required' class="col-md-4 form-control" placeholder="Nd Hoten"></div>
		<div class="form-group"><label class="control-label">Nd Sdt</label>
		<input type="text" name="nd_sdt" value ="<?= isset($nguoidung) ? $nguoidung->nd_sdt : ''?>" required ='required' class="col-md-4 form-control" placeholder="Nd Sdt"></div>
		<div class="form-group"><label class="control-label">Nd Dchi</label>
		<input type="text" name="nd_dchi" value ="<?= isset($nguoidung) ? $nguoidung->nd_dchi : ''?>" required ='required' class="col-md-4 form-control" placeholder="Nd Dchi"></div>
		<div class="form-group"><label class="control-label">Nd Loai</label>
		<input type="number" name="nd_loai" value ="<?= isset($nguoidung) ? $nguoidung->nd_loai : ''?>" required ='required' class="col-md-4 form-control" placeholder="Nd Loai"></div>
		<div class="form-group"><label class="control-label">Nd Taikhoan</label>
		<input type="number" name="nd_taikhoan" value ="<?= isset($nguoidung) ? $nguoidung->nd_taikhoan : ''?>" required ='required' class="col-md-4 form-control" placeholder="Nd Taikhoan"></div>
		<div class="form-group"><label class="control-label">Nd Tinhtrang</label>
		<input type="number" name="nd_tinhtrang" value ="<?= isset($nguoidung) ? $nguoidung->nd_tinhtrang : ''?>" required ='required' class="col-md-4 form-control" placeholder="Nd Tinhtrang"></div>
		<div class="form-group"><label class="control-label">Nd Danhgia</label>
		<input type="number" name="nd_danhgia" value ="<?= isset($nguoidung) ? $nguoidung->nd_danhgia : ''?>" required ='required' class="col-md-4 form-control" placeholder="Nd Danhgia"></div>
		<div class="form-group"><label class="control-label">Nd Kichhoat</label>
		<input type="text" name="nd_kichhoat" value ="<?= isset($nguoidung) ? $nguoidung->nd_kichhoat : ''?>" required ='required' class="col-md-4 form-control" placeholder="Nd Kichhoat"></div>

		<div class="form-group">
			<label class="control-label">&nbsp;</label>
			<input type="submit" value="Save" class="btn btn-primary">
		</div>
	</fieldset>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>