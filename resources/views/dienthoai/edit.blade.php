@extends('layouts.app')
@section('content')
<div class="container">
<h2>Edit <span class='muted'>Dienthoai</span></h2>
<hr>
@include('dienthoai._form', ['dienthoai' => $dienthoai, 'action'=> 'update'])
<p>
	<a href="{{url('dienthoai/show/'.$dienthoai->dt_maso)}}"> View</a> |
	<a href="{{url('dienthoai')}}">Back</a>
</p>
</div>
@endsection