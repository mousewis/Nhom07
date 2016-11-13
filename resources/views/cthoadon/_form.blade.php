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
  $action = $action == 'update' ? $action.'/'.$cthoadon->cthd_maso : $action; 
?>
<form action="<?= url('cthoadon/'.$action) ?>" method="POST" class="form-horizontal">
<?= $method ?>
	<fieldset>
    		<div class="form-group"><label class="control-label">Cthd Soluong</label>
		<input type="number" name="cthd_soluong" value ="<?= isset($cthoadon) ? $cthoadon->cthd_soluong : ''?>" required ='required' class="col-md-4 form-control" placeholder="Cthd Soluong"></div>
		<div class="form-group"><label class="control-label">Cthd Gia</label>
		<input type="number" name="cthd_gia" value ="<?= isset($cthoadon) ? $cthoadon->cthd_gia : ''?>" required ='required' class="col-md-4 form-control" placeholder="Cthd Gia"></div>
		<div class="form-group"><label class="control-label">Cthd Tinhtrang</label>
		<input type="number" name="cthd_tinhtrang" value ="<?= isset($cthoadon) ? $cthoadon->cthd_tinhtrang : ''?>" required ='required' class="col-md-4 form-control" placeholder="Cthd Tinhtrang"></div>

		<div class="form-group">
			<label class="control-label">&nbsp;</label>
			<input type="submit" value="Save" class="btn btn-primary">
		</div>
	</fieldset>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>