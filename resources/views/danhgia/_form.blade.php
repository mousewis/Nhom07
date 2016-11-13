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
  $action = $action == 'update' ? $action.'/'.$danhgia->dg_maso : $action; 
?>
<form action="<?= url('danhgia/'.$action) ?>" method="POST" class="form-horizontal">
<?= $method ?>
	<fieldset>
    		<div class="form-group"><label class="control-label">Dg Nguoimua</label>
		<input type="text" name="dg_nguoimua" value ="<?= isset($danhgia) ? $danhgia->dg_nguoimua : ''?>" required ='required' class="col-md-4 form-control" placeholder="Dg Nguoimua"></div>
		<div class="form-group"><label class="control-label">Dg Nguoiban</label>
		<input type="text" name="dg_nguoiban" value ="<?= isset($danhgia) ? $danhgia->dg_nguoiban : ''?>" required ='required' class="col-md-4 form-control" placeholder="Dg Nguoiban"></div>
		<div class="form-group"><label class="control-label">Dg Diem</label>
		<input type="number" name="dg_diem" value ="<?= isset($danhgia) ? $danhgia->dg_diem : ''?>" required ='required' class="col-md-4 form-control" placeholder="Dg Diem"></div>

		<div class="form-group">
			<label class="control-label">&nbsp;</label>
			<input type="submit" value="Save" class="btn btn-primary">
		</div>
	</fieldset>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>