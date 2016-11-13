@extends('layouts.app')
@section('content')
<div class="container">
<h2>Edit <span class='muted'>Danhgia</span></h2>
<hr>
@include('danhgia._form', ['danhgia' => $danhgia, 'action'=> 'update'])
<p>
	<a href="{{url('danhgia/show/'.$danhgia->dg_maso)}}"> View</a> |
	<a href="{{url('danhgia')}}">Back</a>
</p>
</div>
@endsection