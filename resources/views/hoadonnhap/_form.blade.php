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
  $action = $action == 'update' ? $action.'/'.$hoadonnhap->hdn_maso : $action; 
?>
<form action="<?= url('hoadonnhap/'.$action) ?>" method="POST" class="form-horizontal">
<?= $method ?>
	<fieldset>
    		<div class="form-group"><label class="control-label">Hdn Nguoidung</label>
		<input type="text" name="hdn_nguoidung" value ="<?= isset($hoadonnhap) ? $hoadonnhap->hdn_nguoidung : ''?>" required ='required' class="col-md-4 form-control" placeholder="Hdn Nguoidung"></div>
		<div class="form-group"><label class="control-label">Hdn Tgian</label>
		<input type="datetime" name="hdn_tgian" value ="<?= isset($hoadonnhap) ? $hoadonnhap->hdn_tgian : ''?>" required ='required' class="col-md-4 form-control" placeholder="Hdn Tgian"></div>
		<div class="form-group"><label class="control-label">Hdn Gia</label>
		<input type="number" name="hdn_gia" value ="<?= isset($hoadonnhap) ? $hoadonnhap->hdn_gia : ''?>" required ='required' class="col-md-4 form-control" placeholder="Hdn Gia"></div>

		<div class="form-group">
			<label class="control-label">&nbsp;</label>
			<input type="submit" value="Save" class="btn btn-primary">
		</div>
	</fieldset>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>