@extends('layouts.app')
@section('content')
<div class="container">
<h2>Edit <span class='muted'>Thuonghieu</span></h2>
<hr>
@include('thuonghieu._form', ['thuonghieu' => $thuonghieu, 'action'=> 'update'])
<p>
	<a href="{{url('thuonghieu/show/'.$thuonghieu->th_maso)}}"> View</a> |
	<a href="{{url('thuonghieu')}}">Back</a>
</p>
</div>
@endsection