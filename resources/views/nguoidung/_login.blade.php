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
	if (session('login_message')):
?>
<div class="alert alert-danger">
	<ul>
		<?= session('login_message') ?>
	</ul>
</div>
<?php endif; ?>
<form action="<?= url('nguoidung/checklogin') ?>" method="POST" class="form-horizontal">
	<fieldset>
		<div class="form-group"><!--<label class="control-label">Tên người dùng:</label>-->
		<input type="text" name="nd_maso" required ='required' class="col-md-4 form-control" placeholder="Tên người dùng"></div>
    	<div class="form-group"><!--<label class="control-label">Mật khẩu:</label>-->
		<input type="password" name="nd_matkhau" required ='required' class="col-md-4 form-control" placeholder="Mật khẩu"></div>
		<div class="form-group"><!--<label class="control-label">&nbsp;</label>-->
			<button type="submit" class="btn btn-default col-sm-offset-5">Lưu</button>
		</div>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</fieldset>

</form>