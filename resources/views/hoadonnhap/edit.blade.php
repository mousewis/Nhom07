@extends('layouts.app')
@section('content')
<div class="container">
<h2>Edit <span class='muted'>Hoadonnhap</span></h2>
<hr>
@include('hoadonnhap._form', ['hoadonnhap' => $hoadonnhap, 'action'=> 'update'])
<p>
	<a href="{{url('hoadonnhap/show/'.$hoadonnhap->hdn_maso)}}"> View</a> |
	<a href="{{url('hoadonnhap')}}">Back</a>
</p>
</div>
@endsection