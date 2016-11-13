@extends('layouts.app')
@section('content')
<div class="container">
<h2>Viewing <span class='muted'><?=$cthoadon->cthd_maso?></span></h2>
<br>	<p><strong>Cthd Soluong</strong>
	<?=$cthoadon->cthd_soluong?><p>
	<p><strong>Cthd Gia</strong>
	<?=$cthoadon->cthd_gia?><p>
	<p><strong>Cthd Tinhtrang</strong>
	<?=$cthoadon->cthd_tinhtrang?><p>
<p>
	<a href="{{url('cthoadon/edit/'.$cthoadon->cthd_maso)}}"> Edit</a> |
	<a href="{{url('cthoadon')}}">Back</a>
</p>
</div>
@endsection