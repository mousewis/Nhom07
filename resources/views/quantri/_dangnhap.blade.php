@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('message'))
	<div class="alert alert-danger">
		{{ session('message') }}
	</div>
@endif
<form action="<?= url('quantri/_dangnhap') ?>" method="POST" class="form-horizontal">
	<fieldset>
		<div class="form-group"><!--<label class="control-label">Tên người dùng:</label>-->
		<input type="text" name="qt_maso" required ='required' class="col-md-4 form-control" placeholder="Tên đăng nhập"></div>
    	<div class="form-group"><!--<label class="control-label">Mật khẩu:</label>-->
		<input type="password" name="qt_matkhau" required ='required' class="col-md-4 form-control" placeholder="Mật khẩu"></div>
		<div class="form-group"><!--<label class="control-label">&nbsp;</label>-->
			<button type="submit" class="btn btn-default col-sm-offset-5">Đăng nhập</button>
		</div>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</fieldset>

</form>