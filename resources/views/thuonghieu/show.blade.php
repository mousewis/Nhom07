@extends('layouts.app')
@section('content')
<div class="container">
<h2>Viewing <span class='muted'><?=$thuonghieu->th_maso?></span></h2>
<br>	<p><strong>Th Ten</strong>
	<?=$thuonghieu->th_ten?><p>
<p>
	<a href="{{url('thuonghieu/edit/'.$thuonghieu->th_maso)}}"> Edit</a> |
	<a href="{{url('thuonghieu')}}">Back</a>
</p>
</div>
@endsection