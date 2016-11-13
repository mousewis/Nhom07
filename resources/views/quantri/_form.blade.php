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
  $action = $action == 'update' ? $action.'/'.$quantri->qt_maso : $action; 
?>
<form action="<?= url('quantri/'.$action) ?>" method="POST" class="form-horizontal">
<?= $method ?>
	<fieldset>
    		<div class="form-group"><label class="control-label">Qt Email</label>
		<input type="text" name="qt_email" value ="<?= isset($quantri) ? $quantri->qt_email : ''?>" required ='required' class="col-md-4 form-control" placeholder="Qt Email"></div>
		<div class="form-group"><label class="control-label">Qt Matkhau</label>
		<input type="text" name="qt_matkhau" value ="<?= isset($quantri) ? $quantri->qt_matkhau : ''?>" required ='required' class="col-md-4 form-control" placeholder="Qt Matkhau"></div>

		<div class="form-group">
			<label class="control-label">&nbsp;</label>
			<input type="submit" value="Save" class="btn btn-primary">
		</div>
	</fieldset>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>