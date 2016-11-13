@extends('layouts.app')
@section('content')
<div class="container">
<h2>Viewing <span class='muted'><?=$quantri->qt_maso?></span></h2>
<br>	<p><strong>Qt Email</strong>
	<?=$quantri->qt_email?><p>
	<p><strong>Qt Matkhau</strong>
	<?=$quantri->qt_matkhau?><p>
<p>
	<a href="{{url('quantri/edit/'.$quantri->qt_maso)}}"> Edit</a> |
	<a href="{{url('quantri')}}">Back</a>
</p>
</div>
@endsection