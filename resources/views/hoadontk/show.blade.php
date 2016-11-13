@extends('layouts.app')
@section('content')
<div class="container">
<h2>Viewing <span class='muted'><?=$hoadontk->hdtk_maso?></span></h2>
<br>	<p><strong>Hdtk Nguoidung</strong>
	<?=$hoadontk->hdtk_nguoidung?><p>
	<p><strong>Hdtk Tgian</strong>
	<?=$hoadontk->hdtk_tgian?><p>
	<p><strong>Hdtk Gia</strong>
	<?=$hoadontk->hdtk_gia?><p>
<p>
	<a href="{{url('hoadontk/edit/'.$hoadontk->hdtk_maso)}}"> Edit</a> |
	<a href="{{url('hoadontk')}}">Back</a>
</p>
</div>
@endsection