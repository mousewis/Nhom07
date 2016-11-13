@extends('layouts.app')
@section('content')
<div class="container">
<h2>Viewing <span class='muted'><?=$hoadonnhap->hdn_maso?></span></h2>
<br>	<p><strong>Hdn Nguoidung</strong>
	<?=$hoadonnhap->hdn_nguoidung?><p>
	<p><strong>Hdn Tgian</strong>
	<?=$hoadonnhap->hdn_tgian?><p>
	<p><strong>Hdn Gia</strong>
	<?=$hoadonnhap->hdn_gia?><p>
<p>
	<a href="{{url('hoadonnhap/edit/'.$hoadonnhap->hdn_maso)}}"> Edit</a> |
	<a href="{{url('hoadonnhap')}}">Back</a>
</p>
</div>
@endsection