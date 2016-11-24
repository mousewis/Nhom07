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
@if (session('error-message'))
	<div class="alert alert-danger">
		{{ session('error-message') }}
	</div>
@endif
<?php if (isset($nd_maso)):?>
	<form action="<?= url('nguoidung/_kichhoat') ?>" method="POST" class="form-horizontal">
	<fieldset>
		<div class="form-group"><label class="control-label">Vui lòng nhập mã kích hoạt được gửi đến email của bạn:</label>
			<input type="hidden" name="nd_maso" value="<?= $nd_maso?>">
			<input type="text" name="nd_kichhoat" required ='required' class="col-md-4 form-control" placeholder="Mã kích hoạt"></div>
    	<div class="form-group"><!--<label class="control-label">&nbsp;</label>-->
			<button type="submit" class="btn btn-default col-sm-offset-5">Kích hoạt</button>
		</div>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</fieldset>
</form>
<?php else: ?>
	<a href="{{url('/')}}">Click vào đây để trở lại trang chủ</a>
<?php endif;  ?>
