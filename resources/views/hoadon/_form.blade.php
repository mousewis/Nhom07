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
  $action = $action == 'update' ? $action.'/'.$hoadon->hd_maso : $action; 
?>
<form action="<?= url('hoadon/'.$action) ?>" method="POST" class="form-horizontal">
<?= $method ?>
	<fieldset>
    		<div class="form-group"><label class="control-label">Hd Nguoimua</label>
		<input type="text" name="hd_nguoimua" value ="<?= isset($hoadon) ? $hoadon->hd_nguoimua : ''?>" required ='required' class="col-md-4 form-control" placeholder="Hd Nguoimua"></div>
		<div class="form-group"><label class="control-label">Hd Tinhtrang</label>
		<input type="number" name="hd_tinhtrang" value ="<?= isset($hoadon) ? $hoadon->hd_tinhtrang : ''?>" required ='required' class="col-md-4 form-control" placeholder="Hd Tinhtrang"></div>
		<div class="form-group"><label class="control-label">Hd Gia</label>
		<input type="number" name="hd_gia" value ="<?= isset($hoadon) ? $hoadon->hd_gia : ''?>" required ='required' class="col-md-4 form-control" placeholder="Hd Gia"></div>
		<div class="form-group"><label class="control-label">Hd Tgian</label>
		<input type="datetime" name="hd_tgian" value ="<?= isset($hoadon) ? $hoadon->hd_tgian : ''?>" required ='required' class="col-md-4 form-control" placeholder="Hd Tgian"></div>
		<div class="form-group"><label class="control-label">Hd Dchi</label>
		<input type="text" name="hd_dchi" value ="<?= isset($hoadon) ? $hoadon->hd_dchi : ''?>" required ='required' class="col-md-4 form-control" placeholder="Hd Dchi"></div>

		<div class="form-group">
			<label class="control-label">&nbsp;</label>
			<input type="submit" value="Save" class="btn btn-primary">
		</div>
	</fieldset>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>