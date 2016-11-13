@extends('layouts.app')
@section('content')
<div class="container">
<h2>Edit <span class='muted'>Cthoadon</span></h2>
<hr>
@include('cthoadon._form', ['cthoadon' => $cthoadon, 'action'=> 'update'])
<p>
	<a href="{{url('cthoadon/show/'.$cthoadon->cthd_maso)}}"> View</a> |
	<a href="{{url('cthoadon')}}">Back</a>
</p>
</div>
@endsection