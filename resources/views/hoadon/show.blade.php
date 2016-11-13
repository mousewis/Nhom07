@extends('layouts.app')
@section('content')
<div class="container">
<h2>Viewing <span class='muted'><?=$hoadon->hd_maso?></span></h2>
<br>	<p><strong>Hd Nguoimua</strong>
	<?=$hoadon->hd_nguoimua?><p>
	<p><strong>Hd Tinhtrang</strong>
	<?=$hoadon->hd_tinhtrang?><p>
	<p><strong>Hd Gia</strong>
	<?=$hoadon->hd_gia?><p>
	<p><strong>Hd Tgian</strong>
	<?=$hoadon->hd_tgian?><p>
	<p><strong>Hd Dchi</strong>
	<?=$hoadon->hd_dchi?><p>
<p>
	<a href="{{url('hoadon/edit/'.$hoadon->hd_maso)}}"> Edit</a> |
	<a href="{{url('hoadon')}}">Back</a>
</p>
</div>
@endsection