@extends('layouts.app')
@section('content')
<div class="container">
<h2>Viewing <span class='muted'><?=$danhgia->dg_maso?></span></h2>
<br>	<p><strong>Dg Nguoimua</strong>
	<?=$danhgia->dg_nguoimua?><p>
	<p><strong>Dg Nguoiban</strong>
	<?=$danhgia->dg_nguoiban?><p>
	<p><strong>Dg Diem</strong>
	<?=$danhgia->dg_diem?><p>
<p>
	<a href="{{url('danhgia/edit/'.$danhgia->dg_maso)}}"> Edit</a> |
	<a href="{{url('danhgia')}}">Back</a>
</p>
</div>
@endsection