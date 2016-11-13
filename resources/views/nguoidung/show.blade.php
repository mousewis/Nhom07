@extends('layouts.app')
@section('content')
<div class="container">
<h2>Viewing <span class='muted'><?=$nguoidung->nd_maso?></span></h2>
<br>	<p><strong>Nd Email</strong>
	<?=$nguoidung->nd_email?><p>
	<p><strong>Nd Matkhau</strong>
	<?=$nguoidung->nd_matkhau?><p>
	<p><strong>Nd Hoten</strong>
	<?=$nguoidung->nd_hoten?><p>
	<p><strong>Nd Sdt</strong>
	<?=$nguoidung->nd_sdt?><p>
	<p><strong>Nd Dchi</strong>
	<?=$nguoidung->nd_dchi?><p>
	<p><strong>Nd Loai</strong>
	<?=$nguoidung->nd_loai?><p>
	<p><strong>Nd Taikhoan</strong>
	<?=$nguoidung->nd_taikhoan?><p>
	<p><strong>Nd Tinhtrang</strong>
	<?=$nguoidung->nd_tinhtrang?><p>
	<p><strong>Nd Danhgia</strong>
	<?=$nguoidung->nd_danhgia?><p>
	<p><strong>Nd Kichhoat</strong>
	<?=$nguoidung->nd_kichhoat?><p>
<p>
	<a href="{{url('nguoidung/edit/'.$nguoidung->nd_maso)}}"> Edit</a> |
	<a href="{{url('nguoidung')}}">Back</a>
</p>
</div>
@endsection