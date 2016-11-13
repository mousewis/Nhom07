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
  $action = $action == 'update' ? $action.'/'.$dienthoai->dt_maso : $action; 
?>
<form action="<?= url('dienthoai/'.$action) ?>" method="POST" class="form-horizontal">
<?= $method ?>
	<fieldset>
    		<div class="form-group"><label class="control-label">Dt Ten</label>
		<input type="text" name="dt_ten" value ="<?= isset($dienthoai) ? $dienthoai->dt_ten : ''?>" required ='required' class="col-md-4 form-control" placeholder="Dt Ten"></div>
		<div class="form-group"><label class="control-label">Dt Hdn</label>
		<input type="text" name="dt_hdn" value ="<?= isset($dienthoai) ? $dienthoai->dt_hdn : ''?>" required ='required' class="col-md-4 form-control" placeholder="Dt Hdn"></div>
		<div class="form-group"><label class="control-label">Dt Sluong</label>
		<input type="number" name="dt_sluong" value ="<?= isset($dienthoai) ? $dienthoai->dt_sluong : ''?>" required ='required' class="col-md-4 form-control" placeholder="Dt Sluong"></div>
		<div class="form-group"><label class="control-label">Dt Thuonghieu</label>
		<input type="text" name="dt_thuonghieu" value ="<?= isset($dienthoai) ? $dienthoai->dt_thuonghieu : ''?>" required ='required' class="col-md-4 form-control" placeholder="Dt Thuonghieu"></div>
		<div class="form-group"><label class="control-label">Dt Gia</label>
		<input type="number" name="dt_gia" value ="<?= isset($dienthoai) ? $dienthoai->dt_gia : ''?>" required ='required' class="col-md-4 form-control" placeholder="Dt Gia"></div>
		<div class="form-group"><label class="control-label">Dt Hinh</label>
		<input type="text" name="dt_hinh" value ="<?= isset($dienthoai) ? $dienthoai->dt_hinh : ''?>" required ='required' class="col-md-4 form-control" placeholder="Dt Hinh"></div>
		<div class="form-group"><label class="control-label">Dt Loai</label>
		<input type="text" name="dt_loai" value ="<?= isset($dienthoai) ? $dienthoai->dt_loai : ''?>" required ='required' class="col-md-4 form-control" placeholder="Dt Loai"></div>
		<div class="form-group"><label class="control-label">Dt Kco</label>
		<input type="text" name="dt_kco" value ="<?= isset($dienthoai) ? $dienthoai->dt_kco : ''?>" required ='required' class="col-md-4 form-control" placeholder="Dt Kco"></div>
		<div class="form-group"><label class="control-label">Dt Pgiai</label>
		<input type="text" name="dt_pgiai" value ="<?= isset($dienthoai) ? $dienthoai->dt_pgiai : ''?>" required ='required' class="col-md-4 form-control" placeholder="Dt Pgiai"></div>
		<div class="form-group"><label class="control-label">Dt Pin</label>
		<input type="text" name="dt_pin" value ="<?= isset($dienthoai) ? $dienthoai->dt_pin : ''?>" required ='required' class="col-md-4 form-control" placeholder="Dt Pin"></div>
		<div class="form-group"><label class="control-label">Dt Hdh</label>
		<input type="text" name="dt_hdh" value ="<?= isset($dienthoai) ? $dienthoai->dt_hdh : ''?>" required ='required' class="col-md-4 form-control" placeholder="Dt Hdh"></div>
		<div class="form-group"><label class="control-label">Dt Ram</label>
		<input type="text" name="dt_ram" value ="<?= isset($dienthoai) ? $dienthoai->dt_ram : ''?>" required ='required' class="col-md-4 form-control" placeholder="Dt Ram"></div>
		<div class="form-group"><label class="control-label">Dt Bnho</label>
		<input type="text" name="dt_bnho" value ="<?= isset($dienthoai) ? $dienthoai->dt_bnho : ''?>" required ='required' class="col-md-4 form-control" placeholder="Dt Bnho"></div>
		<div class="form-group"><label class="control-label">Dt Cam</label>
		<input type="text" name="dt_cam" value ="<?= isset($dienthoai) ? $dienthoai->dt_cam : ''?>" required ='required' class="col-md-4 form-control" placeholder="Dt Cam"></div>

		<div class="form-group">
			<label class="control-label">&nbsp;</label>
			<input type="submit" value="Save" class="btn btn-primary">
		</div>
	</fieldset>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>