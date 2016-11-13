@extends('layouts.app')
@section('content')
<div class="container">
<h2>Viewing <span class='muted'><?=$dienthoai->dt_maso?></span></h2>
<br>	<p><strong>Dt Ten</strong>
	<?=$dienthoai->dt_ten?><p>
	<p><strong>Dt Hdn</strong>
	<?=$dienthoai->dt_hdn?><p>
	<p><strong>Dt Sluong</strong>
	<?=$dienthoai->dt_sluong?><p>
	<p><strong>Dt Thuonghieu</strong>
	<?=$dienthoai->dt_thuonghieu?><p>
	<p><strong>Dt Gia</strong>
	<?=$dienthoai->dt_gia?><p>
	<p><strong>Dt Hinh</strong>
	<?=$dienthoai->dt_hinh?><p>
	<p><strong>Dt Loai</strong>
	<?=$dienthoai->dt_loai?><p>
	<p><strong>Dt Kco</strong>
	<?=$dienthoai->dt_kco?><p>
	<p><strong>Dt Pgiai</strong>
	<?=$dienthoai->dt_pgiai?><p>
	<p><strong>Dt Pin</strong>
	<?=$dienthoai->dt_pin?><p>
	<p><strong>Dt Hdh</strong>
	<?=$dienthoai->dt_hdh?><p>
	<p><strong>Dt Ram</strong>
	<?=$dienthoai->dt_ram?><p>
	<p><strong>Dt Bnho</strong>
	<?=$dienthoai->dt_bnho?><p>
	<p><strong>Dt Cam</strong>
	<?=$dienthoai->dt_cam?><p>
<p>
	<a href="{{url('dienthoai/edit/'.$dienthoai->dt_maso)}}"> Edit</a> |
	<a href="{{url('dienthoai')}}">Back</a>
</p>
</div>
@endsection