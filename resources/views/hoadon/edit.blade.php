@extends('layouts.app')
@section('content')
<div class="container">
<h2>Edit <span class='muted'>Hoadon</span></h2>
<hr>
@include('hoadon._form', ['hoadon' => $hoadon, 'action'=> 'update'])
<p>
	<a href="{{url('hoadon/show/'.$hoadon->hd_maso)}}"> View</a> |
	<a href="{{url('hoadon')}}">Back</a>
</p>
</div>
@endsection