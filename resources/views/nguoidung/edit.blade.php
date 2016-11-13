@extends('layouts.app')
@section('content')
<div class="container">
<h2>Edit <span class='muted'>Nguoidung</span></h2>
<hr>
@include('nguoidung._form', ['nguoidung' => $nguoidung, 'action'=> 'update'])
<p>
	<a href="{{url('nguoidung/show/'.$nguoidung->nd_maso)}}"> View</a> |
	<a href="{{url('nguoidung')}}">Back</a>
</p>
</div>
@endsection