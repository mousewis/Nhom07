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
  $action = $action == 'update' ? $action.'/'.$hoadontk->hdtk_maso : $action; 
?>
<form action="<?= url('hoadontk/'.$action) ?>" method="POST" class="form-horizontal">
<?= $method ?>
	<fieldset>
    		<div class="form-group"><label class="control-label">Hdtk Nguoidung</label>
		<input type="text" name="hdtk_nguoidung" value ="<?= isset($hoadontk) ? $hoadontk->hdtk_nguoidung : ''?>" required ='required' class="col-md-4 form-control" placeholder="Hdtk Nguoidung"></div>
		<div class="form-group"><label class="control-label">Hdtk Tgian</label>
		<input type="datetime" name="hdtk_tgian" value ="<?= isset($hoadontk) ? $hoadontk->hdtk_tgian : ''?>" required ='required' class="col-md-4 form-control" placeholder="Hdtk Tgian"></div>
		<div class="form-group"><label class="control-label">Hdtk Gia</label>
		<input type="number" name="hdtk_gia" value ="<?= isset($hoadontk) ? $hoadontk->hdtk_gia : ''?>" required ='required' class="col-md-4 form-control" placeholder="Hdtk Gia"></div>

		<div class="form-group">
			<label class="control-label">&nbsp;</label>
			<input type="submit" value="Save" class="btn btn-primary">
		</div>
	</fieldset>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>